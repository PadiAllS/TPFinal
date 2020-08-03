<?php

use yii\db\Migration;

class m200803_172621_012_create_table_paciente_patologia extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%paciente_patologia}}',
            [
                'id_paciente_patologia' => $this->primaryKey(),
                'paciente_id' => $this->integer()->notNull(),
                'patologia_id' => $this->integer()->notNull(),
                'created_by' => $this->integer(),
                'created_at' => $this->integer(),
                'updated_by' => $this->integer(),
                'updated_at' => $this->integer(),
            ],
            $tableOptions
        );

        $this->createIndex('fk_paciente_patologia_2_idx', '{{%paciente_patologia}}', ['patologia_id']);
        $this->createIndex('fk_paciente_patologia_1_idx', '{{%paciente_patologia}}', ['paciente_id']);

        $this->addForeignKey(
            'fk_paciente_patologia_1',
            '{{%paciente_patologia}}',
            ['paciente_id'],
            '{{%paciente}}',
            ['id_paciente'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_paciente_patologia_2',
            '{{%paciente_patologia}}',
            ['patologia_id'],
            '{{%patologia}}',
            ['id_patologia'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%paciente_patologia}}');
    }
}
