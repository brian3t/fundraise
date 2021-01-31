<?php

namespace app\controllers;

use app\models\User;
use yii\filters\VerbFilter;

/**
 * Custom UserController implements the CRUD actions for User model.
 */
class UController extends UserController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['dashboard'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }


    /**
     * Displays a single User Dashboard.
     * @param integer $id
     * @return mixed
     */
    public function actionDashboard($id = null)
    {
        $model = $this->findModel($id);
        if (!($model instanceof User)) return 'Error: User not found!';
        /** @var User $model */
        $providerSocialAccount = new \yii\data\ArrayDataProvider([
            'allModels' => $model->socialAccounts,
        ]);
        $providerToken = new \yii\data\ArrayDataProvider([
            'allModels' => $model->tokens,
        ]);
        $profile = $model->profile;

        return $this->render('dashboard', [
            'model' => $model,
            'profile' => $profile,
            'providerSocialAccount' => $providerSocialAccount,
            'providerToken' => $providerToken,
        ]);
    }
}
