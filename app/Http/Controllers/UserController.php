<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Controllers\UserController;
use File; 
use Response;
use DB;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    public function getSearch(Request $request)
    {
        $searchType =$request->input('mobileNumber');
        $value =$request->input('value');
        $data=\App\Helpers\Helper::connectionScheme('user_details',0)
             ->select('user_details.user_id','user_details.user_name','user_details.user_phone_number','user_details.user_village','user_details.user_sex','user_details.user_age','user_details.user_address','user_details.user_email_id','user_details.user_occupation','user_details.user_map_details','user_details.pin_number','user_details.role_as','user_details.village_id')
             ->join('village_details','id','=','user_details.village_id')
             ->where('user_phone_number','like',"%".$value."%")
             ->distinct()
             ->get();
              // print_r($data);exit; 
               $datacount = count($data);            
               $adddata = ['count'=>$datacount];

           return response()->json(['version'=>'1.0','data'=>$data],200);
    
    }
    public function getVillageId($id)
     {

       $villageDetails=[];
       $villageDetails=\App\Helpers\Helper::connectionScheme('village_details',0)
                       ->select('village_details.id','village_details.village_name','village_details.village_image','village_details.district','village_details.address','village_details.map_details','village_details.rural_id','village_details.village_pin_code')
                       ->where('village_details.id',$id)
                       ->first();

       
            
            if ($villageDetails!='') {
                  
                foreach($villageDetails as $key=>$value)
                {
                      // $getevent->event=$getevent;
                    $gethotel=\App\Helpers\Helper::connectionScheme('village_details',0)
                             ->select('hotel_details.hotel_id','hotel_details.hotel_name','hotel_details.hotel_services','hotel_details.hotel_photo','hotel_details.hotel_phone_number','hotel_details.hotel_email_id','hotel_details.hotel_address','hotel_details.hotel_map_details','hotel_details.hotel_timing','hotel_details.hotel_home_delivery_available','hotel_details.hotel_delivery_partners')
                             ->join('hotel_details','village_id','=','village_details.id')
                             ->where('village_details.id',$id)
                             ->get();
                             //print_r($gethotel);exit;
                }
                        
                        $villageDetails->hotel=$gethotel;

           $shopDetails=\App\Helpers\Helper::connectionScheme('village_details',0)
                   ->select('shop_details.shop_id','shop_details.shop_name','shop_details.shop_services','shop_details.shop_photo','shop_details.shop_phone_number','shop_details.shop_email_id','shop_details.shop_address','shop_details.shop_map_details','shop_details.shop_timing','shop_details.shop_home_delivery_available','shop_details.shop_delivery_partners')
                 ->join('shop_details','village_id','=','village_details.id')
                 ->where('village_details.id',$id)
                 ->get(); 
               if ($shopDetails!='')
               {
                     $villageDetails->shop=$shopDetails;
                $contactList=\App\Helpers\Helper::connectionScheme('village_details',0)
                            ->select('village_contact_list.contact_id','village_contact_list.contact_name','village_contact_list.contact_designation','village_contact_list.contact_photo','village_contact_list.contact_phone_number','village_contact_list.contact_email_id','village_contact_list.contact_address','village_contact_list.contact_map_details','village_contact_list.contact_works')
                   ->join('village_contact_list','id_village','=','village_details.id')
                   ->where('village_details.id',$id)
                   ->get();
                }
                        $villageDetails->contact=$contactList;    

          
           $getevent=\App\Helpers\Helper::connectionScheme('village_details',0)
            ->select('event_details.id','event_details.event_name','event_details.event_date','event_details.event_photo','event_details.event_start_date','event_details.event_end_date','event_details.event_map_details')
            ->join('event_details','id_village','=','village_details.id')
            ->where('village_details.id',$id)
            ->get();

                  if ($getevent!='')
                   {
                           $villageDetails->event=$getevent;

                           $importantPlaces=\App\Helpers\Helper::connectionScheme('village_details',0)
                           ->select('village_important_places.id','village_important_places.imp_place_name','village_important_places.imp_place_details','village_important_places.imp_place_photo','village_important_places.imp_place_map_details','village_important_places.imp_place_address')
                           ->join('village_important_places','village_id','=','village_details.id')
                           ->where('village_details.id',$id)
                           ->get();
                     }   
                       $villageDetails->places=$importantPlaces;


              $villagePhoto=\App\Helpers\Helper::connectionScheme('village_details',0)
                         ->select('village_photo.photo_id','village_photo.photo_details','village_photo.photo_type','village_photo.img_src')
                       ->join('village_photo','id_village','=','village_details.id')
                       ->where('village_details.id',$id)
                       ->get();
                     if ($villagePhoto!='')
                      {
                                 $villageDetails->photo=$villagePhoto;
                          $placeVisit=\App\Helpers\Helper::connectionScheme('village_details',0)
                                      ->select('village_places_to_visit.id','village_places_to_visit.place_name','village_places_to_visit.place_details','village_places_to_visit.place_photo','village_places_to_visit.place_map_details','village_places_to_visit.place_address')
                                       ->join('village_places_to_visit','village_id','=','village_details.id')
                                       ->where('village_details.id',$id)
                                     ->get();
                       } 
                              $villageDetails->placesvisit=$placeVisit;
                              $data[]=$villageDetails ;
           }
      
              return response()->json(['version'=>'1.0','village'=>$data],200);   
    }

    public function getImage($image)
    {

        $url = public_path().'/assets/images//'.$image;
        if(!File::exists($url))
        {
        abort(404);
        }
        $file=File::get($url);
        $type=File::mimeType($url);
        $response=Response::make($file,200);
        $response->header("Content-Type",$type);
        return $response;
    }
    public function getpinCode(Request $request)
    {
        // $searchType =$request->input('pincode');
        // $value =$request->input('value');
        $village=[];
        $village=\App\Helpers\Helper::connectionScheme('village_details',0)
                ->select('village_details.id','village_details.village_name','village_details.village_pin_code','village_details.village_image','village_details.map_details','village_details.rural_id','village_details.district')
               // ->where('village_pin_code','like',"%".$value."%")
               ->distinct()
                ->get();
               
        return response()->json(['version'=>'1.0','village'=>$village],200);
    }
    public function insertValue(Request $request)
    {
        $code='';
        $msg = '';
        $validator = Validator::make($request->all(), [
            'user_name'=>'required',
                  'user_email_id'=>'required|email',
                  'user_phone_number'=>'required|unique:user_details',
                  'user_age'=>'required',
                  'user_sex'=>'required',
                  'user_occupation'=>'required',
                  'user_address'=>'required',
                  'user_map_details'=>'required',
                  'user_village'=>'required'
        ]);
        if ($validator->fails()) {
            return response(['code' => $code, 'msg' => $validator->errors()->first()], 200);
        }
        try{
             DB::beginTransaction();
                  $save =\App\Helpers\Helper::connectionScheme('user_details',0)->insert([
                     'user_name' =>$request->user_name,
                     'user_email_id' =>$request->user_email_id,
                     'user_phone_number' =>$request->user_phone_number,
                     'user_age' =>$request->user_age,
                     'user_address' =>$request->user_address,
                     'user_sex' =>$request->user_sex,
                     'user_village' =>$request->user_village,
                     'user_occupation' =>$request->user_occupation,
                     'user_map_details'=>$request->user_map_details,
                     'village_id'=>$request->village_id
                    
                    ]);
            $code = 'SUCCESS';
            $msg = 'User Name Successfully Registered';
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json(['code' => $code, 'msg' => $ex->getMessage()]);
        }
        return response()->json(['code' => $code, 'msg' => $msg], 200);
     }
     public function updateValues(Request $request)
     {
       $numbers = PinNumber::find($request->id);
       $numbers->pin_number=$request->pin_number;
       $numbers->save();

        return response()->json(['code' => $code, 'msg' => $msg], 200);
     }

       // public function village($id)
    // {
    // $village_details = village_detail::select('village_details.id','village_details.village_name','village_details.village_image')->get();
    // return response()->json(['version'=>'1.0','village'=>$village_details]);
    // }
    // public function searchVillage(Request $request)
    // {
    //     $searchType=$request->input('name');
    //     $value=$request->input('value');
    //     $data=\App\Helpers\Helper::connectionScheme('village_details')->select('village_details.id','village_details.village_name','village_details.village_image')
    //     ->where('village_details.village_name','like',"%".$value."%")
    //     ->distinct()
    //     ->get();
    //     $datacount = count($data);
    //     $adddata = ['count'=>$datacount];
    //   return response()->json(['version'=>'1.0','data'=>$data,'additionalData'=>$adddata,'error'=>Null,'statusCode'=>200],200);
    // }

}
 