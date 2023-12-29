<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menu}}`.
 */
class m220509_023415_create_menu_table extends Migration
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

        $this->createTable('{{%menu}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'position' => $this->integer(),
            'type' => $this->string(),
            'link' => $this->text(),
            'parent' => $this->integer(),
            'ord' => $this->integer(),
            'new_tab' => $this->tinyInteger(),
            'active' => $this->tinyInteger(),
            'symbol' => $this->string(),
            'menuStyle' => $this->smallInteger(),
            'background' => $this->string(),
            'background1' => $this->string(),
            'lang_id' => $this->integer(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%menu}}');
    }
}
