<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\XmlConfiguration\Group;




Route::prefix('/')->group(function(){
    Route::get('/',[\App\Http\Controllers\HomeInterfaceController::class,'scholar_highschool'],function(){
        return view('HomeUserInterface.allcontent');
    });
    Route::get('/home',[\App\Http\Controllers\HomeInterfaceController::class,'home'],function(){
        return view('home');
    });
    Route::prefix('/source')->group(function(){
        Route::get('/book',[\App\Http\Controllers\BookController::class,'show']);
        Route::get('/video',[\App\Http\Controllers\VideoController::class,'show']);
        Route::get('/website',[\App\Http\Controllers\WebsiteController::class,'show']);
    });
    Route::prefix('/scholarship')->group(function(){
        Route::get('/highschool',[\App\Http\Controllers\ScholarshipHighschoolController::class,'show']);
        Route::get('/bachelor',[\App\Http\Controllers\ScholarshipBachelorController::class,'show']);
        Route::get('/master',[\App\Http\Controllers\ScholarshipmasterController::class,'show']);
        Route::get('/phd',[\App\Http\Controllers\ScholarshipphdController::class,'show']);
    });
    Route::get('/contactus',function(){return view('UserInterface.contactus');})->name('contact.create');
    Route::post('/contactus', [\App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');

    Route::get('/aboutus',function(){ return view('UserInterface.aboutus'); });

    Route::get('/update-profile', [\App\Http\Controllers\ChangePasswordController::class,'userindex'])->name('change.createpass');
    Route::post('/update-profile',[\App\Http\Controllers\ChangePasswordController::class,'userstore'])->name('change.password');

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/product')->group(function (){
    Route::get("/",[ProductController::class,'index'])->name('products.index');
    Route::get("/index",[ProductController::class,'index'])->name('products.index');
    Route::get("/scholarship",[ProductController::class,'scholarship'])->name('products.scholarship');
    Route::get("/create",[ProductController::class,'create'])->name('products.create');
    Route::post("/store",[ProductController::class,'store'])->name('products.store');
    Route::get("/edit/{id}",[ProductController::class,'edit'])->name('products.edit');
    Route::put("/update/{id}",[ProductController::class,'update'])->name('products.update');
    Route::get("/delete/{id}",[ProductController::class,'delete'])->name('products.delete');
});
Route::group(['middleware' => ['auth' , 'admin']], function () {
    Route::middleware(['auth'])->prefix('/admin')->group(function(){

        Route::get("/",[\App\Http\Controllers\ScholarshipHighschoolController::class,'index'])->name('highschool.index');
        Route::get('/profile/{id}',[\App\Http\Controllers\UserController::class,'viewprofile'])->name('profile.view');
        Route::get('/change-password', [\App\Http\Controllers\ChangePasswordController::class,'index'])->name('change.createpass');
        Route::post('/change-password',[\App\Http\Controllers\ChangePasswordController::class,'store'])->name('change.password');

        Route::prefix('/scholarship')->group(function(){
            Route::prefix('/highschool')->group(function(){
                Route::get('/index',[\App\Http\Controllers\ScholarshipHighschoolController::class,'index'])->name('highschool.index');
                Route::get('/show',[\App\Http\Controllers\ScholarshipHighschoolController::class,'show'])->name('highschool.show');
                Route::get('/create',[\App\Http\Controllers\ScholarshipHighschoolController::class,'create'])->name('highschool.create');
                Route::post('/store',[\App\Http\Controllers\ScholarshipHighschoolController::class,'store'])->name('highschool.store');
                Route::get('/edit/{id}',[\App\Http\Controllers\ScholarshipHighschoolController::class,'edit'])->name('highschool.edit');
                Route::put('/update/{id}',[\App\Http\Controllers\ScholarshipHighschoolController::class,'update'])->name('highschool.update');
                Route::get('/delete/{id}',[\App\Http\Controllers\ScholarshipHighschoolController::class,'delete'])->name('highschool.delete');
            });

            Route::prefix('/bachelor')->group(function(){
                Route::get('/index',[\App\Http\Controllers\ScholarshipBachelorController::class,'index'])->name('bachelor.index');
                Route::get('/show',[\App\Http\Controllers\ScholarshipBachelorController::class,'show'])->name('bachelor.show');
                Route::get('/',[\App\Http\Controllers\ScholarshipBachelorController::class,'bachelorsallcontent'])->name('bachelor.bachelorsallcontent');
                Route::get('/create',[\App\Http\Controllers\ScholarshipBachelorController::class,'create'])->name('bachelor.create');
                Route::post('/store',[\App\Http\Controllers\ScholarshipBachelorController::class,'store'])->name('bachelor.store');
                Route::get('/edit/{id}',[\App\Http\Controllers\ScholarshipBachelorController::class,'edit'])->name('bachelor.edit');
                Route::put('/update/{id}',[\App\Http\Controllers\ScholarshipBachelorController::class,'update'])->name('bachelor.update');
                Route::get('/delete/{id}',[\App\Http\Controllers\ScholarshipBachelorController::class,'delete'])->name('bachelor.delete');
            });

            Route::prefix('/master')->group(function(){
                Route::get('/index',[\App\Http\Controllers\ScholarshipmasterController::class,'index'])->name('master.index');
                Route::get('/show',[\App\Http\Controllers\ScholarshipmasterController::class,'show'])->name('master.show');
                Route::get('/create',[\App\Http\Controllers\ScholarshipmasterController::class,'create'])->name('master.create');
                Route::post('/store',[\App\Http\Controllers\ScholarshipmasterController::class,'store'])->name('master.store');
                Route::get('/edit/{id}',[\App\Http\Controllers\ScholarshipmasterController::class,'edit'])->name('master.edit');
                Route::put('/update/{id}',[\App\Http\Controllers\ScholarshipmasterController::class,'update'])->name('master.update');
                Route::get('/delete/{id}',[\App\Http\Controllers\ScholarshipmasterController::class,'delete'])->name('master.delete');
            });
            Route::prefix('/phd')->group(function(){
                Route::get('/index',[\App\Http\Controllers\ScholarshipphdController::class,'index'])->name('phd.index');
                Route::get('/show',[\App\Http\Controllers\ScholarshipphdController::class,'show'])->name('phd.show');
                Route::get('/create',[\App\Http\Controllers\ScholarshipphdController::class,'create'])->name('phd.create');
                Route::post('/store',[\App\Http\Controllers\ScholarshipphdController::class,'store'])->name('phd.store');
                Route::get('/edit/{id}',[\App\Http\Controllers\ScholarshipphdController::class,'edit'])->name('phd.edit');
                Route::put('/update/{id}',[\App\Http\Controllers\ScholarshipphdController::class,'update'])->name('phd.update');
                Route::get('/delete/{id}',[\App\Http\Controllers\ScholarshipphdController::class,'delete'])->name('phd.delete');
            });
        });
        Route::prefix('/source')->group(function(){
            //Route::get("/",[\App\Http\Controllers\BookController::class,'index'])->name('book.index');
            Route::prefix('/book')->group(function(){
                Route::get('/index',[\App\Http\Controllers\BookController::class,'index'])->name('book.index');
                Route::get('/show',[\App\Http\Controllers\BookController::class,'show'])->name('book.show');
                Route::get('/create',[\App\Http\Controllers\BookController::class,'create'])->name('book.create');
                Route::post('/store',[\App\Http\Controllers\BookController::class,'store'])->name('book.store');
                Route::get('/edit/{id}',[\App\Http\Controllers\BookController::class,'edit'])->name('book.edit');
                Route::put('/update/{id}',[\App\Http\Controllers\BookController::class,'update'])->name('book.update');
                Route::get('/delete/{id}',[\App\Http\Controllers\BookController::class,'delete'])->name('book.delete');
            });

            Route::prefix('/website')->group(function(){
                Route::get('/index',[\App\Http\Controllers\WebsiteController::class,'index'])->name('website.index');
                Route::get('/show',[\App\Http\Controllers\ScholarshipHighschoolController::class,'show'])->name('highschool.show');
                Route::get('/create',[\App\Http\Controllers\WebsiteController::class,'create'])->name('website.create');
                Route::post('/store',[\App\Http\Controllers\WebsiteController::class,'store'])->name('website.store');
                Route::get('/edit/{id}',[\App\Http\Controllers\WebsiteController::class,'edit'])->name('website.edit');
                Route::put('/update/{id}',[\App\Http\Controllers\WebsiteController::class,'update'])->name('website.update');
                Route::get('/delete/{id}',[\App\Http\Controllers\WebsiteController::class,'delete'])->name('website.delete');
            });

            Route::prefix('/video')->group(function(){
                Route::get('/index',[\App\Http\Controllers\VideoController::class,'index'])->name('video.index');
                Route::get('/show',[\App\Http\Controllers\ScholarshipHighschoolController::class,'show'])->name('highschool.show');
                Route::get('/create',[\App\Http\Controllers\VideoController::class,'create'])->name('video.create');
                Route::post('/store',[\App\Http\Controllers\VideoController::class,'store'])->name('video.store');
                Route::get('/edit/{id}',[\App\Http\Controllers\VideoController::class,'edit'])->name('video.edit');
                Route::put('/update/{id}',[\App\Http\Controllers\VideoController::class,'update'])->name('video.update');
                Route::get('/delete/{id}',[\App\Http\Controllers\VideoController::class,'delete'])->name('video.delete');
            });

        });
        Route::prefix('/user')->group(function(){
            Route::get('/index',[\App\Http\Controllers\UserController::class,'index'])->name('user.index');
            Route::get('/create',[\App\Http\Controllers\UserController::class,'create'])->name('user.create');
            Route::post('/store',[\App\Http\Controllers\UserController::class,'store'])->name('user.store');
            Route::get('/storerole/{id}',[\App\Http\Controllers\UserController::class,'editrole'])->name('user.editrole');
            Route::put('/updaterole/{id}',[\App\Http\Controllers\UserController::class,'updaterole'])->name('user.updaterole');
            Route::get('/edit/{id}',[\App\Http\Controllers\UserController::class,'edit'])->name('user.edit');
            Route::put('/update/{id}',[\App\Http\Controllers\UserController::class,'update'])->name('user.update');
            Route::get('/delete/{id}',[\App\Http\Controllers\UserController::class,'delete'])->name('user.delete');
        });
    });
});


Route::prefix('/source')->group(function(){
    Route::get("/",[\App\Http\Controllers\BookController::class,'index'])->name('book.index');
    Route::prefix('/book')->group(function(){
        Route::get('/index',[\App\Http\Controllers\BookController::class,'index'])->name('book.index');
        Route::get('/show',[\App\Http\Controllers\BookController::class,'show'])->name('book.show');
        Route::get('/create',[\App\Http\Controllers\BookController::class,'create'])->name('book.create');
        Route::post('/store',[\App\Http\Controllers\BookController::class,'store'])->name('book.store');
        Route::get('/edit/{id}',[\App\Http\Controllers\BookController::class,'edit'])->name('book.edit');
        Route::put('/update/{id}',[\App\Http\Controllers\BookController::class,'update'])->name('book.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\BookController::class,'delete'])->name('book.delete');
    });

    Route::prefix('/website')->group(function(){
        Route::get('/index',[\App\Http\Controllers\WebsiteController::class,'index'])->name('website.index');
        Route::get('/show',[\App\Http\Controllers\WebsiteController::class,'show'])->name('website.show');
        Route::get('/create',[\App\Http\Controllers\WebsiteController::class,'create'])->name('website.create');
        Route::post('/store',[\App\Http\Controllers\WebsiteController::class,'store'])->name('website.store');
        Route::get('/edit/{id}',[\App\Http\Controllers\WebsiteController::class,'edit'])->name('website.edit');
        Route::put('/update/{id}',[\App\Http\Controllers\WebsiteController::class,'update'])->name('website.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\WebsiteController::class,'delete'])->name('website.delete');
    });

    Route::prefix('/video')->group(function(){
        Route::get('/index',[\App\Http\Controllers\VideoController::class,'index'])->name('video.index');
        Route::get('/show',[\App\Http\Controllers\VideoController::class,'show'])->name('video.show');
        Route::get('/create',[\App\Http\Controllers\VideoController::class,'create'])->name('video.create');
        Route::post('/store',[\App\Http\Controllers\VideoController::class,'store'])->name('video.store');
        Route::get('/edit/{id}',[\App\Http\Controllers\VideoController::class,'edit'])->name('video.edit');
        Route::put('/update/{id}',[\App\Http\Controllers\VideoController::class,'update'])->name('video.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\VideoController::class,'delete'])->name('video.delete');
    });

});



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});




