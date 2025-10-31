<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m251031_183221_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer()->notNull(),
            'address' => $this->string(255)->notNull(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'total_count' => $this->integer()->notNull(),
            'total_price' => $this->decimal(10, 2)->notNull(),
            'status' => $this->integer()->defaultValue(0),
        ]);

        $this->addForeignKey(
            'fk-order-client',
            '{{%order}}',
            'client_id',
            '{{%client}}',
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
        $this->dropForeignKey('fk-order-client', '{{%order}}');
        $this->dropTable('{{%order}}');
    }
}
