<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string|null $verification_token
 * @property string|null $access_token
 * @property int|null $access_token_time
 * @property string|null $email
 * @property string|null $template
 * @property string|null $layout
 * @property string|null $view
 * @property string|null $meta
 * @property int $status
 * @property int $deleted
 * @property int $cacheable
 * @property int $searchable
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Action[] $actions
 * @property Content[] $contents
 * @property Department[] $departments
 * @property ElectionVote[] $electionVotes
 * @property Faculty[] $faculties
 * @property Kafedra[] $kafedras
 * @property KpiMarking[] $kpiMarkings
 * @property KpiMark[] $kpiMarks
 * @property KpiStoreCopy1[] $kpiStoreCopy1s
 * @property KpiStore[] $kpiStores
 * @property KpiStore[] $kpiStores0
 * @property LangCertificate[] $langCertificates
 * @property Military[] $militaries
 * @property NotificationUser[] $notificationUsers
 * @property OlympicCertificate[] $olympicCertificates
 * @property OtherCertificate[] $otherCertificates
 * @property PasswordEncrypts[] $passwordEncrypts
 * @property Profile[] $profiles
 * @property RelativeInfo[] $relativeInfos
 * @property SportCertificate[] $sportCertificates
 * @property StudentOrder[] $studentOrders
 * @property Student[] $students
 * @property Student[] $students0
 * @property SubjectAccess[] $subjectAccesses
 * @property SubjectContentMark[] $subjectContentMarks
 * @property SubjectTopicReference[] $subjectTopicReferences
 * @property TeacherAccess[] $teacherAccesses
 * @property UserAccess[] $userAccesses
 * @property Vocation[] $vocations
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['access_token_time', 'status', 'deleted', 'cacheable', 'searchable', 'created_at', 'updated_at'], 'integer'],
            [['meta'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'verification_token', 'email', 'template', 'layout', 'view'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['access_token'], 'string', 'max' => 100],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'verification_token' => Yii::t('app', 'Verification Token'),
            'access_token' => Yii::t('app', 'Access Token'),
            'access_token_time' => Yii::t('app', 'Access Token Time'),
            'email' => Yii::t('app', 'Email'),
            'template' => Yii::t('app', 'Template'),
            'layout' => Yii::t('app', 'Layout'),
            'view' => Yii::t('app', 'View'),
            'meta' => Yii::t('app', 'Meta'),
            'status' => Yii::t('app', 'Status'),
            'deleted' => Yii::t('app', 'Deleted'),
            'cacheable' => Yii::t('app', 'Cacheable'),
            'searchable' => Yii::t('app', 'Searchable'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Actions]].
     *
     * @return \yii\db\ActiveQuery|ActionQuery
     */
    public function getActions()
    {
        return $this->hasMany(Action::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Contents]].
     *
     * @return \yii\db\ActiveQuery|ContentQuery
     */
    public function getContents()
    {
        return $this->hasMany(Content::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Departments]].
     *
     * @return \yii\db\ActiveQuery|DepartmentQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[ElectionVotes]].
     *
     * @return \yii\db\ActiveQuery|ElectionVoteQuery
     */
    public function getElectionVotes()
    {
        return $this->hasMany(ElectionVote::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Faculties]].
     *
     * @return \yii\db\ActiveQuery|FacultyQuery
     */
    public function getFaculties()
    {
        return $this->hasMany(Faculty::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Kafedras]].
     *
     * @return \yii\db\ActiveQuery|KafedraQuery
     */
    public function getKafedras()
    {
        return $this->hasMany(Kafedra::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[KpiMarkings]].
     *
     * @return \yii\db\ActiveQuery|KpiMarkingQuery
     */
    public function getKpiMarkings()
    {
        return $this->hasMany(KpiMarking::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[KpiMarks]].
     *
     * @return \yii\db\ActiveQuery|KpiMarkQuery
     */
    public function getKpiMarks()
    {
        return $this->hasMany(KpiMark::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[KpiStoreCopy1s]].
     *
     * @return \yii\db\ActiveQuery|KpiStoreCopy1Query
     */
    public function getKpiStoreCopy1s()
    {
        return $this->hasMany(KpiStoreCopy1::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[KpiStores]].
     *
     * @return \yii\db\ActiveQuery|KpiStoreQuery
     */
    public function getKpiStores()
    {
        return $this->hasMany(KpiStore::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[KpiStores0]].
     *
     * @return \yii\db\ActiveQuery|KpiStoreQuery
     */
    public function getKpiStores0()
    {
        return $this->hasMany(KpiStore::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[LangCertificates]].
     *
     * @return \yii\db\ActiveQuery|LangCertificateQuery
     */
    public function getLangCertificates()
    {
        return $this->hasMany(LangCertificate::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Militaries]].
     *
     * @return \yii\db\ActiveQuery|MilitaryQuery
     */
    public function getMilitaries()
    {
        return $this->hasMany(Military::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[NotificationUsers]].
     *
     * @return \yii\db\ActiveQuery|NotificationUserQuery
     */
    public function getNotificationUsers()
    {
        return $this->hasMany(NotificationUser::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[OlympicCertificates]].
     *
     * @return \yii\db\ActiveQuery|OlympicCertificateQuery
     */
    public function getOlympicCertificates()
    {
        return $this->hasMany(OlympicCertificate::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[OtherCertificates]].
     *
     * @return \yii\db\ActiveQuery|OtherCertificateQuery
     */
    public function getOtherCertificates()
    {
        return $this->hasMany(OtherCertificate::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[PasswordEncrypts]].
     *
     * @return \yii\db\ActiveQuery|PasswordEncryptsQuery
     */
    public function getPasswordEncrypts()
    {
        return $this->hasMany(PasswordEncrypts::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Profiles]].
     *
     * @return \yii\db\ActiveQuery|ProfileQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[RelativeInfos]].
     *
     * @return \yii\db\ActiveQuery|RelativeInfoQuery
     */
    public function getRelativeInfos()
    {
        return $this->hasMany(RelativeInfo::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[SportCertificates]].
     *
     * @return \yii\db\ActiveQuery|SportCertificateQuery
     */
    public function getSportCertificates()
    {
        return $this->hasMany(SportCertificate::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[StudentOrders]].
     *
     * @return \yii\db\ActiveQuery|StudentOrderQuery
     */
    public function getStudentOrders()
    {
        return $this->hasMany(StudentOrder::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery|StudentQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['tutor_id' => 'id']);
    }

    /**
     * Gets query for [[Students0]].
     *
     * @return \yii\db\ActiveQuery|StudentQuery
     */
    public function getStudents0()
    {
        return $this->hasMany(Student::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[SubjectAccesses]].
     *
     * @return \yii\db\ActiveQuery|SubjectAccessQuery
     */
    public function getSubjectAccesses()
    {
        return $this->hasMany(SubjectAccess::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[SubjectContentMarks]].
     *
     * @return \yii\db\ActiveQuery|SubjectContentMarkQuery
     */
    public function getSubjectContentMarks()
    {
        return $this->hasMany(SubjectContentMark::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[SubjectTopicReferences]].
     *
     * @return \yii\db\ActiveQuery|SubjectTopicReferenceQuery
     */
    public function getSubjectTopicReferences()
    {
        return $this->hasMany(SubjectTopicReference::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[TeacherAccesses]].
     *
     * @return \yii\db\ActiveQuery|TeacherAccessQuery
     */
    public function getTeacherAccesses()
    {
        return $this->hasMany(TeacherAccess::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserAccesses]].
     *
     * @return \yii\db\ActiveQuery|UserAccessQuery
     */
    public function getUserAccesses()
    {
        return $this->hasMany(UserAccess::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Vocations]].
     *
     * @return \yii\db\ActiveQuery|VocationQuery
     */
    public function getVocations()
    {
        return $this->hasMany(Vocation::className(), ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }
}
