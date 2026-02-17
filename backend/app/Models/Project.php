<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Project extends Model
{
    protected $fillable = [
        "title",
        "slug",
        "description",
        "content",
        "image_url",
        "github_url",
        "featured"
    ];

    // definiálja a sok-sok kapcsolatot a Project és Technology modellek között
    public function technologies(): BelongsToMany
    {
        // visszaadja a kapcsolódó technológiákat a projekthez, a pivot táblán keresztül
        return $this->belongsToMany(Technology::class);
    }
}
