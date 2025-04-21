<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TechIssueType]].
 *
 * @see TechIssueType
 */
class TechIssueTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TechIssueType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TechIssueType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
