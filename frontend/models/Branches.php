<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "branches".
 *
 * @property integer $br_id
 * @property integer $company_id
 * @property string $br_name
 * @property string $br_address
 * @property string $br_created_date
 * @property string $br_status
 *
 * @property Company $company
 * @property Department[] $departments
 */
class Branches extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'branches';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id','br_name', 'br_created_date', 'br_status', 'br_address'], 'required'],
            [['company_id'], 'integer'],
            [['br_created_date'], 'safe'],
            [['br_status'], 'string'],
            [['br_name'], 'string', 'max' => 100],
            [['br_address'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'br_id' => 'Br ID',
            'company_id' => 'Company Name', // changes conpany id to company name to show the company name instead of company id
            'br_name' => 'Br Name',
            'br_address' => 'Br Address',
            'br_created_date' => 'Br Created Date',
            'br_status' => 'Br Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['company_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['branch_id' => 'br_id']);
    }
}
