<?php

use yii\db\Migration;

class m200618_182410_011_create_table_recetas_consulta extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%recetas_consulta}}',
            [
                'consulta_id' => $this->primaryKey(),
                'vademecum_id' => $this->integer(),
                'created_by' => $this->integer(),
                'created_at' => $this->integer(),
                'updated_by' => $this->integer(),
                'updated_at' => $this->integer(),
            ],
            $tableOptions
        );

        $this->createIndex('fk_recetas_consulta_2_idx', '{{%recetas_consulta}}', ['vademecum_id']);

        $this->addForeignKey(
            'fk_recetas_consulta_1',
            '{{%recetas_consulta}}',
            ['consulta_id'],
            '{{%consulta}}',
            ['id_consulta'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_recetas_consulta_2',
            '{{%recetas_consulta}}',
            ['vademecum_id'],
            '{{%vademecum}}',
            ['id_vademecum'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%recetas_consulta}}');
    }
}
