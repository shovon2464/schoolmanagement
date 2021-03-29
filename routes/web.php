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
use App\Student;
use App\Department;
use App\Classes;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function(){


    //department
    Route::get('departments','DepartmentController@index');
    Route::get('department/create','DepartmentController@create');
    Route::post('department/save','DepartmentController@save');
    Route::get('department/edit/{id}','DepartmentController@edit');
    Route::post('department/update/{id}','DepartmentController@update');
    Route::delete('department/delete/{id}','DepartmentController@delete');


    //classes
    Route::get('classes','ClassController@index');
    Route::get('class/create','ClassController@create');
    Route::post('class/save','ClassController@save');
    Route::get('class/edit/{id}','ClassController@edit');
    Route::post('class/update/{id}','ClassController@update');
    Route::delete('class/delete/{id}','ClassController@delete');


    //student
    Route::get('students','StudentController@index');
    Route::get('student/create','StudentController@create');
    Route::post('student/save','StudentController@save');
    Route::get('student/edit/{id}','StudentController@edit');
    Route::post('student/update/{id}','StudentController@update');
    Route::delete('student/delete/{id}','StudentController@delete');
    Route::any('student/search',function(){
        $q = Input::get ( 'q' );
        $datas = Student::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('blood_group','LIKE','%'.$q.'%')->orWhere('gender','LIKE','%'.$q.'%')->orWhere('roll',$q)->orWhere('reg_id',$q)->get();
        if(count($datas) > 0)
            return view('student.index',compact('datas'));
        else return view ('student.search')->withMessage('No Details found. Try to search again !');
    });
    Route::any('student/dsearch',function(){
        $q = Input::get ( 'q' );
        $depts = Department::where('title','LIKE','%'.$q.'%')->first();
        if($depts){
          $d=$depts->id;
          $datas = Student::where('department_id','LIKE','%'.$d.'%')->get();
                if(count($datas) > 0)
                   return view('student.index',compact('datas'));
                 else return view ('student.search')->withMessage('No Details found. Try to search again !');
        }
         else{
          return view ('student.search')->withMessage('No Details found. Try to search again !');
          }
    });
     Route::any('student/csearch',function(){
            $q = Input::get ( 'q' );
            $cls = Classes::where('title','LIKE','%'.$q.'%')->first();
            if($cls){
              $d=$cls->id;
              $datas = Student::where('classes_id',$d)->get();
                    if(count($datas) > 0)
                       return view('student.index',compact('datas'));
                     else return view ('student.search')->withMessage('No Details found. Try to search again !');
            }
             else{
              return view ('student.search')->withMessage('No Details found. Try to search again !');
              }
        });

});



