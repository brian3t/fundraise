<?php

namespace app\models;

use app\models\base\Profile as BaseProfile;

/**
 * This is the model class for table "profile".
 */
class Profile extends BaseProfile
{
    public static $order_by_col='name';
    public function get_usr_ava(){
        return $this->usr_ava ?? '../default.png';
    }
}
