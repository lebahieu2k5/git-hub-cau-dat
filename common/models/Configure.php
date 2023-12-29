<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "configure".
 *
 * @property int $id
 * @property string|null $label
 * @property string|null $name
 * @property string|null $nhom
 * @property string|null $value
 */
class Configure extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'configure';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value', 'label'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['nhom'], 'string', 'max' => 200],
            [['name'], 'required','message'=>'Kiểu không được để trống'],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'name' => 'Name',
            'nhom' => 'Nhom',
            'value' => 'Value',
        ];
    }

    public static function getConfig(){
        $mang=array();
        foreach (self::find()->where("nhom<>'giaodien'")->all() as $value){
            $mang[$value->name]=$value->value;
        }
        return $mang;
    }
}
