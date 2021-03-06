<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Bvideo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bvideo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bvideo-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Bvideo'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
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
            'attribute' => 'band.name',
            'label' => 'Band',
        ],
        'video_url:url',
        'is_selected',
        'seq',
        'note',
        'last_processed',
        [
            'attribute' => 'processedBy.username',
            'label' => 'Processed By',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
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
        'confirmed_at',
        'unconfirmed_email',
        'blocked_at',
        'registration_ip',
        'flags',
        'first_name',
        'last_name',
        'note',
        'phone_number_type',
        'phone_number',
        'birthdate',
        'birth_month',
        'birth_year',
        'favorite_genres',
        'favorite_venue_types',
        'website_url',
        'twitter_id',
        'facebook_id',
        'instagram_id',
        'google_id',
        'address1',
        'address2',
        'city',
        'state',
        'zipcode',
        'country',
        'last_login_at',
    ];
    echo DetailView::widget([
        'model' => $model->processedBy,
        'attributes' => $gridColumnUser    ]);
    ?>
    <div class="row">
        <h4>Band<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnBand = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'user_id',
        'logo',
        'lno_score',
        'type',
        'genre',
        'similar_to',
        'hometown_city',
        'hometown_state',
        'description',
        'website',
        'youtube',
        'instagram',
        'facebook',
        'twitter',
        'source',
        'attr',
        'scrape_status',
        'gg_last_attempt',
        'ytlink_first',
    ];
    echo DetailView::widget([
        'model' => $model->band,
        'attributes' => $gridColumnBand    ]);
    ?>
</div>
