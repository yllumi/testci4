<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class ScholarshipParticipants extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'user_id'           => ['type' => 'INT', 'unsigned' => true],
            'program'           => ['type' => 'VARCHAR', 'constraint' => 150],
            'fullname'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'email'             => ['type' => 'VARCHAR', 'constraint' => 255],
            'whatsapp'          => ['type' => 'VARCHAR', 'constraint' => 20],
            'birthday'          => ['type' => 'DATE', 'null' => true],
            'gender'            => ['type' => 'VARCHAR', 'constraint' => 10, 'DEFAULT' => 'male'], //['male', 'female']],
            'province'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'city'              => ['type' => 'VARCHAR', 'constraint' => 255],
            'occupation'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'work_experience'   => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'skill'             => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'institution'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'major'             => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'semester'          => ['type' => 'INT', 'null' => true, 'default' => 0],
            'grade'             => ['type' => 'INT', 'null' => true, 'default' => 0],
            'type_of_business'  => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'business_duration' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'education_level'   => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'graduation_year'   => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'link_business'     => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'last_project'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'reference'         => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'referral_code'     => ['type' => 'VARCHAR', 'constraint' => 20],
            'withdrawal'        => ['type' => 'INT', 'constraint' => 5, 'null' => true,'default' => 0],
            'status'            => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'terdaftar'], //['terdaftar', 'lulus', 'tidak lulus']
            'accept_terms'      => ['type' => 'INT', 'constraint' => 1, 'default' => 0],
            'accept_agreement'  => ['type' => 'INT', 'constraint' => 1, 'default' => 0],
            'created_at'        => ['type' => 'TIMESTAMP', 'null' => true, 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'        => ['type' => 'TIMESTAMP', 'null' => true],
            'deleted_at'        => ['type' => 'TIMESTAMP', 'null' => true],
        ]);

        $this->forge->addKey('id', true); // Primary key
        $this->forge->createTable('scholarship_participants');
    }

    public function down()
    {
        $this->forge->dropTable('scholarship_participants');
    }
}
