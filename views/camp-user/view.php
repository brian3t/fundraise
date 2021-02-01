<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\CampUser */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Camp User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="camp-user-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= 'Camp User'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
            <?= Html::a('Save As New', ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'camp.id',
            'label' => 'Campid',
        ],
        [
            'attribute' => 'user.username',
            'label' => 'Userid',
        ],
        'assigned_by',
        'goal',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Camp<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnCamp = [
        ['attribute' => 'id', 'visible' => false],
        'desc',
        'target',
        'note',
        'campdate',
        'entity_id',
    ];
    echo DetailView::widget([
        'model' => $model->camp,
        'attributes' => $gridColumnCamp    ]);
    ?>
    <div class="row">
        <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'email',
        'password_hash',
        'auth_key',
        'unconfirmed_email',
        'registration_ip',
        'flags',
        'confirmed_at',
        'blocked_at',
        'last_login_at',
        'last_login_ip',
        'auth_tf_key',
        'auth_tf_enabled',
        'password_changed_at',
        'gdpr_consent',
        'gdpr_consent_date',
        'gdpr_deleted',
    ];
    echo DetailView::widget([
        'model' => $model->user,
        'attributes' => $gridColumnUser    ]);
    ?>
</div>
