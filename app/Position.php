<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['position', 'school', 'name'];

    static function school($school) {
        if($school == "LASA" || $school == "LBJ"){
            $positions = Position::where('school', '=', $school)->get();
        } else {
            $positions = Position::all();
        }
        $categories = [];

        foreach($positions as $position) {
            if(isset($categories[$position->position])) {
                array_push($categories[$position->position], ['name' => $position->name, 'id' => $position->id, 'school' => $position->school]);
            } else {
                $categories[$position->position] = [['name' => $position->name, 'id' => $position->id,
            'school' => $position->school]];
            }
        }

        return $categories;
    }

    static function allPositions() {
        $positions = Position::all();
        $categories = [];

        foreach($positions as $position) {
            $cat_name = $position->school . ' ' . $position->position;
            if(isset($categories[$cat_name])) {
                array_push($categories[$cat_name], ['name' => $position->name, 'id' => $position->id, 'school' => $position->school]);
            } else {
                $categories[$cat_name] = [['name' => $position->name, 'id' => $position->id,
            'school' => $position->school]];
            }
        }

        return $categories;
    }
}
