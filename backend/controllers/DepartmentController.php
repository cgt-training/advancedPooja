<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Department;
use common\models\Company;
use common\models\Branches;
use common\models\DepartmentSearch;
use yii\data\Pagination;


/**
 * DepartmentController implements the CRUD actions for Department model.
 */
class DepartmentController extends Controller
{
    /**
     * @inheritdoc
     */

// Implementing Access Control filter to update,create and delete-- only authorized user can create, update and delete the department

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
     * Lists all Department models.
     * @return mixed
     */
// This function will redirect to tha index view

    public function actionIndex()
    {
        $searchModel = new DepartmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $query = Department::find();
        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        // limit the query using the pagination and retrieve the result from db
        $deptList = $query->orderBy('dept_name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        
        for($i=0;$i<count($deptList);$i++)
        {
            $id[$i] = $deptList[$i]['dept_id'];
            $deptList[$i]['company_id'] = $this->findModel($id[$i])->company['company_name'];
            $deptList[$i]['branch_id'] = $this->findModel($id[$i])->branch['br_name'];
        }

        if(Yii::$app->request->isAjax){
            return $this->renderAjax('index', [
                // 'searchModel' => $searchModel,
                // 'dataProvider' => $dataProvider,
                'deptList' => $deptList,
                'pagination' => $pagination,
            ]);
        } else {
            return $this->render('index', [
                // 'searchModel' => $searchModel,
                // 'dataProvider' => $dataProvider,
                'deptList' => $deptList,
                'pagination' => $pagination,
            ]);
        }
    }

    /**
     * Displays a single Department model.
     * @param integer $id
     * @return mixed
     */
// this will view the details of selected id -- findmodel($id) function created at the bottom of this page which calls the model and access the db

    public function actionView($id)
    {
        $branchName = $this->findModel($id)->branch;
        $cName = $this->findModel($id)->company;
        
        if(Yii::$app->request->isAjax){
            return $this->renderAjax('view', [
                'model' => $this->findModel($id),
                'branchName' => $branchName,
                'cName' => $cName,
            ]);
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
                'branchName' => $branchName,
                'cName' => $cName,
            ]);
        }
    }

    /**
     * Creates a new Department model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Department();
        $companyList = Company::find()->all();
        $branchList = Branches::find()->all();

        // if (Yii::$app->user->can('createDepartment')) {
            if ($model->load(Yii::$app->request->post())) {

                if($model->save())
                {   
                    echo "1";
                }
                else
                {
                    echo "0";
                }
                
                // return $this->redirect(['view', 'id' => $model->dept_id]);
            } else {
                return $this->renderAjax('create', [
                    'model' => $model,
                    'companyList' => $companyList,
                    'branchList' => $branchList,
                ]);
            }
        // } else {
        //     return $this->redirect(['index']);
        // }
    }

    /**
     * Updates an existing Department model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $companyList = Company::find()->all();
        $branchList = Branches::find()->all();

        // if (Yii::$app->user->can('updateDepartment')) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->dept_id]);
            } else {
                if(Yii::$app->request->isAjax){
                    return $this->renderAjax('update', [
                        'model' => $model,
                        'companyList' => $companyList,
                        'branchList' => $branchList,
                    ]);
                } else {
                    return $this->render('update', [
                        'model' => $model,
                        'companyList' => $companyList,
                        'branchList' => $branchList,
                    ]);
                }
            }
        // } else {
        //     return $this->redirect(['index']);
        // }
    }

    /**
     * Deletes an existing Department model.
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

            // $this->findModel($id)->delete();
            // return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Department model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Department the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Department::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
