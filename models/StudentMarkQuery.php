<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[StudentMark]].
 *
 * @see StudentMark
 */
class StudentMarkQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return StudentMark[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return StudentMark|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
