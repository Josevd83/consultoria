<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TIPO_DOCUMENTO".
 *
 * @property double $ID_TIPO_DOCUMENTO
 * @property string $DESCRIPCION
 * @property double $ID_ESTATUS
 *
 * @property MOVIMIENTO[] $mOVIMIENTOs
 * @property ESTATUS $1
 * @property TIPODOCUMENTOPASOS[] $tIPODOCUMENTOPASOSs
 * @property DOCUMENTO[] $dOCUMENTOs
 */
class TIPODOCUMENTO extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TIPO_DOCUMENTO';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_TIPO_DOCUMENTO'], 'required'],
            [['ID_TIPO_DOCUMENTO', 'ID_ESTATUS'], 'number'],
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
            'ID_TIPO_DOCUMENTO' => 'Id  Tipo  Documento',
            'DESCRIPCION' => 'Descripcion',
            'ID_ESTATUS' => 'Id  Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMOVIMIENTOs()
    {
        return $this->hasMany(MOVIMIENTO::className(), ['1' => 'ID_TIPO_DOCUMENTO']);
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
    public function getTIPODOCUMENTOPASOSs()
    {
        return $this->hasMany(TIPODOCUMENTOPASOS::className(), ['1' => 'ID_TIPO_DOCUMENTO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDOCUMENTOs()
    {
        return $this->hasMany(DOCUMENTO::className(), ['1' => 'ID_TIPO_DOCUMENTO']);
    }
}
