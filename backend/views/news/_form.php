<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use johnitvn\ajaxcrud\CrudAsset;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
CrudAsset::register($this);
$this->title = $model->isNewRecord ? 'Viết bài mới' : 'Chỉnh sửa bài viết';
$this->params['breadcrumbs'][] = ['name' => 'Tin tức', 'link' => Yii::$app->urlManager->createUrl('news')];
$this->params['breadcrumbs'][] = ['name' => $this->title, 'link' => 'javascript:void(0)'];
$action = $model->isNewRecord ? 'news/news_post' : 'news/updatenews'
?>

<script>
    $(document).ready(function () {
        $(document).on('click','.form-label',function (e) {
            e.preventDefault();

        })
    })
</script>

<div class="news-index newpost">
    <?php $form = ActiveForm::begin([
        'method' => 'post',
        'action' => [$action],
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="col-md-9 col-xs-12">
        <?= $form->field($model, 'id', ['options' => ['class' => 'hidden']])->textInput(['type' => 'number']); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder'=>$model->attributeLabels()['title']])->label('<span class="caption-subject font-blue-steel bold uppercase">Tiêu đề</span>') ?>

        <?= $form->field($model, 'brief')->textInput(['maxlength' => 250, 'id' => 'brief', 'rows' => 10, 'cols' =>80, 'placeholder' => $model->attributeLabels()['brief']])->label('<span class="caption-subject font-blue-steel bold uppercase">Mô tả ngắn gọn</span>') ?>

        <?= $form->field($model, 'content')->textarea(['id' => 'noidung', 'rows' => 10, 'cols' =>80, 'placeholder' => $model->attributeLabels()['content']])->label('<span class="caption-subject font-blue-steel bold uppercase">Nội dung chính</span>') ?>

        <?= $form->field($model, 'seo_desc')->textarea(['rows' => 6])->label('<span class="caption-subject font-blue-steel bold uppercase">Seo Desc</span>') ?>

        <?= $form->field($model, 'seo_title')->textarea(['rows' => 6, 'maxlength' => true])->label('<span class="caption-subject font-blue-steel bold uppercase">Seo Title</span>') ?>

        <?= $form->field($model, 'seo_keyword')->textarea(['rows' => 6, 'maxlength' => true])->label('<span class="caption-subject font-blue-steel bold uppercase">Seo Keyword</span>') ?>

    </div>

    <div class=" col-md-3 col-sm-12 col-xs-12">
        <?= $form->field($model, 'cat_new_id')->dropDownList(ArrayHelper::map(\common\models\Catnew::getAllCat(''),'id','name'), ['required'=>true, 'placeholder' => $model->attributeLabels()['cat_new_id']])->label('<span class="caption-subject font-blue-steel bold uppercase">Chuyên mục tin tức</span>') ?>

        <div class="form-group">
            <?php echo Html::label('<span class="caption-subject font-blue-steel bold uppercase">Hình ảnh đại diện của tin tức:</span>','',['class'=>'form-label'])?>
            <?php echo Html::fileInput('fileupload','',['required'=>$model->isNewRecord == true,'class'=>'form-control','onChange'=>"uploadImage(this)",
                'data-target'=>"#aImgShow",
            ]);?>
            <div id="img-view">
            <?php if(!$model->isNewRecord): ?>
                <img id="aImgShow" src="<?php echo Yii::$app->urlManagerFrontend->baseUrl.$model->image?>" style="width: 150px; margin-top:20px"/>
            <?php endif; ?>
            </div>
        </div>

        <?= $form->field($model, 'hot')->dropDownList(ArrayHelper::map([['id'=>0,'ten'=>'Không'], ['id'=>1,'ten'=>'Có'],], 'id', 'ten'))->label('<span class="caption-subject font-blue-steel bold uppercase">Nổi bật</span>') ?>

        <?= $form->field($model, 'active')->dropDownList(ArrayHelper::map([['id'=>0,'ten'=>'Không'], ['id'=>1,'ten'=>'Có'],], 'id', 'ten'))->label('<span class="caption-subject font-blue-steel bold uppercase">Hiển thị</span>') ?>

        <?= $form->field($model, 'home')->dropDownList(ArrayHelper::map([['id'=>0,'ten'=>'Không'], ['id'=>1,'ten'=>'Có'],], 'id', 'ten'))->label('<span class="caption-subject font-blue-steel bold uppercase">Trang chủ</span>') ?>

        <?= $form->field($model, 'luotxem')->textInput(['type' => 'number'])->label('<span class="caption-subject font-blue-steel bold uppercase">Lượt xem:</span>') ?>

        <?= $form->field($model, 'tags')->textInput(['class'=>'tags medium', 'id' => 'tag'])->label('<span class="caption-subject font-blue-steel bold uppercase">Thẻ</span>') ?>

        <div class="form-group">
            <?php echo Html::submitButton($model->isNewRecord ? 'Đăng bài' : 'Cập nhật',['class'=>'btn blue btn-submit-tintuc','style'=>'float:right;'])?>
        </div>

    </div>
    <div class="clearfix"></div>
    <?php ActiveForm::end(); ?>
</div>

<div class="clearfix"></div>

<?php echo Html::endForm(); ?>
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$now = getdate();
$nowfullstring = $now["mday"]."/".$now["mon"]."/".$now["year"];
?>
<script>
    $(document).ready(function () {
        $('#tag').tagsInput({
            width: '100%',
            'onAddTag': function () {
                //alert(1);
            }
        });

        CKEDITOR.replace( 'noidung' ,{
            language: 'vi',
            filebrowserBrowseUrl:'/2595fcc932fcbc933591f65b0927f6ad/responsive_filemanager/filemanager/dialog.php?type=2&akey=<?=sha1("Karion3e0d56c94e15c78d3fe012bc33aba5252020".sha1($nowfullstring))?>&editor=ckeditor&fldr=',
            filebrowserUploadUrl:'/2595fcc932fcbc933591f65b0927f6ad/responsive_filemanager/filemanager/dialog.php?type=2&akey=<?=sha1("Karion3e0d56c94e15c78d3fe012bc33aba5252020" . sha1($nowfullstring))?>&editor=ckeditor&fldr=',
            filebrowserImageBrowseUrl :'/2595fcc932fcbc933591f65b0927f6ad/responsive_filemanager/filemanager/dialog.php?type=1&akey=<?=sha1("Karion3e0d56c94e15c78d3fe012bc33aba5252020" . sha1($nowfullstring))?>&editor=ckeditor&fldr='
        });

    })

</script>
