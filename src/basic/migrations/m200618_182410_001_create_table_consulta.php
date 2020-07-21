<?php

use yii\db\Migration;

class m200618_182410_001_create_table_consulta extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%consulta}}',
            [
                'id_consulta' => $this->primaryKey(),
                'motivo' => $this->string(250),
                'diagnostico' => $this->string(45),
                'fecha_consulta' => $this->date(),
                'status' => $this->integer(),
                'turno_id' => $this->integer(),
                'tratamiento' => $this->text(),
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
        $this->dropTable('{{%consulta}}');
    }
}
