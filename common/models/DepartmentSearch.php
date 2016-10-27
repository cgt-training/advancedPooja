<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Department;

/**
 * DepartmentSearch represents the model behind the search form about `frontend\models\Department`.
 */
class DepartmentSearch extends Department
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dept_id'], 'integer'],
            [['dept_name', 'branch_id', 'company_id', 'dept_created_date', 'dept_status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Department::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('company');
        $query->joinWith('branch');

        // grid filtering conditions
        $query->andFilterWhere([
            'dept_id' => $this->dept_id,
            // 'branch_id' => $this->branch_id,
            // 'company_id' => $this->company_id,
            'dept_created_date' => $this->dept_created_date,
        ]);

        $query->andFilterWhere(['like', 'branches.br_name', $this->branch_id])
            ->andFilterWhere(['like', 'dept_name', $this->dept_name])
            ->andFilterWhere(['like', 'company.company_name', $this->company_id])
            ->andFilterWhere(['like', 'dept_status', $this->dept_status]);

        return $dataProvider;
    }
}
