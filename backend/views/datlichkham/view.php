<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Datlichkham */
?>
<div class="datlichkham-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'dienthoai',
            'donvi:ntext',
            'email:email',
            'hoten:ntext',
            'ngaykham',
            'noidung:ntext',
            'status',
            'tieude',
            'time',
        ],
    ]) ?>

</div>
