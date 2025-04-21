<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StudentGpaOld */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Student Gpa Olds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="student-gpa-old-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'last_name',
            'first_name',
            'middle_name',
            'direction',
            'course',
            'group',
            'semestr',
            'edu_lang',
            'subject_name',
            'username_distant',
            'srs_id',
            'all_ball',
            'alphabet',
            'mark',
            'student_id',
            'status',
            'order',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'is_deleted',
        ],
    ]) ?>

</div>
