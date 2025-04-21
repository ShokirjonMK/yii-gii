<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%poll_user}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $poll_id
 * @property int $poll_question_id
 * @property int|null $poll_question_option_id
 * @property string|null $poll_question_option_answer
 * @property string|null $answer
 * @property int|null $student_id
 * @property int|null $faculty_id
 * @property int|null $edu_form_id
 * @property int|null $order
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $is_deleted
 *
 * @property EduForm $eduForm
 * @property Faculty $faculty
 * @property Poll $poll
 * @property PollQuestion $pollQuestion
 * @property PollQuestionOption $pollQuestionOption
 * @property Student $student
 * @property Users $user
 */
class PollUser extends \yii\db\ActiveRecord
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
        return '{{%poll_user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'poll_id', 'poll_question_id'], 'required'],
            [['user_id', 'poll_id', 'poll_question_id', 'poll_question_option_id', 'student_id', 'faculty_id', 'edu_form_id', 'order', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['poll_question_option_answer', 'answer'], 'string'],
            [['edu_form_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduForm::className(), 'targetAttribute' => ['edu_form_id' => 'id']],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_id' => 'id']],
            [['poll_id'], 'exist', 'skipOnError' => true, 'targetClass' => Poll::className(), 'targetAttribute' => ['poll_id' => 'id']],
            [['poll_question_id'], 'exist', 'skipOnError' => true, 'targetClass' => PollQuestion::className(), 'targetAttribute' => ['poll_question_id' => 'id']],
            [['poll_question_option_id'], 'exist', 'skipOnError' => true, 'targetClass' => PollQuestionOption::className(), 'targetAttribute' => ['poll_question_option_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'poll_id' => Yii::t('app', 'Poll ID'),
            'poll_question_id' => Yii::t('app', 'Poll Question ID'),
            'poll_question_option_id' => Yii::t('app', 'Poll Question Option ID'),
            'poll_question_option_answer' => Yii::t('app', 'Poll Question Option Answer'),
            'answer' => Yii::t('app', 'Answer'),
            'student_id' => Yii::t('app', 'Student ID'),
            'faculty_id' => Yii::t('app', 'Faculty ID'),
            'edu_form_id' => Yii::t('app', 'Edu Form ID'),
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
     * {@inheritdoc}
     */
    public function fields()
    {
        $fields =  [
            'id',
            'user_id',
            'poll_id',
            'poll_question_id',
            'poll_question_option_id',
            'poll_question_option_answer',
            'answer',
            'student_id',
            'faculty_id',
            'edu_form_id',
            'order',
            'status',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'is_deleted',
        ];
        return $fields;
    }

    public function extraFields()
    {
        $extraFields =  [
            'eduForm',
            'faculty',
            'poll',
            'pollQuestion',
            'pollQuestionOption',
            'student',
            'user',
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
    }    
    
    
    /**
     * Gets query for [[EduForm]].
     *
     * @return \yii\db\ActiveQuery|EduFormQuery
     */
    public function getEduForm()
    {
        return $this->hasOne(EduForm::className(), ['id' => 'edu_form_id']);
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
     * Gets query for [[Poll]].
     *
     * @return \yii\db\ActiveQuery|PollQuery
     */
    public function getPoll()
    {
        return $this->hasOne(Poll::className(), ['id' => 'poll_id']);
    }

    /**
     * Gets query for [[PollQuestion]].
     *
     * @return \yii\db\ActiveQuery|PollQuestionQuery
     */
    public function getPollQuestion()
    {
        return $this->hasOne(PollQuestion::className(), ['id' => 'poll_question_id']);
    }

    /**
     * Gets query for [[PollQuestionOption]].
     *
     * @return \yii\db\ActiveQuery|PollQuestionOptionQuery
     */
    public function getPollQuestionOption()
    {
        return $this->hasOne(PollQuestionOption::className(), ['id' => 'poll_question_option_id']);
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UsersQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * PollUser createItem <$model, $post>
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
     * PollUser updateItem <$model, $post>
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
     * @return PollUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PollUserQuery(get_called_class());
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
