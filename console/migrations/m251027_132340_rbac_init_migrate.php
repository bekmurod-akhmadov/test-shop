<?php

use yii\db\Migration;

class m251027_132340_rbac_init_migrate extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // --- user yaratish ---
        $this->insert('{{%user}}', [
            'username' => 'admin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('admin123'),
            'email' => 'admin@example.com',
            'status' => 10,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $userId = (new \yii\db\Query())
            ->select('id')
            ->from('{{%user}}')
            ->where(['username' => 'admin'])
            ->scalar();

        $auth = Yii::$app->authManager;

        $admin = $auth->createRole('admin');
        $auth->add($admin);

        $permissions = [
            'product.create',
            'product.update',
            'product.delete',
            'product.view',
            'product.index',
            'productCategory.create',
            'productCategory.update',
            'productCategory.delete',
            'productCategory.view',
            'productCategory.index',
            'newsCategory.create',
            'newsCategory.update',
            'newsCategory.delete',
            'newsCategory.view',
            'newsCategory.index',
            'news.create',
            'news.update',
            'news.delete',
            'news.view',
            'news.index',
            'client.create',
            'client.update',
            'client.delete',
            'client.view',
            'client.index',
        ];

        foreach ($permissions as $permName) {
            $permission = $auth->createPermission($permName);
            $auth->add($permission);
            $auth->addChild($admin, $permission);
        }

        $auth->assign($admin, $userId);
    }


    /**
     * {@inheritdoc}
     */

    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        
        $auth->removeAll();

        $this->delete('{{%user}}', ['username' => 'admin']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m251027_132340_rbac_init_migrate cannot be reverted.\n";

        return false;
    }
    */
}
