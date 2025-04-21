<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%subject_evaluation}}".
 *
 * @property int $id
 * @property int $subject_id
 * @property string|null $control_submission
 * @property string|null $control_assessment
 * @property string|null $final_submission
 * @property string|null $final_assessment
 * @property string|null $control_submission_ru
 * @property string|null $control_assessment_ru
 * @property string|null $final_submission_ru
 * @property string|null $final_assessment_ru
 * @property string|null $control_submission_en
 * @property string|null $control_assessment_en
 * @property string|null $final_submission_en
 * @property string|null $final_assessment_en
 * @property int|null $order
 * @property int|null $status
 * @property int|null $is_deleted
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $archived
 *
 * @property Subject $subject
 */
class SubjectEvaluation extends \yii\db\ActiveRecord
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
        return '{{%subject_evaluation}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id'], 'required'],
            [['subject_id', 'order', 'status', 'is_deleted', 'created_at', 'updated_at', 'created_by', 'updated_by', 'archived'], 'integer'],
            [['control_submission', 'control_assessment', 'final_submission', 'final_assessment', 'control_submission_ru', 'control_assessment_ru', 'final_submission_ru', 'final_assessment_ru', 'control_submission_en', 'control_assessment_en', 'final_submission_en', 'final_assessment_en'], 'string'],
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
            'subject_id' => Yii::t('app', 'Subject ID'),
            'control_submission' => Yii::t('app', 'Control Submission'),
            'control_assessment' => Yii::t('app', 'Control Assessment'),
            'final_submission' => Yii::t('app', 'Final Submission'),
            'final_assessment' => Yii::t('app', 'Final Assessment'),
            'control_submission_ru' => Yii::t('app', 'Control Submission Ru'),
            'control_assessment_ru' => Yii::t('app', 'Control Assessment Ru'),
            'final_submission_ru' => Yii::t('app', 'Final Submission Ru'),
            'final_assessment_ru' => Yii::t('app', 'Final Assessment Ru'),
            'control_submission_en' => Yii::t('app', 'Control Submission En'),
            'control_assessment_en' => Yii::t('app', 'Control Assessment En'),
            'final_submission_en' => Yii::t('app', 'Final Submission En'),
            'final_assessment_en' => Yii::t('app', 'Final Assessment En'),
            'order' => Yii::t('app', 'Order'),
            'status' => Yii::t('app', 'Status'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'archived' => Yii::t('app', 'Archived'),
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function fields()
    {
        $fields =  [
            'id',
            'subject_id',
            'control_submission',
            'control_assessment',
            'final_submission',
            'final_assessment',
            'control_submission_ru',
            'control_assessment_ru',
            'final_submission_ru',
            'final_assessment_ru',
            'control_submission_en',
            'control_assessment_en',
            'final_submission_en',
            'final_assessment_en',
            'order',
            'status',
            'is_deleted',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'archived',
        ];
        return $fields;
    }

    public function extraFields()
    {
        $extraFields =  [
            'subject',
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
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
     * SubjectEvaluation createItem <$model, $post>
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
     * SubjectEvaluation updateItem <$model, $post>
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
     * @return SubjectEvaluationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SubjectEvaluationQuery(get_called_class());
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
