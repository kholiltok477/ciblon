<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Participant extends Model
{
    protected $fillable = [
        'full_name','email','phone','birth_date','category_id',
        'photo_path','payment_proof_path','status','notes'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function photoUrl()
    {
        return $this->photo_path ? Storage::url($this->photo_path) : null;
    }

    public function paymentUrl()
    {
        return $this->payment_proof_path ? Storage::url($this->payment_proof_path) : null;
    }
}
