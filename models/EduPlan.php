<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%edu_plan}}".
 *
 * @property int $id
 * @property string|null $spring_end
 * @property string|null $spring_start
 * @property string|null $fall_end
 * @property string|null $fall_start
 * @property int $course
 * @property int $semestr
 * @property int $edu_year_id
 * @property int $faculty_id
 * @property int $direction_id
 * @property int $edu_type_id
 * @property int|null $order
 * @property int|null $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $is_deleted
 * @property int|null $edu_form_id ta-lim shakli
 *
 * @property AttendAccess[] $attendAccesses
 * @property AttendReason[] $attendReasons
 * @property Attend[] $attends
 * @property AttentAccess[] $attentAccesses
 * @property Direction $direction
 * @property EduSemestr[] $eduSemestrs
 * @property EduType $eduType
 * @property EduYear $eduYear
 * @property ExamControlStudent[] $examControlStudents
 * @property ExamControl[] $examControls
 * @property Faculty $faculty
 * @property StudentAttend[] $studentAttends
 * @property StudentClub[] $studentClubs
 * @property StudentSubjectSelection[] $studentSubjectSelections
 * @property StudentTimeOption[] $studentTimeOptions
 * @property Student[] $students
 * @property TimeOption[] $timeOptions
 */
class EduPlan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%edu_plan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['spring_end', 'spring_start', 'fall_end', 'fall_start'], 'safe'],
            [['course', 'semestr', 'edu_year_id', 'faculty_id', 'direction_id', 'edu_type_id', 'created_at', 'updated_at'], 'required'],
            [['course', 'semestr', 'edu_year_id', 'faculty_id', 'direction_id', 'edu_type_id', 'order', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted', 'edu_form_id'], 'integer'],
            [['direction_id'], 'exist', 'skipOnError' => true, 'targetClass' => Direction::className(), 'targetAttribute' => ['direction_id' => 'id']],
            [['edu_year_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduYear::className(), 'targetAttribute' => ['edu_year_id' => 'id']],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_id' => 'id']],
            [['edu_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduType::className(), 'targetAttribute' => ['edu_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'spring_end' => Yii::t('app', 'Spring End'),
            'spring_start' => Yii::t('app', 'Spring Start'),
            'fall_end' => Yii::t('app', 'Fall End'),
            'fall_start' => Yii::t('app', 'Fall Start'),
            'course' => Yii::t('app', 'Course'),
            'semestr' => Yii::t('app', 'Semestr'),
            'edu_year_id' => Yii::t('app', 'Edu Year ID'),
            'faculty_id' => Yii::t('app', 'Faculty ID'),
            'direction_id' => Yii::t('app', 'Direction ID'),
            'edu_type_id' => Yii::t('app', 'Edu Type ID'),
            'order' => Yii::t('app', 'Order'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'edu_form_id' => Yii::t('app', 'ta-lim shakli'),
        ];
    }

    /**
     * Gets query for [[AttendAccesses]].
     *
     * @return \yii\db\ActiveQuery|AttendAccessQuery
     */
    public function getAttendAccesses()
    {
        return $this->hasMany(AttendAccess::className(), ['edu_plan_id' => 'id']);
    }

    /**
     * Gets query for [[AttendReasons]].
     *
     * @return \yii\db\ActiveQuery|AttendReasonQuery
     */
    public function getAttendReasons()
    {
        return $this->hasMany(AttendReason::className(), ['edu_plan_id' => 'id']);
    }

    /**
     * Gets query for [[Attends]].
     *
     * @return \yii\db\ActiveQuery|AttendQuery
     */
    public function getAttends()
    {
        return $this->hasMany(Attend::className(), ['edu_plan_id' => 'id']);
    }

    /**
     * Gets query for [[AttentAccesses]].
     *
     * @return \yii\db\ActiveQuery|AttentAccessQuery
     */
    public function getAttentAccesses()
    {
        return $this->hasMany(AttentAccess::className(), ['edu_plan_id' => 'id']);
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
     * Gets query for [[EduSemestrs]].
     *
     * @return \yii\db\ActiveQuery|EduSemestrQuery
     */
    public function getEduSemestrs()
    {
        return $this->hasMany(EduSemestr::className(), ['edu_plan_id' => 'id']);
    }

    /**
     * Gets query for [[EduType]].
     *
     * @return \yii\db\ActiveQuery|EduTypeQuery
     */
    public function getEduType()
    {
        return $this->hasOne(EduType::className(), ['id' => 'edu_type_id']);
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
        return $this->hasMany(ExamControlStudent::className(), ['edu_plan_id' => 'id']);
    }

    /**
     * Gets query for [[ExamControls]].
     *
     * @return \yii\db\ActiveQuery|ExamControlQuery
     */
    public function getExamControls()
    {
        return $this->hasMany(ExamControl::className(), ['edu_plan_id' => 'id']);
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
        return $this->hasMany(StudentAttend::className(), ['edu_plan_id' => 'id']);
    }

    /**
     * Gets query for [[StudentClubs]].
     *
     * @return \yii\db\ActiveQuery|StudentClubQuery
     */
    public function getStudentClubs()
    {
        return $this->hasMany(StudentClub::className(), ['edu_plan_id' => 'id']);
    }

    /**
     * Gets query for [[StudentSubjectSelections]].
     *
     * @return \yii\db\ActiveQuery|StudentSubjectSelectionQuery
     */
    public function getStudentSubjectSelections()
    {
        return $this->hasMany(StudentSubjectSelection::className(), ['edu_plan_id' => 'id']);
    }

    /**
     * Gets query for [[StudentTimeOptions]].
     *
     * @return \yii\db\ActiveQuery|StudentTimeOptionQuery
     */
    public function getStudentTimeOptions()
    {
        return $this->hasMany(StudentTimeOption::className(), ['edu_plan_id' => 'id']);
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery|StudentQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['edu_plan_id' => 'id']);
    }

    /**
     * Gets query for [[TimeOptions]].
     *
     * @return \yii\db\ActiveQuery|TimeOptionQuery
     */
    public function getTimeOptions()
    {
        return $this->hasMany(TimeOption::className(), ['edu_plan_id' => 'id']);
    }

    /**
     * EduPlan createItem <$model, $post>
     */
    public static function createItem($model, $post)
    {
        $transaction = Yii::$app->db->beginTransaction();
        $errors = [];
        if (!($model->validate())) {
            $errors[] = $model->errors;
            $transaction->rollBack();
            return simplify_errors($errors);
        }

        if ($model->save()) {
            $transaction->commit();
            return true;
        } else {
            $transaction->rollBack();
            return simplify_errors($errors);
        }
    }

    /**
     * EduPlan updateItem <$model, $post>
     */
    public static function updateItem($model, $post)
    {
        $transaction = Yii::$app->db->beginTransaction();
        $errors = [];
        if (!($model->validate())) {
            $errors[] = $model->errors;
            $transaction->rollBack();
            return simplify_errors($errors);
        }

        if ($model->save()) {
            $transaction->commit();
            return true;
        } else {
            $transaction->rollBack();
            return simplify_errors($errors);
        }
    }


    /**
     * {@inheritdoc}
     * @return EduPlanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EduPlanQuery(get_called_class());
    }
}
