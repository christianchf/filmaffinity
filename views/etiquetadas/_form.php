<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Etiquetada */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="etiquetada-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pelicula_id')->textInput() ?>

    <?= $form->field($model, 'etiqueta_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
