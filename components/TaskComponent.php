<?php

namespace app\components;


use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class taskcomponent extends Component
{
    public function actiondistance($str1, $str2, $action)
    {
        switch ($action) {
            case 0:
                return $this->levenshteinDist($str1, $str2);
                break;
            case 1:
                return $this->hammingDist($str1, $str2);
                break;
            case 2:
                $hammingresult = $this->hammingDist($str1, $str2);
                $levenshteinresult =  $this->levenshteinDist($str1, $str2);
                return $hammingresult . '/n' . $levenshteinresult;
                break;
            default:
                return "Something is wrong";
        }
    }
    protected function levenshteinDist($str1, $str2)
    {
        $str1_length =  strlen($str1);
        $str2_length =  strlen($str2);
        $dp = [];
        for ($i = 0; $i <= $str1_length; $i++) {
            for ($j = 0; $j <= $str2_length; $j++) {
                if ($i == 0)
                    $dp[$i][$j] = $j;
                else if ($j == 0)
                    $dp[$i][$j] = $i;
                else if ($str1[$i - 1] == $str2[$j - 1])
                    $dp[$i][$j] = $dp[$i - 1][$j - 1];
                else {
                    $dp[$i][$j] = 1 + min(
                        $dp[$i][$j - 1],
                        $dp[$i - 1][$j],
                        $dp[$i - 1][$j - 1]
                    );
                }
            }
            for ($j = 0; $j <= $str2_length; $j++) {

                if ($i == 0)
                    $dp[$i][$j] = $j;
                else if ($j == 0)
                    $dp[$i][$j] = $i;
                else if ($str1[$i - 1] == $str2[$j - 1])
                    $dp[$i][$j] = $dp[$i - 1][$j - 1];
                else {
                    $dp[$i][$j] = 1 + min(
                        $dp[$i][$j - 1],
                        $dp[$i - 1][$j],
                        $dp[$i - 1][$j - 1]
                    );
                }
            }
        }
        $string1 = "string One = " . $str1;
        $string2 = "string Two = " .  $str2;
        $result = " levenshtein " . $dp[$str1_length][$str2_length] . " operations performed";

        return   $result;
    }
    protected function hammingDist($str1, $str2)
    {

        // code logic for hamming function
       
        $count = 0;
        $str1_length =  strlen($str1);
        $str2_length =  strlen($str2);
        if ($str1_length != $str2_length) { // if both string lengths are not equal 
            $string1 = "a." . $str1;
            $string2 = "b." .  $str2;
            $result = "Error:-  string a and string b  should be of same length ";

            return     $string1 . "\n" . $string2 . "\n" . $result;
        }
        for($i=0;$i<$str1_length;$i++)
            if ($str1[$i] != $str2[$i])
                $count++; // counts how many differences are ther in two equal strings 
        $i++;

       
        $result = "hamming distance is " . $count. "\n";

        return   $result;
    }
}
