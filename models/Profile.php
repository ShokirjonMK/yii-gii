<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%profile}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $checked
 * @property int|null $checked_full
 * @property string|null $image
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
 * @property string|null $passport_file
 * @property int|null $country_id
 * @property int|null $is_foreign
 * @property int|null $region_id
 * @property int|null $area_id
 * @property string|null $address
 * @property int|null $gender
 * @property int|null $permanent_country_id
 * @property int|null $permanent_region_id
 * @property int|null $permanent_area_id
 * @property string|null $permanent_address
 * @property int|null $order
 * @property int|null $status
 * @property string|null $description
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $is_deleted
 * @property int|null $citizenship_id citizenship_id fuqarolik turi
 * @property int|null $nationality_id millati id 
 * @property int|null $telegram_chat_id
 * @property int|null $diploma_type_id diploma_type
 * @property int|null $degree_id darajasi id
 * @property int|null $academic_degree_id academic_degree id
 * @property int|null $degree_info_id degree_info id
 * @property int|null $partiya_id partiya id
 *
 * @property Area $area
 * @property Citizenship $citizenship
 * @property Country $country
 * @property Area $permanentArea
 * @property Country $permanentCountry
 * @property Region $permanentRegion
 * @property Region $region
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
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
        return '{{%profile}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'checked', 'checked_full', 'country_id', 'is_foreign', 'region_id', 'area_id', 'gender', 'permanent_country_id', 'permanent_region_id', 'permanent_area_id', 'order', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted', 'citizenship_id', 'nationality_id', 'telegram_chat_id', 'diploma_type_id', 'degree_id', 'academic_degree_id', 'degree_info_id', 'partiya_id'], 'integer'],
            [['passport_given_date', 'passport_issued_date', 'birthday'], 'safe'],
            [['description'], 'string'],
            [['image', 'last_name', 'first_name', 'middle_name', 'passport_seria', 'passport_number', 'passport_pin', 'passport_given_by', 'passport_file', 'address', 'permanent_address'], 'string', 'max' => 255],
            [['phone', 'phone_secondary'], 'string', 'max' => 50],
            [['area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['area_id' => 'id']],
            [['permanent_area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['permanent_area_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['permanent_country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['permanent_country_id' => 'id']],
            [['citizenship_id'], 'exist', 'skipOnError' => true, 'targetClass' => Citizenship::className(), 'targetAttribute' => ['citizenship_id' => 'id']],
            [['permanent_region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['permanent_region_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'checked' => Yii::t('app', 'Checked'),
            'checked_full' => Yii::t('app', 'Checked Full'),
            'image' => Yii::t('app', 'Image'),
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
            'passport_file' => Yii::t('app', 'Passport File'),
            'country_id' => Yii::t('app', 'Country ID'),
            'is_foreign' => Yii::t('app', 'Is Foreign'),
            'region_id' => Yii::t('app', 'Region ID'),
            'area_id' => Yii::t('app', 'Area ID'),
            'address' => Yii::t('app', 'Address'),
            'gender' => Yii::t('app', 'Gender'),
            'permanent_country_id' => Yii::t('app', 'Permanent Country ID'),
            'permanent_region_id' => Yii::t('app', 'Permanent Region ID'),
            'permanent_area_id' => Yii::t('app', 'Permanent Area ID'),
            'permanent_address' => Yii::t('app', 'Permanent Address'),
            'order' => Yii::t('app', 'Order'),
            'status' => Yii::t('app', 'Status'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'citizenship_id' => Yii::t('app', 'citizenship_id fuqarolik turi'),
            'nationality_id' => Yii::t('app', 'millati id '),
            'telegram_chat_id' => Yii::t('app', 'Telegram Chat ID'),
            'diploma_type_id' => Yii::t('app', 'diploma_type'),
            'degree_id' => Yii::t('app', 'darajasi id'),
            'academic_degree_id' => Yii::t('app', 'academic_degree id'),
            'degree_info_id' => Yii::t('app', 'degree_info id'),
            'partiya_id' => Yii::t('app', 'partiya id'),
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
            'checked',
            'checked_full',
            'image',
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
            'passport_file',
            'country_id',
            'is_foreign',
            'region_id',
            'area_id',
            'address',
            'gender',
            'permanent_country_id',
            'permanent_region_id',
            'permanent_area_id',
            'permanent_address',
            'order',
            'status',
            'description',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'is_deleted',
            'citizenship_id',
            'nationality_id',
            'telegram_chat_id',
            'diploma_type_id',
            'degree_id',
            'academic_degree_id',
            'degree_info_id',
            'partiya_id',
        ];
        return $fields;
    }

    public function extraFields()
    {
        $extraFields =  [
            'area',
            'citizenship',
            'country',
            'permanentArea',
            'permanentCountry',
            'permanentRegion',
            'region',
            'user',
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
    }    
    
    
    /**
     * Gets query for [[Area]].
     *
     * @return \yii\db\ActiveQuery|AreaQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['id' => 'area_id']);
    }

    /**
     * Gets query for [[Citizenship]].
     *
     * @return \yii\db\ActiveQuery|CitizenshipQuery
     */
    public function getCitizenship()
    {
        return $this->hasOne(Citizenship::className(), ['id' => 'citizenship_id']);
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery|CountryQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * Gets query for [[PermanentArea]].
     *
     * @return \yii\db\ActiveQuery|AreaQuery
     */
    public function getPermanentArea()
    {
        return $this->hasOne(Area::className(), ['id' => 'permanent_area_id']);
    }

    /**
     * Gets query for [[PermanentCountry]].
     *
     * @return \yii\db\ActiveQuery|CountryQuery
     */
    public function getPermanentCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'permanent_country_id']);
    }

    /**
     * Gets query for [[PermanentRegion]].
     *
     * @return \yii\db\ActiveQuery|RegionQuery
     */
    public function getPermanentRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'permanent_region_id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery|RegionQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Profile createItem <$model, $post>
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
     * Profile updateItem <$model, $post>
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
     * @return ProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProfileQuery(get_called_class());
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
