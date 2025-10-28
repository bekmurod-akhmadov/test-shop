<?php

use yii\db\Migration;
use yii\rbac\DbManager;

class m251027_165919_add_permission_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $admin = $auth->getRole('admin');
        
        $permissions = [
            'user.index',
            'user.create',
            'user.update',
            'user.delete',
            'user.view',
        ];

        foreach ($permissions as $permissionName) {
            $permission = $auth->createPermission($permissionName);
            $auth->add($permission);
            $auth->addChild($admin, $permission);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        $admin = $auth->getRole('admin');
       
        $permissions = [
           'user.index',
           'user.create',
           'user.update',
           'user.delete',
           'user.view',
        ];

        foreach ($permissions as $permissionName) {
           $permission = $auth->getPermission($permissionName);
           $auth->remove($permission);
           $auth->removeChild($admin, $permission);
        }
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m251027_165919_add_permission_user cannot be reverted.\n";

        return false;
    }
    */
}
