<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[KpiStaff]].
 *
 * @see KpiStaff
 */
class KpiStaffQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return KpiStaff[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return KpiStaff|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
