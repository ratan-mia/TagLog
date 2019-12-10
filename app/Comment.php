<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    public $table = 'comments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'rating',
        'comment',
        'approved',
        'created_at',
        'updated_at',
        'deleted_at',
        'commentable',
        'comment_type',
        'commenter_id',
        'commentable_type',
    ];

    public function agents()
    {
        return $this->belongsToMany(Agent::class);
    }

    public function commenter()
    {
        return $this->belongsTo(User::class, 'commenter_id');
    }
}
