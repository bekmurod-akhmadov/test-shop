<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_char}}`.
 */
class m251026_101651_create_product_char_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_char}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'value' => $this->string()->notNull(),
        ]);

        $this->addForeignKey('fk_product_char_product', '{{%product_char}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_product_char_product', '{{%product_char}}');
        $this->dropTable('{{%product_char}}');
    }
}
