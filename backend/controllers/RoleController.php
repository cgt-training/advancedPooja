<?php

namespace backend\controllers;

use Yii;
use common\models\AuthItem;
use common\models\AuthItemChild;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Model;

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
     * Create a new role
     */
    public function actionCreate()
    {
        $model = new AuthItem();
        $namelist = $model->find()->all();
        $itemchild = [new AuthItemChild];

        if ($model->load(Yii::$app->request->post())) 
        {
            $modelsBranch = Model::createMultiple(AuthItemChild::classname());
                Model::loadMultiple($itemchild, Yii::$app->request->post());
            $authitem = Yii::$app->request->post();
            print_r($auth_item);
            exit;
            if ($role = $model->createrole($authitem)) {
                if($role->execute()){
                    return $this->redirect(['view', 'name' => $model->name]);
                }
            }
        } else {
            if(Yii::$app->request->isAjax){
                return $this->renderAjax('create', [
                    'model' => $model,
                    'itemchild' => $itemchild,
                    'namelist' => $namelist,
                ]);
            } else {
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
}
