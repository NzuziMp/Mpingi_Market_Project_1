<?php

namespace App\Http\Controllers\admindashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IndustriesAndManufacture;
use App\Models\IndustriesAndManufactureSubCategories;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class IndustriesAndManufactureController extends Controller
{
    public function IndustriesAndManufacturers(){
        return view('admin.industries_and_Manufacturers')->render();

    }


    //get all IndustriesAndManufacturers
    public function FetchallIndustriesAndManufacturers(Request $request){

        if ($request->ajax()) {
            $data = DB::table('industries_and_manufactures')
            ->select(
                'id',
                'category_name'
            )
            ->get();

            return Datatables::of($data)

            ->addColumn('category_name',function($data){

                $html = '';
                        $html = '<a href="'. route('getindustriesandmanufacturesid',['id'=> encrypt($data->id)]).'" style="text-decoration:none;">'.$data->category_name.'</a>';
                        return $html;
                    })
             ->addColumn('action', function($data) {
                    return '<div class="d-flex"><div class="flex-1"><button type="button" class="btn btn-outline-primary btn-sm btn_editindustriesandManufactures"
                    data-bs-toggle="modal" data-bs-target="#editindustriesandmanufacturesModal"
                     data-gcat="'.$data->category_name.'"
                     data-glid="'.$data->id.'"
                     ><i class="fa fa-edit"></i></button></div> | <div class="flex-1"><button type="button" class="btn btn-outline-danger btn-sm btn-deleteIndustriesandManufactures" data-id="'.$data->id.'"><i class="fa fa-trash"></i></button></div></div>';
                 })
            ->rawColumns(['category_name','action'])
            ->make(true);
        }

            return view('admin.industries_and_Manufacturers');

    }

     //end get all IndustriesAndManufacturers

    //add IndustriesAndManufacturers
    public function AddIndustriesAndManufacturers(Request $request){

        $validator = Validator::make($request->all(), [
            'category_name' => 'required|unique:industries_and_manufactures,category_name|regex:/^([a-zA-Z 0-9\s\-\+\/\_\&\.\~\=\´\`\(\,)]*)$/',

        ],[
            'category_name.required' => 'Please input Category Name',
         ]);

         if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $indusAndManu = new IndustriesAndManufacture;
        $indusAndManu->category_name = Str::ucfirst($request->category_name);
        $indusAndManu->save();
        return response()->json(['status'=>200]);

    }
     //end add IndustriesAndManufacturers

     //update IndustriesAndManufacturers
     public function UpdateIndustriesAndManufacturers(Request $request){

            $validator = Validator::make($request->all(), [
                'category_name' => 'required|regex:/^([a-zA-Z 0-9\s\-\+\/\_\&\.\~\=\´\`\(\,)]*)$/',

            ],[
                'category_name.required' => 'Please input Category Name',
            ]);


           if ($validator->fails()) {
                    return response()->json(['errors2' => $validator->errors()]);
                }

                $id = IndustriesAndManufacture::find($request->id);
                $gData = [
                    'category_name'=> Str::ucfirst($request->category_name),

                ];
            $id->update($gData);
                return response()->json([
                'status2' => 200,
            ]);

        }

    //end update IndustriesAndManufacturers

    //delete IndustriesAndManufacturers
    public function DeleteIndustriesAndManufacturers(Request $request) {
        $id = $request->id;
        IndustriesAndManufacture::find($id)->delete();
        return response()->json(['status3'=> 200]);

    }
    //end delete IndustriesAndManufacturers

    //sub id IndustriesAndManufacturers
    public function IndustriesAndManufacturersId(Request $request, $id){
        $subId = IndustriesAndManufacture::where('id', decrypt($id))->first();
        $fetchallsSubIndusandManufac = IndustriesAndManufactureSubCategories::where('indusandmanufac_id', '=', decrypt($id))
        ->orderBy('id', 'DESC')
        ->get();

        return view('admin.sub_industries_and_Manufacturers', compact('subId','fetchallsSubIndusandManufac'))->render();

    }

     //end sub id IndustriesAndManufacturers

    // /////////////////////////////sub ///////////////////////////////


    public function SubIndustriesAndManufacturers(){
        return view('admin.sub_industries_and_Manufacturers')->render();

    }



   //add sub IndustriesAndManufacturers
    public function AddSubIndustriesAndManufacturers(Request $request){

        $validator = Validator::make($request->all(), [
            'sub_category_name' => 'required|regex:/^([a-zA-Z 0-9\s\-\+\/\_\&\.\~\=\´\`\(\,)]*)$/',

        ],[
            'sub_category_name.required' => 'Please input Sub Category Name',
         ]);

         if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $subindusAndManu = new IndustriesAndManufactureSubCategories;
        $subindusAndManu->sub_category_name = Str::ucfirst($request->sub_category_name);
        $subindusAndManu->indusandmanufac_id = $request->indusandmanufac_id;
        $subindusAndManu->save();
        return response()->json(['status'=>200]);

    }
     //end add sub IndustriesAndManufacturers

          //update sub IndustriesAndManufacturers
          public function UpdateSubIndustriesAndManufacturers(Request $request){

            $validator = Validator::make($request->all(), [
                'sub_category_name' => 'required|regex:/^([a-zA-Z 0-9\s\-\+\/\_\&\.\~\=\´\`\(\,)]*)$/',

            ],[
                'sub_category_name.required' => 'Please input Sub Category Name',
            ]);


           if ($validator->fails()) {
                    return response()->json(['errors2' => $validator->errors()]);
                }

                $id = IndustriesAndManufactureSubCategories::find($request->id);
                $gData = [
                    'sub_category_name'=> Str::ucfirst($request->sub_category_name),

                ];
            $id->update($gData);
                return response()->json([
                'status2' => 200,
            ]);

        }

    //end update sub IndustriesAndManufacturers

        //delete sub IndustriesAndManufacturers
        public function DeleteSubIndustriesAndManufacturers(Request $request) {
            $id = $request->id;
            IndustriesAndManufactureSubCategories::find($id)->delete();
            return response()->json(['status3'=> 200]);

        }
        //end delete sub IndustriesAndManufacturers



}
