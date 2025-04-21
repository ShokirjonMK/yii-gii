<?php

namespace app\models;

use api\resources\ResourceTrait;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%student}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $tutor_id tutor
 * @property int|null $faculty_id
 * @property int|null $direction_id
 * @property int|null $course_id
 * @property int|null $edu_year_id
 * @property int|null $edu_type_id
 * @property int|null $edu_form_id talim shakli id 
 * @property int|null $edu_lang_id
 * @property int|null $edu_plan_id
 * @property int|null $is_contract
 * @property string|null $diplom_number
 * @property string|null $diplom_seria
 * @property string|null $diplom_date
 * @property string|null $description
 * @property int|null $order
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int $updated_by
 * @property int $is_deleted
 * @property int|null $gender 1-erkak 0-ayol
 * @property int|null $social_category_id  ijtimoiy toifa 
 * @property int|null $residence_status_id category_of_cohabitant id 
 * @property int|null $category_of_cohabitant_id category_of_cohabitant 
 * @property int|null $student_category_id student_category id 
 * @property int|null $partners_count partners_count  
 * @property string|null $live_location live_location  
 * @property string|null $parent_phone parent_phone  
 * @property string|null $res_person_phone res_person_phone  
 * @property string|null $last_education last_education  
 *
 * @property AttendReason[] $attendReasons
 * @property CategoryOfCohabitant $categoryOfCohabitant
 * @property ContractInfo[] $contractInfos
 * @property Course $course
 * @property Direction $direction
 * @property EduPlan $eduPlan
 * @property EduType $eduType
 * @property EduYear $eduYear
 * @property ExamControlStudentTegilmasin[] $examControlStudentTegilmasins
 * @property ExamControlStudent[] $examControlStudents
 * @property ExamStudent15[] $examStudent15s
 * @property ExamStudent2223[] $examStudent2223s
 * @property ExamStudentAnswer15[] $examStudentAnswer15s
 * @property ExamStudentAnswer2223[] $examStudentAnswer2223s
 * @property ExamStudentAnswer[] $examStudentAnswers
 * @property ExamStudentReaxam2223[] $examStudentReaxam2223s
 * @property ExamStudentReaxam[] $examStudentReaxams
 * @property ExamStudentReexam[] $examStudentReexams
 * @property ExamStudent[] $examStudents
 * @property ExamTeacherCheck[] $examTeacherChecks
 * @property Faculty $faculty
 * @property HostelApp[] $hostelApps
 * @property HostelDoc[] $hostelDocs
 * @property HostelStudentRoom[] $hostelStudentRooms
 * @property Military[] $militaries
 * @property OlympicCertificate[] $olympicCertificates
 * @property PollUser[] $pollUsers
 * @property QuestionStudentAnswer[] $questionStudentAnswers
 * @property ResidenceStatus $residenceStatus
 * @property SocialCategory $socialCategory
 * @property SportCertificate[] $sportCertificates
 * @property StudentAttendCopy1[] $studentAttendCopy1s
 * @property StudentAttend[] $studentAttends
 * @property StudentCategory $studentCategory
 * @property StudentClub[] $studentClubs
 * @property StudentMarkCopy1[] $studentMarkCopy1s
 * @property StudentMarkCopy2[] $studentMarkCopy2s
 * @property StudentMark[] $studentMarks
 * @property StudentOrder[] $studentOrders
 * @property StudentSubjectRestrict[] $studentSubjectRestricts
 * @property StudentTimeOption16[] $studentTimeOption16s
 * @property StudentTimeOption[] $studentTimeOptions
 * @property StudentTimeTable16[] $studentTimeTable16s
 * @property StudentTimeTable[] $studentTimeTables
 * @property User $tutor
 * @property User $user
 */
class Student extends \yii\db\ActiveRecord
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
        return '{{%student}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'tutor_id', 'faculty_id', 'direction_id', 'course_id', 'edu_year_id', 'edu_type_id', 'edu_form_id', 'edu_lang_id', 'edu_plan_id', 'is_contract', 'order', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_deleted', 'gender', 'social_category_id', 'residence_status_id', 'category_of_cohabitant_id', 'student_category_id', 'partners_count'], 'integer'],
            [['diplom_date'], 'safe'],
            [['description', 'live_location', 'last_education'], 'string'],
            [['diplom_number', 'diplom_seria'], 'string', 'max' => 255],
            [['parent_phone', 'res_person_phone'], 'string', 'max' => 55],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['direction_id'], 'exist', 'skipOnError' => true, 'targetClass' => Direction::className(), 'targetAttribute' => ['direction_id' => 'id']],
            [['edu_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduType::className(), 'targetAttribute' => ['edu_type_id' => 'id']],
            [['edu_year_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduYear::className(), 'targetAttribute' => ['edu_year_id' => 'id']],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_id' => 'id']],
            [['category_of_cohabitant_id'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryOfCohabitant::className(), 'targetAttribute' => ['category_of_cohabitant_id' => 'id']],
            [['residence_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ResidenceStatus::className(), 'targetAttribute' => ['residence_status_id' => 'id']],
            [['social_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => SocialCategory::className(), 'targetAttribute' => ['social_category_id' => 'id']],
            [['student_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => StudentCategory::className(), 'targetAttribute' => ['student_category_id' => 'id']],
            [['tutor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['tutor_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['edu_plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduPlan::className(), 'targetAttribute' => ['edu_plan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'tutor_id' => Yii::t('app', 'tutor'),
            'faculty_id' => Yii::t('app', 'Faculty ID'),
            'direction_id' => Yii::t('app', 'Direction ID'),
            'course_id' => Yii::t('app', 'Course ID'),
            'edu_year_id' => Yii::t('app', 'Edu Year ID'),
            'edu_type_id' => Yii::t('app', 'Edu Type ID'),
            'edu_form_id' => Yii::t('app', 'talim shakli id '),
            'edu_lang_id' => Yii::t('app', 'Edu Lang ID'),
            'edu_plan_id' => Yii::t('app', 'Edu Plan ID'),
            'is_contract' => Yii::t('app', 'Is Contract'),
            'diplom_number' => Yii::t('app', 'Diplom Number'),
            'diplom_seria' => Yii::t('app', 'Diplom Seria'),
            'diplom_date' => Yii::t('app', 'Diplom Date'),
            'description' => Yii::t('app', 'Description'),
            'order' => Yii::t('app', 'Order'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'gender' => Yii::t('app', '1-erkak 0-ayol'),
            'social_category_id' => Yii::t('app', ' ijtimoiy toifa '),
            'residence_status_id' => Yii::t('app', 'category_of_cohabitant id '),
            'category_of_cohabitant_id' => Yii::t('app', 'category_of_cohabitant '),
            'student_category_id' => Yii::t('app', 'student_category id '),
            'partners_count' => Yii::t('app', 'partners_count  '),
            'live_location' => Yii::t('app', 'live_location  '),
            'parent_phone' => Yii::t('app', 'parent_phone  '),
            'res_person_phone' => Yii::t('app', 'res_person_phone  '),
            'last_education' => Yii::t('app', 'last_education  '),
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function fields()
    {
        $fields =  [
            'id',
            'user_id',
            'tutor_id',
            'faculty_id',
            'direction_id',
            'course_id',
            'edu_year_id',
            'edu_type_id',
            'edu_form_id',
            'edu_lang_id',
            'edu_plan_id',
            'is_contract',
            'diplom_number',
            'diplom_seria',
            'diplom_date',
            'description',
            'order',
            'status',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'is_deleted',
            'gender',
            'social_category_id',
            'residence_status_id',
            'category_of_cohabitant_id',
            'student_category_id',
            'partners_count',
            'live_location',
            'parent_phone',
            'res_person_phone',
            'last_education',
        ];
        return $fields;
    }

    public function extraFields()
    {
        $extraFields =  [
            'attendReasons',
            'categoryOfCohabitant',
            'contractInfos',
            'course',
            'direction',
            'eduPlan',
            'eduType',
            'eduYear',
            'examControlStudentTegilmasins',
            'examControlStudents',
            'examStudent15s',
            'examStudent2223s',
            'examStudentAnswer15s',
            'examStudentAnswer2223s',
            'examStudentAnswers',
            'examStudentReaxam2223s',
            'examStudentReaxams',
            'examStudentReexams',
            'examStudents',
            'examTeacherChecks',
            'faculty',
            'hostelApps',
            'hostelDocs',
            'hostelStudentRooms',
            'militaries',
            'olympicCertificates',
            'pollUsers',
            'questionStudentAnswers',
            'residenceStatus',
            'socialCategory',
            'sportCertificates',
            'studentAttendCopy1s',
            'studentAttends',
            'studentCategory',
            'studentClubs',
            'studentMarkCopy1s',
            'studentMarkCopy2s',
            'studentMarks',
            'studentOrders',
            'studentSubjectRestricts',
            'studentTimeOption16s',
            'studentTimeOptions',
            'studentTimeTable16s',
            'studentTimeTables',
            'tutor',
            'user',
            
            'createdBy',
            'updatedBy',
            'createdAt',
            'updatedAt',
        ];

        return $extraFields;
    }    
    
    
    /**
     * Gets query for [[AttendReasons]].
     *
     * @return \yii\db\ActiveQuery|AttendReasonQuery
     */
    public function getAttendReasons()
    {
        return $this->hasMany(AttendReason::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[CategoryOfCohabitant]].
     *
     * @return \yii\db\ActiveQuery|CategoryOfCohabitantQuery
     */
    public function getCategoryOfCohabitant()
    {
        return $this->hasOne(CategoryOfCohabitant::className(), ['id' => 'category_of_cohabitant_id']);
    }

    /**
     * Gets query for [[ContractInfos]].
     *
     * @return \yii\db\ActiveQuery|ContractInfoQuery
     */
    public function getContractInfos()
    {
        return $this->hasMany(ContractInfo::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery|CourseQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * Gets query for [[Direction]].
     *
     * @return \yii\db\ActiveQuery|DirectionQuery
     */
    public function getDirection()
    {
        return $this->hasOne(Direction::className(), ['id' => 'direction_id']);
    }

    /**
     * Gets query for [[EduPlan]].
     *
     * @return \yii\db\ActiveQuery|EduPlanQuery
     */
    public function getEduPlan()
    {
        return $this->hasOne(EduPlan::className(), ['id' => 'edu_plan_id']);
    }

    /**
     * Gets query for [[EduType]].
     *
     * @return \yii\db\ActiveQuery|EduTypeQuery
     */
    public function getEduType()
    {
        return $this->hasOne(EduType::className(), ['id' => 'edu_type_id']);
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
     * Gets query for [[ExamControlStudentTegilmasins]].
     *
     * @return \yii\db\ActiveQuery|ExamControlStudentTegilmasinQuery
     */
    public function getExamControlStudentTegilmasins()
    {
        return $this->hasMany(ExamControlStudentTegilmasin::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[ExamControlStudents]].
     *
     * @return \yii\db\ActiveQuery|ExamControlStudentQuery
     */
    public function getExamControlStudents()
    {
        return $this->hasMany(ExamControlStudent::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[ExamStudent15s]].
     *
     * @return \yii\db\ActiveQuery|ExamStudent15Query
     */
    public function getExamStudent15s()
    {
        return $this->hasMany(ExamStudent15::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[ExamStudent2223s]].
     *
     * @return \yii\db\ActiveQuery|ExamStudent2223Query
     */
    public function getExamStudent2223s()
    {
        return $this->hasMany(ExamStudent2223::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[ExamStudentAnswer15s]].
     *
     * @return \yii\db\ActiveQuery|ExamStudentAnswer15Query
     */
    public function getExamStudentAnswer15s()
    {
        return $this->hasMany(ExamStudentAnswer15::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[ExamStudentAnswer2223s]].
     *
     * @return \yii\db\ActiveQuery|ExamStudentAnswer2223Query
     */
    public function getExamStudentAnswer2223s()
    {
        return $this->hasMany(ExamStudentAnswer2223::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[ExamStudentAnswers]].
     *
     * @return \yii\db\ActiveQuery|ExamStudentAnswerQuery
     */
    public function getExamStudentAnswers()
    {
        return $this->hasMany(ExamStudentAnswer::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[ExamStudentReaxam2223s]].
     *
     * @return \yii\db\ActiveQuery|ExamStudentReaxam2223Query
     */
    public function getExamStudentReaxam2223s()
    {
        return $this->hasMany(ExamStudentReaxam2223::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[ExamStudentReaxams]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getExamStudentReaxams()
    {
        return $this->hasMany(ExamStudentReaxam::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[ExamStudentReexams]].
     *
     * @return \yii\db\ActiveQuery|ExamStudentReexamQuery
     */
    public function getExamStudentReexams()
    {
        return $this->hasMany(ExamStudentReexam::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[ExamStudents]].
     *
     * @return \yii\db\ActiveQuery|ExamStudentQuery
     */
    public function getExamStudents()
    {
        return $this->hasMany(ExamStudent::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[ExamTeacherChecks]].
     *
     * @return \yii\db\ActiveQuery|ExamTeacherCheckQuery
     */
    public function getExamTeacherChecks()
    {
        return $this->hasMany(ExamTeacherCheck::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[Faculty]].
     *
     * @return \yii\db\ActiveQuery|FacultyQuery
     */
    public function getFaculty()
    {
        return $this->hasOne(Faculty::className(), ['id' => 'faculty_id']);
    }

    /**
     * Gets query for [[HostelApps]].
     *
     * @return \yii\db\ActiveQuery|HostelAppQuery
     */
    public function getHostelApps()
    {
        return $this->hasMany(HostelApp::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[HostelDocs]].
     *
     * @return \yii\db\ActiveQuery|HostelDocQuery
     */
    public function getHostelDocs()
    {
        return $this->hasMany(HostelDoc::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[HostelStudentRooms]].
     *
     * @return \yii\db\ActiveQuery|HostelStudentRoomQuery
     */
    public function getHostelStudentRooms()
    {
        return $this->hasMany(HostelStudentRoom::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[Militaries]].
     *
     * @return \yii\db\ActiveQuery|MilitaryQuery
     */
    public function getMilitaries()
    {
        return $this->hasMany(Military::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[OlympicCertificates]].
     *
     * @return \yii\db\ActiveQuery|OlympicCertificateQuery
     */
    public function getOlympicCertificates()
    {
        return $this->hasMany(OlympicCertificate::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[PollUsers]].
     *
     * @return \yii\db\ActiveQuery|PollUserQuery
     */
    public function getPollUsers()
    {
        return $this->hasMany(PollUser::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[QuestionStudentAnswers]].
     *
     * @return \yii\db\ActiveQuery|QuestionStudentAnswerQuery
     */
    public function getQuestionStudentAnswers()
    {
        return $this->hasMany(QuestionStudentAnswer::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[ResidenceStatus]].
     *
     * @return \yii\db\ActiveQuery|ResidenceStatusQuery
     */
    public function getResidenceStatus()
    {
        return $this->hasOne(ResidenceStatus::className(), ['id' => 'residence_status_id']);
    }

    /**
     * Gets query for [[SocialCategory]].
     *
     * @return \yii\db\ActiveQuery|SocialCategoryQuery
     */
    public function getSocialCategory()
    {
        return $this->hasOne(SocialCategory::className(), ['id' => 'social_category_id']);
    }

    /**
     * Gets query for [[SportCertificates]].
     *
     * @return \yii\db\ActiveQuery|SportCertificateQuery
     */
    public function getSportCertificates()
    {
        return $this->hasMany(SportCertificate::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[StudentAttendCopy1s]].
     *
     * @return \yii\db\ActiveQuery|StudentAttendCopy1Query
     */
    public function getStudentAttendCopy1s()
    {
        return $this->hasMany(StudentAttendCopy1::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[StudentAttends]].
     *
     * @return \yii\db\ActiveQuery|StudentAttendQuery
     */
    public function getStudentAttends()
    {
        return $this->hasMany(StudentAttend::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[StudentCategory]].
     *
     * @return \yii\db\ActiveQuery|StudentCategoryQuery
     */
    public function getStudentCategory()
    {
        return $this->hasOne(StudentCategory::className(), ['id' => 'student_category_id']);
    }

    /**
     * Gets query for [[StudentClubs]].
     *
     * @return \yii\db\ActiveQuery|StudentClubQuery
     */
    public function getStudentClubs()
    {
        return $this->hasMany(StudentClub::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[StudentMarkCopy1s]].
     *
     * @return \yii\db\ActiveQuery|StudentMarkCopy1Query
     */
    public function getStudentMarkCopy1s()
    {
        return $this->hasMany(StudentMarkCopy1::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[StudentMarkCopy2s]].
     *
     * @return \yii\db\ActiveQuery|StudentMarkCopy2Query
     */
    public function getStudentMarkCopy2s()
    {
        return $this->hasMany(StudentMarkCopy2::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[StudentMarks]].
     *
     * @return \yii\db\ActiveQuery|StudentMarkQuery
     */
    public function getStudentMarks()
    {
        return $this->hasMany(StudentMark::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[StudentOrders]].
     *
     * @return \yii\db\ActiveQuery|StudentOrderQuery
     */
    public function getStudentOrders()
    {
        return $this->hasMany(StudentOrder::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[StudentSubjectRestricts]].
     *
     * @return \yii\db\ActiveQuery|StudentSubjectRestrictQuery
     */
    public function getStudentSubjectRestricts()
    {
        return $this->hasMany(StudentSubjectRestrict::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[StudentTimeOption16s]].
     *
     * @return \yii\db\ActiveQuery|StudentTimeOption16Query
     */
    public function getStudentTimeOption16s()
    {
        return $this->hasMany(StudentTimeOption16::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[StudentTimeOptions]].
     *
     * @return \yii\db\ActiveQuery|StudentTimeOptionQuery
     */
    public function getStudentTimeOptions()
    {
        return $this->hasMany(StudentTimeOption::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[StudentTimeTable16s]].
     *
     * @return \yii\db\ActiveQuery|StudentTimeTable16Query
     */
    public function getStudentTimeTable16s()
    {
        return $this->hasMany(StudentTimeTable16::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[StudentTimeTables]].
     *
     * @return \yii\db\ActiveQuery|StudentTimeTableQuery
     */
    public function getStudentTimeTables()
    {
        return $this->hasMany(StudentTimeTable::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[Tutor]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getTutor()
    {
        return $this->hasOne(User::className(), ['id' => 'tutor_id']);
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
     * Student createItem <$model, $post>
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
     * Student updateItem <$model, $post>
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
     * @return StudentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StudentQuery(get_called_class());
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
