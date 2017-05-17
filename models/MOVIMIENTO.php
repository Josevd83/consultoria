<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MOVIMIENTO".
 *
 * @property double $ID_MOVIMIENTO
 * @property double $ID_DOCUMENTO
 * @property double $ID_ESTATUS
 * @property double $ID_DEPARTAMENTO
 * @property double $ID_USUARIO
 * @property double $ID_SOLICITANTE
 * @property double $ID_TIPO_MOVIMIENTO
 * @property double $ID_TIPO_DOCUMENTO
 * @property double $ID_PASO
 * @property double $NRO_PASO
 * @property string $DESCRIPCION_PASO
 * @property string $OBSERVACIONES
 * @property string $FECHA_CREACION
 * @property string $FECHA_MODIFICACION
 *
 * @property DOCUMENTO $1
 * @property ESTATUS $10
 * @property DEPARTAMENTO $11
 * @property USUARIO $12
 * @property SOLICITANTE $13
 * @property TIPOMOVIMIENTO $14
 * @property TIPODOCUMENTO $15
 * @property TIPODOCUMENTOPASOS $16
 * @property AUDITORIA[] $aUDITORIAs
 */
class MOVIMIENTO extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MOVIMIENTO';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_MOVIMIENTO'], 'required'],
            [['ID_MOVIMIENTO', 'ID_DOCUMENTO', 'ID_ESTATUS', 'ID_DEPARTAMENTO', 'ID_USUARIO', 'ID_SOLICITANTE', 'ID_TIPO_MOVIMIENTO', 'ID_TIPO_DOCUMENTO', 'ID_PASO', 'NRO_PASO'], 'number'],
            [['FECHA_CREACION', 'FECHA_MODIFICACION'], 'string'],
            [['DESCRIPCION_PASO'], 'string', 'max' => 80],
            [['OBSERVACIONES'], 'string', 'max' => 1000],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => DOCUMENTO::className(), 'targetAttribute' => ['1' => 'ID_DOCUMENTO']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => ESTATUS::className(), 'targetAttribute' => ['1' => 'ID_ESTATUS']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => DEPARTAMENTO::className(), 'targetAttribute' => ['1' => 'ID_DEPARTAMENTO']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => USUARIO::className(), 'targetAttribute' => ['1' => 'USER_ID']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => SOLICITANTE::className(), 'targetAttribute' => ['1' => 'ID_SOLICITANTE']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => TIPOMOVIMIENTO::className(), 'targetAttribute' => ['1' => 'ID_TIPO_MOVIMIENTO']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => TIPODOCUMENTO::className(), 'targetAttribute' => ['1' => 'ID_TIPO_DOCUMENTO']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => TIPODOCUMENTOPASOS::className(), 'targetAttribute' => ['1' => 'ID_PASO']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_MOVIMIENTO' => 'Id  Movimiento',
            'ID_DOCUMENTO' => 'Id  Documento',
            'ID_ESTATUS' => 'Id  Estatus',
            'ID_DEPARTAMENTO' => 'Id  Departamento',
            'ID_USUARIO' => 'Id  Usuario',
            'ID_SOLICITANTE' => 'Id  Solicitante',
            'ID_TIPO_MOVIMIENTO' => 'Id  Tipo  Movimiento',
            'ID_TIPO_DOCUMENTO' => 'Id  Tipo  Documento',
            'ID_PASO' => 'Id  Paso',
            'NRO_PASO' => 'Nro  Paso',
            'DESCRIPCION_PASO' => 'Descripcion  Paso',
            'OBSERVACIONES' => 'Observaciones',
            'FECHA_CREACION' => 'Fecha  Creacion',
            'FECHA_MODIFICACION' => 'Fecha  Modificacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get1()
    {
        return $this->hasOne(DOCUMENTO::className(), ['ID_DOCUMENTO' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get10()
    {
        return $this->hasOne(ESTATUS::className(), ['ID_ESTATUS' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get11()
    {
        return $this->hasOne(DEPARTAMENTO::className(), ['ID_DEPARTAMENTO' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get12()
    {
        return $this->hasOne(USUARIO::className(), ['USER_ID' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get13()
    {
        return $this->hasOne(SOLICITANTE::className(), ['ID_SOLICITANTE' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get14()
    {
        return $this->hasOne(TIPOMOVIMIENTO::className(), ['ID_TIPO_MOVIMIENTO' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get15()
    {
        return $this->hasOne(TIPODOCUMENTO::className(), ['ID_TIPO_DOCUMENTO' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get16()
    {
        return $this->hasOne(TIPODOCUMENTOPASOS::className(), ['ID_PASO' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAUDITORIAs()
    {
        return $this->hasMany(AUDITORIA::className(), ['1' => 'ID_MOVIMIENTO']);
    }
    
    public function getNextVal(){
		$query = new \yii\db\Query;
        $query->select('MOVIMIENTO_SEQ.NEXTVAL')->from('DUAL');
        $rows = $query->all();
        return $rows[0]['NEXTVAL'];
	}
}
