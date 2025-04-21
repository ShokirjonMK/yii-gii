<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[AttentAccess]].
 *
 * @see AttentAccess
 */
class AttentAccessQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AttentAccess[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AttentAccess|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
