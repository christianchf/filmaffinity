<?= \yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'titulo',
    ],
    'tableOptions' => [
        'class' => 'table table-bordered table-hover',
    ],
]) ?>
