<?php

namespace app\controllers;

use Yii;
use app\models\MOVIMIENTO;
use app\models\MOVIMIENTOSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\TIPODOCUMENTOPASOS;
use yii\db\Expression;
use app\models\VISTAMOVIMIENTO;
use yii\helpers\Json;
use yii\web\Response;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * MovimientoController implements the CRUD actions for MOVIMIENTO model.
 */
class MovimientoController extends Controller
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
     * Lists all MOVIMIENTO models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MOVIMIENTOSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MOVIMIENTO model.
     * @param double $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
           // 'model' => $this->findModel($id),
            'model' => $model = VISTAMOVIMIENTO::findOne($id),
        ]);
    }

    /**
     * Creates a new MOVIMIENTO model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MOVIMIENTO();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_MOVIMIENTO]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MOVIMIENTO model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param double $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_MOVIMIENTO]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MOVIMIENTO model.
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
     * Finds the MOVIMIENTO model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param double $id
     * @return MOVIMIENTO the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MOVIMIENTO::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionEnviar($id){
		//echo $id;die;
		//$this->layout = false;
		//die($id);
		$modelMovimiento = MOVIMIENTO::findOne($id);
		//var_dump($modelMovimiento->NRO_PASO);die;
		$modelTipodocumentoPasosProximo = TIPODOCUMENTOPASOS::findOne(['ID_TIPO_DOCUMENTO'=>$modelMovimiento->ID_TIPO_DOCUMENTO,'NRO_PASO'=>($modelMovimiento->NRO_PASO+1)]);
		$modelNewMovimiento = new MOVIMIENTO;
		
		switch ($modelMovimiento->ID_ESTATUS){
			case '3':
//			die('registrado');
			//$modelTipoDocumentoPasos = TIPODOCUMENTOPASOS::find()->where(['NRO_PASO'=>1])->one();
			
			
			$modelNewMovimiento->ID_MOVIMIENTO = $modelMovimiento->getNextVal();
			$modelNewMovimiento->ID_DOCUMENTO = $modelMovimiento->ID_DOCUMENTO;
			$modelNewMovimiento->ID_ESTATUS = $modelTipodocumentoPasosProximo->ID_ESTATUS;
			$modelNewMovimiento->ID_DEPARTAMENTO = $modelTipodocumentoPasosProximo->ID_DEPARTAMENTO;
			$modelNewMovimiento->ID_USUARIO = 1; //modificar
			$modelNewMovimiento->ID_SOLICITANTE = $modelMovimiento->ID_SOLICITANTE;
			$modelNewMovimiento->ID_TIPO_MOVIMIENTO = $modelTipodocumentoPasosProximo->ID_TIPO_MOVIMIENTO;
			$modelNewMovimiento->ID_TIPO_DOCUMENTO = $modelTipodocumentoPasosProximo->ID_TIPO_DOCUMENTO;
			$modelNewMovimiento->ID_PASO = $modelTipodocumentoPasosProximo->ID_PASO;
			$modelNewMovimiento->NRO_PASO = $modelTipodocumentoPasosProximo->NRO_PASO;
			$modelNewMovimiento->DESCRIPCION_PASO = $modelTipodocumentoPasosProximo->DESCRIPCION_PASO;
			$modelNewMovimiento->OBSERVACIONES = 'Documento enviado';
			$modelNewMovimiento->FECHA_CREACION = new Expression('SYSDATE');
			break;
			
			case '4':
//			die('registrado');
			//$modelTipoDocumentoPasos = TIPODOCUMENTOPASOS::find()->where(['NRO_PASO'=>1])->one();
			
			
			$modelNewMovimiento->ID_MOVIMIENTO = $modelMovimiento->getNextVal();
			$modelNewMovimiento->ID_DOCUMENTO = $modelMovimiento->ID_DOCUMENTO;
			$modelNewMovimiento->ID_ESTATUS = $modelTipodocumentoPasosProximo->ID_ESTATUS;
			$modelNewMovimiento->ID_DEPARTAMENTO = $modelTipodocumentoPasosProximo->ID_DEPARTAMENTO;
			$modelNewMovimiento->ID_USUARIO = 1; //modificar
			$modelNewMovimiento->ID_SOLICITANTE = $modelMovimiento->ID_SOLICITANTE;
			$modelNewMovimiento->ID_TIPO_MOVIMIENTO = $modelTipodocumentoPasosProximo->ID_TIPO_MOVIMIENTO;
			$modelNewMovimiento->ID_TIPO_DOCUMENTO = $modelTipodocumentoPasosProximo->ID_TIPO_DOCUMENTO;
			$modelNewMovimiento->ID_PASO = $modelTipodocumentoPasosProximo->ID_PASO;
			$modelNewMovimiento->NRO_PASO = $modelTipodocumentoPasosProximo->NRO_PASO;
			$modelNewMovimiento->DESCRIPCION_PASO = $modelTipodocumentoPasosProximo->DESCRIPCION_PASO;
			$modelNewMovimiento->OBSERVACIONES = 'Documento enviado a vicepresidencia';
			$modelNewMovimiento->FECHA_CREACION = new Expression('SYSDATE');
			break;
		}
		
		if($modelNewMovimiento->save(false)){
				return $this->redirect(['vistamovimiento/index']);
			}
		
		//var_dump($modelTipodocumentoPasos);die;
	}
	
	public function actionRecibido($id){
		
		//$model = VISTAMOVIMIENTO::findOne(['ID_MOVIMIENTO'=>$id]);
		//var_dump($model);
		//if($model){
			
			$modelNewMovimiento = new MOVIMIENTO;
			
			$modelMovimiento = MOVIMIENTO::findOne($id);
			if($modelMovimiento){
				if($modelMovimiento->ID_ESTATUS == 6){
					//var_dump($modelMovimiento->NRO_PASO);die;
					$modelTipodocumentoPasosProximo = TIPODOCUMENTOPASOS::findOne(['ID_TIPO_DOCUMENTO'=>$modelMovimiento->ID_TIPO_DOCUMENTO,'NRO_PASO'=>($modelMovimiento->NRO_PASO+1),'ID_ESTATUS'=>4]);
					//$modelNewMovimiento = new MOVIMIENTO;
					
					$modelNewMovimiento->ID_MOVIMIENTO = $modelMovimiento->getNextVal();
					$modelNewMovimiento->ID_DOCUMENTO = $modelMovimiento->ID_DOCUMENTO;
					$modelNewMovimiento->ID_ESTATUS = $modelTipodocumentoPasosProximo->ID_ESTATUS;
					$modelNewMovimiento->ID_DEPARTAMENTO = $modelTipodocumentoPasosProximo->ID_DEPARTAMENTO;
					$modelNewMovimiento->ID_USUARIO = 1; //modificar
					$modelNewMovimiento->ID_SOLICITANTE = $modelMovimiento->ID_SOLICITANTE;
					$modelNewMovimiento->ID_TIPO_MOVIMIENTO = $modelTipodocumentoPasosProximo->ID_TIPO_MOVIMIENTO;
					$modelNewMovimiento->ID_TIPO_DOCUMENTO = $modelTipodocumentoPasosProximo->ID_TIPO_DOCUMENTO;
					$modelNewMovimiento->ID_PASO = $modelTipodocumentoPasosProximo->ID_PASO;
					$modelNewMovimiento->NRO_PASO = $modelTipodocumentoPasosProximo->NRO_PASO;
					$modelNewMovimiento->DESCRIPCION_PASO = $modelTipodocumentoPasosProximo->DESCRIPCION_PASO;
					$modelNewMovimiento->OBSERVACIONES = 'Documento Recibido';
					$modelNewMovimiento->FECHA_CREACION = new Expression('SYSDATE');
					//echo $modelNewMovimiento->ID_MOVIMIENTO."-";
					//if($modelNewMovimiento->load(Yii::$app->request->get()) && $modelNewMovimiento->save(false)){
					if($modelNewMovimiento->save(false)){
						Yii::$app->response->format = Response::FORMAT_JSON;
						$data = Html::a('<i class="glyphicon glyphicon-hand-right"></i>  Click aquí',Url::to(['vistamovimiento/view','id'=>$modelNewMovimiento->ID_MOVIMIENTO]),['class' => 'btn btn-sm btn-info']).' para ver el documento';
						return $data;
						//$model = VISTAMOVIMIENTO::findOne(['ID_MOVIMIENTO'=>$modelNewMovimiento->ID_MOVIMIENTO]);
						//die('paso1');
						/*return $this->render('view', [
							'model' => $model,
						]);*/
					}
				}
			}
			
			//die('paso2');
			/*return $this->render('recibido', [
						'model' => $model,
			]);*/
			
		//}
		
		
		
		
		//var_dump($modelTipodocumentoPasos);die;
	}
}
