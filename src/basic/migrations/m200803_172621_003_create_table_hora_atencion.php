<?php

use yii\db\Migration;

class m200803_172621_003_create_table_hora_atencion extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%hora_atencion}}',
            [
                'id_hatencion' => $this->primaryKey(),
                'dia' => $this->string(25)->notNull(),
                'desde' => $this->time()->notNull(),
                'hasta' => $this->time()->notNull(),
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
        $this->dropTable('{{%hora_atencion}}');
    }
}
