<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%datcauhoi}}`.
 */
class m220510_011650_create_datcauhoi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOption = null;
        if ($this->db->driverName === 'mysql') {
            $tableOption = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%datcauhoi}}', [
            'id' => $this->primaryKey(),
            'tieude' => $this->text(),
            'tennguoibenh' => $this->text(),
            'noidung' => $this->text(),
            'email' => $this->string(),
            'filedinhkem' => $this->text(),
            'noidungtraloi' => $this->text(),
            'dateTime' => $this->dateTime(),
            'tenbacsi' => $this->text(),
        ], $tableOption);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%datcauhoi}}');
    }
}
