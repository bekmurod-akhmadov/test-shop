<?php

use yii\db\Migration;

class m251026_124334_add_column_in_table_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {   
        $this->addColumn('product', 'accessory', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m251026_124334_add_column_in_table_product cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m251026_124334_add_column_in_table_product cannot be reverted.\n";

        return false;
    }
    */
}
