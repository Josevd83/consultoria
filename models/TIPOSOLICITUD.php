<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TIPO_SOLICITUD".
 *
 * @property double $ID_TIPO_SOLICITUD
 * @property string $DESCRIPCION
 * @property double $ID_ESTATUS
 *
 * @property DOCUMENTO[] $dOCUMENTOs
 * @property ESTATUS $1
 */
class TIPOSOLICITUD extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TIPO_SOLICITUD';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_TIPO_SOLICITUD'], 'required'],
            [['ID_TIPO_SOLICITUD', 'ID_ESTATUS'], 'number'],
            [['DESCRIPCION'], 'string', 'max' => 50],
            [['1'], 'exist', 'skipOnError' => true, 'targetClass' => ESTATUS::className(), 'targetAttribute' => ['1' => 'ID_ESTATUS']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_TIPO_SOLICITUD' => 'Id  Tipo  Solicitud',
            'DESCRIPCION' => 'Descripcion',
            'ID_ESTATUS' => 'Id  Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDOCUMENTOs()
    {
        return $this->hasMany(DOCUMENTO::className(), ['1' => 'ID_TIPO_SOLICITUD']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get1()
    {
        return $this->hasOne(ESTATUS::className(), ['ID_ESTATUS' => '1']);
    }
}
