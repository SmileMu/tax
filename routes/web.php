
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/a', function () {
    return view('auth.login');
});
Route::get('/number', function () {
    return view('pay.ac');
});

Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ac', ' PayController@index')->name('ac');

Route::group(['middleware' => ['auth']], function() {
   
//Route::resource('roles','RoleController');

//Route::resource('users','UserController');


    ########################################## Expenses route ##########################################
    Route::group(['prefix' => 'expenses' , 'middleware' => 'can:expense'], function () {
        Route::get('/', 'ExpensesController@index')->name('expenses');
        Route::get('create', 'ExpensesController@create')->name('expenses.create');
        Route::post('store', 'ExpensesController@store')->name('expenses.store');
        Route::get('edit/{id}', 'ExpensesController@edit')->name('expenses.edit');
        Route::post('update', 'ExpensesController@update')->name('expenses.update');
        Route::post('delete', 'ExpensesController@destroy')->name('expenses.delete');
        Route::get('outcame', 'ExpensesController@outcame')->name('expenses.outcame');

    });
    #########################################  end Expenses route #######################################

    ######################################## inistitution type routes  ########################################
    Route::group(['prefix' => 'types', 'middleware' => 'can:types'], function () {
        Route::get('/', 'TypeController@index')->name('types');
        Route::get('create', 'TypeController@create')->name('types.create');
        Route::get('print', 'TypeController@print')->name('types.print');
        Route::post('store', 'TypeController@store')->name('types.store');
        Route::get('edit/{id}', 'TypeController@edit')->name('types.edit');
        Route::post('update', 'TypeController@update')->name('types.update');
        Route::get('delete/{id}', 'TypeController@destroy')->name('types.delete');

    });
    ######################################## end inistitution type routes  ########################################

    ######################################## inistitution setions routes  ########################################
    Route::group(['prefix' => 'sections', 'middleware' => 'can:sections'], function () {
        Route::get('/', 'SectiontController@index')->name('setions');
        Route::get('create', 'SectiontController@create')->name('setions.create');
        Route::get('print', 'SectiontController@print')->name('setions.print');
        Route::post('store', 'SectiontController@store')->name('setions.store');
        Route::get('edit/{id}', 'SectiontController@edit')->name('setions.edit');
        Route::post('update', 'SectiontController@update')->name('setions.update');
        Route::get('delete/{id}', 'SectiontController@destroy')->name('setions.delete');

    });
    ######################################## end inistitution setions routes  ########################################


    ######################################## inistitution  routes  ########################################
    Route::group(['prefix' => 'institutions', 'middleware' => 'can:institutions'], function () {
        Route::get('/', 'InstitutionController@index')->name('institutions');
        Route::get('institution_report_type', 'InstitutionController@institution_report')->name('institution_report');
        Route::get('institution_report_type2', 'InstitutionController@institution_report_type2')->name('institution_report_type2');
        Route::get('institution_report', 'InstitutionController@institution_report_type')->name('institution_report_type');
        Route::get('create', 'InstitutionController@create')->name('institutions.create');
        Route::get('print', 'InstitutionController@print')->name('institutions.print');
        Route::post('store', 'InstitutionController@store')->name('institutions.store');
        Route::get('edit/{id}', 'InstitutionController@edit')->name('institutions.edit');
        Route::post('update', 'InstitutionController@update')->name('institutions.update');
        Route::get('delete/{id}', 'InstitutionController@destroy')->name('institutions.delete');

    });
    ######################################## end inistitution  routes  ########################################


 ################################## roles ######################################
 Route::group(['prefix' => 'roles', 'middleware' => 'can:roles'], function () {
    Route::get('/', 'RolesController@index')->name('admin.roles.index');
    Route::get('create', 'RolesController@create')->name('admin.roles.create');
    Route::post('store', 'RolesController@saveRole')->name('admin.roles.store');
    Route::get('/edit/{id}', 'RolesController@edit') ->name('admin.roles.edit') ;
    Route::post('update/{id}', 'RolesController@update')->name('admin.roles.update');
 });
################################## end roles ######################################


    ######################################## employee routes  ########################################
    Route::group(['prefix' => 'employees', 'middleware' => 'can:employees'], function () {
        Route::get('/', 'EmployeeController@index')->name('employees');
        Route::get('create', 'EmployeeController@create')->name('employees.create');
        Route::get('print', 'EmployeeController@print')->name('employees.print');
        Route::post('store', 'EmployeeController@store')->name('employees.store');
        Route::get('edit/{id}', 'EmployeeController@edit')->name('employees.edit');
        Route::post('update', 'EmployeeController@update')->name('employees.update');
        Route::get('delete/{id}', 'EmployeeController@destroy')->name('employees.delete');

    });
    ######################################## end employee routes  ########################################

 ######################################## users routes  ########################################
    Route::group(['prefix' => 'users', 'middleware' => 'can:users'], function () {
        Route::get('/', 'UserController@index')->name('users');
        Route::get('users_report', 'UserController@users_report')->name('users_report');
        Route::get('create', 'UserController@create')->name('users.create');
        Route::get('print', 'UserController@print')->name('users.print');
        Route::post('store', 'UserController@store')->name('users.store');
        Route::get('edit/{id}', 'UserController@edit')->name('users.edit');
        Route::get('edit_profile/{id}', 'UserController@edit_profile')->name('users.edit_profile');
        Route::post('update', 'UserController@update')->name('users.update');
        Route::post('update_profile', 'UserController@update_profile')->name('users.update_profile');
        Route::get('delete/{id}', 'UserController@destroy')->name('users.delete');

    });
    ######################################## end users routes  ########################################



 ######################################## report routes  ########################################
   Route::group(['prefix' => 'report', 'middleware' => 'can:report'], function () {
        Route::get('employees_report', 'EmployeeController@employees_report')->name('employees_report');
        Route::get('employees_report_sal', 'EmployeeController@employees_report_sal')->name('employees_report_sal');
        Route::get(' employees_report_date', 'EmployeeController@employees_report_date')->name('employees_report_date');
        Route::get('employees_report_inst', 'EmployeeController@employees_report_inst')->name('employees_report_inst');
        Route::get('employees_report_inst', 'EmployeeController@employees_report_inst')->name('employees_report_inst');
        Route::get('create', 'EmployeeController@create')->name('employees.create');
        Route::get('print', 'EmployeeController@print')->name('employees.print');
        Route::post('store', 'EmployeeController@store')->name('employees.store');
        Route::get('edit/{id}', 'EmployeeController@edit')->name('employees.edit');
        Route::post('update', 'EmployeeController@update')->name('employees.update');
        Route::get('delete/{id}', 'EmployeeController@destroy')->name('employees.delete');

    });

    ######################################## end report routes  ########################################




    ################################## account ######################################
Route::group(['prefix' => 'accounts', 'middleware' => 'can:accounts'], function () {
    Route::get('/', 'AccountController@index')->name('accounts');
    Route::get('create', 'AccountController@create')->name('accounts.create');
    Route::post('store', 'AccountController@store')->name('accounts.store');
    Route::get('/edit/{id}', 'AccountController@edit') ->name('accounts.edit') ;
    Route::post('update/', 'AccountController@update')->name('accounts.update');
    Route::get('delete/{id}', 'AccountController@destroy')->name('accounts.delete');
 });
################################## end account ######################################

   ################################## banks ######################################
   Route::group(['prefix' => 'banks', 'middleware' => 'can:banks'], function () {
    Route::get('/', 'BankController@index')->name('banks');
    Route::get('create', 'BankController@create')->name('banks.create');
    Route::post('store', 'BankController@store')->name('banks.store');
    Route::get('/edit/{id}', 'BankController@edit') ->name('banks.edit') ;
    Route::post('update/', 'BankController@update')->name('banks.update');
    Route::get('delete/{id}', 'BankController@destroy')->name('banks.delete');
 });
################################## end banks ######################################






});
//
//Route::get('invoices_report', 'Invoices_Report@index');
//
//Route::post('Search_invoices', 'Invoices_Report@Search_invoices');
//
//Route::get('customers_report', 'Customers_Report@index')->name("customers_report");
//
//Route::post('Search_customers', 'Customers_Report@Search_customers');
//
Route::get('MarkAsRead_all','InvoicesController@MarkAsRead_all')->name('MarkAsRead_all');

Route::get('unreadNotifications_count', 'InvoicesController@unreadNotifications_count')->name('unreadNotifications_count');

Route::get('unreadNotifications', 'InvoicesController@unreadNotifications')->name('unreadNotifications');


Route::get('/{page}', 'AdminController@index');
