<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Client;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Rules\Rule;

final class ClientTable extends PowerGridComponent
{
    use ActionButton;

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): void
    {
        $this->showCheckBox()
            ->showPerPage()
            ->showSearchInput()
            ->showExportOption('download', ['excel', 'csv']);
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return  \Illuminate\Database\Eloquent\Builder<\App\Models\Client>|null
    */
    public function datasource(): ?Builder
    {
        return Client::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            // ->addColumn('id')
            ->addColumn('first_name')
            ->addColumn('last_name')
            ->addColumn('email')
            ->addColumn('mobile_number')
            ->addColumn('address')
            ->addColumn('city_id',function (Client $model)
            {
                return $city = City::where('id',$model->city_id)->first()->name;
            })
            ->addColumn('photo',function (Client $model)
            {
                $path = $model->photo ? "http://support_ticket.com/".$model->profile_pic : "";
                return $path != "" ?  '<img height="50" width="50" src="'.$path.'" alt="" srcset="">' : "";
            });
            // ->addColumn('external_id')
            // ->addColumn('created_at_formatted', function(Client $model) {
            //     return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
            // })
            // ->addColumn('updated_at_formatted', function(Client $model) {
            //     return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            // });
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            // Column::add()
            //     ->title('ID')
            //     ->field('id')
            //     ->makeInputRange(),

            Column::add()
                ->title('FIRST NAME')
                ->field('first_name')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->editOnClick(),

            Column::add()
                ->title('LAST NAME')
                ->field('last_name')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->editOnClick(),

            Column::add()
                ->title('EMAIL')
                ->field('email')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->editOnClick(),

            Column::add()
                ->title('MOBILE NUMBER')
                ->field('mobile_number')
                ->editOnClick(),

            Column::add()
                ->title('ADDRESS')
                ->field('address')
                ->sortable()
                ->searchable()
                ->editOnClick(),

            Column::add()
                ->title('CITY')
                ->field('city_id'),

            Column::add()
                ->title('PHOTO')
                ->field('photo')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            // Column::add()
            //     ->title('EXTERNAL ID')
            //     ->field('external_id')
            //     ->sortable()
            //     ->searchable()
            //     ->makeInputText(),

            // Column::add()
            //     ->title('CREATED AT')
            //     ->field('created_at_formatted', 'created_at')
            //     ->searchable()
            //     ->sortable()
            //     ->makeInputDatePicker('created_at'),

            // Column::add()
            //     ->title('UPDATED AT')
            //     ->field('updated_at_formatted', 'updated_at')
            //     ->searchable()
            //     ->sortable()
            //     ->makeInputDatePicker('updated_at'),

        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Client Action Buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::add('edit')
               ->caption('Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('client.edit', ['client' => 'id']),

           Button::add('destroy')
               ->caption('Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('client.destroy', ['client' => 'id'])
               ->method('delete')
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Client Action Rules.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Rules\RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($client) => $client->id === 1)
                ->hide(),
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable the method below to use editOnClick() or toggleable() methods.
    | Data must be validated and treated (see "Update Data" in PowerGrid doc).
    |
    */

     /**
     * PowerGrid Client Update.
     *
     * @param array<string,string> $data
     */


    public function update(array $data ): bool
    {
       try {
           $updated = Client::query()->findOrFail($data['id'])
                ->update([
                    $data['field'] => $data['value'],
                ]);
       } catch (QueryException $exception) {
           $updated = false;
       }
       return $updated;
    }

    public function updateMessages(string $status = 'error', string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field'   => __('Custom Field updated successfully!'),
            ],
            'error' => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field'   => __('Error updating custom field.'),
            ]
        ];

        $message = ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);

        return (is_string($message)) ? $message : 'Error!';
    }

}
