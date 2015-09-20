<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    //
    //


    static function validate($code) {
        $code = strtoupper($code);

        $search = Code::where('code', '=', $code)->get();
        return (count($search) > 0);
    }
}
