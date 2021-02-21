<?php

namespace app\models\base;

/**
 * This is the base model class for table "entity".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 * @property string $note
 * @property integer $owned_by
 * @property integer $updated_by
 * @property string $platform
 * @property string $shopurl
 * @property string $apiver
 * @property string $apikey
 * @property string $apipw
 *
 * @property \app\models\Camp[] $camps
 * @property \app\models\User $ownedBy
 * @property \app\models\User $updatedBy
 * @property \app\models\Product[] $products
 */
class Entity extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'camps',
            'ownedBy',
            'updatedBy',
            'products'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'required'],
            [['owned_by', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 500],
            [['note'], 'string', 'max' => 2000],
            [['platform', 'apiver'], 'string', 'max' => 80],
            [['shopurl'], 'string', 'max' => 255],
            [['apikey', 'apipw'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entity';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'note' => 'Note',
            'owned_by' => 'Owned By',
            'platform' => 'Platform',
            'shopurl' => 'Shopurl',
            'apiver' => 'Apiver',
            'apikey' => 'Apikey',
            'apipw' => 'Apipw',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCamps()
    {
        return $this->hasMany(\app\models\Camp::className(), ['entity_id' => 'id'])->inverseOf('entity');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwnedBy()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'owned_by'])->inverseOf('entities');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'updated_by'])->inverseOf('entities');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(\app\models\Product::className(), ['entity_id' => 'id'])->inverseOf('entity');
    }
    }
