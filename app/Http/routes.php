<?php
Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'LoremIpsumController@getIndex');
    Route::get('/lorem-ipsum', 'LoremIpsumController@getIndex');
    Route::get('/lorem-ipsum/create', 'LoremIpsumController@getCreate');
    Route::post('/lorem-ipsum/create', 'LoremIpsumController@postCreate');

    Route::get('/random-user', 'RandomUserController@getIndex');
    Route::get('/random-user/create', 'RandomUserController@getCreate');
    Route::post('/random-user/create', 'RandomUserController@postCreate');

    Route::get('/debug', function() {
        echo '<pre>';

        echo '<h1>Environment</h1>';
        echo App::environment().'</h1>';

        echo '<h1>Debugging?</h1>';
        if(config('app.debug')) echo "Yes"; else echo "No";

        echo '<h1>Database Config</h1>';

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
});
