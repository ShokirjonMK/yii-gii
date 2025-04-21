<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%exam_control}}".
 *
 * @property int $id
 * @property int $time_table_id
 * @property int|null $start
 * @property int|null $start2
 * @property int|null $finish
 * @property int|null $finish2
 * @property float|null $max_ball
 * @property float|null $max_ball2
 * @property int|null $duration
 * @property int|null $duration2
 * @property string|null $question
 * @property string|null $question2
 * @property string|null $question_file
 * @property string|null $question2_file
 * @property int|null $course_id
 * @property int|null $semester_id
 * @property int $edu_year_id
 * @property int $subject_id
 * @property int $language_id
 * @property int $edu_plan_id
 * @property int $teacher_user_id
 * @property int $edu_semester_id
 * @property int $subject_category_id
 * @property int|null $archived
 * @property int|null $old_exam_control_id
 * @property int|null $faculty_id
 * @property int|null $direction_id
 * @property int|null $type
 * @property int|null $category
 * @property int|null $status
 * @property int|null $order
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $is_deleted
 *
 * @property Course $course
 * @property Direction $direction
 * @property EduPlan $eduPlan
 * @property EduSemestr $eduSemester
 * @property EduYear $eduYear
 * @property ExamControlStudent[] $examControlStudents
 * @property Faculty $faculty
 * @property Language $language
 * @property Semestr $semester
 * @property Subject $subject
 * @property SubjectCategory $subjectCategory
 * @property TimeTable $teacherUser
 * @property TimeTable $timeTable
 */
class ExamControl extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%exam_control}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['time_table_id', 'edu_year_id', 'subject_id', 'language_id', 'edu_plan_id', 'teacher_user_id', 'edu_semester_id', 'subject_category_id'], 'required'],
            [['time_table_id', 'start', 'start2', 'finish', 'finish2', 'duration', 'duration2', 'course_id', 'semester_id', 'edu_year_id', 'subject_id', 'language_id', 'edu_plan_id', 'teacher_user_id', 'edu_semester_id', 'subject_category_id', 'archived', 'old_exam_control_id', 'faculty_id', 'direction_id', 'type', 'category', 'status', 'order', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['max_ball', 'max_ball2'], 'number'],
            [['question', 'question2'], 'string'],
            [['question_file', 'question2_file'], 'string', 'max' => 255],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['direction_id'], 'exist', 'skipOnError' => true, 'targetClass' => Direction::className(), 'targetAttribute' => ['direction_id' => 'id']],
            [['edu_plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduPlan::className(), 'targetAttribute' => ['edu_plan_id' => 'id']],
            [['edu_semester_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduSemestr::className(), 'targetAttribute' => ['edu_semester_id' => 'id']],
            [['edu_year_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduYear::className(), 'targetAttribute' => ['edu_year_id' => 'id']],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_id' => 'id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
            [['semester_id'], 'exist', 'skipOnError' => true, 'targetClass' => Semestr::className(), 'targetAttribute' => ['semester_id' => 'id']],
            [['subject_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubjectCategory::className(), 'targetAttribute' => ['subject_category_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],
            [['teacher_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => TimeTable::className(), 'targetAttribute' => ['teacher_user_id' => 'id']],
            [['time_table_id'], 'exist', 'skipOnError' => true, 'targetClass' => TimeTable::className(), 'targetAttribute' => ['time_table_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'time_table_id' => Yii::t('app', 'Time Table ID'),
            'start' => Yii::t('app', 'Start'),
            'start2' => Yii::t('app', 'Start2'),
            'finish' => Yii::t('app', 'Finish'),
            'finish2' => Yii::t('app', 'Finish2'),
            'max_ball' => Yii::t('app', 'Max Ball'),
            'max_ball2' => Yii::t('app', 'Max Ball2'),
            'duration' => Yii::t('app', 'Duration'),
            'duration2' => Yii::t('app', 'Duration2'),
            'question' => Yii::t('app', 'Question'),
            'question2' => Yii::t('app', 'Question2'),
            'question_file' => Yii::t('app', 'Question File'),
            'question2_file' => Yii::t('app', 'Question2 File'),
            'course_id' => Yii::t('app', 'Course ID'),
            'semester_id' => Yii::t('app', 'Semester ID'),
            'edu_year_id' => Yii::t('app', 'Edu Year ID'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'language_id' => Yii::t('app', 'Language ID'),
            'edu_plan_id' => Yii::t('app', 'Edu Plan ID'),
            'teacher_user_id' => Yii::t('app', 'Teacher User ID'),
            'edu_semester_id' => Yii::t('app', 'Edu Semester ID'),
            'subject_category_id' => Yii::t('app', 'Subject Category ID'),
            'archived' => Yii::t('app', 'Archived'),
            'old_exam_control_id' => Yii::t('app', 'Old Exam Control ID'),
            'faculty_id' => Yii::t('app', 'Faculty ID'),
            'direction_id' => Yii::t('app', 'Direction ID'),
            'type' => Yii::t('app', 'Type'),
            'category' => Yii::t('app', 'Category'),
            
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
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery|CourseQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * Gets query for [[Direction]].
     *
     * @return \yii\db\ActiveQuery|DirectionQuery
     */
    public function getDirection()
    {
        return $this->hasOne(Direction::className(), ['id' => 'direction_id']);
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
     * Gets query for [[ExamControlStudents]].
     *
     * @return \yii\db\ActiveQuery|ExamControlStudentQuery
     */
    public function getExamControlStudents()
    {
        return $this->hasMany(ExamControlStudent::className(), ['exam_control_id' => 'id']);
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
     * Gets query for [[Language]].
     *
     * @return \yii\db\ActiveQuery|LanguageQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
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
     * Gets query for [[TeacherUser]].
     *
     * @return \yii\db\ActiveQuery|TimeTableQuery
     */
    public function getTeacherUser()
    {
        return $this->hasOne(TimeTable::className(), ['id' => 'teacher_user_id']);
    }

    /**
     * Gets query for [[TimeTable]].
     *
     * @return \yii\db\ActiveQuery|TimeTableQuery
     */
    public function getTimeTable()
    {
        return $this->hasOne(TimeTable::className(), ['id' => 'time_table_id']);
    }

    /**
     * {@inheritdoc}
     * @return ExamControlQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ExamControlQuery(get_called_class());
    }
}
