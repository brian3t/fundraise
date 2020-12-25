<?php

namespace app\models;

use Yii;
use \app\models\base\Camp as BaseCamp;

/**
 * This is the model class for table "camp".
 */
class Camp extends BaseCamp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['created_at', 'updated_at'], 'safe'],
            [['school'], 'required'],
            [['target'], 'number'],
            [['created_by'], 'integer'],
            [['school'], 'string', 'max' => 255],
            [['desc'], 'string', 'max' => 2000],
            [['note'], 'string', 'max' => 800],
            [['school'], 'unique']
        ]);
    }
	
}
