<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telephone')->widget(MaskedInput::className(), [
                        'mask' => '+7 (999) 999-99-99',
                        'options' => [
                            'class' => 'form-control placeholder-style',
                            'id' => 'phone2',
                            'placeholder' => ('Телефон')
                        ],
                        'clientOptions' => [
                            'clearIncomplete' => true
                        ]
                    ])->label(false) ?>

    <?= $form->field($model, 'mail')->textInput(['maxlength' => true,'type'=>'email']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
