<?php


use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\Catalog */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Catalogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="catalog-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'description'
        ],
    ]);
    $provider = new ArrayDataProvider([
        'allModels' => $model->items,
        'pagination' => [
            'pageSize' => 10,
        ],
    ]);
    echo GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'number',
            'info',
            'compatibility.Granta',
            'compatibility.Priora',
            'compatibility.Xray',
            'compatibility.Vesta',
            [
                'class' => \yii\grid\ActionColumn::class,
                'template' => '{info}',
                'buttons' => [
                    'info' => function ($url, $model, $key) {
                        $title = \Yii::t('yii', $model->id);
                        $id = 'info-'.$key;
                        $options = [
                            'title' => $title,
                            'aria-label' => $title,
                            'data-pjax' => '0',
                            'id' => $id
                        ];
                        $url = Url::current(['/orders/create/']);
                        $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-ok"]);
                        return Html::a($icon, $url, $options);
                    },
                ],
            ],
        ]
    ])
    ?>

</div>
