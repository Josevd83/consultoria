<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "DEPARTAMENTO".
 *
 * @property double $ID_DEPARTAMENTO
 * @property string $DESCRIPCION
 * @property string $GERENCIA
 *
 * @property MOVIMIENTO[] $mOVIMIENTOs
 * @property TIPODOCUMENTOPASOS[] $tIPODOCUMENTOPASOSs
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'DEPARTAMENTO';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_DEPARTAMENTO'], 'required'],
            [['ID_DEPARTAMENTO'], 'number'],
            [['DESCRIPCION', 'GERENCIA'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_DEPARTAMENTO' => 'Id  Departamento',
            'DESCRIPCION' => 'Descripcion',
            'GERENCIA' => 'Gerencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMOVIMIENTOs()
    {
        return $this->hasMany(MOVIMIENTO::className(), ['1' => 'ID_DEPARTAMENTO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTIPODOCUMENTOPASOSs()
    {
        return $this->hasMany(TIPODOCUMENTOPASOS::className(), ['1' => 'ID_DEPARTAMENTO']);
    }
}
