<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Turniket]].
 *
 * @see Turniket
 */
class TurniketQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Turniket[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Turniket|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
