<?php

use yii\db\Migration;

class m251029_051205_add_column_client extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('client', 'confirmation_code', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('client', 'confirmation_code');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m251029_051205_add_column_client cannot be reverted.\n";

        return false;
    }
    */
}
