<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ContractInfo]].
 *
 * @see ContractInfo
 */
class ContractInfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ContractInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ContractInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
