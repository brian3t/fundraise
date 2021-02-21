<?php

namespace app\models;

use Yii;
use \app\models\base\OrderLine as BaseOrderLine;

/**
 * This is the model class for table "order_line".
 */
class OrderLine extends BaseOrderLine
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['created_at', 'updated_at'], 'safe'],
            [['order_id', 'quantity'], 'required'],
            [['order_id', 'product_id', 'spfid', 'variant_id', 'quantity'], 'integer'],
            [['price', 'total_discount'], 'number'],
            [['fulfillment_service', 'fulfillment_status'], 'string', 'max' => 80],
            [['requires_shipping'], 'string', 'max' => 1]
        ]);
    }
	
}
