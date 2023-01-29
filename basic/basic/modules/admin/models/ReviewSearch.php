<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Review;

/**
 * ReviewSearch represents the model behind the search form of `app\modules\admin\models\Review`.
 */
class ReviewSearch extends Review
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_image', 'id_user', 'id_product'], 'integer'],
            [['advantage', 'disadvantage', 'description', 'created_at', 'updated_at', 'created_by'], 'safe'],
            [['rating'], 'number'],
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
        $query = Review::find();

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
        $query->andFilterWhere([
            'id' => $this->id,
            'rating' => $this->rating,
            'id_image' => $this->id_image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id_user' => $this->id_user,
            'id_product' => $this->id_product,
        ]);

        $query->andFilterWhere(['like', 'advantage', $this->advantage])
            ->andFilterWhere(['like', 'disadvantage', $this->disadvantage])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
