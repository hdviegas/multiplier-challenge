<?php

namespace App\Models;

use Illuminate\Support\Arr;
use App\Casts\Currency;

class Product extends BaseModel
{
    protected $table = 'products';
    protected $observerReferenceFields = [
        'id',
        'name'
    ];
    protected $gridColumns = [
        'id',
        'name',
        'price',
        'category_name'
    ];
    protected $formFields = [
        [
            'name'=>'id',
            'type'=>'hidden'
        ],
        [
            'name'=>'name',
            'type'=>'text'
        ],
        [
            'name'=>'price',
            'type'=>'text',
            'class'=>'currency'
        ]
    ];
    protected $fillable = [
        'name',
        'price',
        'category_id'
    ];

    protected $casts = [
        'price'=> Currency::class
    ];
    
    protected $with = [
        'category'
    ];

    protected $appends = [
        'category_name'
    ];

    public function category()
    {
        return $this->hasOne(ProductCategories::class, 'id', 'category_id');
    }

    public function getCategoryNameAttribute($value)
    {
        return ProductCategories::find($this->category_id)->name;
    }

    /**
     * Overrided to fix product_categories node
     *
     * @return array
     */
    /*public function getGridData()
    {
        $data = self::with('category')->get()->toArray();
        $data = array_map(function ($item) {
            $item['category'] = $item['category']['name'];
            return Arr::only($item, $this->gridColumns);
        }, $data);
        return $data;
    }*/
    /**
     * Overrided to include product_categories with options
     *
     * @return array
     */
    public function getFormFields()
    {
        $fields = $this->formFields;
        $fields[] = ['name'=>'category_id', 'type'=>'select', 'options'=> ProductCategories::getSelectOptions()];
        return $fields;
    }
}
