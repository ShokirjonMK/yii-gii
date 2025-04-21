<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PollQuestion]].
 *
 * @see PollQuestion
 */
class PollQuestionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return PollQuestion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PollQuestion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
