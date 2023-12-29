<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%catnew}}`.
 */
class m220506_013020_create_catnew_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%catnew}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'active' => $this->tinyInteger(),
            'home' => $this->string(),
            'ord' => $this->tinyInteger(),
            'parent' => $this->integer()->defaultValue(-1),
            'position' => $this->tinyInteger(),
            'seo_desc' => $this->text(),
            'seo_title' => $this->string(),
            'seo_keyword' => $this->string(),
            'url' => $this->text()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%catnew}}');
    }
}
