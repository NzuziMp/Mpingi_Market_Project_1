<?php

namespace App\Http\Controllers\admindashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function NewProducts(){
        return view('admin.new_products');
    }

      //get all New Products
      public function FetchAllProducts(Request $request){

        if ($request->ajax()) {
            $data = DB::table('products')
            ->select(
                'id',
                'product_image',
                'product_name',
                'product_description',
                'product_price',
                'original_price',
                'quantity',
                'product_type',
                'color',
                'posted_on',
            )
            ->get();

            return Datatables::of($data)

            ->addColumn('product_image', function($data) {
                return $data->product_image ? '<center><img src="/storage/uploads/'.$data->product_image.'" border="0" width="50" height="50" class="img-rounded" align="center" /></center>' : '<center><img src="/storage/No_Image_Available.jpg" width="50" height="50"></center>';
               })

             ->addColumn('action', function($data) {
                    return '<div class="d-flex"><div class="flex-1"><button type="button" class="btn btn-outline-primary btn-sm btn_editindustriesandManufactures"
                    data-bs-toggle="modal" data-bs-target="#editindustriesandmanufacturesModal"
                     data-gcat="'.$data->product_image.'"
                     data-glid="'.$data->id.'"
                     ><i class="fa fa-edit"></i></button></div> | <div class="flex-1"><button type="button" class="btn btn-outline-danger btn-sm btn-deleteIndustriesandManufactures" data-id="'.$data->id.'"><i class="fa fa-trash"></i></button></div></div>';
                 })
            ->rawColumns(['product_image', 'action'])
            ->make(true);
        }

            return view('admin.new_products');

    }

     //end get all New Products
}
