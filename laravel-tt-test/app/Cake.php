<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Cake
 * @package App
 */
class Cake extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image_path'
    ];

    /**
     * Update the votes table
     * @returns $this
     */
    public function updateVotes() {
        $votes = DB::table('votes')->where('cake_id', '=', $this->id)->get();
        $this->no_of_votes = $votes->count();
        $this->avg_vote = $votes->average('vote');
        return $this->save();
    }
}
