<?php

use yii\db\Migration;

class m200717_085421_005_create_table_medico_atencion extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%medico_atencion}}',
            [
                'id_medicoatencion' => $this->primaryKey(),
                'medico_id' => $this->integer()->notNull(),
                'hatencion_id' => $this->integer()->notNull(),
                'created_by' => $this->integer(),
                'updated_by' => $this->integer(),
                'created_at' => $this->integer(),
                'updated_at' => $this->integer(),
            ],
            $tableOptions
        );

        $this->createIndex('hatencion_id', '{{%medico_atencion}}', ['hatencion_id']);
        $this->createIndex('medico_id', '{{%medico_atencion}}', ['medico_id']);

        $this->addForeignKey(
            'medico_atencion_ibfk_1',
            '{{%medico_atencion}}',
            ['medico_id'],
            '{{%medico}}',
            ['id_medico'],
            'RESTRICT',
            'CASCADE'
        );
        $this->addForeignKey(
            'medico_atencion_ibfk_2',
            '{{%medico_atencion}}',
            ['hatencion_id'],
            '{{%hora_atencion}}',
            ['id_hatencion'],
            'RESTRICT',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('{{%medico_atencion}}');
    }
}
