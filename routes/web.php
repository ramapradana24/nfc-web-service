<?php



Route::get("/", "PageController@index");
Route::get("/jadwal/kehadiran/{id}", "PageController@kehadiran");


Route::get("/login/dosen", function(){
  return view('auth.login');
});

Route::get('/absensi', function () {
    return view('absensi_kelas');
});

Route::resource('/jadwal', 'JadwalController');
Route::post('jadwal/validate', 'JadwalController@validateClass')->name('jadwal.validateClass');


Route::post('/login/dosen', 'DosenController@login');
Route::get('/testNotif', function(){
  $headers = array(
      'Authorization: key='.config('app.fcm_api'),
      'Content-Type: application/json'
    );
  
    $fields = array(
      'to'    => 'cfb5VldfHWs:APA91bFa1sFm-vaMBqeHkkZVbfaAUge6mQ2Ia48brIK0X6RRP22Oa1Av42R7KbKR3ckpBZJ6lB_cF-uA4tUc8TrO_XPnQZi88ggd35JsqUkWMa18YEDYQWkAQEaAnsub6djLlgBj73mh',
      // 'registration_ids'=>$registeredTo,
      'notification' => array(
          'title' => "Test",
          'body' => "Testing body",
          'sound'=>'default'
      )
    );

  $curl_session = curl_init();
  curl_setopt($curl_session, CURLOPT_URL,config('app.fcm_url'));
  curl_setopt($curl_session, CURLOPT_POST, true);
  curl_setopt($curl_session, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($curl_session, CURLOPT_POSTFIELDS, json_encode($fields));
  $result = curl_exec($curl_session);
  curl_close($curl_session);

  return 'sent';
});
// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
