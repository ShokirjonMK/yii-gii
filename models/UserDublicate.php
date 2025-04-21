<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%user_dublicate}}".
 *
 * @property string|null $last_name
 * @property string|null $first_name
 * @property string|null $middle_name
 * @property string|null $birthday
 * @property int|null $status
 * @property int|null $deleted
 * @property string|null $passport_pin
 * @property string|null $passport_seria
 * @property string|null $passport_number
 * @property int $soni
 * @property string|null $item_name
 * @property int $user_id
 */
class UserDublicate extends \yii\db\ActiveRecord
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
        return '{{%user_dublicate}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birthday'], 'safe'],
            [['status', 'deleted', 'soni', 'user_id'], 'integer'],
            [['user_id'], 'required'],
            [['last_name', 'first_name', 'middle_name', 'passport_pin', 'passport_seria', 'passport_number'], 'string', 'max' => 255],
            [['item_name'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'last_name' => Yii::t('app', 'Last Name'),
            'first_name' => Yii::t('app', 'First Name'),
            'middle_name' => Yii::t('app', 'Middle Name'),
            'birthday' => Yii::t('app', 'Birthday'),
            'status' => Yii::t('app', 'Status'),
            'deleted' => Yii::t('app', 'Deleted'),
            'passport_pin' => Yii::t('app', 'Passport Pin'),
            'passport_seria' => Yii::t('app', 'Passport Seria'),
            'passport_number' => Yii::t('app', 'Passport Number'),
            'soni' => Yii::t('app', 'Soni'),
            'item_name' => Yii::t('app', 'Item Name'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function fields()
    {
        $fields =  [
            'last_name',
            'first_name',
            'middle_name',
            'birthday',
            'status',
            'deleted',
            'passport_pin',
            'passport_seria',
            'passport_number',
            'soni',
            'item_name',
            'user_id',
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
     * UserDublicate createItem <$model, $post>
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
     * UserDublicate updateItem <$model, $post>
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
     * @return UserDublicateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserDublicateQuery(get_called_class());
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
