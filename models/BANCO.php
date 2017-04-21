<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "BANCO".
 *
 * @property double $ID_BANCO
 * @property string $CODIGO_SUDEBAN
 * @property string $DESCRIPCION
 * @property double $ID_ESTATUS
 *
 * @property ESTATUS $1
 * @property DOCUMENTO[] $dOCUMENTOs
 */
class BANCO extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'BANCO';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_BANCO', 'CODIGO_SUDEBAN', 'DESCRIPCION', 'ID_ESTATUS'], 'required'],
            [['ID_BANCO', 'ID_ESTATUS'], 'number'],
            [['CODIGO_SUDEBAN'], 'string', 'max' => 4],
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
            'ID_BANCO' => 'Id  Banco',
            'CODIGO_SUDEBAN' => 'Codigo  Sudeban',
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
        return $this->hasMany(DOCUMENTO::className(), ['1' => 'ID_BANCO']);
    }
}
