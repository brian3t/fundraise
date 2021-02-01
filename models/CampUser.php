<?php

namespace app\models;

use Yii;
use \app\models\base\CampUser as BaseCampUser;

/**
 * This is the model class for table "camp_user".
 */
class CampUser extends BaseCampUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['campid', 'userid'], 'required'],
            [['campid', 'userid', 'assigned_by'], 'integer'],
            [['created_at'], 'safe'],
            [['goal'], 'number'],
            [['campid', 'userid'], 'unique', 'targetAttribute' => ['campid', 'userid'], 'message' => 'The combination of Campid and Userid has already been taken.']
        ]);
    }
	
}
