<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventLog extends Model
{
    use HasFactory;

    const OPERATION_CREATE = 1;
    const OPERATION_UPDATE = 2;
    const OPERATION_DELETE = 3;

    protected $fillable = ['table', 'operation', 'old_values', 'new_values', 'references', 'user_id'];
}
