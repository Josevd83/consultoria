<?php

namespace app\controllers;

use Yii;
use app\models\DOCUMENTO;
use app\models\DOCUMENTOSearch;
use app\models\SOLICITANTE;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DocumentoController implements the CRUD actions for DOCUMENTO model.
 */
class DocumentoController extends Controller
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
     * Lists all DOCUMENTO models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DOCUMENTOSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DOCUMENTO model.
     * @param double $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DOCUMENTO model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DOCUMENTO();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_DOCUMENTO]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DOCUMENTO model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param double $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_DOCUMENTO]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DOCUMENTO model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param double $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DOCUMENTO model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param double $id
     * @return DOCUMENTO the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DOCUMENTO::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionBuscarpersona()
    {
		$parametros = [':nacionalidad' => Yii::$app->request->post('nacionalidad'), ':num_cedula' => Yii::$app->request->post('num_cedula')];
		
		$persona = Yii::$app->db->createCommand('SELECT * FROM onidex WHERE nac=:nacionalidad AND cedula=:num_cedula')->bindValues($parametros)->queryOne();
		//$this->layout = false;

		$modelSolicitante = new SOLICITANTE();

        if($persona){
			$modelSolicitante->NACIONALIDAD = $persona['NAC'];
			$modelSolicitante->CEDULA = $persona['CEDULA'];
			$modelSolicitante->PRIMER_NOMBRE = $persona['PRIMERNOMBRE'];
			$modelSolicitante->SEGUNDO_NOMBRE = $persona['SEGUNDONOMBRE'];
			$modelSolicitante->PRIMER_APELLIDO = $persona['PRIMERAPELLIDO'];
			$modelSolicitante->SEGUNDO_APELLIDO = $persona['SEGUNDOAPELLIDO'];
		}
        
        if ($modelSolicitante->load(Yii::$app->request->post()) && $modelSolicitante->save()) {
            return $this->redirect(['view', 'id' => $modelSolicitante->ID_SOLICITANTE]);
        } else {
            /*return $this->render('create', [
                'model' => $model,
            ]);*/
            //return $this->render('//solicitante/_form',['model'=>$modelSolicitante]);
            return $this->renderpartial('_formSolicitante',['modelSolicitante'=>$modelSolicitante]);
        }
		
	}
}
