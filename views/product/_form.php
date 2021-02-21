<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'entity_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Entity::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Entity'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title']) ?>

    <?= $form->field($model, 'body_html')->textInput(['maxlength' => true, 'placeholder' => 'Body Html']) ?>

    <?= $form->field($model, 'variantid')->textInput(['placeholder' => 'Variantid']) ?>

    <?= $form->field($model, 'spfid')->textInput(['placeholder' => 'Spfid']) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true, 'placeholder' => 'Price']) ?>

    <?= $form->field($model, 'sku')->textInput(['maxlength' => true, 'placeholder' => 'Sku']) ?>

    <?= $form->field($model, 'taxable')->checkbox() ?>

    <?= $form->field($model, 'weight')->textInput(['maxlength' => true, 'placeholder' => 'Weight']) ?>

    <?= $form->field($model, 'weight_unit')->textInput(['maxlength' => true, 'placeholder' => 'Weight Unit']) ?>

    <?= $form->field($model, 'inventory_item_id')->textInput(['placeholder' => 'Inventory Item']) ?>

    <?= $form->field($model, 'requires_shipping')->checkbox() ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true, 'placeholder' => 'Img']) ?>

    <?= $form->field($model, 'json_data')->textInput(['maxlength' => true, 'placeholder' => 'Json Data']) ?>

    <?= $form->field($model, 'fulfillment_service')->textInput(['maxlength' => true, 'placeholder' => 'Fulfillment Service']) ?>

    <?= $form->field($model, 'inventory_quantity')->textInput(['maxlength' => true, 'placeholder' => 'Inventory Quantity']) ?>

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
