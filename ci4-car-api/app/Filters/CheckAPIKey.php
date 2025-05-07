<?php

namespace App\Filters;

use App\Models\ApiKeyModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\Response;
use Config\Services;

class CheckAPIKey implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Get API Key from header
        $key = $this->getApiKeyFromRequest($request);

        if (empty($key)) {
            return $this->unauthorizedResponse();
        }

        // Check API key in database
        $apiKeyModel = new ApiKeyModel();
        $keyExists = $apiKeyModel->where('key', $key)->first();

        if (!$keyExists) {
            return $this->unauthorizedResponse();
        }

        // Key is valid – let the request continue
        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed
    }

    private function getApiKeyFromRequest(RequestInterface $request): ?string
    {
        // Check custom header
        $key = $request->getHeaderLine('X-API-KEY');

        // Fallback to Authorization header (Bearer token)
        if (empty($key)) {
            $authHeader = $request->getHeaderLine('Authorization');
            if (stripos($authHeader, 'Bearer ') === 0) {
                $key = trim(substr($authHeader, 7));
            }
        }

        return $key;
    }

    private function unauthorizedResponse(): ResponseInterface
    {
        return Services::response()
            ->setStatusCode(Response::HTTP_UNAUTHORIZED)
            ->setJSON(['error' => 'Unauthorized: Invalid or missing API key']);
    }
}
