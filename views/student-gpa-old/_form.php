<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StudentGpaOld */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-gpa-old-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direction')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'course')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'semestr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edu_lang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subject_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username_distant')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'srs_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'all_ball')->textInput() ?>

    <?= $form->field($model, 'alphabet')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'student_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'is_deleted')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
