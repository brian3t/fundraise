<?php

use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

$dataProvider = new ArrayDataProvider([
        'allModels' => $model->products,
        'key' => 'id'
    ]);
    $gridColumns = [
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
        ['attribute' => 'img', 'class' => 'usv\yii2helper\grid\ImgColumn'],
        'json_data',
        'fulfillment_service',
        'inventory_quantity',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'product'
        ],
    ];

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
