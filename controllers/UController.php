<?php

namespace app\controllers;

use app\models\u\Profile_usr_ava;
use app\models\User;
use Yii;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


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
        if (! ($model instanceof User)) return 'Error: User not found!';
        /** @var User $model */
        $profile_usr_ava_model = new Profile_usr_ava();
        $profile = $model->profile;

        if (Yii::$app->request->isPost) {
            $profile_usr_ava_model->imageFile = UploadedFile::getInstance($profile_usr_ava_model, 'imageFile');
            if ($profile_usr_ava_model->upload($model->id)) {
                $file_full_name = $profile_usr_ava_model->imageFile->baseName . '.' . $profile_usr_ava_model->imageFile->extension;
                $profile->usr_ava = $file_full_name;
                if ($profile->save()){
                    Yii::$app->getSession()->addFlash('success', 'Avatar updated');
                } else {
                    Yii::$app->getSession()->addFlash('error', 'Failed updating avatar. Please try again later');
                }
            } else {
                // file is uploaded successfully
                return 'Failed changing avatar. Please try again later';
            }
        }
        $providerSocialAccount = new \yii\data\ArrayDataProvider([
            'allModels' => $model->socialAccounts,
        ]);
        $providerToken = new \yii\data\ArrayDataProvider([
            'allModels' => $model->tokens,
        ]);

        return $this->render('dashboard', [
            'model' => $model,
            'profile' => $profile,
            'providerSocialAccount' => $providerSocialAccount,
            'providerToken' => $providerToken,
            'profile_usr_ava_model' => $profile_usr_ava_model,
        ]);
    }


}
