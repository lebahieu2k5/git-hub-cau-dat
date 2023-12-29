<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Contact */
?>
<div class="contact-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'about_content:ntext',
            'about_image:ntext',
            'about_title',
            'about_url:ntext',
            'address1:ntext',
            'company_name',
            'copyright:ntext',
            'email:email',
            'email_bcc:email',
            'fax',
            'footer:ntext',
            'gift:ntext',
            'hotline',
            'logo:ntext',
            'logo_footer:ntext',
            'payment:ntext',
            'phone',
            'site_desc:ntext',
            'site_keyword:ntext',
            'site_title',
            'slogan',
        ],
    ]) ?>

</div>
