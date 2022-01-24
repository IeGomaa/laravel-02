<?php

namespace App\Http\Controllers\DepartmentTrait;

trait departmentTrait {
    private function getDepartment($id) {
        return $this->departmentModel::find($id);
    }
}
