<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ord */

$this->title = 'Create Ord';
$this->params['breadcrumbs'][] = ['label' => 'Ord', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ord-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
