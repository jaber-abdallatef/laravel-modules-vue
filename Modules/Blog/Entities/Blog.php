<?php 
namespace Modules\Blog\Http\Entities;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog';
    protected $fillable = ['title', 'body', 'status'];
}