<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "order_line".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $last_synced_at
 * @property integer $order_id
 * @property integer $product_id
 * @property string $spfid
 * @property string $variant_id
 * @property integer $quantity
 * @property string $fulfillment_service
 * @property integer $requires_shipping
 * @property string $price
 * @property string $total_discount
 * @property string $fulfillment_status
 *
 * @property \app\models\Ord $order
 * @property \app\models\Product $product
 */
class OrderLine extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'order',
            'product'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'last_synced_at'], 'safe'],
            [['order_id'], 'required'],
            [['order_id', 'product_id', 'spfid', 'variant_id', 'quantity'], 'integer'],
            [['price', 'total_discount'], 'number'],
            [['fulfillment_status'], 'string'],
            [['fulfillment_service'], 'string', 'max' => 80],
            [['requires_shipping'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_line';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'last_synced_at' => 'Last Synced At',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'spfid' => 'Spfid',
            'variant_id' => 'Variant ID',
            'quantity' => 'Quantity',
            'fulfillment_service' => 'Fulfillment Service',
            'requires_shipping' => 'Requires Shipping',
            'price' => 'Price',
            'total_discount' => 'Total Discount',
            'fulfillment_status' => 'Fulfillment Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(\app\models\Ord::className(), ['id' => 'order_id'])->inverseOf('orderLines');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(\app\models\Product::className(), ['id' => 'product_id'])->inverseOf('orderLines');
    }
    }
