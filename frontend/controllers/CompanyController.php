<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\data\Pagination;
use common\models\Company;
use common\models\CompanySearch;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends Controller
{
    /**
     * @inheritdoc
     */

// Implementing Access Control filter to update,create and delete-- only authorized user can create, update and delete the company

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Company models.
     * @return mixed
     */

// This function will redirect to tha index view

    public function actionIndex()
    {
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(Yii::$app->request->isAjax){ 
            return $this->renderAjax('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single Company model.
     * @param integer $id
     * @return mixed
     */
// this will view the details of selected id -- findmodel($id) function created at the bottom of this page which calls the model and access the db

    public function actionView($id)
    {
        if(Yii::$app->request->isAjax){
            return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
        } else {
            return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
        }
    }

    /**
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Company(); 

        if (Yii::$app->user->can('createCompany')) {
            if ($model->load(Yii::$app->request->post())) {
                //instance of the uploaded file.
                // Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
                $imageName= $model->company_name;

                $model->file = UploadedFile::getInstance($model,'file');

                // save the path in DB.
                $model->company_logo = 'uploads/'.$imageName.'.'.$model->file->extension;

                if($model->save())
                {
                    $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);
                    
                    // return ['status'=>true];
                    echo "1";
                }
                else
                {
                    echo '0';
                }

                
                // return $this->redirect(['view', 'id' => $model->company_id]);

            } else {
                return $this->renderAjax('create', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->redirect(['index']);
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

        if (Yii::$app->user->can('updateCompany')) {
            if ($model->load(Yii::$app->request->post())) {
                $imageName= $model->company_name;

                $model->file = UploadedFile::getInstance($model,'file');

                // save the path in DB.
                $model->company_logo = 'uploads/'.$imageName.'.'.$model->file->extension;

                if($model->save())
                {
                    $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);
                    return $this->redirect(['view', 'id' => $model->company_id]);
                }
            } else {
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
        } else {
            return $this->redirect(['index']);
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
        if (Yii::$app->user->can('deleteCompany')) {
            if(Yii::$app->request->isAjax)
            {
          
                Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
                return ['status'=>$this->findModel($id)->delete()];

                // $this->findModel($id)->delete();
                // return $this->redirect(['index']);
            }
        }
        else{
            return $this->redirect(['index']);
        }
    }

    /**
     * Displays a single Company model.
     * @param integer $id
     * @return mixed
     */
// this will view the list of company's with their logo

    public function actionCompanyView()
    {
        $query = Company::find();
        // $count = count($query);
        // create a pagination object with the total count
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        // limit the query using the pagination and retrieve the result from db
        $companyList = $query->orderBy('company_name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('company-view', [
                'companyList' => $companyList,
                'pagination' => $pagination,
        ]);
    }

    // public function actionShow()
    // {
    //     $name = $_POST['name'];
    //     echo $name;
    // }

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
