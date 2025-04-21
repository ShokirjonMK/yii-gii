<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Poll]].
 *
 * @see Poll
 */
class PollQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Poll[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Poll|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
