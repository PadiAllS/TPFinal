<?php

use yii\db\Migration;

class m200618_182410_005_create_table_paciente extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%paciente}}',
            [
                'id_paciente' => $this->primaryKey(),
                'nombre' => $this->string(250)->notNull(),
                'apellido' => $this->string(250)->notNull(),
                'direccion' => $this->string(250)->notNull(),
                'telefono' => $this->integer()->notNull(),
                'celular' => $this->integer()->notNull(),
                'sexo' => $this->string(),
                'tipo_doc' => $this->string()->notNull(),
                'nro_doc' => $this->integer()->notNull(),
                'nom_ape_mat' => $this->string(250),
                'nom_ape_pat' => $this->string(250),
                'obra_social_id' => $this->integer(),
                'num_afil' => $this->string(200)->notNull(),
                'fecha_nacimiento' => $this->dateTime()->notNull(),
                'responsable_nombre' => $this->string(100)->notNull(),
                'resoponsable_telef' => $this->string(50)->notNull(),
                'created_by' => $this->integer(),
                'created_at' => $this->integer(),
                'updated_by' => $this->integer(),
                'updated_at' => $this->integer(),
            ],
            $tableOptions
        );

        $this->createIndex('fk_paciente_1_idx', '{{%paciente}}', ['obra_social_id']);

        $this->addForeignKey(
            'fk_paciente_1',
            '{{%paciente}}',
            ['obra_social_id'],
            '{{%obra_social}}',
            ['id_obra_social'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%paciente}}');
    }
}
