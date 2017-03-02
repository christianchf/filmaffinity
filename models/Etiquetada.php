<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "etiquetadas".
 *
 * @property integer $pelicula_id
 * @property integer $etiqueta_id
 *
 * @property Etiquetas $etiqueta
 * @property Peliculas $pelicula
 */
class Etiquetada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'etiquetadas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pelicula_id', 'etiqueta_id'], 'required'],
            [['pelicula_id', 'etiqueta_id'], 'integer'],
            [['etiqueta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Etiqueta::className(), 'targetAttribute' => ['etiqueta_id' => 'id']],
            [['pelicula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pelicula::className(), 'targetAttribute' => ['pelicula_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pelicula_id' => 'Pelicula ID',
            'etiqueta_id' => 'Etiqueta ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEtiqueta()
    {
        return $this->hasOne(Etiqueta::className(), ['id' => 'etiqueta_id'])->inverseOf('etiquetadas');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelicula()
    {
        return $this->hasOne(Pelicula::className(), ['id' => 'pelicula_id'])->inverseOf('etiquetadas');
    }
}
