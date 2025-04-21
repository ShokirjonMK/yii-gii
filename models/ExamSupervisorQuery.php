<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ExamSupervisor]].
 *
 * @see ExamSupervisor
 */
class ExamSupervisorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ExamSupervisor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ExamSupervisor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
