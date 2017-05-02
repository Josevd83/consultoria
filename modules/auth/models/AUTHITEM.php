<?php

namespace app\modules\auth\models;

use Yii;

/**
 * This is the model class for table "AUTH_ITEM".
 *
 * @property string $NAME
 * @property double $TYPE
 * @property string $DESCRIPTION
 * @property string $RULE_NAME
 * @property string $DATA
 * @property string $UPDATED_AT
 *
 * @property AUTHASSIGNMENT[] $aUTHASSIGNMENTs
 * @property AUTHRULE $1
 * @property AUTHITEMCHILD[] $aUTHITEMChildren
 * @property AUTHITEMCHILD[] $aUTHITEMChildren0
 */
class AUTHITEM extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'AUTH_ITEM';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'TYPE'], 'required'],
            [['TYPE'], 'number'],
            [['UPDATED_AT'], 'string'],
            [['NAME', 'RULE_NAME'], 'string', 'max' => 64],
            [['DESCRIPTION'], 'string', 'max' => 1000],
            [['DATA'], 'string', 'max' => 500],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => AUTHRULE::className(), 'targetAttribute' => ['1' => 'NAME']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'NAME' => 'Name',
            'TYPE' => 'Type',
            'DESCRIPTION' => 'Description',
            'RULE_NAME' => 'Rule  Name',
            'DATA' => 'Data',
            'UPDATED_AT' => 'Updated  At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAUTHASSIGNMENTs()
    {
        return $this->hasMany(AUTHASSIGNMENT::className(), ['1' => 'NAME']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get1()
    {
        return $this->hasOne(AUTHRULE::className(), ['NAME' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAUTHITEMChildren()
    {
        return $this->hasMany(AUTHITEMCHILD::className(), ['1' => 'NAME']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAUTHITEMChildren0()
    {
        return $this->hasMany(AUTHITEMCHILD::className(), ['1' => 'NAME']);
    }
}
