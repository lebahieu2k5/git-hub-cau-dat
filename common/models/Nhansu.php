<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "nhansu".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string|null $job
 * @property string|null $content
 * @property int|null $ord
 * @property int|null $active
 * @property string|null $facebook
 * @property string|null $gmail
 */
class Nhansu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nhansu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image'], 'required'],
            [['image', 'content'], 'string'],
            [['ord', 'active'], 'integer'],
            [['name', 'job', 'facebook', 'gmail'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Image',
            'job' => 'Job',
            'content' => 'Content',
            'ord' => 'Ord',
            'active' => 'Active',
            'facebook' => 'Facebook',
            'gmail' => 'Gmail',
        ];
    }
}
