<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rent".
 *
 * @property integer $id
 * @property integer $automovil_id
 * @property integer $cliente_id
 * @property integer $vendedor_id
 * @property string $status
 * @property integer $num_dias
 * @property double $total
 * @property string $fecha_entrega
 * @property string $fecha_devolucion
 * @property string $lugar_entrega
 * @property double $penalizacion
 * @property string $nota
 *
 * @property Car $automovil
 * @property Person $cliente
 * @property Person $vendedor
 */
class Rent extends \yii\db\ActiveRecord {

    const APROBADO = "APROBADO";
    const NO_APROBADO = "NO APROBADO";
    const CANCELADO = "CANCELADO";

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'rent';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['automovil_id', 'cliente_id', 'status', 'num_dias', 'total', 'fecha_entrega', 'fecha_devolucion', 'lugar_entrega'], 'required'],
            [['automovil_id', 'cliente_id', 'vendedor_id', 'num_dias'], 'integer'],
            [['status'], 'default', 'value' => $this::NO_APROBADO],
            [['total', 'penalizacion'], 'number'],
            [['status', 'fecha_entrega', 'fecha_devolucion', 'lugar_entrega', 'nota'], 'string', 'max' => 255],
            [['automovil_id'], 'exist', 'skipOnError' => true, 'targetClass' => Car::className(), 'targetAttribute' => ['automovil_id' => 'id']],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['cliente_id' => 'id']],
            [['vendedor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['vendedor_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'automovil_id' => 'Automovil ID',
            'cliente_id' => 'Cliente ID',
            'vendedor_id' => 'Vendedor ID',
            'status' => 'Status',
            'num_dias' => 'Num Dias',
            'total' => 'Total',
            'fecha_entrega' => 'Fecha Entrega',
            'fecha_devolucion' => 'Fecha Devolucion',
            'lugar_entrega' => 'Lugar Entrega',
            'penalizacion' => 'Penalizacion',
            'nota' => 'Nota',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutomovil() {
        return $this->hasOne(Car::className(), ['id' => 'automovil_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente() {
        return $this->hasOne(Person::className(), ['id' => 'cliente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendedor() {
        return $this->hasOne(Person::className(), ['id' => 'vendedor_id']);
    }
}
