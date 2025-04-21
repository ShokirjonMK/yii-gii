<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%subject_category}}".
 *
 * @property int $id
 * @property int|null $order
 * @property int|null $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $is_deleted
 *
 * @property Attend[] $attends
 * @property AttentAccess[] $attentAccesses
 * @property EduSemestrSubjectCategoryTime[] $eduSemestrSubjectCategoryTimes
 * @property KpiStore[] $kpiStores
 * @property KpiStore[] $kpiStores0
 * @property StudentAttend[] $studentAttends
 * @property SubjectTopic[] $subjectTopics
 * @property TimeTable[] $timeTables
 */
class SubjectCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%subject_category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
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
     * Gets query for [[Attends]].
     *
     * @return \yii\db\ActiveQuery|AttendQuery
     */
    public function getAttends()
    {
        return $this->hasMany(Attend::className(), ['subject_category_id' => 'id']);
    }

    /**
     * Gets query for [[AttentAccesses]].
     *
     * @return \yii\db\ActiveQuery|AttentAccessQuery
     */
    public function getAttentAccesses()
    {
        return $this->hasMany(AttentAccess::className(), ['subject_category_id' => 'id']);
    }

    /**
     * Gets query for [[EduSemestrSubjectCategoryTimes]].
     *
     * @return \yii\db\ActiveQuery|EduSemestrSubjectCategoryTimeQuery
     */
    public function getEduSemestrSubjectCategoryTimes()
    {
        return $this->hasMany(EduSemestrSubjectCategoryTime::className(), ['subject_category_id' => 'id']);
    }

    /**
     * Gets query for [[KpiStores]].
     *
     * @return \yii\db\ActiveQuery|KpiStoreQuery
     */
    public function getKpiStores()
    {
        return $this->hasMany(KpiStore::className(), ['subject_category_id' => 'id']);
    }

    /**
     * Gets query for [[KpiStores0]].
     *
     * @return \yii\db\ActiveQuery|KpiStoreQuery
     */
    public function getKpiStores0()
    {
        return $this->hasMany(KpiStore::className(), ['subject_category_id' => 'id']);
    }

    /**
     * Gets query for [[StudentAttends]].
     *
     * @return \yii\db\ActiveQuery|StudentAttendQuery
     */
    public function getStudentAttends()
    {
        return $this->hasMany(StudentAttend::className(), ['subject_category_id' => 'id']);
    }

    /**
     * Gets query for [[SubjectTopics]].
     *
     * @return \yii\db\ActiveQuery|SubjectTopicQuery
     */
    public function getSubjectTopics()
    {
        return $this->hasMany(SubjectTopic::className(), ['subject_category_id' => 'id']);
    }

    /**
     * Gets query for [[TimeTables]].
     *
     * @return \yii\db\ActiveQuery|TimeTableQuery
     */
    public function getTimeTables()
    {
        return $this->hasMany(TimeTable::className(), ['subject_category_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return SubjectCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SubjectCategoryQuery(get_called_class());
    }
}
