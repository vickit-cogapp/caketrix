<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vote
 * @package App
 */
class Vote extends Model
{
    protected $fillable = ['vote', 'user_id', 'cake_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cake() {
    	return $this->belongsTo(Cake::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
    	return $this->belongsTo(User::class);
    }

}
