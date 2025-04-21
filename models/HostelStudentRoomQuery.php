<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[HostelStudentRoom]].
 *
 * @see HostelStudentRoom
 */
class HostelStudentRoomQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return HostelStudentRoom[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return HostelStudentRoom|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
