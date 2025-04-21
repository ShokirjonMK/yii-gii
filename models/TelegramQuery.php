<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Telegram]].
 *
 * @see Telegram
 */
class TelegramQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Telegram[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Telegram|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
