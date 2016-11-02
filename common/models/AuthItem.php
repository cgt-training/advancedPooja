<?php

namespace common\models;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "auth_item".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property string $data
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AuthAssignment[] $authAssignments
 * @property AuthRule $ruleName
 * @property AuthItemChild[] $authItemChildren
 * @property AuthItemChild[] $authItemChildren0
 * @property AuthItem[] $children
 * @property AuthItem[] $parents
 */
class AuthItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name'], 'string', 'max' => 64],
            // [['rule_name'], 'exist', 'skipOnError' => true, 'targetClass' => AuthRule::className(), 'targetAttribute' => ['rule_name' => 'name']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'type' => 'Type',
            'description' => 'Description',
            'rule_name' => 'Rule Name',
            'data' => 'Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function createrole($authitem){
        $model = Yii::$app->db->createCommand()->insert('auth_item', [
                'name' => $authitem['name'],
                'description' => $authitem['description'],
                'type' => '1',
              ]);
        return $model;
    }

    public function createpermission($authitem){
        $model = Yii::$app->db->createCommand()->insert('auth_item', [
                'name' => $authitem['name'],
                'description' => $authitem['description'],
                'type' => '2',
              ]);
        return $model;
    }

    public function assignpermission($authitem,$authitemchild){
        for($i=0; $i<count($authitemchild); $i++){
            $model1 = Yii::$app->db->createCommand()->insert('auth_item_child', [
                'parent' => $authitem['name'],
                'child' => $authitemchild[$i]['child'],
              ])->execute();
        }
    }

     
}
