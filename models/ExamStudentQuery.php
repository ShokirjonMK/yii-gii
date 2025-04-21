<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ExamStudent]].
 *
 * @see ExamStudent
 */
class ExamStudentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ExamStudent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ExamStudent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
