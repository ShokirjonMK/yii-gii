<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%teacher_work_plan}}`.
 */
class m231009_050341_create_teacher_work_plan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName = Yii::$app->db->tablePrefix . 'student_subject';
        if (!(Yii::$app->db->getTableSchema($tableName, true) === null)) {
            $this->dropTable('student_subject');
        }

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // https://stackoverflow.com/questions/51278467/mysql-collation-utf8mb4-unicode-ci-vs-utf8mb4-default-collation
            // https://www.eversql.com/mysql-utf8-vs-utf8mb4-whats-the-difference-between-utf8-and-utf8mb4/
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%teacher_plan}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'subject_id' => $this->integer(11)->notNull(),
            'edu_year_id' => $this->integer(11)->notNull(),
            'semestr_type' => $this->tinyInteger(1)->defaultValue(1),
            'course_id' => $this->integer(11)->null(),
            'semestr_id' => $this->integer(11)->null(),

            'student_count' => $this->integer(11)->null(),
            'student_count_plan' => $this->integer(11)->null(),

            'lecture' => $this->integer(11)->null(),
            'lecture_plan' => $this->integer(11)->null(),

            'seminar' => $this->integer(11)->null(),
            'seminar_plan' => $this->integer(11)->null(),

            'practical' => $this->integer(11)->null(),
            'practical_plan' => $this->integer(11)->null(),

            'labarothoria' => $this->integer(11)->null(),
            'labarothoria_plan' => $this->integer(11)->null(),

            'advice' => $this->integer(11)->null(),
            'advice_plan' => $this->integer(11)->null(),

            'prepare' => $this->integer(11)->null(),
            'prepare_plan' => $this->integer(11)->null(),

            'checking' => $this->integer(11)->null(),
            'checking_plan' => $this->integer(11)->null(),

            'checking_appeal' => $this->integer(11)->null(),
            'checking_appeal_plan' => $this->integer(11)->null(),

            'lead_practice' => $this->integer(11)->null(),
            'lead_practice_plan' => $this->integer(11)->null(),

            'lead_graduation_work' => $this->integer(11)->null(),
            'lead_graduation_work_plan' => $this->integer(11)->null(),

            'dissertation_advicer' => $this->integer(11)->null(),
            'dissertation_advicer_plan' => $this->integer(11)->null(),

            'doctoral_consultation' => $this->integer(11)->null(),
            'doctoral_consultation_plan' => $this->integer(11)->null(),

            'supervisor_exam' => $this->integer(11)->null(),
            'supervisor_exam_plan' => $this->integer(11)->null(),

            'kazus_input' => $this->integer(11)->null(),
            'kazus_input_plan' => $this->integer(11)->null(),

            'legal_clinic' => $this->integer(11)->null(),
            'legal_clinic_plan' => $this->integer(11)->null(),

            'final_attestation' => $this->integer(11)->null(),
            'final_attestation_plan' => $this->integer(11)->null(),


            'description' => $this->text()->null(),

            'status' => $this->tinyInteger(1)->defaultValue(1),
            'is_deleted' => $this->tinyInteger(1)->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull()->defaultValue(0),
            'updated_by' => $this->integer()->notNull()->defaultValue(0),

        // ], $tableOptions);
        ]);
        $this->addForeignKey('tpu_teacher_plan_user', 'teacher_plan', 'user_id', 'users', 'id');
        $this->addForeignKey('tps_teacher_plan_subject', 'teacher_plan', 'subject_id', 'subject', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop foreign keys
        $this->dropForeignKey('tpu_teacher_plan_user', 'teacher_plan');
        $this->dropForeignKey('tps_teacher_plan_subject', 'teacher_plan');

        // Drop the 'teacher_plan' table
        $this->dropTable('{{%teacher_plan}}');
    }
}
