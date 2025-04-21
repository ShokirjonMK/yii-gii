<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%scientific_article}}".
 *
 * @property int $id
 * @property string $name Name of the article
 * @property string|null $abstract Abstract of the article
 * @property string|null $key_words Key words
 * @property string|null $co_authors Co-authors
 * @property string|null $journal_name Journal name
 * @property string|null $journal_country Journal country
 * @property int $user_id User ID
 * @property int|null $scientific_specialization_id Scientific specialization ID
 * @property string|null $specialization Specialization
 * @property int|null $language_id Language of the article
 * @property string|null $issn ISSN number
 * @property string|null $doi DOI number
 * @property string|null $date Date of publication
 * @property string|null $journal_type Type of journal
 * @property int|null $kpi_data yes in kpi data
 * @property string|null $sdg SDG data
 * @property string|null $kavrtili Kavrtili data
 * @property int|null $type type of the article (1 = milliy oak, 2 = xalqaro jurnali (scopus va wosdan tashqari) chop etilgani, 3 = Scopus va wos-à Ilmiy boshqarmani o’zi kiritadi)
 * @property string|null $file File
 * @property string|null $link link
 * @property int|null $order Order of the item
 * @property int|null $status Status of the item (1 = active, 0 = inactive)
 * @property int|null $is_deleted Is the item deleted (0 = no, 1 = yes)
 * @property int $created_at Creation timestamp
 * @property int $updated_at Update timestamp
 * @property int $created_by ID of the user who created the record
 * @property int $updated_by ID of the user who last updated the record
 * @property int $archived Is the item archived (0 = no, 1 = yes)
 *
 * @property Language $language
 * @property ScientificSpecialization $scientificSpecialization
 * @property User $user
 */
class ScientificArticle extends \yii\db\ActiveRecord
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
        return '{{%scientific_article}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'user_id'], 'required'],
            [['abstract', 'key_words', 'co_authors'], 'string'],
            [['user_id', 'scientific_specialization_id', 'language_id', 'kpi_data', 'type', 'order', 'status', 'is_deleted', 'created_at', 'updated_at', 'created_by', 'updated_by', 'archived'], 'integer'],
            [['date'], 'safe'],
            [['name', 'journal_name', 'journal_country', 'specialization', 'issn', 'doi', 'journal_type', 'sdg', 'kavrtili', 'file', 'link'], 'string', 'max' => 255],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
            [['scientific_specialization_id'], 'exist', 'skipOnError' => true, 'targetClass' => ScientificSpecialization::className(), 'targetAttribute' => ['scientific_specialization_id' => 'id']],
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
            'name' => Yii::t('app', 'Name of the article'),
            'abstract' => Yii::t('app', 'Abstract of the article'),
            'key_words' => Yii::t('app', 'Key words'),
            'co_authors' => Yii::t('app', 'Co-authors'),
            'journal_name' => Yii::t('app', 'Journal name'),
            'journal_country' => Yii::t('app', 'Journal country'),
            'user_id' => Yii::t('app', 'User ID'),
            'scientific_specialization_id' => Yii::t('app', 'Scientific specialization ID'),
            'specialization' => Yii::t('app', 'Specialization'),
            'language_id' => Yii::t('app', 'Language of the article'),
            'issn' => Yii::t('app', 'ISSN number'),
            'doi' => Yii::t('app', 'DOI number'),
            'date' => Yii::t('app', 'Date of publication'),
            'journal_type' => Yii::t('app', 'Type of journal'),
            'kpi_data' => Yii::t('app', 'yes in kpi data'),
            'sdg' => Yii::t('app', 'SDG data'),
            'kavrtili' => Yii::t('app', 'Kavrtili data'),
            'type' => Yii::t('app', 'type of the article (1 = milliy oak, 2 = xalqaro jurnali (scopus va wosdan tashqari) chop etilgani, 3 = Scopus va wos-à Ilmiy boshqarmani o’zi kiritadi)'),
            'file' => Yii::t('app', 'File'),
            'link' => Yii::t('app', 'link'),
            'order' => Yii::t('app', 'Order of the item'),
            'status' => Yii::t('app', 'Status of the item (1 = active, 0 = inactive)'),
            'is_deleted' => Yii::t('app', 'Is the item deleted (0 = no, 1 = yes)'),
            'created_at' => Yii::t('app', 'Creation timestamp'),
            'updated_at' => Yii::t('app', 'Update timestamp'),
            'created_by' => Yii::t('app', 'ID of the user who created the record'),
            'updated_by' => Yii::t('app', 'ID of the user who last updated the record'),
            'archived' => Yii::t('app', 'Is the item archived (0 = no, 1 = yes)'),
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
            'abstract',
            'key_words',
            'co_authors',
            'journal_name',
            'journal_country',
            'user_id',
            'scientific_specialization_id',
            'specialization',
            'language_id',
            'issn',
            'doi',
            'date',
            'journal_type',
            'kpi_data',
            'sdg',
            'kavrtili',
            'type',
            'file',
            'link',
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
            'language',
            'scientificSpecialization',
            'user',
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
    }    
    
    
    /**
     * Gets query for [[Language]].
     *
     * @return \yii\db\ActiveQuery|LanguageQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * ScientificArticle createItem <$model, $post>
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
     * ScientificArticle updateItem <$model, $post>
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
     * @return ScientificArticleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ScientificArticleQuery(get_called_class());
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
