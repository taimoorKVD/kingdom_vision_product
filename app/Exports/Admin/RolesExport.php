<?php

namespace App\Exports\Admin;

use Maatwebsite\Excel\Concerns\FromCollection;
use Spatie\Permission\Models\Role;

class RolesExport implements FromCollection
{
    public function collection()
    {
        return Role::all();
    }
}
