<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m220506_020720_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'active' => $this->tinyInteger(),
            'brief' => $this->string(),
            'cat_new_id' => $this->integer()->notNull(),
            'content' => $this->text(),
            'home' => $this->tinyInteger(),
            'hot' => $this->tinyInteger(),
            'image' => $this->text(),
            'luotxem' => $this->integer()->defaultValue(0),
            'posted_date' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'seo_desc' => $this->text(),
            'seo_title' => $this->string(),
            'seo_keyword' => $this->string(),
            'tags' => $this->text(),
            'title' => $this->string(),
            'url' => $this->text()
        ], $tableOptions);

        $this->createIndex('idx-cat_new_id', 'news', 'cat_new_id');
        $this->addForeignKey('fk_catnew', 'news', 'cat_new_id', 'catnew', 'id', 'RESTRICT', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_catnew', 'news');
        $this->dropIndex('idx-cat_new_id', 'news');
        $this->dropTable('{{%news}}');
    }
}
