<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $position
 * @property string|null $type
 * @property string|null $link
 * @property int|null $parent
 * @property int|null $ord
 * @property int|null $new_tab
 * @property int|null $active
 * @property string|null $symbol
 * @property int|null $menuStyle
 * @property string|null $background
 * @property string|null $background1
 * @property int|null $lang_id
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position', 'parent', 'ord', 'new_tab', 'active', 'lang_id', 'menuStyle'], 'integer'],
            [['link'], 'string'],
            [['name'], 'string', 'max' => 200],
            [['background', 'background1'], 'string', 'max' => 300],
            [['type'], 'string', 'max' => 45],
            [['symbol'], 'string', 'max' => 50],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['parent' => 'id']],
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
            'position' => 'Active in Mobile',
            'type' => 'Type',
            'link' => 'Link',
            'parent' => 'Parent',
            'ord' => 'Ord',
            'new_tab' => 'New Tab',
            'active' => 'Active',
            'symbol' => 'Symbol',
            'menustyle' => 'Menu Style',
            'background' => 'Icon (PNG Recommend)',
            'background1' => 'Background1',
            'lang_id' => 'Lang ID',
        ];
    }

    public static function getRootMenu($type)
    {
        return self::find()->where(['parent'=>null, 'active'=>1, 'type'=>$type])->orderBy(['ord'=>SORT_ASC])->all();
    }

    public function getChilds()
    {
        return self::find()->where(['parent'=>$this->id, 'active'=>1])->orderBy(['ord'=>SORT_ASC])->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(Menu::className(), ['id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['parent' => 'id']);
    }
    public static function getMenuByType($type){
        return self::find()->where('type="'.$type.'" and active = 1 order by ord asc')->all();
    }
    public function getUrl(){
        return ((substr($this->link, 0, 4) != "http") ? Yii::$app->urlManager->baseUrl . $this->link : $this->link) ;
    }
}
