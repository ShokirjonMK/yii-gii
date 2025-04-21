<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[StudentOrder]].
 *
 * @see StudentOrder
 */
class StudentOrQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return StudentOrder[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return StudentOrder|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
