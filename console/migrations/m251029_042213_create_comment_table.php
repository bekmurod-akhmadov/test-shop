<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m251029_042213_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(),
            'client_id' => $this->integer(),
            'comment' => $this->text()->notNull(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey('fk_comment_product', '{{%comment}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_comment_client', '{{%comment}}', 'client_id', '{{%client}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_comment_product', '{{%comment}}');
        $this->dropForeignKey('fk_comment_client', '{{%comment}}');
        $this->dropTable('{{%comment}}');
    }
}
