<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Application extends Model
{
    use AsSource;
    use HasFactory;
    use Filterable;

    protected $fillable = [
        'id',
        'name',
        'email',
        'status',
        'message',
        'comment'
    ];

}
