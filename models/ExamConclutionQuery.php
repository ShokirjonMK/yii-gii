<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ExamConclution]].
 *
 * @see ExamConclution
 */
class ExamConclutionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ExamConclution[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ExamConclution|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
