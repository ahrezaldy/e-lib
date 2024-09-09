<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Catalog extends Model
{
    use CrudTrait, HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'catalog';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'cover',
        'author_id',
        'publisher_id',
        'category_id',
        'service_id',
        'external_id',
        'link',
        'owner_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    public function book_author(): BelongsTo
    {
        return $this->belongsTo(BookAuthor::class, 'author_id');
    }

    public function book_publisher(): BelongsTo
    {
        return $this->belongsTo(BookPublisher::class, 'publisher_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
