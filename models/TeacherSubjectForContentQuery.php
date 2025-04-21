<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TeacherSubjectForContent]].
 *
 * @see TeacherSubjectForContent
 */
class TeacherSubjectForContentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TeacherSubjectForContent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TeacherSubjectForContent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
