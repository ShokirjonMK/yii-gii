<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[StudentGpaOld]].
 *
 * @see StudentGpaOld
 */
class StudentGpaOldQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return StudentGpaOld[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return StudentGpaOld|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
