<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%time_option}}".
 *
 * @property int $id
 * @property string $key
 * @property int $faculty_id
 * @property int $edu_plan_id
 * @property int $edu_year_id
 * @property int $edu_semester_id
 * @property int $language_id
 * @property int|null $type
 * @property string|null $description
 * @property int|null $status
 * @property int|null $is_deleted
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class TimeOption extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%time_option}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'faculty_id', 'edu_plan_id', 'edu_year_id', 'edu_semester_id', 'language_id', 'created_at', 'updated_at'], 'required'],
            [['faculty_id', 'edu_plan_id', 'edu_year_id', 'edu_semester_id', 'language_id', 'type', 'status', 'is_deleted', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['description'], 'string'],
            [['key'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'key' => Yii::t('app', 'Key'),
            'faculty_id' => Yii::t('app', 'Faculty ID'),
            'edu_plan_id' => Yii::t('app', 'Edu Plan ID'),
            'edu_year_id' => Yii::t('app', 'Edu Year ID'),
            'edu_semester_id' => Yii::t('app', 'Edu Semester ID'),
            'language_id' => Yii::t('app', 'Language ID'),
            'type' => Yii::t('app', 'Type'),
            'description' => Yii::t('app', 'Description'),
            'status' => Yii::t('app', 'Status'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TimeOptionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TimeOptionQuery(get_called_class());
    }
}
