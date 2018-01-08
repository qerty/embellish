<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DeleteOrderItemLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Delete Order Item Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delete-order-item-log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'order_id',
            'item_id',
            'qty_per_item',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
