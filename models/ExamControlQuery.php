<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ExamControl]].
 *
 * @see ExamControl
 */
class ExamControlQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ExamControl[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ExamControl|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
