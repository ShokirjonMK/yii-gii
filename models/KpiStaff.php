<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%kpi_staff}}".
 *
 * @property int $id
 * @property int $user_access_id
 * @property int|null $user_id
 * @property int|null $job_title_id
 * @property int|null $user_access_type_id
 * @property int|null $table_id
 * @property int|null $work_rate_id
 * @property int|null $work_type
 * @property int|null $edu_year_id
 * @property int|null $in_doc_all
 * @property int|null $in_doc_on_time
 * @property int|null $in_doc_after_time
 * @property int|null $in_doc_not_done
 * @property float|null $in_doc_ball
 * @property float|null $in_doc_percent
 * @property float|null $in_doc_collected_ball
 * @property int|null $ex_doc_all
 * @property int|null $ex_doc_on_time
 * @property int|null $ex_doc_after_time
 * @property int|null $ex_doc_not_done
 * @property float|null $ex_doc_ball
 * @property float|null $ex_doc_percent
 * @property float|null $ex_doc_collected_ball
 * @property float|null $ball_dep_lead
 * @property string|null $file_dep_lead
 * @property float|null $ball_rector
 * @property float|null $ball_commission
 * @property float|null $ball_all
 * @property int|null $kpi
 * @property int|null $order
 * @property int|null $status
 * @property int|null $is_deleted
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $archived
 *
 * @property EduYear $eduYear
 * @property UserAccess $userAccess
 */
class KpiStaff extends \yii\db\ActiveRecord
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
        return '{{%kpi_staff}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_access_id'], 'required'],
            [['user_access_id', 'user_id', 'job_title_id', 'user_access_type_id', 'table_id', 'work_rate_id', 'work_type', 'edu_year_id', 'in_doc_all', 'in_doc_on_time', 'in_doc_after_time', 'in_doc_not_done', 'ex_doc_all', 'ex_doc_on_time', 'ex_doc_after_time', 'ex_doc_not_done', 'kpi', 'order', 'status', 'is_deleted', 'created_at', 'updated_at', 'created_by', 'updated_by', 'archived'], 'integer'],
            [['in_doc_ball', 'in_doc_percent', 'in_doc_collected_ball', 'ex_doc_ball', 'ex_doc_percent', 'ex_doc_collected_ball', 'ball_dep_lead', 'ball_rector', 'ball_commission', 'ball_all'], 'number'],
            [['file_dep_lead'], 'string', 'max' => 255],
            [['edu_year_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduYear::className(), 'targetAttribute' => ['edu_year_id' => 'id']],
            [['user_access_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserAccess::className(), 'targetAttribute' => ['user_access_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_access_id' => Yii::t('app', 'User Access ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'job_title_id' => Yii::t('app', 'Job Title ID'),
            'user_access_type_id' => Yii::t('app', 'User Access Type ID'),
            'table_id' => Yii::t('app', 'Table ID'),
            'work_rate_id' => Yii::t('app', 'Work Rate ID'),
            'work_type' => Yii::t('app', 'Work Type'),
            'edu_year_id' => Yii::t('app', 'Edu Year ID'),
            'in_doc_all' => Yii::t('app', 'In Doc All'),
            'in_doc_on_time' => Yii::t('app', 'In Doc On Time'),
            'in_doc_after_time' => Yii::t('app', 'In Doc After Time'),
            'in_doc_not_done' => Yii::t('app', 'In Doc Not Done'),
            'in_doc_ball' => Yii::t('app', 'In Doc Ball'),
            'in_doc_percent' => Yii::t('app', 'In Doc Percent'),
            'in_doc_collected_ball' => Yii::t('app', 'In Doc Collected Ball'),
            'ex_doc_all' => Yii::t('app', 'Ex Doc All'),
            'ex_doc_on_time' => Yii::t('app', 'Ex Doc On Time'),
            'ex_doc_after_time' => Yii::t('app', 'Ex Doc After Time'),
            'ex_doc_not_done' => Yii::t('app', 'Ex Doc Not Done'),
            'ex_doc_ball' => Yii::t('app', 'Ex Doc Ball'),
            'ex_doc_percent' => Yii::t('app', 'Ex Doc Percent'),
            'ex_doc_collected_ball' => Yii::t('app', 'Ex Doc Collected Ball'),
            'ball_dep_lead' => Yii::t('app', 'Ball Dep Lead'),
            'file_dep_lead' => Yii::t('app', 'File Dep Lead'),
            'ball_rector' => Yii::t('app', 'Ball Rector'),
            'ball_commission' => Yii::t('app', 'Ball Commission'),
            'ball_all' => Yii::t('app', 'Ball All'),
            'kpi' => Yii::t('app', 'Kpi'),
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
            'user_access_id',
            'user_id',
            'job_title_id',
            'user_access_type_id',
            'table_id',
            'work_rate_id',
            'work_type',
            'edu_year_id',
            'in_doc_all',
            'in_doc_on_time',
            'in_doc_after_time',
            'in_doc_not_done',
            'in_doc_ball',
            'in_doc_percent',
            'in_doc_collected_ball',
            'ex_doc_all',
            'ex_doc_on_time',
            'ex_doc_after_time',
            'ex_doc_not_done',
            'ex_doc_ball',
            'ex_doc_percent',
            'ex_doc_collected_ball',
            'ball_dep_lead',
            'file_dep_lead',
            'ball_rector',
            'ball_commission',
            'ball_all',
            'kpi',
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
            'eduYear',
            'userAccess',
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
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
     * Gets query for [[UserAccess]].
     *
     * @return \yii\db\ActiveQuery|UserAccessQuery
     */
    public function getUserAccess()
    {
        return $this->hasOne(UserAccess::className(), ['id' => 'user_access_id']);
    }

    /**
     * KpiStaff createItem <$model, $post>
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
     * KpiStaff updateItem <$model, $post>
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
     * @return KpiStaffQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KpiStaffQuery(get_called_class());
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
