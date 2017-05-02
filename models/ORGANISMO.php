<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ORGANISMO".
 *
 * @property double $ID_ORGANISMO
 * @property string $DESCRIPCION
 * @property double $ID_ESTATUS
 *
 * @property ESTATUS $1
 * @property DOCUMENTO[] $dOCUMENTOs
 */
class ORGANISMO extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ORGANISMO';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ORGANISMO'], 'required'],
            [['ID_ORGANISMO', 'ID_ESTATUS'], 'number'],
            [['DESCRIPCION'], 'string', 'max' => 100],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => ESTATUS::className(), 'targetAttribute' => ['1' => 'ID_ESTATUS']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ORGANISMO' => 'Id  Organismo',
            'DESCRIPCION' => 'Descripcion',
            'ID_ESTATUS' => 'Id  Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get1()
    {
        return $this->hasOne(ESTATUS::className(), ['ID_ESTATUS' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDOCUMENTOs()
    {
        return $this->hasMany(DOCUMENTO::className(), ['1' => 'ID_ORGANISMO']);
    }
}
