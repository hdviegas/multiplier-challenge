<?php

namespace App\Models;

class ProductCategories extends BaseModel
{
    protected $table = 'product_categories';
    protected $observerCreatedReferenceFields = ['id','name'];
}
