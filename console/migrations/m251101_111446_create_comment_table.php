<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m251101_111446_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer(),
            'product_id' => $this->integer(),
            'text' => $this->text(),
            'created_at' => $this->timestamp(),
        ]);

        $this->addForeignKey(
            'fk-comment-client',
            '{{%comment}}',
            'client_id',
            '{{%client}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-comment-product',
            '{{%comment}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-comment-client', '{{%comment}}');
        $this->dropForeignKey('fk-comment-product', '{{%comment}}');
        $this->dropTable('{{%comment}}');
    }
}
