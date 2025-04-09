<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cars extends Migration
{
    public function up()
    {
        $this->db->query("CREATE TABLE cars(
                id INT(11) UNSIGNED AUTO_INCREMENT,
                car_brand VARCHAR(255) NOT NULL,
                car_name VARCHAR(255) NOT NULL,
                color_hex VARCHAR(6) NOT NULL,
                comments TEXT,
                car_type_id INT(11),
                created_at DATETIME,
                updated_at DATETIME,
                deleted_at DATETIME,
                PRIMARY KEY (id)
        );");
    }

    public function down()
    {
        //
    }
}
