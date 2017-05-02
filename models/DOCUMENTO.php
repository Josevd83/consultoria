<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "DOCUMENTO".
 *
 * @property double $ID_DOCUMENTO
 * @property double $ID_SOLICITANTE
 * @property double $ID_TIPO_DOCUMENTO
 * @property double $ID_TIPO_SOLICITUD
 * @property double $ID_ORGANISMO
 * @property double $ID_BANCO
 * @property double $NUM_DOCUMENTO
 * @property string $FECHA_CREACION
 * @property double $NUM_OFICIO
 * @property double $ID_ESTATUS
 * @property double $ID_USUARIO
 * @property string $OBSERVACIONES
 * @property string $FECHA_MODIFICACION
 * @property double $ID_ABOGADO
 *
 * @property MOVIMIENTO[] $mOVIMIENTOs
 * @property SOLICITANTE $1
 * @property TIPODOCUMENTO $10
 * @property TIPOSOLICITUD $11
 * @property ORGANISMO $12
 * @property BANCO $13
 * @property ESTATUS $14
 * @property USUARIO $15
 * @property ABOGADO $16
 */
class DOCUMENTO extends \yii\db\ActiveRecord
{
	public $nacionalidadSolicitante;
	public $cedulaSolicitante;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'DOCUMENTO';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_DOCUMENTO', 'ID_SOLICITANTE', 'ID_TIPO_DOCUMENTO', 'ID_TIPO_SOLICITUD', 'NUM_DOCUMENTO', 'FECHA_CREACION', 'ID_ESTATUS', 'ID_USUARIO', 'ID_ABOGADO', 'cedulaSolicitante', 'nacionalidadSolicitante'], 'required'],
            [['ID_DOCUMENTO', 'ID_SOLICITANTE', 'ID_TIPO_DOCUMENTO', 'ID_TIPO_SOLICITUD', 'ID_ORGANISMO', 'ID_BANCO', 'NUM_DOCUMENTO', 'NUM_OFICIO', 'ID_ESTATUS', 'ID_USUARIO', 'ID_ABOGADO', 'cedulaSolicitante', 'nacionalidadSolicitante'], 'number'],
            [['FECHA_CREACION', 'FECHA_MODIFICACION'], 'string'],
            [['OBSERVACIONES'], 'string', 'max' => 1000],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => SOLICITANTE::className(), 'targetAttribute' => ['1' => 'ID_SOLICITANTE']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => TIPODOCUMENTO::className(), 'targetAttribute' => ['1' => 'ID_TIPO_DOCUMENTO']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => TIPOSOLICITUD::className(), 'targetAttribute' => ['1' => 'ID_TIPO_SOLICITUD']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => ORGANISMO::className(), 'targetAttribute' => ['1' => 'ID_ORGANISMO']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => BANCO::className(), 'targetAttribute' => ['1' => 'ID_BANCO']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => ESTATUS::className(), 'targetAttribute' => ['1' => 'ID_ESTATUS']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => USUARIO::className(), 'targetAttribute' => ['1' => 'ID_USUARIO']],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => ABOGADO::className(), 'targetAttribute' => ['1' => 'ID_ABOGADO']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_DOCUMENTO' => 'Documento',
            'ID_SOLICITANTE' => 'Solicitante',
            'ID_TIPO_DOCUMENTO' => 'Tipo de Documento',
            'ID_TIPO_SOLICITUD' => 'Tipo de Solicitud',
            'ID_ORGANISMO' => 'Organismo',
            'ID_BANCO' => 'Banco',
            'NUM_DOCUMENTO' => 'Núm de Documento',
            'FECHA_CREACION' => 'Fecha de Creación',
            'NUM_OFICIO' => 'Núm de Oficio',
            'ID_ESTATUS' => 'Estatus',
            'ID_USUARIO' => 'Usuario',
            'OBSERVACIONES' => 'Observaciones',
            'FECHA_MODIFICACION' => 'Fecha de Modificación',
            'ID_ABOGADO' => 'Abogado',
            'cedulaSolicitante' => 'Cédula del Solicitante',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMOVIMIENTOs()
    {
        return $this->hasMany(MOVIMIENTO::className(), ['1' => 'ID_DOCUMENTO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get1()
    {
        return $this->hasOne(SOLICITANTE::className(), ['ID_SOLICITANTE' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get10()
    {
        return $this->hasOne(TIPODOCUMENTO::className(), ['ID_TIPO_DOCUMENTO' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get11()
    {
        return $this->hasOne(TIPOSOLICITUD::className(), ['ID_TIPO_SOLICITUD' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get12()
    {
        return $this->hasOne(ORGANISMO::className(), ['ID_ORGANISMO' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get13()
    {
        return $this->hasOne(BANCO::className(), ['ID_BANCO' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get14()
    {
        return $this->hasOne(ESTATUS::className(), ['ID_ESTATUS' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get15()
    {
        return $this->hasOne(USUARIO::className(), ['ID_USUARIO' => '1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get16()
    {
        return $this->hasOne(ABOGADO::className(), ['ID_ABOGADO' => '1']);
    }
}
