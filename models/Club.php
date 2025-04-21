<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%club}}".
 *
 * @property int $id
 * @property int $club_category_id
 * @property int|null $status
 * @property int|null $order
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $is_deleted
 * @property string|null $image
 *
 * @property ClubCategory $clubCategory
 * @property ClubTime[] $clubTimes
 * @property StudentClub[] $studentClubs
 */
class Club extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%club}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['club_category_id'], 'required'],
            [['club_category_id', 'status', 'order', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['image'], 'string', 'max' => 255],
            [['club_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClubCategory::className(), 'targetAttribute' => ['club_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'club_category_id' => Yii::t('app', 'Club Category ID'),
            'status' => Yii::t('app', 'Status'),
            'order' => Yii::t('app', 'Order'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'image' => Yii::t('app', 'Image'),
        ];
    }

    /**
     * Gets query for [[ClubCategory]].
     *
     * @return \yii\db\ActiveQuery|ClubCategoryQuery
     */
    public function getClubCategory()
    {
        return $this->hasOne(ClubCategory::className(), ['id' => 'club_category_id']);
    }

    /**
     * Gets query for [[ClubTimes]].
     *
     * @return \yii\db\ActiveQuery|ClubTimeQuery
     */
    public function getClubTimes()
    {
        return $this->hasMany(ClubTime::className(), ['club_id' => 'id']);
    }

    /**
     * Gets query for [[StudentClubs]].
     *
     * @return \yii\db\ActiveQuery|StudentClubQuery
     */
    public function getStudentClubs()
    {
        return $this->hasMany(StudentClub::className(), ['club_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ClubQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClubQuery(get_called_class());
    }
}
