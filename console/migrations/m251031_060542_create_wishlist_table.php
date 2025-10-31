<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wishlist}}`.
 */
class m251031_060542_create_wishlist_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wishlist}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'client_id' => $this->integer(),
        ]);

        $this->addForeignKey('fk-wishlist-product_id', '{{%wishlist}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-wishlist-client_id', '{{%wishlist}}', 'client_id', '{{%client}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-wishlist-product_id', '{{%wishlist}}');
        $this->dropForeignKey('fk-wishlist-client_id', '{{%wishlist}}');
        
        $this->dropTable('{{%wishlist}}');
    }
}
