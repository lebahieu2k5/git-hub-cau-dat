<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Datcauhoi;

/**
 * DatcauhoiSearch represents the model behind the search form about `\common\models\Datcauhoi`.
 */
class DatcauhoiSearch extends Datcauhoi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['tieude', 'tennguoibenh', 'noidung', 'email', 'filedinhkem', 'noidungtraloi', 'dateTime', 'tenbacsi'], 'safe'],
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
        $query = Datcauhoi::find();

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
            'dateTime' => $this->dateTime,
        ]);

        $query->andFilterWhere(['like', 'tieude', $this->tieude])
            ->andFilterWhere(['like', 'tennguoibenh', $this->tennguoibenh])
            ->andFilterWhere(['like', 'noidung', $this->noidung])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'filedinhkem', $this->filedinhkem])
            ->andFilterWhere(['like', 'noidungtraloi', $this->noidungtraloi])
            ->andFilterWhere(['like', 'tenbacsi', $this->tenbacsi]);

        return $dataProvider;
    }
}
