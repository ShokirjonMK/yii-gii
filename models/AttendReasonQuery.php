<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[AttendReason]].
 *
 * @see AttendReason
 */
class AttendReasonQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AttendReason[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AttendReason|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
