<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use Yii;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex()
    {
        $str1 = \yii\helpers\BaseConsole::input("enter first  string : ");
        $str2 = \yii\helpers\BaseConsole::input("enter Second  string : ");
        $action = \yii\helpers\BaseConsole::input(" a) levenshtein \n b) Hamming\n c) both \n which operation you want to perform a,b or c: ");

        if ($action == "a") {
            $result=Yii::$app->taskcomponent->actiondistance($str1, $str2, '0');
            exit("\t First String: {$str1} \n\t Second String: {$str2} \n\t levenshtein: {$result} operations");
            return ExitCode::OK;
        } elseif ($action == "b") {
           $result= Yii::$app->taskcomponent->actiondistance($str1, $str2, '1');

            exit("\t First String: {$str1} \n\t Second String: {$str2} \n\t Hamming: {$result} operations");
            return ExitCode::OK;
        }  elseif ($action == "c") {
            $result=Yii::$app->taskcomponent->actiondistance($str1, $str2, '2');
            exit("\t First String: {$str1} \n\t Second String: {$str2} \n\t  {$result} operations");
            return ExitCode::OK;
        }else{
            echo  "please enter valid method option a,b or c";
            return ExitCode::OK;
        }
        return ExitCode::OK;
    }
}
