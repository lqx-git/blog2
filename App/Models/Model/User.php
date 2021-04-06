<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    //1.关联的数据表
    public $table = 'user1';

    //2.主键
    public $primaryKey ='user_id';

    //3.允许批量操作的字段
    //public $fillable = ['user_name','user_pass','email','phone'];
    public $guarded =[];

    //4.是否维护created_at和updated_at字段
    public $timestamps =false;

    //跟Role的关联模型
    public function role()
    {
        return $this->belongsToMany('App\Models\Model\Role','user_role','user_id','role_id');
    }

}
