<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= 'Product'.' '. Html::encode($this->title) ?></h2>
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
            'attribute' => 'entity.name',
            'label' => 'Entity',
        ],
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
</div>
