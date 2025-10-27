<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m251027_120100_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'content' => $this->text(),
            'image' => $this->string(255),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-news-category_id',
            'news',
            'category_id'
        );

        // add foreign key for table `news_category`
        $this->addForeignKey(
            'fk-news-category_id',
            'news',
            'category_id',
            'news_category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `news_category`
        $this->dropForeignKey(
            'fk-news-category_id',
            'news'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-news-category_id',
            'news'
        );

        $this->dropTable('news');
    }
}
