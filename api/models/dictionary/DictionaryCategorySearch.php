<?php

namespace app\models\dictionary;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * DictionaryCategorySearch represents the model behind the search form of `app\models\dictionary\DictionaryCategory`.
 */
class DictionaryCategorySearch extends DictionaryCategory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['_id', 'categoryId', 'name'], 'safe'],
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
        $query = DictionaryCategory::find();

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
            ->andFilterWhere(['like', 'categoryId', $this->categoryId])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
