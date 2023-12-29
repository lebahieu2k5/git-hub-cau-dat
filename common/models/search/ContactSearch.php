<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Contact;

/**
 * ContactSearch represents the model behind the search form about `\common\models\Contact`.
 */
class ContactSearch extends Contact
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['about_content', 'about_image', 'about_title', 'about_url', 'address1', 'company_name', 'copyright', 'email', 'email_bcc', 'fax', 'footer', 'gift', 'hotline', 'logo', 'logo_footer', 'payment', 'phone', 'site_desc', 'site_keyword', 'site_title', 'slogan'], 'safe'],
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
        $query = Contact::find();

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
        ]);

        $query->andFilterWhere(['like', 'about_content', $this->about_content])
            ->andFilterWhere(['like', 'about_image', $this->about_image])
            ->andFilterWhere(['like', 'about_title', $this->about_title])
            ->andFilterWhere(['like', 'about_url', $this->about_url])
            ->andFilterWhere(['like', 'address1', $this->address1])
            ->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'copyright', $this->copyright])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'email_bcc', $this->email_bcc])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'footer', $this->footer])
            ->andFilterWhere(['like', 'gift', $this->gift])
            ->andFilterWhere(['like', 'hotline', $this->hotline])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'logo_footer', $this->logo_footer])
            ->andFilterWhere(['like', 'payment', $this->payment])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'site_desc', $this->site_desc])
            ->andFilterWhere(['like', 'site_keyword', $this->site_keyword])
            ->andFilterWhere(['like', 'site_title', $this->site_title])
            ->andFilterWhere(['like', 'slogan', $this->slogan]);

        return $dataProvider;
    }
}
