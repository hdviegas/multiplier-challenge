<?php

namespace App\Models;

class OrderProduct extends BaseModel
{
    protected $table = 'order_products';
    protected $observerCreatedReferenceFields = ['product_id', 'order_id'];
}
