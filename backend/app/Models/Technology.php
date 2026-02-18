<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Technology extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "icon",
        "category"
    ];

    # definiálja a sok-sok kapcsolatot a Technology és Project modellek között
    public function projects(): BelongsToMany
    {
        # visszaadja a kapcsolódó projekteket a technológiához, a pivot táblán keresztül
        return $this->belongsToMany(Project::class);
    }
}
