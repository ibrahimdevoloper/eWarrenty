<?php

namespace App\Http\Controllers\Warranty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warranty;
use App\Models\WarrantyDuration;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Validator;

class WarrantyController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index($warrentyCode)
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }


    //todo: don't forget to unit test
    private function getUniqueCode(int $numberOfTries){
        $newWarrantyCode=substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,7);
        $tempWarrenty = Warranty::where('warranty_code', $newWarrantyCode)->first();
        $numberOfTries =$numberOfTries -1;
        if(empty($tempWarrenty))
            return $newWarrantyCode;
        else if($numberOfTries>=0)
            return $this->getUniqueCode($numberOfTries);
        else
            return 0;
    
    
    }




    private $storageLink="/storage/";
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            // 'code' => 'required'
            'car_number_image' => 'required|image:jpeg,png,jpg,gif,svg',
            'battery_front_image' => 'required|image:jpeg,png,jpg,gif,svg',
            'fixed_battery_image' => 'required|image:jpeg,png,jpg,gif,svg',
            'battery_model_id'=> 'required|exists:batteries,id',
            'car_property_id'=> 'required|exists:car_properties,id',
            'car_type_id'=> 'required|exists:car_types,id',
            "customer_phone_number",
            "customer_country"=> 'required',
            "customer_address"=> 'required',
            "customer_email"=>'required|email',
            "customer_name"=> 'required',
            "notes",
            'market_id'=> 'required|exists:markets,id',
            'battery_serial_number'=> 'required',
            //todo: make sure this is working 
            'bought_date'=> 'required|date',
            'car_number'=> 'required',
        ]);

        if($validator->fails()){

            return response()->json([
                'messageEn'=>'error with your info',
                'messageAr'=>'خطأ بمعلوماتك'
            ],400);

        }
        $newWarrantyCode= $this->getUniqueCode(100);
        if($newWarrantyCode){
            $newWarranty = new Warranty;

            $newWarranty->warranty_code =$newWarrantyCode;

            $newWarranty->battery_serial_number=$request->input('battery_serial_number');
            $newWarranty->bought_date=$request->input('bought_date');
            $newWarranty->car_number=$request->input('car_number');

            $newWarranty->battery_model_id=$request->input('battery_model_id');
            $newWarranty->car_property_id=$request->input('car_property_id');
            $newWarranty->car_type_id=$request->input('car_type_id');
            $newWarranty->market_id=$request->input('market_id');

            $newWarranty->customer_name=$request->input('customer_name');
            $newWarranty->customer_email=$request->input('customer_email');
            $newWarranty->customer_address=$request->input('customer_address');
            $newWarranty->customer_country=$request->input('customer_country');
            $newWarranty->customer_phone_number=$request->input('customer_phone_number');
            $newWarranty->notes=$request->input('notes');

            $carNumberFolder = 'images/carNumbers';
            $image = $request->file('car_number_image');
            $carNumberPath = $image->store($carNumberFolder, 'public');
            $newWarranty->car_number_image=$carNumberPath;

            $batteryFrontsFolder = 'images/batteryFronts';
            $image = $request->file('battery_front_image');
            $batteryFrontsPath = $image->store($batteryFrontsFolder, 'public');
            $newWarranty->battery_front_image=$batteryFrontsPath;

            $fixedBatteryFolder = 'images/fixedBattery';
            $image = $request->file('fixed_battery_image');
            $fixedBatteryPath = $image->store($fixedBatteryFolder, 'public');
            $newWarranty->fixed_battery_image=$fixedBatteryPath;

            $newWarranty->save();

            
            // $warrenty = Warranty::create($newWarranty);
            $warrenty = Warranty::where('warranty_code',$newWarrantyCode)->first();
            $warrantyDuration = WarrantyDuration::where('battery_id',$warrenty->battery_model_id)->where('car_property_id',$warrenty->car_property_id)->first();
            // echo $warrantyDuration->id;
            $warrenty->warranty_duration=$warrantyDuration->id;

            $warrenty->battery=$warrenty->battery_model_id;
            $warrenty->car_type=$warrenty->car_type_id;
            $warrenty->market=$warrenty->market_id;
            $warrenty->car_property=$warrenty->car_property_id;            

            // $warrenty->car_number_image=Storage::disk('public')->url($warrenty->car_number_image);
            // $warrenty->battery_front_image=Storage::disk('public')->url($warrenty->battery_front_image);
            // $warrenty->fixed_battery_image=Storage::disk('public')->url($warrenty->fixed_battery_image);

            $warrenty->car_number_image=$this->storageLink.$warrenty->car_number_image;
            $warrenty->battery_front_image=$this->storageLink.$warrenty->battery_front_image;
            $warrenty->fixed_battery_image=$this->storageLink.$warrenty->fixed_battery_image;

            // if(empty($request->input('notes')))
            //     echo "'(notes');";

            // echo $newWarranty->battery_serial_number;
            return response()->json([
                'data'=>$warrenty,
                'messageAr'=>'تمت بنجاح'
            ],200);
        }
        else
            return response()->json([
                'messageEn'=>'internal error please try again',
                'messageAr'=>'خطأ داخلي رجاء أعد المحاولة مرة أخرى'
            ],502);


    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {

    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
