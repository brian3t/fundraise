<?php

namespace app\models;

use Yii;
use \app\models\base\Ord as BaseOrd;

/**
 * This is the model class for table "ord".
 */
class Ord extends BaseOrd
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['created_at', 'updated_at', 'last_synced_at'], 'safe'],
            [['entity_id', 'order_number'], 'required'],
            [['entity_id', 'order_number', 'spfid', 'app_id'], 'integer'],
            [['total_price', 'total_discounts'], 'number'],
            [['financial_status', 'fulfillment_status'], 'string'],
            [['spf_note', 'contact_email'], 'string', 'max' => 255],
            [['taxes_included', 'confirmed'], 'string', 'max' => 1],
            [['spf_name'], 'string', 'max' => 80],
            [['tags'], 'string', 'max' => 400],
            [['order_status_url'], 'string', 'max' => 800]
        ]);
    }
	
}
