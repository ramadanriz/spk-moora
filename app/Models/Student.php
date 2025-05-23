<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $primaryKey = 'student_id_number';
    public $incrementing = false; // karena bukan auto-increment
    protected $keyType = 'int';

    public function scopeFilter($query) {
        if(request('search')) {
            return $query->where('name', 'like', '%'. request('search') .'%')->orWhere('student_id_number', 'like', '%'. request('search') .'%');
        }
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
