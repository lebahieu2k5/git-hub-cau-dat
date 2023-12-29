<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chuyenkhoa".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $image
 * @property string|null $job
 * @property string|null $content
 * @property int|null $ord
 * @property int|null $active
 * @property int|null $lang_id
 */
class Chuyenkhoa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chuyenkhoa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'content'], 'string'],
            [['ord', 'active', 'lang_id'], 'integer'],
            [['name', 'job'], 'string', 'max' => 255],
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
            'lang_id' => 'Lang ID',
        ];
    }
}
