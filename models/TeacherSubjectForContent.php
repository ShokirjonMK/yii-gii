<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%teacher_subject_for_content}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $subject_id
 * @property string|null $langs
 * @property int|null $lang_id
 * @property int|null $type
 * @property int|null $status
 * @property int|null $is_deleted
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class TeacherSubjectForContent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%teacher_subject_for_content}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'subject_id', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'subject_id', 'lang_id', 'type', 'status', 'is_deleted', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['langs'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'subject_id' => 'Subject ID',
            'langs' => 'Langs',
            'lang_id' => 'Lang ID',
            'type' => 'Type',
            'status' => 'Status',
            'is_deleted' => 'Is Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TeacherSubjectForContentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TeacherSubjectForContentQuery(get_called_class());
    }
}
