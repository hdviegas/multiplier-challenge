<?php

namespace App\Models;

class Order extends BaseModel
{
    protected $table = 'orders';
    protected $observerReferenceFields = ['id'];
    protected $gridColumns = ['id', 'client', 'total'];
    protected $formFields = [
                                ['name'=>'name', 'type'=>'text'],
                                ['name'=> 'email', 'type'=>'email']
                            ];
    protected $fillable = ['name','email'];
}
