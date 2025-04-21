<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ExamControlStudent]].
 *
 * @see ExamControlStudent
 */
class ExamControlStudentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ExamControlStudent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ExamControlStudent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
