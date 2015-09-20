<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['code', 'position', 'school', 'name'];

    public static function createOrUpdate($code, $school, $position, $name) {
        $votes = Vote::where('code', $code)->where('school', $school)->where('position', $position)->get();
        $vote;
        if (count($votes) == 0) {
            $vote = new Vote([
                'code' => $code,
                'school' => $school,
                'position' => $position
            ]);
        } else {
            $vote = Vote::where('code', $code)->where('school', $school)->where('position', $position)->first();
        }

        $vote->name = $name;
        $vote->save();
    }

    public static function stats() {
        $votes = Vote::all();
        $stats = [];

        foreach($votes as $vote){
            if(!isset($stats[$vote->school][$vote->position][$vote->name])){
                $stats[$vote->school][$vote->position][$vote->name] = 0;
            }

            $stats[$vote->school][$vote->position][$vote->name]++;
        }

        return $stats;
    }

}
