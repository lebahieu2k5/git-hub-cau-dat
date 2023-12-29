<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nhansu}}`.
 */
class m220510_011153_create_nhansu_table extends Migration
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
        $this->createTable('{{%nhansu}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'image' => $this->text()->notNull(),
            'job' => $this->string(),
            'content' => $this->text(),
            'ord' => $this->tinyInteger(),
            'active' => $this->tinyInteger(),
            'facebook' => $this->string(),
            'gmail' => $this->string(),

        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%nhansu}}');
    }
}
