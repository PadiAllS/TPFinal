<?php

use yii\db\Migration;

class m200618_182410_003_create_table_medico extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%medico}}',
            [
                'id_medico' => $this->primaryKey(),
                'nombre' => $this->string(250),
                'apellido' => $this->string(250),
                'direccion' => $this->string(250),
                'telefono' => $this->integer(),
                'celular' => $this->integer(),
                'fecha_nacimiento' => $this->dateTime(),
                'sexo' => $this->string(),
                'tipo_doc' => $this->string(),
                'nro_doc' => $this->string(45),
                'matricula' => $this->string(250),
                'especialidad_id' => $this->integer(),
                'created_by' => $this->integer(),
                'created_at' => $this->integer(),
                'updated_by' => $this->integer(),
                'updated_at' => $this->integer(),
            ],
            $tableOptions
        );

        $this->createIndex('fk_medico_1_idx', '{{%medico}}', ['especialidad_id']);

        $this->addForeignKey(
            'fk_medico_1',
            '{{%medico}}',
            ['especialidad_id'],
            '{{%especialidad}}',
            ['id_especialidad'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%medico}}');
    }
}
