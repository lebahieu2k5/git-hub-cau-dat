<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%log}}`.
 */
class m220503_090525_create_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%log}}', [
            'id' => $this->bigInteger(),
            'time' => $this->string(32),
            'noidung' => $this->string(50),
            'user' => $this->string(50),
            'loai' => $this->string(50),
            'banghi' => $this->bigInteger()

        ], $tableOptions);
        $this->addPrimaryKey('log_pk', 'log', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%log}}');
    }
}
