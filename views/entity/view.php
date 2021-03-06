<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Entity */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Entity', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entity-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= 'Entity'.' '. Html::encode($this->title) ?></h2>
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
        'name',
        'note',
        [
            'attribute' => 'ownedBy.username',
            'label' => 'Owned By',
        ],
        'platform',
        'shopurl:url',
        'apiver',
        'apikey',
        'apipw',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerCamp->totalCount){
    $gridColumnCamp = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            'desc',
            'target',
            'note',
            'created_by',
            'campdate',
                ];
    echo Gridview::widget([
        'dataProvider' => $providerCamp,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-camp']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Camp'),
        ],
        'export' => false,
        'columns' => $gridColumnCamp
    ]);
}
?>

    </div>
    <div class="row">
        <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'email',
        'password_hash',
        'auth_key',
        'unconfirmed_email',
        'registration_ip',
        'flags',
        'confirmed_at',
        'blocked_at',
        'last_login_at',
        'last_login_ip',
        'auth_tf_key',
        'auth_tf_enabled',
        'password_changed_at',
        'gdpr_consent',
        'gdpr_consent_date',
        'gdpr_deleted',
    ];
    echo DetailView::widget([
        'model' => $model->ownedBy,
        'attributes' => $gridColumnUser    ]);
    ?>
    <div class="row">
        <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'email',
        'password_hash',
        'auth_key',
        'unconfirmed_email',
        'registration_ip',
        'flags',
        'confirmed_at',
        'blocked_at',
        'last_login_at',
        'last_login_ip',
        'auth_tf_key',
        'auth_tf_enabled',
        'password_changed_at',
        'gdpr_consent',
        'gdpr_consent_date',
        'gdpr_deleted',
    ];
    echo DetailView::widget([
        'model' => $model->updatedBy,
        'attributes' => $gridColumnUser    ]);
    ?>
    
    <div class="row">
<?php
if($providerOrd->totalCount){
    $gridColumnOrd = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            'last_synced_at',
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
    echo Gridview::widget([
        'dataProvider' => $providerOrd,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-ord']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Ord'),
        ],
        'export' => false,
        'columns' => $gridColumnOrd
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerProduct->totalCount){
    $gridColumnProduct = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
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
    echo Gridview::widget([
        'dataProvider' => $providerProduct,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-product']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Product'),
        ],
        'export' => false,
        'columns' => $gridColumnProduct
    ]);
}
?>

    </div>
</div>
