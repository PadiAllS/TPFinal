<?php

use yii\db\Migration;

class m200803_172621_008_create_table_patologia extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%patologia}}',
            [
                'id_patologia' => $this->primaryKey(),
                'nombre' => $this->string(100)->notNull(),
                'detalle' => $this->string(100)->notNull(),
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
        $this->dropTable('{{%patologia}}');
    }
}
