<?php

namespace App\Models;

class Customer extends BaseModel
{
    protected $table = 'customers';
    protected $observerReferenceFields = ['id', 'name'];
    protected $gridColumns = ['id', 'name', 'email'];
    protected $formFields = [
                                ['name'=>'id', 'type'=>'hidden'],
                                ['name'=>'name', 'type'=>'text'],
                                ['name'=> 'email', 'type'=>'email']
                            ];
    protected $fillable = ['name','email'];
}
