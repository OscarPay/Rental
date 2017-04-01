<?php

namespace app\controllers;

use Yii;
use app\models\SalesReportSearch;

class TopCarsController extends \yii\web\Controller {
    public function actionIndex() {
        $DATE_FORMAT = "Y-n-d";
        $postParams = [];

        $searchModel = new SalesReportSearch();

        setlocale(LC_ALL,"es_ES");
        $today = date($DATE_FORMAT);
        $timestamp = strtotime($today);
        #$today = strftime($DATE_FORMAT, $timestamp);
        $today_format = date('d-M-y', strtotime($today));

        $rents = $searchModel->searchTopCars($today, $today);
        $date = $today_format . " - " . $today_format;

         if (Yii::$app->request->post()){
             $postParams = Yii::$app->request->post();     

            $startDate = date($DATE_FORMAT, strtotime($postParams['datetime_start']));
            $endDate = date($DATE_FORMAT, strtotime($postParams['datetime_end']));

            $rents = $searchModel->searchTopCars($startDate, $endDate);
            $date = $postParams['date_range_top_cars'];
         }

        return $this->render('index',[
            'date' => $date,
            'rents' => $rents
        ]);
    }

}
