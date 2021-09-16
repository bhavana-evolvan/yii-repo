<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\setAttributes;

/**
 * ContactForm is the model behind the contact form.
 */
class TaskForm extends Model
{
    public $name;
    public $email;
    public $msg;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'msg'], 'required'],
            [['email'], 'email'],
        ];
    }
    // public function insert()
    // {
    //     $model = new TaskForm();
    //     $model->setAttributes($this->getAttributes());

    //     if (!$model->save()) {
    //         return ("error");
    //     }
    //     return true;
    // }
    /**
     * @return array customized attribute labels
     */


    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
}
