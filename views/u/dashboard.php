<?php

/* @var $this \yii\web\View */
/* @var $model \app\models\User */
/* @var $providerSocialAccount \yii\data\ArrayDataProvider */
/* @var $providerToken \yii\data\ArrayDataProvider */

/* @var $profile \app\models\Profile */

/* @var $profile_usr_ava_model \app\models\u\Profile_usr_ava */

use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;

?>
<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6">
    <div class="row">
      <div class="col-sm-6 col-md-4">
        <div class="form-group field-profile-usr_ava">
          <label class="col-lg-3 control-label" for="profile-usr_ava">User Avatar</label>
          <div class="col-lg-9"><img src="/uploads/avatar/<?= $model->id . '/' . $profile->get_usr_ava() ?>" alt="user avatar" class="mw-100"></div>
            <?php $form = ActiveForm::begin() ?>
            <?= $form->field($profile_usr_ava_model, 'imageFile')
                ->widget(\kartik\file\FileInput::class, ['pluginOptions' => [
                    'showPreview' => false,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false
                ]
                ])->label('') ?>
          <button class="btn btn-sm btn-light">Change Photo</button>
            <?php ActiveForm::end() ?>
        </div>
      </div>

      <div class="col-sm-6 col-md-8">
        <h4><?= $this->title ?></h4>
        <ul style="padding: 0; list-style: none outside none;">
            <?php if (! empty($profile->location)): ?>
              <li>
                <i class="glyphicon glyphicon-map-marker text-muted"></i>
                  <?= Html::encode($profile->location) ?>
              </li>
            <?php endif; ?>
            <?php if (! empty($profile->website)): ?>
              <li>
                <i class="glyphicon glyphicon-globe text-muted"></i>
                  <?= Html::a(Html::encode($profile->website), Html::encode($profile->website)) ?>
              </li>
            <?php endif; ?>
            <?php if (! empty($profile->public_email)): ?>
              <li>
                <i class="glyphicon glyphicon-envelope text-muted"></i>
                  <?= Html::a(
                      Html::encode($profile->public_email),
                      'mailto:' .
                      Html::encode($profile->public_email)
                  )
                  ?>
              </li>
            <?php endif; ?>
          <li>
            <i class="glyphicon glyphicon-time text-muted"></i>
              <?= Yii::t('usuario', 'Joined on {0, date}', $profile->user->created_at) ?>
          </li>
        </ul>
          <?php if (! empty($profile->bio)): ?>
            <p><?= Html::encode($profile->bio) ?></p>
          <?php endif; ?>
      </div>
    </div>
  </div>
</div>
