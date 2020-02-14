<?php

class CategoriaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
/*
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('admin','index','view'),
				'users'=>array('*'),
			),
*/
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('admin', 'create', 'delete', 'index', 'update', 'view'),
				'users'=>array('@'),
//				'ips'	=> array('192.168.0.1'),
//				'verbs'	=> array('POST', 'GET'),
//				'roles'	=> array('admin'),
			),
/*
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
*/
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		Yii::import('application.extensions.Helper');
		$model=new Categoria;
//		$model=new Categoria('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

/*
$transaction=$model->dbConnection->beginTransaction();
try
{
    $transaction->commit();
}
catch(Exception $e)
{
    $transaction->rollBack();
}
*/
		if(isset($_POST['Categoria']))
		{
			$model->attributes=$_POST['Categoria'];
			$model->archivo = CUploadedFile::getInstance($model, 'archivo');
/*
			if (!$model->validate()) {
				$this->render('create',array(
					'model'=>$model,
				));
				Yii::app()->end();
			}
*/
			echo CActiveForm::validate($model);
			Yii::app()->end();

			$model->slug = Helper::limpiaUrl($model->categoria);
			$model->imagen = $model->slug . '.' . $model->archivo->extensionName;
			$model->created_by = Yii::app()->user->getId();
			$model->created_at = new CDbExpression('NOW()');
			$model->updated_by = Yii::app()->user->getId();
			$model->updated_at = new CDbExpression('NOW()');

			if($model->save()) {
				$model->archivo->saveAs(Yii::getPathOfAlias('webroot').'/images/categorias/'.$model->slug . '.' . $model->archivo->extensionName);
				Yii::app()->user->setFlash('success', $model->categoria . ' guardado satisfactoriamente');
				$this->redirect(array('view','id'=>$model->id));
			} else {
				Yii::app()->user->setFlash('danger', 'El registro no pudo ser guardado');
				$this->redirect(array('index'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Categoria']))
		{
			Yii::import('application.extensions.Helper');

			$imagenAnterior = $model->imagen;

			$model->attributes=$_POST['Categoria'];

			$model->archivo = CUploadedFile::getInstance($model, 'archivo');

			if ($model->archivo) {
				// borro el archivo anterior
				unlink(Yii::getPathOfAlias('webroot') . '/images/categorias/' . $model->imagen);
				$model->slug = Helper::limpiaUrl($model->categoria);
				$model->imagen = $model->slug . '.' . $model->archivo->extensionName;
			} else {
			  // si cambia el nombre de la categoría renombro la imagen  
			  $model->imagen = Helper::limpiaUrl($model->categoria . '.png'); 
              	rename(
					Yii::getPathOfAlias('webroot') . '/images/categorias/' . $imagenAnterior,
					Yii::getPathOfAlias('webroot') . '/images/categorias/' . $model->imagen
				);
            }
			
			if($model->save()) {
				
				if($model->archivo) {
					$model->archivo->saveAs(Yii::getPathOfAlias('webroot') . '/images/categorias/' . $model->imagen);
				}

				Yii::app()->user->setFlash('success', 'Registro actualizado satisfactoriamente');
				$this->redirect(array('view','id'=>$model->id));
			} else {
				Yii::app()->user->setFlash('danger', 'El registro no pudo ser actualizado');
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		
			if ($model->delete()) {
				$archivo = Yii::getPathOfAlias('webroot') . '/images/categorias/' . $model->imagen;
				unlink($archivo);
				Yii::app()->user->setFlash(
					'success',
					'La categoría ' . $model-> categoria . ' fue borrada satisfactoriamente'
				);
			} else {
				Yii::app()->user->setFlash(
					'danger',
					'La categoría ' . $model-> categoria . ' no fue borrada'
				);
			}
		

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
/*
		if (Yii::app()->authManager->checkAccess('categoria-list', Yii::app()->user->id)) {
			die ('no tiene permisos');
		}

		if (!Yii::app()->user->checkAccess('categoria-list')) {
			die ('no tiene permisos');
		}
*/
		$dataProvider=new CActiveDataProvider('Categoria');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Categoria('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Categoria']))
			$model->attributes=$_GET['Categoria'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Categoria the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Categoria::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Categoria $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='categoria-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
