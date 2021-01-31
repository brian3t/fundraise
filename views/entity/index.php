<?php

/* @var $this yii\web\View */

/* @var $dataProvider yii\data\ActiveDataProvider */

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Html;

$this->title = 'Entity';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="entity-index">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
      <?= Html::a('Create Entity', ['create'], ['class' => 'btn btn-success']) ?>
  </p>
    <?php
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true
        ],
        ['attribute' => 'id', 'visible' => false],
        'name',
        'note',
        [
            'attribute' => 'owned_by',
            'label' => 'Owned By',
            'value' => function ($model) {
                if ($model->ownedBy) {
                    return $model->ownedBy->username;
                } else {
                    return NULL;
                }
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->asArray()->all(), 'id', 'username'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'User', 'id' => 'grid--owned_by']
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{edit-who-we-are} {edit-mission} {save-as-new} {view} {update} {delete}',
            'buttons' => [
                'save-as-new' => function ($url) {
                    return Html::a('<span class="glyphicon glyphicon-copy"></span>', $url, ['title' => 'Save As New']);
                },
                'edit-who-we-are' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-copy">Edit Who We Are</span>'
                        , \Yii::$app->urlManager->createUrl(['/entity/edithtml', 'id' => $model->id, 'page_to_edit' => 'who_we_are'])
                        , ['title' => 'Edit Who We Are']);
                },
                'edit-mission' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-copy">Edit Mission</span>'
                        , \Yii::$app->urlManager->createUrl(['/entity/edithtml', 'id' => $model->id, 'page_to_edit' => 'mission'])
                        , ['title' => 'Edit Mission']);
                }
            ],
        ],
    ];
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-entity']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_PDF => false
                ]
            ]),
        ],
    ]); ?>

</div>
