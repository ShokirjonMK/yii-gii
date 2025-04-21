<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[IntensiveApp]].
 *
 * @see IntensiveApp
 */
class IntensiveAppQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return IntensiveApp[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return IntensiveApp|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
