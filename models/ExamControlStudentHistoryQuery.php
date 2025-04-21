<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ExamControlStudentHistory]].
 *
 * @see ExamControlStudentHistory
 */
class ExamControlStudentHistoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ExamControlStudentHistory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ExamControlStudentHistory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
