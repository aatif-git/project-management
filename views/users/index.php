<?php

use app\models\users;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
/** @var yii\web\View $this */
/** @var app\models\UsersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'first_name',
                'label' => 'First Name'
            ],
            [
                'attribute' => 'lasst_name',
                'label' => 'Last Name'
            ],
            [
                'attribute' => 'username',
                'label' => 'User Name'
            ],
            [
                'attribute' => 'dob',
                'label' => 'Date Of Birth'
            ],
            [
                'attribute' => 'profile',
                'label' => 'Profile',
                'format' => 'image',
                'value' => function($model){
                    return 'localhost:8080/web/uploads/'.$model->profile;
                }
            ],
           
           
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, users $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
