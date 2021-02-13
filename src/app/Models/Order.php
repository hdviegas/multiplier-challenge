<?php

namespace App\Models;

class Order extends BaseModel
{
    protected $table = 'orders';
    protected $observerCreatedReferenceFields = ['id'];
}
