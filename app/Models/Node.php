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

    public function childrenRecursiveWithPosition($position)
    {
        return $this->children()->with('childrenRecursive')->where('position', $position);
    }

    public function end_of_child($position)
    {
        return $this->children()->with('childrenRecursive')->where('position', $position)->first();
    }

    public function left_children()
    {
        return $this->hasMany(Node::class, 'parent_id')->where('position', 'L');
    }

    public function right_children()
    {
        return $this->hasMany(Node::class, 'parent_id')->where('position', 'R');
    }

    public function end_of_child_recursive($position)
    {
        return $this->childrenRecursive()->last()->where('position', $position)->first();
    }
}
