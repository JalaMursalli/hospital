<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\backend\FeedbackController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\DoctorController;
use App\Http\Controllers\Backend\DoctorBannerController;
use App\Http\Controllers\Backend\AboutBannerController;
use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\Backend\AdvantageController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\ContactBannerController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\ContactUsController;
use App\Http\Controllers\Backend\SeminarBannerController;
use App\Http\Controllers\Backend\SeminarController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\DepartmentBannerController;
use App\Http\Controllers\Backend\BlogBannerController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CheckupController;
use App\Http\Controllers\Backend\ServiceCategoryController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\CheckupBannerController;
use App\Http\Controllers\Backend\CareerBannerController;
use App\Http\Controllers\Backend\CareerController;
use App\Http\Controllers\Backend\EhekimController;
use App\Http\Controllers\Backend\SocialController;
use App\Http\Controllers\Backend\DoctorSocialController;
use App\Http\Controllers\Backend\EmergencyController;
use App\Http\Controllers\Backend\FooterLogoController;
use App\Http\Controllers\Backend\HomeSeoController;
use App\Http\Controllers\Backend\DoctorSeoController;
use App\Http\Controllers\Backend\AboutSeoController;
use App\Http\Controllers\Backend\ContactSeoController;
use App\Http\Controllers\Backend\SeminarSeoController;
use App\Http\Controllers\Backend\DepartmentSeoController;
use App\Http\Controllers\Backend\BlogSeoController;
use App\Http\Controllers\Backend\LabSeoController;
use App\Http\Controllers\Backend\CheckupSeoController;
use App\Http\Controllers\Backend\CareerSeoController;
use App\Http\Controllers\Backend\EhekimSeoController;
use App\Http\Controllers\Backend\EmergencySeoController;
use App\Http\Controllers\Backend\DepartmentCategoryController;
use App\Http\Controllers\Backend\TranslationController;
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\frontend\AboutController as FrontendAboutController;
use App\Http\Controllers\frontend\ContactController as FrontendContactController;
use App\Http\Controllers\frontend\DepartmentController as FrontendDepartmentController;
use App\Http\Controllers\frontend\DoctorController as FrontendDoctorController;
use App\Http\Controllers\frontend\SeminarController as FrontendSeminarController;
use App\Http\Controllers\frontend\BlogController as FrontendBLogController;
use App\Http\Controllers\frontend\LabController as FrontendLabController;
use App\Http\Controllers\frontend\CheckupController as FrontendCheckupController;
use App\Http\Controllers\frontend\CareerController as FrontendCareerController;
use App\Http\Controllers\frontend\EhekimController as FrontendEhekimController;
use App\Http\Controllers\frontend\EmergencyController as FrontendEmergencyController;
use App\Http\Controllers\frontend\SurgeryController as FrontendSurgeryController;
use App\Models\Feedback;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Label;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login-post');
    Route::post('logout', action: [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::put('/password/update', [AuthController::class, 'updatePassword'])->name('password.update');


Route::get('/', [FrontendHomeController::class, 'index'])->name('home');
Route::get('/doctors', [FrontendDoctorController::class, 'index'])->name('doctor');
Route::get('doctor-details/{slug}', [FrontendDoctorController::class, 'showDoctor'])->name('showDoctor');
Route::get('/about', [FrontendAboutController::class, 'index'])->name('about');
Route::get('/contact', [FrontendContactController::class, 'index'])->name('contact');
Route::get('/seminars', [FrontendSeminarController::class, 'index'])->name('seminar');
Route::get('seminar-details/{slug}', [FrontendSeminarController::class, 'showSeminar'])->name('showSeminar');
Route::get('/departments', [FrontendDepartmentController::class, 'index'])->name('department');
Route::get('department-details/{slug}', [FrontendDepartmentController::class, 'showDepartment'])->name('showDepartment');
Route::get('/blogs', [FrontendBlogController::class, 'index'])->name('blog');
Route::get('blog-details/{slug}', [FrontendBlogController::class, 'showBlog'])->name('showBlog');
Route::get('/lab', [FrontendLabController::class, 'index'])->name('lab');
Route::get('/checkup', [FrontendCheckupController::class, 'index'])->name('checkup');
Route::get('/career', [FrontendCareerController::class, 'index'])->name('career');
Route::get('career-details/{slug}', [FrontendCareerController::class, 'showCareer'])->name('showCareer');
Route::post('/career/apply', [FrontendCareerController::class, 'apply'])->name('career.apply');
Route::get('/e-hekim', [FrontendEhekimController::class, 'index'])->name('e-hekim');
Route::post('/ehekim/apply', [FrontendEhekimController::class, 'apply'])->name('ehekim.apply');
Route::post('/contact/apply', [FrontendContactController::class, 'apply'])->name('contact.apply');
Route::get('/emergency', [FrontendEmergencyController::class, 'index'])->name('emergency');
Route::get('/get-popular-blogs', [FrontendBLogController::class, 'getPopularBlogs'])->name('get-popular-blogs');
Route::get('/get-popular-seminars', [FrontendSeminarController::class, 'getPopularSeminars'])->name('get-popular-seminars');
Route::get('/surgery', [FrontendSurgeryController::class, 'index'])->name('surgery');
Route::get('surgery-details/{slug}', [FrontendSurgeryController::class, 'showSurgery'])->name('showSurgery');
