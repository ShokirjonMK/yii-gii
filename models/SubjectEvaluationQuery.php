<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SubjectEvaluation]].
 *
 * @see SubjectEvaluation
 */
class SubjectEvaluationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SubjectEvaluation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SubjectEvaluation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
