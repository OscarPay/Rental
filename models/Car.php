<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property integer $id
 * @property string $imagen
 * @property string $transmision
 * @property string $modelo
 * @property string $marca
 * @property string $placas
 * @property string $tipo
 * @property string $poliza
 * @property string $num_serie
 * @property string $num_pasajeros
 * @property string $descripcion
 */
class Car extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'car';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['imagen', 'transmision', 'modelo', 'marca', 'placas', 'tipo', 'poliza', 'num_serie', 'num_pasajeros', 'descripcion'], 'required'],
            [['descripcion'], 'string'],
            [['imagen'], 'safe'],
            [['imagen'], 'file', 'extensions' => 'jpg, gif, png'],
            [['imagen', 'transmision', 'modelo', 'marca', 'placas', 'tipo', 'poliza', 'num_serie', 'num_pasajeros'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'imagen' => 'Imagen',
            'transmision' => 'Transmision',
            'modelo' => 'Modelo',
            'marca' => 'Marca',
            'placas' => 'Placas',
            'tipo' => 'Tipo',
            'poliza' => 'Poliza',
            'num_serie' => 'Num Serie',
            'num_pasajeros' => 'Num Pasajeros',
            'descripcion' => 'Descripcion',
        ];
    }

}
