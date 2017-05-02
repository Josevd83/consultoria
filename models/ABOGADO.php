<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ABOGADO".
 *
 * @property double $ID_ABOGADO
 * @property string $NACIONALIDAD
 * @property double $CEDULA
 * @property string $PRIMER_NOMBRE
 * @property string $SEGUNDO_NOMBRE
 * @property string $PRIMER_APELLIDO
 * @property string $SEGUNDO_APELLIDO
 * @property double $ID_ESTATUS
 * @property double $ID_USUARIO
 * @property string $FECHA_CREACION
 *
 * @property DOCUMENTO[] $dOCUMENTOs
 * @property ESTATUS $1
 * @property USUARIO $10
 */
class ABOGADO extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ABOGADO';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ABOGADO', 'NACIONALIDAD', 'CEDULA', 'PRIMER_NOMBRE', 'PRIMER_APELLIDO', 'ID_ESTATUS', 'ID_USUARIO', 'FECHA_CREACION'], 'required'],
            [['ID_ABOGADO', 'CEDULA', 'ID_ESTATUS', 'ID_USUARIO'], 'number'],
            [['FECHA_CREACION'], 'string'],
            [['NACIONALIDAD'], 'string', 'max' => 1],
            [['PRIMER_NOMBRE', 'SEGUNDO_NOMBRE', 'PRIMER_APELLIDO', 'SEGUNDO_APELLIDO'], 'string', 'max' => 40],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => ESTATUS::className(), 'targetAttribute' => ['1' => 'ID_ESTATUS']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => USUARIO::className(), 'targetAttribute' => ['1' => 'ID_USUARIO']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ABOGADO' => 'Id  Abogado',
            'NACIONALIDAD' => 'Nacionalidad',
            'CEDULA' => 'Cedula',
            'PRIMER_NOMBRE' => 'Primer  Nombre',
            'SEGUNDO_NOMBRE' => 'Segundo  Nombre',
            'PRIMER_APELLIDO' => 'Primer  Apellido',
            'SEGUNDO_APELLIDO' => 'Segundo  Apellido',
            'ID_ESTATUS' => 'Id  Estatus',
            'ID_USUARIO' => 'Id  Usuario',
            'FECHA_CREACION' => 'Fecha  Creacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDOCUMENTOs()
    {
        return $this->hasMany(DOCUMENTO::className(), ['1' => 'ID_ABOGADO']);
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
    public function get10()
    {
        return $this->hasOne(USUARIO::className(), ['ID_USUARIO' => '1']);
    }
}
