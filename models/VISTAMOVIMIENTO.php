<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "VISTA_MOVIMIENTO".
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
 * @property double $ID_TIPO_SOLICITUD
 * @property double $ID_ORGANISMO
 * @property double $ID_BANCO
 * @property double $ID_ABOGADO
 */
class VISTAMOVIMIENTO extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'VISTA_MOVIMIENTO';
    }

	public static function primaryKey()
    {
        return ['ID_MOVIMIENTO'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_MOVIMIENTO', 'ID_TIPO_SOLICITUD', 'ID_ABOGADO'], 'required'],
            [['ID_MOVIMIENTO', 'ID_DOCUMENTO', 'ID_ESTATUS', 'ID_DEPARTAMENTO', 'ID_USUARIO', 'ID_SOLICITANTE', 'ID_TIPO_MOVIMIENTO', 'ID_TIPO_DOCUMENTO', 'ID_PASO', 'NRO_PASO', 'ID_TIPO_SOLICITUD', 'ID_ORGANISMO', 'ID_BANCO', 'ID_ABOGADO'], 'number'],
            [['FECHA_CREACION', 'FECHA_MODIFICACION'], 'string'],
            [['DESCRIPCION_PASO'], 'string', 'max' => 80],
            [['OBSERVACIONES'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_MOVIMIENTO' => 'Movimiento',
            'ID_DOCUMENTO' => 'Documento',
            'ID_ESTATUS' => 'Estatus',
            'ID_DEPARTAMENTO' => 'Departamento',
            'ID_USUARIO' => 'Usuario',
            'ID_SOLICITANTE' => 'Solicitante',
            'ID_TIPO_MOVIMIENTO' => 'Tipo de Movimiento',
            'ID_TIPO_DOCUMENTO' => 'Tipo de Documento',
            'ID_PASO' => 'Paso',
            'NRO_PASO' => 'Nro de Paso',
            'DESCRIPCION_PASO' => 'Descripcion  Paso',
            'OBSERVACIONES' => 'Observaciones',
            'FECHA_CREACION' => 'Fecha de Creación',
            'FECHA_MODIFICACION' => 'Fecha de Modificación',
            'ID_TIPO_SOLICITUD' => 'Tipo de Solicitud',
            'ID_ORGANISMO' => 'Organismo',
            'ID_BANCO' => 'Banco',
            'ID_ABOGADO' => 'Abogado',
        ];
    }
    
    public function getSolicitante()
    {
        return $this->hasOne(SOLICITANTE::className(), ['ID_SOLICITANTE' => 'ID_SOLICITANTE']);
    }
    
    public function getTipoDocumento()
    {
        return $this->hasOne(TIPODOCUMENTO::className(), ['ID_TIPO_DOCUMENTO' => 'ID_TIPO_DOCUMENTO']);
    }
    
    public function getDocumento()
    {
        return $this->hasOne(DOCUMENTO::className(), ['ID_DOCUMENTO' => 'ID_DOCUMENTO']);
    }
    
    public function getTipoSolicitud()
    {
        return $this->hasOne(TIPOSOLICITUD::className(), ['ID_TIPO_SOLICITUD' => 'ID_TIPO_SOLICITUD']);
    }
    
    public function getAbogado()
    {
        return $this->hasOne(ABOGADO::className(), ['ID_ABOGADO' => 'ID_ABOGADO']);
    }
    
    public function getBanco()
    {
        return $this->hasOne(BANCO::className(), ['ID_BANCO' => 'ID_BANCO']);
    }
    
    public function getOrganismo()
    {
        return $this->hasOne(ORGANISMO::className(), ['ID_ORGANISMO' => 'ID_ORGANISMO']);
    }
}
