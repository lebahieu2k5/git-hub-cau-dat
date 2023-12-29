<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tin tức';
$this->params['breadcrumbs'][] = ['name'=>$this->title,'link'=>'javascript:void(0)'];

CrudAsset::register($this);

?>
<div class="news-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'pjaxSettings' => ['options' => ['enablePushState' => false]],
            'summary' => 'Từ {begin} đến {end}/ Tổng {totalCount} bản ghi',
            'columns' => array(
                [
                    'class' => 'kartik\grid\CheckboxColumn',
                    'width' => '20px',
                ],
                [
                    'class' => 'kartik\grid\SerialColumn',
                    'width' => '30px',
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'image',
                    'value'=>function($data){
                        return Html::img(Yii::$app->urlManagerFrontend->baseUrl.$data->image,['style'=>'width:50px']);
                    },
                    'headerOptions'=>['style'=>'text-align:center','class'=>'img-grid'],
                    'filter'=>false,
                    'format'=>'raw'
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'title',
                    'headerOptions'=>['style'=>'text-align:center;'],
                ],

                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'posted_date',
                    'headerOptions'=>['style'=>'text-align:center;'],
                    'filter'=>false
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'hot',
                    'value'=>function($data){
                        return Html::input('number','',$data->hot,['control'=>'news', 'vals'=>$data->id,'class'=>"hot-change form-control",'min'=>0]);
                    },
                    'format' => 'raw',
                    'headerOptions'=>['style'=>'text-align:center; width:100px'],
                    'contentOptions'=>['style'=>'text-align:center'],
                    'filter'=>false
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'active',
                    'value'=>function($data){
                        return ($data->active==1)?"<a control='news' vals=".$data->id." class=\"active-change glyphicon glyphicon-ok text-success\"></a>":"<a control='news' vals=".$data->id." class=\"active-change glyphicon glyphicon-remove text-danger\"></a>";
                    },

                    'filter' =>Html::dropDownList('NewsSearch[active]',$searchModel->active,\yii\helpers\ArrayHelper::map([['id'=>0,'name'=>'Không'],['id'=>1,'name'=>'Có']], 'id', 'name'),['class'=>'form-control','prompt'=>'']),
                    'format' => 'raw',
                    'headerOptions'=>['style'=>'text-align:center; width:100px'],
                    'contentOptions'=>['style'=>'text-align:center'],
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'home',
                    'value'=>function($data){
                        return ($data->home==1)?"<a control='news' vals=".$data->id." class=\"home-change glyphicon glyphicon-ok text-success\"></a>":"<a control='news' vals=".$data->id." class=\"home-change glyphicon glyphicon-remove text-danger\"></a>";
                    },
                    'filter' =>Html::dropDownList('NewsSearch[home]',$searchModel->home,\yii\helpers\ArrayHelper::map([['id'=>0,'name'=>'Không'],['id'=>1,'name'=>'Có']], 'id', 'name'),['class'=>'form-control','prompt'=>'']),
                    'format' => 'raw',
                    'headerOptions'=>['style'=>'text-align:center; width:100px'],
                    'contentOptions'=>['style'=>'text-align:center'],
                ],
//                [
//                    'class'=>'\kartik\grid\DataColumn',
//                    'attribute'=>'lang_id',
//                    'value'=>function($data){
//                        if(is_numeric((int)$data->lang_id) && (int)$data->lang_id>0){
//                            $user = \common\models\Admin::findOne(['id'=>$data->lang_id]);
//                            if(!is_null($user))
//                                return $user->username;
//                            else{
//                                return "#N/A";
//                            }
//                        }
//                    },
//                    'filterType' => GridView::FILTER_SELECT2,
//                    'filter' =>\yii\helpers\ArrayHelper::map(\common\models\User::find()->all(), 'id', 'username'),
//                    'filterWidgetOptions' => [
//                        'pluginOptions' => ['allowClear' => true],
//                    ],
//                    'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],
//                    'format'=>'raw'
//                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'cat_new_id',
                    'value'=>function($data){
                        return \kartik\select2\Select2::widget([
                            'name' => 'cat_new_id',
                            'value' => $data->cat_new_id,
                            'data' => \yii\helpers\ArrayHelper::map(\common\models\Catnew::find()->all(), 'id', 'name'),
                            'options' => ['multiple' => false, 'placeholder' => 'Update parent ...','class'=>'update-foreign','vals'=>$data->id,'control'=>'news','foreign'=>'cat_new_id']
                        ]);
                    },
                    'headerOptions'=>['style'=>'text-align:center; width:200px'],
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' =>\yii\helpers\ArrayHelper::map(\common\models\Catnew::find()->all(), 'id', 'name'),
                    'filterWidgetOptions' => [
                        'pluginOptions' => ['allowClear' => true],
                    ],
                    'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],
                    'format'=>'raw'
                ],
                [

                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'cat_new_id',
                    'value'=>function ($model, $key, $index, $widget) {
                        return $model->catNew->name;
                    },
                    'group'=>true,
                    'groupedRow'=>true,                    // move grouped column to a single grouped row
                    'groupOddCssClass'=>'kv-grouped-row',  // configure odd group cell css class
                    'groupEvenCssClass'=>'kv-grouped-row',
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'dropdown' => false,
                    'vAlign'=>'middle',
                    'urlCreator' => function($action, $model, $key, $index) {
                        return Url::to([$action,'id'=>$key]);
                    },
                    'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
                    'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
                    'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete',
                        'data-confirm'=>false, 'data-method'=>false,
                        'data-request-method'=>'post',
                        'data-toggle'=>'tooltip',
                        'data-confirm-title'=>'Xác nhận',
                        'data-confirm-message'=>'Bạn có chắc là sẽ xóa mục này không?'
                    ],
                    'visibleButtons' => [

                        'update' => function ($model) {
//                            if($model->id==3||$model->id==4) return false;
                            return true;
                        },
                        'prints' => function ($model) {
//                            if($model->id==3||$model->id==4) return false;
                            return true;
                        },
                        'delete'=>function($model){
//                            if($model->id==3||$model->id==4) return false;
                            return true;
                        }

                    ]
                ],

            ),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['news/newpost'],
                    ['title'=> 'Create new News','class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                    '{toggleData}'

                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Danh sách tin tức',
                'before'=>'<em>* Thay đổi kích thước các cột của bảng giống như bảng tính bằng cách kéo các cạnh cột.</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
                                ["bulk-delete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Are you sure?',
                                    'data-confirm-message'=>'Are you sure want to delete this item'
                                ]),
                        ]).                        
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
