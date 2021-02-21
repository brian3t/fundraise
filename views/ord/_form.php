<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ord */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'OrderLine', 
        'relID' => 'order-line', 
        'value' => \yii\helpers\Json::encode($model->orderLines),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="ord-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'last_synced_at')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Last Synced At',
                'autoclose' => true,
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'entity_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Entity::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Entity'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'order_number')->textInput(['placeholder' => 'Order Number']) ?>

    <?= $form->field($model, 'spfid')->textInput(['placeholder' => 'Spfid']) ?>

    <?= $form->field($model, 'spf_note')->textInput(['maxlength' => true, 'placeholder' => 'Spf Note']) ?>

    <?= $form->field($model, 'total_price')->textInput(['maxlength' => true, 'placeholder' => 'Total Price']) ?>

    <?= $form->field($model, 'taxes_included')->checkbox() ?>

    <?= $form->field($model, 'financial_status')->dropDownList([ 'authorized' => 'Authorized', 'paid' => 'Paid', 'partially_paid' => 'Partially paid', 'partially_refunded' => 'Partially refunded', 'pending' => 'Pending', 'refunded' => 'Refunded', 'voided' => 'Voided', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'confirmed')->checkbox() ?>

    <?= $form->field($model, 'total_discounts')->textInput(['maxlength' => true, 'placeholder' => 'Total Discounts']) ?>

    <?= $form->field($model, 'spf_name')->textInput(['maxlength' => true, 'placeholder' => 'Spf Name']) ?>

    <?= $form->field($model, 'app_id')->textInput(['placeholder' => 'App']) ?>

    <?= $form->field($model, 'fulfillment_status')->dropDownList([ 'fulfilled' => 'Fulfilled', 'partial' => 'Partial', 'restocked' => 'Restocked', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'tags')->textInput(['maxlength' => true, 'placeholder' => 'Tags']) ?>

    <?= $form->field($model, 'contact_email')->textInput(['maxlength' => true, 'placeholder' => 'Contact Email']) ?>

    <?= $form->field($model, 'order_status_url')->textInput(['maxlength' => true, 'placeholder' => 'Order Status Url']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('OrderLine'),
            'content' => $this->render('_formOrderLine', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->orderLines),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
    <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php endif; ?>
    <?php if(Yii::$app->controller->action->id != 'create'): ?>
        <?= Html::submitButton('Save As New', ['class' => 'btn btn-info', 'value' => '1', 'name' => '_asnew']) ?>
    <?php endif; ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
