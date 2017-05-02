<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ESTATUS".
 *
 * @property double $ID_ESTATUS
 * @property string $DESCRIPCION
 *
 * @property MOVIMIENTO[] $mOVIMIENTOs
 * @property TIPODOCUMENTO[] $tIPODOCUMENTOs
 * @property ORGANISMO[] $oRGANISMOs
 * @property BANCO[] $bANCOs
 * @property TIPODOCUMENTOPASOS[] $tIPODOCUMENTOPASOSs
 * @property TIPOMOVIMIENTO[] $tIPOMOVIMIENTOs
 * @property DOCUMENTO[] $dOCUMENTOs
 * @property TIPOSOLICITUD[] $tIPOSOLICITUDs
 * @property ABOGADO[] $aBOGADOs
 */
class ESTATUS extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ESTATUS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ESTATUS'], 'required'],
            [['ID_ESTATUS'], 'number'],
            [['DESCRIPCION'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ESTATUS' => 'Id  Estatus',
            'DESCRIPCION' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMOVIMIENTOs()
    {
        return $this->hasMany(MOVIMIENTO::className(), ['1' => 'ID_ESTATUS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTIPODOCUMENTOs()
    {
        return $this->hasMany(TIPODOCUMENTO::className(), ['1' => 'ID_ESTATUS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getORGANISMOs()
    {
        return $this->hasMany(ORGANISMO::className(), ['1' => 'ID_ESTATUS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBANCOs()
    {
        return $this->hasMany(BANCO::className(), ['1' => 'ID_ESTATUS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTIPODOCUMENTOPASOSs()
    {
        return $this->hasMany(TIPODOCUMENTOPASOS::className(), ['1' => 'ID_ESTATUS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTIPOMOVIMIENTOs()
    {
        return $this->hasMany(TIPOMOVIMIENTO::className(), ['1' => 'ID_ESTATUS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDOCUMENTOs()
    {
        return $this->hasMany(DOCUMENTO::className(), ['1' => 'ID_ESTATUS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTIPOSOLICITUDs()
    {
        return $this->hasMany(TIPOSOLICITUD::className(), ['1' => 'ID_ESTATUS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getABOGADOs()
    {
        return $this->hasMany(ABOGADO::className(), ['1' => 'ID_ESTATUS']);
    }
}
