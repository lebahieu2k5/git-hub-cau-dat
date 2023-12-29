<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%chuyenkhoa}}`.
 */
class m220510_005235_create_chuyenkhoa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOption = null;
        if ($this->db->driverName === 'mysql') {
            $tableOption = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB' ;
        }

        $this->createTable('{{%chuyenkhoa}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'image' => $this->text(),
            'job' => $this->string(),
            'content' => $this->text(),
            'ord' => $this->tinyInteger(),
            'active' => $this->tinyInteger(),
            'lang_id' => $this->integer(),

        ], $tableOption);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%chuyenkhoa}}');
    }
}
