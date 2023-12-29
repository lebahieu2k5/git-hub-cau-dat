<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "catnew".
 *
 * @property int $id
 * @property int|null $active
 * @property string|null $name
 * @property int|null $ord
 * @property int|null $parent
 * @property int $home
 * @property int|null $position
 * @property string|null $seo_desc
 * @property string|null $seo_title
 * @property string|null $seo_keyword
 * @property string|null $url
 *
 * @property News[] $news
 */
class Catnew extends \yii\db\ActiveRecord
{
    CONST AdsCatNew=1;
    CONST CatNew=2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catnew';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'seo_desc'], 'string'],
            [['name'], 'required'],
            [['position', 'active', 'home', 'ord', 'parent'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['seo_title', 'seo_keyword'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'name' => 'Name',
            'position' => 'Position',
            'active' => 'Kích hoạt',
            'home' => 'Hiển thị trang chủ',
            'ord' => 'Ord',
            'seo_title' => 'Seo Title',
            'seo_desc' => 'Seo Desc',
            'seo_keyword' => 'Seo Keyword',
            'parent' => 'Parent',
        ];
    }

    public static function getExportColumn(){
        return [
            'id' ,
            'url' ,
            'name' ,
            'position' ,
            'active' ,
            'home' ,
            'ord' ,
            'seo_title' ,
            'seo_desc' ,
            'seo_keyword' ,
            'parent' ,
        ];
    }

    /**
     * Gets query for [[News]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['cat_new_id' => 'id']);
    }

    public static function getAllCat($id){
        if($id=='' || is_null($id))
            return Catnew::find()->all();
        return Catnew::find()->where('id <> :id and parent <> :id',[':id'=>$id])->all();
    }

    public function afterDelete()
    {
        Catnew::updateAll(['parent'=>'-1'],['parent'=>$this->id]);
    }

    public function beforeDelete()
    {
        foreach ($this->news as $new){
            $new->delete();
        }
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public static function getPosition(){
        return [
            self::CatNew =>'Chuyên mục tin tức bình thường',
            self::AdsCatNew=>'Chuyên mục tin trên header quảng cáo',
        ];
    }
}
