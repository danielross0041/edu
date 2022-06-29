<?php
namespace App\Models;
use Helper;
use Illuminate\Database\Eloquent\Model;
class blogs extends Model
{
    protected $table = 'blogs';
    public $primaryKey = 'id';
    protected $fillable = [
        // 'user_id','details','type','is_deleted','name','is_active','img','file'
        'user_id','is_deleted','name','slug','is_active','img'
    ];
    public function image()
    {
        // return $this->hasOne(imagetable::class, 'ref_id')->where('table_name', 'blogs');
    }
}