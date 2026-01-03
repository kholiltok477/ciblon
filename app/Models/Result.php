<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['participant_id','position','time','notes'];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}
