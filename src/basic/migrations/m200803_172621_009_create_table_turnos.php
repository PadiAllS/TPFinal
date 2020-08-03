<?php

use yii\db\Migration;

class m200803_172621_009_create_table_turnos extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%turnos}}',
            [
                'id_turnos' => $this->primaryKey(),
                'nro_orden' => $this->integer()->notNull(),
                'fecha_registro' => $this->dateTime(),
                'fecha_consulta' => $this->dateTime(),
                'paciente_id' => $this->integer()->notNull(),
                'medico_id' => $this->integer()->notNull(),
                'consulta_id' => $this->integer()->notNull(),
                'created_by' => $this->integer(),
                'updated_by' => $this->integer(),
                'created_at' => $this->integer(),
                'updated_at' => $this->integer(),
            ],
            $tableOptions
        );

        $this->createIndex('fk_turnos_2_idx', '{{%turnos}}', ['medico_id']);
        $this->createIndex('fk_turnos_1_idx', '{{%turnos}}', ['paciente_id']);
        $this->createIndex('fk_turnos_3_idx', '{{%turnos}}', ['consulta_id']);

        $this->addForeignKey(
            'fk_turnos_1',
            '{{%turnos}}',
            ['paciente_id'],
            '{{%paciente}}',
            ['id_paciente'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_turnos_2',
            '{{%turnos}}',
            ['medico_id'],
            '{{%medico}}',
            ['id_medico'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_turnos_3',
            '{{%turnos}}',
            ['consulta_id'],
            '{{%consulta}}',
            ['id_consulta'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%turnos}}');
    }
}
