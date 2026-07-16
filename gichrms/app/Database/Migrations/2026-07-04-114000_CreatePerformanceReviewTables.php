<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePerformanceReviewTables extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'emp_id' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'department' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'designation' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'qualification' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'date_of_join' => ['type' => 'DATE', 'null' => true],
            'date_of_confirmation' => ['type' => 'DATE', 'null' => true],
            'previous_experience' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'ro_name' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'ro_designation' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'total_percentage' => ['type' => 'DECIMAL', 'constraint' => '5,2', 'null' => true],
            'grade' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'created_at' => ['type' => 'TIMESTAMP', 'default' => new \CodeIgniter\Database\RawSql('CURRENT_TIMESTAMP')],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('performance_reviews', true);

        $this->createScoredSectionTable('professional_excellence', 'kra', 'kpi');
        $this->createScoredSectionTable('personal_excellence', 'attribute_name', 'indicator');

        $this->createReviewChild('special_initiatives', [
            'self_text' => ['type' => 'TEXT', 'null' => true],
            'ro_comment' => ['type' => 'TEXT', 'null' => true],
            'hod_comment' => ['type' => 'TEXT', 'null' => true],
        ]);

        foreach (['comments_on_role', 'ro_strengths', 'hod_strengths'] as $table) {
            $this->createReviewChild($table, [
                'strength' => ['type' => 'TEXT', 'null' => true],
                'improvement' => ['type' => 'TEXT', 'null' => true],
            ]);
        }

        $this->createReviewChild('personal_goals', [
            'last_year_goal' => ['type' => 'TEXT', 'null' => true],
            'current_year_goal' => ['type' => 'TEXT', 'null' => true],
        ]);

        $this->createReviewChild('personal_updates', [
            'last_year_question' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'last_year_answer' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'last_year_details' => ['type' => 'TEXT', 'null' => true],
            'current_year_question' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'current_year_answer' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'current_year_details' => ['type' => 'TEXT', 'null' => true],
        ]);

        $this->createReviewChild('review_comments', [
            'section_name' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'self_text' => ['type' => 'TEXT', 'null' => true],
            'ro_comment' => ['type' => 'TEXT', 'null' => true],
            'hod_comment' => ['type' => 'TEXT', 'null' => true],
        ]);

        $this->createReviewChild('ro_use_only', [
            'item_name' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'answer' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'details' => ['type' => 'TEXT', 'null' => true],
        ]);

        $this->createReviewChild('hrd_scores', [
            'parameter_name' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'available_points' => ['type' => 'DECIMAL', 'constraint' => '5,2', 'null' => true],
            'points_scored' => ['type' => 'DECIMAL', 'constraint' => '5,2', 'null' => true],
            'ro_comment' => ['type' => 'TEXT', 'null' => true],
        ]);

        $this->createReviewChild('signatures', [
            'role_name' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'signature' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'signed_date' => ['type' => 'DATE', 'null' => true],
        ]);
    }

    public function down()
    {
        foreach ([
            'signatures',
            'hrd_scores',
            'ro_use_only',
            'review_comments',
            'personal_updates',
            'personal_goals',
            'hod_strengths',
            'ro_strengths',
            'comments_on_role',
            'special_initiatives',
            'personal_excellence',
            'professional_excellence',
            'performance_reviews',
        ] as $table) {
            $this->forge->dropTable($table, true);
        }
    }

    private function createScoredSectionTable(string $table, string $firstLabel, string $secondLabel): void
    {
        $this->createReviewChild($table, [
            $firstLabel => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            $secondLabel => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'weightage' => ['type' => 'DECIMAL', 'constraint' => '5,2', 'null' => true],
            'self_percentage' => ['type' => 'DECIMAL', 'constraint' => '5,2', 'null' => true],
            'self_points' => ['type' => 'DECIMAL', 'constraint' => '5,2', 'null' => true],
            'ro_percentage' => ['type' => 'DECIMAL', 'constraint' => '5,2', 'null' => true],
            'ro_points' => ['type' => 'DECIMAL', 'constraint' => '5,2', 'null' => true],
        ]);
    }

    private function createReviewChild(string $table, array $fields): void
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'review_id' => ['type' => 'INT', 'constraint' => 11, 'null' => true],
        ] + $fields);
        $this->forge->addKey('id', true);
        $this->forge->addKey('review_id');
        $this->forge->addForeignKey('review_id', 'performance_reviews', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable($table, true);
    }
}
