<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\village_detail;
use App\Models\Event;
use App\Models\Login;
use App\Models\PinNumber;
use App\Models\TN605105;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use DB;
use File;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Auth;

 

class TN605105Controller extends Controller
{
    public function pincodes()
    {
        $village_detail=array();
        $getpincode=array();

        $village_detail =\App\Helpers\Helper::connectionScheme('village_details',0)->select('village_details.village_pin_code',)->distinct()
        ->where('village_details.village_pin_code','=','605105')
        ->get();
        $getpincode=\App\Helpers\Helper::connectionScheme('village_details',0)->select('village_details.village_pin_code')->distinct()
        ->where('village_details.village_pin_code','=','605103')
        ->get();
         return view('pincodes',['village_detail'=>$village_detail,'getpincode'=>$getpincode]);
        
    }
    public function postalcode()
    {
        $getpincodes=array();
        $getpincodes=\App\Helpers\Helper::connectionScheme('village_details',0)->select('village_details.id','village_details.village_name','village_details.village_image')
        ->where('village_details.village_pin_code','=','605103')
        ->get();
        return view('codes',['getpincodes'=>$getpincodes]);

    }
    public function index()
    {     
        $village_details=array();

        $village_details = village_detail::select('village_details.id','village_details.village_name','village_details.village_image')
        ->where('village_details.village_pin_code','=','605105')
        ->get();
       
         return view('home',['village_details'=>$village_details]);
    }
     public function service($user_id)
    {
        $user_id=base64_decode($user_id);
       
        $getdetails=array();
        $getuserid=array();

        $getuserid=\App\Helpers\Helper::connectionScheme('user_details',0)->select('user_details.user_id')->orderBy('user_details.user_id','DESC')->first();
        
        $getdetails=\App\Helpers\Helper::connectionScheme('user_details',0)->select('user_details.user_id','user_details.subscribe_villageid','user_details.village_id')
        ->where('user_details.user_id','=',$user_id)
        ->first();
    
        return view('villages',['getdetails'=>$getdetails,'getuserid'=>$getuserid]);
    }
     public function mobileOtp($user_id)
    {
        $editid=array();
        $editid = PinNumber::find($user_id);
        
        return view('firebase',['editid'=>$editid]);
    }
     public function singUp()
    {
        $editid =array();
        $TNvillages=array();
        $villagenames=array();

        $editid=TN605105::orderBy('user_details.user_id','DESC')->first();
        $villagenames=\App\Helpers\Helper::connectionScheme('village_details',0)->select('village_details.village_name','village_details.id')
         ->get();
         $TNvillages=\App\Helpers\Helper::connectionScheme('village_details',0)->select('village_details.village_name','village_details.id')
        ->get();

        return view('register',['editid'=>$editid,'villagenames'=>$villagenames,'TNvillages'=>$TNvillages]);
    }
     public function pin_number()
    {
       return view('pin');
    }
    public function PinNumbersave(Request $request)
    {
        $this->validate($request, [
                    
            'pin_number'=>'min:4|required_with:confirm_pinnumber|same:confirm_pinnumber',
            'confirm_pinnumber'=>'max:4|required'],
        [
            'pin_number.required'=>'Must not be blank pinnumber should have 4 Number',
                  'confirm_pinnumber.required'=>'Must not be blank confirm_pinnumber should have 4 Number'
        ]);
        try{
        
        $inputs=array();
        $updatepinnumber=\App\Helpers\Helper::connectionScheme('user_details',0)->select('user_details.pin_number')
        ->orderBy('user_details.user_id','DESC')->first();
        if($updatepinnumber!='')
        {
           $inputs['pin_number']=$request->pin_number;
        }
        $updatearray=\App\Helpers\Helper::connectionScheme('user_details',0)->where('user_details.user_id',$request->user_id)
            ->update($inputs);
    }
       catch(\Exception $ex)
       {
        \App\Helpers\Helper::insert_exception('PinNumbersave',$ex->getMessage());
         return  back()->with('error',$ex->getMessage());
        }

        return Redirect('adminlogin')->with('success','Your Pinnumber creation has been successfully');
    }
    
    public function viewPhoto()
    {
        $getvillageimages=array();
        $getvillageimages=\App\Helpers\Helper::connectionScheme('village_details',0)->select('village_photo.photo_id','village_photo.id_village','village_photo.photo_details','village_photo.photo_type','village_photo.img_src')
        ->join('village_photo','id_village','=','village_details.id')
        ->get();
        $getvillage=\App\Helpers\Helper::connectionScheme('village_details',0)->select('village_details.village_name','village_details.id')
        ->get();
        
        return view('add_photos',['getvillageimages'=>$getvillageimages],['getvillage'=>$getvillage]);
    }
    public function viewplaces($id)
    {
        $id=base64_decode($id);
        $getplacesinfo=array();
        $getplacesinfo=\App\Helpers\Helper::connectionScheme('village_details',0)
        ->join('village_places_to_visit','village_id','=','village_details.id')
        ->select('village_places_to_visit.id','village_places_to_visit.place_name','village_places_to_visit.place_photo',
       'village_places_to_visit.place_map_details','village_places_to_visit.place_address','village_places_to_visit.place_details','village_places_to_visit.village_id')
       ->where('village_places_to_visit.village_id','=',$id)
       ->get();
        
        return view('places_to_visit',['getplacesinfo'=>$getplacesinfo]);
    }
    public function contactlist($id)
    {
        $id=base64_decode($id);
        $getcontactinfo=array();

        $getcontactinfo=\App\Helpers\Helper::connectionScheme('village_details',0)
        ->join('village_contact_list','id_village','=','village_details.id')
        ->select('village_contact_list.contact_id','village_contact_list.contact_name',
          'village_contact_list.contact_designation','village_contact_list.contact_photo','village_contact_list.contact_phone_number','village_contact_list.contact_email_id',
          'village_contact_list.contact_address','village_contact_list.contact_map_details','village_contact_list.contact_works','village_contact_list.id_village')
          ->where('village_contact_list.id_village','=',$id)
          ->get();
        return view('showcontact',['getcontactinfo'=>$getcontactinfo]);
    }
    public function shopslist($id)
    {
        $id=base64_decode($id);
        $getshopinfo=array();

        $getshopinfo=\App\Helpers\Helper::connectionScheme('village_details',0)
        ->join('shop_details','village_id','=','village_details.id')
        ->select('shop_details.shop_id','shop_details.shop_name','shop_details.shop_services','shop_details.shop_photo','shop_details.shop_phone_number',
        'shop_details.shop_email_id','shop_details.shop_address','shop_details.shop_map_details','shop_details.shop_timing','shop_details.shop_home_delivery_available',
        'shop_details.shop_delivery_partners')
        ->where('shop_details.village_id','=',$id)
        ->get();
        
        return view('showshops',['getshopinfo'=>$getshopinfo]);
    }
    public function editshops($shop_id='')
    {
        $editshops=array();
        $editshops=\App\Helpers\Helper::connectionScheme('shop_details',0)->where('shop_details.shop_id',$shop_id)
        ->select('shop_details.shop_id','shop_details.shop_name','shop_details.shop_services','shop_details.shop_photo','shop_details.shop_phone_number',
        'shop_details.shop_email_id','shop_details.shop_address','shop_details.shop_map_details','shop_details.shop_timing','shop_details.shop_home_delivery_available',
        'shop_details.shop_delivery_partners')
        ->first();
      
        return view('editshop',['editshops'=>$editshops]);
    }
    public function editEvents($id='')
    {
        $editevents=array();
        $editevents=\App\Helpers\Helper::connectionScheme('event_details',0)
        ->select('event_details.id','event_details.event_name','event_details.event_date','event_details.event_photo','event_details.address',
        'event_details.event_start_date','event_details.event_end_date','event_details.event_map_details','event_details.id_village')
        ->where('event_details.id',$id)
        ->first();
   
        return view('editevent',['editevents'=>$editevents]);
    }
    public function editplace($id='')
    {
       $geteditplace=array();
       $geteditplace=\App\Helpers\Helper::connectionScheme('village_places_to_visit')
       ->select('village_places_to_visit.id','village_places_to_visit.place_name','village_places_to_visit.place_photo',
       'village_places_to_visit.place_map_details','village_places_to_visit.place_address','village_places_to_visit.place_details')
       ->where('village_places_to_visit.id',$id)
       ->first();
       
       return view('editplace',['geteditplace'=>$geteditplace]);
    }

    public function addEvent($id='')

    {
         $geteventsdetails=array();

        $geteventsdetails=\App\Helpers\Helper::connectionScheme('event_details',0)
        ->select('event_details.id','event_details.id_village','event_details.event_name','event_details.event_date','event_details.event_photo','event_details.event_start_date',
        'event_details.event_end_date','event_details.address','event_details.event_map_details')
        ->get();
        $getvillages=\App\Helpers\Helper::connectionScheme('village_details',0)->select('village_details.village_name','village_details.id')
        ->get();

        
        return view('add_events',['geteventsdetails'=>$geteventsdetails],['getvillages'=>$getvillages]);
    }
    public function placeTo_visit()
    {
        $getplacetovisit=array();
        $getplacetovisit=\App\Helpers\Helper::connectionScheme('village_places_to_visit',0)
        ->select('village_places_to_visit.place_name','place_details','place_photo','place_map_details','place_address','village_places_to_visit.id')
        ->get();
        $villages=\App\Helpers\Helper::connectionScheme('village_details',0)->select('village_details.village_name','village_details.id')
        ->get();

       
        return view('placeto_visit',['getplacetovisit'=>$getplacetovisit],['villages'=>$villages]);
    }
    public function contactpage()
    {    
        $getvillageids =array();
        $getcontactlist = array();
        $getcontactlist = \App\Helpers\Helper::connectionScheme('village_contact_list')->select('village_contact_list.contact_id','village_contact_list.contact_name',
        'village_contact_list.contact_designation','village_contact_list.contact_photo','village_contact_list.contact_phone_number','village_contact_list.contact_email_id',
        'village_contact_list.contact_address','village_contact_list.contact_map_details','village_contact_list.contact_works')
        ->get();
        $getvillageids=\App\Helpers\Helper::connectionScheme('village_details',0)->select('village_details.village_name','village_details.id')
        ->get();

        return view('contact',['getcontactlist'=>$getcontactlist,'getvillageids'=>$getvillageids]);
    }
    public function hotels()
    {
       $gethoteldetails=array();
       $gethoteldetails = \App\Helpers\Helper::connectionScheme('hotel_details')
       ->select('hotel_details.hotel_id','hotel_details.hotel_name','hotel_details.hotel_services','hotel_details.hotel_photo','hotel_details.hotel_phone_number',
       'hotel_details.hotel_email_id','hotel_details.hotel_address','hotel_details.hotel_map_details','hotel_details.hotel_timing','hotel_details.hotel_home_delivery_available',
       'hotel_details.hotel_delivery_partners')
       ->get();
       $getvillagesids=\App\Helpers\Helper::connectionScheme('village_details',0)->select('village_details.village_name','village_details.id')
       ->get();
        
        return view('hotel',['gethoteldetails'=>$gethoteldetails],['getvillagesids'=>$getvillagesids]);
    }
    public function edithotels($id='')
    {
        
        $edithotel=array();
        $edithotel=\App\Helpers\Helper::connectionScheme('hotel_details')
        ->select('hotel_details.hotel_id','hotel_details.hotel_name','hotel_details.hotel_services','hotel_details.hotel_photo','hotel_details.hotel_phone_number',
        'hotel_details.hotel_email_id','hotel_details.hotel_address','hotel_details.hotel_map_details','hotel_details.hotel_timing','hotel_details.hotel_home_delivery_available',
        'hotel_details.hotel_delivery_partners')
        ->where('hotel_details.hotel_id',$id)
        ->first();
       
        return view('edithotel',['edithotel'=>$edithotel]);

    }
    public function showimpplace()
    {
        $getimpplace=array();
        $getimpplace=\App\Helpers\Helper::connectionScheme('village_details',0)
        ->select('village_important_places.id','village_important_places.imp_place_name','village_important_places.imp_place_photo','village_important_places.imp_place_details',
        'village_important_places.imp_place_map_details','village_important_places.imp_place_address','village_important_places.village_id')
        ->join('village_important_places','village_id','village_details.id')
        ->get();
        return view('showimp_list',['getimpplace'=>$getimpplace]);
    }
    public function showphoto($id)
    {
        $id=base64_decode($id);
         $getphotos=array(); 
         $getphotos=\App\Helpers\Helper::connectionScheme('village_details',0)
         ->join('village_photo','id_village','village_details.id')
         ->select('village_photo.id_village','village_photo.photo_type','village_photo.img_src','village_photo.photo_details')
         ->where('village_photo.photo_type','=','2')
        ->where('village_photo.id_village',$id)
        ->get();
        
        return view('photos',['getphotos'=>$getphotos]);
    }
      public function showevents($id)
     {
        $id=base64_decode($id);
        $geteventinfo=array();
        $geteventinfo=\App\Helpers\Helper::connectionScheme('village_details')
        ->join('event_details','id_village','=','village_details.id')
        ->select('event_details.event_name','event_details.event_date','event_details.event_start_date','event_details.event_end_date','event_details.event_photo',
        'event_details.id_village','village_details.id','event_details.address')
        ->where('village_details.id',$id)
        ->get(); 
    
        
        return view('events_Ak',['geteventinfo'=>$geteventinfo]);
    }
    public function Shops()
    {

        $getshopdetails=array();
      $getshopdetails =\App\Helpers\Helper::connectionScheme('shop_details')->select('shop_details.shop_id','shop_details.shop_name','shop_details.shop_services',
      'shop_details.shop_photo','shop_details.shop_phone_number','shop_details.shop_email_id','shop_details.shop_address','shop_details.shop_map_details','shop_details.shop_timing',
      'shop_details.shop_home_delivery_available','shop_details.shop_delivery_partners')
      ->get();
      $getvillagesid=\App\Helpers\Helper::connectionScheme('village_details')->select('village_details.village_name','village_details.id')
      ->get();
     
      return view('shops',['getshopdetails'=>$getshopdetails],['getvillagesid'=>$getvillagesid]);
    }
     public function editVillage($id)
    {
        $editvillage=array();
        $editvillage=\App\Helpers\Helper::connectionScheme('village_details',0)->where('village_details.id',$id)
                        ->select('village_details.id','village_details.village_image','village_details.village_name','village_details.district','village_details.address','village_details.rural_id','village_details.map_details','village_details.village_pin_code')
                        ->first();
        return view('edit_village',['editvillage'=>$editvillage]);
    }
     public function addVillage()
    {
        $getvillagedetails=array();
         $getvillagedetails=\App\Helpers\Helper::connectionScheme('village_details')
                        ->select('village_details.village_image','village_details.id','village_details.village_name','village_details.district','village_details.address','village_details.rural_id','village_details.village_pin_code','village_details.map_details')
                        ->get();
                        
        return view('add_village',['getvillagedetails'=>$getvillagedetails]);
    }
     public function adminHome()
    {
        return view('admin_home');
    }

     public function loginPage()
    {
        return view('adminlogin');
    }
    public function showhotel($id)
    {
        $id=base64_decode($id);
        $gethotellist=array();
        
        $gethotellist = \App\Helpers\Helper::connectionScheme('village_details')
                     ->join('hotel_details','village_id','=','village_details.id')
                     ->select('hotel_details.hotel_id','hotel_details.hotel_name','hotel_details.hotel_services','hotel_details.hotel_photo','hotel_details.hotel_phone_number',
                    'hotel_details.hotel_email_id','hotel_details.hotel_address','hotel_details.hotel_map_details','hotel_details.hotel_timing','hotel_details.hotel_home_delivery_available',
                    'hotel_details.hotel_delivery_partners')
                    ->where('hotel_details.village_id','=',$id)
                    ->get();
                    
                   return view('showhotel',['gethotellist'=>$gethotellist]);
    }
    public function adminhomepage()
    {
        return view('adminhome');
    }
    
    public function insertVillage(Request $request)
    {
        
            $this->validate($request,[
                'file'=>'required',
                'village_name'=>'required',
                'district'=>'required',
                'address'=>'required',
                'map_details'=>'required',
                'rural_id'=>'required',
                'village_pin_code'=>'required'
            ]);
    try
        {
            $filename='';
            if($request->hasfile('file')) {
            $validatedDate=$request->validate(['file' => 'required|file|mimes:jpg,jpeg,svg,png|max:512']);
            $file=$request->file;
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('assets/images',$filename);
            }


                 $lastInsertId =\App\Helpers\Helper::connectionScheme('village_details')->insertGetId([
                     'village_image'=>$filename,
                     'village_name' =>$request->village_name,
                     'district' =>$request->district,
                     'address' =>$request->address,
                     'rural_id' =>$request->rural_id,
                     'map_details' =>$request->map_details,
                     'village_pin_code' =>$request->village_pin_code
                 ]);


                 
            }
            catch(\Exception $ex)
            {
                \App\Helpers\Helper::insert_exception('insertvillage',$ex->getMessage());
            
                return  back()->with('error',$ex->getMessage());
            }
          return back()->with('success',' Your Record insert successfully');
        }
  public function updateVillage(Request $request) 
  {  
    $this->validate($request,[
        
        'village_name'=>'required',
        'district'=>'required',
        'address'=>'required',
        'map_details'=>'required',
        'rural_id'=>'required',
        'village_pin_code'=>'required'
    ]);

   
   
      try
        { 
            $updatevillage =['village_name'=>$request->village_name,'district'=>$request->district,'address'=>$request->address,
         'village_pin_code'=>$request->village_pin_code,'rural_id'=>$request->rural_id,'map_details'=>$request->map_details]; 

                  $filename='';
                  if($request->hasFile('file'))
                  { 
                     $destination =("/assets/images".$filename);
                         if(File::exists($destination))
                         {
                           File::delete($destination);
                         }
                         $file = $request->file('file');
                         $filename=time().'.'.$file->getClientOriginalExtension();
                         $file->move('assets/images',$filename);
                         $request->filename=$filename;
                         $updatevillage['village_image']=$request->filename;
                  }
                  
         
                 
    $villagesupdate =\App\Helpers\Helper::connectionScheme('village_details')->where('id',$request->id)->update($updatevillage);
   
            }
            catch(\Exception $ex)
            {
                \App\Helpers\Helper::insert_exception('updatevillage',$ex->getMessage());
                 return  back()->with('error',$ex->getMessage());
            }

              return back()->with('success',' Your Record updated successfully');
               
      }        
      public function deleteVillage(Request $request,$id)
      {
         $deleteVillages =\App\Helpers\Helper::connectionScheme('village_details',)->where('village_details.id','=',$id)
                        ->delete();
            return back()->with('success',' Your Record Deleted successfully');
      }
      public function deleteEvents(Request $request,$id)
      {
         $deleteevents=\App\Helpers\Helper::connectionScheme('event_details',)->where('event_details.id','=',$id)
                        ->delete();
            return back()->with('success',' Your Record Deleted successfully');
      }

      public function deletephotos(Request $request,$id)
      {
         $deletePhotos =\App\Helpers\Helper::connectionScheme('village_photo',)->where('village_photo.photo_id','=',$id)
                        ->delete();
            return back()->with('success',' Your Record Deleted successfully');
      }
      public function deletePlaces(Request $request,$id)
      {
         $deletePhotos =\App\Helpers\Helper::connectionScheme('village_places_to_visit',)->where('village_places_to_visit.id','=',$id)
                        ->delete();
            return back()->with('success',' Your Record Deleted successfully');
      }
      public function deleteContact(Request $request,$id)
      {
         $deletePhotos =\App\Helpers\Helper::connectionScheme('village_contact_list',)->where('village_contact_list.contact_id','=',$id)
                        ->delete();
            return back()->with('success',' Your Record Deleted successfully');
      }
      public function deleteShop(Request $request,$id)
      {
         $deletePhotos =\App\Helpers\Helper::connectionScheme('shop_details',)->where('shop_details.shop_id','=',$id)
                        ->delete();
            return back()->with('success',' Your Record Deleted successfully');
      }
      public function deleteHotel(Request $request,$id)
      {
         $deletePhotos =\App\Helpers\Helper::connectionScheme('hotel_details',)->where('hotel_details.hotel_id','=',$id)
                        ->delete();
            return back()->with('success',' Your Record Deleted successfully');
      }
      public function deleteIMPPlace(Request $request,$id)
      {
         $deletePhotos =\App\Helpers\Helper::connectionScheme('village_important_places',)->where('village_important_places.id','=',$id)
                        ->delete();
            return back()->with('success',' Your Record Deleted successfully');
      }

      public function store(Request $request)
    {
      $request->validate([
      
    
      'user_phone_number'=>'required|min:10',
      'pin_number'=>'required|min:4',
      'role_as'=>'required'],

      [
        'user_phone_number.required'=>'please enter valid mobile phone',
        'pin_number.required'=>'please enter a pin numeric',
        'role_as.required'=>'please check tha role']);

  if ($request->role_as==0) 
  {
     
      $data=Login::where(['user_phone_number'=>$request->user_phone_number,'pin_number'=>$request->pin_number,'role_as'=>$request->role_as])
          ->count();
      if($data>0)
       {
            return redirect('home');
       } 
       else
       {
           return back()->with('error','Invalid Phone Number/PinNumber!!');
       }

  }
 else
  {
       $data=Login::where(['user_phone_number'=>$request->user_phone_number,'pin_number'=>$request->pin_number,'role_as'=>$request->role_as])
           
           ->count();
       if($data>0)
       {
           return redirect('adminhomes');
       }
       else
       {
           return back()->with('error','Invalid Phone Number/PinNumber!!');
       }  
        
 }
    
}
public function insertPhotos(Request $request)
     {
        
       
        $this->validate($request,[
                'file'=>'required',
                'photo_details'=>'required',
                'getvillage'=>'required'
        ]);
      

        $filename='';
                if($request->hasfile('file')) {
                $validatedDate=$request->validate(['file' => 'required|file|mimes:jpg,jpeg,svg,png|max:512']);
                $file=$request->file;
                $filename=time().'.'.$file->getClientOriginalExtension();
                $request->file->move('assets/images',$filename);
                }
               $getphotoimg =\App\Helpers\Helper::connectionScheme('village_photo',0)->select('village_photo.photo_id','village_photo.id_village',
                     'village_photo.photo_details','village_photo.photo_type','village_photo.img_src')
                     ->where('village_photo.id_village','=',$request->id);
                   
                         $imagearray =[
                         'img_src'=>$filename,
                         'photo_details'=>$request->photo_details,
                         'photo_type'=>2,
                         'id_village'=>$request->getvillage 
                         ];
                        
                        
       $insert_img=\App\Helpers\Helper::connectionScheme('village_photo',0)->insert($imagearray);
                     return back()->with('success',' Your image insert successfully');
     }
     public function updateImage(Request $request)
     {
      
       try{       
         
        $updatephototype =\App\Helpers\Helper::connectionScheme('village_photo',0) ->where('village_photo.id_village','=',$request->id)  
         ->update(['photo_type'=>2]);
         $updatephoto = \App\Helpers\Helper::connectionScheme('village_photo',0)->where('village_photo.photo_id','=',$request->id)
         ->update(['photo_type'=>1,'photo_type'=>$request->photo_type]);
       }
             catch(\Exception $ex)
             {
                \App\Helpers\Helper::insert_exception('updateImage',$ex->getMessage());
                  DB::rollback();
                 return  back()->with('error',$ex->getMessage());
           }
        echo 'Your photo updated successfully';
     }
     public function updatesubscribe(Request $request)
     {
        $inputs =array();
        $subscribe=\App\Helpers\Helper::connectionScheme('user_details',0)->select('user_details.subscribe_villageid')
        ->orderBy('user_details.user_id','DESC')->first();
       
        foreach($subscribe as $key=>$values)
        {
        $subscribe_village=array();
         if($values!=null)
         {
          $subscribe_village=explode(',',$values);
        }
         $subscribe_village[] = base64_decode($request->subscribe_villageid);
         $getsubscribeid= implode(",",$subscribe_village);
         $inputs['subscribe_villageid']=$getsubscribeid;
         
         $updatesubscribe =\App\Helpers\Helper::connectionScheme('user_details',0)->where('user_details.user_id',$request->user_id)
         ->update($inputs);
        } 
        
       return back()->with('success', 'Your subscribed successfully');
    }
      public function register_save(Request $request)
   {
   
      $this->validate($request, [
                  'user_name'=>'required',
                  'user_email_id'=>'required|email',
                  'user_phone_number'=>'required|numeric',
                  'user_age'=>'required',
                  'user_sex'=>'required',
                  'user_occupation'=>'required',
                  'user_address'=>'required',
                  'user_map_details'=>'required',
                  'villagenames'=>'required'
       
      ]);

          try{
        $registerinsert =\App\Helpers\Helper::connectionScheme('user_details',0)->insert([
                     'user_name' =>$request->user_name,
                     'user_email_id' =>$request->user_email_id,
                     'user_phone_number' =>$request->user_phone_number,
                     'user_age' =>$request->user_age,
                     'user_address' =>$request->user_address,
                     'user_sex' =>$request->user_sex,
                     'user_village' =>$request->villagenames,
                     'user_occupation' =>$request->user_occupation,
                     'user_map_details'=>$request->user_map_details
                    
                    
                    ]);
        //  $user= new user;
        //  $user->user_name=$request->user_name;
        //  $user->user_email_id=$request->user_email_id;
        //  $user->user_phone_number=$request->user_phone_number;
        //  $user->user_age=$request->user_age;
        //  $user->user_address=$request->user_address;
        //  $user->user_sex=$request->user_sex;
        //  $user->user_village=$request->villagenames;
        //  $user->user_occupation=$request->user_occupation;
        //  $user->user_map_details=$request->user_map_details;
        //  $user->save();

            }
                  catch(\Exception $ex)
            {
                \App\Helpers\Helper::insert_exception('Registersave',$ex->getMessage());
                return  back()->with('error',$ex->getMessage());

             }
             return back()->with('success','Your Registered successfully');

     }
public function insertEvent(Request $request)

{

    $this->validate($request,[
                'file'=>'required',
                'event_name'=>'required',
                'event_date'=>'required',
                'event_start_date'=>'required',
                'event_end_date'=>'required',
                'address'=>'required',
                'address'=>'required',
                'event_map_details'=>'required',
                'getvillages'=>'required'
                
    ]);


      try
        {
                $filename='';
                if($request->hasfile('file')) {
                $validatedDate=$request->validate(['file' => 'required|file|mimes:jpg,jpeg,svg,png|max:512']);
                $file=$request->file;
                $filename=time().'.'.$file->getClientOriginalExtension();
                $request->file->move('assets/images',$filename);
                }

                $saveevents =\App\Helpers\Helper::connectionScheme('event_details')->insertGetId([
                     'event_photo' =>$filename,
                     'event_name' =>$request->event_name,
                     'event_date' =>$request->event_date,
                     'event_start_date' =>$request->event_start_date,
                     'event_end_date' =>$request->event_end_date,
                     'address'=>$request->address,
                     'event_map_details' =>$request->event_map_details,
                     'id_village'=>$request->getvillages
                 ]);

            }

            catch(\Exception $ex)
            {
                \App\Helpers\Helper::insert_exception('insertEvent',$ex->getMessage());
            
                return  back()->with('error',$ex->getMessage());
            }
            return back()->with('success',' Your Record insert successfully');
        }
    public function updateEvents(Request $request)
    {
        $this->validate($request,[
            
            'event_name'=>'required',
            'event_date'=>'required',
            'event_start_date'=>'required',
            'event_end_date'=>'required',
            'address'=>'required',
            'event_map_details'=>'required'
            
        ]);
        try
     {   

        $updatearrays =['event_name'=>$request->event_name,'event_date'=>$request->event_date,
                  'event_start_date'=>$request->event_start_date,'event_end_date'=>$request->event_end_date,'address'=>$request->address,
                  'event_map_details'=>$request->event_map_details];

                  $filename='';
                  if($request->hasFile('file')) {
                     $destination =("/assets/images".$filename);
                         if(File::exists($destination))
                         {
                           File::delete($destination);
                         }
                         $file = $request->file('file');
                         $filename=time().'.'.$file->getClientOriginalExtension();
                         $file->move('assets/images',$filename);
                         $request->filename=$filename;
                         $updatearrays['event_photo']=$request->filename;
                  }
                  
                $events =\App\Helpers\Helper::connectionScheme('event_details')->where('id',$request->id)->update($updatearrays);
                  
      }
      catch(\Exception $ex)
      {
          \App\Helpers\Helper::insert_exception('updateevents',$ex->getMessage());
           
           return  back()->with('error',$ex->getMessage());
      }
        
     return back()->with('success',' Your Record update successfully');
  }

         public function insertPlacetovisit(Request $request)
    {
       
        
        
        $this->validate($request, [
            'file'=>'required',
            'place_name'=>'required',
            'place_details'=>'required',
            'place_map_details'=>'required',
            'place_address'=>'required',
            'villages'=>'required',
            'villages'=>'required'
            
        ]);


  try
    {
            $filename='';
            if($request->hasfile('file')) {
            $validatedDate=$request->validate(['file' => 'required|file|mimes:jpg,jpeg,svg,png|max:512']);
            $file=$request->file;
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('assets/images',$filename);
            }


             $saveevents = \App\Helpers\Helper::connectionScheme('village_places_to_visit')->insert([
                 'place_photo' =>$filename,
                 'place_name' =>$request->place_name,
                 'place_details' =>$request->place_details,
                 'place_map_details' =>$request->place_map_details,
                 'place_address' =>$request->place_address,
                 'village_id'=>$request->villages
                
             ]);

        }
        catch(\Exception $ex)
        {
            \App\Helpers\Helper::insert_exception('insertplace',$ex->getMessage());
        
            return  back()->with('error',$ex->getMessage());
        }
        return back()->with('success',' Your Record insert successfully');

        }

        public function insertContact(Request $request)
    {
        

        $this->validate($request, [
                'file'=>'required',
                'contact_name'=>'required',
                'contact_designation'=>'required',
                'contact_phone_number'=>'required',
                'contact_email_id'=>'required',
                'contact_address'=>'required',
                'contact_map_details'=>'required',
                'contact_works'=>'required',
                'getvillageids'=>'required'
                
          ]);
      try
        {

            $filename='';
            if($request->hasfile('file')) {
                $validatedDate=$request->validate(['file' => 'required|file|mimes:jpg,jpeg,svg,png|max:512']);
                $file=$request->file;
                $filename=time().'.'.$file->getClientOriginalExtension();
                $request->file->move('assets/images',$filename);
             }
                


                 $lastInsertId =\App\Helpers\Helper::connectionScheme('village_contact_list')->insert([
                     
                     'contact_photo'=>$filename,
                     'contact_name' =>$request->contact_name,
                     'contact_designation' =>$request->contact_designation,
                     'contact_phone_number' =>$request->contact_phone_number,
                     'contact_address'=>$request->contact_address,
                     'contact_email_id'=>$request->contact_email_id,
                     'contact_map_details' =>$request->contact_map_details,
                     'contact_works'=>$request->contact_works,
                     'id_village'=>$request->getvillageids
                 ]);

            }
            catch(\Exception $ex)
            {
                \App\Helpers\Helper::insert_exception('insertcontactlist',$ex->getMessage());
            
                return  back()->with('error',$ex->getMessage());
            }
          return back()->with('success',' Your Record insert successfully');
        }
        public function editcontact($contact_id)
        {
            $editcontactlist = array();
           $editcontactlist = \App\Helpers\Helper::connectionScheme('village_contact_list')->where('village_contact_list.contact_id',$contact_id)
           ->select('village_contact_list.contact_id','village_contact_list.contact_name',
          'village_contact_list.contact_designation','village_contact_list.contact_photo','village_contact_list.contact_phone_number','village_contact_list.contact_email_id',
          'village_contact_list.contact_address','village_contact_list.contact_map_details','village_contact_list.contact_works')
          ->first();
         
            return view('editcontact',['editcontactlist'=>$editcontactlist]);
        }
        public function updateContact(Request $request)
        {

            $this->validate($request, [
                
                'contact_name'=>'required',
                'contact_designation'=>'required',
                'contact_phone_number'=>'required',
                'contact_email_id'=>'required',
                'contact_address'=>'required',
                'contact_map_details'=>'required',
                'contact_works'=>'required'
                
                
          ]);

            try
         {   

            $updatecontactlist =['contact_name'=>$request->contact_name,'contact_designation'=>$request->contact_designation,
            'contact_phone_number'=>$request->contact_phone_number,'contact_email_id'=>$request->contact_email_id,
            'contact_address'=>$request->contact_address,'contact_map_details'=>$request->contact_map_details,'contact_works'=>$request->contact_works];
           
                      $filename='';
                      if($request->hasFile('file')) {
                         $destination =("/assets/images".$filename);
                             if(File::exists($destination))
                             {
                               File::delete($destination);
                             }
                             $file = $request->file('file');
                             $filename=time().'.'.$file->getClientOriginalExtension();
                             $file->move('assets/images',$filename);
                             $request->filename=$filename;
                             $updatecontactlist['contact_photo']=$request->filename;
                      }
         $contactupdate=\App\Helpers\Helper::connectionScheme('village_contact_list')->where('village_contact_list.contact_id',$request->contact_id)->update($updatecontactlist);
                      
          }
          catch(\Exception $ex)
          {
              \App\Helpers\Helper::insert_exception('updatecontact',$ex->getMessage());
               
               return  back()->with('error',$ex->getMessage());
          }
          return back()->with('success',' Your Record Update successfully');
        }

    public function insertShops(Request $request)
    {
        

        $this->validate($request, [
                'file'=>'required',
                'shop_name'=>'required',
                'shop_services'=>'required',
                'shop_phone_number'=>'required',
                'shop_email_id'=>'required',
                'shop_address'=>'required',
                'shop_map_details'=>'required',
                'shop_timing'=>'required',
                'shop_home_delivery_available'=>'required',
                'shop_delivery_partners'=>'required',
                'getvillagesid'=>'required'
            ]);
      try
        {
                $filename='';
                if($request->hasfile('file')) {
                $validatedDate=$request->validate(['file' => 'required|file|mimes:jpg,jpeg,svg,png|max:512']);
                $file=$request->file;
                $filename=time().'.'.$file->getClientOriginalExtension();
                $request->file->move('assets/images',$filename);
                }
                
                $lastInsertId =\App\Helpers\Helper::connectionScheme('shop_details')->insert([
                     
                     'shop_photo'=>$filename,
                     'shop_name' =>$request->shop_name,
                     'shop_services' =>$request->shop_services,
                     'shop_phone_number' =>$request->shop_phone_number,
                     'shop_email_id'=>$request->shop_email_id,
                     'shop_address'=>$request->shop_address,
                     'shop_map_details' =>$request->shop_map_details,
                     'shop_timing'=>$request->shop_timing,
                     'shop_home_delivery_available'=>$request->shop_home_delivery_available,
                     'shop_delivery_partners'=>$request->shop_delivery_partners,
                     'village_id'=>$request->getvillagesid
                 ]);

            }
            catch(\Exception $ex)
            {
                \App\Helpers\Helper::insert_exception('insertshops',$ex->getMessage());
            
                return  back()->with('error',$ex->getMessage());
            }
          return back()->with('success',' Your Record insert successfully');
        }

        public function updateShop(Request $request)
        {
            $this->validate($request, [
                
                'shop_name'=>'required',
                'shop_services'=>'required',
                'shop_phone_number'=>'required',
                'shop_email_id'=>'required',
                'shop_address'=>'required',
                'shop_map_details'=>'required',
                'shop_timing'=>'required',
                'shop_home_delivery_available'=>'required',
                'shop_delivery_partners'=>'required'
            ]);
            try
         {   

           $updateshoplist =['shop_name'=>$request->shop_name,'shop_services'=>$request->shop_services,
            'shop_phone_number'=>$request->shop_phone_number,'shop_email_id'=>$request->shop_email_id,'shop_address'=>$request->shop_address,
            'shop_map_details'=>$request->shop_map_details,'shop_timing'=>$request->shop_timing,'shop_home_delivery_available'=>$request->shop_home_delivery_available,
            'shop_delivery_partners'=>$request->shop_delivery_partners];
                     
                      $filename='';
                      if($request->hasFile('file')) {
                         $destination =("/assets/images".$filename);
                             if(File::exists($destination))
                             {
                               File::delete($destination);
                             }
                             $file = $request->file('file');
                             $filename=time().'.'.$file->getClientOriginalExtension();
                             $file->move('assets/images',$filename);
                             $request->filename=$filename;
                             $updateshoplist['shop_photo']=$request->filename;
                      }
                     

                     
        $shopupdate=\App\Helpers\Helper::connectionScheme('shop_details')->where('shop_details.shop_id',$request->shop_id)->update($updateshoplist);
                      
          }
          catch(\Exception $ex)
          {
              \App\Helpers\Helper::insert_exception('updateshop',$ex->getMessage());
               
               return  back()->with('error',$ex->getMessage());
          }
          return back()->with('success',' Your Record Update successfully');
        }
       

        public function insertHotels(Request $request)
    {
       

        $this->validate($request, [
                'file'=>'required',
                'hotel_name'=>'required',
                'hotel_services'=>'required',
                'hotel_phone_number'=>'required',
                'hotel_email_id'=>'required',
                'hotel_address'=>'required',
                'hotel_map_details'=>'required',
                'hotel_timing'=>'required',
                'hotel_home_delivery_available'=>'required',
                'hotel_delivery_partners'=>'required',
                'getvillagesids'=>'required'

          ]);
      try
        {
            $filename='';
            if($request->hasfile('file')) {
            $validatedDate=$request->validate(['file' => 'required|file|mimes:jpg,jpeg,svg,png|max:512']);
            $file=$request->file;
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('assets/images',$filename);
            }
                 $lastInsertId =\App\Helpers\Helper::connectionScheme('hotel_details')->insert([
                     
                     'hotel_photo'=>$filename,
                     'hotel_name' =>$request->hotel_name,
                     'hotel_services' =>$request->hotel_services,
                     'hotel_phone_number' =>$request->hotel_phone_number,
                     'hotel_email_id'=>$request->hotel_email_id,
                     'hotel_address'=>$request->hotel_address,
                     'hotel_map_details' =>$request->hotel_map_details,
                     'hotel_timing'=>$request->hotel_timing,
                     'hotel_home_delivery_available'=>$request->hotel_home_delivery_available,
                     'hotel_delivery_partners'=>$request->hotel_delivery_partners,
                     'village_id'=>$request->getvillagesids
                 ]);

            }
            catch(\Exception $ex)
            {
                \App\Helpers\Helper::insert_exception('inserthotel',$ex->getMessage());
            
                return  back()->with('error',$ex->getMessage());
            }
          return back()->with('success',' Your Record insert successfully');
        }
        public function impPlace()
        {
            $getvillage_ids=array();
            $getimpplaces=array();
            $getimpplaces=\App\Helpers\Helper::connectionScheme('village_important_places')
            ->select('village_important_places.id','village_important_places.imp_place_name','village_important_places.imp_place_details','village_important_places.imp_place_photo',
            'village_important_places.imp_place_map_details','village_important_places.imp_place_address')
            ->get();
            $getvillage_ids=\App\Helpers\Helper::connectionScheme('village_details')
            ->select('village_details.village_image','village_details.id','village_details.village_name')
            ->get();

            return view('imp_details',['getimpplaces'=>$getimpplaces,'getvillage_ids'=>$getvillage_ids]);
        }
        public function editimpplaces($id='')
        {
            $editimpplaces=array();
            $editimpplaces=\App\Helpers\Helper::connectionScheme('village_important_places')
            ->select('village_important_places.id','village_important_places.imp_place_name','village_important_places.imp_place_details','village_important_places.imp_place_photo',
            'village_important_places.imp_place_map_details','village_important_places.imp_place_address')
            ->where('village_important_places.id',$id)
            ->first();
            

            return view('edit_impplaces',['editimpplaces'=>$editimpplaces]);
        }

           public function insertimpdetails(Request $request)
    {
       

            $this->validate($request, [
                'file'=>'required',
                'imp_place_name'=>'required',
                'imp_place_details'=>'required',
                'imp_place_map_details'=>'required',
                'imp_place_address'=>'required',
                'getvillage_ids'=>'required'
            ]);
      try
        {
            $filename='';
            if($request->hasfile('file')) {
            $validatedDate=$request->validate(['file' => 'required|file|mimes:jpg,jpeg,svg,png|max:512']);
            $file=$request->file;
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('assets/images',$filename);
            }


                 $lastInsertId =\App\Helpers\Helper::connectionScheme('village_important_places')->insert([
                    
                     'imp_place_photo'=>$filename,
                     'imp_place_name' =>$request->imp_place_name,
                     'imp_place_details' =>$request->imp_place_details,
                     'imp_place_map_details' =>$request->imp_place_map_details,
                     'imp_place_address'=>$request->imp_place_address,
                     'village_id'=>$request->getvillage_ids
                 ]);

            }
            catch(\Exception $ex)
            {
                \App\Helpers\Helper::insert_exception('insertimpdetails',$ex->getMessage());
            
                return  back()->with('error',$ex->getMessage());
            }
          return back()->with('success',' Your Record insert successfully');
        }

   public function updateplace(Request $request) 
  {  
     $this->validate($request, [
        
        'place_name'=>'required',
        'place_details'=>'required',
        'place_map_details'=>'required',
        'place_address'=>'required'
    ]);
   
      try
        { 
            $updateplace =['place_name'=>$request->place_name,'place_details'=>$request->place_details,'place_map_details'=>$request->place_map_details,
            'place_address'=>$request->place_address];
                  
                   $filename='';
                  if($request->hasFile('file'))
                  {
                     $destination =("/assets/images".$filename);
                         if(File::exists($destination))
                         {
                           File::delete($destination);
                         }
                         $file = $request->file('file');
                         $filename=time().'.'.$file->getClientOriginalExtension();
                         $file->move('assets/images',$filename);
                         $request->filename=$filename;
                         $updateplace['place_photo']=$request->filename;
                  }
          $placeupdate =\App\Helpers\Helper::connectionScheme('village_places_to_visit')->where('village_places_to_visit.id',$request->id)
          ->update($updateplace);
    
            }
            catch(\Exception $ex)
            {
                \App\Helpers\Helper::insert_exception('updateplace',$ex->getMessage());
                 return  back()->with('error',$ex->getMessage());
            }

              return back()->with('success',' Your Record updated successfully');
        }  
      
      
      public function logout_page(Request $request)
      {
           Auth::logout();
          return redirect('/home');
      }
      public function updatehotel(Request $request) 
  {  
     $this->validate($request, [
        
        'hotel_name'=>'required',
        'hotel_services'=>'required',
        'hotel_phone_number'=>'required',
        'hotel_email_id'=>'required',
        'hotel_address'=>'required',
        'hotel_map_details'=>'required',
        'hotel_timing'=>'required',
        'hotel_home_delivery_available'=>'required',
        'hotel_delivery_partners'=>'required'
       

     ]);
   
      try
        { 

        $updatearray =['hotel_name'=>$request->hotel_name,'hotel_services'=>$request->hotel_services,'hotel_phone_number'=>$request->hotel_phone_number,
        'hotel_email_id'=>$request->hotel_email_id,'hotel_address'=>$request->hotel_address,'hotel_map_details'=>$request->hotel_map_details,'hotel_timing'=>$request->hotel_timing,
        'hotel_home_delivery_available'=>$request->hotel_home_delivery_available,'hotel_delivery_partners'=>$request->hotel_delivery_partners];
         
                  $filename='';
                  if($request->hasFile('file'))
                  {
                     $destination =("/assets/images".$filename);
                         if(File::exists($destination))
                         {
                           File::delete($destination);
                         }
                         $file = $request->file('file');
                         $filename=time().'.'.$file->getClientOriginalExtension();
                         $file->move('assets/images',$filename);
                         $request->filename=$filename;
                        $updatearray['hotel_photo']=$request->filename;
                  }
                  
                 
    $updatehotel =\App\Helpers\Helper::connectionScheme('hotel_details')->where('hotel_details.hotel_id',$request->hotel_id)->update($updatearray);
    
            }
            catch(\Exception $ex)
            {
                \App\Helpers\Helper::insert_exception('updatehotel',$ex->getMessage());
                 return  back()->with('error',$ex->getMessage());
            }

              return back()->with('success',' Your Record updated successfully');
               
      }  
      public function updateImpplace(Request $request) 
  {  

    $this->validate($request, [
        
        'imp_place_name'=>'required',
        'imp_place_details'=>'required',
        'imp_place_map_details'=>'required',
        'imp_place_address'=>'required'
        
    ]);
   
      try
        { 
         
         $updateimpplace =['imp_place_name'=>$request->imp_place_name,'imp_place_details'=>$request->imp_place_details,'imp_place_map_details'=>$request->imp_place_map_details,
         'imp_place_address'=>$request->imp_place_address];
                  
                   $filename='';
                  if($request->hasFile('file'))
                  {
                     $destination =("/assets/images".$filename);
                         if(File::exists($destination))
                         {
                           File::delete($destination);
                         }
                         $file = $request->file('file');
                         $filename=time().'.'.$file->getClientOriginalExtension();
                         $file->move('assets/images',$filename);
                         $request->filename=$filename;
                        $updateimpplace['imp_place_photo']=$request->filename;
                  }
                $impplaceupdate =\App\Helpers\Helper::connectionScheme('village_important_places')->where('id',$request->id)
                ->update($updateimpplace);
    
            }
             catch(\Exception $ex)
             {
                \App\Helpers\Helper::insert_exception('updateimpplace',$ex->getMessage());
                 return  back()->with('error',$ex->getMessage());
             }

              return back()->with('success',' Your Record updated successfully');
         }  
}