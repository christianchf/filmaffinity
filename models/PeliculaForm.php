<?php
namespace app\models;

class PeliculaForm extends \yii\base\Model
{
    public $titulo;

    public function rules()
    {
        return [
            [['titulo'], 'required'],
            [['titulo'], 'exist',
                'skipOnError' => true,
                'targetClass' => Pelicula::className(),
                'targetAttribute' => ['titulo' => 'titulo'],
            ],
            // ['titulo', function ($attribute, $params) {
            //     $pelicula = Pelicula::findOne(['titulo' => $this->$attribute]);
            //     if ($pelicula !== null) {
            //         $this->addError($attribute, 'La película ya está alquilada.');
            //     }
            // }],
        ];
    }
    public function attributeLabels()
    {
        return [
            'titulo' => 'Titulo',
        ];
    }
}
