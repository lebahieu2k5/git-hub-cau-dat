<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%partner}}`.
 */
class m220509_073639_create_partner_table extends Migration
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

        $this->createTable('{{%partner}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'image'=> $this->text(),
            'url' => $this->text(),
            'position'=>$this->integer(),
            'ord'=>$this->integer(),
            'active'=>$this->tinyInteger(),
            'brief'=>$this->text(),

        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%partner}}');
    }
}
