<div class="form-group" id="add-order-line">
<?php

use kartik\builder\TabularForm;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'OrderLine',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'product_id' => [
            'label' => 'Product',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Product::find()->orderBy('title')->asArray()->all(), 'id', 'title'),
                'options' => ['placeholder' => 'Choose Product'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'spfid' => ['type' => TabularForm::INPUT_TEXT],
        'variant_id' => ['type' => TabularForm::INPUT_TEXT],
        'quantity' => ['type' => TabularForm::INPUT_TEXT],
        'fulfillment_service' => ['type' => TabularForm::INPUT_TEXT],
        'requires_shipping' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'price' => ['type' => TabularForm::INPUT_TEXT],
        'total_discount' => ['type' => TabularForm::INPUT_TEXT],
        'fulfillment_status' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowOrderLine(' . $key . '); return false;', 'id' => 'order-line-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Order Line', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowOrderLine()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

