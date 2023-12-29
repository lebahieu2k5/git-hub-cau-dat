<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "datcauhoi".
 *
 * @property int $id
 * @property string|null $tieude
 * @property string|null $tennguoibenh
 * @property string|null $noidung
 * @property string|null $email
 * @property string|null $filedinhkem
 * @property string|null $noidungtraloi
 * @property string|null $dateTime
 * @property string|null $tenbacsi
 */
class Datcauhoi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'datcauhoi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tieude', 'tennguoibenh', 'noidung', 'filedinhkem', 'noidungtraloi', 'tenbacsi'], 'string'],
            [['dateTime'], 'safe'],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tieude' => 'Tieude',
            'tennguoibenh' => 'Tennguoibenh',
            'noidung' => 'Noidung',
            'email' => 'Email',
            'filedinhkem' => 'Filedinhkem',
            'noidungtraloi' => 'Noidungtraloi',
            'dateTime' => 'Date Time',
            'tenbacsi' => 'Tenbacsi',
        ];
    }
}
