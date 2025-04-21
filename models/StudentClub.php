<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%student_club}}".
 *
 * @property int $id
 * @property string|null $description
 * @property int|null $club_category_id
 * @property int $club_time_id
 * @property int $club_id
 * @property int $student_id
 * @property int|null $faculty_id
 * @property int|null $edu_plan_id
 * @property int|null $gender
 * @property int|null $status
 * @property int|null $order
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $is_deleted
 *
 * @property Club $club
 * @property ClubCategory $clubCategory
 * @property ClubTime $clubTime
 * @property EduPlan $eduPlan
 * @property Faculty $faculty
 * @property Student $student
 */
class StudentClub extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%student_club}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['club_category_id', 'club_time_id', 'club_id', 'student_id', 'faculty_id', 'edu_plan_id', 'gender', 'status', 'order', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['club_time_id', 'club_id', 'student_id'], 'required'],
            [['club_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClubCategory::className(), 'targetAttribute' => ['club_category_id' => 'id']],
            [['club_id'], 'exist', 'skipOnError' => true, 'targetClass' => Club::className(), 'targetAttribute' => ['club_id' => 'id']],
            [['club_time_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClubTime::className(), 'targetAttribute' => ['club_time_id' => 'id']],
            [['edu_plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduPlan::className(), 'targetAttribute' => ['edu_plan_id' => 'id']],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'description' => Yii::t('app', 'Description'),
            'club_category_id' => Yii::t('app', 'Club Category ID'),
            'club_time_id' => Yii::t('app', 'Club Time ID'),
            'club_id' => Yii::t('app', 'Club ID'),
            'student_id' => Yii::t('app', 'Student ID'),
            'faculty_id' => Yii::t('app', 'Faculty ID'),
            'edu_plan_id' => Yii::t('app', 'Edu Plan ID'),
            'gender' => Yii::t('app', 'Gender'),
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
     * Gets query for [[ClubTime]].
     *
     * @return \yii\db\ActiveQuery|ClubTimeQuery
     */
    public function getClubTime()
    {
        return $this->hasOne(ClubTime::className(), ['id' => 'club_time_id']);
    }

    /**
     * Gets query for [[EduPlan]].
     *
     * @return \yii\db\ActiveQuery|EduPlanQuery
     */
    public function getEduPlan()
    {
        return $this->hasOne(EduPlan::className(), ['id' => 'edu_plan_id']);
    }

    /**
     * Gets query for [[Faculty]].
     *
     * @return \yii\db\ActiveQuery|FacultyQuery
     */
    public function getFaculty()
    {
        return $this->hasOne(Faculty::className(), ['id' => 'faculty_id']);
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery|StudentQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }

    /**
     * {@inheritdoc}
     * @return StudentClubQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StudentClubQuery(get_called_class());
    }
}
