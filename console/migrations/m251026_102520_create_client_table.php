<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 */
class m251026_102520_create_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->unique(),
            'phone' => $this->string(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'username' => $this->string()->unique(),
            'password' => $this->string(),
            'auth_key' => $this->string(),
            'access_token' => $this->string(),
            'status' => $this->integer()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%client}}');
    }
}
