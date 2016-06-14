<?php

namespace app\controllers;

use app\models\Car;
use Yii;
use app\models\Rent;
use app\models\RentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RentController implements the CRUD actions for Rent model.
 */
class RentController extends Controller {
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

    /**
     * Lists all Rent models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new RentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexAprobados() {
        $searchModel = new RentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, Rent::APROBADO);

        return $this->render('index-aprobados', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexPorAprobar() {
        $searchModel = new RentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, Rent::NO_APROBADO);

        return $this->render('index-por-aprobar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rent model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionAprobar($id) {
        $model = $this->findModel($id);
        $model->status = Rent::APROBADO;
        $model->vendedor_id = Yii::$app->user->identity->getId();

        if ($model->save()) {
            Yii::$app->session->setFlash('success', 'La renta ha sido aprobada con éxito');
        }else{
            Yii::$app->session->setFlash('danger', 'Error al actualizar el estado de la renta');
        }

        return $this->redirect(['index-aprobados']);
    }

    public function actionCancelar($id) {
        $model = $this->findModel($id);
        $model->status = Rent::CANCELADO;
        $model->vendedor_id = Yii::$app->user->identity->getId();

        if ($model->save()) {
            Yii::$app->session->setFlash('success', 'La renta ha sido cancelada con éxito');
        }else{
            Yii::$app->session->setFlash('danger', 'Error al actualizar el estado de la renta');
        }

        return $this->redirect(['index-por-aprobar']);
    }

    /**
     * Creates a new Rent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Rent();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionRequest() {
        $fecha_entrega = new \DateTime(Yii::$app->request->post ('Rent')['fecha_entrega']);
        $fecha_devolucion = new \DateTime(Yii::$app->request->post ('Rent')['fecha_devolucion']);
        $interval = $fecha_entrega->diff ($fecha_devolucion);
        $days = $interval->d + 1;

        $car = Car::findOne(['id' => Yii::$app->request->post ('Rent')['automovil_id']]);

        $model = new Rent();
        $model->status = Rent::NO_APROBADO;
        $model->num_dias = $days;
        $model->total = $car->precio * $days;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Su solicitud ha sido enviada');
            return $this->redirect(['/car/index-clientes']);
        } else {
            Yii::$app->session->setFlash('danger', 'Error al solicitar la renta');
            return $this->redirect(['/car/view', 'id' => Yii::$app->request->post ('Rent')['automovil_id']]);
        }
    }

    /**
     * Updates an existing Rent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Rent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Rent::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
