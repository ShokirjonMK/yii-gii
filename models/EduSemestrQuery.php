<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[EduSemestr]].
 *
 * @see EduSemestr
 */
class EduSemestrQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return EduSemestr[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return EduSemestr|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
