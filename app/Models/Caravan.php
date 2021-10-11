<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caravan extends Model
{
    use HasFactory;
    protected $fillable =['name','platenumber','capacity','brand','chassisnumber','description','priceweekly','pricedaily'];
}
 