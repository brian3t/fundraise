<?php

namespace app\models\u;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * Class Profile_usr_ava
 * Provided upload for the usr_ava in Profile table
 * @package app\models\user
 */
class Profile_usr_ava extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif, jpeg, svg, bmp'],
        ];
    }

    /**
     * Upload avatar to folder. Folder name is prepended by userid
     * @param $userid
     * @return bool
     */
    public function upload($userid)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/avatar/' . $userid . '/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
