<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;


class Apikeys extends Seeder
{
    public function run()
    {
        $data = [
            'key' => 'key' . rand(1, 1000),
            'value' => bin2hex(random_bytes(16)), 
        ];

        // Insert the data into the database
        $this->db->table('apikeys')->insert($data);
    }
}
