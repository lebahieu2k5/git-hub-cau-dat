<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string|null $about_content
 * @property string|null $about_image
 * @property string|null $about_title
 * @property string|null $about_url
 * @property string|null $address1
 * @property string|null $company_name
 * @property string|null $copyright
 * @property string|null $email
 * @property string|null $email_bcc
 * @property string|null $fax
 * @property string|null $footer
 * @property string|null $gift
 * @property string|null $hotline
 * @property string|null $logo
 * @property string|null $logo_footer
 * @property string|null $payment
 * @property string|null $phone
 * @property string|null $site_desc
 * @property string|null $site_keyword
 * @property string|null $site_title
 * @property string|null $slogan
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['about_content', 'about_image', 'about_url', 'address1', 'copyright', 'footer', 'gift', 'logo', 'logo_footer', 'payment', 'site_desc', 'site_keyword'], 'string'],
            [['about_title', 'company_name', 'email', 'email_bcc', 'fax', 'hotline', 'phone', 'site_title', 'slogan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'about_content' => 'About Content',
            'about_image' => 'About Image',
            'about_title' => 'About Title',
            'about_url' => 'About Url',
            'address1' => 'Address 1',
            'company_name' => 'Company Name',
            'copyright' => 'Copyright',
            'email' => 'Email',
            'email_bcc' => 'Email Bcc',
            'fax' => 'Fax',
            'footer' => 'Footer',
            'gift' => 'Gift',
            'hotline' => 'Hotline',
            'logo' => 'Logo',
            'logo_footer' => 'Logo Footer',
            'payment' => 'Payment',
            'phone' => 'Phone',
            'site_desc' => 'Site Desc',
            'site_keyword' => 'Site Keyword',
            'site_title' => 'Site Title',
            'slogan' => 'Slogan',
        ];
    }
}
