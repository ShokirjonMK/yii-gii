<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SubjectCategory]].
 *
 * @see SubjectCategory
 */
class SubjectCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SubjectCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SubjectCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
