<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%datlichkham}}`.
 */
class m220520_034314_create_datlichkham_table extends Migration
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

        $this->createTable('{{%datlichkham}}', [
            'id' => $this->primaryKey(),
            'dienthoai' => $this->string(),
            'donvi' => $this->text(),
            'email' => $this->string(),
            'hoten' => $this->text(),
            'ngaykham' => $this->dateTime(),
            'noidung' => $this->text(),
            'status' => $this->integer(),
            'tieude' => $this->integer(),
            'time' => $this->timestamp(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%datlichkham}}');
    }
}
