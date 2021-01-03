<?php

namespace App\Http\Controllers\mobileAppController;

use App\Http\Controllers\Controller;
use App\Models\Battery;
use App\Models\Warranty;
use App\Models\CarProperty;
use App\Models\CarType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Market;

class mobileAppController extends Controller
{
    public function initData(Request $request){

            $tempBatteries = Battery::all();
            $carProperties = CarProperty::all();
            $carTypes = CarType::all();
            $markets = Market::all();
            $batteries=[];
            foreach($tempBatteries as $battrey){
                $battrey->terminal=$battrey->terminal_id;
                $battrey->manufacturing_country=$battrey->manufacturing_country_id;
                $batteries[]=$battrey;
                $battrey->image=Storage::disk('public')->url($battrey->image);
                $battrey->front_image=Storage::disk('public')->url($battrey->front_image);
                $battrey->serial_number_image=Storage::disk('public')->url($battrey->serial_number_image);
                // $batteries[]=$battrey;
                // array(
                //     $battrey->all(),
                //     'image_path'=>Storage::disk('public')->url($battrey->image),
                //     'front_image_path'=>Storage::disk('public')->url($battrey->front_image),
                //     'serial_number_image_path'=>Storage::disk('public')->url($battrey->serial_number_image),
                // );
            }
            return response()->json([
                "batteries"=>$batteries,
                "carProperties"=>$carProperties,
                "carTypes"=>$carTypes,
                "markets"=>$markets,
            ],200);

    }

    public function getWarrenty(Request $request){
        

        $validator = Validator::make($request->all(), [
            'code' => 'required|exists:warranties,warranty_code'
        ]); 
        if ($validator->fails()) {
            return response()->json([
                'messageEn'=>'code not found',
                'messageAr'=>'كود غير موجود'
            ],400);
        }
        $code = $request->input('code');
        $tempWarrenty = Warranty::where('warranty_code', $code)->first();
        if(empty($tempWarrenty))
            return response()->json([
                'messageEn'=>'No Data',
                'messageAr'=>'لا يوجد كفالات بهذا الكود'
            ],404);
        // $warrenties=[];
        // foreach($tempWarrenties as $warrenty){
            $tempWarrenty->battery=$tempWarrenty->battery_model_id;
            $tempWarrenty->car_type=$tempWarrenty->car_type_id;
            $tempWarrenty->market=$tempWarrenty->market_id;
            $tempWarrenty->car_property=$tempWarrenty->car_property_id;            
            $tempWarrenty->car_number_image=Storage::disk('public')->url($tempWarrenty->car_number_image);
            $tempWarrenty->battery_front_image=Storage::disk('public')->url($tempWarrenty->battery_front_image);
            $tempWarrenty->fixed_battery_image=Storage::disk('public')->url($tempWarrenty->fixed_battery_image);
        // }
        return response()->json([
            "data"=>$tempWarrenty
        ],200);
    }
}
