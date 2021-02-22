<?php

namespace app\models;

use Yii;
use \app\models\base\Product as BaseProduct;

/**
 * This is the model class for table "product".
 */
class Product extends BaseProduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['entity_id', 'title'], 'required'],
            [['entity_id', 'variantid', 'spfid', 'inventory_item_id'], 'integer'],
            [['price', 'weight', 'inventory_quantity'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'sku'], 'string', 'max' => 255],
            [['body_html', 'json_data'], 'string', 'max' => 8000],
            [['taxable', 'requires_shipping'], 'string', 'max' => 1],
            [['weight_unit'], 'string', 'max' => 8],
            [['img'], 'string', 'max' => 800],
            [['fulfillment_service'], 'string', 'max' => 80]
        ]);
    }
	
}
