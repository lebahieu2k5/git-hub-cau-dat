<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "slides".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $brief
 * @property string|null $thumb
 * @property string|null $image
 * @property string|null $url
 * @property int|null $ord
 * @property int|null $active
 * @property string|null $position
 */
class Slides extends \yii\db\ActiveRecord
{
    const MAIN="main";
    const  SUB="proc";

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slides';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ord', 'active'], 'integer'],
            [['position'], 'string'],
            [['name', 'brief', 'thumb', 'image', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên',
            'brief' => 'Mô tả',
            'thumb' => 'Thumb',
            'image' => 'Hình ảnh',
            'url' => 'Url',
            'ord' => 'Thứ tự',
            'active' => 'Hoạt động',
            'position' => 'Vị trí',
        ];
    }

    public function afterDelete()
    {
        $path = dirname(dirname(__DIR__)) . '/images/slides/' . $this->image;
        if (is_file($path))
            unlink($path);
        parent::afterDelete(); // TODO: Change the autogenerated stub
    }

    public static function getSlide()
    {
        return self::find()->where(['active' => 1])->orderBy(['ord' => SORT_ASC])->all();
    }

    public static function getSlideByPos($pos)
    {
        return self::find()->where(['position' => $pos, 'active' => 1])->orderBy(['ord' => SORT_ASC])->all();
    }
    public static function getPosition()
    {
        return [
            self::MAIN => 'Slide chính (tỷ lệ 1920x1080)',
            self::SUB => 'Slide phụ',
        ];
    }


    public function beforeSave($insert)
    {

        $file = UploadedFile::getInstanceByName('Slides[image]');
        if(!is_null($file))
        {
            $rootFolder = Yii::getAlias('@root');
            $folderImages = dirname(dirname(__DIR__)).'/images/';

            //xóa ảnh cũ
            if(!$this->isNewRecord){
                $oldSlides = Slides::findOne(['id' => $this->id]);

                if(isset($oldSlides) && file_exists($rootFolder.$oldSlides->image) && preg_match("/^\/images\/slides\//i", $oldSlides->image)>0){
                    unlink($rootFolder.$oldSlides->image);
                }
            }
            //end xóa ảnh cũ

            if (!file_exists($folderImages)) {
                mkdir($folderImages, 0777, true);
                mkdir($folderImages.'slides/', 0777, true);
            }else if(!file_exists($folderImages.'slides/')){
                mkdir($folderImages.'slides/', 0777, true);
            }

            $now = new \DateTime();
            $filename= "/images/slides/".$now->getTimestamp().$file->name;
            $path = $rootFolder.$filename;
            $file->saveAs($path);

            $this->image = $filename;
        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}
