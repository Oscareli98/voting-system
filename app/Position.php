<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['position', 'school', 'name'];

    static function school($school) {
        $positions = Position::where('school', '=', $school)->get();
        $categories = [];

        foreach($positions as $position) {
            if(isset($categories[$position->position])) {
                array_push($categories[$position->position], ['name' => $position->name, 'id' => $position->id]);
            } else {
                $categories[$position->position] = [['name' => $position->name, 'id' => $position->id]];
            }
        }

        return $categories;
    }
}
