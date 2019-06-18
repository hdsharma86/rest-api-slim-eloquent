<?php
namespace Src\Models;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model{
   protected $table = 'users';
   protected $fillable = ['mobile','email','password','username'];
}