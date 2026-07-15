<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPhaseFourOfferOnboardingFields extends Migration
{
    public function up()
    {
        $this->forge->addColumn('job_applications', [
            'offered_salary' => ['type' => 'DECIMAL', 'constraint' => '12,2', 'null' => true, 'after' => 'selected_at'],
            'salary_notes' => ['type' => 'TEXT', 'null' => true, 'after' => 'offered_salary'],
            'proposed_joining_date' => ['type' => 'DATE', 'null' => true, 'after' => 'salary_notes'],
            'bgv_document' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'proposed_joining_date'],
            'bgv_document_name' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'bgv_document'],
            'experience_document' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'bgv_document_name'],
            'experience_document_name' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'experience_document'],
            'documents_requested_at' => ['type' => 'DATETIME', 'null' => true, 'after' => 'experience_document_name'],
            'documents_uploaded_at' => ['type' => 'DATETIME', 'null' => true, 'after' => 'documents_requested_at'],
            'verification_status' => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => true, 'after' => 'documents_uploaded_at'],
            'verification_notes' => ['type' => 'TEXT', 'null' => true, 'after' => 'verification_status'],
            'verified_by' => ['type' => 'INT', 'constraint' => 11, 'null' => true, 'after' => 'verification_notes'],
            'verified_at' => ['type' => 'DATETIME', 'null' => true, 'after' => 'verified_by'],
            'offer_status' => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => true, 'after' => 'verified_at'],
            'offer_sent_at' => ['type' => 'DATETIME', 'null' => true, 'after' => 'offer_status'],
            'offer_responded_at' => ['type' => 'DATETIME', 'null' => true, 'after' => 'offer_sent_at'],
            'offer_decline_reason' => ['type' => 'TEXT', 'null' => true, 'after' => 'offer_responded_at'],
            'signature_name' => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true, 'after' => 'offer_decline_reason'],
            'signature_ip' => ['type' => 'VARCHAR', 'constraint' => 45, 'null' => true, 'after' => 'signature_name'],
            'hired_at' => ['type' => 'DATETIME', 'null' => true, 'after' => 'signature_ip'],
            'employee_profile_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true, 'after' => 'hired_at'],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('job_applications', [
            'offered_salary', 'salary_notes', 'proposed_joining_date', 'bgv_document', 'bgv_document_name',
            'experience_document', 'experience_document_name', 'documents_requested_at', 'documents_uploaded_at',
            'verification_status', 'verification_notes', 'verified_by', 'verified_at', 'offer_status',
            'offer_sent_at', 'offer_responded_at', 'offer_decline_reason', 'signature_name', 'signature_ip',
            'hired_at', 'employee_profile_id',
        ]);
    }
}
