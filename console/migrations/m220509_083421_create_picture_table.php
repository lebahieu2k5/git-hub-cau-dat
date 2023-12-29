<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%picture}}`.
 */
class m220509_083421_create_picture_table extends Migration
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

        $this->createTable('{{%picture}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'image' => $this->text(),
            'posted_date' => $this->string(),
            'home' => $this->tinyInteger(),
            'ord' => $this->integer(),
            'album_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-album_id', 'picture', 'album_id');
        $this->addForeignKey('fk_picture', 'picture', 'album_id', 'picture', 'id', 'RESTRICT', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%picture}}');
    }
}
