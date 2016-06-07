<?php

namespace app\controllers;

use Yii;
use app\models\Person;
use app\models\PersonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PersonController implements the CRUD actions for Person model.
 */
class PersonController extends Controller {
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    ///////////// Vendedores ///////////////////

    public function actionIndexVendedores() {
        $searchModel = new PersonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, Person::VENDEDOR);

        return $this->render('index-vendedores', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewVendedor($id) {
        return $this->render('view-vendedor', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreateVendedor() {
        $model = new Person();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession ()->setFlash ('success', 'El vendedor se ha creado exitosamente');
            return $this->redirect(['view-vendedor', 'id' => $model->id]);
        } else {
            return $this->render('create-vendedor', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateVendedor($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession ()->setFlash ('success', 'El vendedor se ha actualizado exitosamente');
            return $this->redirect(['view-vendedor', 'id' => $model->id]);
        } else {
            return $this->render('update-vendedor', [
                'model' => $model,
            ]);
        }
    }

    public function actionDeleteVendedor($id) {
        $this->findModel($id)->delete();
        Yii::$app->getSession ()->setFlash ('success', 'El vendedor se ha eliminado exitosamente');
        return $this->redirect(['index-vendedores']);
    }

    ///////////// Cliente ///////////////////

    public function actionIndexClientes() {
        $searchModel = new PersonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, Person::CLIENTE);

        return $this->render('index-clientes', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewCliente($id) {
        return $this->render('view-cliente', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreateCliente() {
        $model = new Person();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession ()->setFlash ('success', 'El cliente se ha creado exitosamente');
            return $this->redirect(['view-cliente', 'id' => $model->id]);
        } else {
            return $this->render('create-cliente', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateCliente($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession ()->setFlash ('success', 'El cliente se ha actualizado exitosamente');
            return $this->redirect(['view-cliente', 'id' => $model->id]);
        } else {
            return $this->render('update-cliente', [
                'model' => $model,
            ]);
        }
    }

    public function actionDeleteCliente($id) {
        $this->findModel($id)->delete();
        Yii::$app->getSession ()->setFlash ('success', 'El cliente se ha eliminado exitosamente');
        return $this->redirect(['index-clientes']);
    }

    /**
     * Finds the Person model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Person the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Person::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
