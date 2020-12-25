<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Camp */

$this->title = 'Create Camp';
$this->params['breadcrumbs'][] = ['label' => 'Camp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="camp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
