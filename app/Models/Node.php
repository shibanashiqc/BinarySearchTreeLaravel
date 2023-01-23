<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo(Node::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Node::class, 'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    public function left_children()
    {
        return $this->hasMany(Node::class, 'parent_id')->where('position', 'L');
    }

    public function right_children()
    {
        return $this->hasMany(Node::class, 'parent_id')->where('position', 'R');
    }

}
