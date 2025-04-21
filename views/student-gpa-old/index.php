<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentGpaOldQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Student Gpa Olds');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-gpa-old-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Student Gpa Old'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'last_name',
            'first_name',
            'middle_name',
            'direction',
            //'course',
            //'group',
            //'semestr',
            //'edu_lang',
            //'subject_name',
            //'username_distant',
            //'srs_id',
            //'all_ball',
            //'alphabet',
            //'mark',
            //'student_id',
            //'status',
            //'order',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'is_deleted',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, StudentGpaOld $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
