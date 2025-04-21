<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%student_mark}}".
 *
 * @property int $id
 * @property int $student_id
 * @property int $subject_id
 * @property int $edu_semestr_id
 * @property int $edu_semestr_subject_id
 * @property int|null $course_id
 * @property int|null $semestr_id
 * @property int|null $edu_year_id
 * @property int|null $faculty_id
 * @property int|null $edu_plan_id
 * @property float|null $exam_control_student_ball
 * @property float|null $exam_control_student_ball2
 * @property float|null $exam_student_ball
 * @property float|null $ball
 * @property string|null $description
 * @property string|null $data
 * @property int|null $attempt
 * @property int|null $status
 * @property int|null $is_deleted
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $edu_lang_id
 * @property string|null $alphabet
 * @property string|null $mark
 * @property int|null $order
 *
 * @property Course $course
 * @property EduPlan $eduPlan
 * @property EduSemestr $eduSemestr
 * @property EduSemestrSubject $eduSemestrSubject
 * @property EduYear $eduYear
 * @property Faculty $faculty
 * @property Semestr $semestr
 * @property Student $student
 * @property Subject $subject
 */
class StudentMark extends \yii\db\ActiveRecord
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
        return '{{%student_mark}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'subject_id', 'edu_semestr_id', 'edu_semestr_subject_id'], 'required'],
            [['student_id', 'subject_id', 'edu_semestr_id', 'edu_semestr_subject_id', 'course_id', 'semestr_id', 'edu_year_id', 'faculty_id', 'edu_plan_id', 'attempt', 'status', 'is_deleted', 'created_at', 'updated_at', 'created_by', 'updated_by', 'edu_lang_id', 'order'], 'integer'],
            [['exam_control_student_ball', 'exam_control_student_ball2', 'exam_student_ball', 'ball'], 'number'],
            [['description'], 'string'],
            [['data'], 'safe'],
            [['alphabet', 'mark'], 'string', 'max' => 255],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['edu_plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduPlan::className(), 'targetAttribute' => ['edu_plan_id' => 'id']],
            [['edu_semestr_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduSemestr::className(), 'targetAttribute' => ['edu_semestr_id' => 'id']],
            [['edu_semestr_subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduSemestrSubject::className(), 'targetAttribute' => ['edu_semestr_subject_id' => 'id']],
            [['edu_year_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduYear::className(), 'targetAttribute' => ['edu_year_id' => 'id']],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_id' => 'id']],
            [['semestr_id'], 'exist', 'skipOnError' => true, 'targetClass' => Semestr::className(), 'targetAttribute' => ['semestr_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'student_id' => Yii::t('app', 'Student ID'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'edu_semestr_id' => Yii::t('app', 'Edu Semestr ID'),
            'edu_semestr_subject_id' => Yii::t('app', 'Edu Semestr Subject ID'),
            'course_id' => Yii::t('app', 'Course ID'),
            'semestr_id' => Yii::t('app', 'Semestr ID'),
            'edu_year_id' => Yii::t('app', 'Edu Year ID'),
            'faculty_id' => Yii::t('app', 'Faculty ID'),
            'edu_plan_id' => Yii::t('app', 'Edu Plan ID'),
            'exam_control_student_ball' => Yii::t('app', 'Exam Control Student Ball'),
            'exam_control_student_ball2' => Yii::t('app', 'Exam Control Student Ball2'),
            'exam_student_ball' => Yii::t('app', 'Exam Student Ball'),
            'ball' => Yii::t('app', 'Ball'),
            'description' => Yii::t('app', 'Description'),
            'data' => Yii::t('app', 'Data'),
            'attempt' => Yii::t('app', 'Attempt'),
            'status' => Yii::t('app', 'Status'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'edu_lang_id' => Yii::t('app', 'Edu Lang ID'),
            'alphabet' => Yii::t('app', 'Alphabet'),
            'mark' => Yii::t('app', 'Mark'),
            'order' => Yii::t('app', 'Order'),
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function fields()
    {
        $fields =  [
            'id',
            'student_id',
            'subject_id',
            'edu_semestr_id',
            'edu_semestr_subject_id',
            'course_id',
            'semestr_id',
            'edu_year_id',
            'faculty_id',
            'edu_plan_id',
            'exam_control_student_ball',
            'exam_control_student_ball2',
            'exam_student_ball',
            'ball',
            'description',
            'data',
            'attempt',
            'status',
            'is_deleted',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'edu_lang_id',
            'alphabet',
            'mark',
            'order',
        ];
        return $fields;
    }

    public function extraFields()
    {
        $extraFields =  [
            'course',
            'eduPlan',
            'eduSemestr',
            'eduSemestrSubject',
            'eduYear',
            'faculty',
            'semestr',
            'student',
            'subject',
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
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
     * Gets query for [[EduSemestr]].
     *
     * @return \yii\db\ActiveQuery|EduSemestrQuery
     */
    public function getEduSemestr()
    {
        return $this->hasOne(EduSemestr::className(), ['id' => 'edu_semestr_id']);
    }

    /**
     * Gets query for [[EduSemestrSubject]].
     *
     * @return \yii\db\ActiveQuery|EduSemestrSubjectQuery
     */
    public function getEduSemestrSubject()
    {
        return $this->hasOne(EduSemestrSubject::className(), ['id' => 'edu_semestr_subject_id']);
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
     * Gets query for [[Semestr]].
     *
     * @return \yii\db\ActiveQuery|SemestrQuery
     */
    public function getSemestr()
    {
        return $this->hasOne(Semestr::className(), ['id' => 'semestr_id']);
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
     * StudentMark createItem <$model, $post>
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
     * StudentMark updateItem <$model, $post>
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
     * @return StudentMarkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StudentMarkQuery(get_called_class());
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
