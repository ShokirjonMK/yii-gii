<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%oferta}}".
 *
 * @property int $id
 * @property string $role
 * @property int|null $is_comformed
 * @property int|null $order
 * @property int|null $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $is_deleted
 */
class Oferta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%oferta}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role', 'created_at', 'updated_at'], 'required'],
            [['is_comformed', 'order', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted'], 'integer'],
            [['role'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'role' => Yii::t('app', 'Role'),
            'is_comformed' => Yii::t('app', 'Is Comformed'),
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
     * @return OfertaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OfertaQuery(get_called_class());
    }
}
