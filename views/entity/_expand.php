<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;

$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Entity'),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
        [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Camp'),
        'content' => $this->render('_dataCamp', [
            'model' => $model,
            'row' => $model->camps,
        ]),
    ],
                    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Ord'),
        'content' => $this->render('_dataOrd', [
            'model' => $model,
            'row' => $model->ords,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Product'),
        'content' => $this->render('_dataProduct', [
            'model' => $model,
            'row' => $model->products,
        ]),
    ],
    ];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>
