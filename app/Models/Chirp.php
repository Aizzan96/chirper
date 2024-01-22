<?php

namespace App\Models;
use App\Events\ChirpCreated; //add this for event purposes
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    use HasFactory;

    protected $fillable = ['message']; // enable mass assignment

     protected $dispatchesEvents = [
        'created' => ChirpCreated::class,
    ]; // everytime a chirp is created this will trigger 
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
