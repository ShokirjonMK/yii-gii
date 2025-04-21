<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[KuvondikMasofaviy]].
 *
 * @see KuvondikMasofaviy
 */
class KuvondikMasofaviyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return KuvondikMasofaviy[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return KuvondikMasofaviy|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
