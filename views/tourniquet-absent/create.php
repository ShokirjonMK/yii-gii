<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TourniquetAbsent */

$this->title = Yii::t('app', 'Create Tourniquet Absent');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tourniquet Absents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tourniquet-absent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
