<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%subject}}".
 *
 * @property int $id
 * @property int $kafedra_id
 * @property int|null $order
 * @property int|null $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $is_deleted
 * @property int|null $semestr_id fanga smester
 * @property int|null $parent_id fanga parent
 *
 * @property EduSemestrSubject[] $eduSemestrSubjects
 * @property Kafedra $kafedra
 * @property Question[] $questions
 * @property Semestr $semestr
 * @property SubjectAccess[] $subjectAccesses
 * @property SubjectContentMark[] $subjectContentMarks
 * @property SubjectSillabus[] $subjectSillabuses
 * @property SubjectTopicReference[] $subjectTopicReferences
 * @property SubjectTopic[] $subjectTopics
 * @property SurveyAnswer[] $surveyAnswers
 * @property TeacherAccess[] $teacherAccesses
 * @property TimeTable[] $timeTables
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%subject}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kafedra_id', 'created_at', 'updated_at'], 'required'],
            [['kafedra_id', 'order', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted', 'semestr_id', 'parent_id'], 'integer'],
            [['kafedra_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kafedra::className(), 'targetAttribute' => ['kafedra_id' => 'id']],
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
            'kafedra_id' => Yii::t('app', 'Kafedra ID'),
            'order' => Yii::t('app', 'Order'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'semestr_id' => Yii::t('app', 'fanga smester'),
            'parent_id' => Yii::t('app', 'fanga parent'),
        ];
    }

    /**
     * Gets query for [[EduSemestrSubjects]].
     *
     * @return \yii\db\ActiveQuery|EduSemestrSubjectQuery
     */
    public function getEduSemestrSubjects()
    {
        return $this->hasMany(EduSemestrSubject::className(), ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[Kafedra]].
     *
     * @return \yii\db\ActiveQuery|KafedraQuery
     */
    public function getKafedra()
    {
        return $this->hasOne(Kafedra::className(), ['id' => 'kafedra_id']);
    }

    /**
     * Gets query for [[Questions]].
     *
     * @return \yii\db\ActiveQuery|QuestionQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['subject_id' => 'id']);
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
     * Gets query for [[SubjectAccesses]].
     *
     * @return \yii\db\ActiveQuery|SubjectAccessQuery
     */
    public function getSubjectAccesses()
    {
        return $this->hasMany(SubjectAccess::className(), ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[SubjectContentMarks]].
     *
     * @return \yii\db\ActiveQuery|SubjectContentMarkQuery
     */
    public function getSubjectContentMarks()
    {
        return $this->hasMany(SubjectContentMark::className(), ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[SubjectSillabuses]].
     *
     * @return \yii\db\ActiveQuery|SubjectSillabusQuery
     */
    public function getSubjectSillabuses()
    {
        return $this->hasMany(SubjectSillabus::className(), ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[SubjectTopicReferences]].
     *
     * @return \yii\db\ActiveQuery|SubjectTopicReferenceQuery
     */
    public function getSubjectTopicReferences()
    {
        return $this->hasMany(SubjectTopicReference::className(), ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[SubjectTopics]].
     *
     * @return \yii\db\ActiveQuery|SubjectTopicQuery
     */
    public function getSubjectTopics()
    {
        return $this->hasMany(SubjectTopic::className(), ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[SurveyAnswers]].
     *
     * @return \yii\db\ActiveQuery|SurveyAnswerQuery
     */
    public function getSurveyAnswers()
    {
        return $this->hasMany(SurveyAnswer::className(), ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[TeacherAccesses]].
     *
     * @return \yii\db\ActiveQuery|TeacherAccessQuery
     */
    public function getTeacherAccesses()
    {
        return $this->hasMany(TeacherAccess::className(), ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[TimeTables]].
     *
     * @return \yii\db\ActiveQuery|TimeTableQuery
     */
    public function getTimeTables()
    {
        return $this->hasMany(TimeTable::className(), ['subject_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return SubjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SubjectQuery(get_called_class());
    }
}
