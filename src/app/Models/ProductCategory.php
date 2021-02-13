<?php

namespace App\Models;

class ProductCategory extends BaseModel
{
    protected $table = 'products_category';
    protected $observerCreatedReferenceFields = ['id','name'];
}
