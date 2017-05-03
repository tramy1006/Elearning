<?php

use App\Category;
Route::get('/', 'HomeController@welcome');

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/contact', 'HomeController@contact');
//Route::get('/quantri', 'UserController@getAdmin');
//profile
Route::get('/profile', 'HomeController@profile');
Route::post('/profile', 'HomeController@update_profile');

Route::get('/profile/edit/{user}', 'HomeController@getEdit');
Route::post('/profile/edit/{user}', 'HomeController@postEdit');


/// quan ly user
Route::get('/users', 'UserController@users');
Route::get('/user/delete/{user}', 'UserController@getDelete');
Route::post('/update-role/{user}', 'UserController@updateRole');
Route::post('/user/destroy','UserController@destroy');
//categories
Route::group(['prefix' => 'cate'], function(){
	Route::get('list', 'CateController@getList');
	Route::get('edit/{id}', 'CateController@getEdit');
	Route::post('edit/{id}', 'CateController@postEdit');
	Route::get('add', 'CateController@getAdd');
	Route::post('add', 'CateController@postAdd');
	Route::get('delete/{id}', 'CateController@getDelete');
	Route::post('destroy','CateController@destroy');
});


Route::get('category/quiz', 'CateController@getQuiz');
Route::get('category/{id}/words','CateController@getAllWords');
Route::get('category/{id}/words/add','CateController@getAddWord');


Route::get('cate/show', 'CateController@getShow');
///lesson
Route::group(['prefix'=>'lesson'], function(){
	Route::get('list', 'LessonController@getList');

	Route::get('add', 'LessonController@getAdd');
	Route::post('add', 'LessonController@postAdd');
	
	Route::get('edit/{id}', 'LessonController@getEdit');
	Route::post('edit/{id}', 'LessonController@postEdit');

	Route::get('/list/{id}/question', 'LessonController@getQuestion');

	Route::get('/list/question/delete/{id}','QuestionsController@deleteQuestion');

	//Route::get('/questions/edit/{id}','QuestionsController@getEdit');
	//Route::post('/questions/edit/{id}','QuestionsController@postEdit');

	Route::get('delete/{id}', 'LessonController@getDelete');
	Route::post('destroy','LessonController@destroy');
});
//edit question


Route::group(['prefix'=>'comment'], function(){	
	Route::get('delete/{id}/{less_id}', 'CommentController@getDelete');
});
//Route::post('/comment/{id}', 'CommentController@postComment');

Route::get('/cate/{id}', 'HomeController@theloai');
Route::get('/cate/lesson/{id}', 'HomeController@chitiet');
Route::post('/cate/lesson/{id}', 'CommentController@postComment');
Route::post('timkiem', 'HomeController@timkiem');

Route::group(['prefix'=>'admin'], function()
{
	Route::resource('category', 'CateQuizController');
});
Route::group(['prefix'=>'slide'], function()
{
	Route::get('list', 'SlideController@getlist');
	Route::get('add', 'SlideController@getAdd');
	Route::post('add', 'SlideController@postAdd');
	Route::get('edit/{id}', 'SlideController@getEdit');
	Route::post('edit/{id}', 'SlideController@postEdit');
	
	//Route::get('delete/{id}', 'SlideController@getDelete');
	Route::post('destroy','SlideController@destroy');
});
Route::group(['prefix'=>'forum'], function()
{
	Route::get('list','ForumController@getList');
	Route::get('add','ForumController@getAdd');
	Route::post('add','ForumController@postAdd');
	Route::get('chitiet/{id}','ForumController@getChitiet');

});
//test
Route::get('test/{id}','TestController@getTest');
Route::post('test/{id}','TestController@postTest');

Route::get('/quantri', 'HomeController@dash');

Route::group(['middleware' => 'auth'], function () {
	
    Route::resource('tests', 'TestController');
    Route::resource('user_actions', 'UserActionsController');

    Route::resource('questions', 'QuestionsController');
    Route::get('add/{id}','QuestionsController@getAdd');
    Route::post('add/{id}','QuestionsController@postAdd');
    Route::post('questions_mass_destroy', ['uses' => 'QuestionsController@massDestroy', 'as' => 'questions.mass_destroy']);
    

    Route::resource('questions_options', 'QuestionsOptionsController');
    Route::post('questions_options_mass_destroy', ['uses' => 'QuestionsOptionsController@massDestroy', 'as' => 'questions_options.mass_destroy']);
    
    Route::resource('results', 'ResultsController');
    //Route::get('results','ResultsController@index');
    Route::post('results_mass_destroy', ['uses' => 'ResultsController@massDestroy', 'as' => 'results.mass_destroy']);
});



