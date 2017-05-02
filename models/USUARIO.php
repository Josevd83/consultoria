<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "USUARIO".
 *
 * @property double $ID_USUARIO
 * @property string $USUARIO
 * @property string $CLAVE
 * @property string $NACIONALIDAD
 * @property double $CEDULA
 * @property string $PRIMER_NOMBRE
 * @property string $SEGUNDO_NOMBRE
 * @property string $PRIMER_APELLIDO
 * @property string $SEGUNDO_APELLIDO
 * @property string $FECHA_CREACION
 * @property double $NRO_INTENTOS
 * @property double $ID_ESTATUS
 *
 * @property MOVIMIENTO[] $mOVIMIENTOs
 * @property USUARIO $1
 * @property USUARIO[] $uSUARIOs
 * @property AUDITORIA[] $aUDITORIAs
 * @property DOCUMENTO[] $dOCUMENTOs
 * @property ABOGADO[] $aBOGADOs
 */
class USUARIO extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'USUARIO';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_USUARIO'], 'required'],
            [['ID_USUARIO', 'CEDULA', 'NRO_INTENTOS', 'ID_ESTATUS'], 'number'],
            [['FECHA_CREACION'], 'string'],
            [['USUARIO', 'CLAVE'], 'string', 'max' => 80],
            [['NACIONALIDAD'], 'string', 'max' => 1],
            [['PRIMER_NOMBRE', 'SEGUNDO_NOMBRE', 'PRIMER_APELLIDO', 'SEGUNDO_APELLIDO'], 'string', 'max' => 40],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => USUARIO::className(), 'targetAttribute' => ['1' => 'ID_USUARIO']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_USUARIO' => 'Id  Usuario',
            'USUARIO' => 'Usuario',
            'CLAVE' => 'Clave',
            'NACIONALIDAD' => 'Nacionalidad',
            'CEDULA' => 'Cedula',
            'PRIMER_NOMBRE' => 'Primer  Nombre',
            'SEGUNDO_NOMBRE' => 'Segundo  Nombre',
            'PRIMER_APELLIDO' => 'Primer  Apellido',
            'SEGUNDO_APELLIDO' => 'Segundo  Apellido',
            'FECHA_CREACION' => 'Fecha  Creacion',
            'NRO_INTENTOS' => 'Nro  Intentos',
            'ID_ESTATUS' => 'Id  Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMOVIMIENTOs()
    {
        return $this->hasMany(MOVIMIENTO::className(), ['1' => 'ID_USUARIO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get1()
    {
        return $this->hasOne(USUARIO::className(), ['ID_USUARIO' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSUARIOs()
    {
        return $this->hasMany(USUARIO::className(), ['1' => 'ID_USUARIO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAUDITORIAs()
    {
        return $this->hasMany(AUDITORIA::className(), ['1' => 'ID_USUARIO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDOCUMENTOs()
    {
        return $this->hasMany(DOCUMENTO::className(), ['1' => 'ID_USUARIO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getABOGADOs()
    {
        return $this->hasMany(ABOGADO::className(), ['1' => 'ID_USUARIO']);
    }
}
