<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BasisForPublication]].
 *
 * @see BasisForPublication
 */
class BasisForPublicationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return BasisForPublication[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return BasisForPublication|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
