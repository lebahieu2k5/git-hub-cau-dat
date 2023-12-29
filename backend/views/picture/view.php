<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Picture */
?>
<div class="picture-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'image:ntext',
            'posted_date',
            'home',
            'ord',
            'album_id',
        ],
    ]) ?>

</div>
