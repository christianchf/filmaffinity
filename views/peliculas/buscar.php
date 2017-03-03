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
$urlActual = Url::to(['peliculas/buscar']);
$js = <<<EOT
    var delay = (function() {
        var timer = 0;
        return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
        };
    })();
    $('#peliculaform-titulo').keyup(function() {
        delay(function() {
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
                }
            });
        }, 500);
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
