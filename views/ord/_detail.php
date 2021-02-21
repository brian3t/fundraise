<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ord */

?>
<div class="ord-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'last_synced_at',
        [
            'attribute' => 'entity.name',
            'label' => 'Entity',
        ],
        'order_number',
        'spfid',
        'spf_note',
        'total_price',
        'taxes_included',
        'financial_status',
        'confirmed',
        'total_discounts',
        'spf_name',
        'app_id',
        'fulfillment_status',
        'tags',
        'contact_email:email',
        'order_status_url:url',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
</div>
