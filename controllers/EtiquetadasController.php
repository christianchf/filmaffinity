<?php

namespace app\controllers;

use Yii;
use app\models\Etiquetada;
use app\models\EtiquetadaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EtiquetadasController implements the CRUD actions for Etiquetada model.
 */
class EtiquetadasController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Etiquetada models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EtiquetadaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Etiquetada model.
     * @param integer $pelicula_id
     * @param integer $etiqueta_id
     * @return mixed
     */
    public function actionView($pelicula_id, $etiqueta_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($pelicula_id, $etiqueta_id),
        ]);
    }

    /**
     * Creates a new Etiquetada model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Etiquetada();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pelicula_id' => $model->pelicula_id, 'etiqueta_id' => $model->etiqueta_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Etiquetada model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $pelicula_id
     * @param integer $etiqueta_id
     * @return mixed
     */
    public function actionUpdate($pelicula_id, $etiqueta_id)
    {
        $model = $this->findModel($pelicula_id, $etiqueta_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pelicula_id' => $model->pelicula_id, 'etiqueta_id' => $model->etiqueta_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Etiquetada model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $pelicula_id
     * @param integer $etiqueta_id
     * @return mixed
     */
    public function actionDelete($pelicula_id, $etiqueta_id)
    {
        $this->findModel($pelicula_id, $etiqueta_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Etiquetada model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $pelicula_id
     * @param integer $etiqueta_id
     * @return Etiquetada the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pelicula_id, $etiqueta_id)
    {
        if (($model = Etiquetada::findOne(['pelicula_id' => $pelicula_id, 'etiqueta_id' => $etiqueta_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
