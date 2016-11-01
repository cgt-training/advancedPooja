<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Branches;
use common\models\Company;
use common\models\BranchesSearch;

/**
 * BranchesController implements the CRUD actions for Branches model.
 */
class BranchesController extends Controller
{
    /**
     * @inheritdoc
     */

// Implementing Access Control filter to update,create and delete-- only authorized user can create, update and delete the branches

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
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
     * Lists all Branches models.
     * @return mixed
     */

// This function will redirect to tha index view

    public function actionIndex()
    {
        $searchModel = new BranchesSearch();
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
     * Displays a single Branches model.
     * @param integer $id
     * @return mixed
     */
// this will view the details of selected id -- findmodel($id) function created at the bottom of this page which calls the model and access the db
    public function actionView($id)
    {
        $company = $this->findModel($id)->company;
        if(Yii::$app->request->isAjax){
            return $this->renderAjax('view', [
                'model' => $this->findModel($id),
                'company' => $company,
            ]);
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
                'company' => $company,
            ]);
        }
    }

    /**
     * Creates a new Branches model - Create.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Branches();
        $companyList = Company::find()->all();
        if (Yii::$app->user->can('createBranch')) {
            if ($model->load(Yii::$app->request->post())) {

                if($model->save())
                {
                    echo "1";
                }
                else
                {
                    echo "0";
                }

                // $model->br_created_date = date("Y-m-d h:i:s");
                
                // return $this->redirect(['view', 'id' => $model->br_id]);
            } else {
                return $this->renderAjax('create', [
                    'model' => $model,
                    'companyList' => $companyList,
                ]);
            }
        }
        else{
            return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing Branches model - Update.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $companyList = Company::find()->all();

        if (Yii::$app->user->can('updateBranch')) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->br_id]);
            } else {
                if(Yii::$app->request->isAjax){
                    return $this->renderAjax('update', [
                        'model' => $model,
                        'companyList' => $companyList,
                    ]);
                } else {
                    return $this->render('update', [
                        'model' => $model,
                        'companyList' => $companyList,
                    ]);
                }
            }
        } else {
            return $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing Branches model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->can('deleteBranch')) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        } else {
            return $this->redirect(['index']);
        }
    }

    public function actionBack()
    {
        return $this->goBack();
    }

    /**
     * Finds the Branches model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Branches the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Branches::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
