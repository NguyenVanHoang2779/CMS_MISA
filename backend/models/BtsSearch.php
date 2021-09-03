<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bts;
use yii;

/**
 * BtsSearch represents the model behind the search form of `backend\models\Bts`.
 */
class BtsSearch extends Bts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'so_luong_rru', 'do_cao_cot', 'branch_id', 'so_luong_angten', 'so_mong_co', 'trang_thai', 'created_at', 'updated_at', 'created_by'], 'integer'],
            [['bts_code', 'bts_type', 'bang_tang', 'loai_code', 'dia_chi', 'longtitude', 'latitude', 'loai_nha', 'coc_tiep_dia'], 'safe'],
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

        $query = Bts::find();

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
            'so_luong_rru' => $this->so_luong_rru,
            'do_cao_cot' => $this->do_cao_cot,
            'branch_id' => $this->branch_id,
            'so_luong_angten' => $this->so_luong_angten,
            'so_mong_co' => $this->so_mong_co,
            'trang_thai' => $this->trang_thai,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
//            'bts_type' =>$this->bts_type,
        ]);



        $query->andFilterWhere(['like', 'bts_code', $this->bts_code])
            ->andFilterWhere(['like', 'bts_type', $this->bts_type])
            ->andFilterWhere(['like', 'bang_tang', $this->bang_tang])
            ->andFilterWhere(['like', 'loai_code', $this->loai_code])
            ->andFilterWhere(['like', 'dia_chi', $this->dia_chi])
            ->andFilterWhere(['like', 'longtitude', $this->longtitude])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'loai_nha', $this->loai_nha])
            ->andFilterWhere(['like', 'coc_tiep_dia', $this->coc_tiep_dia]);

        return $dataProvider;
    }
}
