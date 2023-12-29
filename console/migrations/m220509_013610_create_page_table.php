<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page}}`.
 */
class m220509_013610_create_page_table extends Migration
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
        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'url' => $this->text(),
            'content' => $this->text(),
            'seo_title' => $this->string(),
            'seo_desc'=>$this->text(),
            'seo_keyword'=>$this->string(),
            'active'=>$this->tinyInteger(),
            'product'=>$this->text(),
            'ord'=>$this->integer(),
            'check'=> $this->integer()->defaultValue(0),
            'brief' => $this -> string(),
            'image' => $this -> text(),
            'lang_id' => $this -> integer(),
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%page}}');
    }
}
