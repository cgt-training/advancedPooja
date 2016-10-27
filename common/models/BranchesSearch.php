<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Branches;

/**
 * BranchesSearch represents the model behind the search form about `frontend\models\Branches`.
 */
class BranchesSearch extends Branches
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['br_id'], 'integer'],
            [['br_name', 'company_id', 'br_address', 'br_created_date', 'br_status'], 'safe'],
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
        $query = Branches::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'br_id' => $this->br_id,
            // 'company_id' => $this->company_id,
            'br_created_date' => $this->br_created_date,
        ]);

        $query->andFilterWhere(['like', 'company.company_name', $this->company_id])
            ->andFilterWhere(['like', 'br_name', $this->br_name])
            ->andFilterWhere(['like', 'br_address', $this->br_address])
            ->andFilterWhere(['like', 'br_status', $this->br_status]);

        return $dataProvider;
    }
}
