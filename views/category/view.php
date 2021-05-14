<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['index.php/category/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['index.php/category/delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?
    $provider = new ArrayDataProvider([
        'allModels' => $model->catalogs,
        'sort' => [
            'attributes' => ['id', 'username'],
        ],
        'pagination' => [
            'pageSize' => 10,
        ],
    ]);
    echo GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'description',
            [
                /**
                 * Указываем класс колонки ActionColumn
                 */
                'class' => \yii\grid\ActionColumn::class,
                
                /**
                 * Определяем набор кнопок. По умолчанию {view} {update} {delete}
                 */
                'template' => '{info}',
            
                'buttons' => [
                    'info' => function ($url, $model, $key) {
                        $iconName = "info-sign";
                        
                        //Текст в title ссылки, что виден при наведении
                        $title = \Yii::t('yii', $model->id);
                        
                        $id = 'info-'.$key;
                        $options = [
                            'title' => $title,
                            'aria-label' => $title,
                            'data-pjax' => '0',
                            'id' => $id
                        ];
                        
                        $url = Url::current(['catalog/view', 'id' => $model->id]);
                        
                        //Для стилизации используем библиотеку иконок
                        $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-$iconName"]);
            
                        return Html::a($icon, $url, $options);
                    },
                ],
            ],
        ]    
    ]);
    echo Html::a('Create catalog', ['index.php/catalog/create'], ['class' => 'btn btn-primary'])
    ?>

</div>
