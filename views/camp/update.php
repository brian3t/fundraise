<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Camp */

$this->title = 'Update Camp: ' . ' ' . $model->school;
$this->params['breadcrumbs'][] = ['label' => 'Camp', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->school, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="camp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
