<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "log".
 *
 * @property int $id
 * @property string|null $time
 * @property string|null $noidung
 * @property string|null $user
 * @property string|null $loai
 * @property int|null $banghi
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'banghi'], 'integer'],
            [['time'], 'string', 'max' => 32],
            [['noidung', 'user', 'loai'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Time',
            'noidung' => 'Noidung',
            'user' => 'User',
            'loai' => 'Loai',
            'banghi' => 'Banghi',
        ];
    }
}
