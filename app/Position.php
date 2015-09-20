<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    static function school($school) {
        $positions = Position::where('school', '=', $school)->get();
        $categories = [];

        foreach($positions as $position) {
            if(isset($categories[$position->position])) {
                array_push($categories[$position->position], $position->name);
            } else {
                $categories[$position->position] = [$position->name];
            }
        }

        return $categories;
    }
}
