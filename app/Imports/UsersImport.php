<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class UsersImport implements ToModel, WithHeadingRow
{
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'     => $row['Name'],
            'address'     => $row['Address'],
            'contact_no'     => $row['Contact No'],
            'email'    => $row['Email'], 
            'batch'     => $row['Batch'],
            'semester'     => $row['Semester'],
            'password' => Hash::make('12345678'),
        ]);
    }
}
