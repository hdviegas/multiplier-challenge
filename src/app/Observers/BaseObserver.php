<?php

namespace App\Observers;

use App\Models\BaseModel;
use App\Models\EventLog;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class BaseObserver
{
    /**
     * Handle the BaseModel "created" event.
     *
     * @param  \App\Models\BaseModel  $baseModel
     * @return void
     */
    public function created(BaseModel $baseModel)
    {
        $new_values = Arr::only($baseModel->attributesToArray(), $changedAttributes);
        $references = Arr::only($baseModel->attributesToArray(), $baseModel->observerReferenceFields);
        EventLog::create([
            'table' => $baseModel->table,
            'operation' => EventLog::OPERATION_CREATE,
            'old_values' => null,
            'new_values' => $new_values,
            'references' => $references,
            'user_id' => Auth::id()
        ]);
    }

    /**
     * Handle the BaseModel "updated" event.
     *
     * @param  \App\Models\BaseModel  $baseModel
     * @return void
     */
    public function updated(BaseModel $baseModel)
    {
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
                'user_id' => Auth::id()
            ]);
        }
    }

    /**
     * Handle the BaseModel "deleted" event.
     *
     * @param  \App\Models\BaseModel  $baseModel
     * @return void
     */
    public function deleted(BaseModel $baseModel)
    {
        $changedAttributes = $baseModel->getChanges();
        $old_values = Arr::only($baseModel->getOriginal(), $changedAttributes);
        $references = Arr::only($baseModel->getOriginal(), $baseModel->observerReferenceFields);
        EventLog::create([
            'table' => $baseModel->table,
            'operation' => EventLog::OPERATION_DELETE,
            'old_values' => $old_values,
            'new_values' => null,
            'references' => $references,
            'user_id' => Auth::id()
        ]);
    }
}
