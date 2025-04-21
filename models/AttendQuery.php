<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Attend]].
 *
 * @see Attend
 */
class AttendQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Attend[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Attend|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
