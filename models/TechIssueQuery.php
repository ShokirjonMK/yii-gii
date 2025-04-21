<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TechIssue]].
 *
 * @see TechIssue
 */
class TechIssueQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TechIssue[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TechIssue|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
