<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\jui\DatePicker;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-register">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to Register:</p>

    <div class="row">
        <div class="col-lg-8">

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['enctype' => 'multipart/form-data','method' => 'post'],
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'first_name')->textInput(['autofocus' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'last_name')->textInput() ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'username')->textInput() ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'email')->textInput() ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <?= $form->field($model, 'dob')->widget(DatePicker::class,['options' => ['placeholder' => 'Enter DOB','dateFormat' => 'YYYY-MM-dd']]) ?>

                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'profile')->fileInput() ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'password')->textInput() ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'confirm_password')->textInput()->label('Confirmation') ?>
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <?= Html::submitButton('Register', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                    <div>
                    </div>
                </div>

            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>