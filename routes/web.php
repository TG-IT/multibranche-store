<?php
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});





Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Products
    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductsController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductsController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::post('products/process-csv-import', 'ProductsController@processCsvImport')->name('products.processCsvImport');
    Route::resource('products', 'ProductsController');

    // Expanses
    Route::delete('expanses/destroy', 'ExpansesController@massDestroy')->name('expanses.massDestroy');
    Route::post('expanses/media', 'ExpansesController@storeMedia')->name('expanses.storeMedia');
    Route::post('expanses/ckmedia', 'ExpansesController@storeCKEditorImages')->name('expanses.storeCKEditorImages');
    Route::resource('expanses', 'ExpansesController');

    // Expense Categories
    Route::delete('expense-categories/destroy', 'ExpenseCategoriesController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoriesController');

    // Customers
    Route::delete('customers/destroy', 'CustomersController@massDestroy')->name('customers.massDestroy');
    Route::resource('customers', 'CustomersController');

    // Product Categories
    Route::delete('product-categories/destroy', 'ProductCategoriesController@massDestroy')->name('product-categories.massDestroy');
    Route::resource('product-categories', 'ProductCategoriesController');
    
    // Branches Categories
    Route::delete('branshes/destroy', 'BranchesController@massDestroy')->name('branches.massDestroy');
    Route::resource('branches', 'BranchesController');
});



Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});


// Display the logo upload form
Route::get('/admin/logo', 'LogoController@showLogoForm')->name('admin.logo');

// Handle the logo upload process
Route::post('/admin/logo/upload', 'LogoController@uploadLogo')->name('admin.logo.upload');

// Route to display the menu with the uploaded logo
Route::get('/menu', 'LogoController@showMenu')->name('menu');












Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('custom-register', 'Auth\RegisterController@register');

Route::get('/settings', 'SiteSettingController@displaySettings')->name('settings');
Route::post('/settings', 'SiteSettingController@updateSettings')->name('settings.update');



// Route::get('/admin/branches', [BranchesController::class, 'index'])->name('admin.branches.index');
// Route::resource('admin/branches', BranchesController::class);
// Route::get('/admin/branches/{branch}', 'Admin\BranchesController@show')->name('admin.branches.show');
// Route::post('admin/branches/massDestroy', [BranchesController::class, 'massDestroy'])->name('admin.branches.massDestroy');
// Route::get('/admin/branches', 'Admin\BranchesController@index')->name('admin.branches.index');
// Route::get('/admin/branches/create', 'Admin\BranchesController@create')->name('admin.branches.create');
// Route::post('/admin/branches', 'Admin\BranchesController@store')->name('admin.branches.store');
// Route::get('/admin/branches/{branch}', 'Admin\BranchesController@edit')->name('admin.branches.edit');
// Route::delete('/admin/branches/{branch}', 'Admin\BranchesController@destroy')->name('admin.branches.destroy');
// Route::put('/admin/branches/{branch}', 'Admin\BranchesController@update')->name('admin.branches.update');





