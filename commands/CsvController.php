<?php

namespace app\commands;

use app\models\Taskform;
use yii\console\Controller;
use yii\data\Pagination;
use Yii;
use yii\data\BaseDataProvider;
use yii2tech\csvgrid\CsvGrid;
use yii\data\ArrayDataProvider;
use  yii\data\ActiveDataProvider;

class CsvController extends Controller
{
    public function actionIndex()
    {
        $data= Yii::$app->db->createCommand("SELECT * FROM taskform")->queryAll();
         
      
     
        $pagination = new Pagination(['totalCount' => 50]);
        echo "########## File conversion in progress ########## \n";
        echo "# \n";
        echo "## \n";
        echo "### \n";
        echo "#### \n";
        echo "##### \n";
        echo "###### \n";
        echo "####### \n";
        echo "######## \n";
        echo "########## \n";
        $exporter = new CsvGrid([
            'dataProvider' => new ArrayDataProvider([
                'allModels' => $data,
                'pagination' => [

                    'pageSize' => 50,
                ],
            ]),
            'columns' => [
                [
                    'attribute' => 'name',
                ],
                [
                    'attribute' => 'email',

                ],
                [
                    'attribute' => 'msg',

                ],
            ],
        ]);
        $csv = Yii::getAlias('@runtime') . '/data-' . uniqid() . '.csv';
        if ($exporter->export()->saveAs($csv)) {
            echo "########### ** File genetrated succesfully ** ##########";
        } else {
            echo "########## Something went wrong ##########";
        }
    }
}

