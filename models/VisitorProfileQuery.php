<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[VisitorProfile]].
 *
 * @see VisitorProfile
 */
class VisitorProfileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return VisitorProfile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return VisitorProfile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
