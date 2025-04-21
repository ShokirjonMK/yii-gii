<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ExamStudentReaxam]].
 *
 * @see ExamStudentReaxam
 */
class ExamStudentReaxamQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ExamStudentReaxam[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ExamStudentReaxam|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
