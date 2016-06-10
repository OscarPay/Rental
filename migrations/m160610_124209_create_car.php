<?php

use yii\db\Migration;

/**
 * Handles the creation for table `car`.
 */
class m160610_124209_create_car extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('car', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull(),
            'imagen' => $this->string()->notNull(),
            'transmision' => $this->string()->notNull(),
            'modelo' => $this->string()->notNull(),
            'marca' => $this->string()->notNull(),
            'placas' => $this->string()->notNull(),
            'tipo' => $this->string()->notNull(),
            'poliza' => $this->string()->notNull(),
            'num_serie' => $this->string()->notNull(),
            'num_pasajeros' => $this->string()->notNull(),
            'precio' => $this->float(2)->notNull(),
            'descripcion' => $this->text()->notNull(),
            'status' => $this->string()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('car');
    }
}
