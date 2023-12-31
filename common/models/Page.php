<?php

namespace common\models;

use Yii;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $url
 * @property string|null $content
 * @property string|null $seo_title
 * @property string|null $seo_desc
 * @property string|null $seo_keyword
 * @property int|null $active
 * @property string|null $product
 * @property int|null $ord
 * @property string|null $image
 * @property int|null $check
 * @property string|null $brief
 * @property int|null $lang_id
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'content', 'brief', 'seo_desc', 'product', 'image'], 'string'],
            [['active','check', 'ord', 'lang_id'], 'integer'],
            [['title', 'seo_title', 'seo_keyword'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'url' => 'Url',
            'content' => 'Content',
            'seo_title' => 'Seo Title',
            'seo_desc' => 'Seo Desc',
            'seo_keyword' => 'Seo Keyword',
            'active' => 'Active',
            'product' => 'Product',
            'ord' => 'Ord',
            'lang_id' => 'Người đăng',
            'brief' => 'Tóm tắt',
            'image' => 'Hình ảnh',
            'check' => 'Hiển thị giao diện trang chủ'
        ];
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        self::updateAll(['url'=>"/".\func::taoduongdan($this->title)."-b".$this->id.".html"],['id'=>$this->id]);

        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    public function beforeSave($insert)
    {
        if($this->isNewRecord){
            $this->lang_id=Yii::$app->user->identity->id;
        }

        $file = UploadedFile::getInstanceByName('Page[image]');
        if(!is_null($file))
        {
            $rootFolder = Yii::getAlias('@root');
            $folderImages = dirname(dirname(__DIR__)).'/images/';

            //xóa ảnh cũ
            if(!$this->isNewRecord){
                $oldPage = Page::findOne(['id' => $this->id]);
//                var_dump(preg_match("/^\/images\/page\//i", $oldPage->image)>0);
//                exit();

                if(isset($oldPage) && file_exists($rootFolder.$oldPage->image) && preg_match("/^\/images\/page\//i", $oldPage->image)>0){
                    unlink($rootFolder.$oldPage->image);
                }
            }
            //end xóa ảnh cũ

            if (!file_exists($folderImages)) {
                mkdir($folderImages, 0777, true);
                mkdir($folderImages.'page/', 0777, true);
            }else if(!file_exists($folderImages.'page/')){
                mkdir($folderImages.'page/', 0777, true);
            }

            $now = new \DateTime();
            $filename= "/images/page/".$now->getTimestamp().$file->name;
            $path = $rootFolder.$filename;
            $file->saveAs($path);

            $this->image = $filename;
        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}
