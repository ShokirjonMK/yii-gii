<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ScientificArticle]].
 *
 * @see ScientificArticle
 */
class ScientificArticleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ScientificArticle[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ScientificArticle|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
