<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrderLine */

$this->title = 'Save As New Order Line: '. ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Line', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Save As New';
?>
<div class="order-line-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
