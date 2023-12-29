<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property int|null $active
 * @property string|null $brief
 * @property int $cat_new_id
 * @property string|null $content
 * @property int|null $home
 * @property int|null $hot
 * @property string|null $image
 * @property int|null $luotxem
 * @property string|null $posted_date
 * @property string|null $seo_desc
 * @property string|null $seo_title
 * @property string|null $seo_keyword
 * @property string|null $tags
 * @property string|null $title
 * @property string|null $url
 *
 * @property Catnew $catNew
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['active', 'cat_new_id', 'home', 'hot', 'luotxem'], 'integer'],
            [['cat_new_id'], 'required'],
            [['content', 'image', 'seo_desc', 'tags', 'url'], 'string'],
            [['posted_date'], 'safe'],
            [['brief', 'seo_title', 'seo_keyword', 'title'], 'string', 'max' => 255],
            [['cat_new_id'], 'exist', 'skipOnError' => true, 'targetClass' => Catnew::className(), 'targetAttribute' => ['cat_new_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'active' => 'Hiển thị',
            'brief' => 'Mô tả ngắn gọn',
            'cat_new_id' => 'Chuyên mục tin tức',
            'content' => 'Nội dung',
            'home' => 'Hiển thị trang chủ',
            'hot' => 'Nổi bật',
            'image' => 'Image',
            'luotxem' => 'Lượt xem',
            'posted_date' => 'Thời gian',
            'seo_desc' => 'Seo Desc',
            'seo_title' => 'Seo Title',
            'seo_keyword' => 'Seo Keyword',
            'tags' => 'Tags',
            'title' => 'Tiêu đề bài viết',
            'url' => 'Url',
        ];
    }

    /**
     * Gets query for [[CatNew]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatNew()
    {
        return $this->hasOne(Catnew::className(), ['id' => 'cat_new_id']);
    }

    /**
     * @inheritDoc
     */
    public function beforeSave($insert)
    {
        $file = UploadedFile::getInstanceByName('fileupload');
        $rootFolder = Yii::getAlias('@root');
        // thêm mới
        if(!isset($this->id)){
            if(!is_null($file)){
                // tạo thư mục lưu ảnh cho bài viết
                $folderImages = dirname(dirname(__DIR__)).'/images/';

                if (!file_exists($folderImages)) {
                    mkdir($folderImages, 0777, true);
                    mkdir($folderImages.'news/', 0777, true);
                }else if(!file_exists($folderImages.'news/')){
                    mkdir($folderImages.'news/', 0777, true);
                }

                $now = new \DateTime();
                $filename= "/images/news/".$now->getTimestamp().$file->name;
                $path = $rootFolder.$filename;

                // tạm thời lưu ảnh
                $file->saveAs($path);
                $this->image = $filename;

                // lấy thông tin extension của ảnh
                $exploded = explode('.', $path);
                $ext = $exploded[count($exploded) - 1];

                // kiểm tra extension của ảnh có phải là đuôi jpg hoặc jpeg không
                if (!preg_match('/jpg|jpeg/i', $ext)) {
                    // nếu không phải jpg hay jpeg thì đổi file mở rộng thành jpg
                    if (\func::convertImage($path, $path . ".jpg", 100) == 1) {
                        $this->image = $path . ".jpg";
                    }
                }
            }
        }else{ // cập nhật ảnh mới
            if(!is_null($file)){
                // tạo thư mục lưu ảnh cho bài viết
                $folderImages = dirname(dirname(__DIR__)).'/images/';

                if (!file_exists($folderImages)) {
                    mkdir($folderImages, 0777, true);
                    mkdir($folderImages.'news/', 0777, true);
                }else if(!file_exists($folderImages.'news/')){
                    mkdir($folderImages.'news/', 0777, true);
                }

                $oldNews = News::findOne(['id' => $this->id]);
                //xóa ảnh cũ
                unlink($rootFolder.$oldNews->image);

                $now = new \DateTime();
                $filename= "/images/news/".$now->getTimestamp().$file->name;
                $path = $rootFolder.$filename;

                // tạm thời lưu ảnh
                $file->saveAs($path);
                $this->image = $filename;

                // lấy thông tin extension của ảnh
                $exploded = explode('.', $path);
                $ext = $exploded[count($exploded) - 1];

                // kiểm tra extension của ảnh có phải là đuôi jpg hoặc jpeg không
                if (!preg_match('/jpg|jpeg/i', $ext)) {
                    // nếu không phải jpg hay jpeg thì đổi file mở rộng thành jpg
                    if (\func::convertImage($path, $path . ".jpg", 100) == 1) {
                        $this->image = $path . ".jpg";
                    }
                }
            }
        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}
