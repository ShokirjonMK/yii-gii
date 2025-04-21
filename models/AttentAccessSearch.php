<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AttentAccess;

/**
 * AttentAccessSearch represents the model behind the search form of `app\models\AttentAccess`.
 */
class AttentAccessSearch extends AttentAccess
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'time_table_id', 'subject_id', 'user_id', 'edu_year_id', 'subject_category_id', 'time_option_id', 'faculty_id', 'edu_plan_id', 'edu_semestr_id', 'type', 'status', 'order', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
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
        $query = AttentAccess::find();

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
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'time_table_id' => $this->time_table_id,
            'subject_id' => $this->subject_id,
            'user_id' => $this->user_id,
            'edu_year_id' => $this->edu_year_id,
            'subject_category_id' => $this->subject_category_id,
            'time_option_id' => $this->time_option_id,
            'faculty_id' => $this->faculty_id,
            'edu_plan_id' => $this->edu_plan_id,
            'edu_semestr_id' => $this->edu_semestr_id,
            'type' => $this->type,
            'status' => $this->status,
            'order' => $this->order,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'is_deleted' => $this->is_deleted,
        ]);

        return $dataProvider;
    }
}
