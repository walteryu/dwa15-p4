<?php

/*
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');

Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/logout', 'Auth\AuthController@logout');

Route::get('/show-login-status', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user) {
        echo 'You are logged in.';
        dump($user->toArray());
    } else {
        echo 'You are not logged in.';
    }

    return;

});
*/

Route::get('/', 'ProjectController@getIndex'); # Home
Route::get('/projects', 'ProjectController@getIndex');

Route::get('/project/edit/{id?}', 'ProjectController@getEdit');
Route::post('/project/edit', 'ProjectController@postEdit');

Route::get('/project/create', 'ProjectController@getCreate');
Route::post('/project/create', 'ProjectController@postCreate');

Route::get('/project/show/{title?}', 'ProjectController@getShow');

/*
if(App::environment('local')) {

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::get('/drop', function() {
        DB::statement('DROP database foobooks');
        DB::statement('CREATE database foobooks');
        return 'Dropped foobooks; created foobooks.';
    });
}
*/

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});
