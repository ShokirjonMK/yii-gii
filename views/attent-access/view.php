<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AttentAccess */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Attent Accesses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="attent-access-view">

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
            'start_date',
            'end_date',
            'time_table_id:datetime',
            'subject_id',
            'user_id',
            'edu_year_id',
            'subject_category_id',
            'time_option_id:datetime',
            'faculty_id',
            'edu_plan_id',
            'edu_semestr_id',
            'type',
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
