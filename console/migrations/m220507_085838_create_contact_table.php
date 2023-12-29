<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact}}`.
 */
class m220507_085838_create_contact_table extends Migration
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

        $this->createTable('{{%contact}}', [
            'id' => $this->primaryKey(),
            'about_content' => $this->text(),
            'about_image' => $this->text(),
            'about_title' => $this->string(),
            'about_url' => $this->text(),
            'address1' => $this->text(),
            'company_name' => $this->string(),
            'copyright' => $this->text(),
            'email' => $this->string(),
            'email_bcc' => $this->string(),
            'fax' => $this->string(),
            'footer' => $this->text(),
            'gift' => $this->text(),
            'hotline' => $this->string(),
            'logo' => $this->text(),
            'logo_footer' => $this->text(),
            'payment' => $this->text(),
            'phone' => $this->string(),
            'site_desc' => $this->text(),
            'site_keyword' => $this->text(),
            'site_title' => $this->string(),
            'slogan' => $this->string(),
            ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact}}');
    }
}
