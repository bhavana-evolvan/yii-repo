<?php

/* @var $this yii\web\View */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\widgets\DetailView;

$this->title = 'Contact Form';

?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'task-form']); ?>

            <?= $form->field($model, 'name') ->label('Name')->textInput(['maxlength' => true])?>

            <?= $form->field($model, 'email')->label('Email') ?>
            <?= $form->field($model, 'msg')->textarea(['rows' => '6'])->label('Message') ?>
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'task-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>