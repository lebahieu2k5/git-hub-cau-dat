<?php

use yii\db\Migration;

/**
 * Class m220412_024928_tao_admin_table
 */
class m220412_024928_tao_admin_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%admin}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->insert('admin',[
            'username' => 'Superadmin',
            'auth_key' => '0ckck3xNg_vymfAqT2xKKvV0CxlAu4U4',
            'password_hash' => Yii::$app->security->generatePasswordHash("123456"),
            'email' => 'ihdesigne@gmail.com',
            'status' => 10,
            'created_at' => 1499411862,
            'updated_at' => 1507343232
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('admin', ['id' => 1]);
        $this->dropTable('{{%admin}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220412_024928_tao_admin_table cannot be reverted.\n";

        return false;
    }
    */
}
