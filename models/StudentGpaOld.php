<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%student_gpa_old}}".
 *
 * @property int $id
 * @property string|null $last_name
 * @property string|null $first_name
 * @property string|null $middle_name
 * @property string|null $direction
 * @property string|null $course
 * @property string|null $group
 * @property string|null $semestr
 * @property string|null $edu_lang
 * @property string|null $subject_name
 * @property string|null $username_distant
 * @property string|null $srs_id
 * @property float|null $all_ball
 * @property string|null $alphabet
 * @property string|null $mark
 * @property int|null $student_id
 * @property int|null $status
 * @property int|null $order
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $is_deleted
 */
class StudentGpaOld extends \yii\db\ActiveRecord
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
        return '{{%student_gpa_old}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['all_ball'], 'number'],
            [['student_id', 'status', 'order', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['last_name', 'first_name', 'middle_name', 'direction', 'course', 'group', 'semestr', 'edu_lang', 'subject_name', 'username_distant', 'srs_id', 'alphabet', 'mark'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'last_name' => Yii::t('app', 'Last Name'),
            'first_name' => Yii::t('app', 'First Name'),
            'middle_name' => Yii::t('app', 'Middle Name'),
            'direction' => Yii::t('app', 'Direction'),
            'course' => Yii::t('app', 'Course'),
            'group' => Yii::t('app', 'Group'),
            'semestr' => Yii::t('app', 'Semestr'),
            'edu_lang' => Yii::t('app', 'Edu Lang'),
            'subject_name' => Yii::t('app', 'Subject Name'),
            'username_distant' => Yii::t('app', 'Username Distant'),
            'srs_id' => Yii::t('app', 'Srs ID'),
            'all_ball' => Yii::t('app', 'All Ball'),
            'alphabet' => Yii::t('app', 'Alphabet'),
            'mark' => Yii::t('app', 'Mark'),
            'student_id' => Yii::t('app', 'Student ID'),
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
     * {@inheritdoc}
     */
    public function fields()
    {
        $fields =  [
            'id',
            'last_name',
            'first_name',
            'middle_name',
            'direction',
            'course',
            'group',
            'semestr',
            'edu_lang',
            'subject_name',
            'username_distant',
            'srs_id',
            'all_ball',
            'alphabet',
            'mark',
            'student_id',
            'status',
            'order',
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
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
    }    
    
    
    /**
     * StudentGpaOld createItem <$model, $post>
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
     * StudentGpaOld updateItem <$model, $post>
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
     * @return StudentGpaOldQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StudentGpaOldQuery(get_called_class());
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
