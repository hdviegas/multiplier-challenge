<?php

namespace App\Models;

class OrderProduct extends BaseModel
{
    protected $table = 'order_products';
    protected $observerReferenceFields = ['product_id', 'order_id'];
    protected $gridColumns = ['id', 'product', 'price', 'quantity'];
    protected $formFields = [
                                ['name'=>'order_id', 'type'=>'hidden'],
                                ['name'=>'product_id', 'type'=>'text'],
                                ['name'=> 'quantity', 'type'=>'text'],
                                ['name'=> 'price', 'type'=>'text']
                            ];
    protected $fillable = ['product_id', 'order_id', 'price', 'quantity'];
}
