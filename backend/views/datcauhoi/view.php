<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Datcauhoi */
?>
<div class="datcauhoi-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tieude:ntext',
            'tennguoibenh:ntext',
            'noidung:ntext',
            'email:email',
            'filedinhkem:ntext',
            'noidungtraloi:ntext',
            'dateTime',
            'tenbacsi:ntext',
        ],
    ]) ?>

</div>
