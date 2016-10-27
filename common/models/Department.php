<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $dept_id
 * @property integer $branch_id
 * @property string $dept_name
 * @property integer $company_id
 * @property string $dept_created_date
 * @property string $dept_status
 *
 * @property Branches $branch
 * @property Company $company
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['branch_id','company_id', 'dept_name', 'dept_created_date', 'dept_status'], 'required'],
            [['branch_id', 'company_id'], 'integer'],
            [['dept_created_date'], 'safe'],
            [['dept_status'], 'string'],
            [['dept_name'], 'string', 'max' => 100],
            [['branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branches::className(), 'targetAttribute' => ['branch_id' => 'br_id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dept_id' => 'Dept ID',
            'branch_id' => 'Branch Name',// changes branch id to branch name to show the branch name instead of branch id
            'dept_name' => 'Dept Name',
            'company_id' => 'Company Name',// changes conpany id to company name to show the company name instead of company id
            'dept_created_date' => 'Dept Created Date',
            'dept_status' => 'Dept Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranch()
    {
        return $this->hasOne(Branches::className(), ['br_id' => 'branch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['company_id' => 'company_id']);
    }
}
