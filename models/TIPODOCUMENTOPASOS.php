<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TIPO_DOCUMENTO_PASOS".
 *
 * @property double $ID_PASO
 * @property double $ID_TIPO_DOCUMENTO
 * @property double $NRO_PASO
 * @property string $DESCRIPCION_PASO
 * @property double $ID_TIPO_MOVIMIENTO
 * @property double $ID_ESTATUS
 * @property double $ID_DEPARTAMENTO
 *
 * @property MOVIMIENTO[] $mOVIMIENTOs
 * @property TIPODOCUMENTO $1
 * @property TIPOMOVIMIENTO $10
 * @property ESTATUS $11
 * @property DEPARTAMENTO $12
 */
class TIPODOCUMENTOPASOS extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TIPO_DOCUMENTO_PASOS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PASO'], 'required'],
            [['ID_PASO', 'ID_TIPO_DOCUMENTO', 'NRO_PASO', 'ID_TIPO_MOVIMIENTO', 'ID_ESTATUS', 'ID_DEPARTAMENTO'], 'number'],
            [['DESCRIPCION_PASO'], 'string', 'max' => 100],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => TIPODOCUMENTO::className(), 'targetAttribute' => ['1' => 'ID_TIPO_DOCUMENTO']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => TIPOMOVIMIENTO::className(), 'targetAttribute' => ['1' => 'ID_TIPO_MOVIMIENTO']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => ESTATUS::className(), 'targetAttribute' => ['1' => 'ID_ESTATUS']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => DEPARTAMENTO::className(), 'targetAttribute' => ['1' => 'ID_DEPARTAMENTO']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PASO' => 'Id  Paso',
            'ID_TIPO_DOCUMENTO' => 'Id  Tipo  Documento',
            'NRO_PASO' => 'Nro  Paso',
            'DESCRIPCION_PASO' => 'Descripcion  Paso',
            'ID_TIPO_MOVIMIENTO' => 'Id  Tipo  Movimiento',
            'ID_ESTATUS' => 'Id  Estatus',
            'ID_DEPARTAMENTO' => 'Id  Departamento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMOVIMIENTOs()
    {
        return $this->hasMany(MOVIMIENTO::className(), ['1' => 'ID_PASO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get1()
    {
        return $this->hasOne(TIPODOCUMENTO::className(), ['ID_TIPO_DOCUMENTO' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get10()
    {
        return $this->hasOne(TIPOMOVIMIENTO::className(), ['ID_TIPO_MOVIMIENTO' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get11()
    {
        return $this->hasOne(ESTATUS::className(), ['ID_ESTATUS' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get12()
    {
        return $this->hasOne(DEPARTAMENTO::className(), ['ID_DEPARTAMENTO' => '1']);
    }
    
    public static function verificarPaso($id_movimiento){
		//TIPODOCUMENTOPASOS
		$modelMovimiento = MOVIMIENTO::findOne($id_movimiento);
		$modelTipodocumentoPasos = TIPODOCUMENTOPASOS::findAll(['ID_TIPO_DOCUMENTO'=>$modelMovimiento->ID_TIPO_DOCUMENTO,'ID_ESTATUS'=>$modelMovimiento->ID_ESTATUS]);
		
		if($modelMovimiento->ID_ESTATUS == 3){
			$proximoPaso = 2;
		}
		var_dump($modelTipodocumentoPasos);die;
		return $id_movimiento;
	}
	
	public static function enviarDevolver($id_movimiento){
		
		$modelMovimiento = MOVIMIENTO::findOne($id_movimiento);
		
		$estatus = $modelMovimiento->ID_ESTATUS;
		$idTipoDocumento = $modelMovimiento->ID_TIPO_DOCUMENTO;
		$idDepartamento = $modelMovimiento->ID_DEPARTAMENTO;
		
		$numeroDeAcciones = 0;
		
		if($estatus==3){
			$numeroDeAcciones = 1;
		}
		
		if($estatus==6){
			$numeroDeAcciones = 2;
		}
		
		if($estatus==4){
			$numeroDeAcciones = 3;
		}
		
		if($estatus==7){
			$numeroDeAcciones = 4;
		}
		
		if($estatus==4 && $idTipoDocumento==4 && $idDepartamento==4){
			$numeroDeAcciones = 5;
		}
		
		return $numeroDeAcciones;	
	}
}
