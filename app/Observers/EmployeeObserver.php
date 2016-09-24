<?php
/**
 * Created by cod-a-holic.
 * Date: 23.09.16
 * Time: 22:27
 */

namespace App\Observers;

use App\Employee;

class EmployeeObserver
{

    public function deleting(Employee $employee)
    {
        $subordinates = $employee->subordinates;
        foreach ($subordinates as $subordinate ) {
            $subordinate->update(['director_id' => $employee->director_id]);
        }
    }

}