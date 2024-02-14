<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    use HasFactory;

    protected $fillable = ['office_send' ,
                        'office_receive' ,
                        'money_trans' , 
                        'data_trans' ,
                         'office_id'];





    public function Office()
    { 
        return $this->belongsTo(Office::class);
    }
}
