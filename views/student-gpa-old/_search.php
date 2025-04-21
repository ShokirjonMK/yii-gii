<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StudentGpaOldQuery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-gpa-old-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'last_name') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'middle_name') ?>

    <?= $form->field($model, 'direction') ?>

    <?php // echo $form->field($model, 'course') ?>

    <?php // echo $form->field($model, 'group') ?>

    <?php // echo $form->field($model, 'semestr') ?>

    <?php // echo $form->field($model, 'edu_lang') ?>

    <?php // echo $form->field($model, 'subject_name') ?>

    <?php // echo $form->field($model, 'username_distant') ?>

    <?php // echo $form->field($model, 'srs_id') ?>

    <?php // echo $form->field($model, 'all_ball') ?>

    <?php // echo $form->field($model, 'alphabet') ?>

    <?php // echo $form->field($model, 'mark') ?>

    <?php // echo $form->field($model, 'student_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'is_deleted') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
