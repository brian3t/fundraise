<?php

namespace app\models\base;

use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "product".
 *
 * @property integer $id
 * @property integer $entity_id
 * @property string $title
 * @property string $body_html
 * @property string $variantid
 * @property string $spfid
 * @property string $price
 * @property string $sku
 * @property integer $taxable
 * @property string $weight
 * @property string $weight_unit
 * @property string $inventory_item_id
 * @property integer $requires_shipping
 * @property string $img
 * @property string $created_at
 * @property string $updated_at
 * @property string $json_data
 * @property string $fulfillment_service
 * @property string $inventory_quantity
 *
 * @property \app\models\Entity $entity
 */
class Product extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'entity'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entity_id' => 'Entity ID',
            'title' => 'Title',
            'body_html' => 'Body Html',
            'variantid' => 'Variantid',
            'spfid' => 'Spfid',
            'price' => 'Price',
            'sku' => 'Sku',
            'taxable' => 'Taxable',
            'weight' => 'Weight',
            'weight_unit' => 'Weight Unit',
            'inventory_item_id' => 'Inventory Item ID',
            'requires_shipping' => 'Requires Shipping',
            'img' => 'Img',
            'json_data' => 'Json Data',
            'fulfillment_service' => 'Fulfillment Service',
            'inventory_quantity' => 'Inventory Quantity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntity()
    {
        return $this->hasOne(\app\models\Entity::className(), ['id' => 'entity_id'])->inverseOf('products');
    }

    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'assigned_by',
                'updatedByAttribute' => false,
            ],
        ];
    }
}
