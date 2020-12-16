<?php

namespace app\models\dictionary;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * DictionaryMetaSearch represents the model behind the search form of `app\models\dictionary\DictionaryMeta`.
 */
class DictionaryMetaSearch extends DictionaryMeta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['_id', 'dictionaryId', 'name', 'categoryId', 'route', 'columns', 'rules'], 'safe'],
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
        $query = DictionaryMeta::find();

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
            ->andFilterWhere(['like', 'dictionaryId', $this->dictionaryId])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'categoryId', $this->categoryId])
            ->andFilterWhere(['like', 'route', $this->route])
            ->andFilterWhere(['like', 'columns', $this->columns])
            ->andFilterWhere(['like', 'rules', $this->rules]);

        return $dataProvider;
    }
}
