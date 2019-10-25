<?php


namespace app\models;

use app\models\views\ProductsList;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class ProductsListSearch extends ProductsList
{

    public function rules()
    {
        return [
            [['name'], 'safe'],
            [['id', 'category_id', 'price', 'hidden'], 'integer'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($attr){
        $query = ProductsList::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($attr);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'category_id', $this->category_id])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'hidden', $this->hidden])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}