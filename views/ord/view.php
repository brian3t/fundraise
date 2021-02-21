<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Ord */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ord', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ord-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= 'Ord'.' '. Html::encode($this->title) ?></h2>
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
    <div class="row">
        <h4>Entity<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnEntity = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'note',
        'owned_by',
        'platform',
        'shopurl',
        'apiver',
        'apikey',
        'apipw',
    ];
    echo DetailView::widget([
        'model' => $model->entity,
        'attributes' => $gridColumnEntity    ]);
    ?>
    
    <div class="row">
<?php
if($providerOrderLine->totalCount){
    $gridColumnOrderLine = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        [
                'attribute' => 'product.title',
                'label' => 'Product'
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
    echo Gridview::widget([
        'dataProvider' => $providerOrderLine,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-order-line']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Order Line'),
        ],
        'export' => false,
        'columns' => $gridColumnOrderLine
    ]);
}
?>

    </div>
</div>
