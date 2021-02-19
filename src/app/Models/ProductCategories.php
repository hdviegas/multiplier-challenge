<?php

namespace App\Models;

class ProductCategories extends BaseModel
{
    protected $table = 'product_categories';
    protected $observerReferenceFields = ['id','name'];
    protected $gridColumns = ['id', 'name'];
    protected $formFields = [
        ['name'=>'id', 'type'=>'hidden'],
        ['name'=>'name', 'type'=>'text']
    ];
    protected $fillable = ['name'];

    public static function getSelectOptions()
    {
        $result = [];
        $items = self::all();
        foreach ($items as $item) {
            $result[$item->id] = $item->name;
        }
        return $result;
    }
}
