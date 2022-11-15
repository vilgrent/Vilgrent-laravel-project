<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TN605105Controller;

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

//Route::view('layouts','layouts.App');

// User details Routes
Route::get('pincode',[TN605105Controller::class,'pincodes']);
 Route::get('adminhomes',[TN605105Controller::class,'adminhomepage']);
 Route::get('village/{id}',[TN605105Controller::class,'service']);
 Route::get('home',[TN605105Controller::class,'index']);
 Route::get('verification',[TN605105Controller::class,'mobileOtp']);
 Route::get('verification/{user_id}',[TN605105Controller::class,'mobileOtp']);
 Route::post('villagesearch',[TN605105Controller::class,'villageSearch']);
 Route::get('kuchipalayam',[TN605105Controller::class,'service']);
 Route::get('registerpage',[TN605105Controller::class,'singUp']);
 Route::post('register-save',[TN605105Controller::class,'register_save']);
 Route::get('kallipattu',[TN605105Controller::class,'services']);
 Route::get('photos/{id}',[TN605105Controller::class,'showphoto']);
 Route::get('postalcode',[TN605105Controller::class,'postalcode']);

 Route::get('events/{id}',[TN605105Controller::class,'showevents']);
 Route::get('placestovisit/{id}',[TN605105Controller::class,'viewplaces']);
 Route::get('showcontact/{id}',[TN605105Controller::class,'contactlist']);
 Route::get('shoplist/{id}',[TN605105Controller::class,'shopslist']);
 Route::get('hotel/{id}',[TN605105Controller::class,'showhotel']);
 Route::get('showimpplace/{id}',[TN605105Controller::class,'showimpplace']);

//Admin details Routes
 Route::get('newvillage',[TN605105Controller::class,'addVillage']);
 Route::get('newvillage/{getid}',[TN605105Controller::class,'addVillage']);
 Route::get('adminhomepage',[TN605105Controller::class,'adminHome']);
 Route::post('insertVillage',[TN605105Controller::class,'insertVillage']);
 Route::get('editpage',[TN605105Controller::class,'editVillage']);
 Route::get('editpage/{id}',[TN605105Controller::class,'editVillage']);
 Route::post('update-village',[TN605105Controller::class,'updateVillage']);
 Route::get('delete/{id}',[TN605105Controller::class,'deleteVillage']);
 Route::get('deletephotos/{id}',[TN605105Controller::class,'deletephotos']);
 Route::get('deleteevent/{id}',[TN605105Controller::class,'deleteEvents']);
 Route::get('delete/{id}',[TN605105Controller::class,'deletePlaces']);
 Route::get('deletecontact/{id}',[TN605105Controller::class,'deleteContact']);
 Route::get('deleteshop/{id}',[TN605105Controller::class,'deleteShop']);
 Route::get('deletehotel/{id}',[TN605105Controller::class,'deleteHotel']);
 Route::get('deleteimpplaces/{id}',[TN605105Controller::class,'deleteIMPPlace']);
 Route::get('adminlogin',[TN605105Controller::class,'loginPage']);
 Route::post('login-save',[TN605105Controller::class,'store']);
 Route::get('addphoto/{id}',[TN605105Controller::class,'viewPhoto']);
 Route::get('addphoto',[TN605105Controller::class,'viewPhoto']);
 Route::post('insertPhotos',[TN605105Controller::class,'insertPhotos']);
 Route::post('updateImage',[TN605105Controller::class,'updateImage']);
 Route::get('editevent/{id}',[TN605105Controller::class,'editEvents']);
 Route::get('editevent',[TN605105Controller::class,'editEvents']);
 Route::post('update-event',[TN605105Controller::class,'updateEvents']);
 Route::get('addevents',[TN605105Controller::class,'addEvent']); 
 Route::post('insert-events',[TN605105Controller::class,'insertEvent']);
 Route::get('placetoVisit',[TN605105Controller::class,'placeTo_visit']);
 Route::post('insert-place',[TN605105Controller::class,'insertPlacetovisit']);
 Route::get('contactlist',[TN605105Controller::class,'contactpage']);
 Route::get('editcontactlist/{contact_id}',[TN605105Controller::class,'editcontact']);
 Route::get('editcontactlist',[TN605105Controller::class,'editcontact']);
 Route::post('update-contact',[TN605105Controller::class,'updateContact']);
 Route::post('insertcontactlist',[TN605105Controller::class,'insertContact']);
 Route::get('shops',[TN605105Controller::class,'shops']);
 Route::get('editshop',[TN605105Controller::class,'editshops']);
 Route::get('editshop/{id}',[TN605105Controller::class,'editshops']);
 Route::post('update-shop',[TN605105Controller::class,'updateShop']);
 Route::post('insert-shops',[TN605105Controller::class,'insertShops']);
 Route::get('hotels',[TN605105Controller::class,'hotels']);
 Route::post('insert-hotel',[TN605105Controller::class,'insertHotels']);
 Route::get('imp_places',[TN605105Controller::class,'impPlace']);
 Route::get('editimpplace',[TN605105Controller::class,'editimpplaces']);
 Route::get('editimpplace/{id}',[TN605105Controller::class,'editimpplaces']);
Route::post('update-impplace',[TN605105Controller::class,'updateImpplace']);
 Route::post('insert-impplace',[TN605105Controller::class,'insertimpdetails']);
 Route::get('editplaces',[TN605105Controller::class,'editplace']);
 Route::get('editplaces/{id}',[TN605105Controller::class,'editplace']);
 Route::post('update-place',[TN605105Controller::class,'updateplace']);
 Route::get('edithotels',[TN605105Controller::class,'edithotels']);
 Route::get('edithotels/{id}',[TN605105Controller::class,'edithotels']);
Route::post('update-hotel',[TN605105Controller::class,'updatehotel']);

Route::get('pin',[TN605105Controller::class,'pin_number']);
Route::post('pin-numberupdate',[TN605105Controller::class,'PinNumbersave']);
Route::post('updatesubscribe',[TN605105Controller::class,'updatesubscribe']);


 Route::post('logout-page',[TN605105Controller::class,'Logout_page']);



