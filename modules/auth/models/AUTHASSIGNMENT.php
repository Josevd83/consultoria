<?php

namespace app\modules\auth\models;

use Yii;

/**
 * This is the model class for table "AUTH_ASSIGNMENT".
 *
 * @property string $ITEM_NAME
 * @property double $USER_ID
 * @property string $CREATED_AT
 *
 * @property AUTHITEM $1
 * @property USUARIO $10
 */
class AUTHASSIGNMENT extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'AUTH_ASSIGNMENT';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ITEM_NAME', 'USER_ID'], 'required'],
            [['USER_ID'], 'number'],
            [['CREATED_AT'], 'string'],
            [['ITEM_NAME'], 'string', 'max' => 64],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => AUTHITEM::className(), 'targetAttribute' => ['1' => 'NAME']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => USUARIO::className(), 'targetAttribute' => ['1' => 'USER_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ITEM_NAME' => 'Item  Name',
            'USER_ID' => 'User  ID',
            'CREATED_AT' => 'Created  At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get1()
    {
        return $this->hasOne(AUTHITEM::className(), ['NAME' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get10()
    {
        return $this->hasOne(USUARIO::className(), ['USER_ID' => '1']);
    }
}
