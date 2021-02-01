<?php

namespace app\models\base;

use Yii;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "camp_user".
 *
 * @property integer $id
 * @property integer $campid
 * @property integer $userid
 * @property string $created_at
 * @property integer $assigned_by
 * @property string $goal
 *
 * @property \app\models\Camp $camp
 * @property \app\models\User $user
 */
class CampUser extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'camp',
            'user'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['campid', 'userid'], 'required'],
            [['campid', 'userid', 'assigned_by'], 'integer'],
            [['created_at'], 'safe'],
            [['goal'], 'number'],
            [['campid', 'userid'], 'unique', 'targetAttribute' => ['campid', 'userid'], 'message' => 'The combination of Campid and Userid has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'camp_user';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'campid' => 'Campid',
            'userid' => 'Userid',
            'assigned_by' => 'Assigned By',
            'goal' => 'Goal',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCamp()
    {
        return $this->hasOne(\app\models\Camp::className(), ['id' => 'campid'])->inverseOf('campUsers');
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'userid'])->inverseOf('campUsers');
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
