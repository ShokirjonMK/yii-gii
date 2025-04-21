<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%attend}}".
 *
 * @property int $id
 * @property string $date
 * @property string|null $student_ids
 * @property int $time_table_id
 * @property int $subject_id
 * @property int $subject_category_id
 * @property int $time_option_id
 * @property int $edu_year_id
 * @property int $edu_semestr_id
 * @property int|null $faculty_id
 * @property int|null $edu_plan_id
 * @property int|null $type 1 kuz 2 bohor
 * @property int|null $status
 * @property int|null $order
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $is_deleted
 *
 * @property EduPlan $eduPlan
 * @property EduSemestr $eduSemestr
 * @property EduYear $eduYear
 * @property Faculty $faculty
 * @property StudentAttend[] $studentAttends
 * @property Subject $subject
 * @property SubjectCategory $subjectCategory
 * @property TimeOption $timeOption
 * @property TimeTable $timeTable
 */
class Attend extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%attend}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[
                'date',
                'time_table_id',
                'subject_id',
                'subject_category_id',
                'time_option_id',
                'edu_year_id',
                'edu_semestr_id'
            ], 'required'],
            [[
                'date',
                'student_ids'
            ], 'safe'],
            [[
                'time_table_id',
                'subject_id',
                'subject_category_id',
                'time_option_id',
                'edu_year_id',
                'edu_semestr_id',
                'faculty_id',
                'edu_plan_id',
                'type',
                'status',
                'order',
                'created_at',
                'updated_at',
                'created_by',
                'updated_by',
                'is_deleted'
            ], 'integer'],
            [
                ['edu_plan_id'], 'exist',
                'skipOnError' => true, 'targetClass' => EduPlan::className(), 'targetAttribute' => ['edu_plan_id' => 'id']
            ],
            [
                ['edu_semestr_id'], 'exist',
                'skipOnError' => true, 'targetClass' => EduSemestr::className(), 'targetAttribute' => ['edu_semestr_id' => 'id']
            ],
            [
                ['edu_year_id'], 'exist',
                'skipOnError' => true, 'targetClass' => EduYear::className(), 'targetAttribute' => ['edu_year_id' => 'id']
            ],
            [
                ['faculty_id'], 'exist',
                'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_id' => 'id']
            ],
            [
                ['subject_id'], 'exist',
                'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']
            ],
            [
                ['subject_category_id'], 'exist',
                'skipOnError' => true, 'targetClass' => SubjectCategory::className(), 'targetAttribute' => ['subject_category_id' => 'id']
            ],
            [
                ['time_option_id'], 'exist',
                'skipOnError' => true, 'targetClass' => TimeOption::className(), 'targetAttribute' => ['time_option_id' => 'id']
            ],
            [
                ['time_table_id'], 'exist',
                'skipOnError' => true, 'targetClass' => TimeTable::className(), 'targetAttribute' => ['time_table_id' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t(
                'app',
                'ID'
            ),
            'date' => Yii::t(
                'app',
                'Date'
            ),
            'student_ids' => Yii::t(
                'app',
                'Student Ids'
            ),
            'time_table_id' => Yii::t(
                'app',
                'Time Table ID'
            ),
            'subject_id' => Yii::t(
                'app',
                'Subject ID'
            ),
            'subject_category_id' => Yii::t(
                'app',
                'Subject Category ID'
            ),
            'time_option_id' => Yii::t(
                'app',
                'Time Option ID'
            ),
            'edu_year_id' => Yii::t('app', 'Edu Year ID'),
            'edu_semestr_id' => Yii::t('app', 'Edu Semestr ID'),
            'faculty_id' => Yii::t('app', 'Faculty ID'),
            'edu_plan_id' => Yii::t('app', 'Edu Plan ID'),
            'type' => Yii::t('app', '1 kuz 2 bohor'),
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
     * Gets query for [[EduPlan]].
     *
     * @return \yii\db\ActiveQuery|EduPlanQuery
     */
    public function getEduPlan()
    {
        return $this->hasOne(EduPlan::className(), ['id' => 'edu_plan_id']);
    }

    /**
     * Gets query for [[EduSemestr]].
     *
     * @return \yii\db\ActiveQuery|EduSemestrQuery
     */
    public function getEduSemestr()
    {
        return $this->hasOne(EduSemestr::className(), ['id' => 'edu_semestr_id']);
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
     * Gets query for [[Faculty]].
     *
     * @return \yii\db\ActiveQuery|FacultyQuery
     */
    public function getFaculty()
    {
        return $this->hasOne(Faculty::className(), ['id' => 'faculty_id']);
    }

    /**
     * Gets query for [[StudentAttends]].
     *
     * @return \yii\db\ActiveQuery|StudentAttendQuery
     */
    public function getStudentAttends()
    {
        return $this->hasMany(StudentAttend::className(), ['attend_id' => 'id']);
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
     * Gets query for [[TimeOption]].
     *
     * @return \yii\db\ActiveQuery|TimeOptionQuery
     */
    public function getTimeOption()
    {
        return $this->hasOne(TimeOption::className(), ['id' => 'time_option_id']);
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
     * @return AttendQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AttendQuery(get_called_class());
    }
}
