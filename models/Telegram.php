<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%telegram}}".
 *
 * @property int $id
 * @property string|null $phone
 * @property string|null $username
 * @property string|null $password
 * @property int|null $chat_id
 * @property int|null $step
 * @property int|null $user_id User ID
 * @property int|null $order Order of the item
 * @property int|null $status Status of the item (1 = active, 0 = inactive)
 * @property int|null $is_deleted Is the item deleted (0 = no, 1 = yes)
 * @property int $created_at Creation timestamp
 * @property int $updated_at Update timestamp
 * @property int $created_by ID of the user who created the record
 * @property int $updated_by ID of the user who last updated the record
 *
 * @property Users $user
 */
class Telegram extends \yii\db\ActiveRecord
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
        return '{{%telegram}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chat_id', 'step', 'user_id', 'order', 'status', 'is_deleted', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['phone', 'username', 'password'], 'string', 'max' => 255],
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
            'phone' => Yii::t('app', 'Phone'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'chat_id' => Yii::t('app', 'Chat ID'),
            'step' => Yii::t('app', 'Step'),
            'user_id' => Yii::t('app', 'User ID'),
            'order' => Yii::t('app', 'Order of the item'),
            'status' => Yii::t('app', 'Status of the item (1 = active, 0 = inactive)'),
            'is_deleted' => Yii::t('app', 'Is the item deleted (0 = no, 1 = yes)'),
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
            'phone',
            'username',
            'password',
            'chat_id',
            'step',
            'user_id',
            'order',
            'status',
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
            'user',
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
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
     * Telegram createItem <$model, $post>
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
     * Telegram updateItem <$model, $post>
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
     * @return TelegramQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TelegramQuery(get_called_class());
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
