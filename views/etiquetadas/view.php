<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Etiquetada */

$this->title = $model->pelicula_id;
$this->params['breadcrumbs'][] = ['label' => 'Etiquetadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etiquetada-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'pelicula_id' => $model->pelicula_id, 'etiqueta_id' => $model->etiqueta_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'pelicula_id' => $model->pelicula_id, 'etiqueta_id' => $model->etiqueta_id], [
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
            'pelicula_id',
            'etiqueta_id',
        ],
    ]) ?>

</div>
