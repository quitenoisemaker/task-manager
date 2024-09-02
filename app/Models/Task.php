<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Task extends Model
{
    use HasFactory;

    protected $fillable=['name','priority','project_id'];


    public function project()
    {
        return $this->belongsTo(Project::class);
    }


    /**
     * Scope a query to only fetch the necessary columns for the task
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeFetch(Builder $query): void
    {
        $query->select('id', 'name', 'priority','project_id', 'created_at');
    }
}
