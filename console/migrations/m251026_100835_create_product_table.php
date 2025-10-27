<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m251026_100835_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'category_id' => $this->integer()->notNull(),
            'price' => $this->decimal(10, 2)->notNull(),
            'discount_price' => $this->decimal(10, 2),
            'image' => $this->string(255),
            'in_stock' => $this->integer()->defaultValue(1),
            'description' => $this->text(),
            'body' => $this->text(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            'status' => $this->integer()->defaultValue(1),
        ]);

        $this->createIndex('idx_product_name', '{{%product}}', 'name', true);
        $this->addForeignKey('fk_product_category', '{{%product}}', 'category_id', '{{%product_category}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_product_category', '{{%product}}');
        $this->dropIndex('idx_product_name', '{{%product}}');
        $this->dropTable('{{%product}}');
    }
}
