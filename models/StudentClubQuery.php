<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[StudentClub]].
 *
 * @see StudentClub
 */
class StudentClubQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return StudentClub[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return StudentClub|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
