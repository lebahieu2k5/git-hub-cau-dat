<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\News */
?>
<div class="news-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'active',
            'brief',
            'cat_new_id',
            'content:ntext',
            'home',
            'hot',
            'image:ntext',
            'luotxem',
            'posted_date',
            'seo_desc:ntext',
            'seo_title',
            'seo_keyword',
            'tags:ntext',
            'title',
            'url:ntext',
        ],
    ]) ?>

</div>
