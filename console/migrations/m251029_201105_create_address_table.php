<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%address}}`.
 */
class m251029_201105_create_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%address}}', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer()->notNull(),
            'city' => $this->string(255)->notNull(),
            'district' => $this->string(255)->notNull(),
            'address' => $this->string(255)->notNull(),
            'status' => $this->integer()->defaultValue(1),
        ]);

        $this->addForeignKey(
            'fk_address_client',
            '{{%address}}',
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
        $this->dropForeignKey('fk_address_client', '{{%address}}');
        $this->dropTable('{{%address}}');
    }
}
