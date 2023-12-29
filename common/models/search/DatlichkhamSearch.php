<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Datlichkham;

/**
 * DatlichkhamSearch represents the model behind the search form about `\common\models\Datlichkham`.
 */
class DatlichkhamSearch extends Datlichkham
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'tieude'], 'integer'],
            [['dienthoai', 'donvi', 'email', 'hoten', 'ngaykham', 'noidung', 'time'], 'safe'],
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
        $query = Datlichkham::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'ngaykham' => $this->ngaykham,
            'status' => $this->status,
            'tieude' => $this->tieude,
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'dienthoai', $this->dienthoai])
            ->andFilterWhere(['like', 'donvi', $this->donvi])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'hoten', $this->hoten])
            ->andFilterWhere(['like', 'noidung', $this->noidung]);

        return $dataProvider;
    }
}
