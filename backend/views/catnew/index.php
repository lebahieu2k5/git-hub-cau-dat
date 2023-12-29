<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CatnewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chuyên mục tin tức';
$this->params['breadcrumbs'][] = ['name'=>$this->title,'link'=>'javascript:void(0)'];

CrudAsset::register($this);

?>
<div class="catnew-index">
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
                    'attribute'=>'name',
                    'headerOptions'=>['style'=>'text-align:center;'],
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'position',
                    'value'=>function($data){
                        return \common\models\Catnew::getPosition()[$data->position];
                    },
                    'format' => 'raw',
                    'headerOptions'=>['style'=>'text-align:center; width:300px'],
                    'contentOptions'=>['style'=>'text-align:center'],
                    'filter'=>Html::activeDropDownList($searchModel, 'position', \common\models\Catnew::getPosition(),['class'=>'form-control','prompt' => 'Hiển thị tất cả']),
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'ord',
                    'value'=>function($data){
                        return Html::input('number', '', $data->ord, ['control'=>'catnew', 'vals'=>$data->id,'class'=>"ord-change form-control",'min'=>0]);
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
                        return ($data->active==1)?"<a control='catnew' vals=".$data->id." class=\"active-change glyphicon glyphicon-ok text-success\"></a>":"<a control='catnew' vals=".$data->id." class=\"active-change glyphicon glyphicon-remove text-danger\"></a>";
                    },

                    'filter' =>Html::dropDownList('CatnewSearch[active]',$searchModel->active,\yii\helpers\ArrayHelper::map([['id'=>0,'name'=>'Không'],['id'=>1,'name'=>'Có']], 'id', 'name'),['class'=>'form-control','prompt'=>'']),
                    'format' => 'raw',
                    'headerOptions'=>['style'=>'text-align:center; width:100px'],
                    'contentOptions'=>['style'=>'text-align:center'],
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'home',
                    'value'=>function($data){
                        return ($data->home==1)?"<a control='catnew' vals=".$data->id." class=\"home-change glyphicon glyphicon-ok text-success\"></a>":"<a control='catnew' vals=".$data->id." class=\"home-change glyphicon glyphicon-remove text-danger\"></a>";
                    },
                    'filter' =>Html::dropDownList('CatnewSearch[home]',$searchModel->home,\yii\helpers\ArrayHelper::map([['id'=>0,'name'=>'Không'],['id'=>1,'name'=>'Có']], 'id', 'name'),['class'=>'form-control','prompt'=>'']),
                    'format' => 'raw',
                    'headerOptions'=>['style'=>'text-align:center; width:100px'],
                    'contentOptions'=>['style'=>'text-align:center'],
                ],

//                [
//                    'class'=>'\kartik\grid\DataColumn',
//                    'attribute'=>'parent',
//                    'value'=>function($data){
//                        if($data->id==3||$data->id==4) return "";
//                        $a=\common\models\Catnew::getAllCat($data->id);
//                        array_unshift($a,['id'=>'-1','name'=>'Not Set']);
//                        return \kartik\select2\Select2::widget([
//                            'name' => 'parent',
//                            'value' => $data->parent,
//                            'data' => \yii\helpers\ArrayHelper::map($a, 'id', 'name'),
//                            'options' => ['multiple' => false, 'placeholder' => 'Update parent ...','class'=>'update-parent','vals'=>$data->id,'control'=>'catnew']
//                        ]);
//                    },
//                    'headerOptions'=>['style'=>'text-align:center; width:200px'],
//                    'filterType' => GridView::FILTER_SELECT2,
//                    'filter' =>\yii\helpers\ArrayHelper::map(\common\models\Catnew::find()->all(), 'id', 'name'),
//                    'filterWidgetOptions' => [
//                        'pluginOptions' => ['allowClear' => true],
//                    ],
//                    'filterInputOptions' => ['prompt' => 'Hiển thị tất cả'],
//                    'format'=>'raw'
//                ],
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
                            return true;
                        },
                        'prints' => function ($model) {
                            return true;
                        },
                        'delete'=>function($model){
                            return true;
                        }

                    ]
                ],

            ),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Create new Catnews','class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Catnews listing',
                'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
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
    "footer"=>"",// always need it for jquery
    "size"=>Modal::SIZE_LARGE
])?>
<?php Modal::end(); ?>
