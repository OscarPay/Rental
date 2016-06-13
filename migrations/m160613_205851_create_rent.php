<?php

use yii\db\Migration;

/**
 * Handles the creation for table `rent`.
 */
class m160613_205851_create_rent extends Migration {
    /**
     * @inheritdoc
     */
    public function up() {
        $this->createTable('rent', [
            'id' => $this->primaryKey(),
            'automovil_id' => $this->integer()->notNull(),
            'cliente_id' => $this->integer()->notNull(),
            'vendedor_id' => $this->integer(),
            'status' => $this->string()->notNull(),
            'num_dias' => $this->integer()->notNull(),
            'total' => $this->float(2)->notNull(),
            'fecha_entrega' => $this->string()->notNull(),
            'fecha_devolucion' => $this->string()->notNull(),
            'lugar_entrega' => $this->string()->notNull(),
            'penalizacion'  => $this->float(2),
            'nota' => $this->string(),
        ]);

        $this->createIndex('idx-rent-automovil_id', 'rent', 'automovil_id');
        $this->createIndex('idx-rent-cliente_id', 'rent', 'cliente_id');
        $this->createIndex('idx-rent-vendedor_id', 'rent', 'vendedor_id');

        $this->addForeignKey('fk-rent-automovil_id', 'rent', 'automovil_id', 'car', 'id', 'CASCADE');
        $this->addForeignKey('fk-rent-cliente_id', 'rent', 'cliente_id', 'person', 'id', 'CASCADE');
        $this->addForeignKey('fk-rent-vendedor_id', 'rent', 'vendedor_id', 'person', 'id', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down() {
        $this->dropTable('rent');
    }
}
