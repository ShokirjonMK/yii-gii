<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%user_appeal}}".
 *
 * @property int $id
 * @property int $user_id ID of the user who created the record
 * @property int|null $type
 * @property int|null $type_mini
 * @property string|null $text
 * @property string|null $answer_text
 * @property string|null $file
 * @property string|null $answer_file
 * @property string|null $date
 * @property int|null $para_id
 * @property string|null $description
 * @property int|null $order Order of the item
 * @property int|null $status Status of the item (1 = active, 0 = inactive)
 * @property int|null $is_deleted Is the item deleted (0 = no, 1 = yes)
 * @property int $created_at Creation timestamp
 * @property int $updated_at Update timestamp
 * @property int $created_by ID of the user who created the record
 * @property int $updated_by ID of the user who last updated the record
 * @property int $archived Is the item archived (0 = no, 1 = yes)
 *
 * @property User $user
 */
class UserAppeal extends \yii\db\ActiveRecord
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
        return '{{%user_appeal}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'type', 'type_mini', 'para_id', 'order', 'status', 'is_deleted', 'created_at', 'updated_at', 'created_by', 'updated_by', 'archived'], 'integer'],
            [['text', 'answer_text', 'description'], 'string'],
            [['date'], 'safe'],
            [['file', 'answer_file'], 'string', 'max' => 255],
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
            'user_id' => Yii::t('app', 'ID of the user who created the record'),
            'type' => Yii::t('app', 'Type'),
            'type_mini' => Yii::t('app', 'Type Mini'),
            'text' => Yii::t('app', 'Text'),
            'answer_text' => Yii::t('app', 'Answer Text'),
            'file' => Yii::t('app', 'File'),
            'answer_file' => Yii::t('app', 'Answer File'),
            'date' => Yii::t('app', 'Date'),
            'para_id' => Yii::t('app', 'Para ID'),
            'description' => Yii::t('app', 'Description'),
            'order' => Yii::t('app', 'Order of the item'),
            'status' => Yii::t('app', 'Status of the item (1 = active, 0 = inactive)'),
            'is_deleted' => Yii::t('app', 'Is the item deleted (0 = no, 1 = yes)'),
            'created_at' => Yii::t('app', 'Creation timestamp'),
            'updated_at' => Yii::t('app', 'Update timestamp'),
            'created_by' => Yii::t('app', 'ID of the user who created the record'),
            'updated_by' => Yii::t('app', 'ID of the user who last updated the record'),
            'archived' => Yii::t('app', 'Is the item archived (0 = no, 1 = yes)'),
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
            'type',
            'type_mini',
            'text',
            'answer_text',
            'file',
            'answer_file',
            'date',
            'para_id',
            'description',
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
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * UserAppeal createItem <$model, $post>
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
     * UserAppeal updateItem <$model, $post>
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
     * @return UserAppealQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserAppealQuery(get_called_class());
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
