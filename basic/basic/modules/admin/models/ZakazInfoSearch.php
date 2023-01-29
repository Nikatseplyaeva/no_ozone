<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\ZakazInfo;

/**
 * ZakazInfoSearch represents the model behind the search form of `app\modules\admin\models\ZakazInfo`.
 */
class ZakazInfoSearch extends ZakazInfo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_address', 'id_bank_card'], 'integer'],
            [['type_delivery', 'created_at'], 'safe'],
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
        $query = ZakazInfo::find();

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
            'id_address' => $this->id_address,
            'id_bank_card' => $this->id_bank_card,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'type_delivery', $this->type_delivery]);

        return $dataProvider;
    }
}
