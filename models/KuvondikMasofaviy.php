<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%kuvondik_masofaviy}}".
 *
 * @property int $id
 * @property string|null $passport_pin
 * @property string|null $last_name
 * @property string|null $first_name
 * @property string|null $middle_name
 * @property int|null $citizenship_id
 * @property int|null $country_id
 * @property int|null $nationality_id
 * @property int|null $gender
 * @property string|null $birthday
 * @property string|null $passport_given_date
 * @property int|null $course_id
 * @property int|null $faculty_id
 * @property int|null $direction_id
 * @property int|null $edu_year_id
 * @property int|null $edu_plan_id
 * @property int|null $edu_type_id
 * @property int|null $edu_lang_id
 * @property int|null $edu_form_id
 * @property int|null $is_contract
 * @property int|null $student_category_id
 * @property int|null $tutor_id
 */
class KuvondikMasofaviy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%kuvondik_masofaviy}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['citizenship_id', 'country_id', 'nationality_id', 'gender', 'course_id', 'faculty_id', 'direction_id', 'edu_year_id', 'edu_plan_id', 'edu_type_id', 'edu_lang_id', 'edu_form_id', 'is_contract', 'student_category_id', 'tutor_id'], 'integer'],
            [['birthday', 'passport_given_date'], 'safe'],
            [['passport_pin', 'last_name', 'first_name', 'middle_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'passport_pin' => Yii::t('app', 'Passport Pin'),
            'last_name' => Yii::t('app', 'Last Name'),
            'first_name' => Yii::t('app', 'First Name'),
            'middle_name' => Yii::t('app', 'Middle Name'),
            'citizenship_id' => Yii::t('app', 'Citizenship ID'),
            'country_id' => Yii::t('app', 'Country ID'),
            'nationality_id' => Yii::t('app', 'Nationality ID'),
            'gender' => Yii::t('app', 'Gender'),
            'birthday' => Yii::t('app', 'Birthday'),
            'passport_given_date' => Yii::t('app', 'Passport Given Date'),
            'course_id' => Yii::t('app', 'Course ID'),
            'faculty_id' => Yii::t('app', 'Faculty ID'),
            'direction_id' => Yii::t('app', 'Direction ID'),
            'edu_year_id' => Yii::t('app', 'Edu Year ID'),
            'edu_plan_id' => Yii::t('app', 'Edu Plan ID'),
            'edu_type_id' => Yii::t('app', 'Edu Type ID'),
            'edu_lang_id' => Yii::t('app', 'Edu Lang ID'),
            'edu_form_id' => Yii::t('app', 'Edu Form ID'),
            'is_contract' => Yii::t('app', 'Is Contract'),
            'student_category_id' => Yii::t('app', 'Student Category ID'),
            'tutor_id' => Yii::t('app', 'Tutor ID'),
        ];
    }
    
    /**
     * KuvondikMasofaviy createItem <$model, $post>
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
     * KuvondikMasofaviy updateItem <$model, $post>
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
     * @return KuvondikMasofaviyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KuvondikMasofaviyQuery(get_called_class());
    }
}
