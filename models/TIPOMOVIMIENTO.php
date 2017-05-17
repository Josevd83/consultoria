<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TIPO_MOVIMIENTO".
 *
 * @property double $ID_TIPO_MOVIMIENTO
 * @property string $DESCRIPCION
 * @property double $ID_ESTATUS
 *
 * @property MOVIMIENTO[] $mOVIMIENTOs
 * @property TIPODOCUMENTOPASOS[] $tIPODOCUMENTOPASOSs
 * @property ESTATUS $1
 */
class TIPOMOVIMIENTO extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TIPO_MOVIMIENTO';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_TIPO_MOVIMIENTO'], 'required'],
            [['ID_TIPO_MOVIMIENTO', 'ID_ESTATUS'], 'number'],
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
            'ID_TIPO_MOVIMIENTO' => 'Id  Tipo  Movimiento',
            'DESCRIPCION' => 'Descripcion',
            'ID_ESTATUS' => 'Id  Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMOVIMIENTOs()
    {
        return $this->hasMany(MOVIMIENTO::className(), ['1' => 'ID_TIPO_MOVIMIENTO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTIPODOCUMENTOPASOSs()
    {
        return $this->hasMany(TIPODOCUMENTOPASOS::className(), ['1' => 'ID_TIPO_MOVIMIENTO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get1()
    {
        return $this->hasOne(ESTATUS::className(), ['ID_ESTATUS' => '1']);
    }
}
