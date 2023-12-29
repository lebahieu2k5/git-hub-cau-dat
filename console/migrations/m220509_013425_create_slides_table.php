<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%slides}}`.
 */
class m220509_013425_create_slides_table extends Migration
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

        $this->createTable('{{%slides}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'brief' => $this->string(),
            'thumb' => $this->string(),
            'image' => $this->string(),
            'url' => $this->string(),
            'ord' => $this->integer(),
            'active' => $this->tinyInteger(),
            'position' => $this->text(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%slides}}');
    }
}
