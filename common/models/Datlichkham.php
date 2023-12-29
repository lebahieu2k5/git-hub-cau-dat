<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "datlichkham".
 *
 * @property int $id
 * @property string|null $dienthoai
 * @property string|null $donvi
 * @property string|null $email
 * @property string|null $hoten
 * @property string|null $ngaykham
 * @property string|null $noidung
 * @property int|null $status
 * @property int|null $tieude
 * @property string $time
 */
class Datlichkham extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'datlichkham';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['donvi', 'hoten', 'noidung'], 'string'],
            [['ngaykham', 'time'], 'safe'],
            [['status', 'tieude'], 'integer'],
            [['dienthoai', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dienthoai' => 'Điện thoại',
            'donvi' => 'Đơn vị',
            'email' => 'Email',
            'hoten' => 'Họ tên',
            'ngaykham' => 'Ngày khám',
            'noidung' => 'Nội dung',
            'status' => 'Trạng thái',
            'tieude' => 'Tiêu đề',
            'time' => 'Thời gian',
        ];
    }
}
