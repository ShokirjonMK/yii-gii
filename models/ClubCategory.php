<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%club_category}}".
 *
 * @property int $id
 * @property int|null $status
 * @property int|null $order
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $is_deleted
 *
 * @property ClubTime[] $clubTimes
 * @property Club[] $clubs
 */
class ClubCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%club_category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'order', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status' => Yii::t('app', 'Status'),
            'order' => Yii::t('app', 'Order'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
        ];
    }

    /**
     * Gets query for [[ClubTimes]].
     *
     * @return \yii\db\ActiveQuery|ClubTimeQuery
     */
    public function getClubTimes()
    {
        return $this->hasMany(ClubTime::className(), ['club_category_id' => 'id']);
    }

    /**
     * Gets query for [[Clubs]].
     *
     * @return \yii\db\ActiveQuery|ClubQuery
     */
    public function getClubs()
    {
        return $this->hasMany(Club::className(), ['club_category_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ClubCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClubCategoryQuery(get_called_class());
    }
}
