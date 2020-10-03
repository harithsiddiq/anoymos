<?php

namespace App\Observers;

use App\Models\Dashboard\Department;
use Illuminate\Support\Facades\Storage;

class DepartmentObserver
{

    public function deleted(Department $department)
    {
        !empty($department->icon)?Storage::delete($department->icon):'';
        $dep = Department::where('parent_id', $department->id)->get();
        foreach ($dep as $d) {
            $d->delete();
        }
    }

}
