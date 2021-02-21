<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ord */

$this->title = 'Save As New Ord: '. ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ord', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Save As New';
?>
<div class="ord-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
