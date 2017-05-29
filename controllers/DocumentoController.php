<?php

namespace app\controllers;

use Yii;
use app\models\DOCUMENTO;
use app\models\DOCUMENTOSearch;
use app\models\SOLICITANTE;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\db\Expression;
use yii\widgets\ActiveForm;
use yii\helpers\Json;
use yii\helpers\Html;
use kartik\widgets\Growl;
use app\models\MOVIMIENTO;
use app\models\TIPODOCUMENTOPASOS;
use app\models\VISTAMOVIMIENTO;

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
        $modelSolicitante = new SOLICITANTE();


        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_DOCUMENTO]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
        
         /*if($modelSolicitante->load(Yii::$app->request->post())){
			 
			 
			 
			
				die('Llegando');
		 }*/
		 
		 
		 if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
				Yii::$app->response->format = Response::FORMAT_JSON;
				return ActiveForm::validate($model);
			}


         if ($model->load(Yii::$app->request->post()) && $modelSolicitante->load(Yii::$app->request->post())) {
			 
			 $modelSolicitante->validate();
			 //Se verifica que la persona exista en la tabla solicitante
			 $consultaSolicitante = SOLICITANTE::find()->where(['CEDULA'=>$model->cedulaSolicitante, 'NACIONALIDAD'=>$model->nacionalidadSolicitante])->one();
			 if(!$consultaSolicitante){
				 $numero_tlf = explode("-",$modelSolicitante->NRO_TELEFONO);
				 $numero_tlf = $numero_tlf[0].$numero_tlf[1];
				//echo $lastInsertID = $db->getLastInsertID();
				//$modelSolicitante = new SOLICITANTE();
				//echo $modelSolicitante->ID_SOLICITANTE;
				//die($modelSolicitante->NRO_TELEFONO);
				$modelSolicitante->ID_SOLICITANTE = $modelSolicitante->getNextVal();
				$modelSolicitante->NACIONALIDAD = $model->nacionalidadSolicitante;
				$modelSolicitante->CEDULA = $model->cedulaSolicitante;
				$modelSolicitante->NRO_TELEFONO = $numero_tlf;
				//var_dump($modelSolicitante->getNextVal());//die;
				$modelSolicitante->save(false);
			}else{$modelSolicitante = $consultaSolicitante;}
				//return $this->redirect(['solicitante/view', 'id' => $modelSolicitante->ID_SOLICITANTE]);
					/*if($modelSolicitante->validate()){
							echo "Validado";
					}
					echo "No existe";*/

			//var_dump($consultaSolicitante);die();
			//$model->ID_DOCUMENTO = $model->getNextVal();
			$model->ID_DOCUMENTO = $model->ID_DOCUMENTO;
			$model->ID_SOLICITANTE = ($modelSolicitante->ID_SOLICITANTE)?$modelSolicitante->ID_SOLICITANTE:$consultaSolicitante->ID_SOLICITANTE;
			$model->FECHA_CREACION = new Expression('SYSDATE');
			$model->ID_ESTATUS = 1;
			$model->ID_USUARIO = 1;
			$model->validate();
			//var_dump($model->NUM_DOCUMENTO);
			//die('paso');
			//var_dump($model);
			$model->save(false);
			
			
			/////////////////////////////////////////////////////////
			//MOVIMIENTO
			////////////////////////////////////////////////////////
			$modelTipoDocumentoPasos = TIPODOCUMENTOPASOS::find()->where(['NRO_PASO'=>1])->one();
			
			$modelMovimiento = new MOVIMIENTO;
			$modelMovimiento->ID_MOVIMIENTO = $modelMovimiento->getNextVal();
			$modelMovimiento->ID_DOCUMENTO = $model->ID_DOCUMENTO;
			$modelMovimiento->ID_ESTATUS = $modelTipoDocumentoPasos->ID_ESTATUS;
			$modelMovimiento->ID_DEPARTAMENTO = $modelTipoDocumentoPasos->ID_DEPARTAMENTO;
			$modelMovimiento->ID_USUARIO = 1; //modificar
			$modelMovimiento->ID_SOLICITANTE = $modelSolicitante->ID_SOLICITANTE;
			$modelMovimiento->ID_TIPO_MOVIMIENTO = $modelTipoDocumentoPasos->ID_TIPO_MOVIMIENTO;
			$modelMovimiento->ID_TIPO_DOCUMENTO = $modelTipoDocumentoPasos->ID_TIPO_DOCUMENTO;
			$modelMovimiento->ID_PASO = $modelTipoDocumentoPasos->ID_PASO;
			$modelMovimiento->NRO_PASO = $modelTipoDocumentoPasos->NRO_PASO;
			$modelMovimiento->DESCRIPCION_PASO = $modelTipoDocumentoPasos->DESCRIPCION_PASO;
			$modelMovimiento->OBSERVACIONES = $model->OBSERVACIONES;
			$modelMovimiento->FECHA_CREACION = new Expression('SYSDATE');
			//$modelMovimiento->FECHA_MODIFICACION = new Expression('SYSDATE');
			
			//var_dump($modelMovimiento);
			//die('Llegando');
			/////////////////////////////////////////////////////////
			//MOVIMIENTO
			////////////////////////////////////////////////////////
			
			//if($model->save(false)){
			if($modelMovimiento->save(false)){
				Yii::$app->getSession()->setFlash('success', [
					'type' => Growl::TYPE_SUCCESS,
					'icon' => 'fa fa-users',
					'message' => Html::encode('Documento ha sido creado exitósamente'),
					'title' => Html::encode('Resultado'),
					'showSeparator' => true,
					
				]);
				//return $this->redirect(['vistamovimiento/view', 'id' => $modelMovimiento->ID_MOVIMIENTO]);
				return $this->redirect(['view', 'id' => $model->ID_DOCUMENTO]);
			}
            //$isValid = $model->validate();
            //$isValid = $modelSolicitante->validate() && $isValid;
            //die('bla');
            /*if ($isValid) {
                $model->save(false);
                $modelSolicitante->save(false);
                return $this->redirect(['user/view', 'id' => $id]);
            }*/
        }
        
        //$model->ID_DOCUMENTO = $model->getNextVal();
        if(empty($model->ID_DOCUMENTO)){$model->ID_DOCUMENTO = $model->getNextVal();}
        $model->NUM_DOCUMENTO = $model->ID_DOCUMENTO.date('dmY');
         
        return $this->render('create', [
                'model' => $model,
                'modelSolicitante' => $modelSolicitante,
            ]);
    }

    /**
     * Updates an existing DOCUMENTO model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param double $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        /*$model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_DOCUMENTO]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }*/
        
        $model = $this->findModel($id);
        
        $modelSolicitante = SOLICITANTE::findOne($model->ID_SOLICITANTE);
        
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
				Yii::$app->response->format = Response::FORMAT_JSON;
				return ActiveForm::validate($model);
		}
		
		if ($model->load(Yii::$app->request->post()) && $modelSolicitante->load(Yii::$app->request->post())) {
			 $modelSolicitante->validate();
			 //Se verifica que la persona exista en la tabla solicitante
			 $consultaSolicitante = SOLICITANTE::find()->where(['CEDULA'=>$model->cedulaSolicitante, 'NACIONALIDAD'=>$model->nacionalidadSolicitante])->one();
			 /*if(!$consultaSolicitante){
				 $numero_tlf = explode("-",$modelSolicitante->NRO_TELEFONO);
				 $numero_tlf = $numero_tlf[0].$numero_tlf[1];
				//echo $lastInsertID = $db->getLastInsertID();
				//$modelSolicitante = new SOLICITANTE();
				//echo $modelSolicitante->ID_SOLICITANTE;
				//die($modelSolicitante->NRO_TELEFONO);
				//$modelSolicitante->ID_SOLICITANTE = $modelSolicitante->getNextVal();
				$modelSolicitante->NACIONALIDAD = $model->nacionalidadSolicitante;
				$modelSolicitante->CEDULA = $model->cedulaSolicitante;
				$modelSolicitante->NRO_TELEFONO = $numero_tlf;
				//var_dump($modelSolicitante->getNextVal());//die;
				$modelSolicitante->save(false);
			}*/
			$modelSolicitante->NACIONALIDAD = $model->nacionalidadSolicitante;
			$modelSolicitante->CEDULA = $model->cedulaSolicitante;
			$modelSolicitante->save(false);
				//return $this->redirect(['solicitante/view', 'id' => $modelSolicitante->ID_SOLICITANTE]);
					/*if($modelSolicitante->validate()){
							echo "Validado";
					}
					echo "No existe";*/

			//var_dump($consultaSolicitante);die();
			//$model->ID_DOCUMENTO = $model->getNextVal();
			$model->ID_DOCUMENTO = $model->ID_DOCUMENTO;
			$model->ID_SOLICITANTE = ($modelSolicitante->ID_SOLICITANTE)?$modelSolicitante->ID_SOLICITANTE:$consultaSolicitante->ID_SOLICITANTE;
			$model->FECHA_CREACION = new Expression('SYSDATE');
			$model->ID_ESTATUS = 1;
			$model->ID_USUARIO = 1;
			$model->validate();
			//var_dump($model->NUM_DOCUMENTO);
			//die('paso');
			//var_dump($model);
			if($model->save(false)){
				Yii::$app->getSession()->setFlash('success', [
					'type' => Growl::TYPE_SUCCESS,
					'icon' => 'fa fa-users',
					'message' => Html::encode('Documento actualizado correctamente'),
					'title' => Html::encode('Resultado'),
					'showSeparator' => true,
					
				]);
				return $this->redirect(['view', 'id' => $model->ID_DOCUMENTO]);
			}
            //$isValid = $model->validate();
            //$isValid = $modelSolicitante->validate() && $isValid;
            //die('bla');
            /*if ($isValid) {
                $model->save(false);
                $modelSolicitante->save(false);
                return $this->redirect(['user/view', 'id' => $id]);
            }*/
        }else {
            return $this->render('update', [
                'model' => $model,
                'modelSolicitante' => $modelSolicitante,
            ]);
        }
        
        //var_dump($consultaSolicitante);
        //die();
        //$modelSolicitante = ;
        
        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_DOCUMENTO]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelSolicitante' => $modelSolicitante,
            ]);
        }*/
    }

    /**
     * Deletes an existing DOCUMENTO model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param double $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		//sleep(2);
		//echo "hola";
		//Yii::$app->response->format = Response::FORMAT_JSON;
		//die('Llegando');
		if(MOVIMIENTO::deleteAll('ID_DOCUMENTO = '.$id))
			$this->findModel($id)->delete();
//return true;
/*echo Json::encode([
				'success' => true,
				'messages' => [
					'kv-detail-info' => 'El Documento N°  fué eliminado exitósamente. ' . 
						Html::a('<i class="glyphicon glyphicon-hand-right"></i>  Click aquí', 
							['index'], ['class' => 'btn btn-sm btn-info']) . ' para continuar.'
				]
			]);*/
return;
        //return $this->redirect(['index']);
    }
    
    public function actionEliminar() 
{
	//Yii::$app->response->format = Response::FORMAT_JSON;
	//die('Llegando');
		//$model = new DOCUMENTO;
		$post = Yii::$app->request->post();
		// process ajax delete
		if (Yii::$app->request->isAjax && isset($post['kvdelete'])) {
			$model = $this->findModel($post['id']);
			if(MOVIMIENTO::deleteAll('ID_DOCUMENTO = '.$post['id']))
				$model->delete();
			echo Json::encode([
				'success' => true,
				'messages' => [
					'kv-detail-info' => 'El Documento N° '.$model->NUM_DOCUMENTO.' fué eliminado exitósamente. ' . 
						Html::a('<i class="glyphicon glyphicon-hand-right"></i>  Click aquí', 
							['vistamovimiento/index'], ['class' => 'btn btn-sm btn-info']) . ' para continuar.'
							//['index'], ['class' => 'btn btn-sm btn-info']) . ' para continuar.'
				]
			]);
			return;
		}
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
		$this->layout = false;

		$modelSolicitante = new SOLICITANTE();
		
		Yii::$app->response->format = Response::FORMAT_JSON;

        if($persona){
			
			if(!isset($persona['SEGUNDONOMBRE'])){$persona['SEGUNDONOMBRE'] = '';}
			if(!isset($persona['SEGUNDOAPELLIDO'])){$persona['SEGUNDOAPELLIDO'] = '';}
			
			$modelSolicitante->NACIONALIDAD = $persona['NAC'];
			$modelSolicitante->CEDULA = $persona['CEDULA'];
			$modelSolicitante->PRIMER_NOMBRE = $persona['PRIMERNOMBRE'];
			$modelSolicitante->SEGUNDO_NOMBRE = $persona['SEGUNDONOMBRE'];
			$modelSolicitante->PRIMER_APELLIDO = $persona['PRIMERAPELLIDO'];
			$modelSolicitante->SEGUNDO_APELLIDO = $persona['SEGUNDOAPELLIDO'];
			$resultado = $modelSolicitante;
			//$disable = true;
		}
		else{
			$resultado = 0;
		}
			//$disable = false;
				
            //return $this->renderpartial('_formSolicitante',['modelSolicitante'=>$modelSolicitante,'disable'=>$disable]);
            //return $this->render('_formSolicitante',['modelSolicitante'=>$modelSolicitante,'disable'=>$disable]);
		return $resultado;
	}
	
	public function actionListadoconsultoria()
    {
		
        $searchModel = new DOCUMENTOSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('listadoconsultoria', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionModificar($id,$movimiento)
    {
        //validacion de los parametros pasados por url
        $vistaMovimiento = VISTAMOVIMIENTO::findOne(['ID_DOCUMENTO'=>$id,'ID_MOVIMIENTO'=>$movimiento]);
        
        if(!$vistaMovimiento){
				Yii::$app->getSession()->setFlash('danger', [
					'type' => Growl::TYPE_DANGER,
					'icon' => 'fa fa-users',
					'message' => Html::encode('Solicitud Inválida'),
					'title' => Html::encode('Resultado'),
					'showSeparator' => true,
					
				]);
				return $this->redirect(['vistamovimiento/index']);
        }
        
        $model = $this->findModel($id);
        $modelSolicitante = SOLICITANTE::findOne($model->ID_SOLICITANTE);
        
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
				Yii::$app->response->format = Response::FORMAT_JSON;
				return ActiveForm::validate($model);
		}
		
		if($model->load(Yii::$app->request->post())) {
			$model->FECHA_MODIFICACION = new Expression('SYSDATE');
			$model->ID_USUARIO = 1;

			if($model->save(false)){
				$idMovimiento = Yii::$app->request->post('movimiento');
				Yii::$app->getSession()->setFlash('success', [
					'type' => Growl::TYPE_SUCCESS,
					'icon' => 'fa fa-users',
					'message' => Html::encode('Documento actualizado correctamente'),
					'title' => Html::encode('Resultado'),
					'showSeparator' => true,
					
				]);
				return $this->redirect(['movimiento/view', 'id' => $idMovimiento]);
			}
        }else {
            return $this->render('modificar', [
                'model' => $model,
                'modelSolicitante' => $modelSolicitante,
                'movimiento'=>$movimiento,
            ]);
        }
    }
}
