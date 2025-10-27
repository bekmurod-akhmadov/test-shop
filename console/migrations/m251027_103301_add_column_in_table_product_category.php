<?php

use yii\db\Migration;

class m251027_103301_add_column_in_table_product_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {   
        $this->addColumn('product_category', 'image', $this->string(255));
        $this->addColumn('product_category', 'parent_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product_category', 'image');
        $this->dropColumn('product_category', 'parent_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m251027_103301_add_column_in_table_product_category cannot be reverted.\n";

        return false;
    }
    */
}
