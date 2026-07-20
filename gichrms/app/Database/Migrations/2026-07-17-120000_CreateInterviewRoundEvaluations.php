<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInterviewRoundEvaluations extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'application_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'round_number' => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true],
            'round_name' => ['type' => 'VARCHAR', 'constraint' => 120],
            'technical_score' => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true],
            'communication_score' => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true],
            'culture_score' => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true],
            'total_score' => ['type' => 'TINYINT', 'constraint' => 3, 'unsigned' => true],
            'decision' => ['type' => 'VARCHAR', 'constraint' => 40],
            'notes' => ['type' => 'TEXT', 'null' => true],
            'evaluated_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'evaluated_at' => ['type' => 'DATETIME'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['application_id', 'round_number']);
        $this->forge->addKey(['application_id', 'evaluated_at']);
        $this->forge->createTable('interview_round_evaluations', true);

        // Preserve scores that were recorded before round history was introduced.
        $applications = $this->db->table('job_applications')
            ->where('total_score IS NOT NULL', null, false)
            ->get()
            ->getResultArray();
        foreach ($applications as $application) {
            $roundName = trim((string) ($application['interview_round'] ?? 'Round 1')) ?: 'Round 1';
            preg_match('/Round\s+(\d+)/i', $roundName, $match);
            $this->db->table('interview_round_evaluations')->insert([
                'application_id' => (int) $application['id'],
                'round_number' => max(1, (int) ($match[1] ?? 1)),
                'round_name' => $roundName,
                'technical_score' => (int) ($application['technical_score'] ?? 0),
                'communication_score' => (int) ($application['communication_score'] ?? 0),
                'culture_score' => (int) ($application['culture_score'] ?? 0),
                'total_score' => (int) $application['total_score'],
                'decision' => (string) ($application['evaluation_status'] ?? $application['status'] ?? 'Completed'),
                'notes' => $application['interview_notes'] ?? null,
                'evaluated_at' => $application['evaluated_at'] ?? date('Y-m-d H:i:s'),
            ]);
        }
    }

    public function down()
    {
        $this->forge->dropTable('interview_round_evaluations', true);
    }
}
