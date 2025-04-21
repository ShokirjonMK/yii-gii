<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%contract_info}}".
 *
 * @property int $id
 * @property int|null $student_id
 * @property int|null $uzasbo_id
 * @property string|null $passport_pin
 * @property string|null $contract_number
 * @property string|null $scholarship_type
 * @property float|null $contract_price
 * @property float|null $contract_price_half
 * @property string|null $reception_type
 * @property string|null $order_class
 * @property string|null $order_enter
 * @property string|null $order_no_class
 * @property string|null $order_fire
 * @property string|null $order_edu_holiday
 * @property string|null $order_change_edu_form
 * @property float|null $debt_begin
 * @property float|null $overpayment
 * @property float|null $must_pay_this_year
 * @property float|null $paid_this_year
 * @property float|null $payment_percent
 * @property int|null $status
 * @property int|null $order
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $is_deleted
 *
 * @property Student $student
 */
class ContractInfo extends \yii\db\ActiveRecord
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
        return '{{%contract_info}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'uzasbo_id', 'status', 'order', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['contract_price', 'contract_price_half', 'debt_begin', 'overpayment', 'must_pay_this_year', 'paid_this_year', 'payment_percent'], 'number'],
            [['passport_pin', 'contract_number', 'scholarship_type', 'reception_type', 'order_class', 'order_enter', 'order_no_class', 'order_fire', 'order_edu_holiday', 'order_change_edu_form'], 'string', 'max' => 255],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
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
            'uzasbo_id' => Yii::t('app', 'Uzasbo ID'),
            'passport_pin' => Yii::t('app', 'Passport Pin'),
            'contract_number' => Yii::t('app', 'Contract Number'),
            'scholarship_type' => Yii::t('app', 'Scholarship Type'),
            'contract_price' => Yii::t('app', 'Contract Price'),
            'contract_price_half' => Yii::t('app', 'Contract Price Half'),
            'reception_type' => Yii::t('app', 'Reception Type'),
            'order_class' => Yii::t('app', 'Order Class'),
            'order_enter' => Yii::t('app', 'Order Enter'),
            'order_no_class' => Yii::t('app', 'Order No Class'),
            'order_fire' => Yii::t('app', 'Order Fire'),
            'order_edu_holiday' => Yii::t('app', 'Order Edu Holiday'),
            'order_change_edu_form' => Yii::t('app', 'Order Change Edu Form'),
            'debt_begin' => Yii::t('app', 'Debt Begin'),
            'overpayment' => Yii::t('app', 'Overpayment'),
            'must_pay_this_year' => Yii::t('app', 'Must Pay This Year'),
            'paid_this_year' => Yii::t('app', 'Paid This Year'),
            'payment_percent' => Yii::t('app', 'Payment Percent'),
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
            'student_id',
            'uzasbo_id',
            'passport_pin',
            'contract_number',
            'scholarship_type',
            'contract_price',
            'contract_price_half',
            'reception_type',
            'order_class',
            'order_enter',
            'order_no_class',
            'order_fire',
            'order_edu_holiday',
            'order_change_edu_form',
            'debt_begin',
            'overpayment',
            'must_pay_this_year',
            'paid_this_year',
            'payment_percent',
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
            'student',
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
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
     * ContractInfo createItem <$model, $post>
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
     * ContractInfo updateItem <$model, $post>
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
     * @return ContractInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContractInfoQuery(get_called_class());
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
