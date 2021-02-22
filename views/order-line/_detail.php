<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OrderLine */

?>
<div class="order-line-view">

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
            'attribute' => 'order.id',
            'label' => 'Order',
        ],
        [
            'attribute' => 'product.title',
            'label' => 'Product',
        ],
        'spfid',
        'variant_id',
        'quantity',
        'fulfillment_service',
        'requires_shipping',
        'price',
        'total_discount',
        'fulfillment_status',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
</div>
