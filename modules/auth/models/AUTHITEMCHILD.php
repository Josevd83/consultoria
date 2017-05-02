<?php

namespace app\modules\auth\models;

use Yii;

/**
 * This is the model class for table "AUTH_ITEM_CHILD".
 *
 * @property string $PARENT
 * @property string $CHILD
 *
 * @property AUTHITEM $1
 * @property AUTHITEM $10
 */
class AUTHITEMCHILD extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'AUTH_ITEM_CHILD';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PARENT', 'CHILD'], 'required'],
            [['PARENT', 'CHILD'], 'string', 'max' => 64],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => AUTHITEM::className(), 'targetAttribute' => ['1' => 'NAME']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => AUTHITEM::className(), 'targetAttribute' => ['1' => 'NAME']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PARENT' => 'Parent',
            'CHILD' => 'Child',
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
        return $this->hasOne(AUTHITEM::className(), ['NAME' => '1']);
    }
}
