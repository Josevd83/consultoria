<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SOLICITANTE".
 *
 * @property double $ID_SOLICITANTE
 * @property string $NACIONALIDAD
 * @property double $CEDULA
 * @property string $PRIMER_NOMBRE
 * @property string $SEGUNDO_NOMBRE
 * @property string $PRIMER_APELLIDO
 * @property string $SEGUNDO_APELLIDO
 * @property double $COD_TELEFONO
 * @property double $NRO_TELEFONO
 * @property string $CORREO_ELECTRONICO
 *
 * @property MOVIMIENTO[] $mOVIMIENTOs
 * @property DOCUMENTO[] $dOCUMENTOs
 */
class SOLICITANTE extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SOLICITANTE';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_SOLICITANTE','CEDULA','NRO_TELEFONO','PRIMER_NOMBRE', 'PRIMER_APELLIDO','CORREO_ELECTRONICO'], 'required'],
            [['ID_SOLICITANTE', 'CEDULA', 'COD_TELEFONO'/*, 'NRO_TELEFONO'*/], 'number'],
            [['NACIONALIDAD'], 'string', 'max' => 1],
            [['PRIMER_NOMBRE', 'SEGUNDO_NOMBRE', 'PRIMER_APELLIDO', 'SEGUNDO_APELLIDO'], 'string', 'max' => 40],
            [['CORREO_ELECTRONICO'], 'string', 'max' => 80],
            [['CORREO_ELECTRONICO'],'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_SOLICITANTE' => 'Id  Solicitante',
            'NACIONALIDAD' => 'Nacionalidad',
            'CEDULA' => 'Cedula',
            'PRIMER_NOMBRE' => 'Primer  Nombre',
            'SEGUNDO_NOMBRE' => 'Segundo  Nombre',
            'PRIMER_APELLIDO' => 'Primer  Apellido',
            'SEGUNDO_APELLIDO' => 'Segundo  Apellido',
            'COD_TELEFONO' => 'Cod  Telefono',
            'NRO_TELEFONO' => 'Nro  Telefono',
            'CORREO_ELECTRONICO' => 'Correo  Electrónico',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMOVIMIENTOs()
    {
        return $this->hasMany(MOVIMIENTO::className(), ['1' => 'ID_SOLICITANTE']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDOCUMENTOs()
    {
        return $this->hasMany(DOCUMENTO::className(), ['1' => 'ID_SOLICITANTE']);
    }
    
    public function getNextVal(){
		$query = new \yii\db\Query;
        $query->select('SOLICITANTE_SEQ.NEXTVAL')->from('DUAL');
        $rows = $query->all();
        return $rows[0]['NEXTVAL'];
	}
}
