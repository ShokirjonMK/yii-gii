<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%scientific_degree_document}}".
 *
 * @property int $id
 * @property int|null $academic_degree_id
 * @property int|null $degree_id
 * @property string|null $name
 * @property int $scientific_specialization_id
 * @property string|null $council_number
 * @property string|null $council_name
 * @property string|null $protection_date
 * @property string|null $performed_organization
 * @property string|null $leader_info
 * @property string|null $independent
 * @property string|null $base
 * @property string|null $autoreferat_file
 * @property string|null $diploma_number
 * @property string|null $diploma_file
 * @property string|null $dissertation_file
 * @property string|null $attestat_raqami
 * @property string|null $organization_recommended
 * @property string|null $oak_order_date
 * @property int|null $order
 * @property int|null $status
 * @property int|null $is_deleted
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $archived
 *
 * @property AcademicDegree $academicDegree
 * @property Degree $degree
 * @property ScientificSpecialization $scientificSpecialization
 */
class ScientificDegreeDocument extends \yii\db\ActiveRecord
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
        return '{{%scientific_degree_document}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['academic_degree_id', 'degree_id', 'scientific_specialization_id', 'order', 'status', 'is_deleted', 'created_at', 'updated_at', 'created_by', 'updated_by', 'archived'], 'integer'],
            [['name', 'council_name', 'leader_info'], 'string'],
            [['scientific_specialization_id'], 'required'],
            [['protection_date', 'oak_order_date'], 'safe'],
            [['council_number', 'performed_organization', 'independent', 'base', 'autoreferat_file', 'diploma_number', 'diploma_file', 'dissertation_file', 'attestat_raqami', 'organization_recommended'], 'string', 'max' => 255],
            [['academic_degree_id'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicDegree::className(), 'targetAttribute' => ['academic_degree_id' => 'id']],
            [['degree_id'], 'exist', 'skipOnError' => true, 'targetClass' => Degree::className(), 'targetAttribute' => ['degree_id' => 'id']],
            [['scientific_specialization_id'], 'exist', 'skipOnError' => true, 'targetClass' => ScientificSpecialization::className(), 'targetAttribute' => ['scientific_specialization_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'academic_degree_id' => Yii::t('app', 'Academic Degree ID'),
            'degree_id' => Yii::t('app', 'Degree ID'),
            'name' => Yii::t('app', 'Name'),
            'scientific_specialization_id' => Yii::t('app', 'Scientific Specialization ID'),
            'council_number' => Yii::t('app', 'Council Number'),
            'council_name' => Yii::t('app', 'Council Name'),
            'protection_date' => Yii::t('app', 'Protection Date'),
            'performed_organization' => Yii::t('app', 'Performed Organization'),
            'leader_info' => Yii::t('app', 'Leader Info'),
            'independent' => Yii::t('app', 'Independent'),
            'base' => Yii::t('app', 'Base'),
            'autoreferat_file' => Yii::t('app', 'Autoreferat File'),
            'diploma_number' => Yii::t('app', 'Diploma Number'),
            'diploma_file' => Yii::t('app', 'Diploma File'),
            'dissertation_file' => Yii::t('app', 'Dissertation File'),
            'attestat_raqami' => Yii::t('app', 'Attestat Raqami'),
            'organization_recommended' => Yii::t('app', 'Organization Recommended'),
            'oak_order_date' => Yii::t('app', 'Oak Order Date'),
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
            'academic_degree_id',
            'degree_id',
            'name',
            'scientific_specialization_id',
            'council_number',
            'council_name',
            'protection_date',
            'performed_organization',
            'leader_info',
            'independent',
            'base',
            'autoreferat_file',
            'diploma_number',
            'diploma_file',
            'dissertation_file',
            'attestat_raqami',
            'organization_recommended',
            'oak_order_date',
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
            'academicDegree',
            'degree',
            'scientificSpecialization',
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
    }    
    
    
    /**
     * Gets query for [[AcademicDegree]].
     *
     * @return \yii\db\ActiveQuery|AcademicDegreeQuery
     */
    public function getAcademicDegree()
    {
        return $this->hasOne(AcademicDegree::className(), ['id' => 'academic_degree_id']);
    }

    /**
     * Gets query for [[Degree]].
     *
     * @return \yii\db\ActiveQuery|DegreeQuery
     */
    public function getDegree()
    {
        return $this->hasOne(Degree::className(), ['id' => 'degree_id']);
    }

    /**
     * Gets query for [[ScientificSpecialization]].
     *
     * @return \yii\db\ActiveQuery|ScientificSpecializationQuery
     */
    public function getScientificSpecialization()
    {
        return $this->hasOne(ScientificSpecialization::className(), ['id' => 'scientific_specialization_id']);
    }

    /**
     * ScientificDegreeDocument createItem <$model, $post>
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
     * ScientificDegreeDocument updateItem <$model, $post>
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
     * @return ScientificDegreeDocumentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ScientificDegreeDocumentQuery(get_called_class());
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
