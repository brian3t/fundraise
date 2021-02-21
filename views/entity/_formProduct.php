<div class="form-group" id="add-product">
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
    'formName' => 'Product',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'title' => ['type' => TabularForm::INPUT_TEXT],
        'body_html' => ['type' => TabularForm::INPUT_TEXT],
        'variantid' => ['type' => TabularForm::INPUT_TEXT],
        'spfid' => ['type' => TabularForm::INPUT_TEXT],
        'price' => ['type' => TabularForm::INPUT_TEXT],
        'sku' => ['type' => TabularForm::INPUT_TEXT],
        'taxable' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'weight' => ['type' => TabularForm::INPUT_TEXT],
        'weight_unit' => ['type' => TabularForm::INPUT_TEXT],
        'inventory_item_id' => ['type' => TabularForm::INPUT_TEXT],
        'requires_shipping' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'img' => ['type' => TabularForm::INPUT_TEXT],
        'json_data' => ['type' => TabularForm::INPUT_TEXT],
        'fulfillment_service' => ['type' => TabularForm::INPUT_TEXT],
        'inventory_quantity' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowProduct(' . $key . '); return false;', 'id' => 'product-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Product', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowProduct()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

