<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserDublicate]].
 *
 * @see UserDublicate
 */
class UserDublicateQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserDublicate[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserDublicate|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
