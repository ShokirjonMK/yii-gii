<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%poll_question}}".
 *
 * @property int $id
 * @property int $poll_id
 * @property int|null $order
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $is_deleted
 *
 * @property Poll $poll
 * @property PollQuestionOption[] $pollQuestionOptions
 * @property PollUser[] $pollUsers
 */
class PollQuestion extends \yii\db\ActiveRecord
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
        return '{{%poll_question}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['poll_id'], 'required'],
            [['poll_id', 'order', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['poll_id'], 'exist', 'skipOnError' => true, 'targetClass' => Poll::className(), 'targetAttribute' => ['poll_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'poll_id' => Yii::t('app', 'Poll ID'),
            'order' => Yii::t('app', 'Order'),
            'status' => Yii::t('app', 'Status'),
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
            'poll_id',
            'order',
            'status',
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
            'poll',
            'pollQuestionOptions',
            'pollUsers',
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
    }    
    
    
    /**
     * Gets query for [[Poll]].
     *
     * @return \yii\db\ActiveQuery|PollUserQuery
     */
    public function getPoll()
    {
        return $this->hasOne(Poll::className(), ['id' => 'poll_id']);
    }

    /**
     * Gets query for [[PollQuestionOptions]].
     *
     * @return \yii\db\ActiveQuery|PollQuestionOptionQuery
     */
    public function getPollQuestionOptions()
    {
        return $this->hasMany(PollQuestionOption::className(), ['poll_question_id' => 'id']);
    }

    /**
     * Gets query for [[PollUsers]].
     *
     * @return \yii\db\ActiveQuery|PollUserQuery
     */
    public function getPollUsers()
    {
        return $this->hasMany(PollUser::className(), ['poll_question_id' => 'id']);
    }

    /**
     * PollQuestion createItem <$model, $post>
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
     * PollQuestion updateItem <$model, $post>
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
     * @return PollQuestionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PollQuestionQuery(get_called_class());
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
