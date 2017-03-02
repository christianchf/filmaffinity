<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model app\models\AlquilerForm */
/* @var $form ActiveForm */
/* @var $alquileres Alquiler[] */
$this->title = 'Buscador de peliculas';
$this->params['breadcrumbs'][] = $this->title;
$url = Url::to(['peliculas/peliculas']);
$urlActual = Url::to('');
$js = <<<EOT
    $('#peliculaform-titulo').keyup(function() {
        var q = $('#peliculaform-titulo').val();
        if (q == '') {
            $('#peliculas').html('');
        }
        $.ajax({
            method: 'GET',
            url: '$url',
            data: {
                q: q
            },
            success: function (data, status, event) {
                $('#peliculas').html(data);
                // $('#peliculas tr').click(function (event) {
                //     var target = event.currentTarget;
                //     if ($(target).children().length >= 1) {
                //         var obj = $(target).children().first();
                //         titulo = $(obj[0]).text();
                //         window.location.assign('$urlActual' + '?titulo=' + titulo);
                //     }
                // });
            }
        });
    });
EOT;
$this->registerJs($js);
?>
<div class="peliculas-buscar">
    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['peliculas/buscar'],
    ]); ?>
        <?= $form->field($model, 'titulo') ?>
        <div class="form-group">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div><!-- alquileres-alquilar -->
<div id="peliculas">
</div>
