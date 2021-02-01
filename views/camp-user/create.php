<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CampUser */

$this->title = 'Create Camp User';
$this->params['breadcrumbs'][] = ['label' => 'Camp User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="camp-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
