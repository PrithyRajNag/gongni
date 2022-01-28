<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Localization
Route::get('/localization/{local}', 'LocalizationController');



Route::get('/', 'Auth\LoginController@showLoginForm')->name('customer-login');



Route::get('/forget-password', 'Auth\ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');
Route::post('/forget-password', 'Auth\ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post');
Route::post('/reset-password', 'Auth\ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

    Route::get('/table', 'DashboardController@table')->name('dashboard.tale');
    Route::get('/form', 'DashboardController@form')->name('dashboard.form');

    //Profile
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/{slug}/show', 'ProfileController@show')->name('show');

        Route::get('/{slug}/edit', 'ProfileController@edit')->name('edit');
        Route::put('/{slug}/update', 'ProfileController@update')->name('update');
        Route::get('/password', 'ProfileController@passUpdateIndex')->name('passUpdateIndex');
        Route::put('/pass/{profile}/passUpdate', 'ProfileController@passUpdate')->name('passUpdate');
    });

    //Ward
    Route::prefix('ward')->name('ward.')->group(function () {
        Route::get('/', 'WardController@index')->name('index');
        Route::get('/create', 'WardController@create')->name('create');
        Route::post('/store', 'WardController@store')->name('store');
        Route::get('/{slug}/show', 'WardController@show')->name('show');
        Route::get('/{slug}/edit', 'WardController@edit')->name('edit');
        Route::put('/{slug}/update', 'WardController@update')->name('update');
        Route::get('/{slug}/delete', 'WardController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'WardController@destroy')->name('destroy');
    });

    //Employee
    Route::prefix('employee')->name('employee.')->group(function () {
        Route::get('/', 'UserController@index')->name('index');
        Route::get('/create', 'UserController@create')->name('create');
        Route::post('/store', 'UserController@store')->name('store');
        Route::get('/{slug}/show', 'UserController@show')->name('show');
        Route::get('/{slug}/edit', 'UserController@edit')->name('edit');
        Route::put('/{slug}/update', 'UserController@update')->name('update');
        Route::get('/{slug}/delete', 'UserController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'UserController@destroy')->name('destroy');

        Route::get('{slug}/downloadImage', 'UserController@downloadImage')->name('downloadImage');
        Route::get('{slug}/downloadFile', 'UserController@downloadFile')->name('downloadFile');

//        Route::get('{slug}/downloadPDF', 'UserController@downloadPDF')->name('downloadPDF');


    });


    //People
    Route::prefix('people')->name('people.')->group(function () {
        Route::get('/', 'PeopleController@index')->name('index');
//        Route::post('/', 'PeopleController@search')->name('search');
        Route::get('/create', 'PeopleController@create')->name('create');
        Route::post('/store', 'PeopleController@store')->name('store');
        Route::get('/{slug}/show', 'PeopleController@show')->name('show');
        Route::get('/{slug}/edit', 'PeopleController@edit')->name('edit');
        Route::put('/{slug}/update', 'PeopleController@update')->name('update');
        Route::get('/{slug}/delete', 'PeopleController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'PeopleController@destroy')->name('destroy');

        Route::get('{slug}/download', 'PeopleController@download')->name('download');
    });

    //Commissioner
    Route::prefix('commissioner')->name('commissioner.')->group(function () {
        Route::get('/', 'CommissionerController@index')->name('index');
        Route::get('/{slug}/show', 'CommissionerController@show')->name('show');

        Route::get('/people', 'CommissionerController@peopleIndex')->name('people.index');
        Route::get('/people/{slug}/show', 'CommissionerController@peopleInfo')->name('people.show');
    });

    //Market
    Route::prefix('market')->name('market.')->group(function () {
        Route::get('/', 'MarketController@index')->name('index');
        Route::get('/create', 'MarketController@create')->name('create');
        Route::post('/store', 'MarketController@store')->name('store');
        Route::get('/{slug}/show', 'MarketController@show')->name('show');
        Route::get('/{slug}/edit', 'MarketController@edit')->name('edit');
        Route::put('/{slug}/update', 'MarketController@update')->name('update');
        Route::get('/{slug}/delete', 'MarketController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'MarketController@destroy')->name('destroy');

       // Route::resource('market', 'MarketController');
    });

    //Hospital
    Route::prefix('hospital')->name('hospital.')->group(function () {
        Route::get('/', 'HospitalController@index')->name('index');
        Route::get('/create', 'HospitalController@create')->name('create');
        Route::post('/store', 'HospitalController@store')->name('store');
        Route::get('/{slug}/show', 'HospitalController@show')->name('show');
        Route::get('/{slug}/edit', 'HospitalController@edit')->name('edit');
        Route::put('/{slug}/update', 'HospitalController@update')->name('update');
        Route::get('/{slug}/delete', 'HospitalController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'HospitalController@destroy')->name('destroy');

    });

    //Education_Institution
    Route::prefix('educationInstitution')->name('educationInstitution.')->group(function () {
        Route::get('/', 'EducationInstitutionController@index')->name('index');
        Route::get('/create', 'EducationInstitutionController@create')->name('create');
        Route::post('/store', 'EducationInstitutionController@store')->name('store');
        Route::get('/{slug}/show', 'EducationInstitutionController@show')->name('show');
        Route::get('/{slug}/edit', 'EducationInstitutionController@edit')->name('edit');
        Route::put('/{slug}/update', 'EducationInstitutionController@update')->name('update');
        Route::get('/{slug}/delete', 'EducationInstitutionController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'EducationInstitutionController@destroy')->name('destroy');
    });

    //Public Toilet
    Route::prefix('publicToilet')->name('publicToilet.')->group(function () {
        Route::get('/', 'PublicToiletController@index')->name('index');
        Route::get('/create', 'PublicToiletController@create')->name('create');
        Route::post('/store', 'PublicToiletController@store')->name('store');
        Route::get('/{slug}/show', 'PublicToiletController@show')->name('show');
        Route::get('/{slug}/edit', 'PublicToiletController@edit')->name('edit');
        Route::put('/{slug}/update', 'PublicToiletController@update')->name('update');
        Route::get('/{slug}/delete', 'PublicToiletController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'PublicToiletController@destroy')->name('destroy');
    });


    //Notice
    Route::prefix('notice')->name('notice.')->group(function () {
        Route::get('/', 'NoticeController@index')->name('index');
        Route::get('/create', 'NoticeController@create')->name('create');
        Route::post('/store', 'NoticeController@store')->name('store');
        Route::get('/{slug}/show', 'NoticeController@show')->name('show');
        Route::get('/{slug}/edit', 'NoticeController@edit')->name('edit');
        Route::put('/{slug}/update', 'NoticeController@update')->name('update');
        Route::get('/{slug}/delete', 'NoticeController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'NoticeController@destroy')->name('destroy');

        Route::get('{slug}/download', 'NoticeController@download')->name('download');
    });

    //Official_Form
    Route::prefix('officialForm')->name('officialForm.')->group(function () {
        Route::get('/', 'OfficialFormController@index')->name('index');
        Route::get('/create', 'OfficialFormController@create')->name('create');
        Route::post('/store', 'OfficialFormController@store')->name('store');
        Route::get('/{slug}/show', 'OfficialFormController@show')->name('show');
        Route::get('/{slug}/edit', 'OfficialFormController@edit')->name('edit');
        Route::put('/{slug}/update', 'OfficialFormController@update')->name('update');
        Route::get('/{slug}/delete', 'OfficialFormController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'OfficialFormController@destroy')->name('destroy');

        Route::get('/{slug}/downloadFile', 'OfficialFormController@downloadFile')->name('downloadFile');


    });

    //Work
    Route::prefix('work')->name('work.')->group(function (){
        Route::get('/', 'WorkController@index')->name('index');
        Route::get('/create', 'WorkController@create')->name('create');
        Route::post('/store', 'WorkController@store')->name('store');
        Route::get('/{slug}/show', 'WorkController@show')->name('show');
        Route::get('/{slug}/edit', 'WorkController@edit')->name('edit');
        Route::put('/{slug}/update', 'WorkController@update')->name('update');
        Route::get('/{slug}/delete', 'WorkController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'WorkController@destroy')->name('destroy');
    });

    //Vehicle_Licence
    Route::prefix('vehicleLicence')->name('vehicleLicence.')->group(function (){
        Route::get('/', 'VehicleLicenceController@index')->name('index');
        Route::get('/create', 'VehicleLicenceController@create')->name('create');
        Route::post('/store', 'VehicleLicenceController@store')->name('store');
        Route::get('/{slug}/show', 'VehicleLicenceController@show')->name('show');
        Route::get('/{slug}/edit', 'VehicleLicenceController@edit')->name('edit');
        Route::put('/{slug}/update', 'VehicleLicenceController@update')->name('update');
        Route::get('/{slug}/delete', 'VehicleLicenceController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'VehicleLicenceController@destroy')->name('destroy');
    });

    //Vehicle Type
    Route::prefix('vehicleType')->name('vehicleType.')->group(function (){
        Route::get('/', 'VehicleTypeController@index')->name('index');
        Route::get('/create', 'VehicleTypeController@create')->name('create');
        Route::post('/store', 'VehicleTypeController@store')->name('store');
        Route::get('/{slug}/show', 'VehicleTypeController@show')->name('show');
        Route::get('/{slug}/edit', 'VehicleTypeController@edit')->name('edit');
        Route::put('/{slug}/update', 'VehicleTypeController@update')->name('update');
        Route::get('/{slug}/delete', 'VehicleTypeController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'VehicleTypeController@destroy')->name('destroy');
    });

    //Relief_Category
    Route::prefix('reliefCategory')->name('reliefCategory.')->group(function () {
        Route::get('/', 'ReliefCategoryController@index')->name('index');
        Route::get('/create', 'ReliefCategoryController@create')->name('create');
        Route::post('/store', 'ReliefCategoryController@store')->name('store');
        Route::get('/{slug}/show', 'ReliefCategoryController@show')->name('show');
        Route::get('/{slug}/edit', 'ReliefCategoryController@edit')->name('edit');
        Route::put('/{slug}/update', 'ReliefCategoryController@update')->name('update');
        Route::get('/{slug}/delete', 'ReliefCategoryController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'ReliefCategoryController@destroy')->name('destroy');
    });
    //Relief_Card
    Route::prefix('reliefCard')->name('reliefCard.')->group(function () {
        Route::get('/', 'ReliefCardController@index')->name('index');
        Route::get('/create', 'ReliefCardController@create')->name('create');
        Route::post('/store', 'ReliefCardController@store')->name('store');
        Route::get('/{slug}/show', 'ReliefCardController@show')->name('show');
        Route::get('/{slug}/edit', 'ReliefCardController@edit')->name('edit');
        Route::put('/{slug}/update', 'ReliefCardController@update')->name('update');
        Route::get('/{slug}/delete', 'ReliefCardController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'ReliefCardController@destroy')->name('destroy');
    });

    //Contractor_Licence
    Route::prefix('contractorLicence')->name('contractorLicence.')->group(function () {
        Route::get('/', 'ContractorLicenceController@index')->name('index');
        Route::get('/create', 'ContractorLicenceController@create')->name('create');
        Route::post('/store', 'ContractorLicenceController@store')->name('store');
        Route::get('/{slug}/show', 'ContractorLicenceController@show')->name('show');
        Route::get('/{slug}/edit', 'ContractorLicenceController@edit')->name('edit');
        Route::put('/{slug}/update', 'ContractorLicenceController@update')->name('update');
        Route::get('/{slug}/delete', 'ContractorLicenceController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'ContractorLicenceController@destroy')->name('destroy');

        Route::get('{slug}/download', 'ContractorLicenceController@download')->name('download');
        Route::get('/{slug}/renew', 'ContractorLicenceController@renew')->name('renew');
        Route::put('/{slug}/renewUpdate', 'ContractorLicenceController@renewUpdate')->name('renewUpdate');
        Route::get('/{slug}/history', 'ContractorLicenceController@history')->name('history');
    });

    //Contractor_Category
    Route::prefix('contractorCategory')->name('contractorCategory.')->group(function () {
        Route::get('/', 'ContractorCategoryController@index')->name('index');
        Route::get('/create', 'ContractorCategoryController@create')->name('create');
        Route::post('/store', 'ContractorCategoryController@store')->name('store');
        Route::get('/{slug}/show', 'ContractorCategoryController@show')->name('show');
        Route::get('/{slug}/edit', 'ContractorCategoryController@edit')->name('edit');
        Route::put('/{slug}/update', 'ContractorCategoryController@update')->name('update');
        Route::get('/{slug}/delete', 'ContractorCategoryController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'ContractorCategoryController@destroy')->name('destroy');
    });

    //Trade_Licence
    Route::prefix('tradeLicence')->name('tradeLicence.')->group(function () {
        Route::get('/', 'TradeLicenceController@index')->name('index');
        Route::get('/create', 'TradeLicenceController@create')->name('create');
        Route::post('/store', 'TradeLicenceController@store')->name('store');
        Route::get('/{slug}/show', 'TradeLicenceController@show')->name('show');
        Route::get('/{slug}/edit', 'TradeLicenceController@edit')->name('edit');
        Route::put('/{slug}/update', 'TradeLicenceController@update')->name('update');
        Route::get('/{slug}/delete', 'TradeLicenceController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'TradeLicenceController@destroy')->name('destroy');

        Route::get('{slug}/download', 'TradeLicenceController@download')->name('download');

        Route::get('{slug}/renew', 'TradeLicenceController@renew')->name('renew');
        Route::put('{slug}/renewUpdate', 'TradeLicenceController@renewUpdate')->name('renewUpdate');
        Route::get('{slug}/history', 'TradeLicenceController@history')->name('history');

    });

    //Location
    Route::prefix('location')->name('location.')->group(function () {
        Route::get('/', 'LocationController@getAllLocation')->name('getAllLocation');
    });


    //Business_Category
    Route::prefix('businessCategory')->name('businessCategory.')->group(function () {
        Route::get('/', 'BusinessCategoryController@index')->name('index');
        Route::get('/create', 'BusinessCategoryController@create')->name('create');
        Route::post('/store', 'BusinessCategoryController@store')->name('store');
        Route::get('/{slug}/show', 'BusinessCategoryController@show')->name('show');
        Route::get('/{slug}/edit', 'BusinessCategoryController@edit')->name('edit');
        Route::put('/{slug}/update', 'BusinessCategoryController@update')->name('update');
        Route::get('/{slug}/delete', 'BusinessCategoryController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'BusinessCategoryController@destroy')->name('destroy');
    });

    //Category
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', 'CategoryController@index')->name('index');
        Route::get('/create', 'CategoryController@create')->name('create');
        Route::post('/store', 'CategoryController@store')->name('store');
        Route::get('/{slug}/show', 'CategoryController@show')->name('show');
        Route::get('/{slug}/edit', 'CategoryController@edit')->name('edit');
        Route::put('/{slug}/update', 'CategoryController@update')->name('update');
        Route::get('/{slug}/delete', 'CategoryController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'CategoryController@destroy')->name('destroy');
    });

    //Category
    Route::prefix('subCategory')->name('subCategory.')->group(function () {
        Route::get('/', 'SubCategoryController@index')->name('index');
        Route::get('/create', 'SubCategoryController@create')->name('create');
        Route::post('/store', 'SubCategoryController@store')->name('store');
        Route::get('/{slug}/show', 'SubCategoryController@show')->name('show');
        Route::get('/{slug}/edit', 'SubCategoryController@edit')->name('edit');
        Route::put('/{slug}/update', 'SubCategoryController@update')->name('update');
        Route::get('/{slug}/delete', 'SubCategoryController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'SubCategoryController@destroy')->name('destroy');
    });


    //Character_Certificate
    Route::prefix('characterCertificate')->name('characterCertificate.')->group(function (){
        Route::get('/', 'CharacterCertificateController@index')->name('index');
        Route::get('/create', 'CharacterCertificateController@create')->name('create');
        Route::post('/store', 'CharacterCertificateController@store')->name('store');
        Route::get('/{slug}/show', 'CharacterCertificateController@show')->name('show');
        Route::get('/{slug}/edit', 'CharacterCertificateController@edit')->name('edit');
        Route::put('/{slug}/update', 'CharacterCertificateController@update')->name('update');
        Route::get('/{slug}/delete', 'CharacterCertificateController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'CharacterCertificateController@destroy')->name('destroy');
    });

    //Equipment_Category
    Route::prefix('equipmentCategory')->name('equipmentCategory.')->group(function (){
        Route::get('/', 'EquipmentCategoryController@index')->name('index');
        Route::get('/create', 'EquipmentCategoryController@create')->name('create');
        Route::post('/store', 'EquipmentCategoryController@store')->name('store');
        Route::get('/{slug}/show', 'EquipmentCategoryController@show')->name('show');
        Route::get('/{slug}/edit', 'EquipmentCategoryController@edit')->name('edit');
        Route::put('/{slug}/update', 'EquipmentCategoryController@update')->name('update');
        Route::get('/{slug}/delete', 'EquipmentCategoryController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'EquipmentCategoryController@destroy')->name('destroy');
    });

    //Equipment
    Route::prefix('equipment')->name('equipment.')->group(function (){
        Route::get('/', 'EquipmentController@index')->name('index');
        Route::get('/create', 'EquipmentController@create')->name('create');
        Route::post('/store', 'EquipmentController@store')->name('store');
        Route::get('/{slug}/show', 'EquipmentController@show')->name('show');
        Route::get('/{slug}/edit', 'EquipmentController@edit')->name('edit');
        Route::put('/{slug}/update', 'EquipmentController@update')->name('update');
        Route::get('/{slug}/delete', 'EquipmentController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'EquipmentController@destroy')->name('destroy');
    });

    //Tender
    Route::prefix('tender')->name('tender.')->group(function (){
        Route::get('/', 'TenderController@index')->name('index');
        Route::get('/create', 'TenderController@create')->name('create');
        Route::post('/store', 'TenderController@store')->name('store');
        Route::get('/{slug}/show', 'TenderController@show')->name('show');
        Route::get('/{slug}/edit', 'TenderController@edit')->name('edit');
        Route::put('/{slug}/update', 'TenderController@update')->name('update');
        Route::get('/{slug}/delete', 'TenderController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'TenderController@destroy')->name('destroy');

        Route::get('{slug}/downloadFile', 'TenderController@downloadFile')->name('downloadFile');
    });

    //Circular
    Route::prefix('circular')->name('circular.')->group(function (){
        Route::get('/', 'CircularController@index')->name('index');
        Route::get('/create', 'CircularController@create')->name('create');
        Route::post('/store', 'CircularController@store')->name('store');
        Route::get('/{slug}/show', 'CircularController@show')->name('show');
        Route::get('/{slug}/edit', 'CircularController@edit')->name('edit');
        Route::put('/{slug}/update', 'CircularController@update')->name('update');
        Route::get('/{slug}/delete', 'CircularController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'CircularController@destroy')->name('destroy');

        Route::get('{slug}/download', 'CircularController@download')->name('download');
    });

    //Emergency Call
    Route::prefix('emergencyCall')->name('emergencyCall.')->group(function (){
        Route::get('/', 'EmergencyCallController@index')->name('index');
        Route::get('/create', 'EmergencyCallController@create')->name('create');
        Route::post('/store', 'EmergencyCallController@store')->name('store');
        Route::get('/{slug}/show', 'EmergencyCallController@show')->name('show');
        Route::get('/{slug}/edit', 'EmergencyCallController@edit')->name('edit');
        Route::put('/{slug}/update', 'EmergencyCallController@update')->name('update');
        Route::get('/{slug}/delete', 'EmergencyCallController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'EmergencyCallController@destroy')->name('destroy');
    });

    //Official Order
    Route::prefix('officialOrder')->name('officialOrder.')->group(function (){
        Route::get('/', 'OfficialOrderController@index')->name('index');
        Route::get('/create', 'OfficialOrderController@create')->name('create');
        Route::post('/store', 'OfficialOrderController@store')->name('store');
        Route::get('/{slug}/show', 'OfficialOrderController@show')->name('show');
        Route::get('/{slug}/edit', 'OfficialOrderController@edit')->name('edit');
        Route::put('/{slug}/update', 'OfficialOrderController@update')->name('update');
        Route::get('/{slug}/delete', 'OfficialOrderController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'OfficialOrderController@destroy')->name('destroy');

        Route::get('{slug}/download', 'OfficialOrderController@download')->name('download');
    });

    //Waste Management
    Route::prefix('wasteManagement')->name('wasteManagement.')->group(function (){
        Route::get('/', 'WasteManagementController@index')->name('index');
        Route::get('/create', 'WasteManagementController@create')->name('create');
        Route::post('/store', 'WasteManagementController@store')->name('store');
        Route::get('/{slug}/show', 'WasteManagementController@show')->name('show');
        Route::get('/{slug}/edit', 'WasteManagementController@edit')->name('edit');
        Route::put('/{slug}/update', 'WasteManagementController@update')->name('update');
        Route::get('/{slug}/delete', 'WasteManagementController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'WasteManagementController@destroy')->name('destroy');

        Route::get('{slug}/download', 'WasteManagementController@download')->name('download');
    });

    //Sms Template
    Route::prefix('smsTemplate')->name('smsTemplate.')->group(function () {
        Route::get('/', 'SmsTemplateController@index')->name('index');
        Route::get('/create', 'SmsTemplateController@create')->name('create');
        Route::post('/store', 'SmsTemplateController@store')->name('store');
        Route::get('/{slug}/delete', 'SmsTemplateController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'SmsTemplateController@destroy')->name('destroy');

        Route::get('/{slug}/send', 'SmsTemplateController@sendMessage')->name('send');

    });

    //SMS
    Route::prefix('sms')->name('sms.')->group(function () {
        Route::get('/', 'SmsController@index')->name('index');
        Route::post('/send', 'SmsController@send')->name('send');

    });

    //Equipment-Rent
    Route::prefix('equipmentRent')->name('equipmentRent.')->group(function (){
        Route::get('/', 'EquipmentRentController@index')->name('index');
        Route::get('/create', 'EquipmentRentController@create')->name('create');
        Route::post('/store', 'EquipmentRentController@store')->name('store');
        Route::get('/{slug}/show', 'EquipmentRentController@show')->name('show');
        Route::get('/{slug}/edit', 'EquipmentRentController@edit')->name('edit');
        Route::put('/{slug}/update', 'EquipmentRentController@update')->name('update');
        Route::get('/{slug}/delete', 'EquipmentRentController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'EquipmentRentController@destroy')->name('destroy');

    });

    //Street-Lamp
    Route::prefix('streetLamp')->name('streetLamp.')->group(function (){
        Route::get('/', 'StreetLampController@index')->name('index');
        Route::get('/create', 'StreetLampController@create')->name('create');
        Route::post('/store', 'StreetLampController@store')->name('store');
        Route::get('/{slug}/show', 'StreetLampController@show')->name('show');
        Route::get('/{slug}/edit', 'StreetLampController@edit')->name('edit');
        Route::put('/{slug}/update', 'StreetLampController@update')->name('update');
        Route::get('/{slug}/delete', 'StreetLampController@delete')->name('delete');
        Route::delete('/{slug}/destroy', 'StreetLampController@destroy')->name('destroy');

//        Route::get('/marker', 'StreetLampController@showMarker')->name('marker');

    });

//    //Daily Earning
//    Route::prefix('dailyEarning')->name('dailyEarning.')->group(function (){
//        Route::get('/', 'DailyEarningController@index')->name('index');
//        Route::get('/create', 'DailyEarningController@create')->name('create');
//        Route::post('/store', 'DailyEarningController@store')->name('store');
//        Route::get('/{slug}/show', 'DailyEarningController@show')->name('show');
//        Route::get('/{slug}/edit', 'DailyEarningController@edit')->name('edit');
//        Route::put('/{slug}/update', 'DailyEarningController@update')->name('update');
//        Route::get('/{slug}/delete', 'DailyEarningController@delete')->name('delete');
//        Route::delete('/{slug}/destroy', 'DailyEarningController@destroy')->name('destroy');
//
//    });

//    //Accounts
//    Route::prefix('account')->name('account.')->group(function (){
//        Route::get('/', 'AccountController@index')->name('index');
//        Route::get('/create', 'AccountController@create')->name('create');
//        Route::post('/store', 'AccountController@store')->name('store');
//        Route::get('/{slug}/show', 'AccountController@show')->name('show');
//        Route::get('/{slug}/edit', 'AccountController@edit')->name('edit');
//        Route::put('/{slug}/update', 'AccountController@update')->name('update');
//        Route::get('/get-sub-category/{id}', 'AccountController@getSubcategoryById');
////        Route::get('/{slug}/delete', 'AccountController@delete')->name('delete');
////        Route::delete('/{slug}/destroy', 'AccountController@destroy')->name('destroy');
//
//        Route::get('/allSub', 'AccountController@getAllSub')->name('delete');
//    });

    //Invoice
    Route::prefix('invoice')->name('invoice.')->group(function (){
        Route::get('/', 'InvoiceController@index')->name('index');
        Route::get('/create', 'InvoiceController@create')->name('create');
        Route::post('/store', 'InvoiceController@store')->name('store');
        Route::get('/{slug}/show', 'InvoiceController@show')->name('show');
        Route::get('/{slug}/edit', 'InvoiceController@edit')->name('edit');
        Route::put('/{slug}/update', 'InvoiceController@update')->name('update');
        Route::get('/get-sub-category/{id}', 'InvoiceController@getSubcategoryById');
        Route::get('/get-sub-category-price/{id}', 'InvoiceController@getPrice');
//        Route::get('/{slug}/delete', 'AccountController@delete')->name('delete');
//        Route::delete('/{slug}/destroy', 'AccountController@destroy')->name('destroy');

        Route::get('/allSub', 'AccountController@getAllSub')->name('delete');
    });

});
