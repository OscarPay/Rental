<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;

/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $password
 * @property integer $celular
 * @property string $email
 * @property string $tipo
 * @property string $num_licencia
 * @property string $num_cuenta
 * @property string $banco
 * @property string $cuenta
 * @property string $cod_seguridad
 * @property string $vencimiento
 * @property string $licencia
 */
class Person extends \yii\db\ActiveRecord implements IdentityInterface {

    const ADMINISTRADOR = "ADMINISTRADOR";
    const CLIENTE = "CLIENTE";
    const VENDEDOR = "VENDEDOR";

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['nombre', 'apellido', 'password', 'celular', 'email', 'tipo'], 'required', 'message' => 'No puede estar vacío'],
            [['email'], 'email', 'message' => 'Debe ser un email válido'],
            [['celular'], 'integer', 'message' => 'Debe ser un número entero'],
            [['nombre', 'apellido', 'email', 'tipo', 'num_licencia', 'num_cuenta', 'banco', 'cuenta', 'cod_seguridad', 'vencimiento', 'licencia'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'password' => 'Password',
            'celular' => 'Celular',
            'email' => 'Email',
            'tipo' => 'Tipo',
            'num_licencia' => 'Num Licencia',
            'num_cuenta' => 'Num Cuenta',
            'banco' => 'Banco',
            'cuenta' => 'Cuenta',
            'cod_seguridad' => 'Cod Seguridad',
            'vencimiento' => 'Vencimiento',
            'licencia' => 'Licencia',
        ];
    }

    public static function findByEmail($email) {
        return self::findOne(['email' => $email]);
    }

    public function validatePassword($password) {
        return $this->password === $password;
    }

    public function getFullName() {
        return $this->nombre . " " . $this->apellido;
    }

    /**
     * Finds an identity by the given ID.
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id) {
        return self::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException();
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|integer an ID that uniquely identifies a user identity.
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey() {
        throw new NotSupportedException();
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return boolean whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey) {
        return $this->authKey === $authKey;
    }
}
