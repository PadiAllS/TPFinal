<?php

use yii\db\Migration;

class m200803_172621_004_create_table_medico extends Migration
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
                'nombre' => $this->string(100)->notNull(),
                'apellido' => $this->string(100)->notNull(),
                'direccion' => $this->string(100)->notNull(),
                'localidad' => $this->string(100)->notNull(),
                'codpos' => $this->string(20),
                'telefono' => $this->string(30),
                'celular' => $this->string(30)->notNull(),
                'fecha_nacimiento' => $this->dateTime()->notNull(),
                'sexo' => $this->string(20)->notNull(),
                'tipo_doc' => $this->string(20)->notNull(),
                'nro_doc' => $this->string(30)->notNull(),
                'mail' => $this->string(100)->notNull(),
                'matricula' => $this->string(100)->notNull(),
                'especialidad_id' => $this->integer()->notNull(),
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
