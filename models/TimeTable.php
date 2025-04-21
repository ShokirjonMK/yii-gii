<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%time_table}}".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int|null $lecture_id
 * @property int $teacher_access_id
 * @property int $room_id
 * @property int $para_id
 * @property int $course_id
 * @property int $semester_id
 * @property int $edu_year_id
 * @property int $subject_id
 * @property int $language_id
 * @property int $week_id
 * @property int|null $order
 * @property int|null $status
 * @property int|null $building_id
 * @property int|null $edu_plan_id
 * @property int|null $teacher_user_id
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $is_deleted
 * @property int $edu_semester_id
 * @property int $subject_category_id
 *
 * @property Course $course
 * @property EduSemestr $eduSemester
 * @property EduYear $eduYear
 * @property Language $language
 * @property Para $para
 * @property Room $room
 * @property Semestr $semester
 * @property StudentTimeTable[] $studentTimeTables
 * @property Subject $subject
 * @property SubjectCategory $subjectCategory
 * @property TeacherAccess $teacherAccess
 * @property Week $week
 */
class TimeTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%time_table}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'lecture_id', 'teacher_access_id', 'room_id', 'para_id', 'course_id', 'semester_id', 'edu_year_id', 'subject_id', 'language_id', 'week_id', 'order', 'status', 'building_id', 'edu_plan_id', 'teacher_user_id', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted', 'edu_semester_id', 'subject_category_id'], 'integer'],
            [['teacher_access_id', 'room_id', 'para_id', 'course_id', 'semester_id', 'edu_year_id', 'subject_id', 'language_id', 'week_id', 'created_at', 'updated_at', 'edu_semester_id', 'subject_category_id'], 'required'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['edu_year_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduYear::className(), 'targetAttribute' => ['edu_year_id' => 'id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
            [['para_id'], 'exist', 'skipOnError' => true, 'targetClass' => Para::className(), 'targetAttribute' => ['para_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],
            [['semester_id'], 'exist', 'skipOnError' => true, 'targetClass' => Semestr::className(), 'targetAttribute' => ['semester_id' => 'id']],
            [['teacher_access_id'], 'exist', 'skipOnError' => true, 'targetClass' => TeacherAccess::className(), 'targetAttribute' => ['teacher_access_id' => 'id']],
            [['edu_semester_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduSemestr::className(), 'targetAttribute' => ['edu_semester_id' => 'id']],
            [['subject_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubjectCategory::className(), 'targetAttribute' => ['subject_category_id' => 'id']],
            [['week_id'], 'exist', 'skipOnError' => true, 'targetClass' => Week::className(), 'targetAttribute' => ['week_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'lecture_id' => Yii::t('app', 'Lecture ID'),
            'teacher_access_id' => Yii::t('app', 'Teacher Access ID'),
            'room_id' => Yii::t('app', 'Room ID'),
            'para_id' => Yii::t('app', 'Para ID'),
            'course_id' => Yii::t('app', 'Course ID'),
            'semester_id' => Yii::t('app', 'Semester ID'),
            'edu_year_id' => Yii::t('app', 'Edu Year ID'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'language_id' => Yii::t('app', 'Language ID'),
            'week_id' => Yii::t('app', 'Week ID'),
            'order' => Yii::t('app', 'Order'),
            'status' => Yii::t('app', 'Status'),
            'building_id' => Yii::t('app', 'Building ID'),
            'edu_plan_id' => Yii::t('app', 'Edu Plan ID'),
            'teacher_user_id' => Yii::t('app', 'Teacher User ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'edu_semester_id' => Yii::t('app', 'Edu Semester ID'),
            'subject_category_id' => Yii::t('app', 'Subject Category ID'),
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery|CourseQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * Gets query for [[EduSemester]].
     *
     * @return \yii\db\ActiveQuery|EduSemestrQuery
     */
    public function getEduSemester()
    {
        return $this->hasOne(EduSemestr::className(), ['id' => 'edu_semester_id']);
    }

    /**
     * Gets query for [[EduYear]].
     *
     * @return \yii\db\ActiveQuery|EduYearQuery
     */
    public function getEduYear()
    {
        return $this->hasOne(EduYear::className(), ['id' => 'edu_year_id']);
    }

    /**
     * Gets query for [[Language]].
     *
     * @return \yii\db\ActiveQuery|LanguageQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * Gets query for [[Para]].
     *
     * @return \yii\db\ActiveQuery|ParaQuery
     */
    public function getPara()
    {
        return $this->hasOne(Para::className(), ['id' => 'para_id']);
    }

    /**
     * Gets query for [[Room]].
     *
     * @return \yii\db\ActiveQuery|RoomQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }

    /**
     * Gets query for [[Semester]].
     *
     * @return \yii\db\ActiveQuery|SemestrQuery
     */
    public function getSemester()
    {
        return $this->hasOne(Semestr::className(), ['id' => 'semester_id']);
    }

    /**
     * Gets query for [[StudentTimeTables]].
     *
     * @return \yii\db\ActiveQuery|StudentTimeTableQuery
     */
    public function getStudentTimeTables()
    {
        return $this->hasMany(StudentTimeTable::className(), ['time_table_id' => 'id']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery|SubjectQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }

    /**
     * Gets query for [[SubjectCategory]].
     *
     * @return \yii\db\ActiveQuery|SubjectCategoryQuery
     */
    public function getSubjectCategory()
    {
        return $this->hasOne(SubjectCategory::className(), ['id' => 'subject_category_id']);
    }

    /**
     * Gets query for [[TeacherAccess]].
     *
     * @return \yii\db\ActiveQuery|TeacherAccessQuery
     */
    public function getTeacherAccess()
    {
        return $this->hasOne(TeacherAccess::className(), ['id' => 'teacher_access_id']);
    }

    /**
     * Gets query for [[Week]].
     *
     * @return \yii\db\ActiveQuery|WeekQuery
     */
    public function getWeek()
    {
        return $this->hasOne(Week::className(), ['id' => 'week_id']);
    }

    /**
     * {@inheritdoc}
     * @return TimeTableQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TimeTableQuery(get_called_class());
    }
}
