<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%exam_control_student_history}}".
 *
 * @property int $id
 * @property int $exam_control_student_id
 * @property string $data
 * @property int $created_at Creation timestamp
 * @property int $updated_at Update timestamp
 * @property int $created_by ID of the user who created the record
 * @property int $updated_by ID of the user who last updated the record
 *
 * @property ExamControlStudent $examControlStudent
 */
class ExamControlStudentHistory extends \yii\db\ActiveRecord
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
        return '{{%exam_control_student_history}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['exam_control_student_id', 'data'], 'required'],
            [['exam_control_student_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['data'], 'safe'],
            [['exam_control_student_id'], 'exist', 'skipOnError' => true, 'targetClass' => ExamControlStudent::className(), 'targetAttribute' => ['exam_control_student_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'exam_control_student_id' => Yii::t('app', 'Exam Control Student ID'),
            'data' => Yii::t('app', 'Data'),
            'created_at' => Yii::t('app', 'Creation timestamp'),
            'updated_at' => Yii::t('app', 'Update timestamp'),
            'created_by' => Yii::t('app', 'ID of the user who created the record'),
            'updated_by' => Yii::t('app', 'ID of the user who last updated the record'),
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function fields()
    {
        $fields =  [
            'id',
            'exam_control_student_id',
            'data',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ];
        return $fields;
    }

    public function extraFields()
    {
        $extraFields =  [
            'examControlStudent',
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
    }    
    
    
    /**
     * Gets query for [[ExamControlStudent]].
     *
     * @return \yii\db\ActiveQuery|ExamControlStudentQuery
     */
    public function getExamControlStudent()
    {
        return $this->hasOne(ExamControlStudent::className(), ['id' => 'exam_control_student_id']);
    }

    /**
     * ExamControlStudentHistory createItem <$model, $post>
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
     * ExamControlStudentHistory updateItem <$model, $post>
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
     * @return ExamControlStudentHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ExamControlStudentHistoryQuery(get_called_class());
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
