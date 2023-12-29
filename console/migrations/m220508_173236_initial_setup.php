<?php

use common\modules\auth\models\AuthItem;
use yii\db\Migration;

/**
 * Class m220508_173236_initial_setup
 */
class m220508_173236_initial_setup extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $superadminRole = new AuthItem();
        $superadminRole->type = 1;
        $superadminRole->name = 'superadmin';

        $admin = new AuthItem();
        $admin->type = 1;
        $admin->name = 'admin';

        $bientapvien = new AuthItem();
        $bientapvien->type = 1;
        $bientapvien->name = 'bientapvien';

        $superadminRole->save();
        $admin->save();
        $bientapvien->save();

        $auth = Yii::$app->authManager;
        $auth->assign($auth->getRole('superadmin'), '1');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220508_173236_initial_setup cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220508_173236_initial_setup cannot be reverted.\n";

        return false;
    }
    */
}
