<?php

namespace App\Exports;

use App\Models\VoucherCode;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;

class VoucherCodeExport implements FromCollection 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $id;

    function __construct($id) {
           $this->id = $id;
    }


    public function collection()
    {
        if($this->id==0)
        {
            return VoucherCode::select("code", "created_at" , "user_id")->with("userData")->get();
        }
        else
        {
            return VoucherCode::select("code", "created_at" , "user_id")->with("userData")->where("user_id",$this->id)->get();
        }
        
    }
}
