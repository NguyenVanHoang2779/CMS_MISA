<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Staffmisa;

/**
 * StaffmisaSearch represents the model behind the search form of `common\models\Staffmisa`.
 */
class StaffmisaSearch extends Staffmisa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'keychucdanh', 'gioitinh', 'socmnd', 'sodienthoai', 'sodienthoaicodinh', 'taikhoannganhang', 'congnothu', 'congnotra'], 'integer'],
            [['manhanvien', 'tennhanvien', 'donvi', 'chucdanh', 'noicap', 'diachi', 'email', 'tennganhang', 'chinhanh', 'ngaysinh', 'ngaycap', 'diachinganhang', 'nhomkhachang'], 'safe'],
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
        $query = Staffmisa::find();

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
            'keychucdanh' => $this->keychucdanh,
            'gioitinh' => $this->gioitinh,
            'socmnd' => $this->socmnd,
            'sodienthoai' => $this->sodienthoai,
            'sodienthoaicodinh' => $this->sodienthoaicodinh,
            'taikhoannganhang' => $this->taikhoannganhang,
            'ngaysinh' => $this->ngaysinh,
            'ngaycap' => $this->ngaycap,
            'congnothu' => $this->congnothu,
            'congnotra' => $this->congnotra,
        ]);

        $query->andFilterWhere(['like', 'manhanvien', $this->manhanvien])
            ->andFilterWhere(['like', 'tennhanvien', $this->tennhanvien])
            ->andFilterWhere(['like', 'donvi', $this->donvi])
            ->andFilterWhere(['like', 'chucdanh', $this->chucdanh])
            ->andFilterWhere(['like', 'noicap', $this->noicap])
            ->andFilterWhere(['like', 'diachi', $this->diachi])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'tennganhang', $this->tennganhang])
            ->andFilterWhere(['like', 'chinhanh', $this->chinhanh])
            ->andFilterWhere(['like', 'diachinganhang', $this->diachinganhang])
            ->andFilterWhere(['like', 'nhomkhachang', $this->nhomkhachang]);

        return $dataProvider;
    }
}
