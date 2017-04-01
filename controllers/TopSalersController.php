<?php

namespace app\controllers;
use Yii;
use app\models\SalesReportSearch;

class TopSalersController extends \yii\web\Controller {
    public function actionIndex() {
        $DATE_FORMAT = "Y-n-d";
        $postParams = [];

        $searchModel = new SalesReportSearch();

        $today = date($DATE_FORMAT);
        $today_format = date('d-M-y', strtotime($today));

        $rents = $searchModel->searchTopSalers($today, $today);
        $date = $today_format . " - " . $today_format;

         if (Yii::$app->request->post()){
             $postParams = Yii::$app->request->post();     

            $startDate = date($DATE_FORMAT, strtotime($postParams['datetime_start']));
            $endDate = date($DATE_FORMAT, strtotime($postParams['datetime_end']));

            $rents = $searchModel->searchTopSalers($startDate, $endDate);
            $date = $postParams['date_range_top_salers'];
         }

        return $this->render('index',[
            'date' => $date,
            'rents' => $rents
        ]);
    }

}
