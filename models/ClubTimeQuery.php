<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ClubTime]].
 *
 * @see ClubTime
 */
class ClubTimeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ClubTime[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ClubTime|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
