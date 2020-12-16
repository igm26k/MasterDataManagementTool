<?php

namespace app\models\process;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProcessSearch represents the model behind the search form of `app\models\process\Process`.
 */
class ProcessSearch extends Process
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['_id', 'processId', 'name', 'trigger', 'condition', 'process'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Process::find();

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

        // grid filtering conditions
        $query->andFilterWhere(['like', '_id', $this->_id])
            ->andFilterWhere(['like', 'processId', $this->processId])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'trigger', $this->trigger])
            ->andFilterWhere(['like', 'condition', $this->condition])
            ->andFilterWhere(['like', 'process', $this->process]);

        return $dataProvider;
    }
}
