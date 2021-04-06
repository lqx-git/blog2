<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    //1.关联的数据表
    public $table = 'role';

    //2.主键
    public $primaryKey = 'id';

    //3.允许批量操作的字段
    //public $fillable = ['user_name','user_pass','email','phone'];
    public $guarded = [];

    //4.是否维护created_at和updated_at字段
    public $timestamps = false;

    //5.添加动态属性，关联权限模型
    public function permission()
    {
        return $this->belongsToMany('App\Models\Model\Permission','role_permission','role_id','permission_id');
    }

}
