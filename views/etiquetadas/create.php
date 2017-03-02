<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Etiquetada */

$this->title = 'Create Etiquetada';
$this->params['breadcrumbs'][] = ['label' => 'Etiquetadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etiquetada-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
