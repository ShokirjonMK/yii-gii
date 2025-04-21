<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%edu_year}}".
 *
 * @property int $id
 * @property string $year
 * @property int|null $type
 * @property int|null $order
 * @property int|null $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $is_deleted
 *
 * @property Attend[] $attends
 * @property AttentAccess[] $attentAccesses
 * @property Cantract[] $cantracts
 * @property EduPlan[] $eduPlans
 * @property EduSemestr[] $eduSemestrs
 * @property KpiMark[] $kpiMarks
 * @property StudentAttend[] $studentAttends
 * @property StudentTimeOption[] $studentTimeOptions
 * @property Student[] $students
 * @property TeacherCheckingType[] $teacherCheckingTypes
 * @property TimeOption[] $timeOptions
 * @property TimeTable[] $timeTables
 */
class EduYear extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%edu_year}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year', 'created_at', 'updated_at'], 'required'],
            [['year'], 'safe'],
            [['type', 'order', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['year'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'year' => Yii::t('app', 'Year'),
            'type' => Yii::t('app', 'Type'),
            'order' => Yii::t('app', 'Order'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
        ];
    }

    /**
     * Gets query for [[Attends]].
     *
     * @return \yii\db\ActiveQuery|AttendQuery
     */
    public function getAttends()
    {
        return $this->hasMany(Attend::className(), ['edu_year_id' => 'id']);
    }

    /**
     * Gets query for [[AttentAccesses]].
     *
     * @return \yii\db\ActiveQuery|AttentAccessQuery
     */
    public function getAttentAccesses()
    {
        return $this->hasMany(AttentAccess::className(), ['edu_year_id' => 'id']);
    }

    /**
     * Gets query for [[Cantracts]].
     *
     * @return \yii\db\ActiveQuery|CantractQuery
     */
    public function getCantracts()
    {
        return $this->hasMany(Cantract::className(), ['edu_year_id' => 'id']);
    }

    /**
     * Gets query for [[EduPlans]].
     *
     * @return \yii\db\ActiveQuery|EduPlanQuery
     */
    public function getEduPlans()
    {
        return $this->hasMany(EduPlan::className(), ['edu_year_id' => 'id']);
    }

    /**
     * Gets query for [[EduSemestrs]].
     *
     * @return \yii\db\ActiveQuery|EduSemestrQuery
     */
    public function getEduSemestrs()
    {
        return $this->hasMany(EduSemestr::className(), ['edu_year_id' => 'id']);
    }

    /**
     * Gets query for [[KpiMarks]].
     *
     * @return \yii\db\ActiveQuery|KpiMarkQuery
     */
    public function getKpiMarks()
    {
        return $this->hasMany(KpiMark::className(), ['edu_year_id' => 'id']);
    }

    /**
     * Gets query for [[StudentAttends]].
     *
     * @return \yii\db\ActiveQuery|StudentAttendQuery
     */
    public function getStudentAttends()
    {
        return $this->hasMany(StudentAttend::className(), ['edu_year_id' => 'id']);
    }

    /**
     * Gets query for [[StudentTimeOptions]].
     *
     * @return \yii\db\ActiveQuery|StudentTimeOptionQuery
     */
    public function getStudentTimeOptions()
    {
        return $this->hasMany(StudentTimeOption::className(), ['edu_year_id' => 'id']);
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery|StudentQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['edu_year_id' => 'id']);
    }

    /**
     * Gets query for [[TeacherCheckingTypes]].
     *
     * @return \yii\db\ActiveQuery|TeacherCheckingTypeQuery
     */
    public function getTeacherCheckingTypes()
    {
        return $this->hasMany(TeacherCheckingType::className(), ['edu_year_id' => 'id']);
    }

    /**
     * Gets query for [[TimeOptions]].
     *
     * @return \yii\db\ActiveQuery|TimeOptionQuery
     */
    public function getTimeOptions()
    {
        return $this->hasMany(TimeOption::className(), ['edu_year_id' => 'id']);
    }

    /**
     * Gets query for [[TimeTables]].
     *
     * @return \yii\db\ActiveQuery|TimeTableQuery
     */
    public function getTimeTables()
    {
        return $this->hasMany(TimeTable::className(), ['edu_year_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return EduYearQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EduYearQuery(get_called_class());
    }
}
