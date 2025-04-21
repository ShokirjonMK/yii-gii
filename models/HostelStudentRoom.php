<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%hostel_student_room}}".
 *
 * @property int $id
 * @property int|null $room_id
 * @property int|null $student_id
 * @property int|null $faculty_id
 * @property int|null $edu_year_id
 * @property int|null $edu_plan_id
 * @property float|null $payed
 * @property int|null $is_contract
 * @property int|null $is_free
 * @property int|null $status
 * @property int|null $order
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $is_deleted
 *
 * @property EduPlan $eduPlan
 * @property EduYear $eduYear
 * @property Faculty $faculty
 * @property Room $room
 * @property Student $student
 */
class HostelStudentRoom extends \yii\db\ActiveRecord
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
        return '{{%hostel_student_room}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_id', 'student_id', 'faculty_id', 'edu_year_id', 'edu_plan_id', 'is_contract', 'is_free', 'status', 'order', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['payed'], 'number'],
            [['edu_plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduPlan::className(), 'targetAttribute' => ['edu_plan_id' => 'id']],
            [['edu_year_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduYear::className(), 'targetAttribute' => ['edu_year_id' => 'id']],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_id' => 'Room ID',
            'student_id' => 'Student ID',
            'faculty_id' => 'Faculty ID',
            'edu_year_id' => 'Edu Year ID',
            'edu_plan_id' => 'Edu Plan ID',
            'payed' => 'Payed',
            'is_contract' => 'Is Contract',
            'is_free' => 'Is Free',
            'status' => 'Status',
            'order' => 'Order',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'is_deleted' => 'Is Deleted',
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function fields()
    {
        $fields =  [
            'id',
            'room_id',
            'student_id',
            'faculty_id',
            'edu_year_id',
            'edu_plan_id',
            'payed',
            'is_contract',
            'is_free',
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
            'eduPlan',
            'eduYear',
            'faculty',
            'room',
            'student',
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
    }    
    
    
    /**
     * Gets query for [[EduPlan]].
     *
     * @return \yii\db\ActiveQuery|EduPlanQuery
     */
    public function getEduPlan()
    {
        return $this->hasOne(EduPlan::className(), ['id' => 'edu_plan_id']);
    }

    /**
     * Gets query for [[EduYear]].
     *
     * @return \yii\db\ActiveQuery|EduYearQuery
     */
    public function getEduYear()
    {
        return $this->hasOne(EduYear::className(), ['id' => 'edu_year_id']);
    }

    /**
     * Gets query for [[Faculty]].
     *
     * @return \yii\db\ActiveQuery|FacultyQuery
     */
    public function getFaculty()
    {
        return $this->hasOne(Faculty::className(), ['id' => 'faculty_id']);
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
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery|StudentQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }

    /**
     * HostelStudentRoom createItem <$model, $post>
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
     * HostelStudentRoom updateItem <$model, $post>
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
     * @return HostelStudentRoomQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HostelStudentRoomQuery(get_called_class());
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
