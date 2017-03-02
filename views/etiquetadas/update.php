<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Etiquetada */

$this->title = 'Update Etiquetada: ' . $model->pelicula_id;
$this->params['breadcrumbs'][] = ['label' => 'Etiquetadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pelicula_id, 'url' => ['view', 'pelicula_id' => $model->pelicula_id, 'etiqueta_id' => $model->etiqueta_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="etiquetada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
