<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peliculas".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $sinopsis
 *
 * @property Etiquetadas[] $etiquetadas
 * @property Etiquetas[] $etiquetas
 */
class Pelicula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'peliculas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'sinopsis'], 'required'],
            [['sinopsis'], 'string'],
            [['titulo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'sinopsis' => 'Sinopsis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEtiquetadas()
    {
        return $this->hasMany(Etiquetada::className(), ['pelicula_id' => 'id'])->inverseOf('pelicula');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEtiquetas()
    {
        return $this->hasMany(Etiqueta::className(), ['id' => 'etiqueta_id'])->viaTable('etiquetadas', ['pelicula_id' => 'id']);
    }
}
