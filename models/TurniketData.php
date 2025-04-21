<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%turniket_data}}".
 *
 * @property int $id
 * @property int $user_id User ID
 * @property int $turniket_id Turniket ID
 * @property string|null $date Date
 * @property string|null $data statistics json data
 * @property int $created_at
 * @property string|null $key statistics key
 * @property int|null $type statistics type
 */
class TurniketData extends \yii\db\ActiveRecord
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
        return '{{%turniket_data}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'turniket_id'], 'required'],
            [['user_id', 'turniket_id', 'created_at', 'type'], 'integer'],
            [['date', 'data'], 'safe'],
            [['key'], 'string', 'max' => 255],
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
            'turniket_id' => Yii::t('app', 'Turniket ID'),
            'date' => Yii::t('app', 'Date'),
            'data' => Yii::t('app', 'statistics json data'),
            'created_at' => Yii::t('app', 'Created At'),
            'key' => Yii::t('app', 'statistics key'),
            'type' => Yii::t('app', 'statistics type'),
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
            'turniket_id',
            'date',
            'data',
            'created_at',
            'key',
            'type',
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
     * TurniketData createItem <$model, $post>
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
     * TurniketData updateItem <$model, $post>
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
     * @return TurniketDataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TurniketDataQuery(get_called_class());
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
