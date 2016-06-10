<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

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

    const DISPONIBLE = "DISPONIBLE";
    const RENTADO = "RENTADO";

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
            [['imagen', 'transmision', 'precio', 'modelo', 'marca', 'placas', 'tipo', 'poliza', 'num_serie',
                'num_pasajeros', 'descripcion', 'nombre'], 'required', 'message' => 'No puede estar vacío'],
            [['descripcion'], 'string'],
            [['status'], 'default', 'value' => $this::DISPONIBLE],
            [['precio'], 'number', 'message' => 'Debe ser un número'],
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
            'precio' => 'Precio',
            'status' => 'Estatus',
            'nombre' => 'Nombre'
        ];
    }

    /**
     * fetch stored image file name with complete path
     * @return string
     */
    public function getImageFile() {
        if (!file_exists(Yii::$app->params['uploadPath'])) {
            mkdir(Yii::$app->params['uploadPath'], 0777, true);
        }
        return isset($this->imagen) ? Yii::$app->params['uploadPath'] . $this->imagen : null;
    }

    /**
     * fetch stored image url
     * @return string
     */
    public function getImageUrl() {
        // return a default image placeholder if your source imagen is not found
        $imagen = isset($this->imagen) ? $this->imagen : 'default_car.jpg';
        return Yii::$app->params['uploadUrl'] . $imagen;;
    }

    /**
     * Process upload of image
     *
     * @return mixed the uploaded image instance
     */
    public function uploadImage() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $image = UploadedFile::getInstance($this, 'imagen');

        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }

        // store the source file name
        $ext = array_pop(explode(".", $image->name));

        // generate a unique file name
        $this->imagen = Yii::$app->security->generateRandomString() . ".{$ext}";

        // the uploaded image instance
        return $image;
    }

    /**
     * Process deletion of image
     *
     * @return boolean the status of deletion
     */
    public function deleteImage() {
        $file = $this->getImageFile();

        // check if file exists on server
        if (empty($file) || !file_exists($file)) {
            return false;
        }

        // check if uploaded file can be deleted on server
        if (!unlink($file)) {
            return false;
        }

        // if deletion successful, reset your file attributes
        $this->imagen = null;

        return true;
    }
}
