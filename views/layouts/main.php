<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
  <link rel="stylesheet"
        href="//<?= Yii::$app->request->serverName . "/" . Yii::$app->request->baseUrl ?>less/stylesheets/custom.css">
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/img/logo.png', ['class' => 'sml']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-nav navbar-light navbar-expand-lg w-100',
//            'class' => 'navbar navbar-nav navbar-default navbar-fixed-top',
        ],
    ]);
    echo '<span class="version">v02.21</span>';
    $items = [];
    $admin_items = [

    ];
    $items = array_merge($items, [
        [
            'label' => 'Dashboard',
            'url' => Url::toRoute(['/u/dashboard', 'id' => Yii::$app->user->id]),
        ], [
            'label' => 'Entity',
            'url' => Url::toRoute(['/entity/index']),
        ],

    ]);
    $items = array_merge($items, [
        [
            'label' => 'Campaign',
            'url' => Url::toRoute(['/camp/index']),
        ],
        ['label' => 'Product', 'url' => Url::toRoute(['/product/index']),],
        ['label' => 'Order', 'url' => Url::toRoute(['/ord/index']),],
        ['label' => 'Order Line', 'url' => Url::toRoute(['/order-line/index']),],

    ]);
    if (! Yii::$app->user->isGuest) {
        $items[] = [
            'label' => 'My Account',
            'items' => [
                ['label' => 'Profile', 'url' => '/user/settings/profile'],
                ['label' => 'Account', 'url' => '/user/settings/account'],
                // ['label' => 'Social Networks', 'url' => '/user/settings/networks'],
                ['label' => 'Log Out', 'url' => '/user/security/logout', 'linkOptions' => ['data-method' => 'post']],

            ],
        ];
        if (Yii::$app->user->identity->getIsAdmin()) {
            $admin_items[] = ['label' => 'User Mgmt', 'url' => '/user/admin/index'];
            $items[] = [
                'label' => 'Admin',
                'items' => $admin_items,
            ];
        }
    } else {
        $items[] = ['label' => 'Sign Up', 'url' => ['/user/registration/register']];
        $items[] = ['label' => 'Login', 'url' => ['/user/security/login']];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $items,
    ]);

    ?>

    <?php
    NavBar::end();
    ?>

  <div class="container-fluid">
      <?= Breadcrumbs::widget([
          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>
    <!--        <div class="flash">
            <?php /*foreach (Yii::$app->session->allFlashes as $key => $message) {
                echo \kartik\widgets\Alert::widget([
                    'bsVersion' => '4.x',
                    'type' => Alert::TYPE_INFO,
                    'title' => ucwords($key),
                    'body' => is_array($message) ? implode('<br/>', $message) : $message,
                    'icon' => 'glyphicon glyphicon-info-sign',
                ]);
            }
            */ ?>
        </div>-->
      <?= $content ?>
  </div>
</div>

<footer class="footer">
  <div class="container">
    <p class="pull-left">&copy; Craftbelly Admin <?= date('Y') ?></p>

  </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
