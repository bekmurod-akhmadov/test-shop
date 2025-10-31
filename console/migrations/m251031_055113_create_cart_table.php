<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cart}}`.
 */
class m251031_055113_create_cart_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cart}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'client_id' => $this->integer(),
            'qty' => $this->integer(),
            // 'price' => $this->integer(),
            // 'sum' => $this->integer(),
        ]);

        $this->addForeignKey('fk-cart-product_id', '{{%cart}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-cart-client_id', '{{%cart}}', 'client_id', '{{%client}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-cart-product_id', '{{%cart}}');
        $this->dropForeignKey('fk-cart-client_id', '{{%cart}}');
        $this->dropTable('{{%cart}}');
    }
}
