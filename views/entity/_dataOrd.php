<?php

use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

$dataProvider = new ArrayDataProvider([
        'allModels' => $model->ords,
        'key' => 'id'
    ]);
    $gridColumns = [
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
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'ord'
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
