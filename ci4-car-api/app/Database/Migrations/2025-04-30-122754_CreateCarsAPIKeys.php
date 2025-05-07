<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCarsAPIKeys extends Migration
{
    public function up()
    {
        // Create the cars table
           $this->db->query(
            "CREATE TABLE IF NOT EXISTS cars (
                id INT UNSIGNED AUTO_INCREMENT,
                car_brand VARCHAR(255) NOT NULL,
                car_name VARCHAR(255) NOT NULL,
                color_hex VARCHAR(6) NOT NULL,
                comments TEXT,
                car_type_id INT UNSIGNED,
                created_at DATETIME NULL,
                updated_at DATETIME NULL,
                PRIMARY KEY (`id`)
            );"
        );

        // Create the apikeys table
        $this->db->query(
            "CREATE TABLE IF NOT EXISTS apikeys (
                `key` VARCHAR(255) NOT NULL,
                `value` VARCHAR(255) NOT NULL
            );"
        );
    }

    public function down()
    {
        $this->db->query("DROP TABLE IF EXISTS cars;");
        $this->db->query("DROP TABLE IF EXISTS apikeys;");
    }
}
