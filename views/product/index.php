<?php

use yii\grid\GridView;

/* @var $search_model app\models\CountrySearch */
/* @var $data_provider yii\data\ActiveDataProvider */

?>
<div>

    <h1>Test</h1>

    <?= GridView::widget([
        'dataProvider' => $data_provider,
        'filterModel' => $search_model,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category_id',
            'price',
            'hidden',
            'name',
        ],
    ]); ?>


</div>