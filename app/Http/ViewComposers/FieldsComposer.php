<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\fields;

class FieldsComposer
{
    protected $fields;

    public function __construct(fields $fields)
    {
        $this->fields=$fields;
    }

    public function compose(View $view)
    { 
        $view->with('fields', $this->fields->all());
    }
}