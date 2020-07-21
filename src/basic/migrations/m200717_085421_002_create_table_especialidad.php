<?php

use yii\db\Migration;

class m200717_085421_002_create_table_especialidad extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%especialidad}}',
            [
                'id_especialidad' => $this->primaryKey(),
                'nombre' => $this->string(250)->notNull(),
                'detalle' => $this->string(45),
                'created_by' => $this->integer(),
                'updated_by' => $this->integer(),
                'created_at' => $this->integer(),
                'updated_at' => $this->integer(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%especialidad}}');
    }
}
