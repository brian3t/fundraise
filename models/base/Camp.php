<?php

namespace app\models\base;

/**
 * This is the base model class for table "camp".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $school
 * @property string $desc
 * @property string $target
 * @property string $note
 * @property integer $created_by
 */
class Camp extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['school'], 'required'],
            [['target'], 'number'],
            [['created_by'], 'integer'],
            [['school'], 'string', 'max' => 255],
            [['desc'], 'string', 'max' => 2000],
            [['note'], 'string', 'max' => 800],
            [['school'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'camp';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school' => 'School',
            'desc' => 'Desc',
            'target' => 'Target',
            'note' => 'Note',
        ];
    }
}
