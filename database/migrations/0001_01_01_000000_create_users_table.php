<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        $roles = [
            'Super Admin',
            'Admin',
            'HR Manager',
            'HR Assistant',
            'Department Manager',
            'IT Support',
            'Finance',
            'Employee',
            'Recruiter',
            'Payroll Specialist',
            'Training Coordinator',
            'Compliance Officer',
        ];

        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name' => $role,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->string('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        $permissions = [
            ['name' => 'View Users', 'description' => 'Allows viewing of user details'],
            ['name' => 'Create Users', 'description' => 'Allows creating new users'],
            ['name' => 'Edit Users', 'description' => 'Allows editing of user details'],
            ['name' => 'Delete Users', 'description' => 'Allows deleting users'],
            ['name' => 'Approve Leave', 'description' => 'Allows approval of leave requests'],
            ['name' => 'View Payroll', 'description' => 'Allows viewing of payroll details'],
            ['name' => 'Process Payroll', 'description' => 'Allows processing of payroll'],
            ['name' => 'Manage Roles', 'description' => 'Allows managing user roles and permissions'],
            ['name' => 'View Reports', 'description' => 'Allows viewing various reports'],
            ['name' => 'Manage Training', 'description' => 'Allows managing employee training programs'],
        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->insert([
                'name' => $permission['name'],
                'code' => strtolower(str_replace(' ', '-', $permission['name'])), // CamelCase conversion
                'description' => $permission['description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        Schema::create('status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });
        $statuses = [
            ['name' => 'Pending', 'description' => 'The action or request is pending approval'],
            ['name' => 'Approved', 'description' => 'The action or request has been approved'],
            ['name' => 'Rejected', 'description' => 'The action or request has been rejected'],
            ['name' => 'New', 'description' => 'The item or user has just beeen created'],
            ['name' => 'Active', 'description' => 'The item or user is currently active'],
            ['name' => 'Inactive', 'description' => 'The item or user is currently inactive'],
            ['name' => 'Completed', 'description' => 'The process or task has been completed'],
            ['name' => 'In Progress', 'description' => 'The process or task is currently in progress'],
            ['name' => 'Cancelled', 'description' => 'The action or request has been cancelled'],
            ['name' => 'On Hold', 'description' => 'The process or task is temporarily on hold'],
            ['name' => 'Failed', 'description' => 'The process or task has failed'],
        ];

        foreach ($statuses as $status) {
            DB::table('status')->insert([
                'name' => $status['name'],
                'description' => $status['description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });
        $departments = [
            ['name' => 'Administration', 'description' => 'Supports the daily administrative tasks and office management'],
            ['name' => 'Human Resources', 'description' => 'Handles employee relations, payroll, benefits, and recruitment'],
            ['name' => 'Finance', 'description' => 'Manages the financial planning, record-keeping, and financial reporting'],
            ['name' => 'Marketing', 'description' => 'Responsible for promoting the company’s products or services'],
            ['name' => 'Sales', 'description' => 'Handles the selling of products or services and maintaining customer relationships'],
            ['name' => 'IT', 'description' => 'Manages the technology infrastructure and services within the organization'],
            ['name' => 'Customer Support', 'description' => 'Provides assistance and support to customers'],
            ['name' => 'Legal', 'description' => 'Handles all legal matters, compliance, and contracts'],
            ['name' => 'Operations', 'description' => 'Oversees the day-to-day operational aspects of the company'],
            ['name' => 'Research and Development', 'description' => 'Focuses on the innovation, research, and development of new products'],

        ];

        foreach ($departments as $department) {
            DB::table('departments')->insert([
                'name' => $department['name'],
                'description' => $department['description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        Schema::create('salary_grades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('min_salary')->nullable();
            $table->integer('max_salary')->nullable();
            $table->timestamps();
        });
        $salaryGrades = [
            ['name' => 'Grade A', 'description' => 'Top-level management and executives with the highest salary range'],
            ['name' => 'Grade B', 'description' => 'Senior management with high-level responsibilities and salaries'],
            ['name' => 'Grade C', 'description' => 'Middle management with moderate responsibilities and salaries'],
            ['name' => 'Grade D', 'description' => 'Junior management and specialized roles with standard salaries'],
            ['name' => 'Grade E', 'description' => 'Entry-level positions with the basic salary range'],
            ['name' => 'Grade F', 'description' => 'Interns or trainees with minimal salary'],
        ];

        foreach ($salaryGrades as $grade) {
            DB::table('salary_grades')->insert([
                'name' => $grade['name'],
                'description' => $grade['description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->integer('salary_grade_id')->nullable();
            $table->foreign('salary_grade_id')->references('id')->on('salary_grades');
            $table->timestamps();
        });
        $positions = [
            ['name' => 'Chief Executive Officer', 'description' => 'The highest-ranking executive in the company, responsible for overall management'],
            ['name' => 'Chief Financial Officer', 'description' => 'Responsible for managing the financial actions of the company'],
            ['name' => 'Chief Operations Officer', 'description' => 'Oversees the company’s day-to-day operational functions'],
            ['name' => 'Human Resources Manager', 'description' => 'Manages employee relations, recruitment, and payroll'],
            ['name' => 'Sales Manager', 'description' => 'Leads and manages the sales team to meet company revenue targets'],
            ['name' => 'Marketing Manager', 'description' => 'Develops and implements marketing strategies to promote the company’s products or services'],
            ['name' => 'IT Manager', 'description' => 'Oversees the company’s technology infrastructure and systems'],
            ['name' => 'Customer Support Representative', 'description' => 'Provides assistance and support to customers regarding the company’s products or services'],
            ['name' => 'Legal Counsel', 'description' => 'Provides legal advice and handles legal matters within the company'],
            ['name' => 'Project Manager', 'description' => 'Responsible for planning, executing, and closing projects within the company'],
        ];

        foreach ($positions as $position) {
            DB::table('positions')->insert([
                'name' => $position['name'],
                'description' => $position['description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->string('title')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('username')->nullable();
            $table->string('last_name');
            $table->string('gender')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('nationality')->nullable();
            $table->string('id_number')->nullable();
            $table->string('payroll_number')->nullable();
            $table->timestamp('hire_date')->nullable();
            $table->string('kra_pin')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('physical_address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('county')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('email')->unique();
            $table->string('password_reset_token')->nullable();
            $table->integer('role_id')->default(6);
            $table->foreign('role_id')->references('id')->on('roles');
            $table->integer('department_id');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->integer('status_id')->default(4);
            $table->foreign('status_id')->references('id')->on('status');
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('profile_image')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('users')->insert(
            [
                'uuid' => Str::uuid(),
                'title' => 'MR',
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'username' => 'admin',
                'phone' => '+254700000000',
                'email' => 'admin@hrms.com',
                'status_id' => 5,
                'role_id' => 1,
                'department_id' => 1,
                'created_at' => Carbon::now(),
                'last_login' => Carbon::now(),
                'password' => Hash::make('password'),
            ]);
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('users');
            $table->decimal('gross_salary', total: 8, places: 2);
            $table->decimal('bonus', total: 8, places: 2)->default(0);
            $table->decimal('deductions', total: 8, places: 2);
            $table->decimal('net_salary', total: 8, places: 2);
            $table->integer('status_id')->default(5);
            $table->foreign('status_id')->references('id')->on('status');
            $table->timestamps();
        });
        Schema::create('salary_deductions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('salary_id')->nullable();
            $table->foreign('salary_id')->references('id')->on('salaries');
            $table->integer('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('users');
            $table->decimal('amount', total: 8, places: 2);
            $table->integer('status_id')->default(5);
            $table->foreign('status_id')->references('id')->on('status');
            $table->timestamps();
        });
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->string('status')->default(5);
            $table->string('name');
            $table->string('country')->nullable();
            $table->string('physical_address')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('contact_name', 128)->nullable();
            $table->string('contact_phone', 20)->nullable();
            $table->string('contact_email')->nullable();
            $table->string('logo')->nullable();
            $table->string('kra_pin')->nullable();
            $table->string('map_address')->nullable();
            $table->decimal('map_latitude', 11, 8)->nullable();
            $table->decimal('map_longitude', 11, 8)->nullable();
            $table->integer('is_active')->nullable()->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('organizations')->insert([
            'uuid' => Str::uuid(),
            'name' => 'HRMS Company',
            'country' => 'Kenya',
            'physical_address' => 'Kenya',
            'postal_address' => '00100',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Schema::create('salary_allowances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('salary_id')->nullable();
            $table->foreign('salary_id')->references('id')->on('salaries');
            $table->integer('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('users');
            $table->decimal('gross_amount', total: 8, places: 2);
            $table->decimal('tax', total: 8, places: 2);
            $table->decimal('net_amount', total: 8, places: 2);
            $table->integer('status_id')->default(5);
            $table->foreign('status_id')->references('id')->on('status');
            $table->timestamps();
        });
        Schema::create('attendance', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('users');
            $table->decimal('amount', total: 8, places: 2);
            $table->timestamp('checkin');
            $table->timestamp('checkout')->nullable();
            $table->timestamps();
        });
        Schema::create('leave_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('max_days')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        $leaveTypes = [
            ['name' => 'Annual Leave', 'description' => 'Paid leave granted for personal time off', 'max_days' => 30],
            ['name' => 'Sick Leave', 'description' => 'Leave taken due to illness or medical reasons', 'max_days' => 10],
            ['name' => 'Casual Leave', 'description' => 'Leave taken for personal reasons or short-term needs', 'max_days' => 7],
            ['name' => 'Maternity Leave', 'description' => 'Leave granted to new mothers around childbirth', 'max_days' => 90],
            ['name' => 'Paternity Leave', 'description' => 'Leave granted to new fathers around childbirth', 'max_days' => 14],
            ['name' => 'Bereavement Leave', 'description' => 'Leave granted due to the death of a family member or close relative', 'max_days' => 5],
            ['name' => 'Public Holiday', 'description' => 'Leave on official public holidays recognized by the company', 'max_days' => 0],
            ['name' => 'Unpaid Leave', 'description' => 'Leave taken without pay, typically for personal reasons', 'max_days' => null],
            ['name' => 'Study Leave', 'description' => 'Leave granted for pursuing educational activities or training', 'max_days' => 30],
            ['name' => 'Compensatory Leave', 'description' => 'Leave granted in lieu of extra hours worked or overtime', 'max_days' => null],
        ];

        foreach ($leaveTypes as $leaveType) {
            DB::table('leave_types')->insert([
                'name' => $leaveType['name'],
                'description' => $leaveType['description'],
                'max_days' => $leaveType['max_days'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        Schema::create('leave_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->integer('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('users');
            $table->integer('substitute_employee_id')->nullable();
            $table->foreign('substitute_employee_id')->references('id')->on('users');
            $table->integer('leave_type_id')->nullable();
            $table->foreign('leave_type_id')->references('id')->on('leave_types');
            $table->integer('days_requested');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->integer('status_id')->default(4);
            $table->foreign('status_id')->references('id')->on('status');
            $table->timestamps();
        });

        Schema::create('workflow_steps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->timestamps();
        });
        $workflow_steps = [
            ["role_id" => 2, 'name' => "CEO Approval", "description" => "Approvals required by the CEO"],
            ["role_id" => 3, 'name' => "HR Approval", "description" => "Approvals required by the HR"],
            ["role_id" => 4, 'name' => "HR Assistant Approval", "description" => "Approvals required by the HR"],
            ["role_id" => 5, 'name' => "Departmental Head Approval", "description" => "Approvals required by the Departmental Heads"],
            ["role_id" => 6, 'name' => "IT Support Approval", "description" => "Approvals required by IT Support"],
            ["role_id" => 7, 'name' => "Finance Approvals", "description" => "Approvals required by Finance department"],
            ["role_id" => 8, 'name' => "Employee Approval", "description" => "Approvals required by Colleagues"],
        ];

        foreach ($workflow_steps as $item) {
            DB::table('workflow_steps')->insert([
                'name' => $item['name'],
                'description' => $item['description'],
                'role_id' => $item['role_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        Schema::create('workflow_definitions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->timestamps();
        });
        $workflow_definitions = [
            ['name' => "Leave Approvals ", "description" => "Approvals for leave applications"],
            ['name' => "Item Acquisition/Procurement", "description" => "Approvals required when acuiring company assets"],
            ['name' => "Clearance", "description" => "Approvals required when clearing while exiting the organization"],
            ['name' => "Funds Reimbursements", "description" => "Approvals required when requiring reimbursements"],
        ];

        foreach ($workflow_definitions as $item) {
            DB::table('workflow_definitions')->insert([
                'name' => $item['name'],
                'description' => $item['description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        Schema::create('workflow_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('workflow_definition_id')->nullable();
            $table->foreign('workflow_definition_id')->references('id')->on('workflow_definitions');
            $table->integer('workflow_step_id')->nullable();
            $table->foreign('workflow_step_id')->references('id')->on('workflow_steps');
            $table->timestamps();
        });

        Schema::create('workflow_instance', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('workflow_definition_id')->nullable();
            $table->foreign('workflow_definition_id')->references('id')->on('workflow_definitions');
            $table->integer('workflow_step_id')->nullable();
            $table->foreign('workflow_step_id')->references('id')->on('workflow_steps');
            $table->integer('leave_application_id')->nullable();
            $table->foreign('leave_application_id')->references('id')->on('leave_applications');
            $table->string('step_name')->nullable();
            $table->string('comments')->nullable();
            $table->integer('status_id')->default(8);
            $table->foreign('status_id')->references('id')->on('status');
            $table->integer('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->integer('approver_id')->nullable();
            $table->foreign('approver_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('payroll', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('users');
            $table->timestamp('pay_date');
            $table->decimal('gross_pay', total: 8, places: 2);
            $table->decimal('taxes', total: 8, places: 2);
            $table->decimal('net_pay', total: 8, places: 2);
            $table->integer('status_id')->default(4);
            $table->foreign('status_id')->references('id')->on('status');
            $table->timestamps();
        });
        Schema::create('performance_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('users');
            $table->timestamp('review_start_date')->nullable();
            $table->timestamp('review_end_date')->nullable();
            $table->integer('status_id')->default(4);
            $table->foreign('status_id')->references('id')->on('status');
            $table->string('comments');
            $table->string('rating');
            $table->timestamps();
        });
        Schema::create('benefits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->decimal('amount', total: 8, places: 2)->nullable();
            $table->boolean('taxable')->default('false');
            $table->timestamps();
        });
        $benefits = [
            ['taxable' => 1, 'name' => 'Health/Medical Insurance', 'description' => 'Coverage for medical expenses for employees and their families', 'amount' => null],
            ['taxable' => 1, 'name' => 'Housing Allowance', 'description' => 'Allowance to cover or contribute towards housing expenses', 'amount' => 20000], // Example value in KSh
            ['taxable' => 1, 'name' => 'Transport/Car Allowance', 'description' => 'Allowance to cover transportation costs for commuting to work', 'amount' => 10000], // Example value in KSh
            ['taxable' => 0, 'name' => 'Meal Allowance', 'description' => 'Allowance for daily meals while at work', 'amount' => 5000], // Example value in KSh
            ['taxable' => 0, 'name' => 'Education Allowance', 'description' => 'Financial support for educational expenses for employees or their children', 'amount' => 30000], // Example value in KSh
            ['taxable' => 1, 'name' => 'Entertainment Allowance', 'description' => 'Financial support for entertainment expenses for employees or their children', 'amount' => 30000], // Example value in KSh
            ['taxable' => 1, 'name' => 'Responsibility Allowance', 'description' => 'Financial support for responsibility expenses for employees or their children', 'amount' => 30000], // Example value in KSh
            ['taxable' => 1, 'name' => 'Subsistence Allowance', 'description' => 'Financial support for subsistence expenses for employees or their children', 'amount' => 30000], // Example value in KSh
            ['taxable' => 1, 'name' => 'Bonus/Commission', 'description' => 'Periodic financial reward based on performance or company profitability', 'amount' => null],
            ['taxable' => 1, 'name' => 'Reimbursable Allowance', 'description' => 'Reimbursable  amounts', 'amount' => null],
            ['taxable' => 0, 'name' => 'Retirement Benefits', 'description' => 'Contributions to retirement savings or pension schemes', 'amount' => null],
            ['taxable' => 0, 'name' => 'Medical Check-ups', 'description' => 'Coverage for routine medical check-ups and preventive care', 'amount' => null],
            ['taxable' => 1, 'name' => 'Vacation Leave', 'description' => 'Paid leave granted for vacation or personal time off', 'amount' => null],
            ['taxable' => 1, 'name' => 'Overtime Allowance', 'description' => 'Coverage or reimbursement for overtive work', 'amount' => 6000], // Example value in KSh
            ['taxable' => 0, 'name' => 'Per Diem/Out-of-Pocket Allowances', 'description' => 'Per Diem/Out-of-Pocket Allowances', 'amount' => null], // Example value in KSh
            ['taxable' => 0, 'name' => 'Medical Benefits', 'description' => 'Medical Benefits', 'amount' => null], // Example value in KSh
            ['taxable' => 0, 'name' => 'Reimbursement of Work-Related Expenses', 'description' => 'Reimbursement of Work-Related Expenses', 'amount' => null], // Example value in KSh
            ['taxable' => 0, 'name' => 'Disability Relief', 'description' => 'Disability Relief', 'amount' => null], // Example value in KSh
            ['taxable' => 0, 'name' => 'Passages to/from Kenya', 'description' => 'Passages to/from Kenya', 'amount' => null], // Example value in KSh
            ['taxable' => 0, 'name' => 'Education Fees', 'description' => 'Education Fees', 'amount' => null], // Example value in KSh
        ];

        foreach ($benefits as $benefit) {
            DB::table('benefits')->insert([
                'name' => $benefit['name'],
                'description' => $benefit['description'],
                'amount' => $benefit['amount'], // Amount or value in KSh, or null if not applicable
                'taxable' => $benefit['taxable'], // Amount or value in KSh, or null if not applicable
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        Schema::create('employee_benefits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('users');
            $table->integer('benefit_type')->nullable();
            $table->foreign('benefit_type')->references('id')->on('benefits');
            $table->decimal('amount', total: 8, places: 2);
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->integer('status_id')->default(4);
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('employee_benefits');
        Schema::dropIfExists('benefits');
        Schema::dropIfExists('performance_reviews');
        Schema::dropIfExists('payroll');
        Schema::dropIfExists('workflow_instance');
        Schema::dropIfExists('workflow_configs');
        Schema::dropIfExists('workflow_definitions');
        Schema::dropIfExists('workflow_steps');
        Schema::dropIfExists('leave_applications');
        Schema::dropIfExists('leave_types');
        Schema::dropIfExists('attendance');
        Schema::dropIfExists('salary_allowances');
        Schema::dropIfExists('organizations');
        Schema::dropIfExists('salary_deductions');
        Schema::dropIfExists('salaries');
        Schema::dropIfExists('users');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('salary_grades');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('status');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('roles');
    }
};
