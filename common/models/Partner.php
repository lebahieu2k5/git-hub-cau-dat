<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "partner".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $image
 * @property string|null $url
 * @property int|null $position
 * @property int|null $ord
 * @property int|null $active
 * @property string|null $brief
 */
class Partner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'url', 'brief'], 'string'],
            [['position', 'ord', 'active'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'url' => 'Url',
            'position' => 'Position',
            'ord' => 'Ord',
            'active' => 'Active',
            'brief' => 'Brief',
        ];
    }
}
