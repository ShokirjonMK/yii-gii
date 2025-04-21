<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TeacherWorkPlan]].
 *
 * @see TeacherWorkPlan
 */
class TeacherWorkPlanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TeacherWorkPlan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TeacherWorkPlan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
