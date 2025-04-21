<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%edu_semestr}}".
 *
 * @property int $id
 * @property float|null $credit
 * @property int $edu_plan_id
 * @property int $course_id
 * @property int $semestr_id
 * @property int $edu_year_id
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int|null $is_checked
 * @property int|null $order
 * @property int|null $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $is_deleted
 * @property int $optional_subject_count
 * @property int $required_subject_count
 * @property int|null $type type 1 - random teshiradi 2 - teacher o`zi tekshiradi id 
 *
 * @property AttendAccess[] $attendAccesses
 * @property Attend[] $attends
 * @property AttentAccess[] $attentAccesses
 * @property Course $course
 * @property EduPlan $eduPlan
 * @property EduSemestrSubject[] $eduSemestrSubjects
 * @property EduYear $eduYear
 * @property ExamControlStudent[] $examControlStudents
 * @property ExamControl[] $examControls
 * @property Semestr $semestr
 * @property StudentAttendCopy1[] $studentAttendCopy1s
 * @property StudentAttend[] $studentAttends
 * @property StudentMark[] $studentMarks
 * @property StudentSubjectRestrict[] $studentSubjectRestricts
 * @property StudentSubjectSelection16[] $studentSubjectSelection16s
 * @property StudentSubjectSelection[] $studentSubjectSelections
 * @property StudentTimeOption16[] $studentTimeOption16s
 * @property StudentTimeOption[] $studentTimeOptions
 * @property TimeOption16[] $timeOption16s
 * @property TimeOption[] $timeOptions
 * @property TimeTable16[] $timeTable16s
 * @property TimeTable[] $timeTables
 */
class EduSemestr extends \yii\db\ActiveRecord
{
    // use ResourceTrait;

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%edu_semestr}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['credit'], 'number'],
            [['edu_plan_id', 'course_id', 'semestr_id', 'edu_year_id', 'created_at', 'updated_at'], 'required'],
            [['edu_plan_id', 'course_id', 'semestr_id', 'edu_year_id', 'is_checked', 'order', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted', 'optional_subject_count', 'required_subject_count', 'type'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['edu_plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduPlan::className(), 'targetAttribute' => ['edu_plan_id' => 'id']],
            [['edu_year_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduYear::className(), 'targetAttribute' => ['edu_year_id' => 'id']],
            [['semestr_id'], 'exist', 'skipOnError' => true, 'targetClass' => Semestr::className(), 'targetAttribute' => ['semestr_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'credit' => Yii::t('app', 'Credit'),
            'edu_plan_id' => Yii::t('app', 'Edu Plan ID'),
            'course_id' => Yii::t('app', 'Course ID'),
            'semestr_id' => Yii::t('app', 'Semestr ID'),
            'edu_year_id' => Yii::t('app', 'Edu Year ID'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'is_checked' => Yii::t('app', 'Is Checked'),
            'order' => Yii::t('app', 'Order'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'optional_subject_count' => Yii::t('app', 'Optional Subject Count'),
            'required_subject_count' => Yii::t('app', 'Required Subject Count'),
            'type' => Yii::t('app', 'type 1 - random teshiradi 2 - teacher o`zi tekshiradi id '),
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function fields()
    {
        $fields =  [
            'id',
            'credit',
            'edu_plan_id',
            'course_id',
            'semestr_id',
            'edu_year_id',
            'start_date',
            'end_date',
            'is_checked',
            'order',
            'status',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'is_deleted',
            'optional_subject_count',
            'required_subject_count',
            'type',
        ];
        return $fields;
    }

    public function extraFields()
    {
        $extraFields =  [
            'attendAccesses',
            'attends',
            'attentAccesses',
            'course',
            'eduPlan',
            'eduSemestrSubjects',
            'eduYear',
            'examControlStudents',
            'examControls',
            'semestr',
            'studentAttendCopy1s',
            'studentAttends',
            'studentMarks',
            'studentSubjectRestricts',
            'studentSubjectSelection16s',
            'studentSubjectSelections',
            'studentTimeOption16s',
            'studentTimeOptions',
            'timeOption16s',
            'timeOptions',
            'timeTable16s',
            'timeTables',
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
    }    
    
    
    /**
     * Gets query for [[AttendAccesses]].
     *
     * @return \yii\db\ActiveQuery|AttendAccessQuery
     */
    public function getAttendAccesses()
    {
        return $this->hasMany(AttendAccess::className(), ['edu_semestr_id' => 'id']);
    }

    /**
     * Gets query for [[Attends]].
     *
     * @return \yii\db\ActiveQuery|AttendQuery
     */
    public function getAttends()
    {
        return $this->hasMany(Attend::className(), ['edu_semestr_id' => 'id']);
    }

    /**
     * Gets query for [[AttentAccesses]].
     *
     * @return \yii\db\ActiveQuery|AttentAccessQuery
     */
    public function getAttentAccesses()
    {
        return $this->hasMany(AttentAccess::className(), ['edu_semestr_id' => 'id']);
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
     * Gets query for [[EduPlan]].
     *
     * @return \yii\db\ActiveQuery|EduPlanQuery
     */
    public function getEduPlan()
    {
        return $this->hasOne(EduPlan::className(), ['id' => 'edu_plan_id']);
    }

    /**
     * Gets query for [[EduSemestrSubjects]].
     *
     * @return \yii\db\ActiveQuery|EduSemestrSubjectQuery
     */
    public function getEduSemestrSubjects()
    {
        return $this->hasMany(EduSemestrSubject::className(), ['edu_semestr_id' => 'id']);
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
        return $this->hasMany(ExamControlStudent::className(), ['edu_semester_id' => 'id']);
    }

    /**
     * Gets query for [[ExamControls]].
     *
     * @return \yii\db\ActiveQuery|ExamControlQuery
     */
    public function getExamControls()
    {
        return $this->hasMany(ExamControl::className(), ['edu_semester_id' => 'id']);
    }

    /**
     * Gets query for [[Semestr]].
     *
     * @return \yii\db\ActiveQuery|SemestrQuery
     */
    public function getSemestr()
    {
        return $this->hasOne(Semestr::className(), ['id' => 'semestr_id']);
    }

    /**
     * Gets query for [[StudentAttendCopy1s]].
     *
     * @return \yii\db\ActiveQuery|StudentAttendCopy1Query
     */
    public function getStudentAttendCopy1s()
    {
        return $this->hasMany(StudentAttendCopy1::className(), ['edu_semestr_id' => 'id']);
    }

    /**
     * Gets query for [[StudentAttends]].
     *
     * @return \yii\db\ActiveQuery|StudentAttendQuery
     */
    public function getStudentAttends()
    {
        return $this->hasMany(StudentAttend::className(), ['edu_semestr_id' => 'id']);
    }

    /**
     * Gets query for [[StudentMarks]].
     *
     * @return \yii\db\ActiveQuery|StudentMarkQuery
     */
    public function getStudentMarks()
    {
        return $this->hasMany(StudentMark::className(), ['edu_semestr_id' => 'id']);
    }

    /**
     * Gets query for [[StudentSubjectRestricts]].
     *
     * @return \yii\db\ActiveQuery|StudentSubjectRestrictQuery
     */
    public function getStudentSubjectRestricts()
    {
        return $this->hasMany(StudentSubjectRestrict::className(), ['edu_semestr_id' => 'id']);
    }

    /**
     * Gets query for [[StudentSubjectSelection16s]].
     *
     * @return \yii\db\ActiveQuery|StudentSubjectSelection16Query
     */
    public function getStudentSubjectSelection16s()
    {
        return $this->hasMany(StudentSubjectSelection16::className(), ['edu_semester_id' => 'id']);
    }

    /**
     * Gets query for [[StudentSubjectSelections]].
     *
     * @return \yii\db\ActiveQuery|StudentSubjectSelectionQuery
     */
    public function getStudentSubjectSelections()
    {
        return $this->hasMany(StudentSubjectSelection::className(), ['edu_semester_id' => 'id']);
    }

    /**
     * Gets query for [[StudentTimeOption16s]].
     *
     * @return \yii\db\ActiveQuery|StudentTimeOption16Query
     */
    public function getStudentTimeOption16s()
    {
        return $this->hasMany(StudentTimeOption16::className(), ['edu_semester_id' => 'id']);
    }

    /**
     * Gets query for [[StudentTimeOptions]].
     *
     * @return \yii\db\ActiveQuery|StudentTimeOptionQuery
     */
    public function getStudentTimeOptions()
    {
        return $this->hasMany(StudentTimeOption::className(), ['edu_semester_id' => 'id']);
    }

    /**
     * Gets query for [[TimeOption16s]].
     *
     * @return \yii\db\ActiveQuery|TimeOption16Query
     */
    public function getTimeOption16s()
    {
        return $this->hasMany(TimeOption16::className(), ['edu_semester_id' => 'id']);
    }

    /**
     * Gets query for [[TimeOptions]].
     *
     * @return \yii\db\ActiveQuery|TimeOptionQuery
     */
    public function getTimeOptions()
    {
        return $this->hasMany(TimeOption::className(), ['edu_semester_id' => 'id']);
    }

    /**
     * Gets query for [[TimeTable16s]].
     *
     * @return \yii\db\ActiveQuery|TimeTable16Query
     */
    public function getTimeTable16s()
    {
        return $this->hasMany(TimeTable16::className(), ['edu_semester_id' => 'id']);
    }

    /**
     * Gets query for [[TimeTables]].
     *
     * @return \yii\db\ActiveQuery|TimeTableQuery
     */
    public function getTimeTables()
    {
        return $this->hasMany(TimeTable::className(), ['edu_semester_id' => 'id']);
    }

    /**
     * EduSemestr createItem <$model, $post>
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
     * EduSemestr updateItem <$model, $post>
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
     * @return EduSemestrQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EduSemestrQuery(get_called_class());
    }

    
    public function beforeSave($insert)
    {
        if ($insert) {
            $this->created_by = Current_user_id();
        } else {
            $this->updated_by = Current_user_id();
        }
        return parent::beforeSave($insert);
    }
}
