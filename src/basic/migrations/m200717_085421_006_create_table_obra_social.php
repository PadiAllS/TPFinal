<?php

use yii\db\Migration;

class m200717_085421_006_create_table_obra_social extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%obra_social}}',
            [
                'id_obra_social' => $this->primaryKey(),
                'nombre' => $this->string(250),
                'direccion' => $this->string(250),
                'telefono' => $this->integer(),
                'celular' => $this->integer(),
                'contacto' => $this->string(250),
                'reintegro' => $this->integer(),
                'created_by' => $this->integer(),
                'created_at' => $this->integer(),
                'updated_by' => $this->integer(),
                'updated_at' => $this->integer(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%obra_social}}');
    }
}
