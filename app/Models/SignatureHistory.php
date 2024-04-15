<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignatureHistory extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'signature_id',
        'last_updated_at',
        'old_plan_id',
        'old_status',
    ];

    protected $casts = [
        'old_status' => SignatureStatus::class
    ];

    public function signature()
    {
        return $this->belongsTo(Signature::class);
    }

}
