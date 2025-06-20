<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AiController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\LeadDetailsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\LeadConfigurationController;

use App\Http\Controllers\SecurityController;

// Security routes
Route::get('/security', [SecurityController::class, 'index'])->name('security');

// Profile management routes
Route::get('/profile/{id}/password', [SecurityController::class, 'showPasswordForm'])->name('profile.password.form');
Route::post('/profile/{id}/password', [SecurityController::class, 'updatePassword'])->name('profile.password.update');

Route::get('/profile/{id}/edit-data', [SecurityController::class, 'editProfile'])->name('profile.edit');
Route::put('/profile/{id}', [SecurityController::class, 'updateProfile'])->name('profile.update');
// Add these routes to your routes/web.php file

use App\Http\Controllers\GroupController;

Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');




 Route::group(['prefix' => 'leads'], function () {
            // Main configuration page
            Route::get('/configuration', [LeadConfigurationController::class, 'index'])
                ->name('leads.configuration');
                
            // Main leads listing page
            Route::get('/', [LeadConfigurationController::class, 'leadsList'])
                ->name('leads.index');
                
            // Lead Sources Routes
            Route::group(['prefix' => 'configuration/sources'], function () {
                Route::post('/', [LeadConfigurationController::class, 'storeSource'])
                    ->name('lead.sources.store');
                Route::get('/{id}', [LeadConfigurationController::class, 'showSource'])
                    ->name('lead.sources.show');
                Route::put('/{id}', [LeadConfigurationController::class, 'updateSource'])
                    ->name('lead.sources.update');

                Route::delete('/{id}', [LeadConfigurationController::class, 'deleteSource'])
                    ->name('lead.sources.destroy');
            });
            
            Route::get('source/{id}', [LeadConfigurationController::class, 'showSource']);
            // Lead Dispositions Routes
            Route::group(['prefix' => 'configuration/dispositions'], function () {
                Route::post('/', [LeadConfigurationController::class, 'storeDisposition'])
                    ->name('lead.dispositions.store');
                Route::get('/{id}', [LeadConfigurationController::class, 'showDisposition'])
                    ->name('lead.dispositions.show');
                Route::post('/{id}', [LeadConfigurationController::class, 'updateDisposition'])
                    ->name('lead.dispositions.update');
                Route::delete('/{id}', [LeadConfigurationController::class, 'deleteDisposition'])
                    ->name('lead.dispositions.destroy');
            });
            
            // Lead Statuses Routes
            Route::group(['prefix' => 'configuration/statuses'], function () {
                Route::post('/', [LeadConfigurationController::class, 'storeStatus'])
                    ->name('lead.statuses.store');
                Route::get('/{id}', [LeadConfigurationController::class, 'showStatus'])
                    ->name('lead.statuses.show');
                Route::post('/{id}', [LeadConfigurationController::class, 'updateStatus'])
                    ->name('lead.statuses.update');
                Route::delete('/{id}', [LeadConfigurationController::class, 'deleteStatus'])
                    ->name('lead.statuses.destroy');
            });
        });
        
    

/*
|--------------------------------------------------------------------------
| Contacts Routes
|--------------------------------------------------------------------------
*/


use App\Http\Controllers\ContactController;

// Contact routes
Route::group(['prefix' => 'contacts'], function () {
    Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('/', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/{id}', [ContactController::class, 'show'])->name('contacts.show');
    Route::get('/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/{id}', [ContactController::class, 'update'])->name('contacts.update');
      Route::delete('/bulk-delete', [ContactController::class, 'bulkDelete'])->name('contacts.bulk.delete');
    Route::delete('/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::post('/{id}/delete', [ContactController::class, 'delete'])->name('contacts.delete');
  


   Route::get('/contact-groups', [ContactController::class, 'getGroups']);
   

    
    // Additional routes
    Route::get('/data/table', [ContactController::class, 'getData'])->name('contacts.data');
    Route::get('/view/grid', [ContactController::class, 'grid'])->name('contacts.grid');
    Route::post('/export/pdf', [ContactController::class, 'exportPdf'])->name('contacts.export.pdf');
    Route::post('/export/excel', [ContactController::class, 'exportExcel'])->name('contacts.export.excel');
});

/*
|--------------------------------------------------------------------------
| Campaign Routes
|--------------------------------------------------------------------------
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('campaign')->name('campaign.')->group(function () {
    Route::get('/', [CampaignController::class, 'index'])->name('index');
    Route::get('/stats', [CampaignController::class, 'getStats'])->name('stats');
    Route::get('/list', [CampaignController::class, 'list'])->name('list');
    Route::get('/templates', [CampaignController::class, 'templates'])->name('templates');
    Route::get('/groups', [CampaignController::class, 'getGroups'])->name('groups');
    Route::post('/', [CampaignController::class, 'store'])->name('store');
    Route::get('/{campaign}', [CampaignController::class, 'show'])->name('show');
    Route::post('/{campaign}/run', [CampaignController::class, 'run'])->name('run');
    Route::delete('/{campaign}', [CampaignController::class, 'destroy'])->name('destroy');
    Route::get('/campaign', [CampaignController::class,'index'])->name('campaign'); 

});



/*
|--------------------------------------------------------------------------
| Leads Routes
|--------------------------------------------------------------------------
*/

// Lead Routes
Route::group(['prefix' => 'leads'], function () {
    // Main leads page
    Route::get('/', [LeadsController::class, 'index'])->name('leads.index'); 
    
    // CRUD Operations
    Route::post('/store', [LeadsController::class, 'store'])->name('leads.store');
    Route::get('/{id}/edit', [LeadsController::class, 'edit'])->name('leads.edit');
    Route::post('/{id}/update', [LeadsController::class, 'update'])->name('leads.update');
    Route::delete('/{id}/delete', [LeadsController::class, 'destroy'])->name('leads.destroy');
    Route::delete('/bulk-delete', [LeadsController::class, 'bulkDelete'])->name('leads.bulk.delete');
    Route::post('/import', [LeadsController::class, 'importLeads'])->name('leads.import');
    
    // Lead Details
    Route::get('/leads-details/{id}', [LeadsController::class, 'show'])->name('leads.show');
    
    Route::post('/export/pdf', [LeadsController::class, 'exportPdf'])->name('leads.export.pdf');
    Route::post('/export/excel', [LeadsController::class, 'exportExcel'])->name('leads.export.excel');
    Route::get('/download-template', [LeadsController::class, 'downloadTemplate'])->name('leads.template');
    
    // Statistics
    Route::get('/statistics', [LeadsController::class, 'statistics'])->name('leads.statistics');
});

// routes/api.php
Route::get('/lead-sources', [LeadsController::class, 'source']);
Route::get('/lead-dispositions', [LeadsController::class, 'dispositions']);




// Alternative route patterns (if needed for compatibility)
Route::get('/leads-source', [LeadsController::class, 'index']);
Route::get('/leads-details/{id}', [LeadsController::class, 'show']);
Route::get('/company-details/{id}', function($id) {
    // Redirect to leads details for now, or implement company controller later
    return redirect()->route('leads.show', $id);
});




/*
|--------------------------------------------------------------------------
| Profiles Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.add');
    Route::post('/profile/upload-image', [ProfileController::class, 'uploadImage'])->name('profile.upload-image');
    Route::delete('/profile/remove-image', [ProfileController::class, 'removeImage'])->name('profile.remove-image');
    Route::get('/profile/data', [ProfileController::class, 'getProfile'])->name('profile.data');

    // Other settings routes
   

    Route::get('/notifications', function () {
        return view('profile.notifications');
    })->name('notifications');

    Route::get('/connected-apps', function () {
        return view('profile.connected-apps');
    })->name('connected-apps');
});

Route::get('deals-dashboard', [CustomAuthController::class, 'deals-dashboard']); 
Route::get('index', [CustomAuthController::class, 'index'])->name('index');
Route::post('custom-login', [LoginController::class, 'login'])->name('login.custom'); 
Route::post('register', [RegisterController::class, 'register'])->name('register.custom'); 
Route::get('signout', [LoginController::class, 'logout'])->name('signout');
Route::get('test', [AiController::class, 'index']);



/*
|--------------------------------------------------------------------------
| Leads Routes
|--------------------------------------------------------------------------
*/
// Leads Routes
Route::get('/leads', [LeadsController::class, 'index'])->name('leads.index');
Route::post('/leads', [LeadsController::class, 'store'])->name('leads.store');
Route::get('/leads/{id}/edit', [LeadsController::class, 'edit'])->name('leads.edit');
Route::put('/leads/{id}', [LeadsController::class, 'update'])->name('leads.update');
Route::delete('/leads/{id}', [LeadsController::class, 'destroy'])->name('leads.destroy');


// Lead routes
Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
// In your web.php file
Route::get('/leads-details', [LeadController::class, 'index'])->name('leads.details');
Route::get('/leads-details/{id}', [LeadController::class, 'show'])->name('leads.details.show');



// Lead detail routes
Route::get('/leads/{id}', [LeadController::class, 'show'])->name('leads.show');
// Lead AJAX operations
Route::post('/leads/{id}/status', [LeadController::class, 'updateStatus'])->name('leads.update-status');
Route::post('/leads/{id}/reminder', [LeadController::class, 'setReminder'])->name('leads.set-reminder');
Route::post('/leads/{id}/document', [LeadController::class, 'uploadDocument'])->name('leads.upload-document');
Route::post('/leads/{id}/owner', [LeadController::class, 'changeOwner'])->name('leads.change-owner');
// Document download route
Route::get('/leads/{id}/documents/{documentId}/download', [LeadController::class, 'downloadDocument'])->name('leads.download-document');









// Leads routes
Route::get('/leads/{id}', [LeadsController::class, 'show'])->name('leads.show');

Route::get('/leads/export', [LeadsController::class, 'export'])->name('leads.export');

Route::get('deals-dashboard', [CustomAuthController::class, 'deals-dashboard']); 
Route::get('index', [CustomAuthController::class, 'index'])->name('index');
Route::post('custom-login', [LoginController::class, 'login'])->name('login.custom'); 
Route::post('register', [RegisterController::class, 'register'])->name('register.custom'); 
Route::get('signout', [LoginController::class, 'logout'])->name('signout');
Route::get('test', [AiController::class, 'index']);


Route::middleware(['auth'])->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])->name('chat');
  
    Route::get('/chat/{user}', [ChatController::class, 'show'])->name('chat.show');
    Route::post('/chat/message', [ChatController::class, 'store'])->name('chat.store');
    Route::post('/usermessages', [ChatController::class, 'getUserMessages'])->name('chat.messages');
});

// routes/channels.php
Broadcast::channel('chat.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});



































































Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/deals-dashboard', function () {
    return view('deals-dashboard');
})->name('deals-dashboard');

Route::get('/activities', function () {
    return view('activities');
})->name('activities');

Route::get('/activity-calls', function () {
    return view('activity-calls');
})->name('activity-calls');

Route::get('/activity-mail', function () {
    return view('activity-mail');
})->name('activity-mail');

Route::get('/activity-meeting', function () {
    return view('activity-meeting');
})->name('activity-meeting');

Route::get('/activity-task', function () {
    return view('activity-task');
})->name('activity-task');

Route::get('/analytics', function () {
    return view('analytics');
})->name('analytics');  

Route::get('/audio-call', function () {
    return view('audio-call');
})->name('audio-call');  

Route::get('/ban-ip-address', function () {
    return view('ban-ip-address');
})->name('ban-ip-address'); 

Route::get('/bank-accounts', function () {
    return view('bank-accounts');
})->name('bank-accounts'); 

Route::get('/calendar', function () {
    return view('calendar');
})->name('calendar'); 

Route::get('/call-history', function () {
    return view('call-history');
})->name('call-history'); 

Route::get('/calls', function () {
    return view('calls');
})->name('calls'); 


Route::get('/campaign-archieve', function () {
    return view('campaign-archieve');
})->name('campaign-archieve');

Route::get('/campaign-complete', function () {
    return view('campaign-complete');
})->name('campaign-complete');  

Route::get('/chart-apex', function () {
    return view('chart-apex');
})->name('chart-apex');

Route::get('/chart-c3', function () {
    return view('chart-c3');
})->name('chart-c3');  

Route::get('/chart-flot', function () {
    return view('chart-flot');
})->name('chart-flot'); 

Route::get('/chart-js', function () {
    return view('chart-js');
})->name('chart-js');    

Route::get('/chart-morris', function () {
    return view('chart-morris');
})->name('chart-morris'); 

Route::get('/chart-peity', function () {
    return view('chart-peity');
})->name('chart-peity');    


Route::get('/cities', function () {
    return view('cities');
})->name('cities');

Route::get('/coming-soon', function () {
    return view('coming-soon');
})->name('coming-soon');  

Route::get('/companies', function () {
    return view('companies');
})->name('companies');  

Route::get('/companies-grid', function () {
    return view('companies-grid');
})->name('companies-grid'); 

Route::get('/company-details', function () {
    return view('company-details');
})->name('company-details'); 

Route::get('/company-reports', function () {
    return view('company-reports');
})->name('company-reports');

Route::get('/company-settings', function () {
    return view('company-settings');
})->name('company-settings');  

Route::get('/connected-apps', function () {
    return view('connected-apps');
})->name('connected-apps'); 

Route::get('/contact-details', function () {
    return view('contact-details');
})->name('contact-details');    

Route::get('/contact-grid', function () {
    return view('contact-grid');
})->name('contact-grid');   

Route::get('/contact-messages', function () {
    return view('contact-messages');
})->name('contact-messages'); 

Route::get('/contact-reports', function () {
    return view('contact-reports');
})->name('contact-reports');

// Route::get('/contacts', function () {
//     return view('contacts');
// })->name('contacts'); 

Route::get('/contact-stage', function () {
    return view('contact-stage');
})->name('contact-stage'); 

Route::get('/countries', function () {
    return view('countries');
})->name('countries');   

Route::get('/currencies', function () {
    return view('currencies');
})->name('currencies');    

Route::get('/custom-fields', function () {
    return view('custom-fields');
})->name('custom-fields'); 

Route::get('/data-tables', function () {
    return view('data-tables');
})->name('data-tables');

Route::get('/deal-reports', function () {
    return view('deal-reports');
})->name('deal-reports');  

Route::get('/deals', function () {
    return view('deals');
})->name('deals'); 
   
Route::get('/deals-details', function () {
    return view('deals-details');
})->name('deals-details'); 

Route::get('/deals-kanban', function () {
    return view('deals-kanban');
})->name('deals-kanban');   

Route::get('/delete-request', function () {
    return view('delete-request');
})->name('delete-request');   

Route::get('/email', function () {
    return view('email');
})->name('email');

Route::get('/email-settings', function () {
    return view('email-settings');
})->name('email-settings');

Route::get('/email-verification', function () {
    return view('email-verification');
})->name('email-verification');

Route::get('/email-verification-2', function () {
    return view('email-verification-2');
})->name('email-verification-2');

Route::get('/email-verification-3', function () {
    return view('email-verification-3');
})->name('email-verification-3');

Route::get('/error-404', function () {
    return view('error-404');
})->name('error-404');

Route::get('/error-500', function () {
    return view('error-500');
})->name('error-500');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/file-manager', function () {
    return view('file-manager');
})->name('file-manager');

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');

Route::get('/forgot-password-2', function () {
    return view('forgot-password-2');
})->name('forgot-password-2');

Route::get('/forgot-password-3', function () {
    return view('forgot-password-3');
})->name('forgot-password-3');

Route::get('/gdpr-cookies', function () {
    return view('gdpr-cookies');
})->name('gdpr-cookies');

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/industry', function () {
    return view('industry');
})->name('industry');

Route::get('/invoice-settings', function () {
    return view('invoice-settings');
})->name('invoice-settings');

Route::get('/appearance', function () {
    return view('appearance');
})->name('appearance');

Route::get('/blank-page', function () {
    return view('blank-page');
})->name('blank-page');

Route::get('/form-checkbox-radios', function () {
    return view('form-checkbox-radios');
})->name('form-checkbox-radios');

Route::get('/form-floating-labels', function () {
    return view('form-floating-labels');
})->name('form-floating-labels');

Route::get('/form-grid-gutters', function () {
    return view('form-grid-gutters');
})->name('form-grid-gutters');

Route::get('/form-elements', function () {
    return view('form-elements');
})->name('form-elements');

Route::get('/form-select', function () {
    return view('form-select');
})->name('form-select');

Route::get('/form-select2', function () {
    return view('form-select2');
})->name('form-select2');

Route::get('/form-fileupload', function () {
    return view('form-fileupload');
})->name('form-fileupload');

Route::get('/form-wizard', function () {
    return view('form-wizard');
})->name('form-wizard');

Route::get('/form-basic-inputs', function () {
    return view('form-basic-inputs');
})->name('form-basic-inputs');

Route::get('/form-input-groups', function () {
    return view('form-input-groups');
})->name('form-input-groups');

Route::get('/form-horizontal', function () {
    return view('form-horizontal');
})->name('form-horizontal');

Route::get('/form-vertical', function () {
    return view('form-vertical');
})->name('form-vertical');

Route::get('/form-mask', function () {
    return view('form-mask');
})->name('form-mask');

Route::get('/form-validation', function () {
    return view('form-validation');
})->name('form-validation');

Route::get('/icon-fontawesome', function () {
    return view('icon-fontawesome');
})->name('icon-fontawesome');

Route::get('/icon-feather', function () {
    return view('icon-feather');
})->name('icon-feather');

Route::get('/icon-ionic', function () {
    return view('icon-ionic');
})->name('icon-ionic');

Route::get('/icon-material', function () {
    return view('icon-material');
})->name('icon-material');

Route::get('/icon-pe7', function () {
    return view('icon-pe7');
})->name('icon-pe7');

Route::get('/icon-simpleline', function () {
    return view('icon-simpleline');
})->name('icon-simpleline');

Route::get('/icon-themify', function () {
    return view('icon-themify');
})->name('icon-themify');

Route::get('/icon-weather', function () {
    return view('icon-weather');
})->name('icon-weather');

Route::get('/icon-typicon', function () {
    return view('icon-typicon');
})->name('icon-typicon');

Route::get('/icon-flag', function () {
    return view('icon-flag');
})->name('icon-flag');

Route::get('/language', function () {
    return view('language');
})->name('language'); 

Route::get('/language-web', function () {
    return view('language-web');
})->name('language-web'); 

Route::get('/leads', function () {
    return view('leads');
})->name('leads'); 

Route::get('/lead-reports', function () {
    return view('lead-reports');
})->name('lead-reports'); 

Route::get('/leads-dashboard', function () {
    return view('leads-dashboard');
})->name('leads-dashboard'); 

Route::get('/leads-kanban', function () {
    return view('leads-kanban');
})->name('leads-kanban'); 

Route::get('/lead-configurationss', function () {
    return view('lead-configuration');
})->name('lead-configurationsssss'); 

Route::get('/lead-configuration',[LeadConfigurationController::class,'index'])->name('lead-configuration'); 

Route::get('/leads-details', function () {
    return view('leads-details');
})->name('leads-details'); 


// Route::get('/contacts', function () {
//     return view('contacts');
// });

Route::get('/leads', [LeadsController::class, 'index'])->name('leads.index');


// Route::get('/leads', [LeadsController::class, 'index'])->name('leads.index');

// Alternative route for existing URL structure
Route::get('leads', [LeadsController::class, 'index']);
Route::get('/leads', [LeadsController::class, 'index'])->name('leads.index');


Route::get('/localization', function () {
    return view('localization');
})->name('localization'); 

Route::get('/lock-screen', function () {
    return view('lock-screen');
})->name('lock-screen'); 

Route::get('/login-2', function () {
    return view('login-2');
})->name('login-2'); 

Route::get('/login-3', function () {
    return view('login-3');
})->name('login-3'); 

Route::get('/lost-reason', function () {
    return view('lost-reason');
})->name('lost-reason'); 

Route::get('/manage-users', function () {
    return view('manage-users');
})->name('manage-users'); 

Route::get('/membership-addons', function () {
    return view('membership-addons');
})->name('membership-addons'); 

Route::get('/membership-plans', function () {
    return view('membership-plans');
})->name('membership-plans'); 

Route::get('/membership-transactions', function () {
    return view('membership-transactions');
})->name('membership-transactions'); 

Route::get('/notes', function () {
    return view('notes');
})->name('notes'); 

Route::get('/notifications', function () {
    return view('notifications');
})->name('notifications'); 

Route::get('/pages-list', function () {
    return view('pages-list');
})->name('pages-list'); 

Route::get('/pages', function () {
    return view('pages');
})->name('pages'); 

Route::get('/payment-gateways', function () {
    return view('payment-gateways');
})->name('payment-gateways'); 

Route::get('/permission', function () {
    return view('permission');
})->name('permission'); 

Route::get('/pipeline', function () {
    return view('pipeline');
})->name('pipeline'); 

Route::get('/preference', function () {
    return view('preference');
})->name('preference'); 

Route::get('/prefixes', function () {
    return view('prefixes');
})->name('prefixes'); 

Route::get('/printers', function () {
    return view('printers');
})->name('printers'); 

Route::get('/profile', function () {
    return view('profile');
})->name('profile'); 

Route::get('/project-dashboard', function () {
    return view('project-dashboard');
})->name('project-dashboard'); 

Route::get('/project-details', function () {
    return view('project-details');
})->name('project-details'); 

Route::get('/project-grid', function () {
    return view('project-grid');
})->name('project-grid'); 

Route::get('/project-reports', function () {
    return view('project-reports');
})->name('project-reports'); 

Route::get('/projects', function () {
    return view('projects');
})->name('projects');  

Route::get('/register-2', function () {
    return view('register-2');
})->name('register-2'); 

Route::get('/register-3', function () {
    return view('register-3');
})->name('register-3'); 

Route::get('/register', function () {
    return view('register');
})->name('register'); 

Route::get('/reset-password-2', function () {
    return view('reset-password-2');
})->name('reset-password-2'); 

Route::get('/reset-password-3', function () {
    return view('reset-password-3');
})->name('reset-password-3'); 

Route::get('/reset-password', function () {
    return view('reset-password');
})->name('reset-password'); 

Route::get('/roles-permissions', function () {
    return view('roles-permissions');
})->name('roles-permissions'); 


Route::get('/sms-gateways', function () {
    return view('sms-gateways');
})->name('sms-gateways'); 

Route::get('/sources', function () {
    return view('sources');
})->name('sources'); 

Route::get('/states', function () {
    return view('states');
})->name('states'); 

Route::get('/storage', function () {
    return view('storage');
})->name('storage'); 

Route::get('/success-2', function () {
    return view('success-2');
})->name('success-2'); 

Route::get('/success-3', function () {
    return view('success-3');
})->name('success-3'); 

Route::get('/success', function () {
    return view('success');
})->name('success'); 

Route::get('/tables-basic', function () {
    return view('tables-basic');
})->name('tables-basic');

Route::get('/task-reports', function () {
    return view('task-reports');
})->name('task-reports');

Route::get('/tasks-completed', function () {
    return view('tasks-completed');
})->name('tasks-completed');

Route::get('/tasks-important', function () {
    return view('tasks-important');
})->name('tasks-important'); 

Route::get('/tasks', function () {
    return view('tasks');
})->name('tasks');

Route::get('/tax-rates', function () {
    return view('tax-rates');
})->name('tax-rates');

Route::get('/testimonials', function () {
    return view('testimonials');
})->name('testimonials');

Route::get('/tickets', function () {
    return view('tickets');
})->name('tickets');

Route::get('/todo', function () {
    return view('todo');
})->name('todo');

Route::get('/two-step-verification', function () {
    return view('two-step-verification');
})->name('two-step-verification');

Route::get('/two-step-verification-2', function () {
    return view('two-step-verification-2');
})->name('two-step-verification-2');

Route::get('/two-step-verification-3', function () {
    return view('two-step-verification-3');
})->name('two-step-verification-3');

Route::get('/ui-alerts', function () {
    return view('ui-alerts');
})->name('ui-alerts');

Route::get('/ui-accordion', function () {
    return view('ui-accordion');
})->name('ui-accordion');

Route::get('/ui-avatar', function () {
    return view('ui-avatar');
})->name('ui-avatar');

Route::get('/ui-badges', function () {
    return view('ui-badges');
})->name('ui-badges');

Route::get('/ui-borders', function () {
    return view('ui-borders');
})->name('ui-borders');

Route::get('/ui-buttons', function () {
    return view('ui-buttons');
})->name('ui-buttons');

Route::get('/ui-buttons-group', function () {
    return view('ui-buttons-group');
})->name('ui-buttons-group');

Route::get('/ui-breadcrumb', function () {
    return view('ui-breadcrumb');
})->name('ui-breadcrumb');

Route::get('/ui-cards', function () {
    return view('ui-cards');
})->name('ui-cards');

Route::get('/ui-carousel', function () {
    return view('ui-carousel');
})->name('ui-carousel');

Route::get('/ui-colors', function () {
    return view('ui-colors');
})->name('ui-colors');

Route::get('/ui-dropdowns', function () {
    return view('ui-dropdowns');
})->name('ui-dropdowns');

Route::get('/ui-grid', function () {
    return view('ui-grid');
})->name('ui-grid');

Route::get('/ui-images', function () {
    return view('ui-images');
})->name('ui-images');

Route::get('/ui-lightbox', function () {
    return view('ui-lightbox');
})->name('ui-lightbox');

Route::get('/ui-media', function () {
    return view('ui-media');
})->name('ui-media');

Route::get('/ui-modals', function () {
    return view('ui-modals');
})->name('ui-modals');

Route::get('/ui-offcanvas', function () {
    return view('ui-offcanvas');
})->name('ui-offcanvas');

Route::get('/ui-pagination', function () {
    return view('ui-pagination');
})->name('ui-pagination');

Route::get('/ui-popovers', function () {
    return view('ui-popovers');
})->name('ui-popovers');

Route::get('/ui-progress', function () {
    return view('ui-progress');
})->name('ui-progress');

Route::get('/ui-placeholders', function () {
    return view('ui-placeholders');
})->name('ui-placeholders');

Route::get('/ui-rangeslider', function () {
    return view('ui-rangeslider');
})->name('ui-rangeslider');

Route::get('/ui-spinner', function () {
    return view('ui-spinner');
})->name('ui-spinner');

Route::get('/ui-sweetalerts', function () {
    return view('ui-sweetalerts');
})->name('ui-sweetalerts');

Route::get('/ui-nav-tabs', function () {
    return view('ui-nav-tabs');
})->name('ui-nav-tabs');

Route::get('/ui-toasts', function () {
    return view('ui-toasts');
})->name('ui-toasts');

Route::get('/ui-tooltips', function () {
    return view('ui-tooltips');
})->name('ui-tooltips');

Route::get('/ui-typography', function () {
    return view('ui-typography');
})->name('ui-typography');

Route::get('/ui-video', function () {
    return view('ui-video');
})->name('ui-video');

Route::get('/ui-ribbon', function () {
    return view('ui-ribbon');
})->name('ui-ribbon');

Route::get('/ui-clipboard', function () {
    return view('ui-clipboard');
})->name('ui-clipboard');

Route::get('/ui-drag-drop', function () {
    return view('ui-drag-drop');
})->name('ui-drag-drop');

Route::get('/ui-rating', function () {
    return view('ui-rating');
})->name('ui-rating');

Route::get('/ui-text-editor', function () {
    return view('ui-text-editor');
})->name('ui-text-editor');

Route::get('/ui-counter', function () {
    return view('ui-counter');
})->name('ui-counter');

Route::get('/ui-scrollbar', function () {
    return view('ui-scrollbar');
})->name('ui-scrollbar');

Route::get('/ui-stickynote', function () {
    return view('ui-stickynote');
})->name('ui-stickynote');

Route::get('/ui-timeline', function () {
    return view('ui-timeline');
})->name('ui-timeline');

Route::get('/under-maintenance', function () {
    return view('under-maintenance');
})->name('under-maintenance');

Route::get('/video-call', function () {
    return view('video-call');
})->name('video-call');

Route::get('/proposals', function () {
    return view('proposals');
})->name('proposals');

Route::get('/contracts', function () {
    return view('contracts');
})->name('contracts');

Route::get('/estimations', function () {
    return view('estimations');
})->name('estimations');

Route::get('/invoices', function () {
    return view('invoices');
})->name('invoices');

Route::get('/proposals-grid', function () {
    return view('proposals-grid');
})->name('proposals-grid');

Route::get('/contracts-grid', function () {
    return view('contracts-grid');
})->name('contracts-grid');

Route::get('/estimations-kanban', function () {
    return view('estimations-kanban');
})->name('estimations-kanban');

Route::get('/invoice-grid', function () {
    return view('invoice-grid');
})->name('invoice-grid');

Route::get('/payments', function () {
    return view('payments');
})->name('payments');

Route::get('/ui-sortable', function () {
    return view('ui-sortable');
})->name('ui-sortable');

Route::get('/ui-swiperjs', function () {
    return view('ui-swiperjs');
})->name('ui-swiperjs');

Route::get('/icon-tabler', function () {
    return view('icon-tabler');
})->name('icon-tabler');

Route::get('/icon-bootstrap', function () {
    return view('icon-bootstrap');
})->name('icon-bootstrap');

Route::get('/icon-remix', function () {
    return view('icon-remix');
})->name('icon-remix');

Route::get('/form-pickers', function () {
    return view('form-pickers');
})->name('form-pickers');

Route::get('/maps-vector', function () {
    return view('maps-vector');
})->name('maps-vector');

Route::get('/maps-leaflet', function () {
    return view('maps-leaflet');
})->name('maps-leaflet');

Route::get('/social-feed', function () {
    return view('social-feed');
})->name('social-feed');

Route::get('/kanban-view', function () {
    return view('kanban-view');
})->name('kanban-view');

Route::get('/invoice', function () {
    return view('invoice');
})->name('invoice');

Route::get('/invoice-details', function () {
    return view('invoice-details');
})->name('invoice-details');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/company', function () {
    return view('company');
})->name('company');

Route::get('/subscription', function () {
    return view('subscription');
})->name('subscription');

Route::get('/packages', function () {
    return view('packages');
})->name('packages');

Route::get('/packages-grid', function () {
    return view('packages-grid');
})->name('packages-grid');

Route::get('/domain', function () {
    return view('domain');
})->name('domain');

Route::get('/purchase-transaction', function () {
    return view('purchase-transaction');
})->name('purchase-transaction');

Route::get('/layout-mini', function () {
    return view('layout-mini');
})->name('layout-mini');

Route::get('/layout-horizontal-single', function () {
    return view('layout-horizontal-single');
})->name('layout-horizontal-single');

Route::get('/layout-without-header', function () {
    return view('layout-without-header');
})->name('layout-without-header');

Route::get('/layout-rtl', function () {
    return view('layout-rtl');
})->name('layout-rtl');

Route::get('/layout-detached', function () {
    return view('layout-detached');
})->name('layout-detached');

Route::get('/layout-dark', function () {
    return view('layout-dark');
})->name('layout-dark');

Route::get('/plugin', function () {
    return view('plugin');
})->name('plugin');
