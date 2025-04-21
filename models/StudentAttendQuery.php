<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[StudentAttend]].
 *
 * @see StudentAttend
 */
class StudentAttendQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return StudentAttend[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return StudentAttend|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
