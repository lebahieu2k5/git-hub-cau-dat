<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%album}}`.
 */
class m220507_085839_create_album_table extends Migration
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

        $this->createTable('{{%album}}', [
            'id' => $this->primaryKey(),
            'name_vi' => $this->string(),
            'image' => $this->text(),
            'ord' => $this->integer(),
            'active' => $this->tinyInteger(),
            'name_en' => $this->string(),
            'desc' => $this->text(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%album}}');
    }
}
