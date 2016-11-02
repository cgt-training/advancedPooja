<?php

namespace backend\controllers;

use Yii;
use common\models\AuthItem;
use common\models\AuthItemChild;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Model;
use yii\data\Pagination;

/**
 * UserController implements the CRUD actions for User model.
 */
class RoleController extends Controller
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
     * Lists all Company models.
     * @return mixed
     */

// This function will redirect to tha index view

    public function actionIndex()
    {
        $model = new AuthItem();
        $query = $model->find();

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        // limit the query using the pagination and retrieve the result from db
        $authitemdata = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        
        if(Yii::$app->request->isAjax){ 
            return $this->renderAjax('index', [
                'authitemdata' => $authitemdata,
                'pagination' => $pagination,
            ]);
        } else {
            return $this->render('index', [
                'authitemdata' => $authitemdata,
                'pagination' => $pagination,
            ]);
        }
    }

    /**
     * Create a new role
     */
    public function actionCreate()
    {
        $model = new AuthItem();
        $itemchild = [new AuthItemChild];
        $namelist = Yii::$app->db->createCommand("select * from auth_item where type='2'")->queryAll();

        if ($model->load(Yii::$app->request->post())) {

            $itemchild = Model::createMultiple(AuthItemChild::classname());
            $itemchild = Model::loadMultiple($itemchild, Yii::$app->request->post('AuthItemChild'));
            $authitem = Yii::$app->request->post('AuthItem');
            $authitemchild = Yii::$app->request->post('AuthItemChild');
            $role = $model->createrole($authitem);
            $transaction = Yii::$app->db->beginTransaction();
            try {
                if ($flag = $role->execute(false)) 
                {
                    $model->assignpermission($authitem,$authitemchild);
                }
                if ($flag) {
                    $transaction->commit();
                    return $this->redirect(['view', 'name' => $model->name]);
                } else {
                    $transaction->rollBack();
                }
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        } else {
            if(Yii::$app->request->isAjax){
                return $this->renderAjax('create', [
                    'model' => $model,
                    'itemchild' => $itemchild,
                    'namelist' => $namelist,
                ]);
            }
            else
            {
                return $this->render('create', [
                    'model' => $model,
                    'itemchild' => $itemchild,
                    'namelist' => $namelist,
                ]);
            }
        }
    }

    
    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($name)
    {
        if(Yii::$app->request->isAjax){
            return $this->renderAjax('view', [
                'model' => $this->findModel($name),
            ]);
        } else {
            return $this->render('view', [
            'model' => $this->findModel($name),
        ]);
        }
    }

    /**
     * Deletes an existing Company model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($name)
    {
        $this->findModel($name)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($name)
    {
        if (($model = AuthItem::findOne($name)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    // function to create permission
    public function actionPermission()
    {
        $model = new AuthItem;

        if ($model->load(Yii::$app->request->post())) {
            $authitem = Yii::$app->request->post('AuthItem');
            if ($permission = $model->createpermission($authitem)) {

                $permission->execute();
                return $this->redirect(['view', 'name' => $model->name]);
            }
        } else {
            if(Yii::$app->request->isAjax){
                return $this->renderAjax('permission', [
                    'model' => $model,
                ]);
            } else {
                return $this->render('permission', [
                    'model' => $model,
                ]);
            }
        }
    }
}
