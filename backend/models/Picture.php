<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "picture".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $image
 * @property string|null $posted_date
 * @property int|null $home
 * @property int|null $ord
 * @property int $album_id
 *
 * @property Picture $album
 * @property Picture[] $pictures
 */
class Picture extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'picture';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image'], 'string'],
            [['home', 'ord', 'album_id'], 'integer'],
            [['album_id'], 'required'],
            [['name', 'posted_date'], 'string', 'max' => 255],
            [['album_id'], 'exist', 'skipOnError' => true, 'targetClass' => Picture::className(), 'targetAttribute' => ['album_id' => 'id']],
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
            'posted_date' => 'Posted Date',
            'home' => 'Home',
            'ord' => 'Ord',
            'album_id' => 'Album ID',
        ];
    }

    /**
     * Gets query for [[Album]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlbum()
    {
        return $this->hasOne(Picture::className(), ['id' => 'album_id']);
    }

    /**
     * Gets query for [[Pictures]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPictures()
    {
        return $this->hasMany(Picture::className(), ['album_id' => 'id']);
    }
}
