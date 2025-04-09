<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Cars extends Seeder
{
    public function run()
    {
        $carNames = [
            ['car_name' => 'Honda Civic'],
            ['car_name' => 'VW Golf'],
            ['car_name' => 'Ford Focus'],
            ['car_name' => 'Audi RS3']
        ];

        $CarModel = model('App\Models\CarModel');
        
        foreach ($carNames as $car) {
            $CarModel->insert([
                'car_brand' => 'Unknown',
                'car_name' => $car['car_name'],
                'color_hex' => 'FF0000',
                'comments' => 'This is a comment',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

    }
}
