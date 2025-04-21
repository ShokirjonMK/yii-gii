<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%faculty}}".
 *
 * @property int $id
 * @property int|null $order
 * @property int|null $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $is_deleted
 * @property int|null $user_id Lead of faculty or Dean (dekan)
 *
 * @property AttendReason[] $attendReasons
 * @property Attend[] $attends
 * @property AttentAccess[] $attentAccesses
 * @property Direction[] $directions
 * @property EduPlan[] $eduPlans
 * @property EduSemestrSubject[] $eduSemestrSubjects
 * @property Exam[] $exams
 * @property Kafedra[] $kafedras
 * @property StudentAttend[] $studentAttends
 * @property StudentClub[] $studentClubs
 * @property StudentSubjectSelection[] $studentSubjectSelections
 * @property StudentTimeOption[] $studentTimeOptions
 * @property Student[] $students
 * @property TimeOption[] $timeOptions
 * @property User $user
 */
class Faculty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%faculty}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted', 'user_id'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order' => Yii::t('app', 'Order'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'user_id' => Yii::t('app', 'Lead of faculty or Dean (dekan)'),
        ];
    }

    /**
     * Gets query for [[AttendReasons]].
     *
     * @return \yii\db\ActiveQuery|AttendReasonQuery
     */
    public function getAttendReasons()
    {
        return $this->hasMany(AttendReason::className(), ['faculty_id' => 'id']);
    }

    /**
     * Gets query for [[Attends]].
     *
     * @return \yii\db\ActiveQuery|AttendQuery
     */
    public function getAttends()
    {
        return $this->hasMany(Attend::className(), ['faculty_id' => 'id']);
    }

    /**
     * Gets query for [[AttentAccesses]].
     *
     * @return \yii\db\ActiveQuery|AttentAccessQuery
     */
    public function getAttentAccesses()
    {
        return $this->hasMany(AttentAccess::className(), ['faculty_id' => 'id']);
    }

    /**
     * Gets query for [[Directions]].
     *
     * @return \yii\db\ActiveQuery|DirectionQuery
     */
    public function getDirections()
    {
        return $this->hasMany(Direction::className(), ['faculty_id' => 'id']);
    }

    /**
     * Gets query for [[EduPlans]].
     *
     * @return \yii\db\ActiveQuery|EduPlanQuery
     */
    public function getEduPlans()
    {
        return $this->hasMany(EduPlan::className(), ['faculty_id' => 'id']);
    }

    /**
     * Gets query for [[EduSemestrSubjects]].
     *
     * @return \yii\db\ActiveQuery|EduSemestrSubjectQuery
     */
    public function getEduSemestrSubjects()
    {
        return $this->hasMany(EduSemestrSubject::className(), ['faculty_id' => 'id']);
    }

    /**
     * Gets query for [[Exams]].
     *
     * @return \yii\db\ActiveQuery|ExamQuery
     */
    public function getExams()
    {
        return $this->hasMany(Exam::className(), ['faculty_id' => 'id']);
    }

    /**
     * Gets query for [[Kafedras]].
     *
     * @return \yii\db\ActiveQuery|KafedraQuery
     */
    public function getKafedras()
    {
        return $this->hasMany(Kafedra::className(), ['faculty_id' => 'id']);
    }

    /**
     * Gets query for [[StudentAttends]].
     *
     * @return \yii\db\ActiveQuery|StudentAttendQuery
     */
    public function getStudentAttends()
    {
        return $this->hasMany(StudentAttend::className(), ['faculty_id' => 'id']);
    }

    /**
     * Gets query for [[StudentClubs]].
     *
     * @return \yii\db\ActiveQuery|StudentClubQuery
     */
    public function getStudentClubs()
    {
        return $this->hasMany(StudentClub::className(), ['faculty_id' => 'id']);
    }

    /**
     * Gets query for [[StudentSubjectSelections]].
     *
     * @return \yii\db\ActiveQuery|StudentSubjectSelectionQuery
     */
    public function getStudentSubjectSelections()
    {
        return $this->hasMany(StudentSubjectSelection::className(), ['faculty_id' => 'id']);
    }

    /**
     * Gets query for [[StudentTimeOptions]].
     *
     * @return \yii\db\ActiveQuery|StudentTimeOptionQuery
     */
    public function getStudentTimeOptions()
    {
        return $this->hasMany(StudentTimeOption::className(), ['faculty_id' => 'id']);
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery|StudentQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['faculty_id' => 'id']);
    }

    /**
     * Gets query for [[TimeOptions]].
     *
     * @return \yii\db\ActiveQuery|TimeOptionQuery
     */
    public function getTimeOptions()
    {
        return $this->hasMany(TimeOption::className(), ['faculty_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return FacultyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FacultyQuery(get_called_class());
    }
}
