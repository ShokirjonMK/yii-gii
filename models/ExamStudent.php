<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%exam_student}}".
 *
 * @property int $id
 * @property int|null $archived
 * @property int|null $student_mark_id
 * @property string|null $is_checked_full_c is_checked_full_c
 * @property string|null $has_answer_c
 * @property int $student_id
 * @property int $exam_id
 * @property int|null $teacher_access_id
 * @property float|null $on1 oraliq 1
 * @property float|null $on2 oraliq 2
 * @property float|null $in_ball oraliq bal
 * @property float|null $ball
 * @property int|null $type 1 ielts 2 nogiron masalan
 * @property int|null $main_ball
 * @property int|null $attempt Nechinchi marta topshirayotgani
 * @property int|null $order
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $is_deleted
 * @property int|null $lang_id
 * @property int|null $start
 * @property int|null $duration
 * @property int|null $finish
 * @property string|null $password
 * @property int|null $exam_semeta_id exam_semeta id
 * @property string|null $conclusion umumiy xulosa
 * @property string|null $plagiat_file fayl
 * @property float|null $plagiat_percent foyizi
 * @property int|null $is_plagiat 0-plagiat emas, 1-plagiat
 * @property int|null $act 1 act tuzilgan imtihon qodalarini bizgan
 * @property string|null $act_reason
 * @property string|null $act_file
 * @property int|null $is_checked tekshirilganligi
 * @property int|null $is_checked_full toliq tekshirilhanligi
 * @property int|null $has_answer javob yozilganligi
 * @property int|null $edu_year_id talim yili
 * @property int|null $subject_id
 * @property int|null $edu_semestr_subject_id
 *
 * @property Exam $exam
 * @property ExamAppeal[] $examAppeals
 * @property ExamSemetum $examSemeta
 * @property ExamStudentReaxam[] $examStudentReaxams
 * @property ExamStudentReexam[] $examStudentReexams
 * @property Student $student
 * @property TeacherAccess $teacherAccess
 */
class ExamStudent extends \yii\db\ActiveRecord
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
        return '{{%exam_student}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['archived', 'student_mark_id', 'student_id', 'exam_id', 'teacher_access_id', 'type', 'main_ball', 'attempt', 'order', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted', 'lang_id', 'start', 'duration', 'finish', 'exam_semeta_id', 'is_plagiat', 'act', 'is_checked', 'is_checked_full', 'has_answer', 'edu_year_id', 'subject_id', 'edu_semestr_subject_id'], 'integer'],
            [['student_id', 'exam_id'], 'required'],
            [['on1', 'on2', 'in_ball', 'ball', 'plagiat_percent'], 'number'],
            [['conclusion'], 'string'],
            [['is_checked_full_c', 'has_answer_c', 'plagiat_file', 'act_reason', 'act_file'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 33],
            [['exam_semeta_id'], 'exist', 'skipOnError' => true, 'targetClass' => ExamSemetum::className(), 'targetAttribute' => ['exam_semeta_id' => 'id']],
            [['exam_id'], 'exist', 'skipOnError' => true, 'targetClass' => Exam::className(), 'targetAttribute' => ['exam_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
            [['teacher_access_id'], 'exist', 'skipOnError' => true, 'targetClass' => TeacherAccess::className(), 'targetAttribute' => ['teacher_access_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'archived' => Yii::t('app', 'Archived'),
            'student_mark_id' => Yii::t('app', 'Student Mark ID'),
            'is_checked_full_c' => Yii::t('app', 'is_checked_full_c'),
            'has_answer_c' => Yii::t('app', 'Has Answer C'),
            'student_id' => Yii::t('app', 'Student ID'),
            'exam_id' => Yii::t('app', 'Exam ID'),
            'teacher_access_id' => Yii::t('app', 'Teacher Access ID'),
            'on1' => Yii::t('app', 'oraliq 1'),
            'on2' => Yii::t('app', 'oraliq 2'),
            'in_ball' => Yii::t('app', 'oraliq bal'),
            'ball' => Yii::t('app', 'Ball'),
            'type' => Yii::t('app', '1 ielts 2 nogiron masalan'),
            'main_ball' => Yii::t('app', 'Main Ball'),
            'attempt' => Yii::t('app', 'Nechinchi marta topshirayotgani'),
            'order' => Yii::t('app', 'Order'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'lang_id' => Yii::t('app', 'Lang ID'),
            'start' => Yii::t('app', 'Start'),
            'duration' => Yii::t('app', 'Duration'),
            'finish' => Yii::t('app', 'Finish'),
            'password' => Yii::t('app', 'Password'),
            'exam_semeta_id' => Yii::t('app', 'exam_semeta id'),
            'conclusion' => Yii::t('app', 'umumiy xulosa'),
            'plagiat_file' => Yii::t('app', 'fayl'),
            'plagiat_percent' => Yii::t('app', 'foyizi'),
            'is_plagiat' => Yii::t('app', '0-plagiat emas, 1-plagiat'),
            'act' => Yii::t('app', '1 act tuzilgan imtihon qodalarini bizgan'),
            'act_reason' => Yii::t('app', 'Act Reason'),
            'act_file' => Yii::t('app', 'Act File'),
            'is_checked' => Yii::t('app', 'tekshirilganligi'),
            'is_checked_full' => Yii::t('app', 'toliq tekshirilhanligi'),
            'has_answer' => Yii::t('app', 'javob yozilganligi'),
            'edu_year_id' => Yii::t('app', 'talim yili'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'edu_semestr_subject_id' => Yii::t('app', 'Edu Semestr Subject ID'),
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function fields()
    {
        $fields =  [
            'id',
            'archived',
            'student_mark_id',
            'is_checked_full_c',
            'has_answer_c',
            'student_id',
            'exam_id',
            'teacher_access_id',
            'on1',
            'on2',
            'in_ball',
            'ball',
            'type',
            'main_ball',
            'attempt',
            'order',
            'status',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'is_deleted',
            'lang_id',
            'start',
            'duration',
            'finish',
            'password',
            'exam_semeta_id',
            'conclusion',
            'plagiat_file',
            'plagiat_percent',
            'is_plagiat',
            'act',
            'act_reason',
            'act_file',
            'is_checked',
            'is_checked_full',
            'has_answer',
            'edu_year_id',
            'subject_id',
            'edu_semestr_subject_id',
        ];
        return $fields;
    }

    public function extraFields()
    {
        $extraFields =  [
            'exam',
            'examAppeals',
            'examSemeta',
            'examStudentReaxams',
            'examStudentReexams',
            'student',
            'teacherAccess',
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
    }    
    
    
    /**
     * Gets query for [[Exam]].
     *
     * @return \yii\db\ActiveQuery|ExamQuery
     */
    public function getExam()
    {
        return $this->hasOne(Exam::className(), ['id' => 'exam_id']);
    }

    /**
     * Gets query for [[ExamAppeals]].
     *
     * @return \yii\db\ActiveQuery|ExamAppealQuery
     */
    public function getExamAppeals()
    {
        return $this->hasMany(ExamAppeal::className(), ['exam_student_id' => 'id']);
    }

    /**
     * Gets query for [[ExamSemeta]].
     *
     * @return \yii\db\ActiveQuery|ExamSemetumQuery
     */
    public function getExamSemeta()
    {
        return $this->hasOne(ExamSemetum::className(), ['id' => 'exam_semeta_id']);
    }

    /**
     * Gets query for [[ExamStudentReaxams]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getExamStudentReaxams()
    {
        return $this->hasMany(ExamStudentReaxam::className(), ['exam_student_id' => 'id']);
    }

    /**
     * Gets query for [[ExamStudentReexams]].
     *
     * @return \yii\db\ActiveQuery|ExamStudentReexamQuery
     */
    public function getExamStudentReexams()
    {
        return $this->hasMany(ExamStudentReexam::className(), ['exam_student_id' => 'id']);
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
     * Gets query for [[TeacherAccess]].
     *
     * @return \yii\db\ActiveQuery|TeacherAccessQuery
     */
    public function getTeacherAccess()
    {
        return $this->hasOne(TeacherAccess::className(), ['id' => 'teacher_access_id']);
    }

    /**
     * ExamStudent createItem <$model, $post>
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
     * ExamStudent updateItem <$model, $post>
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
     * @return ExamStudentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ExamStudentQuery(get_called_class());
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
