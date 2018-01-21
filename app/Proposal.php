<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    public function isComplete() {
    	return false;
    }

    public function isVerified() {
    	return false;
    }

    public static function incomplete() {
    	return static::where('status', 0)->get();
    }
}
