<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%club_time}}".
 *
 * @property int $id
 * @property int|null $club_category_id
 * @property int $club_id
 * @property int|null $room_id
 * @property int|null $building_id
 * @property string|null $times
 * @property int|null $status
 * @property int|null $order
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $is_deleted
 * @property int|null $duration
 *
 * @property Club $club
 * @property ClubCategory $clubCategory
 * @property StudentClub[] $studentClubs
 */
class ClubTime extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%club_time}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['club_category_id', 'club_id', 'room_id', 'building_id', 'status', 'order', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted', 'duration'], 'integer'],
            [['club_id'], 'required'],
            [['times'], 'safe'],
            [['club_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClubCategory::className(), 'targetAttribute' => ['club_category_id' => 'id']],
            [['club_id'], 'exist', 'skipOnError' => true, 'targetClass' => Club::className(), 'targetAttribute' => ['club_id' => 'id']],
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
            'club_id' => Yii::t('app', 'Club ID'),
            'room_id' => Yii::t('app', 'Room ID'),
            'building_id' => Yii::t('app', 'Building ID'),
            'times' => Yii::t('app', 'Times'),
            'status' => Yii::t('app', 'Status'),
            'order' => Yii::t('app', 'Order'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'duration' => Yii::t('app', 'Duration'),
        ];
    }

    /**
     * Gets query for [[Club]].
     *
     * @return \yii\db\ActiveQuery|ClubQuery
     */
    public function getClub()
    {
        return $this->hasOne(Club::className(), ['id' => 'club_id']);
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
     * Gets query for [[StudentClubs]].
     *
     * @return \yii\db\ActiveQuery|StudentClubQuery
     */
    public function getStudentClubs()
    {
        return $this->hasMany(StudentClub::className(), ['club_time_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ClubTimeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClubTimeQuery(get_called_class());
    }
}
