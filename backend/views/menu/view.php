<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */
?>
<div class="menu-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'position',
            'type',
            'link:ntext',
            'parent',
            'ord',
            'new_tab',
            'active',
            'symbol',
            'menuStyle',
            'background',
            'background1',
            'lang_id',
        ],
    ]) ?>

</div>
