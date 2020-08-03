<?php

use yii\db\Migration;

class m200803_172621_010_create_table_usuario extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%usuario}}',
            [
                'id' => $this->primaryKey(),
                'username' => $this->string(80)->notNull(),
                'name' => $this->string(80)->notNull(),
                'email' => $this->string(100)->notNull(),
                'password' => $this->string(),
                'authKey' => $this->string(),
                'accessToken' => $this->string(),
                'updated_at' => $this->integer()->notNull(),
                'updated_by' => $this->integer()->notNull(),
                'created_at' => $this->integer()->notNull(),
                'created_by' => $this->integer()->notNull(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%usuario}}');
    }
}
