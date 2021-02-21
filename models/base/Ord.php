<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "ord".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $last_synced_at
 * @property integer $entity_id
 * @property integer $order_number
 * @property string $spfid
 * @property string $spf_note
 * @property string $total_price
 * @property integer $taxes_included
 * @property string $financial_status
 * @property integer $confirmed
 * @property string $total_discounts
 * @property string $spf_name
 * @property integer $app_id
 * @property string $fulfillment_status
 * @property string $tags
 * @property string $contact_email
 * @property string $order_status_url
 *
 * @property \app\models\Entity $entity
 * @property \app\models\OrderLine[] $orderLines
 */
class Ord extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'entity',
            'orderLines'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ord';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'last_synced_at' => 'Last Synced At',
            'entity_id' => 'Entity ID',
            'order_number' => 'Order Number',
            'spfid' => 'Spfid',
            'spf_note' => 'Spf Note',
            'total_price' => 'Total Price',
            'taxes_included' => 'Taxes Included',
            'financial_status' => 'Financial Status',
            'confirmed' => 'Confirmed',
            'total_discounts' => 'Total Discounts',
            'spf_name' => 'Spf Name',
            'app_id' => 'App ID',
            'fulfillment_status' => 'Fulfillment Status',
            'tags' => 'Tags',
            'contact_email' => 'Contact Email',
            'order_status_url' => 'Order Status Url',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntity()
    {
        return $this->hasOne(\app\models\Entity::className(), ['id' => 'entity_id'])->inverseOf('ords');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderLines()
    {
        return $this->hasMany(\app\models\OrderLine::className(), ['order_id' => 'id'])->inverseOf('order');
    }
    }
