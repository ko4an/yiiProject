<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Items;
use app\models\Customers;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dateOrders')->textInput(['value'=>date('Y-m-d H:i:s'),'readonly'=>'readonly']) ?>

    <?
    
    $customers = Customers::find()->all();
    $items = ArrayHelper::map($customers,'id','fullname');
    $params = [
        'prompt' => 'Укажите покупателя'
    ];

    echo $form->field($model, 'Customers_id')->dropDownList($items,$params); 

    $Items = Items::find()->all();
    $items = ArrayHelper::map($Items,'id','number','catalog.name');
    $params = [
        'prompt' => 'Укажите товар'
    ];
    echo $form->field($model, 'items_id')->dropDownList($items,$params); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?= Html::a('Создать пользователя', ['/customers/create'], ['class' => 'btn btn-success']) ?>

</div>
