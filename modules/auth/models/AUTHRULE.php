<?php

namespace app\modules\auth\models;

use Yii;

/**
 * This is the model class for table "AUTH_RULE".
 *
 * @property string $NAME
 * @property string $DATA
 * @property string $CREATED_AT
 * @property string $UPDATED_AT
 *
 * @property AUTHITEM[] $aUTHITEMs
 */
class AUTHRULE extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'AUTH_RULE';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME'], 'required'],
            [['CREATED_AT', 'UPDATED_AT'], 'string'],
            [['NAME'], 'string', 'max' => 64],
            [['DATA'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'NAME' => 'Name',
            'DATA' => 'Data',
            'CREATED_AT' => 'Created  At',
            'UPDATED_AT' => 'Updated  At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAUTHITEMs()
    {
        return $this->hasMany(AUTHITEM::className(), ['1' => 'NAME']);
    }
}
