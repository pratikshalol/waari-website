<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAboutContentTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'section_key' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'unique'     => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 300,
                'null'       => true,
            ],
            'subtitle' => [
                'type'       => 'VARCHAR',
                'constraint' => 300,
                'null'       => true,
            ],
            'content' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'extra_data' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('about_content');
    }

    public function down(): void
    {
        $this->forge->dropTable('about_content');
    }
}
