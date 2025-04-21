<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%basis_for_publication}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $date
 * @property string|null $number
 * @property string|null $file
 * @property int|null $order
 * @property int|null $status
 * @property int|null $is_deleted
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $archived
 *
 * @property MonographBrochure[] $monographBrochures
 */
class BasisForPublication extends \yii\db\ActiveRecord
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
        return '{{%basis_for_publication}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['date'], 'safe'],
            [['order', 'status', 'is_deleted', 'created_at', 'updated_at', 'created_by', 'updated_by', 'archived'], 'integer'],
            [['number', 'file'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'date' => Yii::t('app', 'Date'),
            'number' => Yii::t('app', 'Number'),
            'file' => Yii::t('app', 'File'),
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
            'name',
            'date',
            'number',
            'file',
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
            'monographBrochures',
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
    }    
    
    
    /**
     * Gets query for [[MonographBrochures]].
     *
     * @return \yii\db\ActiveQuery|MonographBrochureQuery
     */
    public function getMonographBrochures()
    {
        return $this->hasMany(MonographBrochure::className(), ['basis_for_publication_id' => 'id']);
    }

    /**
     * BasisForPublication createItem <$model, $post>
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
     * BasisForPublication updateItem <$model, $post>
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
     * @return BasisForPublicationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BasisForPublicationQuery(get_called_class());
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
