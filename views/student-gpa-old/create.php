<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StudentGpaOld */

$this->title = Yii::t('app', 'Create Student Gpa Old');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Student Gpa Olds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-gpa-old-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
