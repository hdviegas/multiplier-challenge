<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;
    /**
     * The fields to be used as reference for Observers Created message
     *
     * @var string
     */
    protected $observerCreatedReferenceFields = [];
}
