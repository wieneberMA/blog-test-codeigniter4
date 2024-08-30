<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up(){
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'consttraint' => 30,
                'usingned' =>true,
                'auto_increment' =>true
                
            ],
            'firstname' =>[
                'type' => 'INT',
                'consttraint' => 250,
            ],
            'middlename'=>[
                'type' => 'INT',
                'consttraint' => 250,
                'null'=> true,
                'default'=> true,
            ],
            'lastname'=>[
                'type' => 'INT',
                'consttraint' => 250,    
            ],
            'email'=>[
                'type' => 'TEXT',
            ],
            'password'=>[
                'type' => 'TEXT',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id',true);
        $this->forge->createTable('users');
    }
    public function down(){
        $this->forge->dropTable('users');
    }
}
