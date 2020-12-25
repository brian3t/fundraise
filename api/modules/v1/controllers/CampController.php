<?php

namespace app\api\modules\v1\controllers;

use app\api\base\controllers\BaseActiveController;
use app\models\Camp;
use yii\data\ActiveDataProvider;
use yii\rest\IndexAction;


require_once realpath(dirname(dirname(dirname(dirname(__DIR__))))). "/models/constants.php";
class CampController extends BaseActiveController
{
    // We are using the regular web app modules:
    public $modelClass = 'app\models\Camp';

    public function actions()
    {
        $actions = parent::actions();

        return $actions;
    }
}
