<?php

use yii\db\Migration;

/**
 * Handles the creation for table `person`.
 */
class m160602_041006_create_person extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('person', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull(),
            'apellido' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'celular' => $this->integer()->notNull(),
            'email' => $this->string()->notNull(),
            'tipo' => $this->string()->notNull(),
            'num_licencia' => $this->string(),
            'num_cuenta' => $this->string(),
            'banco' => $this->string(),
            'cuenta' => $this->string(),
            'cod_seguridad' => $this->string(),
            'vencimiento' => $this->string(),
            'licencia' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('person');
    }
}
