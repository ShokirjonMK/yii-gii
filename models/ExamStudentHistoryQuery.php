<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ExamStudentHistory]].
 *
 * @see ExamStudentHistory
 */
class ExamStudentHistoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ExamStudentHistory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ExamStudentHistory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
