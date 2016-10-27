<?php

namespace backend\controllers;

use Yii;
use common\models\Company;
use common\models\Branches;
use common\models\CompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\data\Pagination;
use frontend\models\Model;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends Controller
{
   // public $layout='initial';
    
        /**
     * @inheritdoc
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['view', 'index','create','update','delete','viewcompany','back_to_index'],
                'rules' => [
                    [
                        'actions' => ['view','index','create','update','delete','viewcompany','back_to_index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Company models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination=['pageSize'=>5];
        if(Yii::$app->request->isAjax)
        {
            return $this->renderAjax('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        }
        else
        {
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    

    public function actionList()
    {
        
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination=['pageSize'=>5];
        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Company model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        //echo Url::to(['company/view'],true);
        if(Yii::$app->request->isAjax)
        {

            return $this->renderAjax('view', [
                'model' => $this->findModel($id),
            ]);
        }
        else
        {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    //view after creation without ajax render
    public function actionViewcompany($id)
    {
        //echo Url::to(['company/view'],true);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Company();
        $modelsBranch = [new Branches];
        date_default_timezone_set('Asia/Kolkata');
        $current_date = date("Y-m-d h:i:sa");
        $model->c_createDate = $current_date;
	
		if ($model->load(Yii::$app->request->post()) && $model->validate()) 
           {
                $modelsBranch = Model::createMultiple(Branches::classname());
                Model::loadMultiple($modelsBranch, Yii::$app->request->post());
                // ajax validation
                if (Yii::$app->request->isAjax) 
                {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return ArrayHelper::merge(
                        ActiveForm::validateMultiple($modelsBranch),
                        ActiveForm::validate($model)
                    );
                }

            // validate all models
            // $valid = $model->validate();
            // $valid = Model::validateMultiple($modelsBranch) && $valid;
            // echo $valid;die();

                $transaction = \Yii::$app->db->beginTransaction();
                 // echo 'here';die();
                
                try 
                {
                    $imageName= $model->company_name;
                    $model->file = UploadedFile::getInstance($model,'file');
                    if($model->file!='')
                    {
                        if($model->file->extension=='gif'||$model->file->extension=='jpg'||$model->file->extension=='png')
                        {
                            $model->file->saveAs('../../frontend/web/uploads/'.$imageName.'.'.$model->file->extension);
                            // save the path in DB.
                            $model->company_logo = 'uploads/'.$imageName.'.'.$model->file->extension;
                            //return $this->redirect(['view', 'id' => $model->company_id]);
                        }
                        else
                        {
                            return $this->render('create', [
                            'model' => $model,'msg'=>'Please upload image file only',
                            ]);
                        }

                    }
                    else
                    {
                        $model->company_profile = 'uploads/UserImage.png';                        
                    }

                    if ($flag = $model->save(false)) 
                    {
                        foreach ($modelsBranch as $modelBranch) 
                        {
                            $modelBranch->company_id = $model->company_id;
                            if (! ($flag = $modelBranch->save(false))) 
                            {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }

                    if ($flag) 
                    {
                        $transaction->commit();
                        return $this->redirect(['viewcompany', 'id' => $model->company_id]);
                    }
                } //try
                catch (Exception $e) 
                {
                    $transaction->rollBack();
                }
                
            }  
            else 
            {
                return $this->render('create', [
                    'model' => $model,'modelsBranch' =>$modelsBranch,
                ]);
            }
        

    }

    

    /**
     * Updates an existing Company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $current_date = $model->company_created;//use to find company

        if ($model->load(Yii::$app->request->post())) 
            {
                if(!$model->validate())//Validation
                {
                    foreach ($model->errors as $key) 
                    {
                        $key=implode(',',$key);
                        $msg=$key;
                    }
                    return $msg;  //return error message to ajax                  
                }

                $imageName= $model->company_name;
                $model->file = UploadedFile::getInstance($model,'file');
                if($model->file!='')
                {
                     if(($model->file->extension=='gif'||$model->file->extension=='jpg'||$model->file->extension=='png'))
                        {
                            $model->file->saveAs('../../frontend/web/uploads/'.$imageName.'.'.$model->file->extension);

                            // save the path in DB.

                            $model->company_profile = 'uploads/'.$imageName.'.'.$model->file->extension;                        
                            Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
    	                    $model->save();
    	                    $id = Company::find()->where(['company_created'=>$current_date])->one();
    	                    return ['status'=>true,'id'=>$id->company_id];
                        }
                        else // if extension is not valid
                        {
                            if(Yii::$app->request->isAjax)
                            {
                                return $this->renderAjax('update', ['model' => $model,'msg'=>'Please upload image file only',]);
                            }
                            else
                            {
                                return $this->render('update', ['model' => $model,'msg'=>'Please upload image file only',]);
                            }
                            
                        } 
                }
                else //if new image is not uploaded
                {
                    Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
                    $model->save();
                    $id = Company::find()->where(['company_created'=>$current_date])->one();
                    return ['status'=>true,'id'=>$id->company_id];
                }
            }
            else //if update model is not submitted
            {
                if(Yii::$app->request->isAjax)
                {
                    return $this->renderAjax('update', [
                    'model' => $model,
                    ]);
                }
                else
                {
                    return $this->render('update', [
                    'model' => $model,
                    ]);
                }                
            }         
    }

    /**
     * Deletes an existing Company model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(Yii::$app->request->isAjax)
        {
          
            Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
            return ['status'=>$this->findModel($id)->delete()];
        }
        else{
            return $this->findModel($id)->delete();
        }
        
    }

    /**
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Company::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
