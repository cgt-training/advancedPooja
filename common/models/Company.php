<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\Url;


/**
 * This is the model class for table "company".
 *
 * @property integer $company_id
 * @property string $company_name
 * @property string $company_email
 * @property string $c_address
 * @property string $c_createDate
 * @property string $company_status
 *
 * @property Branches[] $branches
 * @property Department[] $departments
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    // public $url = Yii::$app->request->baseUrl('../frontend/web/uploads/');
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_name', 'company_email', 'c_createDate', 'company_status', 'c_address'], 'required'],
            [['c_createDate'], 'safe'],
            [['company_email'], 'email'],
            [['company_status'], 'string'],
            [['company_name', 'company_email', 'company_logo'], 'string', 'max' => 100],
            [['c_address'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'jpg, png', 'maxSize' => 512000, 'tooBig' => 'Limit is 500KB'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'company_name' => 'Company Name',
            'company_email' => 'Company Email',
            'c_address' => 'C Address',
            'c_createDate' => 'C Create Date',
            'file' => 'Company Logo',
            'company_status' => 'Company Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branches::className(), ['company_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['company_id' => 'company_id']);
    }
}
