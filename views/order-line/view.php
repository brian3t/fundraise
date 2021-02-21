<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\OrderLine */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Line', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-line-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= 'Order Line'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
            <?= Html::a('Save As New', ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
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
    <div class="row">
        <h4>Ord<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnOrd = [
        ['attribute' => 'id', 'visible' => false],
        'last_synced_at',
        'entity_id',
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
        'contact_email',
        'order_status_url',
    ];
    echo DetailView::widget([
        'model' => $model->order,
        'attributes' => $gridColumnOrd    ]);
    ?>
    <div class="row">
        <h4>Product<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnProduct = [
        ['attribute' => 'id', 'visible' => false],
        'entity_id',
        'title',
        'body_html',
        'variantid',
        'spfid',
        'price',
        'sku',
        'taxable',
        'weight',
        'weight_unit',
        'inventory_item_id',
        'requires_shipping',
        'img',
        'json_data',
        'fulfillment_service',
        'inventory_quantity',
    ];
    echo DetailView::widget([
        'model' => $model->product,
        'attributes' => $gridColumnProduct    ]);
    ?>
</div>
