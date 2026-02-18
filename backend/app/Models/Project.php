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

    # definiálja a sok-sok kapcsolatot a Project és Technology modellek között
    public function technologies(): BelongsToMany
    {
        # visszaadja a kapcsolódó technológiákat a projekthez, a pivot táblán keresztül
        return $this->belongsToMany(Technology::class);
    }

    public function getRouteKeyName(): string
    {
        # megmondja a Laravelnek, hogy a slug mezőt használja a route model binding során ahelyett, hogy az id-t használná
        return 'slug';
    }
}
