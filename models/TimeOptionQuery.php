<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TimeOption]].
 *
 * @see TimeOption
 */
class TimeOptionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TimeOption[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TimeOption|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
