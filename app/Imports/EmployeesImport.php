<?php

namespace App\Imports;

use App\Models\Benefit;
use App\Models\Employee;
use App\Models\Salary;
use App\Models\SalaryAllowance;
use App\Models\SalaryDeduction;
use Hash;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToModel, WithHeadingRow, WithChunkReading, ShouldQueue
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // 0 => "first_name"
        // 1 => "last_name"
        // 2 => "email"
        // 3 => "gender"
        // 4 => "id_number"
        // 5 => "phone_number"
        // 6 => "payroll_number"

        $employee = Employee::where('id_number', $row['id_number'])->first();
        if (!$employee) {
            $employee = new Employee();
        }
        $employee->uuid = Str::uuid();
        $employee->first_name = $row['first_name'];
        $employee->last_name = $row['last_name'];
        $employee->email = $row['email'];
        $employee->gender = $row['gender'];
        $employee->id_number = $row['id_number'];
        $employee->phone = $row['phone_number'];
        $employee->payroll_number = $row['payroll_number'];
        $employee->department_id = random_int(1, 10);
        $employee->password = Hash::make($row['id_number']);
        $employee->save();

        $salary = new Salary();
        $salary->employee_id = $employee->id;
        $salary->gross_salary = random_int(50, 190) * 1000;
        $salary->bonus = random_int(5, 10) * 1000;
        $salary->net_salary = 0;
        $salary->deductions = 0;
        $salary->status_id = 5;
        $salary->save();

        $deductions = [
            'nhif' => 0.025,
            'nssf' => 0.5,
            'tax' => 0.16,
        ];
        foreach ($deductions as $key => $value) {
            $deduction = new SalaryDeduction();
            $deduction->employee_id = $employee->id;
            $deduction->salary_id = $salary->id;
            $deduction->amount = $salary->gross_salary * $value;
            $deduction->name = $key;
            $deduction->status_id = 5;
            $deduction->save();
        }
        $benefits = random_int(0, 3);
        for ($i = 1; $i < $benefits; $i++) {
            $benefit = Benefit::whereNotNull('amount')->inRandomOrder()->first();
            $allowance = new SalaryAllowance();
            $allowance->employee_id = $employee->id;
            $allowance->salary_id = $salary->id;
            $allowance->gross_amount = $benefit->amount;
            $allowance->tax = 0;
            $allowance->name = $benefit->name;
            $allowance->net_amount = $benefit->amount;
            $allowance->status_id = 5;
            $allowance->save();
        }
        $salary->net_salary = $salary->gross_salary + $salary->salary_allowances->sum('net_amount') ?? 0 - $salary->salary_deductions->sum('amount') ?? 0;
        $salary->deductions = $salary->salary_deductions->sum('amount') ?? 0;
        $salary->save();

        echo "Importing {$employee->first_name} {$employee->last_name} of email {$employee->email} and phone {$employee->id_number} \r\n";

        return $employee;
    }
    public function chunkSize(): int
    {
        return 400;
    }
}
