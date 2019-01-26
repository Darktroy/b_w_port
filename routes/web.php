    <?php

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

Route::get('/', function () {
    return view('welcome');
});

    Route::get('companies/create','CompaniesController@create')->name('companies.company.create');
    Route::post('companies/', 'CompaniesController@store')->name('companies.company.store');
    Auth::routes();
    Route::middleware('auth:web')->group(function(){
            
            Route::get('/home', 'HomeController@index')->name('home');
            Route::get('/editEmployee/{userEmail}','employee@show');
            Route::post('employeeUpdate/{userEmail}','employee@update');
            
            Route::group([ 'prefix' => 'companies',], function () {
                Route::get('/list-Employees','employee@showAll');
                Route::get('/', 'CompaniesController@index')->name('companies.company.index');
//                Route::get('/create','CompaniesController@create')->name('companies.company.create');
                Route::get('/createEmployee','CompaniesController@createEmployee')->name('companies.company.createEmployee');
                Route::get('/show','CompaniesController@show')->name('companies.company.show');
                Route::get('/showDetails','CompaniesController@showDetails')->name('companies.company.show');
                Route::get('/{company}/edit','CompaniesController@edit')->name('companies.company.edit')->where('id', '[0-9]+');
//                Route::post('/', 'CompaniesController@store')->name('companies.company.store');
                Route::post('/update', 'CompaniesController@updateCompany')->name('companies.company.store');
                Route::post('/storeEmployee', 'CompaniesController@storeEmployee')->name('companies.company.storeEmloyee');
                Route::post('/Updating', 'CompaniesController@companyUpdate');
                Route::put('company/{company}', 'CompaniesController@update')->name('companies.company.update')->where('id', '[0-9]+');
                Route::delete('/company/{company}','CompaniesController@destroy')->name('companies.company.destroy')->where('id', '[0-9]+');
            });

            Route::group(['prefix' => 'branchs',], function () {
                Route::get('/', 'BranchsController@index')->name('branchs.branchs.index');
                Route::get('/create','BranchsController@create')->name('branchs.branchs.create');
                Route::get('/show/{branchs}','BranchsController@show')->name('branchs.branchs.show')->where('id', '[0-9]+');
                Route::get('/showAllDepartements','BranchsController@showAllDepartements');
                Route::get('/{branchs}/edit','BranchsController@edit')->name('branchs.branchs.edit')->where('id', '[0-9]+');
                Route::post('/', 'BranchsController@store')->name('branchs.branchs.store');
                Route::put('branchs/{branchs}', 'BranchsController@update')->name('branchs.branchs.update')->where('id', '[0-9]+');
                Route::delete('/branchs/{branchs}','BranchsController@destroy')->name('branchs.branchs.destroy')->where('id', '[0-9]+');
            });
            
            Route::group(
            ['prefix' => 'departments',], function () {
                Route::get('/', 'DepartementsController@index')->name('departments.departments.index');
                Route::get('/create','DepartementsController@create')->name('departments.departments.create');
                Route::get('/show/{departments}','DepartementsController@show')->name('departments.departments.show')->where('id', '[0-9]+');
                Route::get('/showAllDepartements','DepartementsController@showAllDepartements')->name('departments.departments.showAllDepartements');
                Route::get('/{departments}/edit','DepartementsController@edit')->name('departments.departments.edit')->where('id', '[0-9]+');
                Route::post('/', 'DepartementsController@store')->name('departments.departments.store');
                Route::put('departments/{departments}', 'DepartementsController@update')->name('departments.departments.update')->where('id', '[0-9]+');
                Route::delete('/departments/{departments}','DepartementsController@destroy')->name('departments.departments.destroy')->where('id', '[0-9]+');
            });
            Route::group(
            ['prefix' => 'employee',], function () {
                Route::get('/', 'DepartementsController@index')->name('departments.departments.index');
                Route::get('/create','DepartementsController@create')->name('departments.departments.create');
                Route::get('/show/{departments}','DepartementsController@show')->name('departments.departments.show')->where('id', '[0-9]+');
                Route::get('/showAllDepartements','DepartementsController@showAllDepartements')->name('departments.departments.showAllDepartements');
                Route::get('/{departments}/edit','DepartementsController@edit')->name('departments.departments.edit')->where('id', '[0-9]+');
                Route::post('/', 'DepartementsController@store')->name('departments.departments.store');
                Route::put('departments/{departments}', 'DepartementsController@update')->name('departments.departments.update')->where('id', '[0-9]+');
                Route::delete('/departments/{departments}','DepartementsController@destroy')->name('departments.departments.destroy')->where('id', '[0-9]+');
            });
            /*
            Route::group(
            [
                'prefix' => 'activation_processes',
            ], function () {

                Route::get('/', 'ActivationProcessesController@index')
                     ->name('activation_processes.activation_process.index');

                Route::get('/create','ActivationProcessesController@create')
                     ->name('activation_processes.activation_process.create');

                Route::get('/show/{activationProcess}','ActivationProcessesController@show')
                     ->name('activation_processes.activation_process.show')
                     ->where('id', '[0-9]+');

                Route::get('/{activationProcess}/edit','ActivationProcessesController@edit')
                     ->name('activation_processes.activation_process.edit')
                     ->where('id', '[0-9]+');

                Route::post('/', 'ActivationProcessesController@store')
                     ->name('activation_processes.activation_process.store');

                Route::put('activation_process/{activationProcess}', 'ActivationProcessesController@update')
                     ->name('activation_processes.activation_process.update')
                     ->where('id', '[0-9]+');

                Route::delete('/activation_process/{activationProcess}','ActivationProcessesController@destroy')
                     ->name('activation_processes.activation_process.destroy')
                     ->where('id', '[0-9]+');

            });



            Route::group(
            [ 'prefix' => 'user_cards',], function () {

                Route::get('/', 'UserCardsController@index')
                     ->name('user_cards.user_cards.index');

                Route::get('/create','UserCardsController@create')
                     ->name('user_cards.user_cards.create');

                Route::get('/show/{userCards}','UserCardsController@show')
                     ->name('user_cards.user_cards.show')
                     ->where('id', '[0-9]+');

                Route::get('/{userCards}/edit','UserCardsController@edit')
                     ->name('user_cards.user_cards.edit')
                     ->where('id', '[0-9]+');

                Route::post('/', 'UserCardsController@store')
                     ->name('user_cards.user_cards.store');

                Route::put('user_cards/{userCards}', 'UserCardsController@update')
                     ->name('user_cards.user_cards.update')
                     ->where('id', '[0-9]+');

                Route::delete('/user_cards/{userCards}','UserCardsController@destroy')
                     ->name('user_cards.user_cards.destroy')
                     ->where('id', '[0-9]+');

            });

            Route::group(
            [
                'prefix' => 'interestes',
            ], function () {

                Route::get('/', 'InterestesController@index')
                     ->name('interestes.interestes.index');

                Route::get('/create','InterestesController@create')
                     ->name('interestes.interestes.create');

                Route::get('/show/{interestes}','InterestesController@show')
                     ->name('interestes.interestes.show')
                     ->where('id', '[0-9]+');

                Route::get('/{interestes}/edit','InterestesController@edit')
                     ->name('interestes.interestes.edit')
                     ->where('id', '[0-9]+');

                Route::post('/', 'InterestesController@store')
                     ->name('interestes.interestes.store');

                Route::put('interestes/{interestes}', 'InterestesController@update')
                     ->name('interestes.interestes.update')
                     ->where('id', '[0-9]+');

                Route::delete('/interestes/{interestes}','InterestesController@destroy')
                     ->name('interestes.interestes.destroy')
                     ->where('id', '[0-9]+');

            });

            Route::group(
            ['prefix' => 'card_to_interests',
            ], function () {

                Route::get('/', 'CardToInterestsController@index')
                     ->name('card_to_interests.card_to_interests.index');

                Route::get('/create','CardToInterestsController@create')
                     ->name('card_to_interests.card_to_interests.create');

                Route::get('/show/{cardToInterests}','CardToInterestsController@show')
                     ->name('card_to_interests.card_to_interests.show')
                     ->where('id', '[0-9]+');

                Route::get('/{cardToInterests}/edit','CardToInterestsController@edit')
                     ->name('card_to_interests.card_to_interests.edit')
                     ->where('id', '[0-9]+');

                Route::post('/', 'CardToInterestsController@store')
                     ->name('card_to_interests.card_to_interests.store');

                Route::put('card_to_interests/{cardToInterests}', 'CardToInterestsController@update')
                     ->name('card_to_interests.card_to_interests.update')
                     ->where('id', '[0-9]+');

                Route::delete('/card_to_interests/{cardToInterests}','CardToInterestsController@destroy')
                     ->name('card_to_interests.card_to_interests.destroy')
                     ->where('id', '[0-9]+');

            });

            Route::group(
            [
                'prefix' => 'faqs',
            ], function () {

                Route::get('/', 'FaqsController@index')
                     ->name('faqs.faq.index');

                Route::get('/create','FaqsController@create')
                     ->name('faqs.faq.create');

                Route::get('/show/{faq}','FaqsController@show')
                     ->name('faqs.faq.show')
                     ->where('id', '[0-9]+');

                Route::get('/{faq}/edit','FaqsController@edit')
                     ->name('faqs.faq.edit')
                     ->where('id', '[0-9]+');

                Route::post('/', 'FaqsController@store')
                     ->name('faqs.faq.store');

                Route::put('faq/{faq}', 'FaqsController@update')
                     ->name('faqs.faq.update')
                     ->where('id', '[0-9]+');

                Route::delete('/faq/{faq}','FaqsController@destroy')
                     ->name('faqs.faq.destroy')
                     ->where('id', '[0-9]+');

            });

            Route::group(
            [
                'prefix' => 'terms',
            ], function () {

                Route::get('/', 'TermsController@index')
                     ->name('terms.terms.index');

                Route::get('/create','TermsController@create')
                     ->name('terms.terms.create');

                Route::get('/show/{terms}','TermsController@show')
                     ->name('terms.terms.show')
                     ->where('id', '[0-9]+');

                Route::get('/{terms}/edit','TermsController@edit')
                     ->name('terms.terms.edit')
                     ->where('id', '[0-9]+');

                Route::post('/', 'TermsController@store')
                     ->name('terms.terms.store');

                Route::put('terms/{terms}', 'TermsController@update')
                     ->name('terms.terms.update')
                     ->where('id', '[0-9]+');

                Route::delete('/terms/{terms}','TermsController@destroy')
                     ->name('terms.terms.destroy')
                     ->where('id', '[0-9]+');

            });

            Route::group(
            [
                'prefix' => 'requests',
            ], function () {

                Route::get('/', 'RequestsController@index')
                     ->name('requests.requests.index');

                Route::get('/create','RequestsController@create')
                     ->name('requests.requests.create');

                Route::get('/show/{requests}','RequestsController@show')
                     ->name('requests.requests.show')
                     ->where('id', '[0-9]+');

                Route::get('/{requests}/edit','RequestsController@edit')
                     ->name('requests.requests.edit')
                     ->where('id', '[0-9]+');

                Route::post('/', 'RequestsController@store')
                     ->name('requests.requests.store');

                Route::put('requests/{requests}', 'RequestsController@update')
                     ->name('requests.requests.update')
                     ->where('id', '[0-9]+');

                Route::delete('/requests/{requests}','RequestsController@destroy')
                     ->name('requests.requests.destroy')
                     ->where('id', '[0-9]+');

            });

          
            Route::group(
            [
                'prefix' => 'resetsteps',
            ], function () {

                Route::get('/', 'ResetstepsController@index')
                     ->name('resetsteps.resetsteps.index');

                Route::get('/create','ResetstepsController@create')
                     ->name('resetsteps.resetsteps.create');

                Route::get('/show/{resetsteps}','ResetstepsController@show')
                     ->name('resetsteps.resetsteps.show')
                     ->where('id', '[0-9]+');

                Route::get('/{resetsteps}/edit','ResetstepsController@edit')
                     ->name('resetsteps.resetsteps.edit')
                     ->where('id', '[0-9]+');

                Route::post('/', 'ResetstepsController@store')
                     ->name('resetsteps.resetsteps.store');

                Route::put('resetsteps/{resetsteps}', 'ResetstepsController@update')
                     ->name('resetsteps.resetsteps.update')
                     ->where('id', '[0-9]+');

                Route::delete('/resetsteps/{resetsteps}','ResetstepsController@destroy')
                     ->name('resetsteps.resetsteps.destroy')
                     ->where('id', '[0-9]+');

            });

            

            Route::group(
            [
                'prefix' => 'messag_records',
            ], function () {

                Route::get('/', 'MessagRecordsController@index')
                     ->name('messag_records.messag_record.index');

                Route::get('/create','MessagRecordsController@create')
                     ->name('messag_records.messag_record.create');

                Route::get('/show/{messagRecord}','MessagRecordsController@show')
                     ->name('messag_records.messag_record.show')
                     ->where('id', '[0-9]+');

                Route::get('/{messagRecord}/edit','MessagRecordsController@edit')
                     ->name('messag_records.messag_record.edit')
                     ->where('id', '[0-9]+');

                Route::post('/', 'MessagRecordsController@store')
                     ->name('messag_records.messag_record.store');

                Route::put('messag_record/{messagRecord}', 'MessagRecordsController@update')
                     ->name('messag_records.messag_record.update')
                     ->where('id', '[0-9]+');

                Route::delete('/messag_record/{messagRecord}','MessagRecordsController@destroy')
                     ->name('messag_records.messag_record.destroy')
                     ->where('id', '[0-9]+');

            });

            Route::group(
            [
                'prefix' => 'recent_activities',
            ], function () {

                Route::get('/', 'RecentActivitiesController@index')
                     ->name('recent_activities.recent_activity.index');

                Route::get('/create','RecentActivitiesController@create')
                     ->name('recent_activities.recent_activity.create');

                Route::get('/show/{recentActivity}','RecentActivitiesController@show')
                     ->name('recent_activities.recent_activity.show')
                     ->where('id', '[0-9]+');

                Route::get('/{recentActivity}/edit','RecentActivitiesController@edit')
                     ->name('recent_activities.recent_activity.edit')
                     ->where('id', '[0-9]+');

                Route::post('/', 'RecentActivitiesController@store')
                     ->name('recent_activities.recent_activity.store');

                Route::put('recent_activity/{recentActivity}', 'RecentActivitiesController@update')
                     ->name('recent_activities.recent_activity.update')
                     ->where('id', '[0-9]+');

                Route::delete('/recent_activity/{recentActivity}','RecentActivitiesController@destroy')
                     ->name('recent_activities.recent_activity.destroy')
                     ->where('id', '[0-9]+');

            });

            Route::group(
            [
                'prefix' => 'invitation_contacts',
            ], function () {

                Route::get('/', 'InvitationContactsController@index')
                     ->name('invitation_contacts.invitation_contacts.index');

                Route::get('/create','InvitationContactsController@create')
                     ->name('invitation_contacts.invitation_contacts.create');

                Route::get('/show/{invitationContacts}','InvitationContactsController@show')
                     ->name('invitation_contacts.invitation_contacts.show')
                     ->where('id', '[0-9]+');

                Route::get('/{invitationContacts}/edit','InvitationContactsController@edit')
                     ->name('invitation_contacts.invitation_contacts.edit')
                     ->where('id', '[0-9]+');

                Route::post('/', 'InvitationContactsController@store')
                     ->name('invitation_contacts.invitation_contacts.store');

                Route::put('invitation_contacts/{invitationContacts}', 'InvitationContactsController@update')
                     ->name('invitation_contacts.invitation_contacts.update')
                     ->where('id', '[0-9]+');

                Route::delete('/invitation_contacts/{invitationContacts}','InvitationContactsController@destroy')
                     ->name('invitation_contacts.invitation_contacts.destroy')
                     ->where('id', '[0-9]+');

            });

            Route::group(
            [
                'prefix' => 'stagings',
            ], function () {

                Route::get('/', 'StagingsController@index')
                     ->name('stagings.staging.index');

                Route::get('/create','StagingsController@create')
                     ->name('stagings.staging.create');

                Route::get('/show/{staging}','StagingsController@show')
                     ->name('stagings.staging.show')
                     ->where('id', '[0-9]+');

                Route::get('/{staging}/edit','StagingsController@edit')
                     ->name('stagings.staging.edit')
                     ->where('id', '[0-9]+');

                Route::post('/', 'StagingsController@store')
                     ->name('stagings.staging.store');

                Route::put('staging/{staging}', 'StagingsController@update')
                     ->name('stagings.staging.update')
                     ->where('id', '[0-9]+');

                Route::delete('/staging/{staging}','StagingsController@destroy')
                     ->name('stagings.staging.destroy')
                     ->where('id', '[0-9]+');

            });
*/
});