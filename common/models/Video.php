<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property string $name
 * @property string|null $url
 * @property string|null $code
 * @property string|null $path
 * @property int|null $ord
 * @property int|null $active
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['ord', 'active'], 'integer'],
            [['name', 'url', 'code', 'path'], 'string', 'max' => 255],
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
            'url' => 'Url',
            'code' => 'Code',
            'path' => 'Path',
            'ord' => 'Ord',
            'active' => 'Active',
        ];
    }
}
