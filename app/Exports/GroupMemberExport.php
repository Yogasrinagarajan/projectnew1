<?php

namespace App\Exports;

use App\Models\Groupmember;
use Maatwebsite\Excel\Concerns\FromCollection;
//use Maatwebsite\Excel\Concerns\withHeadings;
use Maatwebsite\Excel\Concerns\FromView;
class GroupMemberExport implements FromCollection,withHeadings,FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'staff',
            'customers',
            'count'
        ];
    }

    public function collection()
    {
        return Groupmember::all('staff','customers','count');
    }

    public function view(): View
    {
    	return view('admin/teamview',['users'=>User::all()]);
    }

}
