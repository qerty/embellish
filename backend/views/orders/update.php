<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Orders */

$this->title = 'Update Order No. : '.$model->order_id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_id, 'url' => ['view', 'id' => $model->order_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="orders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
