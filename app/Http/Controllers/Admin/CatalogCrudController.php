<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class BookCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CatalogCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Catalog::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/catalog');
        CRUD::setEntityNameStrings('catalog', 'catalogs');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // set columns from db columns.

        // Columns can be defined using the fluent syntax:
        CRUD::column([
            'label' => 'Title',
            'type' => 'text',
            'name' => 'title',
        ]);
        // CRUD::column([
        //     'label' => 'Description',
        //     'type' => 'text',
        //     'name' => 'description',
        // ]);
        // CRUD::column([
        //     'label' => 'Cover',
        //     'type' => 'text',
        //     'name' => 'cover',
        // ]);
        CRUD::column([
            'label' => 'Author',
            'type' => 'select',
            'name' => 'author_id',
            'entity' => 'book_author',
            'attribute' => 'name',
            'model' => \App\Models\BookAuthor::class,
        ]);
        CRUD::column([
            'label' => 'Publisher',
            'type' => 'select',
            'name' => 'publisher_id',
            'entity' => 'book_publisher',
            'attribute' => 'name',
            'model' => \App\Models\BookPublisher::class,
        ]);
        CRUD::column([
            'label' => 'Category',
            'type' => 'select',
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => \App\Models\Category::class,
        ]);
        CRUD::column([
            'label' => 'Service',
            'type' => 'select',
            'name' => 'service_id',
            'entity' => 'service',
            'attribute' => 'name',
            'model' => \App\Models\Service::class,
        ]);
        CRUD::column([
            'label' => 'ID in External System',
            'type' => 'text',
            'name' => 'external_id',
        ]);
        // CRUD::column([
        //     'label' => 'Link',
        //     'type' => 'text',
        //     'name' => 'link',
        // ]);
        // CRUD::column([
        //     'label' => 'Owner',
        //     'type' => 'select',
        //     'name' => 'owner_id',
        //     'entity' => 'owner',
        //     'attribute' => 'name',
        //     'model' => \App\Models\User::class,
        // ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation([
            'title' => 'required|min:3|max:127',
            'description' => 'nullable|max:255',
            'cover' => 'nullable|max:255',
            'author_id' => 'required|exists:book_author,id',
            'publisher_id' => 'required|exists:book_publisher,id',
            'category_id' => 'required|exists:category,id',
            'service_id' => 'nullable|exists:service,id',
            'external_id' => 'nullable|max:255',
            'link' => 'nullable|max:255',
            'owner_id' => 'nullable|exists:user,id',
        ]);
        // CRUD::setFromDb(); // set fields from db columns.

        // Fields can be defined using the fluent syntax:
        CRUD::field([
            'label' => 'Title',
            'type' => 'text',
            'name' => 'title',
        ]);
        CRUD::field([
            'label' => 'Description',
            'type' => 'text',
            'name' => 'description',
        ]);
        CRUD::field([
            'label' => 'Cover',
            'type' => 'text',
            'name' => 'cover',
        ]);
        CRUD::field([
            'label' => 'Author',
            'type' => 'select',
            'name' => 'author_id',
            'entity' => 'book_author',
        ]);
        CRUD::field([
            'label' => 'Publisher',
            'type' => 'select',
            'name' => 'publisher_id',
            'entity' => 'book_publisher',
        ]);
        CRUD::field([
            'label' => 'Category',
            'type' => 'select',
            'name' => 'category_id',
            'entity' => 'category',
        ]);
        CRUD::field([
            'label' => 'Service',
            'type' => 'select',
            'name' => 'service_id',
            'entity' => 'service',
        ]);
        CRUD::field([
            'label' => 'ID in External System',
            'type' => 'text',
            'name' => 'external_id',
            'hint' => 'Get ID on Google Drive from share URL, make sure your account is the owner of the file.',
        ]);
        CRUD::field([
            'label' => 'Link',
            'type' => 'text',
            'name' => 'link',
        ]);
        CRUD::field([
            'label' => 'Owner',
            'type' => 'select',
            'name' => 'owner_id',
            'entity' => 'owner',
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
