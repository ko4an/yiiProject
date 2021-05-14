<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
if(!empty(Yii::$app->user->identity->username)){ ?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добро пожаловать!</h1>

        <p class="lead">Вы успешно вошли в аккаунт как <?php echo Yii::$app->user->identity->username;  ?> </p>

    </div>
    <div class="body-content">

        <div class="row">
            <a href="index.php?r=orders">
            <div style="background-color: #8581bd; border-radius: 1vw 0 0 1vw" class="col-lg-4">
                <h2>Заказы</h2>

                <p>Список заказов и их статус.</p>
            </div>
            </a>
            <a href="index.php?r=category">
            <div style="background-color: #60c3d9" class="col-lg-4">
                <h2>Каталог</h2>

                <p>Содержит список товаров находящихся в наличии.</p>
            </div>
            </a>
            <a href="index.php?r=customers">
            <div style="background-color: #00a1e0; border-radius: 0 1vw 1vw 0" class="col-lg-4">
                <h2>Список Покупателей</h2>

                <p>Информации о покупателях и их заказах.</p>
            </div>
            </a>
        </div>
    </div>
</div>
<style>
a:hover{
    color:black;    
}
a:link{
    color:black;    
}
a{
    color:black;    
}
.col-lg-4:hover{
    margin-top: 0.5vw;
}
</style>
<?php } ?>