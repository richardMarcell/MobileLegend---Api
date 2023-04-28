<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hero extends Model
{
    use HasFactory;

    protected $table = 'heroes';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'offensive',
        'defensive',
        'utility',
        'image',
    ];

    public function skills():HasMany {
        return $this->hasMany(Skill::class, 'hero_id', 'id');
    }
}
