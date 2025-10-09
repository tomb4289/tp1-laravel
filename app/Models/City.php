<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Get the students for the city.
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
