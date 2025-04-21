<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TourniquetAbsent]].
 *
 * @see TourniquetAbsent
 */
class TourniquetAbsentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TourniquetAbsent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TourniquetAbsent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
