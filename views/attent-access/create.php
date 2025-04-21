<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AttentAccess */

$this->title = Yii::t('app', 'Create Attent Access');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Attent Accesses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attent-access-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
