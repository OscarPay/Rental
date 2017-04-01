<?php

namespace app\controllers;

use Yii;
use app\models\SalesReportSearch;

class SalesReportController extends \yii\web\Controller{

    public function actionIndex()    {
        $DATE_FORMAT = "Y-n-d";
        $postParams = [];

        $searchModel = new SalesReportSearch();

        $today = date($DATE_FORMAT);
        $today_format = date('d-M-y', strtotime($today));

        $dataProvider = $searchModel->search($today, $today);
        $date = $today_format . " - " . $today_format;

        if (Yii::$app->request->post()){
            $postParams = Yii::$app->request->post();     

            $startDate = date($DATE_FORMAT, strtotime($postParams['datetime_start']));
            $endDate = date($DATE_FORMAT, strtotime($postParams['datetime_end']));

            $dataProvider = $searchModel->search($startDate, $endDate);
            $date = $postParams['date_range'];
        }

        return $this->render('index', [
            'date' => $date,
            'dataProvider' => $dataProvider
        ]);
    }

}
