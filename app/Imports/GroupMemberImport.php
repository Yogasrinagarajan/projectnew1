<?php

namespace App\Imports;

use App\Models\Groupmember;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\withHeadingRow;
class GroupMemberImport implements ToModel,withHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Groupmember([
            //

            'staff'=>$row['staff'],
            'customers'=>$row['customers'],
            'count'=>$row['count'],
        ]);
    }
}
