<?php

use yii\db\Migration;
use common\models\Comment;
class m251101_112305_add_column_in_table_comment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('comment', 'status', $this->integer()->defaultValue(Comment::STATUS_MODERATION));   
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('comment', 'status');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m251101_112305_add_column_in_table_comment cannot be reverted.\n";

        return false;
    }
    */
}
