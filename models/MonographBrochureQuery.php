<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MonographBrochure]].
 *
 * @see MonographBrochure
 */
class MonographBrochureQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MonographBrochure[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MonographBrochure|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
