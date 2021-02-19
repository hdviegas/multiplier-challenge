<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class BaseModel extends Model
{
    use HasFactory;
    /**
     * The fields to be used as reference for Observers Created message
     *
     * @var string
     */
    protected $observerReferenceFields = [];
    protected $gridColumns = [];
    protected $formFields = [];

    /**
     * Listeners to all models, using Auth id default 0 to prevent exceptions when no authenticated user is found.
     * All logs are saved into EventLog model.
     *
     * @return [type]
     */
    protected static function booted()
    {
        static::created(function ($baseModel) {
            $new_values = $baseModel->attributesToArray();
            $references = Arr::only($baseModel->attributesToArray(), $baseModel->observerReferenceFields);
            $eventData = [
                'table' => $baseModel->table,
                'operation' => EventLog::OPERATION_CREATE,
                'old_values' => null,
                'new_values' => json_encode($new_values),
                'references' => json_encode($references),
                'user_id' => Auth::id() ?? 0
            ];
            EventLog::create($eventData);
        });

        static::updated(function ($baseModel) {
            if ($baseModel->wasChanged()) {
                $changedAttributes = $baseModel->getChanges();
                $old_values = Arr::only($baseModel->getOriginal(), $changedAttributes);
                $new_values = Arr::only($baseModel->attributesToArray(), $changedAttributes);
                $references = Arr::only($baseModel->getOriginal(), $baseModel->observerReferenceFields);
                EventLog::create([
                    'table' => $baseModel->table,
                    'operation' => EventLog::OPERATION_UPDATE,
                    'old_values' => $old_values,
                    'new_values' => $new_values,
                    'references' => $references,
                    'user_id' => Auth::id() ?? 0
                ]);
            }
        });
        static::deleted(function ($baseModel) {
            $old_values = $baseModel->getOriginal();
            $references = Arr::only($baseModel->getOriginal(), $baseModel->observerReferenceFields);
            EventLog::create([
                'table' => $baseModel->table,
                'operation' => EventLog::OPERATION_DELETE,
                'old_values' => $old_values,
                'new_values' => null,
                'references' => $references,
                'user_id' => Auth::id() ?? 0
            ]);
        });
    }

    /**
     * Generates formated data with the columns defined into $gridColumns
     *
     * @return array
     */
    public function getGridData()
    {
        $data = self::all()->toArray();
        $data = array_map(function ($item) {
            return Arr::only($item, $this->gridColumns);
        }, $data);
        return $data;
    }

    /**
     * Returns the list of columns used in grid-views
     *
     * @return array
     */
    public function getGridColumns()
    {
        return $this->gridColumns;
    }
    
    /**
     * Returns the list of data form's inputs
     *
     * @return [type]
     */
    public function getFormFields()
    {
        return $this->formFields;
    }
}
