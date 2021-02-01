<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CampUser */

$this->title = 'Save As New Camp User: '. ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Camp User', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Save As New';
?>
<div class="camp-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
