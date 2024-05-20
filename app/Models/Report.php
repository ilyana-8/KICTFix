<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['name', 'reporting_id', 'title', 'description', 'type', 'attachment', 'user_id'];
}
