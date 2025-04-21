<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%attend_reason}}".
 *
 * @property int $id
 * @property string $start
 * @property string $end
 * @property int $student_id
 * @property int|null $subject_id
 * @property int|null $faculty_id
 * @property int|null $edu_plan_id
 * @property string|null $file
 * @property int|null $status
 * @property int|null $order
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $is_deleted
 *
 * @property StudentAttend[] $studentAttends
 */
class AttendReason extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%attend_reason}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['start', 'end', 'student_id'], 'required'],
            [['start', 'end'], 'safe'],
            [['student_id', 'subject_id', 'faculty_id', 'edu_plan_id', 'status', 'order', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['file'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'start' => Yii::t('app', 'Start'),
            'end' => Yii::t('app', 'End'),
            'student_id' => Yii::t('app', 'Student ID'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'faculty_id' => Yii::t('app', 'Faculty ID'),
            'edu_plan_id' => Yii::t('app', 'Edu Plan ID'),
            'file' => Yii::t('app', 'File'),
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
     * Gets query for [[StudentAttends]].
     *
     * @return \yii\db\ActiveQuery|StudentAttendQuery
     */
    public function getStudentAttends()
    {
        return $this->hasMany(StudentAttend::className(), ['attend_reason_id' => 'id']);
    }

    /**
     * AttendReason createItem <$model, $post>
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
     * AttendReason updateItem <$model, $post>
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
     * @return AttendReasonQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AttendReasonQuery(get_called_class());
    }
}
