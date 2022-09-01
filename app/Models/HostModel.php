<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostModel extends Model
{
    use HasFactory;
    protected $table = 'router_details';
    public $timestamps = false;
     protected $fillable = ['Sapid', 'Hostname', 'Loopback','MacAddress','ResponseTime']; 
}
