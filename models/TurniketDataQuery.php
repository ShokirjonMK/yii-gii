<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TurniketData]].
 *
 * @see TurniketData
 */
class TurniketDataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TurniketData[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TurniketData|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
