<?php

namespace App\Models;

class Customer extends BaseModel
{
    protected $table = 'customer';
    protected $observerCreatedReferenceFields = ['id', 'name'];
}
