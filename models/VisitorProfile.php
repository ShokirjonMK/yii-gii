<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%visitor_profile}}".
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $birth_place
 * @property string|null $last_name
 * @property string|null $first_name
 * @property string|null $middle_name
 * @property string|null $passport_seria
 * @property string|null $passport_number
 * @property string|null $passport_pin
 * @property string|null $passport_given_date
 * @property string|null $passport_issued_date
 * @property string|null $passport_given_by
 * @property string|null $birthday
 * @property string|null $phone
 * @property string|null $phone_secondary
 * @property int|null $citizenship_id citizenship_id fuqarolik turi
 * @property int|null $nationality_id millati id
 * @property int|null $country_id
 * @property int|null $is_foreign
 * @property int|null $region_id
 * @property int|null $area_id
 * @property string|null $address
 * @property int|null $gender
 * @property string|null $description
 * @property int|null $turniket_id turniketdan qaytgan ID
 * @property int|null $turniket_status turniketga biriktirilganligi
 * @property int $status Status: 0-inactive, 1-active
 * @property int|null $order
 * @property int|null $is_deleted
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class VisitorProfile extends \yii\db\ActiveRecord
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
        return '{{%visitor_profile}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['passport_given_date', 'passport_issued_date', 'birthday'], 'safe'],
            [['citizenship_id', 'nationality_id', 'country_id', 'is_foreign', 'region_id', 'area_id', 'gender', 'turniket_id', 'turniket_status', 'status', 'order', 'is_deleted', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['description'], 'string'],
            [['image', 'birth_place', 'address'], 'string', 'max' => 255],
            [['last_name', 'first_name', 'middle_name'], 'string', 'max' => 64],
            [['passport_seria'], 'string', 'max' => 10],
            [['passport_number', 'passport_pin', 'phone', 'phone_secondary'], 'string', 'max' => 20],
            [['passport_given_by'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'image' => Yii::t('app', 'Image'),
            'birth_place' => Yii::t('app', 'Birth Place'),
            'last_name' => Yii::t('app', 'Last Name'),
            'first_name' => Yii::t('app', 'First Name'),
            'middle_name' => Yii::t('app', 'Middle Name'),
            'passport_seria' => Yii::t('app', 'Passport Seria'),
            'passport_number' => Yii::t('app', 'Passport Number'),
            'passport_pin' => Yii::t('app', 'Passport Pin'),
            'passport_given_date' => Yii::t('app', 'Passport Given Date'),
            'passport_issued_date' => Yii::t('app', 'Passport Issued Date'),
            'passport_given_by' => Yii::t('app', 'Passport Given By'),
            'birthday' => Yii::t('app', 'Birthday'),
            'phone' => Yii::t('app', 'Phone'),
            'phone_secondary' => Yii::t('app', 'Phone Secondary'),
            'citizenship_id' => Yii::t('app', 'citizenship_id fuqarolik turi'),
            'nationality_id' => Yii::t('app', 'millati id'),
            'country_id' => Yii::t('app', 'Country ID'),
            'is_foreign' => Yii::t('app', 'Is Foreign'),
            'region_id' => Yii::t('app', 'Region ID'),
            'area_id' => Yii::t('app', 'Area ID'),
            'address' => Yii::t('app', 'Address'),
            'gender' => Yii::t('app', 'Gender'),
            'description' => Yii::t('app', 'Description'),
            'turniket_id' => Yii::t('app', 'turniketdan qaytgan ID'),
            'turniket_status' => Yii::t('app', 'turniketga biriktirilganligi'),
            'status' => Yii::t('app', 'Status: 0-inactive, 1-active'),
            'order' => Yii::t('app', 'Order'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function fields()
    {
        $fields =  [
            'id',
            'image',
            'birth_place',
            'last_name',
            'first_name',
            'middle_name',
            'passport_seria',
            'passport_number',
            'passport_pin',
            'passport_given_date',
            'passport_issued_date',
            'passport_given_by',
            'birthday',
            'phone',
            'phone_secondary',
            'citizenship_id',
            'nationality_id',
            'country_id',
            'is_foreign',
            'region_id',
            'area_id',
            'address',
            'gender',
            'description',
            'turniket_id',
            'turniket_status',
            'status',
            'order',
            'is_deleted',
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
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
    }    
    
    
    /**
     * VisitorProfile createItem <$model, $post>
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
     * VisitorProfile updateItem <$model, $post>
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
     * @return VisitorProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VisitorProfileQuery(get_called_class());
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
