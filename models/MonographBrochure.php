<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%monograph_brochure}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $keys
 * @property string|null $co_author_user_ids
 * @property string|null $co_authors
 * @property int|null $pages
 * @property int|null $basis_for_publication_id
 * @property string|null $dio
 * @property string|null $udk
 * @property string|null $bbk
 * @property string|null $isbn
 * @property string|null $publisher_name
 * @property string|null $file
 * @property string|null $translator
 * @property int $user_id
 * @property int|null $in_library
 * @property int|null $order
 * @property int|null $status
 * @property int|null $is_deleted
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $archived
 *
 * @property BasisForPublication $basisForPublication
 * @property User $user
 */
class MonographBrochure extends \yii\db\ActiveRecord
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
        return '{{%monograph_brochure}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'co_authors', 'publisher_name', 'translator'], 'string'],
            [['co_author_user_ids'], 'safe'],
            [['pages', 'basis_for_publication_id', 'user_id', 'in_library', 'order', 'status', 'is_deleted', 'created_at', 'updated_at', 'created_by', 'updated_by', 'archived'], 'integer'],
            [['user_id'], 'required'],
            [['keys', 'dio', 'udk', 'bbk', 'isbn', 'file'], 'string', 'max' => 255],
            [['basis_for_publication_id'], 'exist', 'skipOnError' => true, 'targetClass' => BasisForPublication::className(), 'targetAttribute' => ['basis_for_publication_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'keys' => Yii::t('app', 'Keys'),
            'co_author_user_ids' => Yii::t('app', 'Co Author User Ids'),
            'co_authors' => Yii::t('app', 'Co Authors'),
            'pages' => Yii::t('app', 'Pages'),
            'basis_for_publication_id' => Yii::t('app', 'Basis For Publication ID'),
            'dio' => Yii::t('app', 'Dio'),
            'udk' => Yii::t('app', 'Udk'),
            'bbk' => Yii::t('app', 'Bbk'),
            'isbn' => Yii::t('app', 'Isbn'),
            'publisher_name' => Yii::t('app', 'Publisher Name'),
            'file' => Yii::t('app', 'File'),
            'translator' => Yii::t('app', 'Translator'),
            'user_id' => Yii::t('app', 'User ID'),
            'in_library' => Yii::t('app', 'In Library'),
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
            'keys',
            'co_author_user_ids',
            'co_authors',
            'pages',
            'basis_for_publication_id',
            'dio',
            'udk',
            'bbk',
            'isbn',
            'publisher_name',
            'file',
            'translator',
            'user_id',
            'in_library',
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
            'basisForPublication',
            'user',
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
    }    
    
    
    /**
     * Gets query for [[BasisForPublication]].
     *
     * @return \yii\db\ActiveQuery|BasisForPublicationQuery
     */
    public function getBasisForPublication()
    {
        return $this->hasOne(BasisForPublication::className(), ['id' => 'basis_for_publication_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * MonographBrochure createItem <$model, $post>
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
     * MonographBrochure updateItem <$model, $post>
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
     * @return MonographBrochureQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MonographBrochureQuery(get_called_class());
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
