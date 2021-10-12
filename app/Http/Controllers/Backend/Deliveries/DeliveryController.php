<?php

namespace App\Http\Controllers\Backend\Deliveries;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Feeship;
use App\Models\Ward;
use Illuminate\Http\Request;


class DeliveryController extends Controller
{

    public function select_feeship(){
        $feeship = Feeship::orderBy('id', 'DESC')->get();
        $output = "";
        $output .= '<div class="card-body p-0">
                        <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Tên tỉnh thành phố
                                </th>

                                <th>
                                    Tên quận huyện
                                </th>

                                <th>
                                    Tên xã phường
                                </th>

                                <th>
                                    Phí ship
                                </th>

                                <th class="text-right">
                                    Hành động
                                </th>
                            </tr>
                            </thead>
                             <tbody>';
        foreach($feeship as $key => $fee){
            $output .= '
                 <tr>
                                    <td>
                                        #
                                    </td>

                                    <td>
                                        '.$fee->city->name.'
                                    </td>

                                    <td>
                                        '.$fee->district->name.'                                    </td>

                                    <td>
                                        '.$fee->wards->name.'
                                    </td>

                                    <td contenteditable data-feeship_id='.$fee->id.' class="shippng_fee_edit">
                                        '.number_format($fee->shipping_fee,0,',','.').'
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>

                                    </td>

                                </tr>
            ';
        }
        $output .= '
            </tbody>
            </table>
            </div>
        ';
        echo $output;
    }
    public function update_feeship(Request $request){
        $data = $request->all();
        $fee_ship = Feeship::find($data['feeship_id']);

        $fee_value = rtrim($data['fee_Value'],'.');
        $fee_ship->shipping_fee = $fee_value;
        $fee_ship->save();

    }
    public function create(){
        $city = City::orderBy('matp', 'ASC')->get();
        return view('admin.deliveries.create', compact('city'));
    }
    public function store(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action'] == "inputCity"){
                $districts = District::where('matp', $data['ma_id'])->orderBy('id', 'ASC')->get();

                    $output .= '<option>--Chọn quận huyện--</option>';
                foreach ($districts as $district){
                    $output .= '<option value="'.$district->id.'">'.$district->name.'</option>';
                }

            }else{
                $wards = Ward::where('maqh', $data['ma_id'])->orderBy('id', 'ASC')->get();
                    $output .= '<option>--Chọn xã phường--</option>';
                foreach ($wards as $ward){
                    $output .= '<option value="'.$ward->id.'">'.$ward->name.'</option>';
                }
            }

        }
        echo $output;


    }
    public function insert(Request $request){
        $data = $request->all();
        $fee_ship = new Feeship();
        $fee_ship->code_city = $data['inputCity'];
        $fee_ship->code_district = $data['inputDistrict'];
        $fee_ship->code_wards = $data['inputWards'];
        $fee_ship->shipping_fee = $data['inputFeeShip'];
        $fee_ship->save();
        if($fee_ship){
            return back()->with('success', 'Thêm vận chuyển thành công');
        }else{
            return back()->with('error', 'Thêm vận chuyển thất bại');
        }
    }
}
