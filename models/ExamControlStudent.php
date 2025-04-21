<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%exam_control_student}}".
 *
 * @property int $id
 * @property int|null $exam_control_id
 * @property int|null $student_id
 * @property string|null $answer
 * @property string|null $answer_file
 * @property string|null $conclution
 * @property string|null $answer2
 * @property string|null $answer2_file
 * @property string|null $conclution2
 * @property int|null $course_id
 * @property int|null $semester_id
 * @property int|null $edu_year_id
 * @property int|null $subject_id
 * @property int|null $language_id
 * @property int|null $edu_plan_id
 * @property int|null $teacher_user_id
 * @property int|null $edu_semester_id
 * @property int|null $subject_category_id
 * @property int|null $archived
 * @property int|null $old_exam_control_id
 * @property float|null $ball
 * @property float|null $ball2
 * @property float|null $main_ball
 * @property float|null $plagiat_percent
 * @property float|null $plagiat_percent2
 * @property string|null $plagiat_file
 * @property string|null $plagiat_file2
 * @property int|null $duration
 * @property int|null $faculty_id
 * @property int|null $direction_id
 * @property int|null $type
 * @property int|null $category
 * @property int|null $is_checked
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
 * @property ExamControl $examControl
 * @property Faculty $faculty
 * @property Language $language
 * @property Semestr $semester
 * @property Student $student
 * @property Subject $subject
 * @property SubjectCategory $subjectCategory
 * @property TimeTable $teacherUser
 */
class ExamControlStudent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%exam_control_student}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['exam_control_id', 'student_id', 'course_id', 'semester_id', 'edu_year_id', 'subject_id', 'language_id', 'edu_plan_id', 'teacher_user_id', 'edu_semester_id', 'subject_category_id', 'archived', 'old_exam_control_id', 'duration', 'faculty_id', 'direction_id', 'type', 'category', 'is_checked', 'status', 'order', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['answer', 'conclution', 'answer2', 'conclution2'], 'string'],
            [['ball', 'ball2', 'main_ball', 'plagiat_percent', 'plagiat_percent2'], 'number'],
            [['answer_file', 'answer2_file', 'plagiat_file', 'plagiat_file2'], 'string', 'max' => 255],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['direction_id'], 'exist', 'skipOnError' => true, 'targetClass' => Direction::className(), 'targetAttribute' => ['direction_id' => 'id']],
            [['edu_plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduPlan::className(), 'targetAttribute' => ['edu_plan_id' => 'id']],
            [['edu_semester_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduSemestr::className(), 'targetAttribute' => ['edu_semester_id' => 'id']],
            [['edu_year_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduYear::className(), 'targetAttribute' => ['edu_year_id' => 'id']],
            [['exam_control_id'], 'exist', 'skipOnError' => true, 'targetClass' => ExamControl::className(), 'targetAttribute' => ['exam_control_id' => 'id']],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_id' => 'id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
            [['semester_id'], 'exist', 'skipOnError' => true, 'targetClass' => Semestr::className(), 'targetAttribute' => ['semester_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
            [['subject_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubjectCategory::className(), 'targetAttribute' => ['subject_category_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],
            [['teacher_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => TimeTable::className(), 'targetAttribute' => ['teacher_user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'exam_control_id' => Yii::t('app', 'Exam Control ID'),
            'student_id' => Yii::t('app', 'Student ID'),
            'answer' => Yii::t('app', 'Answer'),
            'answer_file' => Yii::t('app', 'Answer File'),
            'conclution' => Yii::t('app', 'Conclution'),
            'answer2' => Yii::t('app', 'Answer2'),
            'answer2_file' => Yii::t('app', 'Answer2 File'),
            'conclution2' => Yii::t('app', 'Conclution2'),
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
            'ball' => Yii::t('app', 'Ball'),
            'ball2' => Yii::t('app', 'Ball2'),
            'main_ball' => Yii::t('app', 'Main Ball'),
            'plagiat_percent' => Yii::t('app', 'Plagiat Percent'),
            'plagiat_percent2' => Yii::t('app', 'Plagiat Percent2'),
            'plagiat_file' => Yii::t('app', 'Plagiat File'),
            'plagiat_file2' => Yii::t('app', 'Plagiat File2'),
            'duration' => Yii::t('app', 'Duration'),
            'faculty_id' => Yii::t('app', 'Faculty ID'),
            'direction_id' => Yii::t('app', 'Direction ID'),
            'type' => Yii::t('app', 'Type'),
            'category' => Yii::t('app', 'Category'),
            'is_checked' => Yii::t('app', 'Is Checked'),
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
     * Gets query for [[ExamControl]].
     *
     * @return \yii\db\ActiveQuery|ExamControlQuery
     */
    public function getExamControl()
    {
        return $this->hasOne(ExamControl::className(), ['id' => 'exam_control_id']);
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
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery|StudentQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
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
     * {@inheritdoc}
     * @return ExamControlStudentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ExamControlStudentQuery(get_called_class());
    }
}
