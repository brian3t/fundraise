<div class="form-group" id="add-ord">
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
    'formName' => 'Ord',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'last_synced_at' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                'saveFormat' => 'php:Y-m-d H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Last Synced At',
                        'autoclose' => true,
                    ]
                ],
            ]
        ],
        'order_number' => ['type' => TabularForm::INPUT_TEXT],
        'spfid' => ['type' => TabularForm::INPUT_TEXT],
        'spf_note' => ['type' => TabularForm::INPUT_TEXT],
        'total_price' => ['type' => TabularForm::INPUT_TEXT],
        'taxes_included' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'financial_status' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ 'authorized' => 'Authorized', 'paid' => 'Paid', 'partially_paid' => 'Partially paid', 'partially_refunded' => 'Partially refunded', 'pending' => 'Pending', 'refunded' => 'Refunded', 'voided' => 'Voided', '' => '', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Financial Status'],
                    ]
        ],
        'confirmed' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'total_discounts' => ['type' => TabularForm::INPUT_TEXT],
        'spf_name' => ['type' => TabularForm::INPUT_TEXT],
        'app_id' => ['type' => TabularForm::INPUT_TEXT],
        'fulfillment_status' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ 'fulfilled' => 'Fulfilled', 'partial' => 'Partial', 'restocked' => 'Restocked', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Fulfillment Status'],
                    ]
        ],
        'tags' => ['type' => TabularForm::INPUT_TEXT],
        'contact_email' => ['type' => TabularForm::INPUT_TEXT],
        'order_status_url' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowOrd(' . $key . '); return false;', 'id' => 'ord-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Ord', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowOrd()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

