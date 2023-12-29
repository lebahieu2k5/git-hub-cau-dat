<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "album".
 *
 * @property int $id
 * @property string|null $name_vi
 * @property string|null $image
 * @property int|null $ord
 * @property int|null $active
 * @property string|null $name_en
 * @property string|null $desc
 */
class Album extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'album';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'desc'], 'string'],
            [['ord', 'active'], 'integer'],
            [['name_vi', 'name_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_vi' => 'Name Vi',
            'image' => 'Image',
            'ord' => 'Ord',
            'active' => 'Active',
            'name_en' => 'Name En',
            'desc' => 'Desc',
        ];
    }
}
