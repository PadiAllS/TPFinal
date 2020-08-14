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
                'activate' => $this->string(),
                'verification_code' => $this->string(),
                'accessToken' => $this->string(),
                'updated_at' => $this->integer()->notNull(),
                'updated_by' => $this->integer()->notNull(),
                'created_at' => $this->integer()->notNull(),
                'created_by' => $this->integer()->notNull(),
            ]);
                        //Usuario por defecto maxi / maxi
            $this->insert('{{%usuario}}', [
                'username' => 'admin',
                'auth_key' => '0e07255b3578e3be24a464975922c4da',
                'password_hash' => '$2y$10$quduV0UOp7x9DSmIRL6At.Mu/7Yk.KCbqqMEK5IbGnRUHtM8xNIm6'
            ]);
    }

    public function down()
    {
        $this->dropTable('{{%usuario}}');
    }
}
