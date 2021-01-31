<?php

namespace app\models;

use app\models\base\Entity as BaseEntity;

/**
 * This is the model class for table "entity".
 */
class Entity extends BaseEntity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'required'],
            [['owned_by', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 500],
            [['note'], 'string', 'max' => 2000]
        ]);
    }

}
