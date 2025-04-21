<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClubCategory */

$this->title = Yii::t('app', 'Create Club Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Club Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="club-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
