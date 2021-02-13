<?php

namespace App\Models;

class OrderProduct extends BaseModel
{
    protected $table = 'orders_product';
    protected $observerCreatedReferenceFields = ['product_id', 'order_id'];
}
