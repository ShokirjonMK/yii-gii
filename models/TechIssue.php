<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%tech_issue}}".
 *
 * @property int $id
 * @property int|null $tech_issue_type_id
 * @property int|null $building_id
 * @property int|null $room_id
 * @property int|null $issue_user_id
 * @property int|null $answer_user_id
 * @property string|null $issue_text
 * @property string|null $answer_text
 * @property string|null $file
 * @property string|null $issue_file
 * @property string|null $answer_file
 * @property string|null $answer_date
 * @property int|null $order
 * @property int|null $status
 * @property int|null $is_deleted
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $archived
 *
 * @property User $answerUser
 * @property Building $building
 * @property User $issueUser
 * @property Room $room
 * @property TechIssueType $techIssueType
 */
class TechIssue extends \yii\db\ActiveRecord
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
        return '{{%tech_issue}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tech_issue_type_id', 'building_id', 'room_id', 'issue_user_id', 'answer_user_id', 'order', 'status', 'is_deleted', 'created_at', 'updated_at', 'created_by', 'updated_by', 'archived'], 'integer'],
            [['issue_text', 'answer_text'], 'string'],
            [['answer_date'], 'safe'],
            [['file', 'issue_file', 'answer_file'], 'string', 'max' => 255],
            [['answer_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['answer_user_id' => 'id']],
            [['building_id'], 'exist', 'skipOnError' => true, 'targetClass' => Building::className(), 'targetAttribute' => ['building_id' => 'id']],
            [['issue_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['issue_user_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
            [['tech_issue_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TechIssueType::className(), 'targetAttribute' => ['tech_issue_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tech_issue_type_id' => Yii::t('app', 'Tech Issue Type ID'),
            'building_id' => Yii::t('app', 'Building ID'),
            'room_id' => Yii::t('app', 'Room ID'),
            'issue_user_id' => Yii::t('app', 'Issue User ID'),
            'answer_user_id' => Yii::t('app', 'Answer User ID'),
            'issue_text' => Yii::t('app', 'Issue Text'),
            'answer_text' => Yii::t('app', 'Answer Text'),
            'file' => Yii::t('app', 'File'),
            'issue_file' => Yii::t('app', 'Issue File'),
            'answer_file' => Yii::t('app', 'Answer File'),
            'answer_date' => Yii::t('app', 'Answer Date'),
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
            'tech_issue_type_id',
            'building_id',
            'room_id',
            'issue_user_id',
            'answer_user_id',
            'issue_text',
            'answer_text',
            'file',
            'issue_file',
            'answer_file',
            'answer_date',
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
            'answerUser',
            'building',
            'issueUser',
            'room',
            'techIssueType',
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
    }    
    
    
    /**
     * Gets query for [[AnswerUser]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getAnswerUser()
    {
        return $this->hasOne(User::className(), ['id' => 'answer_user_id']);
    }

    /**
     * Gets query for [[Building]].
     *
     * @return \yii\db\ActiveQuery|BuildingQuery
     */
    public function getBuilding()
    {
        return $this->hasOne(Building::className(), ['id' => 'building_id']);
    }

    /**
     * Gets query for [[IssueUser]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getIssueUser()
    {
        return $this->hasOne(User::className(), ['id' => 'issue_user_id']);
    }

    /**
     * Gets query for [[Room]].
     *
     * @return \yii\db\ActiveQuery|RoomQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }

    /**
     * Gets query for [[TechIssueType]].
     *
     * @return \yii\db\ActiveQuery|TechIssueTypeQuery
     */
    public function getTechIssueType()
    {
        return $this->hasOne(TechIssueType::className(), ['id' => 'tech_issue_type_id']);
    }

    /**
     * TechIssue createItem <$model, $post>
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
     * TechIssue updateItem <$model, $post>
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
     * @return TechIssueQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TechIssueQuery(get_called_class());
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
