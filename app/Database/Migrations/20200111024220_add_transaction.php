<?php

namespace App\Database\Migrations;

class Add_transaction extends \CodeIgniter\Database\Migration
{

    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'product_id'       => [
                'type'           => 'INT',
                'constraint'     => 2,
            ],
            'product_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'amount' => [
                'type'           => 'FLOAT',
            ],
            'qty' => [
                'type'           => 'INT',
                'constraint'     => 2,
            ],
            'business_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'customer_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'stripe_id' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'created_at' => [
                'type'           => 'DATETIME',
            ],
            'updated_at' => [
                'type'           => 'DATETIME'
            ]
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('transaction');
    }

    public function down()
    {
        $this->forge->dropTable('transaction');
    }
}
