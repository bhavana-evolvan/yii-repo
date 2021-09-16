<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'str1')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'str2') ?>
                <?= $form->field($model, 'action')
                    ->label('Distance type')
                    ->radioList([
                        0 => 'levenshtein',
                        1 => 'hamming',
                        2 => 'both',
                    ]); ?>

                <div class="form-group">
                    <?= Html::submitButton('get differnce', ['class' => 'btn btn-primary', 'name' => 'task-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

 
</div>