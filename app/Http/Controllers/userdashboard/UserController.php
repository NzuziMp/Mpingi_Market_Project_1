<?php

namespace App\Http\Controllers\userdashboard;
use Hash;
use Session;
use App\Models\Day;
use App\Models\City;
use App\Models\Shop;
use App\Models\User;
use App\Models\Year;
use App\Models\Month;
use App\Models\State;
use App\Models\Country;
use App\Models\Product;
use App\Models\tbl_imgs;
use App\Models\t_shoptype;
use App\Models\Tbl_article;
use App\Models\tbl_industry_item;
use App\Models\tbl_services;
use App\Models\tbl_chatbox;
use App\Models\tbl_industry;
use App\Models\tbl_userlink;
use App\Models\tbl_sub_industry;
use App\Models\tbl_service_items;
use Illuminate\Support\Str;
use App\Models\AvailableJob;
use App\Models\tbl_job_category;
use App\Models\Tbl_category;
use App\Models\tbl_sub_services;
use Illuminate\Http\Request;
use App\Models\t_imageupload;
use Illuminate\Support\Carbon;
use App\Models\Tbl_sub_category;
use App\Models\Tbl_products_item;
use App\Mail\GmailRecoverPassword;
use App\Models\tbl_mping_business;
use App\Models\tbl_mping_purchase;
use App\Models\tbl_sub_service_ones;
use App\Models\Tbl_sub_product;
use App\Models\tbl_job_item;
use App\Models\tbl_chat;
use App\Models\tbl_messages;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\IndustriesAndManufacture;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use App\Models\IndustriesAndManufactureSubCategories;
use DataTables;


class UserController extends Controller
{

    // view post
    public function ViewPost(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();
        // $pagination = Tbl_products_item::latest()->paginate(5);

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.product_id',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
                'tbl_product_items.created_at',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();


        $ProductItems = DB::table('tbl_product_items')
            ->select('*', 'users.product_duration as PDurations', 'tbl_product_items.id as ProductItem_id', 'tbl_product_items.item_name', 'tbl_product_items.created_at', 'tbl_images.product_item', 'tbl_images.id as ImageIDS', 'users.product_duration')
            ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            //  ->leftjoin('tbl_imgs','tbl_imgs.product_item_id','=','tbl_product_items.id')
            ->where(['tbl_product_items.user_id' => $user, 'tbl_product_items.expire_status' => 1])
            ->get();


        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $fetchImage = DB::table('tbl_images')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->where('user_id', $user)
            ->select('tbl_images.id', 'tbl_imgs.image_name', 'tbl_images.product_item')->get();

        //count free,paid, expired products
        $freeproducts = Tbl_products_item::select(DB::raw("(COUNT(*)) as countfree"))
            ->where(['user_id' => $user, 'ad_type' => '0', 'expire_status' => '1'])
            ->get();

        $paidproducts = Tbl_products_item::select(DB::raw("(COUNT(*)) as countpaid"))
            ->where(['user_id' => $user, 'ad_type' => '1', 'expire_status' => '1'])
            ->get();

        $expiredproducts = Tbl_products_item::select(DB::raw("(COUNT(*)) as countexpired"))
            ->where(['user_id' => $user, 'expire_status' => '0'])
            ->get();

        return view('user.mpingiusers.view_post', ['countries' => $countries], compact('getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'ProductItems', 'fetchImage', 'freeproducts', 'paidproducts', 'expiredproducts'))->render();

    }

    // datatable for product items

    public function FetchAllProductsitems(Request $request)
    {

        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        if ($request->ajax()) {
            $data = Tbl_products_item::query()
                ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
                        tbl_images.id,
                        users.product_duration as PDurations,
                        tbl_product_items.id as ProductItem_id,
                        tbl_product_items.currency,
                        tbl_product_items.post_date_of_item,
                        tbl_product_items.user_id as userid,
                        tbl_product_items.category_id,
                        tbl_product_items.sub_category_id,
                        tbl_product_items.article_id,
                        tbl_product_items.product_id,
                        tbl_product_items.sub_product_id,
                        tbl_product_items.item_name,
                        tbl_product_items.product_type,
                        tbl_product_items.brand_name,
                        tbl_product_items.brand_id,
                        tbl_product_items.pieces,
                        tbl_product_items.price,
                        tbl_product_items.old_price,
                        tbl_product_items.color_id,
                        tbl_product_items.sub_color_id,
                        tbl_product_items.price_range_start,
                        tbl_product_items.price_range_end,
                        tbl_product_items.product_color,
                        tbl_product_items.place_of_origin,
                        tbl_product_items.city,
                        tbl_product_items.state_id,
                        tbl_product_items.item_descriptions,
                        tbl_product_items.item_images,
                        tbl_product_items.supplier_name,
                        tbl_product_items.supplier_region,
                        tbl_product_items.type,
                        tbl_product_items.post_expiry_date,
                        tbl_product_items.post_delete_date,
                        tbl_product_items.post_date_count,
                        tbl_product_items.post_expiry_count,
                        tbl_product_items.post_delete_count,
                        tbl_product_items.expire_status,
                        tbl_product_items.ad_type,
                        tbl_product_items.views,
                        tbl_product_items.shipping,
                        tbl_product_items.shipping_price,
                        tbl_product_items.price_id,
                        tbl_product_items.rate,
                        tbl_product_items.total_rate,
                        tbl_product_items.hits,
                        tbl_product_items.payment,
                        tbl_product_items.weight,
                        tbl_product_items.volume,
                        tbl_product_items.delivery,
                        tbl_product_items.day_return,
                        tbl_product_items.negotiable,
                        tbl_product_items.currency,
                        tbl_product_items.category,
                        tbl_product_items.product_web_name,
                        tbl_product_items.product_web_link,
                        tbl_product_items.disponibility,
                        tbl_product_items.created_at,
                        tbl_product_items.remainingdays_status,
                        tbl_product_items.expireddate_remain,
                        tbl_images.id as ImageIDS,
                        tbl_imgs.image_name as Images,
                        users.product_duration,
                        tbl_imgs.image_name,
                        tbl_images.product_item

                    ')
                ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
                ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
                ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
                ->where(['tbl_product_items.user_id' => $user, 'tbl_product_items.expire_status' => 1])
                ->groupBy('tbl_imgs.upload_id')
                ->get();

            foreach ($data as $datas) {


                Tbl_products_item::where([
                    ['user_id', $user],
                    ['created_at', '<', Carbon::now()->subDay(31)],
                    ['id', $datas->ProductItem_id],
                ])->update(['expire_status' => '0']); //expire_status is update to 0 if met 31 days


                Tbl_products_item::where([
                    ['user_id', $user],
                    ['created_at', '<', Carbon::now()->subDay(76)],
                    ['id', $datas->ProductItem_id],
                ])->delete(); //[product post is delete if met 76 days

            }



            return Datatables::of($data)

                ->addColumn('image_name', function ($data) {

                    $slide = "";
                    $image = "";
                    $view = "";
                    $adtype = "";
                    $deleteitem = "";
                    $res = "";
                    if ($data->ImageIDS != "") {
                        $slide = 'active';
                    } else {
                        $slide = '';
                    }

                    $image = $data->Images ? '<img src="/storage/assets/uploads/' . $data->Images . '" class="img-thumbnail"
                class="img-thumbnail" height="50%">' : '<img src="/storage/assets/images/avatar_nzuzi_default.png" class="img-thumbnail"
                class="img-thumbnail" height="50%">';
                    $users = Auth::user()->id ?? 'session expired';
                    $countImage = DB::table('tbl_imgs')->where('upload_id', $data->ImageIDS)->count();
                    if ($data->item_images == 0) {
                        $view = '<a href="' . route('user.uploadimageProductItem', ['id' => encrypt($data->ProductItem_id)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><i
                        class="fa fa-gift"></i>
                       Add new photo (0)
                </a>';
                    } else {
                        $view = '<a href="' . route('user.viewphotos', ['upload_id' => encrypt($data->ImageIDS)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><i
                            class="fas fa-image"></i>
                            view photo (' . $countImage . ')
                        </a>';
                    }

                    if ($data->ad_type == 1) {
                        $adtype = "Paid Product";
                    } else {
                        $adtype = "Free Product";
                    }

                    $available = "";
                    if ($data->disponibility == 0) {
                        $available = '<button type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Click here to change the disponibility of product"
                            class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_x" disabled="disabled">
                            <i class="far fa-money-bill-alt"></i> Sold </button>';
                    } else {
                        $available = '<button type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Click here to change the disponibility of product"
                           class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_x btn-changestatus" data-cid="' . $data->ProductItem_id . '">
                           <i class="far fa-money-bill-alt"></i> Available </button>';
                    }
                    $html = "";
                    $html = '<div class="py-4 row">
                     <div class="col-md-7">
                        <div class="row">

                          <div class="col-md-5">
                               <center>
                               <div style="border: 1px solid #ccc;height:auto;">
                                   <p class="mt-2 PClass">
                                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                           <center>
                                               <div class="carousel-inner" >
                                                     <div class="carousel-item ' . $slide . '">
                                                     ' . $image . '
                                                     </div>
                                                 </div>
                                           </center>
                                       </div>
                                    ' . $view . '
                                   </p>
                               </div>
                           </center>
                         </div>

                         <div class="col-md-7">
                            <div class="card-body">
                                <h6 class="card-title fw-bold">' . Str::title($data->item_name) . '</h6>
                                <h5 class="btn-getprice card-text fw-bolder" data-bs-toggle="modal" data-bs-target="#updateprice_Modal"
                                  data-pid="' . encrypt($data->ProductItem_id) . '"
                                  data-cur="' . $data->currency . '"
                                  data-price="' . $data->price . '"
                                  data-uuser="' . $data->userid . '"
                                  ><span style="color: #ff7519;">' . $data->currency . ' ' . number_format($data->price, 2) . '
                                        </span>
                                    <br><span class="strikeCss" style="font-weight: bold;"><strike> ' . $data->currency . ' ' . number_format($data->old_price, 2) . '</strike></span>
                                </h5>
                                <span class="d-flex"> <span class="hrefCsslink_x"
                                        style="font-weight: bold">Color:</span>&nbsp;<span
                                        class="py-2mt-1" style="
                                         display: inline-block;
                                        font-size: 12px;
                                        font-weight: bold;
                                        line-height: 15px;
                                        color: #9f9f9f;
                                        width: 20px;
                                        height: 15px;
                                        background-color: ' . $data->product_color . ';
                                        text-transform: uppercase;
                                        padding-right: 16px;
                                        padding-left: 16px;
                                        padding-top: 10px;
                                        padding-bottom: 10px;
                                        -webkit-border-radius: 6px;
                                        -moz-border-radius: 6px;
                                        border-radius: 6px;
                                        margin-bottom: 2px;
                                        box-shadow: 1px 1px #888888;
                                        "></span></span>
                                <span class="mb-2 d-flex hrefCsslink_x"><span
                                        style="font-weight: bold">Product&nbsp;type:</span>&nbsp;
                                        ' . $data->product_type . '</span>
                                <span class="mb-2 d-flex hrefCsslink_x"><span
                                        style="font-weight: bold">Quantity:</span>&nbsp; ' . $data->pieces . '
                                    </span>
                                <span class="mb-2 d-flex hrefCsslink_x"><span
                                        style="font-weight: bold">Views:</span>&nbsp; ' . $data->views . '</span>

                                   ' . $available . '
                             </div>
                         </div>
                    </div>
                 </div>

                  <div class="col-md-5">
                     <div class="mb-3 card card6">
                         <div class="card-header"
                             style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold">
                             <div class="row">
                                 <div class="col-11" style="font-size: 13px!important"><i
                                         class="fas fa-tags"></i> Product Settings
                                 </div>

                             </div>
                         </div>

                         <div class="card-body">
                             <span class="mb-3 d-flex hrefCsslink_x"><span
                                     style="font-weight: bold">Posted on:</span>&nbsp;  ' . Carbon::parse($data->post_date_of_item)->diffForHumans() . '</span>
                             <span class="mb-3 d-flex hrefCsslink_x"><span
                                     style="font-weight: bold">Expired on:</span>&nbsp; ' . $data->post_expiry_date . '</span>
                             <span class="mb-3 d-flex hrefCsslink_x"><span style="font-weight: bold">
                                     <font color="#f25433">Delete on:</font>
                                 </span>&nbsp; ' . $data->post_delete_date . '</span>
                             <span class="mb-3 d-flex hrefCsslink_x"><span
                                     style="font-weight: bold"><span class="badge rounded-pill bg"
                                         style="background-color: #FE980F;color:#ffffff">' . today()->diffInDays(Carbon::parse($data->created_at)->toDateString()) - $data->product_duration . '</span></span>&nbsp;
                                 Days Remaining (' . $adtype . ')</span>

                             <div class="row g-1">
                                 <div class="col-4">
                                     <a href="' . route('user.viewdetails', ['upload_id' => encrypt($data->ImageIDS), 'product_id' => encrypt($data->ProductItem_id)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><button type="button"
                                         class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_xx1">
                                         <i class="fas fa-search"></i> View </button></a>
                                 </div>
                                 <div class="col-4">
                                     <a href="' . route('user.editproductitem', ['upload_id' => encrypt($data->ImageIDS)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><button type="submit"
                                         class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_xx2">
                                         <i class="far fa-edit"></i> Edit </button></a>
                                 </div>
                                 <div class="col-4">
                                   <button type="button" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif" data-del="' . encrypt($data->ProductItem_id) . '"
                                         class="mt-2 btn-deleteproductitem btn btn-outline btn-lg w-100 DetailsBtns2_xx3">
                                         <i class="fa fa-times"></i> Delete </button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 </div>
                </div>
              ';
                    return $html;
                })

                ->addColumn('action', function ($data) {
                    return '';
                })
                ->rawColumns(['image_name', 'action'])
                ->make(true);
        }

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.product_id',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
                'tbl_product_items.created_at',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $fetchImage = DB::table('tbl_images')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->where('user_id', $user)
            ->select('tbl_images.id', 'tbl_imgs.image_name', 'tbl_images.product_item')->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        return view('user.mpingiusers.view_post', ['countries' => $countries], compact('getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'ProductItems', 'fetchImage'))->render();

    }

    public function UpdatePrice(Request $request)
    {
        dd(encrypt($request->product_id));
    }



    public function UpdateDisponibility(Request $request)
    {
        Tbl_products_item::where('id', $request->id)
            ->update(['disponibility' => 0]);
        return response()->json([
            'status' => 200,
        ]);
    }

    //end datatable for product items
    // view post

    ////////////////////////////////////////////below expire products///////////////////////////////////
    // view Expire
    public function ViewExpiredAds(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();
        // $pagination = Tbl_products_item::latest()->paginate(5);

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.product_id',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
                'tbl_product_items.created_at',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();


        $ProductItems = DB::table('tbl_product_items')
            ->select('*', 'users.product_duration as PDurations', 'tbl_product_items.id as ProductItem_id', 'tbl_product_items.item_name', 'tbl_product_items.created_at', 'tbl_images.product_item', 'tbl_images.id as ImageIDS', 'users.product_duration')
            ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            //  ->leftjoin('tbl_imgs','tbl_imgs.product_item_id','=','tbl_product_items.id')
            ->where(['tbl_product_items.user_id' => $user, 'tbl_product_items.expire_status' => 1])
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $fetchImage = DB::table('tbl_images')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->where('user_id', $user)
            ->select('tbl_images.id', 'tbl_imgs.image_name', 'tbl_images.product_item')->get();

        //count free,paid, expired products
        $freeproducts = Tbl_products_item::select(DB::raw("(COUNT(*)) as countfree"))
            ->where(['user_id' => $user, 'ad_type' => '0', 'expire_status' => '1'])
            ->get();

        $paidproducts = Tbl_products_item::select(DB::raw("(COUNT(*)) as countpaid"))
            ->where(['user_id' => $user, 'ad_type' => '1', 'expire_status' => '1'])
            ->get();

        $expiredproducts = Tbl_products_item::select(DB::raw("(COUNT(*)) as countexpired"))
            ->where(['user_id' => $user, 'expire_status' => '0'])
            ->get();

        return view('user.mpingiusers.expire_ads', ['countries' => $countries], compact('getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'ProductItems', 'fetchImage', 'freeproducts', 'paidproducts', 'expiredproducts'))->render();

    }

    // datatable for product items

    public function FetchAllProductsitemsExpired(Request $request)
    {

        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        if ($request->ajax()) {
            $data = Tbl_products_item::query()
                ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
                    tbl_images.id,
                    users.product_duration as PDurations,
                    tbl_product_items.user_id as userid,
                    tbl_product_items.id as ProductItem_id,
                    tbl_product_items.currency,
                    tbl_product_items.post_date_of_item,
                    tbl_product_items.category_id,
                    tbl_product_items.sub_category_id,
                    tbl_product_items.article_id,
                    tbl_product_items.product_id,
                    tbl_product_items.sub_product_id,
                    tbl_product_items.item_name,
                    tbl_product_items.product_type,
                    tbl_product_items.brand_name,
                    tbl_product_items.brand_id,
                    tbl_product_items.pieces,
                    tbl_product_items.price,
                    tbl_product_items.old_price,
                    tbl_product_items.color_id,
                    tbl_product_items.sub_color_id,
                    tbl_product_items.price_range_start,
                    tbl_product_items.price_range_end,
                    tbl_product_items.product_color,
                    tbl_product_items.place_of_origin,
                    tbl_product_items.city,
                    tbl_product_items.state_id,
                    tbl_product_items.item_descriptions,
                    tbl_product_items.item_images,
                    tbl_product_items.supplier_name,
                    tbl_product_items.supplier_region,
                    tbl_product_items.type,
                    tbl_product_items.post_expiry_date,
                    tbl_product_items.post_delete_date,
                    tbl_product_items.post_date_count,
                    tbl_product_items.post_expiry_count,
                    tbl_product_items.post_delete_count,
                    tbl_product_items.expire_status,
                    tbl_product_items.ad_type,
                    tbl_product_items.views,
                    tbl_product_items.shipping,
                    tbl_product_items.shipping_price,
                    tbl_product_items.price_id,
                    tbl_product_items.rate,
                    tbl_product_items.total_rate,
                    tbl_product_items.hits,
                    tbl_product_items.payment,
                    tbl_product_items.weight,
                    tbl_product_items.volume,
                    tbl_product_items.delivery,
                    tbl_product_items.day_return,
                    tbl_product_items.negotiable,
                    tbl_product_items.currency,
                    tbl_product_items.category,
                    tbl_product_items.product_web_name,
                    tbl_product_items.product_web_link,
                    tbl_product_items.disponibility,
                    tbl_product_items.created_at,
                    tbl_product_items.remainingdays_status,
                    tbl_product_items.expireddate_remain,
                    tbl_images.id as ImageIDS,
                    tbl_imgs.image_name as Images,
                    users.product_duration,
                    tbl_imgs.image_name,
                    tbl_images.product_item

                ')
                ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
                ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
                ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
                ->where(['tbl_product_items.user_id' => $user, 'tbl_product_items.expire_status' => 0])
                ->groupBy('tbl_imgs.upload_id')
                ->get();

            foreach ($data as $datas) {


                Tbl_products_item::where([
                    ['user_id', $user],
                    ['created_at', '<', Carbon::now()->subDay(31)],
                    ['id', $datas->ProductItem_id],
                ])->update(['expire_status' => '0']); //expire_status is update to 0 if met 31 days


                Tbl_products_item::where([
                    ['user_id', $user],
                    ['created_at', '<', Carbon::now()->subDay(76)],
                    ['id', $datas->ProductItem_id],
                ])->delete(); //[product post is delete if met 76 days

            }

            // foreach($data as $datas){

            //     $dayleft = today()->diffInDays(Carbon::parse($datas->created_at)->toDateString()) - $datas->product_duration;
            //      Tbl_products_item::where([
            //         ['user_id', $user],
            //         ['remainingdays_status', $dayleft],
            //         ['id', $datas->ProductItem_id],
            //     ])->delete();

            // }

            // foreach($data as $datas2){
            //    $dayleft2 = today()->diffInDays(Carbon::parse($datas2->expireddate_remain)->toDateString()) - 76;
            //    if($dayleft2 == 76){
            //         Tbl_products_item::where(['user_id' => $user, 'id' => $datas2->ProductItem_id])
            //         ->update(['expire_status' => '0']);
            //    }else{
            //      echo "";
            //    }
            // }

            return Datatables::of($data)

                ->addColumn('image_name', function ($data) {

                    $slide = "";
                    $image = "";
                    $view = "";
                    $adtype = "";
                    $deleteitem = "";
                    $res = "";
                    if ($data->ImageIDS != "") {
                        $slide = 'active';
                    } else {
                        $slide = '';
                    }

                    $image = $data->Images ? '<img src="/storage/assets/uploads/' . $data->Images . '" class="img-thumbnail"
            class="img-thumbnail" height="50%">' : '<img src="/storage/assets/images/avatar_nzuzi_default.png" class="img-thumbnail"
            class="img-thumbnail" height="50%">';
                    $users = Auth::user()->id ?? 'session expired';
                    $countImage = DB::table('tbl_imgs')->where('upload_id', $data->ImageIDS)->count();
                    if ($data->item_images == 0) {
                        $view = '<a href="' . route('user.uploadimageProductItem', ['id' => encrypt($data->ProductItem_id)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><i
                    class="fa fa-gift"></i>
                   Add new photo (0)
            </a>';
                    } else {
                        $view = '<a href="' . route('user.viewphotos', ['upload_id' => encrypt($data->ImageIDS)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><i
                        class="fas fa-image"></i>
                        view photo (' . $countImage . ')
                    </a>';
                    }
                    if ($data->ad_type == 1) {
                        $adtype = "Paid Product";
                    } else {
                        $adtype = "Free Product";
                    }
                    $html = "";
                    $html = '<div class="py-4 row">
                 <div class="col-md-7">
                    <div class="row">

                      <div class="col-md-5">
                           <center>
                           <div style="border: 1px solid #ccc;height:auto;">
                               <p class="mt-2 PClass">
                                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                       <center>
                                           <div class="carousel-inner" >
                                                 <div class="carousel-item ' . $slide . '">
                                                 ' . $image . '
                                                 </div>
                                             </div>
                                       </center>
                                   </div>
                                ' . $view . '
                               </p>
                           </div>
                       </center>
                     </div>

                     <div class="col-md-7">
                        <div class="card-body">
                            <h6 class="card-title fw-bold">' . Str::title($data->item_name) . '</h6>
                            <h5 class="card-text fw-bolder"><span style="color: #ff7519;">' . $data->currency . ' ' . number_format($data->price) . '
                                    </span>
                                <br><span class="strikeCss" style="font-weight: bold;"><strike> ' . $data->currency . ' ' . number_format($data->old_price) . '</strike></span>
                            </h5>
                            <span class="d-flex"> <span class="hrefCsslink_x"
                                    style="font-weight: bold">Color:</span>&nbsp;<span
                                    class="py-2mt-1" style="
                                     display: inline-block;
                                    font-size: 12px;
                                    font-weight: bold;
                                    line-height: 15px;
                                    color: #9f9f9f;
                                    width: 20px;
                                    height: 15px;
                                    background-color: ' . $data->product_color . ';
                                    text-transform: uppercase;
                                    padding-right: 16px;
                                    padding-left: 16px;
                                    padding-top: 10px;
                                    padding-bottom: 10px;
                                    -webkit-border-radius: 6px;
                                    -moz-border-radius: 6px;
                                    border-radius: 6px;
                                    margin-bottom: 2px;
                                    box-shadow: 1px 1px #888888;
                                    "></span></span>
                            <span class="mb-2 d-flex hrefCsslink_x"><span
                                    style="font-weight: bold">Product&nbsp;type:</span>&nbsp;
                                    ' . $data->product_type . '</span>
                            <span class="mb-2 d-flex hrefCsslink_x"><span
                                    style="font-weight: bold">Quantity:</span>&nbsp; ' . $data->pieces . '
                                </span>
                            <span class="mb-2 d-flex hrefCsslink_x"><span
                                    style="font-weight: bold">Views:</span>&nbsp; ' . $data->views . '</span>
                            <button type="submit"
                                class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_x">
                                <i class="far fa-money-bill-alt"></i> Pay Now! </button>
                         </div>
                     </div>
                </div>
             </div>

              <div class="col-md-5">
                 <div class="mb-3 card card6">
                     <div class="card-header"
                         style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold">
                         <div class="row">
                             <div class="col-11" style="font-size: 13px!important"><i
                                     class="fas fa-tags"></i> Product Settings
                             </div>

                         </div>
                     </div>

                     <div class="card-body">
                         <span class="mb-3 d-flex hrefCsslink_x"><span
                                 style="font-weight: bold">Posted on:</span>&nbsp;  ' . Carbon::parse($data->post_date_of_item)->diffForHumans() . '</span>
                         <span class="mb-3 d-flex hrefCsslink_x"><span
                                 style="font-weight: bold">Expired on:</span>&nbsp; ' . $data->post_expiry_date . '</span>
                         <span class="mb-3 d-flex hrefCsslink_x"><span style="font-weight: bold">
                                 <font color="#f25433">Delete on:</font>
                             </span>&nbsp; ' . $data->post_delete_date . '</span>
                         <span class="mb-3 d-flex hrefCsslink_x"><span
                                 style="font-weight: bold"><span class="badge rounded-pill bg"
                                     style="background-color: #f25433;color:#ffffff">' . today()->diffInDays(Carbon::parse($data->created_at)->toDateString()) - $data->product_duration . '</span></span>&nbsp;
                             Days Remaining (' . $adtype . ')</span>


                         </div>
                     </div>
                 </div>
             </div>

             </div>
            </div>
          ';
                    return $html;
                })

                ->addColumn('action', function ($data) {
                    return '';
                })
                ->rawColumns(['image_name', 'action'])
                ->make(true);
        }

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.product_id',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
                'tbl_product_items.created_at',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $fetchImage = DB::table('tbl_images')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->where('user_id', $user)
            ->select('tbl_images.id', 'tbl_imgs.image_name', 'tbl_images.product_item')->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        return view('user.mpingiusers.expire_ads', ['countries' => $countries], compact('getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'ProductItems', 'fetchImage'))->render();

    }

    //end datatable for product items
// view Expire

    ///////////////////////////////////////////////////end expired products///////////////////////////////////


    public function ViewIndustry(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();
        // $pagination = Tbl_products_item::latest()->paginate(5);

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.product_id',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
                'tbl_product_items.created_at',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();


        $ProductItems = DB::table('tbl_product_items')
            ->select('*', 'users.product_duration as PDurations', 'tbl_product_items.id as ProductItem_id', 'tbl_product_items.item_name', 'tbl_product_items.created_at', 'tbl_images.product_item', 'tbl_images.id as ImageIDS', 'users.product_duration')
            ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            //  ->leftjoin('tbl_imgs','tbl_imgs.product_item_id','=','tbl_product_items.id')
            ->where(['tbl_product_items.user_id' => $user, 'tbl_product_items.expire_status' => 1])
            ->get();


        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $fetchImage = DB::table('tbl_images')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->where('user_id', $user)
            ->select('tbl_images.id', 'tbl_imgs.image_name', 'tbl_images.product_item')->get();

        //count free,paid, expired products
        $freeproducts = Tbl_products_item::select(DB::raw("(COUNT(*)) as countfree"))
            ->where(['user_id' => $user, 'ad_type' => '0', 'expire_status' => '1'])
            ->get();

        $paidproducts = Tbl_products_item::select(DB::raw("(COUNT(*)) as countpaid"))
            ->where(['user_id' => $user, 'ad_type' => '1', 'expire_status' => '1'])
            ->get();

        $expiredproducts = Tbl_products_item::select(DB::raw("(COUNT(*)) as countexpired"))
            ->where(['user_id' => $user, 'expire_status' => '0'])
            ->get();


        $countIndustryItems = DB::table('users')
            ->selectRaw('count(tbl_industry_items.user_id) as cnt')
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_industry_items.user_id')
            ->get();

        return view('user.mpingiusers.view_industry', ['countries' => $countries], compact('countIndustryItems', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'ProductItems', 'fetchImage', 'freeproducts', 'paidproducts', 'expiredproducts'))->render();

    }



    public function FetchAllIndustryItems(Request $request)
    {

        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        if ($request->ajax()) {
            $data = tbl_industry_item::query()
                ->select(
                    'users.profile',
                    'users.first_name',
                    'users.middle_name',
                    'users.last_name',
                    'users.gender',
                    'users.date',
                    'users.month',
                    'users.year',
                    'users.country',
                    'users.country_id',
                    'users.state_id',
                    'users.mobile',
                    'users.pobox',
                    'users.phone',
                    'users.address_1',
                    'users.email',
                    'users.address_2',
                    'users.service_duration_industry',
                    'users.product_duration',
                    'tbl_industry_items.id as industryid',
                    'tbl_industry_items.post_date_of_item',
                    'tbl_industry_items.user_id',
                    'tbl_industry_items.industry_id',
                    'tbl_industry_items.sub_industry_id',
                    'tbl_industry_items.first_name',
                    'tbl_industry_items.last_name',
                    'tbl_industry_items.job_title',
                    'tbl_industry_items.department',
                    'tbl_industry_items.job_title',
                    'tbl_industry_items.company_name',
                    'tbl_industry_items.company_type',
                    'tbl_industry_items.company_motto',
                    'tbl_industry_items.company_logo',
                    'tbl_industry_items.company_banner',
                    'tbl_industry_items.description',
                    'tbl_industry_items.p_box',
                    'tbl_industry_items.address',
                    'tbl_industry_items.address_2',
                    'tbl_industry_items.city',
                    'tbl_industry_items.state',
                    'tbl_industry_items.country',
                    'tbl_industry_items.postal_code',
                    'tbl_industry_items.phone',
                    'tbl_industry_items.mobile',
                    'tbl_industry_items.email',
                    'tbl_industry_items.fax',
                    'tbl_industry_items.website',
                    'tbl_industry_items.question_1',
                    'tbl_industry_items.question_2',
                    'tbl_industry_items.question_3',
                    'tbl_industry_items.question_4',
                    'tbl_industry_items.question_5',
                    'tbl_industry_items.question_6',
                    'tbl_industry_items.president',
                    'tbl_industry_items.advertising',
                    'tbl_industry_items.sales',
                    'tbl_industry_items.purchasing',
                    'tbl_industry_items.marketing',
                    'tbl_industry_items.engineering',
                    'tbl_industry_items.ad_type',
                    'tbl_industry_items.post_expiry_date',
                    'tbl_industry_items.post_delete_date',
                    'tbl_industry_items.post_date_count',
                    'tbl_industry_items.post_expiry_count',
                    'tbl_industry_items.post_delete_count',
                    'tbl_industry_items.expire_status',
                    'tbl_industry_items.views',
                    'tbl_industry_items.rate',
                    'tbl_industry_items.total_rate',
                    'tbl_industry_items.hits',
                    'tbl_industry_items.images',
                    'tbl_industry_items.banner',
                    'tbl_industry_items.company_color',
                    'tbl_industry_items.company_title_color',
                    'tbl_industry_items.created_at'
                )
                ->leftjoin('users', 'users.id', '=', 'tbl_industry_items.user_id')
                ->where(['tbl_industry_items.user_id' => $user, 'tbl_industry_items.expire_status' => 1])
                ->get();

            foreach ($data as $datas) {

                tbl_industry_item::where([
                    ['user_id', $user],
                    ['created_at', '<', Carbon::now()->subDay(31)],
                    ['id', $datas->industryid],
                ])->update(['expire_status' => '0']); //expire_status is update to 0 if met 31 days


                tbl_industry_item::where([
                    ['user_id', $user],
                    ['created_at', '<', Carbon::now()->subDay(76)],
                    ['id', $datas->industryid],
                ])->delete(); //[product post is delete if met 76 days

            }



            return Datatables::of($data)

                ->addColumn('image_name', function ($data) {
                    // '.route('user.businesslogoimage').'
                    //<a href="'.route('x-industries', ['industry_id' => encrypt($data->industryid)]).'" class="hrefCssc_" style="font-weight: bold;"> <span style="text-transform: uppercase;">'.$data->company_name.'</span></a>
                    $image = $data->company_logo ? '<img src="/storage/assets/uploads/' . $data->company_logo . '" class="img-thumbnail" style="height:100px">' : '<img src="' . url('/assets/images/business-logo.png') . '" class="img-thumbnail"
        class="img-thumbnail" height="50%">';
                    $html = "";
                    $html = '<div class="py-4 row">
                 <div class="col-md-7">
                    <div class="row">
                     <div class="col-md-12">
                         <center>


                            <div class="" style="width:100%">
                             <div class="px-4 pt-0 pb-4 cover">
                                 <div class="row g-3" style="position:absolute">
                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                        <center><a href="' . route('x-industries', ['industry_id' => encrypt($data->industryid)]) . '" class="hrefCss_"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="ADD INDUSTRY LOGO"><h3 class="text-centers">' . $data->company_name . '</h3></center> </a>
                                    </div>
                                 </div>
                              <div class="media align-items-start profile-head">
                               <br>
                               <div class="mt-3 mr-3 profile businesslogoCssz" style="float:left">
                                         ' . $image . '
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#UploadIndustryLogoModal" data-ids="' . $data->industryid . '" data-photo="' . $data->company_logo . '" class="btn_getindustriesphoto hrefCss_"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="ADD INDUSTRY LOGO"><span class="logotext">INDUSTRY LOGO</span>
                                        </a>
                                        <br><Br>

                                 </div>


                            </div>
                            </div>
                         </center>



             </div>
             </div>
               </div><br><br>

              <div class="col-md-5">
                 <div class="mb-3 card card6">
                     <div class="card-header"
                         style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold">
                         <div class="row">
                             <div class="col-11" style="font-size: 13px!important"><i
                                                    class="fa fa-industry"></i> Industries Settings
                             </div>

                         </div>
                     </div>

                     <div class="card-body">
                         <span class="mb-3 d-flex hrefCsslink_x"><span
                                 style="font-weight: bold">Posted on:</span>&nbsp;  ' . Carbon::parse($data->post_date_of_item)->diffForHumans() . '</span>
                         <span class="mb-3 d-flex hrefCsslink_x"><span
                                 style="font-weight: bold">Expired on:</span>&nbsp; ' . $data->post_expiry_date . '</span>
                         <span class="mb-3 d-flex hrefCsslink_x"><span style="font-weight: bold">
                                 <font color="#f25433">Delete on:</font>
                             </span>&nbsp; ' . $data->post_delete_date . '</span>
                         <span class="mb-3 d-flex hrefCsslink_x"><span
                                 style="font-weight: bold"><span class="badge rounded-pill bg"
                                     style="background-color: #FE980F;color:#ffffff">' . today()->diffInDays(Carbon::parse($data->created_at)->toDateString()) - $data->service_duration_industry . '</span></span>&nbsp;
                             Days Remaining (<b>Free Business</b>)</span>

                         <div class="row g-1">
                             <div class="col-4">
                                 <a href="' . route('x-industries', ['industry_id' => encrypt($data->industryid)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><button type="button"
                                     class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_xx1">
                                     <i class="fas fa-search"></i> View </button></a>
                             </div>
                             <div class="col-4">
                                 <a href="' . route('edit.industriesUser', ['edit_industry_id' => encrypt($data->industryid)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><button type="submit"
                                     class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_xx2">
                                     <i class="far fa-edit"></i> Edit </button></a>
                             </div>
                             <div class="col-4">
                               <button type="button" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif" data-del="' . encrypt($data->industryid) . '"
                                     class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_xx3 btn-deleteIndustrylogo">
                                     <i class="fa fa-times"></i> Delete </button>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             </div>
            </div>
          ';
                    return $html;
                })

                ->addColumn('action', function ($data) {
                    return '';
                })
                ->rawColumns(['image_name', 'action'])
                ->make(true);
        }

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.product_id',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
                'tbl_product_items.created_at',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $fetchImage = DB::table('tbl_images')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->where('user_id', $user)
            ->select('tbl_images.id', 'tbl_imgs.image_name', 'tbl_images.product_item')->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countryGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.place_of_origin',
                'countries.flag',
                'countries.name',
                'countries.id as country_id',
                DB::raw('count(tbl_product_items.place_of_origin) as total_countries')
            )
            ->leftjoin('countries', 'countries.id', '=', 'tbl_product_items.place_of_origin')
            ->groupBy('tbl_product_items.place_of_origin')
            ->where(['tbl_product_items.expire_status' => '1'])
            ->get();

        return view('user.mpingiusers.view_industry', ['countries' => $countries], compact('countryGroupCount', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'ProductItems', 'fetchImage'))->render();

    }


    public function targetindustrieslogoImage(Request $request)
    {

        //dd(decrypt($request->industry_id));

        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.country',
                'users.country_id',
                'users.state_id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'countries.name as countryname',
                'countries.flag',
                'states.name as statename',
                'cities.name as cityname'
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $getIndustriesItems = tbl_industry_item::where('id', decrypt($request->industry_id))->get();

        $fetchAllIndustriesItems = DB::table('tbl_industry_items')
            ->select(
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'users.service_duration_business',
                'users.product_duration',
                'tbl_industry_items.id',
                'tbl_industry_items.post_date_of_item',
                'tbl_industry_items.user_id',
                'tbl_industry_items.industry_id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industry_items.first_name',
                'tbl_industry_items.last_name',
                'tbl_industry_items.job_title',
                'tbl_industry_items.department',
                'tbl_industry_items.job_title',
                'tbl_industry_items.company_name',
                'tbl_industry_items.company_type',
                'tbl_industry_items.company_motto',
                'tbl_industry_items.company_logo',
                'tbl_industry_items.company_banner',
                'tbl_industry_items.description',
                'tbl_industry_items.p_box',
                'tbl_industry_items.address',
                'tbl_industry_items.address_2',
                'tbl_industry_items.city',
                'tbl_industry_items.state',
                'tbl_industry_items.country',
                'tbl_industry_items.postal_code',
                'tbl_industry_items.phone',
                'tbl_industry_items.mobile',
                'tbl_industry_items.email',
                'tbl_industry_items.fax',
                'tbl_industry_items.website',
                'tbl_industry_items.question_1',
                'tbl_industry_items.question_2',
                'tbl_industry_items.question_3',
                'tbl_industry_items.question_4',
                'tbl_industry_items.question_5',
                'tbl_industry_items.question_6',
                'tbl_industry_items.president',
                'tbl_industry_items.advertising',
                'tbl_industry_items.sales',
                'tbl_industry_items.purchasing',
                'tbl_industry_items.marketing',
                'tbl_industry_items.engineering',
                'tbl_industry_items.ad_type',
                'tbl_industry_items.post_expiry_date',
                'tbl_industry_items.post_delete_date',
                'tbl_industry_items.post_date_count',
                'tbl_industry_items.post_expiry_count',
                'tbl_industry_items.post_delete_count',
                'tbl_industry_items.expire_status',
                'tbl_industry_items.views',
                'tbl_industry_items.rate',
                'tbl_industry_items.total_rate',
                'tbl_industry_items.hits',
                'tbl_industry_items.images',
                'tbl_industry_items.banner',
                'tbl_industry_items.company_color',
                'tbl_industry_items.company_title_color',
                'tbl_industry_items.created_at'
            )
            ->leftjoin('users', 'users.id', '=', 'tbl_industry_items.user_id')
            ->where(['tbl_industry_items.id' => decrypt($request->industry_id), 'tbl_industry_items.expire_status' => 1])
            ->get();

        return view('user.mpingiusers.industries_item_details', ['countries' => $countries], compact('fetchAllIndustriesItems', 'getIndustriesItems', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }

    public function EditIndustriesItemsUser(Request $request, $edit_industry_id)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.country',
                'users.country_id',
                'users.state_id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'countries.name as countryname',
                'countries.flag',
                'states.name as statename',
                'cities.name as cityname'
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $getIndustriesItems = tbl_industry_item::where('id', decrypt($request->edit_industry_id))->get();

        $fetchAllIndustriesItems = DB::table('tbl_industry_items')
            ->select(
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'users.service_duration_business',
                'users.product_duration',
                'tbl_industry_items.id',
                'tbl_industry_items.post_date_of_item',
                'tbl_industry_items.user_id',
                'tbl_industry_items.industry_id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industry_items.first_name',
                'tbl_industry_items.last_name',
                'tbl_industry_items.job_title',
                'tbl_industry_items.department',
                'tbl_industry_items.job_title',
                'tbl_industry_items.company_name',
                'tbl_industry_items.company_type',
                'tbl_industry_items.company_motto',
                'tbl_industry_items.company_logo',
                'tbl_industry_items.company_banner',
                'tbl_industry_items.description',
                'tbl_industry_items.p_box',
                'tbl_industry_items.address',
                'tbl_industry_items.address_2',
                'tbl_industry_items.city',
                'tbl_industry_items.state',
                'tbl_industry_items.country',
                'tbl_industry_items.postal_code',
                'tbl_industry_items.phone',
                'tbl_industry_items.mobile',
                'tbl_industry_items.email',
                'tbl_industry_items.fax',
                'tbl_industry_items.website',
                'tbl_industry_items.question_1',
                'tbl_industry_items.question_2',
                'tbl_industry_items.question_3',
                'tbl_industry_items.question_4',
                'tbl_industry_items.question_5',
                'tbl_industry_items.question_6',
                'tbl_industry_items.president',
                'tbl_industry_items.advertising',
                'tbl_industry_items.sales',
                'tbl_industry_items.purchasing',
                'tbl_industry_items.marketing',
                'tbl_industry_items.engineering',
                'tbl_industry_items.ad_type',
                'tbl_industry_items.post_expiry_date',
                'tbl_industry_items.post_delete_date',
                'tbl_industry_items.post_date_count',
                'tbl_industry_items.post_expiry_count',
                'tbl_industry_items.post_delete_count',
                'tbl_industry_items.expire_status',
                'tbl_industry_items.views',
                'tbl_industry_items.rate',
                'tbl_industry_items.total_rate',
                'tbl_industry_items.hits',
                'tbl_industry_items.images',
                'tbl_industry_items.banner',
                'tbl_industry_items.company_color',
                'tbl_industry_items.company_title_color',
                'tbl_industry_items.created_at'
            )
            ->leftjoin('users', 'users.id', '=', 'tbl_industry_items.user_id')
            ->where(['tbl_industry_items.id' => decrypt($request->edit_industry_id), 'tbl_industry_items.expire_status' => 1])
            ->get();

        return view('user.mpingiusers.edit_industries_item_details', ['countries' => $countries], compact('fetchAllIndustriesItems', 'getIndustriesItems', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();
    }

    public function UpdatetIndustriesform(Request $request)
    {


        $validator = Validator::make($request->all(), [

            'job_title' => '',
            'department' => '',
            'company_name' => '',
            'description' => '',
            'p_box' => '',
            'address' => '',
            'phone' => '',
            'email' => '',
            'mobile' => '',
            'website' => '',
        ], [
            'job_title.required' => '',
            'department.required' => '',
            'company_name.required' => 'Required Company Name',
            'description.required' => '',
            'p_box.required' => '',
            'address.required' => '',
            'phone.required' => '',
            'email.required' => '',
            'mobile.required' => '',
            'website.required' => '',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $products_edit = tbl_industry_item::find($request->id);
        $pData = [
            'job_title' => $request->job_title,
            'department' => $request->department,
            'company_name' => $request->company_name,
            'description' => $request->description,
            'p_box' => $request->p_box,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'website' => $request->website


        ];
        $products_edit->update($pData);

        return response()->json([
            'status' => 200,
        ]);

    }

    public function DeleteIndustrieslogo(Request $request)
    {
        $id = decrypt($request->id);
        DB::table('tbl_industry_items')->where('id', $id)->delete();
        return response()->json(['status' => 200]);
    }

    public function Updatetindustrieslogo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_logo' => 'image|mimes:png,jpg,gif,jpeg|max:2048'

        ], [
            'company_logo.required' => 'Image upload is 2mb maximum upload allowed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors6' => $validator->errors()]);
        }

        $fileName = '';
        $companylogo = tbl_industry_item::find($request->id);
        $file = $request->file('company_logo');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('/public/assets/uploads/', $fileName);
        $pData = [
            'company_logo' => $fileName,

        ];

        $companylogo->update($pData);
        return response()->json([
            'status' => "200",
        ]);
    }


    // //////////////////////////////end industry logo/////////////////////////////

    ////////////////////////////////for cancel order//////////////////////////////////
    public function ViewCanceled()
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countcancelmyOrder = tbl_mping_purchase::where(['user_id_buyer' => $user, 'cancel_id' => 0])->count();


        return view('user.mpingiusers.canceled', ['countries' => $countries], compact('countcancelmyOrder', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }


    public function FetchallCancelorderproducts(Request $request)
    {

        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();


        if ($request->ajax()) {


            // $data = Tbl_sub_product::query()
            // ->select(DB::raw("count(tbl_imgs.upload_id) as upload_ids"),
            //     'tbl_sub_products.id',
            //     'tbl_sub_products.subcategory_id',
            //     'tbl_sub_products.product_id',
            //     'tbl_sub_products.category_id',
            //     'tbl_sub_products.article_id',
            //     'tbl_sub_products.sub_product_name_en',
            //     'tbl_product_items.id as productID',
            //     'tbl_product_items.user_id as Productitem_id',
            //     'tbl_product_items.post_date_of_item',
            //     'tbl_product_items.category_id',
            //     'tbl_product_items.sub_category_id',
            //     'tbl_product_items.article_id',
            //     'tbl_product_items.product_id',
            //     'tbl_product_items.sub_product_id',
            //     'tbl_product_items.item_name',
            //     'tbl_product_items.product_type',
            //     'tbl_product_items.brand_name',
            //     'tbl_product_items.brand_id',
            //     'tbl_product_items.pieces',
            //     'tbl_product_items.price',
            //     'tbl_product_items.old_price',
            //     'tbl_product_items.color_id',
            //     'tbl_product_items.sub_color_id',
            //     'tbl_product_items.price_range_start',
            //     'tbl_product_items.price_range_end',
            //     'tbl_product_items.product_color',
            //     'tbl_product_items.place_of_origin',
            //     'tbl_product_items.city',
            //     'tbl_product_items.state_id',
            //     'tbl_product_items.item_descriptions',
            //     'tbl_product_items.item_images',
            //     'tbl_product_items.supplier_name',
            //     'tbl_product_items.supplier_region',
            //     'tbl_product_items.type',
            //     'tbl_product_items.post_expiry_date',
            //     'tbl_product_items.post_delete_date',
            //     'tbl_product_items.post_date_count',
            //     'tbl_product_items.post_expiry_count',
            //     'tbl_product_items.post_delete_count',
            //     'tbl_product_items.expire_status',
            //     'tbl_product_items.ad_type',
            //     'tbl_product_items.views',
            //     'tbl_product_items.shipping',
            //     'tbl_product_items.shipping_price',
            //     'tbl_product_items.price_id',
            //     'tbl_product_items.rate',
            //     'tbl_product_items.total_rate',
            //     'tbl_product_items.hits',
            //     'tbl_product_items.payment',
            //     'tbl_product_items.weight',
            //     'tbl_product_items.volume',
            //     'tbl_product_items.delivery',
            //     'tbl_product_items.day_return',
            //     'tbl_product_items.negotiable',
            //     'tbl_product_items.currency',
            //     'tbl_product_items.category',
            //     'tbl_product_items.product_web_name',
            //     'tbl_product_items.product_web_link',
            //     'tbl_product_items.disponibility',
            //     'tbl_product_items.created_at',
            //     'tbl_mping_purchases.created_at as order_on',
            //     'tbl_mping_purchases.product_item',
            //     'tbl_mping_purchases.id as purchase_id',
            //     'tbl_mping_purchases.user_id_seller',
            //     'tbl_mping_purchases.sub_product_id',
            //     'tbl_mping_purchases.user_id_buyer',
            //     'tbl_mping_purchases.status',
            //     'tbl_mping_purchases.item_images',
            //     'tbl_mping_purchases.order_number',
            //     'tbl_mping_purchases.cancel_id',
            //     'tbl_images.id as ImageIDS',
            //     'tbl_imgs.image_name as Images',
            //     'tbl_imgs.image_name',
            //     'tbl_images.product_item',
            //     'countries.name as countryname',
            //     'countries.flag',
            //     'states.name as statename',
            //     'cities.name as cityname',
            //     'users.profile',
            //     'users.first_name',
            //     'users.middle_name',
            //     'users.last_name',
            //     'users.gender',
            //     'users.date',
            //     'users.month',
            //     'users.year',
            //     'users.country',
            //     'users.country_id',
            //     'users.state_id',
            //     'users.mobile',
            //     'users.pobox',
            //     'users.phone',
            //     'users.address_1',
            //     'users.email',
            //     'users.address_2',
            //     'tbl_mping_businesses.business_name',
            //   )

            //   ->leftjoin('tbl_product_items','tbl_product_items.article_id','=','tbl_sub_products.article_id')
            //   ->leftjoin('tbl_mping_purchases','tbl_mping_purchases.article_id','=','tbl_sub_products.article_id')
            //   ->leftjoin('tbl_images','tbl_images.product_item','=','tbl_product_items.id')
            //   ->leftjoin('tbl_imgs','tbl_imgs.upload_id','=','tbl_images.id')
            //   ->leftjoin('countries','countries.id','=','tbl_mping_purchases.country_id')
            //   ->leftjoin('states','states.id','=','tbl_mping_purchases.state_id')
            //   ->leftjoin('cities','cities.id','=','tbl_mping_purchases.city_id')
            //   ->leftjoin('users','users.id','=','tbl_mping_purchases.user_id_buyer')
            //   ->leftjoin('tbl_mping_businesses','tbl_mping_businesses.user_id','=','tbl_mping_purchases.user_id_buyer')
            //   ->where(['tbl_mping_purchases.user_id_buyer' => $user, 'tbl_mping_purchases.cancel_id' => 0 ])
            //   ->groupBy('tbl_imgs.upload_id')
            // //   ->distinct('item_name')
            // ->get();

            $data = tbl_mping_purchase::query()
                ->select(
                    DB::raw("count(tbl_imgs.upload_id) as upload_ids"),
                    'tbl_product_items.user_id as Productitem_id',
                    'tbl_product_items.post_date_of_item',
                    'tbl_product_items.category_id',
                    'tbl_product_items.sub_category_id',
                    'tbl_product_items.article_id',
                    'tbl_product_items.id as productID',
                    'tbl_product_items.product_id',
                    'tbl_product_items.sub_product_id',
                    'tbl_product_items.item_name',
                    'tbl_product_items.product_type',
                    'tbl_product_items.brand_name',
                    'tbl_product_items.brand_id',
                    'tbl_product_items.pieces',
                    'tbl_product_items.price',
                    'tbl_product_items.old_price',
                    'tbl_product_items.color_id',
                    'tbl_product_items.sub_color_id',
                    'tbl_product_items.price_range_start',
                    'tbl_product_items.price_range_end',
                    'tbl_product_items.product_color',
                    'tbl_product_items.place_of_origin',
                    'tbl_product_items.city',
                    'tbl_product_items.state_id',
                    'tbl_product_items.item_descriptions',
                    'tbl_product_items.item_images',
                    'tbl_product_items.supplier_name',
                    'tbl_product_items.supplier_region',
                    'tbl_product_items.type',
                    'tbl_product_items.post_expiry_date',
                    'tbl_product_items.post_delete_date',
                    'tbl_product_items.post_date_count',
                    'tbl_product_items.post_expiry_count',
                    'tbl_product_items.post_delete_count',
                    'tbl_product_items.expire_status',
                    'tbl_product_items.ad_type',
                    'tbl_product_items.views',
                    'tbl_product_items.shipping',
                    'tbl_product_items.shipping_price',
                    'tbl_product_items.price_id',
                    'tbl_product_items.rate',
                    'tbl_product_items.total_rate',
                    'tbl_product_items.hits',
                    'tbl_product_items.payment',
                    'tbl_product_items.weight',
                    'tbl_product_items.volume',
                    'tbl_product_items.delivery',
                    'tbl_product_items.day_return',
                    'tbl_product_items.negotiable',
                    'tbl_product_items.currency',
                    'tbl_product_items.category',
                    'tbl_product_items.product_web_name',
                    'tbl_product_items.product_web_link',
                    'tbl_product_items.disponibility',
                    'tbl_product_items.created_at',
                    'tbl_mping_purchases.product_item',
                    'tbl_mping_purchases.id as purchase_id',
                    'tbl_mping_purchases.quantity as qty',
                    'tbl_mping_purchases.user_id_seller',
                    'tbl_mping_purchases.sub_product_id',
                    'tbl_mping_purchases.remainingdays_status as exp_status',
                    'tbl_mping_purchases.user_id_buyer',
                    'tbl_mping_purchases.status',
                    'tbl_mping_purchases.item_images',
                    'tbl_mping_purchases.order_number',
                    'tbl_mping_purchases.cancel_id',
                    'tbl_mping_purchases.created_at as order_on',
                    'tbl_mping_purchases.post_expiry_date as expired_on',
                    'tbl_mping_purchases.post_delete_on as delete_on',
                    'tbl_mping_purchases.product_durations as product_durations',
                    'tbl_images.id as ImageIDS',
                    'tbl_imgs.image_name as Images',
                    'tbl_imgs.image_name',
                    'tbl_images.product_item',
                    'countries.name as countryname',
                    'countries.flag',
                    'states.name as statename',
                    'cities.name as cityname',
                    'users.profile',
                    'users.first_name',
                    'users.middle_name',
                    'users.last_name',
                    'users.gender',
                    'users.date',
                    'users.month',
                    'users.year',
                    'users.country',
                    'users.country_id',
                    'users.state_id',
                    'users.mobile',
                    'users.pobox',
                    'users.phone',
                    'users.address_1',
                    'users.email',
                    'users.address_2',
                    'tbl_mping_businesses.business_name',
                )

                ->leftjoin('tbl_product_items', 'tbl_product_items.id', '=', 'tbl_mping_purchases.product_id')
                ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
                ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
                ->leftjoin('countries', 'countries.id', '=', 'tbl_mping_purchases.country_id')
                ->leftjoin('states', 'states.id', '=', 'tbl_mping_purchases.state_id')
                ->leftjoin('cities', 'cities.id', '=', 'tbl_mping_purchases.city_id')
                ->leftjoin('users', 'users.id', '=', 'tbl_mping_purchases.user_id_buyer')
                ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'tbl_mping_purchases.user_id_buyer')
                ->where(['tbl_mping_purchases.user_id_buyer' => $user, 'tbl_mping_purchases.cancel_id' => 0])
                ->groupBy('tbl_imgs.upload_id')
                //   ->distinct('item_name')
                ->get();

            foreach ($data as $datas) {

                tbl_mping_purchase::where([
                    ['user_id_buyer', $user],
                    ['created_at', '<', Carbon::now()->subDay(5)],
                ])->delete(); //[my order delete if met 5 days
            }

            return Datatables::of($data)

                ->addColumn('image_name', function ($data) {

                    $slide = "";
                    $image = "";
                    $view = "";
                    $adtype = "";
                    $deleteitem = "";
                    $stat = "";
                    $res = "";
                    if ($data->ImageIDS != "") {
                        $slide = 'active';
                    } else {
                        $slide = '';
                    }

                    if ($data->status == 0) {
                        $stat = '<span class="badge bg-warning text-light"><i class="fa fa-refresh"></i> Pending...</span>';
                    } elseif ($data->status == 1) {
                        $stat = '<span class="badge bg-success"><i class="fa fa-check"></i> Confirmed</span>';
                    } else {
                        $stat = '<span class="badge bg-danger"><i class="fa fa-close"></i> Canceled</span>';
                    }

                    if ($data->ad_type == 1) {
                        $adtype = "Paid Product";
                    } else {
                        $adtype = "Free Product";
                    }

                    $image = $data->Images ? '<img src="/storage/assets/uploads/' . $data->Images . '" class="img-thumbnail"
                class="img-thumbnail" height="50%">' : '<img src="/storage/assets/images/avatar_nzuzi_default.png" class="img-thumbnail"
                class="img-thumbnail" height="50%">';
                    $users = Auth::user()->id ?? 'session expired';
                    $countImage = DB::table('tbl_imgs')->where('upload_id', $data->ImageIDS)->count();

                    $view = '<a href="' . route('user.photosbuy', ['upload_id' => encrypt($data->ImageIDS)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><i
                            class="fas fa-image"></i>
                            view photo (' . $countImage . ')
                        </a>';


                    $html = "";
                    $html = '<div class="py-4 row">
                     <div class="col-md-6">
                        <div class="row">

                          <div class="col-md-5">
                               <center>
                               <div style="border: 1px solid #ccc;height:auto;">
                                   <p class="mt-2 PClass">
                                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                           <center>
                                               <div class="carousel-inner" >
                                                     <div class="carousel-item ' . $slide . '">
                                                     ' . $image . '
                                                     </div>
                                                 </div>
                                           </center>
                                       </div>
                                    ' . $view . '
                                   </p>
                               </div>
                           </center>
                         </div>
                         <div class="col-md-7">
                         <div class="card-body">
                             <h6 class="card-title fw-bold">' . Str::title($data->item_name) . '</h6>
                             <h5 class="card-text fw-bolder"><span style="color: #ff7519;">' . $data->currency . ' ' . number_format($data->price, 2) . '
                                     </span>
                                 <br><span class="strikeCss" style="font-weight: bold;"><strike> ' . $data->currency . ' ' . number_format($data->old_price, 2) . '</strike></span>
                             </h5>
                             <span class="d-flex"> <span class="hrefCsslink_x"
                                     style="font-weight: bold">Color:</span>&nbsp;<span
                                     class="py-2mt-1" style="
                                      display: inline-block;
                                     font-size: 12px;
                                     font-weight: bold;
                                     line-height: 15px;
                                     color: #9f9f9f;
                                     width: 20px;
                                     height: 15px;
                                     background-color: ' . $data->product_color . ';
                                     text-transform: uppercase;
                                     padding-right: 16px;
                                     padding-left: 16px;
                                     padding-top: 10px;
                                     padding-bottom: 10px;
                                     -webkit-border-radius: 6px;
                                     -moz-border-radius: 6px;
                                     border-radius: 6px;
                                     margin-bottom: 2px;
                                     box-shadow: 1px 1px #888888;
                                     "></span></span>
                             <span class="mb-2 d-flex hrefCsslink_x"><span
                                     style="font-weight: bold">Product&nbsp;type:</span>&nbsp;
                                     ' . $data->product_type . '</span>
                             <span class="mb-2 d-flex hrefCsslink_x"><span
                                     style="font-weight: bold">Quantity:</span>&nbsp; ' . $data->qty . '
                                 </span>
                             <span class="mb-2 d-flex hrefCsslink_x"><span
                                     style="font-weight: bold">Views:</span>&nbsp; ' . $data->views . '</span>

                            <span class="mb-2 d-flex hrefCsslink_x"><span
                            style="font-weight: bold">Status:</span>&nbsp; ' . $stat . '</span>
                            <span class="mb-2 d-flex hrefCsslink_x"><span
                            style="font-weight: bold">Order Number:</span>&nbsp; ' . $data->order_number . '
                        </span>
                            <span data-bs-toggle="modal"
                            data-bs-target="#showseller_Modal">
                            <button type="button"
                            data-pid="' . $data->user_id_seller . '"
                            data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Seller Details"
                            class="mt-3 btn btn-outline w-100 DetailsBtn btn-viewuserdetials">
                            <i class="fa fa-user"></i> Seller Details</button>
                            </span>

                          </div>
                      </div>


                    </div>
                 </div>

                 <div class="col-md-6">
                     <div class="mb-3 card card6">
                         <div class="card-header"
                             style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold">
                             <div class="row">
                                 <div class="col-11" style="font-size: 13px!important"><i
                                         class="fas fa-tags"></i> Order Settings
                                 </div>

                             </div>
                         </div>

                         <div class="card-body">
                         <span class="mb-3 d-flex hrefCsslink_x"><span
                                 style="font-weight: bold">Order on:</span>&nbsp;  ' . Carbon::parse($data->order_on)->diffForHumans() . '</span>
                         <span class="mb-3 d-flex hrefCsslink_x"><span
                                 style="font-weight: bold">Expired on:</span>&nbsp; ' . $data->expired_on . '</span>
                         <span class="mb-3 d-flex hrefCsslink_x"><span style="font-weight: bold">
                                 <font color="#f25433">Delete on:</font>
                             </span>&nbsp; ' . $data->delete_on . '</span>
                         <span class="mb-3 d-flex hrefCsslink_x"><span
                                 style="font-weight: bold"><span class="badge rounded-pill bg"
                                     style="background-color: #FE980F;color:#ffffff">' . today()->diffInDays(Carbon::parse($data->order_on)->toDateString()) - $data->product_durations . '</span></span>&nbsp;
                             Days Remaining (' . $adtype . ')</span>


                                 <div class="row g-1">
                                 <div class="col-4">
                                 <a href="' . route('user.viewdetailsmyorders', ['upload_id' => encrypt($data->ImageIDS), 'product_id' => encrypt($data->productID)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><button type="button"
                                     class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_xx1" disabled="disabled">
                                     <i class=" fas fa-user-minus"></i> Pending </button></a>
                                 </div>
                                     <div class="col-4">
                                         <a href="' . route('user.viewdetailsmyorders', ['upload_id' => encrypt($data->ImageIDS), 'product_id' => encrypt($data->productID)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><button type="button"
                                             class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_xx2" disabled="disabled">
                                             <i class="fas fa-user-check"></i> Confirm </button></a>
                                     </div>

                                     <div class="col-4">
                                       <button type="button" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif" data-can="' . encrypt($data->purchase_id) . '"
                                             class="mt-2 btn-cancelproductitem btn btn-outline btn-lg w-100 DetailsBtns2_xx3"  disabled="disabled">
                                             <i class="fas fa-user-times"></i>  Cancel </button>
                                     </div>
                                 </div>
                         </div>
                     </div>
                 </div>

                 </div>
                </div>
              ';
                    return $html;
                })

                ->addColumn('action', function ($data) {
                    return '';
                })
                ->rawColumns(['image_name', 'action'])
                ->make(true);
        }

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.product_id',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
                'tbl_product_items.created_at',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $fetchImage = DB::table('tbl_images')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->where('user_id', $user)
            ->select('tbl_images.id', 'tbl_imgs.image_name', 'tbl_images.product_item')->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        // $countcancelmyOrder = tbl_mping_purchase::where(['user_id_buyer' => $user, 'cancel_id' => 0])->count();

        return view('user.mpingiusers.canceled', ['countries' => $countries], compact('getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'ProductItems', 'fetchImage'))->render();

    }

    /////////////////////end for cancel order item////////////////////////////////////////


    // ///////////////////////////purchase products list////////////////////////////
    public function ViewPurchases(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();
        // $pagination = Tbl_products_item::latest()->paginate(5);

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.product_id',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
                'tbl_product_items.created_at',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();


        $ProductItems = DB::table('tbl_product_items')
            ->select('*', 'users.product_duration as PDurations', 'tbl_product_items.id as ProductItem_id', 'tbl_product_items.item_name', 'tbl_product_items.created_at', 'tbl_images.product_item', 'tbl_images.id as ImageIDS', 'users.product_duration')
            ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            //  ->leftjoin('tbl_imgs','tbl_imgs.product_item_id','=','tbl_product_items.id')
            ->where(['tbl_product_items.user_id' => $user, 'tbl_product_items.expire_status' => 1])
            ->get();


        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countBuyerId = DB::table('users')
            ->selectRaw('count(tbl_mping_purchases.user_id_buyer) as buyer_cnt')
            ->leftjoin('tbl_mping_purchases', 'tbl_mping_purchases.user_id_buyer', '=', 'users.id')
            ->where('users.id', $user)
            ->groupBy('tbl_mping_purchases.user_id_buyer')
            ->get();

        $countmyOrder = tbl_mping_purchase::where(['user_id_buyer' => $user, 'cancel_id' => 1])->count();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $fetchImage = DB::table('tbl_images')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->where('user_id', $user)
            ->select('tbl_images.id', 'tbl_imgs.image_name', 'tbl_images.product_item')->get();

        //count free,paid, expired products
        $freeproducts = Tbl_products_item::select(DB::raw("(COUNT(*)) as countfree"))
            ->where(['user_id' => $user, 'ad_type' => '0', 'expire_status' => '1'])
            ->get();

        $paidproducts = Tbl_products_item::select(DB::raw("(COUNT(*)) as countpaid"))
            ->where(['user_id' => $user, 'ad_type' => '1', 'expire_status' => '1'])
            ->get();

        $expiredproducts = Tbl_products_item::select(DB::raw("(COUNT(*)) as countexpired"))
            ->where(['user_id' => $user, 'expire_status' => '0'])
            ->get();



        return view('user.mpingiusers.purchases', ['countries' => $countries], compact('countmyOrder', 'countBuyerId', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'ProductItems', 'fetchImage', 'freeproducts', 'paidproducts', 'expiredproducts'))->render();
    }


    public function FetchallPurchasesproducts(Request $request)
    {

        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();


        if ($request->ajax()) {


            $data = tbl_mping_purchase::query()
                ->select(
                    DB::raw("count(tbl_imgs.upload_id) as upload_ids"),
                    'tbl_product_items.user_id as Productitem_id',
                    'tbl_product_items.post_date_of_item',
                    'tbl_product_items.category_id',
                    'tbl_product_items.sub_category_id',
                    'tbl_product_items.article_id',
                    'tbl_product_items.id as productID',
                    'tbl_product_items.product_id',
                    'tbl_product_items.sub_product_id',
                    'tbl_product_items.item_name',
                    'tbl_product_items.product_type',
                    'tbl_product_items.brand_name',
                    'tbl_product_items.brand_id',
                    'tbl_product_items.pieces',
                    'tbl_product_items.price',
                    'tbl_product_items.old_price',
                    'tbl_product_items.color_id',
                    'tbl_product_items.sub_color_id',
                    'tbl_product_items.price_range_start',
                    'tbl_product_items.price_range_end',
                    'tbl_product_items.product_color',
                    'tbl_product_items.place_of_origin',
                    'tbl_product_items.city',
                    'tbl_product_items.state_id',
                    'tbl_product_items.item_descriptions',
                    'tbl_product_items.item_images',
                    'tbl_product_items.supplier_name',
                    'tbl_product_items.supplier_region',
                    'tbl_product_items.type',
                    'tbl_product_items.post_expiry_date',
                    'tbl_product_items.post_delete_date',
                    'tbl_product_items.post_date_count',
                    'tbl_product_items.post_expiry_count',
                    'tbl_product_items.post_delete_count',
                    'tbl_product_items.expire_status',
                    'tbl_product_items.ad_type',
                    'tbl_product_items.views',
                    'tbl_product_items.shipping',
                    'tbl_product_items.shipping_price',
                    'tbl_product_items.price_id',
                    'tbl_product_items.rate',
                    'tbl_product_items.total_rate',
                    'tbl_product_items.hits',
                    'tbl_product_items.payment',
                    'tbl_product_items.weight',
                    'tbl_product_items.volume',
                    'tbl_product_items.delivery',
                    'tbl_product_items.day_return',
                    'tbl_product_items.negotiable',
                    'tbl_product_items.currency',
                    'tbl_product_items.category',
                    'tbl_product_items.product_web_name',
                    'tbl_product_items.product_web_link',
                    'tbl_product_items.disponibility',
                    'tbl_product_items.created_at',
                    'tbl_mping_purchases.product_item',
                    'tbl_mping_purchases.id as purchase_id',
                    'tbl_mping_purchases.user_id_seller',
                    'tbl_mping_purchases.sub_product_id',
                    'tbl_mping_purchases.quantity as qty',
                    'tbl_mping_purchases.user_id_buyer',
                    'tbl_mping_purchases.status',
                    'tbl_mping_purchases.item_images',
                    'tbl_mping_purchases.order_number',
                    'tbl_mping_purchases.cancel_id',
                    'tbl_mping_purchases.created_at as order_on',
                    'tbl_mping_purchases.remainingdays_status',
                    'tbl_mping_purchases.post_expiry_date as expired_on',
                    'tbl_mping_purchases.post_delete_on as delete_on',
                    'tbl_mping_purchases.product_durations as product_durations',
                    'tbl_images.id as ImageIDS',
                    'tbl_imgs.image_name as Images',
                    'tbl_imgs.image_name',
                    'tbl_images.product_item',
                    'countries.name as countryname',
                    'countries.flag',
                    'states.name as statename',
                    'cities.name as cityname',
                    'users.profile',
                    'users.first_name',
                    'users.middle_name',
                    'users.last_name',
                    'users.gender',
                    'users.date',
                    'users.month',
                    'users.year',
                    'users.country',
                    'users.country_id',
                    'users.state_id',
                    'users.mobile',
                    'users.pobox',
                    'users.phone',
                    'users.address_1',
                    'users.email',
                    'users.address_2',
                    'tbl_mping_businesses.business_name',
                )

                ->leftjoin('tbl_product_items', 'tbl_product_items.id', '=', 'tbl_mping_purchases.product_id')
                ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
                ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
                ->leftjoin('countries', 'countries.id', '=', 'tbl_mping_purchases.country_id')
                ->leftjoin('states', 'states.id', '=', 'tbl_mping_purchases.state_id')
                ->leftjoin('cities', 'cities.id', '=', 'tbl_mping_purchases.city_id')
                ->leftjoin('users', 'users.id', '=', 'tbl_mping_purchases.user_id_buyer')
                ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'tbl_mping_purchases.user_id_buyer')
                ->where(['tbl_mping_purchases.user_id_buyer' => $user, 'tbl_mping_purchases.cancel_id' => 1])
                ->groupBy('tbl_imgs.upload_id')
                //   ->distinct('item_name')
                ->get();


            foreach ($data as $datas) {

                tbl_mping_purchase::where([
                    ['user_id_buyer', $user],
                    ['created_at', '<', Carbon::now()->subDay(5)],
                ])->delete(); //[my order delete if met 5 days
            }

            return Datatables::of($data)

                ->addColumn('image_name', function ($data) {



                    $slide = "";
                    $image = "";
                    $view = "";
                    $adtype = "";
                    $deleteitem = "";
                    $stat = "";
                    $res = "";
                    if ($data->ImageIDS != "") {
                        $slide = 'active';
                    } else {
                        $slide = '';
                    }

                    if ($data->status == 0) {
                        $stat = '<span class="badge bg-warning text-light"><i class="fa fa-refresh"></i> Pending...</span>';
                    } elseif ($data->status == 1) {
                        $stat = '<span class="badge bg-success"><i class="fa fa-check"></i> Confirmed</span>';
                    } else {
                        $stat = '<span class="badge bg-danger"><i class="fa fa-close"></i> Canceled</span>';
                    }

                    if ($data->ad_type == 1) {
                        $adtype = "Paid Product";
                    } else {
                        $adtype = "Free Product";
                    }

                    $image = $data->Images ? '<img src="/storage/assets/uploads/' . $data->Images . '" class="img-thumbnail"
                class="img-thumbnail" height="50%">' : '<img src="/storage/assets/images/avatar_nzuzi_default.png" class="img-thumbnail"
                class="img-thumbnail" height="50%">';
                    $users = Auth::user()->id ?? 'session expired';
                    $countImage = DB::table('tbl_imgs')->where('upload_id', $data->ImageIDS)->count();

                    $view = '<a href="' . route('user.photosbuy', ['upload_id' => encrypt($data->ImageIDS)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><i
                            class="fas fa-image"></i>
                            view photo (' . $countImage . ')
                        </a>';


                    $html = "";
                    $html = '<div class="py-4 row">
                     <div class="col-md-6">
                        <div class="row">

                          <div class="col-md-5">
                               <center>
                               <div style="border: 1px solid #ccc;height:auto;">
                                   <p class="mt-2 PClass">
                                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                           <center>
                                               <div class="carousel-inner" >
                                                     <div class="carousel-item ' . $slide . '">
                                                     ' . $image . '
                                                     </div>
                                                 </div>
                                           </center>
                                       </div>
                                    ' . $view . '
                                   </p>
                               </div>
                           </center>
                         </div>

                         <div class="col-md-7">
                          <div class="card-body">
                             <h6 class="card-title fw-bold">' . Str::title($data->item_name) . '</h6>
                             <h5 class="card-text fw-bolder"><span style="color: #ff7519;">' . $data->currency . ' ' . number_format($data->price, 2) . '
                                     </span>
                                 <br><span class="strikeCss" style="font-weight: bold;"><strike> ' . $data->currency . ' ' . number_format($data->old_price, 2) . '</strike></span>
                             </h5>
                             <span class="d-flex"> <span class="hrefCsslink_x"
                                     style="font-weight: bold">Color:</span>&nbsp;<span
                                     class="py-2mt-1" style="
                                      display: inline-block;
                                     font-size: 12px;
                                     font-weight: bold;
                                     line-height: 15px;
                                     color: #9f9f9f;
                                     width: 20px;
                                     height: 15px;
                                     background-color: ' . $data->product_color . ';
                                     text-transform: uppercase;
                                     padding-right: 16px;
                                     padding-left: 16px;
                                     padding-top: 10px;
                                     padding-bottom: 10px;
                                     -webkit-border-radius: 6px;
                                     -moz-border-radius: 6px;
                                     border-radius: 6px;
                                     margin-bottom: 2px;
                                     box-shadow: 1px 1px #888888;
                                     "></span></span>
                             <span class="mb-2 d-flex hrefCsslink_x"><span
                                     style="font-weight: bold">Product&nbsp;type:</span>&nbsp;
                                     ' . $data->product_type . '</span>
                             <span class="mb-2 d-flex hrefCsslink_x"><span
                                     style="font-weight: bold">Quantity:</span>&nbsp; ' . $data->qty . '
                                 </span>
                             <span class="mb-2 d-flex hrefCsslink_x"><span
                                     style="font-weight: bold">Views:</span>&nbsp; ' . $data->views . '</span>

                            <span class="mb-2 d-flex hrefCsslink_x"><span
                            style="font-weight: bold">Status:</span>&nbsp; ' . $stat . '</span>
                            <span class="mb-2 d-flex hrefCsslink_x"><span
                            style="font-weight: bold">Order Number:</span>&nbsp; ' . $data->order_number . '
                        </span>
                            <span data-bs-toggle="modal"
                            data-bs-target="#showseller_Modal">
                            <button type="button"
                            data-pid="' . $data->user_id_seller . '"
                            data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Seller Details"
                            class="mt-3 btn btn-outline w-100 DetailsBtn btn-viewuserdetials">
                            <i class="fa fa-user"></i> Seller Details</button>
                            </span>


                          </div>
                      </div>


                    </div>
                 </div>

                 <div class="col-md-6">
                     <div class="mb-3 card card6">
                         <div class="card-header"
                             style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold">
                             <div class="row">
                                 <div class="col-11" style="font-size: 13px!important"><i
                                         class="fas fa-tags"></i> Order Settings
                                 </div>

                             </div>
                         </div>

                         <div class="card-body">
                             <span class="mb-3 d-flex hrefCsslink_x"><span
                                     style="font-weight: bold">Order on:</span>&nbsp;  ' . Carbon::parse($data->order_on)->diffForHumans() . '</span>
                             <span class="mb-3 d-flex hrefCsslink_x"><span
                                     style="font-weight: bold">Expired on:</span>&nbsp; ' . $data->expired_on . '</span>
                             <span class="mb-3 d-flex hrefCsslink_x"><span style="font-weight: bold">
                                     <font color="#f25433">Delete on:</font>
                                 </span>&nbsp; ' . $data->delete_on . '</span>
                             <span class="mb-3 d-flex hrefCsslink_x"><span
                                     style="font-weight: bold"><span class="badge rounded-pill bg"
                                         style="background-color: #FE980F;color:#ffffff">' . today()->diffInDays(Carbon::parse($data->order_on)->toDateString()) - $data->product_durations . '</span></span>&nbsp;
                                 Days Remaining (' . $adtype . ')</span>

                             <div class="row g-1">
                             <div class="col-4">
                             <a href="' . route('user.viewdetailsmyorders', ['upload_id' => encrypt($data->ImageIDS), 'product_id' => encrypt($data->productID)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><button type="button"
                                 class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_xx1" disabled="disabled">
                                 <i class=" fas fa-user-minus"></i> Pending </button></a>
                             </div>
                                 <div class="col-4">
                                     <a href="' . route('user.viewdetailsmyorders', ['upload_id' => encrypt($data->ImageIDS), 'product_id' => encrypt($data->productID)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><button type="button"
                                         class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_xx2" disabled="disabled">
                                         <i class="fas fa-user-check"></i> Confirm </button></a>
                                 </div>

                                 <div class="col-4">
                                   <button type="button" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif" data-can="' . encrypt($data->purchase_id) . '"
                                         class="mt-2 btn-cancelproductitem btn btn-outline btn-lg w-100 DetailsBtns2_xx3">
                                         <i class="fas fa-user-times"></i>  Cancel </button>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>

                 </div>
                </div>
              ';
                    return $html;
                })

                ->addColumn('action', function ($data) {
                    return '';
                })
                ->rawColumns(['image_name', 'action'])
                ->make(true);
        }

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.product_id',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
                'tbl_product_items.created_at',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $fetchImage = DB::table('tbl_images')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->where('user_id', $user)
            ->select('tbl_images.id', 'tbl_imgs.image_name', 'tbl_images.product_item')->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        return view('user.mpingiusers.purchases', ['countries' => $countries], compact('getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'ProductItems', 'fetchImage'))->render();

    }

    public function UpdatemyPriceSingle(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'prices' => 'required|regex:/^([0-9\s\-\+\/\_\&\.\~\=\´\`\(\,)]*)$/',
            'product_id' => '',

        ], [

            'prices.required' => 'Please input New Price',
            'product_id.required' => '',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors7' => $validator->errors()]);
        }

        Tbl_products_item::where('id', decrypt($request->product_id))
            ->update([
                'price' => $request->prices
            ]);

        return response()->json([
            'status7' => 200,
        ]);
    }

    public function ViewSellerModal(Request $request)
    {
        $user = Auth::user()->id ?? 'session expired';
        $user_id_seller = DB::table('tbl_mping_purchases')
            ->select(
                'tbl_mping_purchases.product_item',
                'tbl_mping_purchases.id as purchase_id',
                'tbl_mping_purchases.user_id_seller',
                'tbl_mping_purchases.sub_product_id',
                'tbl_mping_purchases.user_id_buyer',
                'tbl_mping_purchases.status',
                'tbl_mping_purchases.item_images',
                'tbl_mping_purchases.order_number',
                'tbl_mping_purchases.cancel_id',
                'countries.name as countryname',
                'countries.flag',
                'states.name as statename',
                'cities.name as cityname',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'tbl_mping_businesses.business_name',
            )
            ->leftjoin('countries', 'countries.id', '=', 'tbl_mping_purchases.country_id')
            ->leftjoin('states', 'states.id', '=', 'tbl_mping_purchases.state_id')
            ->leftjoin('cities', 'cities.id', '=', 'tbl_mping_purchases.city_id')
            ->leftjoin('users', 'users.id', '=', 'tbl_mping_purchases.user_id_seller')
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'tbl_mping_purchases.user_id_seller')
            ->where('tbl_mping_purchases.user_id_seller', $request->purchase_id)
            ->limit(1)
            ->get();
        return response()->json([
            'status' => $user_id_seller,
        ]);

    }

    public function ViewBuyerModal(Request $request)
    {
        $user = Auth::user()->id ?? 'session expired';
        $user_id_buyer = DB::table('tbl_mping_purchases')
            ->select(
                'tbl_mping_purchases.product_item',
                'tbl_mping_purchases.id as purchase_id',
                'tbl_mping_purchases.user_id_seller',
                'tbl_mping_purchases.sub_product_id',
                'tbl_mping_purchases.user_id_buyer',
                'tbl_mping_purchases.status',
                'tbl_mping_purchases.item_images',
                'tbl_mping_purchases.order_number',
                'tbl_mping_purchases.cancel_id',
                'countries.name as countryname',
                'countries.flag',
                'states.name as statename',
                'cities.name as cityname',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'tbl_mping_businesses.business_name',
            )
            ->leftjoin('countries', 'countries.id', '=', 'tbl_mping_purchases.country_id')
            ->leftjoin('states', 'states.id', '=', 'tbl_mping_purchases.state_id')
            ->leftjoin('cities', 'cities.id', '=', 'tbl_mping_purchases.city_id')
            ->leftjoin('users', 'users.id', '=', 'tbl_mping_purchases.user_id_buyer')
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'tbl_mping_purchases.user_id_buyer')
            ->where('tbl_mping_purchases.user_id_buyer', $request->purchase_id)
            ->limit(1)
            ->get();
        return response()->json([
            'status1' => $user_id_buyer,
        ]);

    }

    public function CancelProductitemOrder(Request $request)
    {
        tbl_mping_purchase::where('id', decrypt($request->id))
            ->update(['cancel_id' => 0, 'notification' => 'He/She canceled his order']);
        return response()->json([
            'status' => 200,
        ]);
    }

    // ///////////////////////////end purchase products list////////////////////////////



    // ///////////////////////////////// sale///////////////////////////////

    public function ViewSales(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();



        $countmyOrder = tbl_mping_purchase::where(['user_id_buyer' => $user, 'cancel_id' => 1])->count();
        $countmyPostpurchases = tbl_mping_purchase::where(['user_id_seller' => $user, 'cancel_id' => 1])->count();
        return view('user.mpingiusers.sales', ['countries' => $countries], compact('countmyPostpurchases', 'countmyOrder', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }


    public function FetchallSaleproducts(Request $request)
    {

        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        if ($request->ajax()) {

            $data = tbl_mping_purchase::query()
                ->select(
                    DB::raw("count(tbl_imgs.upload_id) as upload_ids"),
                    'tbl_product_items.user_id as Productitem_id',
                    'tbl_product_items.post_date_of_item',
                    'tbl_product_items.category_id',
                    'tbl_product_items.sub_category_id',
                    'tbl_product_items.article_id',
                    'tbl_product_items.id as productID',
                    'tbl_product_items.product_id',
                    'tbl_product_items.sub_product_id',
                    'tbl_product_items.item_name',
                    'tbl_product_items.product_type',
                    'tbl_product_items.brand_name',
                    'tbl_product_items.brand_id',
                    'tbl_product_items.pieces',
                    'tbl_product_items.price',
                    'tbl_product_items.old_price',
                    'tbl_product_items.color_id',
                    'tbl_product_items.sub_color_id',
                    'tbl_product_items.price_range_start',
                    'tbl_product_items.price_range_end',
                    'tbl_product_items.product_color',
                    'tbl_product_items.place_of_origin',
                    'tbl_product_items.city',
                    'tbl_product_items.state_id',
                    'tbl_product_items.item_descriptions',
                    'tbl_product_items.item_images',
                    'tbl_product_items.supplier_name',
                    'tbl_product_items.supplier_region',
                    'tbl_product_items.type',
                    'tbl_product_items.post_expiry_date',
                    'tbl_product_items.post_delete_date',
                    'tbl_product_items.post_date_count',
                    'tbl_product_items.post_expiry_count',
                    'tbl_product_items.post_delete_count',
                    'tbl_product_items.expire_status',
                    'tbl_product_items.ad_type',
                    'tbl_product_items.views',
                    'tbl_product_items.shipping',
                    'tbl_product_items.shipping_price',
                    'tbl_product_items.price_id',
                    'tbl_product_items.rate',
                    'tbl_product_items.total_rate',
                    'tbl_product_items.hits',
                    'tbl_product_items.payment',
                    'tbl_product_items.weight',
                    'tbl_product_items.volume',
                    'tbl_product_items.delivery',
                    'tbl_product_items.day_return',
                    'tbl_product_items.negotiable',
                    'tbl_product_items.currency',
                    'tbl_product_items.category',
                    'tbl_product_items.product_web_name',
                    'tbl_product_items.product_web_link',
                    'tbl_product_items.disponibility',
                    'tbl_product_items.created_at',
                    'tbl_mping_purchases.product_item',
                    'tbl_mping_purchases.quantity as qty',
                    'tbl_mping_purchases.id as purchase_id',
                    'tbl_mping_purchases.user_id_seller',
                    'tbl_mping_purchases.sub_product_id',
                    'tbl_mping_purchases.user_id_buyer',
                    'tbl_mping_purchases.status',
                    'tbl_mping_purchases.item_images',
                    'tbl_mping_purchases.order_number',
                    'tbl_mping_purchases.cancel_id',
                    'tbl_mping_purchases.created_at as order_on',
                    'tbl_mping_purchases.post_expiry_date as expired_on',
                    'tbl_mping_purchases.post_delete_on as delete_on',
                    'tbl_mping_purchases.product_durations as product_durations',
                    'tbl_images.id as ImageIDS',
                    'tbl_imgs.image_name as Images',
                    'tbl_imgs.image_name',
                    'tbl_images.product_item',
                    'countries.name as countryname',
                    'countries.flag',
                    'states.name as statename',
                    'cities.name as cityname',
                    'users.profile',
                    'users.first_name',
                    'users.middle_name',
                    'users.last_name',
                    'users.gender',
                    'users.date',
                    'users.month',
                    'users.year',
                    'users.country',
                    'users.country_id',
                    'users.state_id',
                    'users.mobile',
                    'users.pobox',
                    'users.phone',
                    'users.address_1',
                    'users.email',
                    'users.address_2',
                    'tbl_mping_businesses.business_name',
                )

                ->leftjoin('tbl_product_items', 'tbl_product_items.id', '=', 'tbl_mping_purchases.product_id')
                ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
                ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
                ->leftjoin('countries', 'countries.id', '=', 'tbl_mping_purchases.country_id')
                ->leftjoin('states', 'states.id', '=', 'tbl_mping_purchases.state_id')
                ->leftjoin('cities', 'cities.id', '=', 'tbl_mping_purchases.city_id')
                ->leftjoin('users', 'users.id', '=', 'tbl_mping_purchases.user_id_buyer')
                ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'tbl_mping_purchases.user_id_buyer')
                ->where(['tbl_mping_purchases.user_id_seller' => $user, 'tbl_mping_purchases.cancel_id' => 1])
                ->groupBy('tbl_imgs.upload_id')
                //   ->distinct('item_name')
                ->get();


            foreach ($data as $datas) {

                tbl_mping_purchase::where([
                    ['user_id_buyer', $user],
                    ['created_at', '<', Carbon::now()->subDay(5)],
                ])->delete(); //[my order delete if met 5 days
            }


            return Datatables::of($data)

                ->addColumn('image_name', function ($data) {

                    $slide = "";
                    $image = "";
                    $view = "";
                    $adtype = "";
                    $deleteitem = "";
                    $stat = "";
                    $res = "";
                    if ($data->ImageIDS != "") {
                        $slide = 'active';
                    } else {
                        $slide = '';
                    }

                    if ($data->status == 0) {
                        $stat = '<span class="badge bg-warning text-light"><i class="fa fa-refresh"></i> Pending...</span>';
                    } elseif ($data->status == 1) {
                        $stat = '<span class="badge bg-success"><i class="fa fa-check"></i> Confirmed</span>';
                    } else {
                        $stat = '<span class="badge bg-danger"><i class="fa fa-close"></i> Canceled</span>';
                    }

                    if ($data->ad_type == 1) {
                        $adtype = "Paid Product";
                    } else {
                        $adtype = "Free Product";
                    }

                    $image = $data->Images ? '<img src="/storage/assets/uploads/' . $data->Images . '" class="img-thumbnail"
                class="img-thumbnail" height="50%">' : '<img src="/storage/assets/images/avatar_nzuzi_default.png" class="img-thumbnail"
                class="img-thumbnail" height="50%">';
                    $users = Auth::user()->id ?? 'session expired';
                    $countImage = DB::table('tbl_imgs')->where('upload_id', $data->ImageIDS)->count();

                    $view = '<a href="' . route('user.viewphotosmyorder', ['upload_id' => encrypt($data->ImageIDS)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><i
                            class="fas fa-image"></i>
                            view photo (' . $countImage . ')
                        </a>';


                    $html = "";
                    $html = '<div class="py-4 row">
                     <div class="col-md-6">
                        <div class="row">

                          <div class="col-md-5">
                               <center>
                               <div style="border: 1px solid #ccc;height:auto;">
                                   <p class="mt-2 PClass">
                                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                           <center>
                                               <div class="carousel-inner" >
                                                     <div class="carousel-item ' . $slide . '">
                                                     ' . $image . '
                                                     </div>
                                                 </div>
                                           </center>
                                       </div>
                                    ' . $view . '
                                   </p>
                               </div>
                           </center>
                         </div>
                         <div class="col-md-7">
                         <div class="card-body">
                             <h6 class="card-title fw-bold">' . Str::title($data->item_name) . '</h6>
                             <h5 class="card-text fw-bolder"><span style="color: #ff7519;">' . $data->currency . ' ' . number_format($data->price, 2) . '
                                     </span>
                                 <br><span class="strikeCss" style="font-weight: bold;"><strike> ' . $data->currency . ' ' . number_format($data->old_price, 2) . '</strike></span>
                             </h5>
                             <span class="d-flex"> <span class="hrefCsslink_x"
                                     style="font-weight: bold">Color:</span>&nbsp;<span
                                     class="py-2mt-1" style="
                                      display: inline-block;
                                     font-size: 12px;
                                     font-weight: bold;
                                     line-height: 15px;
                                     color: #9f9f9f;
                                     width: 20px;
                                     height: 15px;
                                     background-color: ' . $data->product_color . ';
                                     text-transform: uppercase;
                                     padding-right: 16px;
                                     padding-left: 16px;
                                     padding-top: 10px;
                                     padding-bottom: 10px;
                                     -webkit-border-radius: 6px;
                                     -moz-border-radius: 6px;
                                     border-radius: 6px;
                                     margin-bottom: 2px;
                                     box-shadow: 1px 1px #888888;
                                     "></span></span>
                             <span class="mb-2 d-flex hrefCsslink_x"><span
                                     style="font-weight: bold">Product&nbsp;type:</span>&nbsp;
                                     ' . $data->product_type . '</span>
                             <span class="mb-2 d-flex hrefCsslink_x"><span
                                     style="font-weight: bold">Quantity:</span>&nbsp; ' . $data->qty . '
                                 </span>
                             <span class="mb-2 d-flex hrefCsslink_x"><span
                                     style="font-weight: bold">Views:</span>&nbsp; ' . $data->views . '</span>

                            <span class="mb-2 d-flex hrefCsslink_x"><span
                            style="font-weight: bold">Status:</span>&nbsp; ' . $stat . '</span>
                            <span class="mb-2 d-flex hrefCsslink_x"><span
                            style="font-weight: bold">Order Number:</span>&nbsp; ' . $data->order_number . '
                        </span>
                            <span data-bs-toggle="modal"
                            data-bs-target="#showbuyer_Modal">
                            <button type="button"
                            data-pid2="' . $data->user_id_buyer . '"
                            data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Buyer Details"
                            class="mt-3 btn btn-outline w-100 DetailsBtn btn-viewuserdetials2">
                            <i class="fa fa-user"></i> Buyer Details</button>
                            </span>


                          </div>
                      </div>


                    </div>
                 </div>

                 <div class="col-md-6">
                     <div class="mb-3 card card6">
                         <div class="card-header"
                             style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold">
                             <div class="row">
                                 <div class="col-11" style="font-size: 13px!important"><i
                                         class="fas fa-tags"></i> Order Settings
                                 </div>

                             </div>
                         </div>

                         <div class="card-body">
                         <span class="mb-3 d-flex hrefCsslink_x"><span
                                 style="font-weight: bold">Order on:</span>&nbsp;  ' . Carbon::parse($data->order_on)->diffForHumans() . '</span>
                         <span class="mb-3 d-flex hrefCsslink_x"><span
                                 style="font-weight: bold">Expired on:</span>&nbsp; ' . $data->expired_on . '</span>
                         <span class="mb-3 d-flex hrefCsslink_x"><span style="font-weight: bold">
                                 <font color="#f25433">Delete on:</font>
                             </span>&nbsp; ' . $data->delete_on . '</span>
                         <span class="mb-3 d-flex hrefCsslink_x"><span
                                 style="font-weight: bold"><span class="badge rounded-pill bg"
                                     style="background-color: #FE980F;color:#ffffff">' . today()->diffInDays(Carbon::parse($data->order_on)->toDateString()) - $data->product_durations . '</span></span>&nbsp;
                             Days Remaining (' . $adtype . ')</span>

                         <div class="row g-1">
                         <div class="col-4">
                         <a href="' . route('user.viewdetailsmyorders', ['upload_id' => encrypt($data->ImageIDS), 'product_id' => encrypt($data->productID)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><button type="button"
                             class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_xx1" disabled="disabled">
                             <i class=" fas fa-user-minus"></i> Pending </button></a>
                         </div>
                             <div class="col-4">
                                 <a href="JavaScript:void(0)" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><button type="button"
                                     class="mt-2 btn-confirm btn btn-outline btn-lg w-100 DetailsBtns2_xx2" data-sid="' . encrypt($data->purchase_id) . '">
                                     <i class="fas fa-user-check"></i> Confirm </button></a>
                             </div>

                             <div class="col-4">
                               <button type="button" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif" data-can="' . encrypt($data->purchase_id) . '"
                                     class="mt-2 btn-cancelproductitem btn btn-outline btn-lg w-100 DetailsBtns2_xx3">
                                     <i class="fas fa-user-times"></i>  Cancel </button>
                             </div>
                         </div>
                     </div>

                 </div>

                 </div>
                </div>
              ';
                    return $html;
                })

                ->addColumn('action', function ($data) {
                    return '';
                })
                ->rawColumns(['image_name', 'action'])
                ->make(true);
        }

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.product_id',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
                'tbl_product_items.created_at',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $fetchImage = DB::table('tbl_images')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->where('user_id', $user)
            ->select('tbl_images.id', 'tbl_imgs.image_name', 'tbl_images.product_item')->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();



        return view('user.mpingiusers.sales', ['countries' => $countries], compact('getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'ProductItems', 'fetchImage'))->render();

    }

    public function ComfirmOrder(Request $request)
    {
        tbl_mping_purchase::where(['id' => decrypt($request->id)])
            ->update([
                'status' => 1,
            ]);

        return response()->json([
            'status' => 200,
        ]);
    }
    // /////////////////////////////////end sale///////////////////////////////

    public function ViewViewindusty()
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        return view('user.mpingiusers.view_industry', ['countries' => $countries], compact('getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }


    public function ViewExpireservices()
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        return view('user.mpingiusers.expire_industry', ['countries' => $countries], compact('getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }

    public function ViewBusiness(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();
        // $pagination = Tbl_products_item::latest()->paginate(5);

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.product_id',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
                'tbl_product_items.created_at',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();


        $ProductItems = DB::table('tbl_product_items')
            ->select('*', 'users.product_duration as PDurations', 'tbl_product_items.id as ProductItem_id', 'tbl_product_items.item_name', 'tbl_product_items.created_at', 'tbl_images.product_item', 'tbl_images.id as ImageIDS', 'users.product_duration')
            ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            //  ->leftjoin('tbl_imgs','tbl_imgs.product_item_id','=','tbl_product_items.id')
            ->where(['tbl_product_items.user_id' => $user, 'tbl_product_items.expire_status' => 1])
            ->get();


        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $fetchImage = DB::table('tbl_images')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->where('user_id', $user)
            ->select('tbl_images.id', 'tbl_imgs.image_name', 'tbl_images.product_item')->get();

        //count free,paid, expired products
        $freeproducts = Tbl_products_item::select(DB::raw("(COUNT(*)) as countfree"))
            ->where(['user_id' => $user, 'ad_type' => '0', 'expire_status' => '1'])
            ->get();

        $paidproducts = Tbl_products_item::select(DB::raw("(COUNT(*)) as countpaid"))
            ->where(['user_id' => $user, 'ad_type' => '1', 'expire_status' => '1'])
            ->get();

        $expiredproducts = Tbl_products_item::select(DB::raw("(COUNT(*)) as countexpired"))
            ->where(['user_id' => $user, 'expire_status' => '0'])
            ->get();


        $countServiceItems = DB::table('users')
            ->selectRaw('count(tbl_service_items.user_id) as cnt')
            ->leftjoin('tbl_service_items', 'tbl_service_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_service_items.user_id')
            ->get();

        return view('user.mpingiusers.view_business', ['countries' => $countries], compact('countServiceItems', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'ProductItems', 'fetchImage', 'freeproducts', 'paidproducts', 'expiredproducts'))->render();

    }


    public function FetchAllBusinessItems(Request $request)
    {

        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        if ($request->ajax()) {
            $data = tbl_service_items::query()
                ->select(
                    'users.profile',
                    'users.first_name',
                    'users.middle_name',
                    'users.last_name',
                    'users.gender',
                    'users.date',
                    'users.month',
                    'users.year',
                    'users.country',
                    'users.country_id',
                    'users.state_id',
                    'users.mobile',
                    'users.pobox',
                    'users.phone',
                    'users.address_1',
                    'users.email',
                    'users.address_2',
                    'users.service_duration_business',
                    'users.product_duration',
                    'tbl_service_items.id',
                    'tbl_service_items.post_date_of_item',
                    'tbl_service_items.mainservice_id',
                    'tbl_service_items.user_id',
                    'tbl_service_items.service_id',
                    'tbl_service_items.sub_service_id',
                    'tbl_service_items.sub_service_1_id',
                    'tbl_service_items.sub_service_2_id',
                    'tbl_service_items.sub_service_3_id',
                    'tbl_service_items.first_name',
                    'tbl_service_items.last_name',
                    'tbl_service_items.universities_name',
                    'tbl_service_items.department',
                    'tbl_service_items.job_title',
                    'tbl_service_items.company_name',
                    'tbl_service_items.company_type',
                    'tbl_service_items.company_motto',
                    'tbl_service_items.company_logo',
                    'tbl_service_items.company_banner',
                    'tbl_service_items.description',
                    'tbl_service_items.p_box',
                    'tbl_service_items.address',
                    'tbl_service_items.city',
                    'tbl_service_items.state',
                    'tbl_service_items.country',
                    'tbl_service_items.postal_code',
                    'tbl_service_items.phone',
                    'tbl_service_items.mobile',
                    'tbl_service_items.email',
                    'tbl_service_items.fax',
                    'tbl_service_items.website',
                    'tbl_service_items.question_1',
                    'tbl_service_items.question_2',
                    'tbl_service_items.question_3',
                    'tbl_service_items.question_4',
                    'tbl_service_items.question_5',
                    'tbl_service_items.question_6',
                    'tbl_service_items.president',
                    'tbl_service_items.advertising',
                    'tbl_service_items.sales',
                    'tbl_service_items.purchasing',
                    'tbl_service_items.marketing',
                    'tbl_service_items.engineering',
                    'tbl_service_items.ad_type',
                    'tbl_service_items.post_expiry_date',
                    'tbl_service_items.post_delete_date',
                    'tbl_service_items.post_date_count',
                    'tbl_service_items.post_expiry_count',
                    'tbl_service_items.post_delete_count',
                    'tbl_service_items.expire_status',
                    'tbl_service_items.views',
                    'tbl_service_items.rate',
                    'tbl_service_items.total_rate',
                    'tbl_service_items.hits',
                    'tbl_service_items.images',
                    'tbl_service_items.company_color',
                    'tbl_service_items.company_title_color',
                    'tbl_service_items.created_at'
                )
                ->leftjoin('users', 'users.id', '=', 'tbl_service_items.user_id')
                ->where(['tbl_service_items.user_id' => $user, 'tbl_service_items.expire_status' => 1])
                ->get();

            foreach ($data as $datas) {


                tbl_service_items::where([
                    ['user_id', $user],
                    ['created_at', '<', Carbon::now()->subDay(31)],
                    ['id', $datas->id],
                ])->update(['expire_status' => '0']); //expire_status is update to 0 if met 31 days


                tbl_service_items::where([
                    ['user_id', $user],
                    ['created_at', '<', Carbon::now()->subDay(76)],
                    ['id', $datas->id],
                ])->delete(); //[product post is delete if met 76 days

            }



            return Datatables::of($data)

                ->addColumn('image_name', function ($data) {
                    // '.route('user.businesslogoimage').'
                    //     <a href="'.route('user.businesslogoimage', ['id' => encrypt($data->id)]).'" class="hrefCssc_" style="font-weight: bold;"><span style="text-transform: uppercase;">'.$data->company_name.'</span></a>
                    $image = $data->company_logo ? '<img src="/storage/assets/uploads/' . $data->company_logo . '" class="img-thumbnail" style="height:100px">' : '<img src="' . url('/assets/images/business-logo.png') . '" class="img-thumbnail"
            class="img-thumbnail" height="50%">';
                    $html = "";
                    $html = '<div class="py-4 row">
                     <div class="col-md-7">
                        <div class="row">
                         <div class="col-md-12">
                             <center>


                                <div class="" style="width:100%">
                                 <div class="px-4 pt-0 pb-4 cover">
                                  <div class="row g-3" style="position:absolute">
                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                         <a href="' . route('user.businesslogoimage', ['id' => encrypt($data->id)]) . '" class="hrefCss_"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="ADD BUSINESS LOGO"><center><h3 class="text-centers">' . $data->company_name . '</h3></center></a>
                                    </div>
                                 </div>
                                  <div class="media align-items-start profile-head">
                                   <br>
                                   <div class="mt-3 mr-3 profile businesslogoCssz" style="float:left">
                                             ' . $image . '
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#UploadBusinessLogoModal" data-ids="' . $data->id . '" data-photo="' . $data->company_logo . '" class="btn_businessphoto hrefCss_"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="ADD BUSINESS LOGO"><span class="logotext">BUSINESS LOGO</span>
                                            </a>
                                            <br><Br>


                                     </div>


                                </div>
                                </div>
                             </center>


                 </div>
                 </div>
                   </div>

                  <div class="col-md-5">
                     <div class="mb-3 card card6">
                         <div class="card-header"
                             style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold">
                             <div class="row">
                                 <div class="col-11" style="font-size: 13px!important"><i
                                                        class="fa fa-briefcase"></i> Business Settings
                                 </div>

                             </div>
                         </div>

                         <div class="card-body">
                             <span class="mb-3 d-flex hrefCsslink_x"><span
                                     style="font-weight: bold">Posted on:</span>&nbsp;  ' . Carbon::parse($data->post_date_of_item)->diffForHumans() . '</span>
                             <span class="mb-3 d-flex hrefCsslink_x"><span
                                     style="font-weight: bold">Expired on:</span>&nbsp; ' . $data->post_expiry_date . '</span>
                             <span class="mb-3 d-flex hrefCsslink_x"><span style="font-weight: bold">
                                     <font color="#f25433">Delete on:</font>
                                 </span>&nbsp; ' . $data->post_delete_date . '</span>
                             <span class="mb-3 d-flex hrefCsslink_x"><span
                                     style="font-weight: bold"><span class="badge rounded-pill bg"
                                         style="background-color: #FE980F;color:#ffffff">' . today()->diffInDays(Carbon::parse($data->created_at)->toDateString()) - $data->service_duration_business . '</span></span>&nbsp;
                                 Days Remaining (<b>Free Business</b>)</span>

                             <div class="row g-1">
                                 <div class="col-4">
                                     <a href="' . route('user.businesslogoimage', ['id' => encrypt($data->id)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><button type="button"
                                         class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_xx1">
                                         <i class="fas fa-search"></i> View </button></a>
                                 </div>
                                 <div class="col-4">
                                     <a href="' . route('user.editbusinesslogoimage', ['business_id' => encrypt($data->id)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><button type="submit"
                                         class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_xx2">
                                         <i class="far fa-edit"></i> Edit </button></a>
                                 </div>
                                 <div class="col-4">
                                   <button type="button" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif" data-del="' . encrypt($data->id) . '"
                                         class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_xx3 btn-deleteServicelogo">
                                         <i class="fa fa-times"></i> Delete </button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 </div>
                </div>
              ';
                    return $html;
                })

                ->addColumn('action', function ($data) {
                    return '';
                })
                ->rawColumns(['image_name', 'action'])
                ->make(true);
        }

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.product_id',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
                'tbl_product_items.created_at',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $fetchImage = DB::table('tbl_images')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->where('user_id', $user)
            ->select('tbl_images.id', 'tbl_imgs.image_name', 'tbl_images.product_item')->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countryGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.place_of_origin',
                'countries.flag',
                'countries.name',
                'countries.id as country_id',
                DB::raw('count(tbl_product_items.place_of_origin) as total_countries')
            )
            ->leftjoin('countries', 'countries.id', '=', 'tbl_product_items.place_of_origin')
            ->groupBy('tbl_product_items.place_of_origin')
            ->where(['tbl_product_items.expire_status' => '1'])
            ->get();

        return view('user.mpingiusers.view_business', ['countries' => $countries], compact('countryGroupCount', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'ProductItems', 'fetchImage'))->render();

    }


    public function DeleteServicelogo(Request $request)
    {
        $id = decrypt($request->id);
        DB::table('tbl_service_items')->where('id', $id)->delete();
        return response()->json(['status' => 200]);
    }

    public function UpdateUploadBusinesslogoImage(Request $request, $business_id)
    {
        //  dd(decrypt($request->business_id));
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.country',
                'users.country_id',
                'users.state_id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'countries.name as countryname',
                'countries.flag',
                'states.name as statename',
                'cities.name as cityname'
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $getserviceItems = tbl_service_items::where('id', decrypt($request->business_id))->get();

        $fetchAllServiceItems = DB::table('tbl_service_items')
            ->select(
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'users.service_duration_business',
                'users.product_duration',
                'tbl_service_items.id',
                'tbl_service_items.post_date_of_item',
                'tbl_service_items.mainservice_id',
                'tbl_service_items.user_id',
                'tbl_service_items.service_id',
                'tbl_service_items.sub_service_id',
                'tbl_service_items.sub_service_1_id',
                'tbl_service_items.sub_service_2_id',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.first_name',
                'tbl_service_items.last_name',
                'tbl_service_items.universities_name',
                'tbl_service_items.department',
                'tbl_service_items.job_title',
                'tbl_service_items.company_name',
                'tbl_service_items.company_type',
                'tbl_service_items.company_motto',
                'tbl_service_items.company_logo',
                'tbl_service_items.company_banner',
                'tbl_service_items.description',
                'tbl_service_items.p_box',
                'tbl_service_items.address',
                'tbl_service_items.city',
                'tbl_service_items.state',
                'tbl_service_items.country',
                'tbl_service_items.postal_code',
                'tbl_service_items.phone',
                'tbl_service_items.mobile',
                'tbl_service_items.email',
                'tbl_service_items.fax',
                'tbl_service_items.website',
                'tbl_service_items.question_1',
                'tbl_service_items.question_2',
                'tbl_service_items.question_3',
                'tbl_service_items.question_4',
                'tbl_service_items.question_5',
                'tbl_service_items.question_6',
                'tbl_service_items.president',
                'tbl_service_items.advertising',
                'tbl_service_items.sales',
                'tbl_service_items.purchasing',
                'tbl_service_items.marketing',
                'tbl_service_items.engineering',
                'tbl_service_items.ad_type',
                'tbl_service_items.post_expiry_date',
                'tbl_service_items.post_delete_date',
                'tbl_service_items.post_date_count',
                'tbl_service_items.post_expiry_count',
                'tbl_service_items.post_delete_count',
                'tbl_service_items.expire_status',
                'tbl_service_items.views',
                'tbl_service_items.rate',
                'tbl_service_items.total_rate',
                'tbl_service_items.hits',
                'tbl_service_items.images',
                'tbl_service_items.company_color',
                'tbl_service_items.company_title_color',
                'tbl_service_items.created_at'
            )
            ->leftjoin('users', 'users.id', '=', 'tbl_service_items.user_id')
            ->where(['tbl_service_items.id' => decrypt($request->business_id), 'tbl_service_items.expire_status' => 1])
            ->get();

        return view('user.mpingiusers.edit_business_item_details', ['countries' => $countries], compact('fetchAllServiceItems', 'getserviceItems', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();
    }

    public function UpdatetServiceform(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'job_title' => '',
            'department' => '',
            'company_name' => '',
            'description' => '',
            'p_box' => '',
            'address' => '',
            'phone' => '',
            'email' => '',
            'mobile' => '',
            'website' => '',
        ], [
            'job_title.required' => '',
            'department.required' => '',
            'company_name.required' => 'Required Company Name',
            'description.required' => '',
            'p_box.required' => '',
            'address.required' => '',
            'phone.required' => '',
            'email.required' => '',
            'mobile.required' => '',
            'website.required' => '',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $products_edit = tbl_service_items::find($request->id);
        $pData = [
            'job_title' => $request->job_title,
            'department' => $request->department,
            'company_name' => $request->company_name,
            'description' => $request->description,
            'p_box' => $request->p_box,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'website' => $request->website


        ];
        $products_edit->update($pData);

        return response()->json([
            'status' => 200,
        ]);

    }

    public function UploadBusinesslogoImage(Request $request)
    {

        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.country',
                'users.country_id',
                'users.state_id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'countries.name as countryname',
                'countries.flag',
                'states.name as statename',
                'cities.name as cityname'
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $getserviceItems = tbl_service_items::where('id', decrypt($request->id))->get();

        $fetchAllServiceItems = DB::table('tbl_service_items')
            ->select(
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'users.service_duration_business',
                'users.product_duration',
                'tbl_service_items.id',
                'tbl_service_items.post_date_of_item',
                'tbl_service_items.mainservice_id',
                'tbl_service_items.user_id',
                'tbl_service_items.service_id',
                'tbl_service_items.sub_service_id',
                'tbl_service_items.sub_service_1_id',
                'tbl_service_items.sub_service_2_id',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.first_name',
                'tbl_service_items.last_name',
                'tbl_service_items.universities_name',
                'tbl_service_items.department',
                'tbl_service_items.job_title',
                'tbl_service_items.company_name',
                'tbl_service_items.company_type',
                'tbl_service_items.company_motto',
                'tbl_service_items.company_logo',
                'tbl_service_items.company_banner',
                'tbl_service_items.description',
                'tbl_service_items.p_box',
                'tbl_service_items.address',
                'tbl_service_items.city',
                'tbl_service_items.state',
                'tbl_service_items.country',
                'tbl_service_items.postal_code',
                'tbl_service_items.phone',
                'tbl_service_items.mobile',
                'tbl_service_items.email',
                'tbl_service_items.fax',
                'tbl_service_items.website',
                'tbl_service_items.question_1',
                'tbl_service_items.question_2',
                'tbl_service_items.question_3',
                'tbl_service_items.question_4',
                'tbl_service_items.question_5',
                'tbl_service_items.question_6',
                'tbl_service_items.president',
                'tbl_service_items.advertising',
                'tbl_service_items.sales',
                'tbl_service_items.purchasing',
                'tbl_service_items.marketing',
                'tbl_service_items.engineering',
                'tbl_service_items.ad_type',
                'tbl_service_items.post_expiry_date',
                'tbl_service_items.post_delete_date',
                'tbl_service_items.post_date_count',
                'tbl_service_items.post_expiry_count',
                'tbl_service_items.post_delete_count',
                'tbl_service_items.expire_status',
                'tbl_service_items.views',
                'tbl_service_items.rate',
                'tbl_service_items.total_rate',
                'tbl_service_items.hits',
                'tbl_service_items.images',
                'tbl_service_items.company_color',
                'tbl_service_items.company_title_color',
                'tbl_service_items.created_at'
            )
            ->leftjoin('users', 'users.id', '=', 'tbl_service_items.user_id')
            ->where(['tbl_service_items.id' => decrypt($request->id), 'tbl_service_items.expire_status' => 1])
            ->get();

        return view('user.mpingiusers.business_item_details', ['countries' => $countries], compact('fetchAllServiceItems', 'getserviceItems', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }

    public function PostOptions()
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.product_duration',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countuid = DB::table('users')
            ->selectRaw('post_number, id, product_duration')
            ->where('id', $user)
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        return view('user.mpingiusers.post_options', ['countries' => $countries], compact('getuser', 'getbusinessdata', 'countProductItems', 'countuid', 'countProductItems1'))->render();

    }

    // ///////////////////////////all product on sale/////////////////////////////////

    public function MyOrders(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        // $notyou =  User::where('id', '!=', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        //  $products = Product::latest()->paginate(24);
        $products = DB::table('tbl_product_items')
            ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
                    users.id,
                    users.product_duration as PDurations,
                    tbl_product_items.id as ProductItem_id,
                    tbl_product_items.user_id as userid,
                    tbl_product_items.currency,
                    tbl_product_items.post_date_of_item,
                    tbl_product_items.category_id,
                    tbl_product_items.sub_category_id,
                    tbl_product_items.article_id,
                    tbl_product_items.product_id,
                    tbl_product_items.sub_product_id,
                    tbl_product_items.item_name,
                    tbl_product_items.product_type,
                    tbl_product_items.brand_name,
                    tbl_product_items.brand_id,
                    tbl_product_items.pieces,
                    tbl_product_items.price,
                    tbl_product_items.old_price,
                    tbl_product_items.color_id,
                    tbl_product_items.sub_color_id,
                    tbl_product_items.price_range_start,
                    tbl_product_items.price_range_end,
                    tbl_product_items.product_color,
                    tbl_product_items.place_of_origin,
                    tbl_product_items.city,
                    tbl_product_items.state_id,
                    tbl_product_items.item_descriptions,
                    tbl_product_items.item_images,
                    tbl_product_items.supplier_name,
                    tbl_product_items.supplier_region,
                    tbl_product_items.type,
                    tbl_product_items.post_expiry_date,
                    tbl_product_items.post_delete_date,
                    tbl_product_items.post_date_count,
                    tbl_product_items.post_expiry_count,
                    tbl_product_items.post_delete_count,
                    tbl_product_items.expire_status,
                    tbl_product_items.ad_type,
                    tbl_product_items.views,
                    tbl_product_items.shipping,
                    tbl_product_items.shipping_price,
                    tbl_product_items.price_id,
                    tbl_product_items.rate,
                    tbl_product_items.total_rate,
                    tbl_product_items.hits,
                    tbl_product_items.payment,
                    tbl_product_items.weight,
                    tbl_product_items.volume,
                    tbl_product_items.delivery,
                    tbl_product_items.day_return,
                    tbl_product_items.negotiable,
                    tbl_product_items.category,
                    tbl_product_items.product_web_name,
                    tbl_product_items.product_web_link,
                    tbl_product_items.disponibility,
                    tbl_product_items.created_at,
                    tbl_product_items.remainingdays_status,
                    tbl_product_items.expireddate_remain,
                    tbl_images.id as ImageIDS,
                    tbl_imgs.image_name as Images,
                    users.product_duration,
                    tbl_imgs.image_name,
                    tbl_images.product_item

                ')
            ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->whereNot('tbl_product_items.user_id', $user)
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->latest()
            ->paginate(28);


        $loginBuyerIds = $request->loginBuyer;
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        $countallcountries = DB::table('countries')->count();

        $countryGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.place_of_origin',
                'countries.flag',
                'countries.name',
                'countries.id as country_id',
                DB::raw('count(tbl_product_items.place_of_origin) as total_countries')
            )
            ->leftjoin('countries', 'countries.id', '=', 'tbl_product_items.place_of_origin')
            ->groupBy('tbl_product_items.place_of_origin')
            ->where(['tbl_product_items.expire_status' => '1'])
            ->get();


        return view('user.mpingiusers.my_orders', ['countries' => $countries], compact('countryGroupCount', 'countallcountries', 'products', 'loginBuyerIds', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }


    public function ajax_paginateUser(Request $request)
    {

        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $notyou = User::where('id', '!=', $user)->get();
        $countries = Country::all();

        $serchpage = $request->pages;
        $products = DB::table('tbl_product_items')
            ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
                    users.id,
                    users.product_duration as PDurations,
                    tbl_product_items.id as ProductItem_id,
                    tbl_product_items.user_id as userid,
                    tbl_product_items.currency,
                    tbl_product_items.post_date_of_item,
                    tbl_product_items.category_id,
                    tbl_product_items.sub_category_id,
                    tbl_product_items.article_id,
                    tbl_product_items.product_id,
                    tbl_product_items.sub_product_id,
                    tbl_product_items.item_name,
                    tbl_product_items.product_type,
                    tbl_product_items.brand_name,
                    tbl_product_items.brand_id,
                    tbl_product_items.pieces,
                    tbl_product_items.price,
                    tbl_product_items.old_price,
                    tbl_product_items.color_id,
                    tbl_product_items.sub_color_id,
                    tbl_product_items.price_range_start,
                    tbl_product_items.price_range_end,
                    tbl_product_items.product_color,
                    tbl_product_items.place_of_origin,
                    tbl_product_items.city,
                    tbl_product_items.state_id,
                    tbl_product_items.item_descriptions,
                    tbl_product_items.item_images,
                    tbl_product_items.supplier_name,
                    tbl_product_items.supplier_region,
                    tbl_product_items.type,
                    tbl_product_items.post_expiry_date,
                    tbl_product_items.post_delete_date,
                    tbl_product_items.post_date_count,
                    tbl_product_items.post_expiry_count,
                    tbl_product_items.post_delete_count,
                    tbl_product_items.expire_status,
                    tbl_product_items.ad_type,
                    tbl_product_items.views,
                    tbl_product_items.shipping,
                    tbl_product_items.shipping_price,
                    tbl_product_items.price_id,
                    tbl_product_items.rate,
                    tbl_product_items.total_rate,
                    tbl_product_items.hits,
                    tbl_product_items.payment,
                    tbl_product_items.weight,
                    tbl_product_items.volume,
                    tbl_product_items.delivery,
                    tbl_product_items.day_return,
                    tbl_product_items.negotiable,
                    tbl_product_items.category,
                    tbl_product_items.product_web_name,
                    tbl_product_items.product_web_link,
                    tbl_product_items.disponibility,
                    tbl_product_items.created_at,
                    tbl_product_items.remainingdays_status,
                    tbl_product_items.expireddate_remain,
                    tbl_images.id as ImageIDS,
                    tbl_imgs.image_name as Images,
                    users.product_duration,
                    tbl_imgs.image_name,
                    tbl_images.product_item

                ')
            ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->whereNot('tbl_product_items.user_id', $user)
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->paginate();
        // $products = Product::latest()->paginate(24);

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        $countallcountries = DB::table('countries')->count();

        return view('user.mpingiusers.myorder_records', ['countries' => $countries], compact('countallcountries', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();
    }


    function getSearchUser(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');

            if ($query == '') {//if search is empty back to this below

                $user = Auth::user()->id ?? 'session expired';
                $getuser = User::where('id', $user)->get();
                $countries = Country::all();

                $serchpage = $request->pages;
                $products = DB::table('tbl_product_items')
                    ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
                               users.id,
                               users.product_duration as PDurations,
                               tbl_product_items.id as ProductItem_id,
                               tbl_product_items.user_id as userid,
                               tbl_product_items.currency,
                               tbl_product_items.post_date_of_item,
                               tbl_product_items.category_id,
                               tbl_product_items.sub_category_id,
                               tbl_product_items.article_id,
                               tbl_product_items.product_id,
                               tbl_product_items.sub_product_id,
                               tbl_product_items.item_name,
                               tbl_product_items.product_type,
                               tbl_product_items.brand_name,
                               tbl_product_items.brand_id,
                               tbl_product_items.pieces,
                               tbl_product_items.price,
                               tbl_product_items.old_price,
                               tbl_product_items.color_id,
                               tbl_product_items.sub_color_id,
                               tbl_product_items.price_range_start,
                               tbl_product_items.price_range_end,
                               tbl_product_items.product_color,
                               tbl_product_items.place_of_origin,
                               tbl_product_items.city,
                               tbl_product_items.state_id,
                               tbl_product_items.item_descriptions,
                               tbl_product_items.item_images,
                               tbl_product_items.supplier_name,
                               tbl_product_items.supplier_region,
                               tbl_product_items.type,
                               tbl_product_items.post_expiry_date,
                               tbl_product_items.post_delete_date,
                               tbl_product_items.post_date_count,
                               tbl_product_items.post_expiry_count,
                               tbl_product_items.post_delete_count,
                               tbl_product_items.expire_status,
                               tbl_product_items.ad_type,
                               tbl_product_items.views,
                               tbl_product_items.shipping,
                               tbl_product_items.shipping_price,
                               tbl_product_items.price_id,
                               tbl_product_items.rate,
                               tbl_product_items.total_rate,
                               tbl_product_items.hits,
                               tbl_product_items.payment,
                               tbl_product_items.weight,
                               tbl_product_items.volume,
                               tbl_product_items.delivery,
                               tbl_product_items.day_return,
                               tbl_product_items.negotiable,
                               tbl_product_items.category,
                               tbl_product_items.product_web_name,
                               tbl_product_items.product_web_link,
                               tbl_product_items.disponibility,
                               tbl_product_items.created_at,
                               tbl_product_items.remainingdays_status,
                               tbl_product_items.expireddate_remain,
                               tbl_images.id as ImageIDS,
                               tbl_imgs.image_name as Images,
                               users.product_duration,
                               tbl_imgs.image_name,
                               tbl_images.product_item

                           ')
                    ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
                    ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
                    ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
                    ->whereNot('tbl_product_items.user_id', $user)
                    ->whereIn('tbl_product_items.expire_status', [1])
                    ->orderBy('tbl_product_items.id', 'desc')
                    ->groupBy('tbl_imgs.upload_id')
                    ->paginate();
                //    $products = Product::latest()->paginate(24);
                $countries = Country::all();
                $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
                $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
                $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
                $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

                $getbusinessdata = DB::table('users')
                    ->select(
                        'users.id',
                        'tbl_mping_businesses.user_id',
                        'tbl_mping_businesses.id as business_id',
                        'tbl_mping_businesses.email',
                        'tbl_mping_businesses.register_date',
                        'tbl_mping_businesses.business_name',
                        'tbl_mping_businesses.business_motto',
                        'tbl_mping_businesses.business_logo',
                        'tbl_mping_businesses.business_type',
                        'tbl_mping_businesses.dealers_in',
                        'tbl_mping_businesses.department',
                        'tbl_mping_businesses.job_title',
                        'tbl_mping_businesses.i_am_a',
                        'tbl_mping_businesses.fax',
                        'tbl_mping_businesses.po_box',
                        'tbl_mping_businesses.website',
                        'tbl_mping_businesses.address',
                        'tbl_mping_businesses.shipping',
                        'tbl_mping_businesses.notification',
                        'tbl_mping_businesses.banner_color',
                        'tbl_mping_businesses.banner_title_color',
                        'tbl_mping_businesses.country_id',
                        'tbl_mping_businesses.state_id',
                        'tbl_mping_businesses.city_id',
                        'tbl_mping_businesses.shop_status',
                        'tbl_mping_businesses.description',
                        'tbl_mping_businesses.views',
                        'tbl_mping_businesses.type',
                        'tbl_mping_businesses.business_icon',
                    )

                    ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
                    ->where('users.id', $user)
                    ->get();

                $countProductItems = DB::table('users')
                    ->selectRaw('count(tbl_product_items.user_id) as cnt')
                    ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
                    ->where(['users.id' => $user, 'expire_status' => '1'])
                    ->groupBy('tbl_product_items.user_id')
                    ->get();

                $countProductItems1 = DB::table('users')
                    ->selectRaw('count(tbl_product_items.user_id) as cnt')
                    ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
                    ->where(['users.id' => $user, 'expire_status' => '0'])
                    ->groupBy('tbl_product_items.user_id')
                    ->get();


                return view('user.mpingiusers.my_orders', ['countries' => $countries], compact('products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();
                return view('user.mpingiusers.myorder_records', ['countries' => $countries], compact('products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

            }
            if ($query != '') {
                $users = Auth::user()->id ?? 'session expired';
                $data = DB::table('tbl_product_items')
                    ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
                               users.id,
                               users.product_duration as PDurations,
                               tbl_product_items.id as ProductItem_id,
                               tbl_product_items.user_id as userid,
                               tbl_product_items.currency,
                               tbl_product_items.post_date_of_item,
                               tbl_product_items.category_id,
                               tbl_product_items.sub_category_id,
                               tbl_product_items.article_id,
                               tbl_product_items.product_id,
                               tbl_product_items.sub_product_id,
                               tbl_product_items.item_name,
                               tbl_product_items.product_type,
                               tbl_product_items.brand_name,
                               tbl_product_items.brand_id,
                               tbl_product_items.pieces,
                               tbl_product_items.price,
                               tbl_product_items.old_price,
                               tbl_product_items.color_id,
                               tbl_product_items.sub_color_id,
                               tbl_product_items.price_range_start,
                               tbl_product_items.price_range_end,
                               tbl_product_items.product_color,
                               tbl_product_items.place_of_origin,
                               tbl_product_items.city,
                               tbl_product_items.state_id,
                               tbl_product_items.item_descriptions,
                               tbl_product_items.item_images,
                               tbl_product_items.supplier_name,
                               tbl_product_items.supplier_region,
                               tbl_product_items.type,
                               tbl_product_items.post_expiry_date,
                               tbl_product_items.post_delete_date,
                               tbl_product_items.post_date_count,
                               tbl_product_items.post_expiry_count,
                               tbl_product_items.post_delete_count,
                               tbl_product_items.expire_status,
                               tbl_product_items.ad_type,
                               tbl_product_items.views,
                               tbl_product_items.shipping,
                               tbl_product_items.shipping_price,
                               tbl_product_items.price_id,
                               tbl_product_items.rate,
                               tbl_product_items.total_rate,
                               tbl_product_items.hits,
                               tbl_product_items.payment,
                               tbl_product_items.weight,
                               tbl_product_items.volume,
                               tbl_product_items.delivery,
                               tbl_product_items.day_return,
                               tbl_product_items.negotiable,
                               tbl_product_items.category,
                               tbl_product_items.product_web_name,
                               tbl_product_items.product_web_link,
                               tbl_product_items.disponibility,
                               tbl_product_items.created_at,
                               tbl_product_items.remainingdays_status,
                               tbl_product_items.expireddate_remain,
                               tbl_images.id as ImageIDS,
                               tbl_imgs.image_name as Images,
                               users.product_duration,
                               tbl_imgs.image_name,
                               tbl_images.product_item

                           ')
                    ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
                    ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
                    ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
                    ->where('tbl_product_items.item_name', 'like', '%' . $query . '%')
                    //->orWhere('tbl_product_items.price', 'like', '%'.$query.'%')
                    ->whereNot('tbl_product_items.user_id', $users)
                    ->whereIn('tbl_product_items.expire_status', [1])
                    ->groupBy('tbl_imgs.upload_id')
                    ->orderBy('tbl_product_items.id', 'desc')
                    ->distinct('tbl_product_items.item_name')
                    ->get();

            } else {

                $data = DB::table('tbl_product_items')
                    ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
                            users.id,
                            users.product_duration as PDurations,
                            tbl_product_items.id as ProductItem_id,
                            tbl_product_items.user_id as userid,
                            tbl_product_items.currency,
                            tbl_product_items.post_date_of_item,
                            tbl_product_items.category_id,
                            tbl_product_items.sub_category_id,
                            tbl_product_items.article_id,
                            tbl_product_items.product_id,
                            tbl_product_items.sub_product_id,
                            tbl_product_items.item_name,
                            tbl_product_items.product_type,
                            tbl_product_items.brand_name,
                            tbl_product_items.brand_id,
                            tbl_product_items.pieces,
                            tbl_product_items.price,
                            tbl_product_items.old_price,
                            tbl_product_items.color_id,
                            tbl_product_items.sub_color_id,
                            tbl_product_items.price_range_start,
                            tbl_product_items.price_range_end,
                            tbl_product_items.product_color,
                            tbl_product_items.place_of_origin,
                            tbl_product_items.city,
                            tbl_product_items.state_id,
                            tbl_product_items.item_descriptions,
                            tbl_product_items.item_images,
                            tbl_product_items.supplier_name,
                            tbl_product_items.supplier_region,
                            tbl_product_items.type,
                            tbl_product_items.post_expiry_date,
                            tbl_product_items.post_delete_date,
                            tbl_product_items.post_date_count,
                            tbl_product_items.post_expiry_count,
                            tbl_product_items.post_delete_count,
                            tbl_product_items.expire_status,
                            tbl_product_items.ad_type,
                            tbl_product_items.views,
                            tbl_product_items.shipping,
                            tbl_product_items.shipping_price,
                            tbl_product_items.price_id,
                            tbl_product_items.rate,
                            tbl_product_items.total_rate,
                            tbl_product_items.hits,
                            tbl_product_items.payment,
                            tbl_product_items.weight,
                            tbl_product_items.volume,
                            tbl_product_items.delivery,
                            tbl_product_items.day_return,
                            tbl_product_items.negotiable,
                            tbl_product_items.category,
                            tbl_product_items.product_web_name,
                            tbl_product_items.product_web_link,
                            tbl_product_items.disponibility,
                            tbl_product_items.created_at,
                            tbl_product_items.remainingdays_status,
                            tbl_product_items.expireddate_remain,
                            tbl_images.id as ImageIDS,
                            tbl_imgs.image_name as Images,
                            users.product_duration,
                            tbl_imgs.image_name,
                            tbl_images.product_item

                        ')
                    ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
                    ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
                    ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
                    ->whereNot('tbl_product_items.user_id', $user)
                    ->whereIn('tbl_product_items.expire_status', [1])
                    ->groupBy('tbl_imgs.upload_id')
                    ->orderBy('tbl_product_items.id', 'desc')
                    ->distinct('tbl_product_items.item_name')
                    ->get();

            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {

                    $img = "";
                    if (!empty($row->Images)) {
                        $img = $row->Images;
                    } else {
                        $img = "/avatar_nzuzi1.png";
                    }
                    $checklogin = "";
                    //    if(!Auth::check()) {
                    //      $checklogin = '<a href="'. route('user.loginbuyer') .'" id="removeunderline">
                    //          <i class="fa fa-gift"></i> Order Now!
                    //          </a>';
                    //        }else{
                    //           $checklogin = '<a href="javascript:void(0)" id="removeunderline">
                    //           <i class="fa fa-gift"></i> Order Now!
                    //           </a>';
                    //       }
                    $output .= '<div class="col-md-3 col-6 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger">
                             <div class="mb-4 card">
                                 <div class="containeroverlay">
                                 <div class="">
                                    <img class="card-img-top_ embed-responsive-item" src="https://underconstruction.mywebapp.online/storage/assets/uploads/' . $img . '" alt="Card image cap">
                                 </div>
                                   <div class="overlay overlayTop">
                                     <div class="text">
                                             <h3 id="cssh2" class=""><i
                                                     class="fa fa-user"></i>&nbsp;Seller &
                                                 Buyer<br><br>
                                                 <a href="' . route('user.viewdetailsitem', ['upload_id' => encrypt($row->ImageIDS), 'product_id' => encrypt($row->ProductItem_id)]) . '" id="removeunderline">
                                                 <i class="fa fa-gift"></i> Order Now!
                                              </a><br><br>
                                                 <a href="' . route('user.viewdetailsitem', ['upload_id' => encrypt($row->ImageIDS), 'product_id' => encrypt($row->ProductItem_id)]) . '" id="removeunderlines">
                                                 <i class="fa fa-tag"></i> Product&nbsp;Details
                                                </a>
                                                 <br><br>
                                                 <a href="' . route('user.shop_number', ['id' => encrypt($row->userid)]) . '" id="removeunderline">
                                                     <i class="fa fa-shopping-cart"></i> See
                                                     Store&nbsp;&nbsp;&nbsp;&nbsp;
                                                 </a><br><br>
                                                 <a href="' . route('user.productdetails', ['id' => encrypt($row->id)]) . '" id="removeunderline">
                                                     <i class="fa fa-phone"></i>
                                                     +1(418) 509-2913
                                                 </a>

                                             </h3>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="card-body d-flex flex-column">
                                     <h6 class="card-title fw-bold">' . Str::ucfirst(Str::limit($row->item_name, 16, '...')) . '</h6>
                                     <h5 class="card-text fw-bolder"><span
                                             style="color: #ff7519;">' . number_format($row->price, 2) . '</span>
                                         <br> <strike>' . number_format($row->old_price, 2) . '</strike>
                                     </h5>

                                 </div>
                             </div>
                         </div>
                 ';
                }
            } else {
                $output = '
                       <h4><center> </div>
                       <div class="alert alert-danger" role="alert">
                           <strong><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp; Search Results for:  <span style="font-style:italic; color: #ff7519;">' . $request->get('query') . '</span> </strong>
                       </div>
                   </center></h4>
                   ';
            }
            $data = array(
                'table_data' => $output,
                'total_data' => $total_row
            );

            echo json_encode($data);
        }
    }

    public function GetPerPageUser(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $serchpage = $request->pages;
        $products = DB::table('tbl_product_items')
            ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
                            users.id,
                            users.product_duration as PDurations,
                            tbl_product_items.id as ProductItem_id,
                            tbl_product_items.user_id as userid,
                            tbl_product_items.currency,
                            tbl_product_items.post_date_of_item,
                            tbl_product_items.category_id,
                            tbl_product_items.sub_category_id,
                            tbl_product_items.article_id,
                            tbl_product_items.product_id,
                            tbl_product_items.sub_product_id,
                            tbl_product_items.item_name,
                            tbl_product_items.product_type,
                            tbl_product_items.brand_name,
                            tbl_product_items.brand_id,
                            tbl_product_items.pieces,
                            tbl_product_items.price,
                            tbl_product_items.old_price,
                            tbl_product_items.color_id,
                            tbl_product_items.sub_color_id,
                            tbl_product_items.price_range_start,
                            tbl_product_items.price_range_end,
                            tbl_product_items.product_color,
                            tbl_product_items.place_of_origin,
                            tbl_product_items.city,
                            tbl_product_items.state_id,
                            tbl_product_items.item_descriptions,
                            tbl_product_items.item_images,
                            tbl_product_items.supplier_name,
                            tbl_product_items.supplier_region,
                            tbl_product_items.type,
                            tbl_product_items.post_expiry_date,
                            tbl_product_items.post_delete_date,
                            tbl_product_items.post_date_count,
                            tbl_product_items.post_expiry_count,
                            tbl_product_items.post_delete_count,
                            tbl_product_items.expire_status,
                            tbl_product_items.ad_type,
                            tbl_product_items.views,
                            tbl_product_items.shipping,
                            tbl_product_items.shipping_price,
                            tbl_product_items.price_id,
                            tbl_product_items.rate,
                            tbl_product_items.total_rate,
                            tbl_product_items.hits,
                            tbl_product_items.payment,
                            tbl_product_items.weight,
                            tbl_product_items.volume,
                            tbl_product_items.delivery,
                            tbl_product_items.day_return,
                            tbl_product_items.negotiable,
                            tbl_product_items.category,
                            tbl_product_items.product_web_name,
                            tbl_product_items.product_web_link,
                            tbl_product_items.disponibility,
                            tbl_product_items.created_at,
                            tbl_product_items.remainingdays_status,
                            tbl_product_items.expireddate_remain,
                            tbl_images.id as ImageIDS,
                            tbl_imgs.image_name as Images,
                            users.product_duration,
                            tbl_imgs.image_name,
                            tbl_images.product_item

                        ')
            ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->whereNot('tbl_product_items.user_id', $user)
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->paginate($serchpage);
        // $products = Product::latest()->paginate($serchpage);

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('user.mpingiusers.myorder_records', ['countries' => $countries], compact('products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();
    }


    //view all countries
    public function ViewAllCountriesUser(Request $request)
    {
        $serchpage = $request->pages;
        $products = Product::orderBy('id', 'ASC')->paginate(1);
        $countries = Country::all();
        $ajobs = AvailableJob::orderBy('id', 'ASC')->paginate(100);

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services


        $fetchcoutrieswithcount = DB::table('countries')
            ->select('*')
            ->get();

        $countallcountries = DB::table('countries')->count();

        $countryGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.place_of_origin',
                'countries.flag',
                'countries.name',
                'countries.id as country_id',
                DB::raw('count(tbl_product_items.place_of_origin) as total_countries')
            )
            ->leftjoin('countries', 'countries.id', '=', 'tbl_product_items.place_of_origin')
            ->groupBy('tbl_product_items.place_of_origin')
            ->where(['tbl_product_items.expire_status' => '1'])
            ->get();

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        return view('user.mpingiusers.viewallcountries', ['countries' => $countries], compact('getbusinessdata', 'countProductItems', 'countProductItems1', 'getuser', 'countryGroupCount', 'fetchcoutrieswithcount', 'countallcountries', 'ajobs', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids'))->render();
    }

    //   search country
    public function UsersearchCountry(Request $request)
    {

        if ($request->ajax()) {
            $data = Country::where('name', 'LIKE', $request->country . '%')
                ->get();
            $output = '';
            if (count($data) > 0) {
                $output = '<div class="row g-2" id="hideid">';
                foreach ($data as $row) {
                    $output .= '<div class="mb-2 col-md-3 col-6">
                                            <a href="#" class="hrefCss">
                                                <img
                                                    src="' . url('assets/flags/' . $row->flag) . '" alt=""
                                                    width="30" height="20" class="img_icons_2">&nbsp;' . Str::limit($row->name, 8) . '&nbsp;
                                                    <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                            </a>
                                        </div>
                                ';
                }
                $output .= '</div>';
            } else {
                $output .= '<center><div class="alert alert-danger">' . 'No country found' . '</div></center>';
            }
            return $output;
        }
    }

    // end  search country



    //product details

    public function UserProductDetails(Request $request, $id)
    {

        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        // $slug = $request->slug;
        $prductdetails = Product::where('id', decrypt($id))->first();
        $allProducts = Product::all();
        abort_unless($prductdetails, 404, 'Project not found');
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('user.mpingiusers.item_details', ['countries' => $countries], compact('getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'prductdetails', 'allProducts', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();

    }

    //shop number details
    public function UserShopNumber(Request $request, $id)
    {

        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $shopNumber = Product::where('id', decrypt($id))->first();
        $shops = tbl_mping_business::where('user_id', decrypt($id))->first();
        $countries = Country::all();
        $products = Product::where('id', decrypt($id))->paginate(24);
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('user.mpingiusers.shops.shop_number', ['countries' => $countries], compact('getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'shops', 'shopNumber', 'products', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();

    }




    public function userViewdetails(Request $request)
    {

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();


        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'tbl_messages.full_name',
                'tbl_messages.message',
                'tbl_messages.read_status',
                'tbl_messages.Reply_status',
                'tbl_messages.type',
                'tbl_messages.created_at as message_date',
                'countries.name as countryname',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->leftjoin('tbl_messages', 'tbl_messages.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $messagecomment = DB::table('tbl_messages')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'tbl_messages.profile_user',
                'tbl_messages.full_name',
                'tbl_messages.message',
                'tbl_messages.read_status',
                'tbl_messages.Reply_status',
                'tbl_messages.type',
                'tbl_messages.created_at as message_date',

            )
            ->leftjoin('users', 'users.id', '=', 'tbl_messages.user_id')
            ->where('tbl_messages.product_id', decrypt($request->product_id))
            ->paginate(10);

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $getimageid = DB::table('tbl_images')
            ->leftjoin('tbl_product_items', 'tbl_product_items.id', '=', 'tbl_images.product_item')
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'tbl_images.user_id')
            ->leftjoin('users', 'users.id', '=', 'tbl_images.user_id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('tbl_images.id', decrypt($request->upload_id))
            ->select(
                'users.id as uid',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'users.islogged',
                'countries.name as countryname',
                'countries.flag',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_images.id',
                'tbl_images.product_item',
                'tbl_images.category_id as categoryId',
                'tbl_images.sub_category_id as sub_categoryId',
                'tbl_images.article_id as articleId',
                'tbl_images.product_id',
                'tbl_images.sub_product_id as sub_productId',
                'tbl_images.product_item as user_id',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.id as product_id',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.type as ptype',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )->get();

        foreach ($getimageid as $row) {
            Tbl_products_item::where(['user_id' => $row->user_id, 'id' => $row->product_item])
                ->update([
                    'views' => DB::raw('views + 1'), //increment 1 every view
                ]);

        }

        $viewImage = DB::table('tbl_imgs')
            ->where('upload_id', decrypt($request->upload_id))
            ->select('id', 'image_name', 'upload_id')->get();


        $countImage = tbl_imgs::groupBy('upload_id')
            ->selectRaw('count(*) as count, upload_id')
            ->where('upload_id', decrypt($request->upload_id))
            ->pluck('count', 'upload_id');


        foreach ($getimageid as $pitems) {

            $category_name = DB::table('tbl_categories')
                ->where('id', $pitems->categoryId)
                ->get();

            $subcategories_name = DB::table('tbl_sub_categories')
                ->where('id', $pitems->sub_categoryId)
                ->get();

            $article_name = DB::table('tbl_articles')
                ->where('id', $pitems->articleId)
                ->get();

            $subproduct_name = DB::table('tbl_sub_products')
                ->where('id', $pitems->sub_productId)
                ->get();

            $fetchImage = DB::table('tbl_images')
                ->select('tbl_imgs.image_name', 'tbl_imgs.id as imgID')
                ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
                ->where('tbl_images.product_item', $pitems->id)
                ->get();

        }

        $photoIDS = $request->upload_id;
        $fetchallCategories = Tbl_category::all();
        $countFeedback = tbl_messages::where('tbl_messages.product_id', decrypt($request->product_id))->count();
        $countallcountries = DB::table('countries')->count();

        return view('user.mpingiusers.view_detailsitem', compact('countallcountries', 'countFeedback', 'messagecomment', 'category_name', 'subcategories_name', 'article_name', 'subproduct_name', 'countries', 'categoryids', 'industriesids', 'servicesids', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'user', 'getuser', 'getimageid', 'viewImage', 'countImage', 'photoIDS', 'fetchallCategories'))->render();


    }


    //buy user product

    public function ItemDetailsBuy(Request $request)
    {
        // dd(decrypt($request->product_id));
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();


        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email as uemail',
                'users.address_2',
                'tbl_messages.full_name',
                'tbl_messages.message',
                'tbl_messages.read_status',
                'tbl_messages.Reply_status',
                'tbl_messages.type',
                'tbl_messages.created_at as message_date',
                'countries.name as countryname',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'tbl_product_items.day_return',
            )
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->leftjoin('tbl_messages', 'tbl_messages.user_id', '=', 'users.id')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->limit(1)
            ->get();

        $messagecomment = DB::table('tbl_messages')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'tbl_messages.profile_user',
                'tbl_messages.full_name',
                'tbl_messages.message',
                'tbl_messages.read_status',
                'tbl_messages.Reply_status',
                'tbl_messages.type',
                'tbl_messages.created_at as message_date',

            )
            ->leftjoin('users', 'users.id', '=', 'tbl_messages.user_id')
            ->where('tbl_messages.product_id', decrypt($request->product_id))
            ->paginate(10);

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $getimageid = DB::table('tbl_images')
            ->leftjoin('tbl_product_items', 'tbl_product_items.id', '=', 'tbl_images.product_item')
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'tbl_images.user_id')
            ->leftjoin('users', 'users.id', '=', 'tbl_images.user_id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('tbl_images.id', decrypt($request->upload_id))
            ->select(
                'users.id as user_id_seller',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'countries.name as countryname',
                'countries.flag',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_images.id',
                'tbl_images.product_item',
                'tbl_images.category_id as categoryId',
                'tbl_images.sub_category_id as sub_categoryId',
                'tbl_images.article_id as articleId',
                'tbl_images.product_id',
                'tbl_images.sub_product_id as sub_productId',
                'tbl_images.product_item as user_id',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.id as product_id',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.type as ptype',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )->get();

        foreach ($getimageid as $row) {
            Tbl_products_item::where(['user_id' => $row->user_id, 'id' => $row->product_item])
                ->update([
                    'views' => DB::raw('views + 1'), //increment 1 every view
                ]);

        }

        $viewImage = DB::table('tbl_imgs')
            ->where('upload_id', decrypt($request->upload_id))
            ->select('id', 'image_name', 'upload_id')->get();


        $countImage = tbl_imgs::groupBy('upload_id')
            ->selectRaw('count(*) as count, upload_id')
            ->where('upload_id', decrypt($request->upload_id))
            ->pluck('count', 'upload_id');


        foreach ($getimageid as $pitems) {

            $category_name = DB::table('tbl_categories')
                ->where('id', $pitems->categoryId)
                ->get();

            $subcategories_name = DB::table('tbl_sub_categories')
                ->where('id', $pitems->sub_categoryId)
                ->get();

            $article_name = DB::table('tbl_articles')
                ->where('id', $pitems->articleId)
                ->get();

            $subproduct_name = DB::table('tbl_sub_products')
                ->where('id', $pitems->sub_productId)
                ->get();

            $fetchImage = DB::table('tbl_images')
                ->select('tbl_imgs.image_name', 'tbl_imgs.id as imgID')
                ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
                ->where('tbl_images.product_item', $pitems->id)
                ->get();

        }


        $photoIDS = $request->upload_id;
        $fetchallCategories = Tbl_category::all();
        $countFeedback = tbl_messages::where('tbl_messages.product_id', decrypt($request->product_id))->count();
        $countallcountries = DB::table('countries')->count();
        return view('user.mpingiusers.item_details_buy', compact('countallcountries', 'countFeedback', 'messagecomment', 'category_name', 'subcategories_name', 'article_name', 'subproduct_name', 'countries', 'categoryids', 'industriesids', 'servicesids', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'user', 'getuser', 'getimageid', 'viewImage', 'countImage', 'photoIDS', 'fetchallCategories'))->render();
    }

    public function RateForm(Request $request)
    {
        Tbl_products_item::where('id', $request->id)->update(['rate' => $request->rate]);
        return response()->json([
            'status' => 200,
        ]);
    }


    public function loadMoreData(Request $request)
    {
        $start = $request->input('start');
        $product_id = $request->input('product_id');

        $data = DB::table('tbl_messages')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'tbl_messages.id',
                'tbl_messages.profile_user',
                'tbl_messages.full_name',
                'tbl_messages.message',
                'tbl_messages.read_status',
                'tbl_messages.Reply_status',
                'tbl_messages.type',
                'tbl_messages.created_at as message_date',

            )
            ->leftjoin('users', 'users.id', '=', 'tbl_messages.user_id')
            ->where('tbl_messages.product_id', $product_id)
            ->offset($start)
            ->orderBy('tbl_messages.id', 'ASC')
            ->limit(10)
            ->get();

        return response()->json([
            'data' => $data,
            'next' => $start + 10
        ]);
    }


    public function UserViewCountryProducts(Request $request)
    {
        // dd(decrypt($request->country_id));
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        // $notyou =  User::where('id', '!=', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        //  $products = Product::latest()->paginate(24);
        $products = DB::table('tbl_product_items')
            ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
                            users.id,
                            users.phone,
                            users.product_duration as PDurations,
                            tbl_product_items.id as ProductItem_id,
                            tbl_product_items.user_id as userid,
                            tbl_product_items.currency,
                            tbl_product_items.post_date_of_item,
                            tbl_product_items.category_id,
                            tbl_product_items.sub_category_id,
                            tbl_product_items.article_id,
                            tbl_product_items.product_id,
                            tbl_product_items.sub_product_id,
                            tbl_product_items.item_name,
                            tbl_product_items.product_type,
                            tbl_product_items.brand_name,
                            tbl_product_items.brand_id,
                            tbl_product_items.pieces,
                            tbl_product_items.price,
                            tbl_product_items.old_price,
                            tbl_product_items.color_id,
                            tbl_product_items.sub_color_id,
                            tbl_product_items.price_range_start,
                            tbl_product_items.price_range_end,
                            tbl_product_items.product_color,
                            tbl_product_items.place_of_origin,
                            tbl_product_items.city,
                            tbl_product_items.state_id,
                            tbl_product_items.item_descriptions,
                            tbl_product_items.item_images,
                            tbl_product_items.supplier_name,
                            tbl_product_items.supplier_region,
                            tbl_product_items.type,
                            tbl_product_items.post_expiry_date,
                            tbl_product_items.post_delete_date,
                            tbl_product_items.post_date_count,
                            tbl_product_items.post_expiry_count,
                            tbl_product_items.post_delete_count,
                            tbl_product_items.expire_status,
                            tbl_product_items.ad_type,
                            tbl_product_items.views,
                            tbl_product_items.shipping,
                            tbl_product_items.shipping_price,
                            tbl_product_items.price_id,
                            tbl_product_items.rate,
                            tbl_product_items.total_rate,
                            tbl_product_items.hits,
                            tbl_product_items.payment,
                            tbl_product_items.weight,
                            tbl_product_items.volume,
                            tbl_product_items.delivery,
                            tbl_product_items.day_return,
                            tbl_product_items.negotiable,
                            tbl_product_items.category,
                            tbl_product_items.product_web_name,
                            tbl_product_items.product_web_link,
                            tbl_product_items.disponibility,
                            tbl_product_items.created_at,
                            tbl_product_items.remainingdays_status,
                            tbl_product_items.expireddate_remain,
                            tbl_images.id as ImageIDS,
                            tbl_imgs.image_name as Images,
                            users.product_duration,
                            tbl_imgs.image_name,
                            tbl_images.product_item

                        ')
            ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->where('tbl_product_items.place_of_origin', decrypt($request->country_id))
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->latest()
            ->paginate(24);

        $getflag = DB::table('tbl_product_items')
            ->selectRaw('countries.name,
                        countries.flag
                        ')
            ->leftjoin('countries', 'countries.id', '=', 'tbl_product_items.place_of_origin')
            ->where('tbl_product_items.place_of_origin', decrypt($request->country_id))->limit(1)->get();

        $loginBuyerIds = $request->loginBuyer;
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        $countallcountries = DB::table('countries')->count();
        return view('user.mpingiusers.viewcountryproduct', ['countries' => $countries], compact('getflag', 'countallcountries', 'products', 'loginBuyerIds', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }

    // ///////////////////////////end all product on sale/////////////////////////////////


    public function ItemDetailsbuyId(Request $request)
    {
        $prductdetails = Product::where('id', decrypt($request->id))->first();
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('user.mpingiusers.items_details_buy', ['countries' => $countries], compact('industriesids', 'servicesids', 'categoryids', 'prductdetails', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }

    public function Orderstatus(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('user.mpingiusers.order_status', ['countries' => $countries], compact('industriesids', 'servicesids', 'categoryids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }


    public function ItemDetailsOrder(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('user.mpingiusers.item_details', ['countries' => $countries], compact('industriesids', 'servicesids', 'categoryids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }

    public function ProfileInfo(Request $request)
    {
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', Auth::user()->id)->get();
        $countries = Country::all();

        $data = DB::table('users')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'countries.name as countryname',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
            )
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('users.id', $user)
            ->get();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $days = Day::all();
        $months = Month::all();
        $years = Year::all();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('user.mpingiusers.profile', ['countries' => $countries], compact('industriesids', 'servicesids', 'categoryids', 'days', 'months', 'years', 'getuser', 'data', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }


    public function Business(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',

            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('user.mpingiusers.business', ['countries' => $countries], compact('industriesids', 'servicesids', 'categoryids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }


    public function UpdatemyBusinessAccount(Request $request)
    {

        $mybusiness = tbl_mping_business::findOrFail($request->business_id);
        $bData = [
            'email' => NULL,
            'register_date' => NULL,
            'business_name' => $request->business_name,
            'business_motto' => $request->business_motto,
            'business_logo' => NULL,
            'business_type' => $request->business_type,
            'dealers_in' => $request->dealers_in,
            'department' => $request->department,
            'job_title' => $request->job_title,
            'i_am_a' => $request->i_am_a,
            'fax' => $request->fax,
            'po_box' => $request->po_box,
            'website' => $request->website,
            'address' => $request->address,
            'shipping' => NULL,
            'notification' => NULL,
            'banner_color' => NULL,
            'banner_title_color' => NULL,
            'shop_status' => NULL,
            'description' => $request->description,
            'views' => NULL,
            'type' => NULL,
            'business_icon' => $request->business_icon,
        ];

        $mybusiness->update($bData);

        return response()->json([
            'status4' => "200",
        ]);

    }

    public function Pagelinks(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $getuserlinks = DB::table('tbl_userlinks')
            ->select(
                'tbl_userlinks.id',
                'tbl_userlinks.user_id',
                'tbl_userlinks.login_date',
                'tbl_userlinks.website_name',
                'tbl_userlinks.website_link',
                'tbl_userlinks.facebook_link',
                'tbl_userlinks.twitter_link',
                'tbl_userlinks.youtube_link',
                'tbl_userlinks.instagram_link',
                'tbl_userlinks.map_link',
                'users.id as uid'
            )
            ->leftjoin('users', 'users.id', '=', 'tbl_userlinks.user_id')
            ->where(['tbl_userlinks.user_id' => $user])
            ->get();


        return view('user.mpingiusers.page_links', ['countries' => $countries], compact('getuserlinks', 'industriesids', 'servicesids', 'categoryids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }

    public function UpdatePagelinks(Request $request)
    {

        $newDateTimeNow = date("l, F d, Y");
        $link = new tbl_userlink;
        $link->user_id = $request->id;
        $link->login_date = $newDateTimeNow;
        $link->website_name = $request->website_name;
        $link->website_link = $request->website_link;
        $link->facebook_link = $request->facebook_link;
        $link->instagram_link = $request->instagram_link;
        $link->twitter_link = $request->twitter_link;
        $link->youtube_link = $request->youtube_link;
        $link->map_link = $request->map_link;
        $link->save();

        return response()->json([
            'status' => 200,
        ]);

    }

    public function EditPagelinks(Request $request)
    {

        $newDateTimeNow = date("l, F d, Y");
        tbl_userlink::where('id', $request->id)
            ->update([
                'login_date' => $newDateTimeNow,
                'website_name' => $request->website_name,
                'website_link' => $request->website_link,
                'facebook_link' => $request->facebook_link,
                'instagram_link' => $request->instagram_link,
                'twitter_link' => $request->twitter_link,
                'youtube_link' => $request->youtube_link,
                'map_link' => $request->map_link,

            ]);
        return response()->json([
            'status' => 200,
        ]);

    }

    public function Deleteaccount(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('user.mpingiusers.delete_account', ['countries' => $countries], compact('industriesids', 'servicesids', 'categoryids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }


    public function NewMail(Request $request)
    {
        $user = Auth::user()->id ?? 'session expired';
        if ($request->ajax()) {
            $data = DB::table('tbl_chats')
                ->select(
                    'tbl_chats.id',
                    'tbl_chats.seller_id',
                    'tbl_chats.buyer_id',
                    'tbl_chats.message',
                    'tbl_chats.email',
                    'tbl_chats.message_status',
                    'tbl_chats.date_created',
                    'tbl_chats.reply',
                    'tbl_chats.date_reply',
                    'users.profile',
                    'users.islogged',
                    'users.id as uid',
                    DB::raw('CONCAT(users.last_name, " ",  users.first_name) AS full_name')
                )
                ->leftjoin('users', 'users.id', '=', 'tbl_chats.buyer_id')
                ->whereNot('users.id', $user)
                ->get();

            return Datatables::of($data)

                ->addColumn('message', function ($data) {

                    $messages = "";
                    if ($data->message_status === "read") {
                        $messages = $data->message;
                        return $messages;

                    } else {
                        $messages = "<center style='background-color:red;color:#fff;border-radius:4px;padding:5px'>Read a Message</center>";
                        return $messages;
                    }

                })

                ->addColumn('images', function ($data) {

                    $image = "";
                    if ($data->message_status === "read") {
                        $image = $data->profile ? '<img src="/storage/assets/uploads/' . $data->profile . '"
                     width="50" height="50" class="mr-2 rounded-circle">' : '<img src="/storage/assets/images/avatar_nzuzi_default.png"
                     width="50" height="50" class="mr-2 rounded-circle">';
                        return $image;

                    } else {
                        $image = "<center style='background-color:red;color:#fff;border-radius:4px;padding:5px'>Read a Message</center>";
                        return $image;
                    }

                })

                ->addColumn('date_created', function ($data) {

                    $dates = "";
                    if ($data->message_status === "read") {
                        $dates = Carbon::parse($data->date_created)->format('l,F d, Y');
                        return $dates;

                    } else {
                        $dates = "<center style='background-color:red;color:#fff;border-radius:4px;padding:5px'>Read a Message</center>";
                        return $dates;
                    }

                })

                //                 <span rel="facebox" class="btn-deleteMessage" title="Buyer response your reply" data-delid="'.$data->id.'"
//                 style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666666;text-decoration: none;">
//                 <i class="fas fa-comments" style="color:#333333"></i> Response
//  </span>


                ->addColumn('action', function ($data) {

                    $html3 = "";
                    if ($data->message_status === "read") {
                        return '<div class="d-flex">
                        <div class="flex-1">
                        <a rel="facebox" href="javascript.void(0)"  data-bid="' . $data->id . '" data-photo="' . $data->profile . '" data-rep="' . $data->reply . '" data-fname="' . $data->full_name . '" data-selid="' . Auth::user()->id . '" class="btn_getreplynow" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#333333;text-decoration: none;" data-bs-toggle="modal" data-bs-target="#replychat_Modal">
                                                    <b class="b"><i class="fa fa-reply" style="color:#333333"></i> Reply</b>
                                         </a>&nbsp;</div>
                                                   <div class="flex-1">
                                         <span rel="facebox" class="btn-deleteMessage" data-delid="' . $data->id . '"
                                                    style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666666;text-decoration: none;">
                                                    <i class="fa fa-trash" style="color:#333333"></i> Delete
                                       </span>


                                </div>
                             </div>
                         ';

                    } else {
                        $html3 = '<center><i class="fa fa-envelope btn-readmessageclick" data-sid="' . $data->id . '" style="color:#333333" title="Read a message"></i></center>';
                    }
                    return $html3;
                })

                ->addColumn('islogged', function ($data) {

                    $html1 = "";
                    if ($data->islogged === "Online") {
                        $html1 = '<center><img src="' . url("assets/images/online.png") . '" alt=""></center>';
                    } else {
                        $html1 = '<center><img src="' . url("assets/images/off.png") . '" alt=""></center>';
                    }
                    return $html1;
                })

                ->rawColumns(['images', 'message', 'date_created', 'action', 'islogged'])
                ->make(true);
        }

        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $getcountbuyer = DB::table('tbl_chats')
            ->select(
                'tbl_chats.id',
                'tbl_chats.seller_id',
                'tbl_chats.buyer_id',
                'tbl_chats.message',
                'tbl_chats.email',
                'tbl_chats.message_status',
                'tbl_chats.date_created',
                'users.profile',
                'users.islogged',
                'users.id as uid',
                DB::raw("(COUNT(tbl_chats.buyer_id)) as count_buyerid")
            )
            ->leftjoin('users', 'users.id', '=', 'tbl_chats.buyer_id')
            ->whereNot(['users.id' => $user])
            ->get();


        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('user.mpingiusers.new_mail', ['countries' => $countries], compact('getcountbuyer', 'industriesids', 'servicesids', 'categoryids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }


    public function ReadMessage(Request $request)
    {
        // dd($request->id);
        tbl_chat::where('id', $request->id)
            ->update(['message_status' => 'read']);

        return response()->json([
            'statusx' => 200,
        ]);

    }


    public function Inbox(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('user.mpingiusers.inbox', ['countries' => $countries], compact('industriesids', 'servicesids', 'categoryids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }

    public function Reply(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('user.mpingiusers.reply', ['countries' => $countries], compact('industriesids', 'servicesids', 'categoryids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }


    public function Changepassword(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('user.mpingiusers.change_password', ['countries' => $countries], compact('industriesids', 'servicesids', 'categoryids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }

    public function Online(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $usersOnline = DB::table('users')
            ->where('islogged', 'Online')
            ->whereNot('id', $user)
            ->count();

        $getusersOnline = DB::table('users')
            ->where('islogged', 'Online')
            ->whereNot('id', $user)
            ->get();

        return view('user.mpingiusers.online', ['countries' => $countries], compact('getusersOnline', 'usersOnline', 'industriesids', 'servicesids', 'categoryids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }


    public function getchat(Request $request)
    {

        $messages = DB::table('users')
            ->select(

                'users.id as uid',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'tbl_chatboxes.id as ids',
                'tbl_chatboxes.sender_id',
                'tbl_chatboxes.receiver_id',
                'tbl_chatboxes.message',
                'tbl_chatboxes.dates'
            )
            ->leftjoin('tbl_chatboxes', 'tbl_chatboxes.receiver_id', '=', 'users.id')
            ->where('users.id', $request->recipient_id)
            //    ->groupBy('tbl_chatboxes.receiver_id')
            ->get();
        return response()->json($messages);



        //    dd($request->recipient_id);

    }

    public function storechat(Request $request)
    {

        date_default_timezone_set("asia/manila");
        $time = date('H:i');
        $dates = date('Y-m-d h : i A');

        // Validate the incoming request data
        $request->validate([
            //'recipient_id' => 'required|exists:users,id',
            'message' => 'required|string|max:100',
        ]);
        $message = new tbl_chatbox();
        $message->sender_id = $request->sender_id;
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->dates = $dates;
        $message->save();
        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully!',
        ]);

    }


    /////////////////////////Free Post Duration step 1 to 2////////////////////////////////////


    public function FreePostDuration(Request $request)
    { //for start post for free
        $countries = Country::all();
        $fetchallCategories = Tbl_category::all();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->id))
            ->get();

        $fetchallSubCategories = DB::table('tbl_sub_categories')
            ->where('category_id', decrypt($request->id))
            // ->orderBy('sub_category_name_en', 'DESC')
            ->get();

        foreach ($fetchallSubCategories as $row) {

            $fetchAllArticles = DB::table('tbl_articles')
                ->where('category_id', decrypt($request->id))
                ->orWhere('sub_category_id', $row->id)
                ->get();

        }

        $fetchallarticle = DB::table('tbl_articles')
            ->where('id', decrypt($request->id))
            ->get();

        foreach ($fetchallarticle as $row2) {
            $a_article_id = $row2->id;
            $a_category_id = $row2->category_id;
            $a_sub_category_id = $row2->sub_category_id;

            $fetchallProductID = DB::table('tbl_products')
                ->where('category_id', $a_category_id)
                ->orWhere('sub_category_id', $a_sub_category_id)
                ->orWhere('article_id', $request->category_id)
                ->get();

        }

        foreach ($fetchallProductID as $row3) {

            $product_id_sub_products = $row3->id;
            $catedory_id_sub_products = $row3->category_id;
            $sub_catedory_id_sub_products = $row3->sub_category_id;
            $article_id_sub_products = $row3->article_id;

            $fetchallSubProductID = DB::table('tbl_sub_products')
                ->where('category_id', $catedory_id_sub_products)
                ->orWhere('subcategory_id', $sub_catedory_id_sub_products)
                ->orWhere('article_id', $request->article_id_sub_products)
                ->orWhere('product_id', $request->product_id_sub_products)
                ->get();

        }

        $authuser = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $authuser)->get();
        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $authuser)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $authuser, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $authuser, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $allcountsql = DB::table('tbl_product_items')
            ->select('sub_category_id', 'category_id', DB::raw('COUNT(article_id) AS article_countall, article_id'))
            ->where('user_id', $authuser)
            ->groupBy('sub_category_id')
            ->get();

        $allcountarticle = DB::table('tbl_product_items')
            ->select('sub_category_id', 'category_id', 'article_id', DB::raw('COUNT(article_id) AS articlesub_count, article_id'))
            ->where('user_id', $authuser)
            ->groupBy('article_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('user.mpingiusers.f_category', [
            'countries' => $countries,
            'fetchallCategories' => $fetchallCategories,
            'categoryids' => $categoryids,
            'industriesids' => $industriesids,
            'servicesids' => $servicesids,
            'CategoriesID' => $CategoriesID,
            'fetchallSubCategories' => $fetchallSubCategories,
            'fetchAllArticles' => $fetchAllArticles,
            'fetchallSubProductID' => $fetchallSubProductID,
            'fetchallProductID' => $fetchallProductID,
            'user_id' => $authuser,
            'getuser' => $getuser,
            'getbusinessdata' => $getbusinessdata,
            'countProductItems' => $countProductItems,
            'countProductItems1' => $countProductItems1,
            'allcountsql' => $allcountsql,
            'allcountarticle' => $allcountarticle

        ])->render();


    }



    public function PaidPostDuration(Request $request)
    {
        $adType = $request->ad_type;
        $countries = Country::all();
        $fetchallCategories = Tbl_category::all();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->id))
            ->get();

        $fetchallSubCategories = DB::table('tbl_sub_categories')
            ->where('category_id', decrypt($request->id))
            // ->orderBy('sub_category_name_en', 'DESC')
            ->get();

        foreach ($fetchallSubCategories as $row) {

            $fetchAllArticles = DB::table('tbl_articles')
                ->where('category_id', decrypt($request->id))
                ->orWhere('sub_category_id', $row->id)
                ->get();

        }

        $fetchallarticle = DB::table('tbl_articles')
            ->where('id', decrypt($request->id))
            ->get();

        foreach ($fetchallarticle as $row2) {
            $a_article_id = $row2->id;
            $a_category_id = $row2->category_id;
            $a_sub_category_id = $row2->sub_category_id;

            $fetchallProductID = DB::table('tbl_products')
                ->where('category_id', $a_category_id)
                ->orWhere('sub_category_id', $a_sub_category_id)
                ->orWhere('article_id', $request->category_id)
                ->get();

        }

        foreach ($fetchallProductID as $row3) {

            $product_id_sub_products = $row3->id;
            $catedory_id_sub_products = $row3->category_id;
            $sub_catedory_id_sub_products = $row3->sub_category_id;
            $article_id_sub_products = $row3->article_id;

            $fetchallSubProductID = DB::table('tbl_sub_products')
                ->where('category_id', $catedory_id_sub_products)
                ->orWhere('subcategory_id', $sub_catedory_id_sub_products)
                ->orWhere('article_id', $request->article_id_sub_products)
                ->orWhere('product_id', $request->product_id_sub_products)
                ->get();

        }

        $authuser = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $authuser)->get();
        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $authuser)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $authuser, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $authuser, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $allcountsql = DB::table('tbl_product_items')
            ->select('sub_category_id', 'category_id', DB::raw('COUNT(article_id) AS article_countall, article_id'))
            ->where('user_id', $authuser)
            ->groupBy('sub_category_id')
            ->get();

        $allcountarticle = DB::table('tbl_product_items')
            ->select('sub_category_id', 'category_id', 'article_id', DB::raw('COUNT(article_id) AS articlesub_count, article_id'))
            ->where('user_id', $authuser)
            ->groupBy('article_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('user.mpingiusers.f_category_paid', [
            'countries' => $countries,
            'fetchallCategories' => $fetchallCategories,
            'categoryids' => $categoryids,
            'industriesids' => $industriesids,
            'servicesids' => $servicesids,
            'CategoriesID' => $CategoriesID,
            'fetchallSubCategories' => $fetchallSubCategories,
            'fetchAllArticles' => $fetchAllArticles,
            'fetchallSubProductID' => $fetchallSubProductID,
            'fetchallProductID' => $fetchallProductID,
            'user_id' => $authuser,
            'getuser' => $getuser,
            'getbusinessdata' => $getbusinessdata,
            'countProductItems' => $countProductItems,
            'countProductItems1' => $countProductItems1,
            'allcountsql' => $allcountsql,
            'allcountarticle' => $allcountarticle,
            'ad_type' => $adType

        ])->render();


    }



    public function FreePostDurations(Request $request)
    { //main and for back icon
        $countries = Country::all();
        $fetchallCategories = Tbl_category::all();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->id))
            ->get();

        $fetchallSubCategories = DB::table('tbl_sub_categories')
            ->where('category_id', decrypt($request->id))
            // ->orderBy('sub_category_name_en', 'DESC')
            ->get();

        foreach ($fetchallSubCategories as $row) {

            $fetchAllArticles = DB::table('tbl_articles')
                ->where('category_id', decrypt($request->id))
                ->orWhere('sub_category_id', $row->id)
                ->get();

        }

        $fetchallarticle = DB::table('tbl_articles')
            ->where('id', decrypt($request->id))
            ->get();

        foreach ($fetchallarticle as $row2) {
            $a_article_id = $row2->id;
            $a_category_id = $row2->category_id;
            $a_sub_category_id = $row2->sub_category_id;

            $fetchallProductID = DB::table('tbl_products')
                ->where('category_id', $a_category_id)
                ->orWhere('sub_category_id', $a_sub_category_id)
                ->orWhere('article_id', $request->category_id)
                ->get();

        }

        foreach ($fetchallProductID as $row3) {

            $product_id_sub_products = $row3->id;
            $catedory_id_sub_products = $row3->category_id;
            $sub_catedory_id_sub_products = $row3->sub_category_id;
            $article_id_sub_products = $row3->article_id;

            $fetchallSubProductID = DB::table('tbl_sub_products')
                ->where('category_id', $catedory_id_sub_products)
                ->orWhere('subcategory_id', $sub_catedory_id_sub_products)
                ->orWhere('article_id', $request->article_id_sub_products)
                ->orWhere('product_id', $request->product_id_sub_products)
                ->get();

        }

        $authuser = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $authuser)->get();
        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $authuser)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $authuser, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $authuser, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('user.mpingiusers.f_category', [
            'countries' => $countries,
            'fetchallCategories' => $fetchallCategories,
            'categoryids' => $categoryids,
            'industriesids' => $industriesids,
            'servicesids' => $servicesids,
            'CategoriesID' => $CategoriesID,
            'fetchallSubCategories' => $fetchallSubCategories,
            'fetchAllArticles' => $fetchAllArticles,
            'fetchallSubProductID' => $fetchallSubProductID,
            'fetchallProductID' => $fetchallProductID,
            'user_id' => $authuser,
            'getuser' => $getuser,
            'getbusinessdata' => $getbusinessdata,
            'countProductItems' => $countProductItems,
            'countProductItems1' => $countProductItems1,

        ])->render();

    }


    public function FreePostDurationsJavascriptfunction(Request $request, $id)
    { //javascript function
        $user = Auth::user()->id ?? 'session expired';
        $countries = Country::all();
        $fetchallCategories = Tbl_category::all();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->id))
            ->get();

        $fetchallSubCategories = DB::table('tbl_sub_categories')
            ->where('category_id', decrypt($request->id))
            // ->orderBy('sub_category_name_en', 'DESC')
            ->get();

        foreach ($fetchallSubCategories as $row) {

            $fetchAllArticles = DB::table('tbl_articles')
                ->where('category_id', decrypt($request->id))
                ->orWhere('sub_category_id', $row->id)
                ->get();

        }

        $fetchallarticle = DB::table('tbl_articles')
            ->where('id', decrypt($request->id))
            ->get();

        foreach ($fetchallarticle as $row2) {
            $a_article_id = $row2->id;
            $a_category_id = $row2->category_id;
            $a_sub_category_id = $row2->sub_category_id;

            $fetchallProductID = DB::table('tbl_products')
                ->where('category_id', $a_category_id)
                ->orWhere('sub_category_id', $a_sub_category_id)
                ->orWhere('article_id', $request->category_id)
                ->get();

        }

        foreach ($fetchallProductID as $row3) {

            $product_id_sub_products = $row3->id;
            $product_id_encrypt = encrypt($row3->id);
            $catedory_id_sub_products = $row3->category_id;
            $sub_catedory_id_sub_products = $row3->sub_category_id;
            $article_id_sub_products = $row3->article_id;

            $fetchallSubProductID = DB::table('tbl_sub_products')
                ->where('category_id', $catedory_id_sub_products)
                ->orWhere('subcategory_id', $sub_catedory_id_sub_products)
                ->orWhere('article_id', $request->article_id_sub_products)
                ->orWhere('product_id', $request->product_id_sub_products)
                ->get();

        }

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_product_items.user_id as pi_user_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        // $length = 2;
        // $shuffleNumber = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
        $user = Auth::user()->id;
        return response()->json([
            'status0' => $fetchallCategories, //pass into ajax
            'status' => $CategoriesID, //pass into ajax
            'status2' => $fetchallSubCategories, //pass into ajax
            'status3' => $fetchAllArticles, //pass into ajax
            'status3half' => $fetchallProductID, //pass into ajax
            'status4' => $fetchallSubProductID, //pass into ajax
            'status5' => $product_id_encrypt, //pass into ajax
            'status6' => $user, //pass into ajax
        ]);

        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $days = Day::all();
        $months = Month::all();
        $years = Year::all();

        $getid = User::where('id', $user)->get();
        $country_name = "";
        $state_name = "";
        $city_name = "";
        foreach ($getid as $row) {
            $country_name = Country::where('id', $row->country)->limit(1)->get();
            $state_name = State::where('id', $row->country_id)->limit(1)->get();
            $city_name = City::where('id', $row->state_id)->limit(1)->get();

        }


        return view('user.mpingiusers.f_category', [
            'countries' => $countries,
            'fetchallCategories' => $fetchallCategories,
            'categoryids' => $categoryids,
            'industriesids' => $industriesids,
            'servicesids' => $servicesids,
            'getuser' => $getuser,
            'getbusinessdata' => $getbusinessdata,
            'countProductItems' => $countProductItems,
            'countProductItems1' => $countProductItems1

        ])->render();

    }


    /////////////////////////end Free Post Duration step 1 to 2////////////////////////////////////


    /////////////////////////end Free Post Duration step 2 form////////////////////////////////////
    public function GetCSubProductID(Request $request, $id, $subcategory_id, $article_id, $category_id, $user_id)
    { //for fill form items product

        $category_name = DB::table('tbl_categories')
            ->where('id', decrypt($request->category_id))
            ->get();

        $subcategories_name = DB::table('tbl_sub_categories')
            ->where('id', decrypt($request->subcategory_id))
            ->get();

        $article_name = DB::table('tbl_articles')
            ->where('id', decrypt($request->article_id))
            ->get();

        $subproduct_name = DB::table('tbl_sub_products')
            ->where('id', decrypt($request->id))
            ->get();

        $fetchallCategories = Tbl_category::all();

        $CategoriesIDs = DB::table('tbl_categories')
            ->where('id', decrypt($request->category_id))
            ->get();

        $users = DB::table('users')
            ->where('id', $request->user_id)
            ->get();

        $date = Carbon::now();
        $created_at = $date->toArray();

        $countries = Country::all();

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'countries.name as countryname',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $productduration = DB::table('users')
            ->select('product_duration')
            ->where(['id' => $user])
            ->get();


        return view('user.mpingiusers.sub_products_form', compact('productduration', 'countries', 'categoryids', 'industriesids', 'servicesids', 'subcategories_name', 'article_name', 'subproduct_name', 'category_name', 'fetchallCategories', 'CategoriesIDs', 'users', 'created_at', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }


    public function GetCSubProductIDPaid(Request $request, $id, $subcategory_id, $article_id, $category_id, $user_id, $ad_type)
    { //for fill form items product

        $category_name = DB::table('tbl_categories')
            ->where('id', decrypt($request->category_id))
            ->get();

        $subcategories_name = DB::table('tbl_sub_categories')
            ->where('id', decrypt($request->subcategory_id))
            ->get();

        $article_name = DB::table('tbl_articles')
            ->where('id', decrypt($request->article_id))
            ->get();

        $subproduct_name = DB::table('tbl_sub_products')
            ->where('id', decrypt($request->id))
            ->get();

        $fetchallCategories = Tbl_category::all();

        $CategoriesIDs = DB::table('tbl_categories')
            ->where('id', decrypt($request->category_id))
            ->get();

        $users = DB::table('users')
            ->where('id', $request->user_id)
            ->get();

        $date = Carbon::now();
        $created_at = $date->toArray();

        $countries = Country::all();

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'countries.name as countryname',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $ad_type = $request->ad_type;

        $postnumber = DB::table('users')
            ->select('post_number')
            ->where(['users.id' => $user])
            ->get();

        return view('user.mpingiusers.sub_products_form_paid', compact('postnumber', 'countries', 'categoryids', 'industriesids', 'servicesids', 'subcategories_name', 'article_name', 'subproduct_name', 'category_name', 'fetchallCategories', 'CategoriesIDs', 'users', 'created_at', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'ad_type'))->render();

    }



    public function GetCSubProductID2javascript(Request $request, $encrypt_id, $id, $subcategory_id, $article_id, $category_id, $user_id)
    {
        $category_name = DB::table('tbl_categories')
            ->where('id', $request->category_id)
            ->get();

        $subcategories_name = DB::table('tbl_sub_categories')
            ->where('id', $request->subcategory_id)
            ->get();

        $article_name = DB::table('tbl_articles')
            ->where('id', $request->article_id)
            ->get();

        $subproduct_name = DB::table('tbl_sub_products')
            ->where('id', $request->id)
            ->get();

        $fetchallCategories = Tbl_category::all();
        $CategoriesIDs = DB::table('tbl_categories')
            ->where('id', $request->category_id)
            ->get();

        $users = DB::table('users')
            ->where('id', $request->user_id)
            ->get();


        $countries = Country::all();

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();

        $date = Carbon::now();
        $created_at = $date->toArray();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'users.product_duration',
                'countries.name as countryname',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('user.mpingiusers.sub_products_form', compact('countries', 'categoryids', 'industriesids', 'servicesids', 'subcategories_name', 'article_name', 'subproduct_name', 'category_name', 'fetchallCategories', 'CategoriesIDs', 'created_at', 'users', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }

    public function FreePostDurationsInsertDatafromform(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'place_of_origin' => '',
            'city' => '',
            'state_id' => '',
            'product_web_name' => '',
            'product_web_link' => '',
            'item_name' => 'required',
            'brand_name' => 'required',
            'pieces' => 'required',
            'types' => 'required',
            'product_color' => 'required',
            'negotiable' => 'required',
            'price' => 'required',
            'oldprice' => '',
            'currency' => 'required',
            'item_descriptions' => 'required',
            'payment' => 'required',
            'weight' => '',
            'volume' => '',
            'shipping' => 'required',
            'delivery' => 'required',
            'day_return' => 'required',
        ], [
            'place_of_origin.required' => '',
            'city.required' => '',
            'state_id.required' => '',
            'product_web_name.required' => '',
            'product_web_link.required' => '',
            'item_name.required' => 'Required Product Name',
            'brand_name.required' => 'Required Select',
            'pieces.required' => 'Required Quantity',
            'types.required' => 'Required Select',
            'product_color.required' => 'Required Select Color',
            'negotiable.required' => 'Required Select in Toggle',
            'price.required' => 'Required New Price',
            'oldprice.required' => '',
            'currency.required' => 'Required Select',
            'item_descriptions.required' => 'Required Enter Details',
            'payment.required' => 'Required Select Pay on delivery or pickup',
            'weight.required' => '',
            'volume.required' => '',
            'shipping.required' => 'Required Select Shipping Atleast One',
            'delivery.required' => 'Required Select Delivery Atleast One',
            'day_return.required' => 'Required Select Days Atleast One',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        //  date_default_timezone_set("asia/manila");
        date("l,F d, Y");
        $newDateTime = date('l,F d, Y', strtotime("+31 days"));
        $delete_total_days = date('l,F d, Y', strtotime("+76 days"));
        $expireddate_remain = Carbon::now()->addDays(76);

        $shipping_p = $request->shipping_price . ' ' . $request->currency;

        $products = new Tbl_products_item;
        $products->user_id = $request->user_id;
        $products->post_date_of_item = \Carbon\Carbon::now();
        $products->category_id = $request->category_id;
        $products->sub_category_id = $request->sub_category_id;
        $products->article_id = $request->article_id;
        $products->sub_product_id = $request->sub_product_id;
        $products->place_of_origin = $request->place_of_origin;
        $products->city = $request->city;
        $products->state_id = $request->state_id;
        $products->product_web_name = $request->product_web_name;
        $products->product_web_link = $request->product_web_link;
        $products->disponibility = $request->disponibility;
        $products->item_name = $request->item_name;
        $products->product_type = $request->product_type;
        $products->brand_name = $request->brand_name;
        $products->pieces = $request->pieces;
        $products->type = $request->types;
        $products->post_expiry_date = $newDateTime;
        $products->post_delete_date = $delete_total_days;
        $products->product_color = $request->product_color;
        $products->negotiable = $request->negotiable;
        $products->price = $request->price;
        $products->old_price = $request->old_price;
        $products->currency = $request->currency;
        $products->item_descriptions = $request->item_descriptions;
        $products->payment = $request->payment;
        $products->weight = $request->weight;
        $products->volume = $request->volume;
        $products->shipping = $request->shipping;
        $products->shipping_price = $shipping_p;
        $products->delivery = $request->delivery;
        $products->day_return = $request->day_return;
        $products->expireddate_remain = $expireddate_remain;
        $products->slug = Str::slug($request->product_type);
        $products->save();

        $user = User::find($request->user_id);
        $user->post_number += 1;
        $user->save();

        return response()->json([
            'status' => 200,
        ]);


    }

    public function PaidPostDurationsInsertDatafromform(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'place_of_origin' => '',
            'city' => '',
            'state_id' => '',
            'product_web_name' => '',
            'product_web_link' => '',
            'item_name' => 'required',
            'brand_name' => 'required',
            'pieces' => 'required',
            'types' => 'required',
            'product_color' => 'required',
            'negotiable' => 'required',
            'price' => 'required',
            'oldprice' => '',
            'currency' => 'required',
            'item_descriptions' => 'required',
            'payment' => 'required',
            'weight' => '',
            'volume' => '',
            'ad_type' => '',
            'shipping' => 'required',
            'delivery' => 'required',
            'day_return' => 'required',
        ], [
            'place_of_origin.required' => '',
            'city.required' => '',
            'state_id.required' => '',
            'product_web_name.required' => '',
            'product_web_link.required' => '',
            'item_name.required' => 'Required Product Name',
            'brand_name.required' => 'Required Select',
            'pieces.required' => 'Required Quantity',
            'types.required' => 'Required Select',
            'product_color.required' => 'Required Select Color',
            'negotiable.required' => 'Required Select in Toggle',
            'price.required' => 'Required New Price',
            'oldprice.required' => '',
            'currency.required' => 'Required Select',
            'item_descriptions.required' => 'Required Enter Details',
            'payment.required' => 'Required Select Pay on delivery or pickup',
            'weight.required' => '',
            'volume.required' => '',
            'ad_type.required' => '',
            'shipping.required' => 'Required Select Shipping Atleast One',
            'delivery.required' => 'Required Select Delivery Atleast One',
            'day_return.required' => 'Required Select Days Atleast One',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        //  date_default_timezone_set("asia/manila");
        date("l,F d, Y");
        $newDateTime = date('l,F d, Y', strtotime("+31 days"));
        $delete_total_days = date('l,F d, Y', strtotime("+76 days"));
        $expireddate_remain = Carbon::now()->addDays(76);

        $products = new Tbl_products_item;
        $products->user_id = $request->user_id;
        $products->post_date_of_item = \Carbon\Carbon::now();
        $products->category_id = $request->category_id;
        $products->sub_category_id = $request->sub_category_id;
        $products->article_id = $request->article_id;
        $products->sub_product_id = $request->sub_product_id;
        $products->place_of_origin = $request->place_of_origin;
        $products->city = $request->city;
        $products->state_id = $request->state_id;
        $products->product_web_name = $request->product_web_name;
        $products->product_web_link = $request->product_web_link;
        $products->disponibility = $request->disponibility;
        $products->item_name = $request->item_name;
        $products->product_type = $request->product_type;
        $products->brand_name = $request->brand_name;
        $products->pieces = $request->pieces;
        $products->type = $request->types;
        $products->post_expiry_date = $newDateTime;
        $products->post_delete_date = $delete_total_days;
        $products->product_color = $request->product_color;
        $products->negotiable = $request->negotiable;
        $products->price = $request->price;
        $products->old_price = $request->old_price;
        $products->currency = $request->currency;
        $products->item_descriptions = $request->item_descriptions;
        $products->payment = $request->payment;
        $products->weight = $request->weight;
        $products->volume = $request->volume;
        $products->ad_type = $request->ad_type;
        $products->shipping = $request->shipping;
        $products->shipping_price = $request->shipping_price;
        $products->delivery = $request->delivery;
        $products->day_return = $request->day_return;
        $products->expireddate_remain = $expireddate_remain;
        $products->save();

        $user = User::find($request->user_id);
        $user->post_number += 1;
        $user->save();

        // User::where('id', $request->user_id)
        // ->update(['post_number'=> DB::raw('post_number + 1')]);

        return response()->json([
            'status' => 200,
        ]);


    }


    /////////////////////////end Free Post Duration step 2 to 2 form////////////////////////////////////

    //   country and state, city dropdown

    public function getCountryCat($country_id)
    {

        $data = State::where('country_id', $country_id)->get();
        return response()->json(['data' => $data]);

    }

    public function getStateCat($state_id)
    {

        $data = City::where('state_id', $state_id)->get();
        return response()->json(['data' => $data]);
    }
    //end country and state, city dropdown


    //Update my Account

    public function updateMyAccount(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'first_name' => 'required|regex:/^([a-zA-Z\s\-\+\/\(\)]*)$/',
            'middle_name' => ''
        ], [
            'first_name.required' => 'Required First Name',
            'middle_name.required' => '',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors2' => $validator->errors()]);
        }
        $users = User::find($request->user_id);
        $uData = [
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'date' => $request->date,
            'month' => $request->month,
            'year' => $request->year,
            'country' => $request->country,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'mobile' => $request->mobile,
            'pobox' => $request->pobox,
            'phone' => $request->phone,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2
        ];
        $users->update($uData);

        $check = tbl_mping_business::where('user_id', $request->user_id)->get();
        $count = count($check);
        if ($count < 1) {
            $values = array(
                'user_id' => $request->user_id,
                'country_id' => $request->country,
                'state_id' => $request->country_id,
                'city_id' => $request->state_id
            );
            DB::table('tbl_mping_businesses')->insert($values);

        } else {
            //no need to add again if existing records
        }

        return response()->json([
            'status' => "200",
        ]);



    }

    //end Update my Account


    // update profile
    public function updateMyProfile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'profile' => 'image|mimes:png,jpg,gif,jpeg|max:2048'

        ], [
            'profile.required' => 'Image upload is 2mb maximum upload allowed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $fileName = '';
        $profile = User::find($request->id);
        $file = $request->file('profile');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('/public/assets/uploads/', $fileName);
        $pData = [
            'profile' => $fileName,

        ];

        $profile->update($pData);
        return response()->json([
            'status' => "200",
        ]);
    }

    //end update profile

    // search shop type

    public function SearchShopType(Request $request)
    {
        $query = $request->get('query');
        $filterResult = t_shoptype::where('shoptype_name', 'LIKE', '%' . $query . '%')->get();
        return response()->json(['datas' => $filterResult]);
    }


    public function UploadimageProductItem(Request $request, $id)
    {
        //dd(decrypt($request->id));

        $productitems = DB::table('tbl_product_items')
            ->where('id', decrypt($request->id))
            ->get();

        foreach ($productitems as $pitems) {

            $category_name = DB::table('tbl_categories')
                ->where('id', $pitems->category_id)
                ->get();

            $subcategories_name = DB::table('tbl_sub_categories')
                ->where('id', $pitems->sub_category_id)
                ->get();

            $article_name = DB::table('tbl_articles')
                ->where('id', $pitems->article_id)
                ->get();

            $subproduct_name = DB::table('tbl_sub_products')
                ->where('id', $pitems->sub_product_id)
                ->get();

            $fetchImage = DB::table('tbl_images')
                ->select('tbl_imgs.image_name')
                ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
                ->where('tbl_images.product_item', $pitems->id)
                ->get();

        }

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();



        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'countries.name as countryname',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('user.mpingiusers.upload_images', compact('countries', 'categoryids', 'industriesids', 'servicesids', 'getbusinessdata', 'countProductItems', 'user', 'getuser', 'category_name', 'subcategories_name', 'article_name', 'subproduct_name', 'productitems', 'fetchImage', 'countProductItems1'))->render();
    }


    public function UploadimageProductItemUser(Request $request)
    {


        $uploads = new t_imageupload;
        $uploads->image_upload_date = \Carbon\Carbon::now();
        $uploads->user_id = $request->user_id;
        $uploads->product_item = $request->product_item;
        $uploads->category_id = $request->category_id;
        $uploads->sub_category_id = $request->sub_category_id;
        $uploads->article_id = $request->article_id;
        $uploads->product_id = $request->product_id;
        $uploads->sub_product_id = $request->sub_product_id;
        $uploads->save();

        $files = [];
        $array = $request->file('image_name');
        if (is_iterable($array)) {
            foreach ($array as $media) {
                if (!empty($media)) {
                    $filename = time() . '.' . $media->getClientOriginalName();
                    $media->storeAs("/public/assets/uploads/", $filename);
                    // $files[] = $filename;
                    $getImage = new tbl_imgs;
                    $getImage->image_name = $filename;
                    $getImage->upload_id = $uploads->id;
                    $getImage->uid = $uploads->user_id;
                    $getImage->product_item_id = $uploads->product_item;
                    $getImage->save();

                }
            }
        } else {
            print ("The data given is not iterable.");
        }

        $user = Auth::user()->id ?? 'session expired';
        Tbl_products_item::where(['user_id' => $user, 'product_type' => $request->product_type])
            ->update([
                'item_images' => 1,
                'views' => 0,
            ]);

        //  tbl_mping_purchase::where(['user_id' => $user, 'product_item'=> $request->product_item])
        //  ->update([
        //      'item_images' => 1
        //   ]);

        return response()->json([
            'status4' => "200",
            'upload_id' => encrypt($uploads->id),
        ]);


        //  return redirect()->back()->with('mgs', 'Upload Product Image successfully.');
    }


    public function UploadAdditionalImage(Request $request)
    {

        $rows = DB::table("tbl_images")->where('id', $request->id)->first();
        $rows->id = $request->id;
        $rows->user_id = $request->user_id;
        $rows->product_item = $request->product_item;
        $rows->sub_product_id = $request->sub_product_id;

        $files = [];
        $array = $request->file('newimage_name');
        if (is_iterable($array)) {
            foreach ($array as $media) {
                if (!empty($media)) {
                    $filename = time() . '.' . $media->getClientOriginalName();
                    $media->storeAs("/public/assets/uploads/", $filename);
                    // $files[] = $filename;
                    $getImage = new tbl_imgs;
                    $getImage->image_name = $filename;
                    $getImage->upload_id = $rows->id;
                    $getImage->uid = $rows->user_id;
                    $getImage->product_item_id = $rows->product_item;
                    $getImage->save();

                }
            }
        } else {
            print ("The data given is not iterable.");
        }

        return response()->json([
            'status7' => "200"
            // 'upload_id' => encrypt($uploads->id),
        ]);

    }

    public function ViewPhotos(Request $request, $upload_id)
    {
        //dd(decrypt($request->upload_id));

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $myimages = DB::table('tbl_images')
            ->where('id', decrypt($request->upload_id))
            ->select('*')->get();

        foreach ($myimages as $row) {
            Tbl_products_item::where(['user_id' => $row->user_id, 'id' => $row->product_item])
                ->update([
                    'views' => DB::raw('views + 1'), //increment 1 every view
                ]);

        }

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'countries.name as countryname',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $getimageid = DB::table('tbl_images')
            ->where('id', decrypt($request->upload_id))
            ->select('id', 'user_id', 'product_item', 'sub_product_id')->get();

        $viewImage = DB::table('tbl_imgs')
            ->where('upload_id', decrypt($request->upload_id))
            ->select('id', 'image_name', 'upload_id')->get();

        return view('user.mpingiusers.photos', compact('countries', 'categoryids', 'industriesids', 'servicesids', 'getbusinessdata', 'countProductItems', 'user', 'getuser', 'getimageid', 'viewImage', 'countProductItems1'))->render();

    }

    public function ViewPhotosMyOrder(Request $request, $upload_id)
    {
        //dd(decrypt($request->upload_id));

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $myimages = DB::table('tbl_images')
            ->where('id', decrypt($request->upload_id))
            ->select('*')->get();

        foreach ($myimages as $row) {
            Tbl_products_item::where(['user_id' => $row->user_id, 'id' => $row->product_item])
                ->update([
                    'views' => DB::raw('views + 1'), //increment 1 every view
                ]);

        }

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'countries.name as countryname',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $getimageid = DB::table('tbl_images')
            ->where('id', decrypt($request->upload_id))
            ->select('id', 'user_id', 'product_item', 'sub_product_id')->get();

        $viewImage = DB::table('tbl_imgs')
            ->where('upload_id', decrypt($request->upload_id))
            ->select('id', 'image_name', 'upload_id')->get();

        return view('user.mpingiusers.photos_viewmyorder', compact('countries', 'categoryids', 'industriesids', 'servicesids', 'getbusinessdata', 'countProductItems', 'user', 'getuser', 'getimageid', 'viewImage', 'countProductItems1'))->render();

    }

    public function DeletePhotos(Request $request)
    {

        $ids = $request->imageid;
        DB::table("tbl_imgs")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['status' => 200]);

    }

    public function Viewdetails(Request $request)
    {

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();


        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'countries.name as countryname',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $getimageid = DB::table('tbl_images')
            ->leftjoin('tbl_product_items', 'tbl_product_items.id', '=', 'tbl_images.product_item')
            ->leftjoin('users', 'users.id', '=', 'tbl_images.user_id')
            ->where('tbl_images.id', decrypt($request->upload_id))
            ->select(
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.email',
                'users.mobile',
                'tbl_images.id',
                'tbl_images.product_item',
                'tbl_images.category_id as categoryId',
                'tbl_images.sub_category_id as sub_categoryId',
                'tbl_images.article_id as articleId',
                'tbl_images.product_id',
                'tbl_images.sub_product_id as sub_productId',
                'tbl_images.product_item as user_id',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.product_id',
                'tbl_product_items.id as productID',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
            )->get();

        foreach ($getimageid as $row) {
            Tbl_products_item::where(['user_id' => $row->user_id, 'id' => $row->product_item])
                ->update([
                    'views' => DB::raw('views + 1'), //increment 1 every view
                ]);

        }

        $viewImage = DB::table('tbl_imgs')
            ->where('upload_id', decrypt($request->upload_id))
            ->select('id', 'image_name', 'upload_id')->get();


        $countImage = tbl_imgs::groupBy('upload_id')
            ->selectRaw('count(*) as count, upload_id')
            ->where('upload_id', decrypt($request->upload_id))
            ->pluck('count', 'upload_id');


        foreach ($getimageid as $pitems) {

            $category_name = DB::table('tbl_categories')
                ->where('id', $pitems->categoryId)
                ->get();

            $subcategories_name = DB::table('tbl_sub_categories')
                ->where('id', $pitems->sub_categoryId)
                ->get();

            $article_name = DB::table('tbl_articles')
                ->where('id', $pitems->articleId)
                ->get();

            $subproduct_name = DB::table('tbl_sub_products')
                ->where('id', $pitems->sub_productId)
                ->get();

            $fetchImage = DB::table('tbl_images')
                ->select('tbl_imgs.image_name', 'tbl_imgs.id as imgID')
                ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
                ->where('tbl_images.product_item', $pitems->id)
                ->get();

        }

        $messagecomment = DB::table('tbl_messages')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'tbl_messages.profile_user',
                'tbl_messages.full_name',
                'tbl_messages.message',
                'tbl_messages.read_status',
                'tbl_messages.Reply_status',
                'tbl_messages.type',
                'tbl_messages.created_at as message_date',

            )
            ->leftjoin('users', 'users.id', '=', 'tbl_messages.user_id')
            ->where('tbl_messages.product_id', decrypt($request->product_id))
            ->paginate(10);


        $photoIDS = $request->upload_id;
        $fetchallCategories = Tbl_category::all();
        $countFeedback = tbl_messages::where('tbl_messages.product_id', decrypt($request->product_id))->count();

        return view('user.mpingiusers.view_details', compact('messagecomment', 'countFeedback', 'category_name', 'subcategories_name', 'article_name', 'subproduct_name', 'countries', 'categoryids', 'industriesids', 'servicesids', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'user', 'getuser', 'getimageid', 'viewImage', 'countImage', 'photoIDS', 'fetchallCategories'))->render();


    }


    public function ViewdetailsItems(Request $request)
    {

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();


        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'countries.name as countryname',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $getimageid = DB::table('tbl_images')
            ->leftjoin('tbl_product_items', 'tbl_product_items.id', '=', 'tbl_images.product_item')
            ->leftjoin('users', 'users.id', '=', 'tbl_images.user_id')
            ->where('tbl_images.id', decrypt($request->upload_id))
            ->select(
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.email',
                'users.mobile',
                'tbl_images.id',
                'tbl_images.product_item',
                'tbl_images.category_id as categoryId',
                'tbl_images.sub_category_id as sub_categoryId',
                'tbl_images.article_id as articleId',
                'tbl_images.product_id',
                'tbl_images.sub_product_id as sub_productId',
                'tbl_images.product_item as user_id',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.product_id',
                'tbl_product_items.id as productID',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
            )->get();

        foreach ($getimageid as $row) {
            Tbl_products_item::where(['user_id' => $row->user_id, 'id' => $row->product_item])
                ->update([
                    'views' => DB::raw('views + 1'), //increment 1 every view
                ]);

        }

        $viewImage = DB::table('tbl_imgs')
            ->where('upload_id', decrypt($request->upload_id))
            ->select('id', 'image_name', 'upload_id')->get();


        $countImage = tbl_imgs::groupBy('upload_id')
            ->selectRaw('count(*) as count, upload_id')
            ->where('upload_id', decrypt($request->upload_id))
            ->pluck('count', 'upload_id');


        foreach ($getimageid as $pitems) {

            $category_name = DB::table('tbl_categories')
                ->where('id', $pitems->categoryId)
                ->get();

            $subcategories_name = DB::table('tbl_sub_categories')
                ->where('id', $pitems->sub_categoryId)
                ->get();

            $article_name = DB::table('tbl_articles')
                ->where('id', $pitems->articleId)
                ->get();

            $subproduct_name = DB::table('tbl_sub_products')
                ->where('id', $pitems->sub_productId)
                ->get();

            $fetchImage = DB::table('tbl_images')
                ->select('tbl_imgs.image_name', 'tbl_imgs.id as imgID')
                ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
                ->where('tbl_images.product_item', $pitems->id)
                ->get();

        }

        $messagecomment = DB::table('tbl_messages')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'tbl_messages.profile_user',
                'tbl_messages.full_name',
                'tbl_messages.message',
                'tbl_messages.read_status',
                'tbl_messages.Reply_status',
                'tbl_messages.type',
                'tbl_messages.created_at as message_date',

            )
            ->leftjoin('users', 'users.id', '=', 'tbl_messages.user_id')
            ->where('tbl_messages.product_id', decrypt($request->product_id))
            ->paginate(10);


        $photoIDS = $request->upload_id;
        $fetchallCategories = Tbl_category::all();
        $countFeedback = tbl_messages::where('tbl_messages.product_id', decrypt($request->product_id))->count();

        return view('user.mpingiusers.view_details', compact('messagecomment', 'countFeedback', 'category_name', 'subcategories_name', 'article_name', 'subproduct_name', 'countries', 'categoryids', 'industriesids', 'servicesids', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'user', 'getuser', 'getimageid', 'viewImage', 'countImage', 'photoIDS', 'fetchallCategories'))->render();


    }



    public function ViewdetailsMyOrders(Request $request)
    {

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();


        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'countries.name as countryname',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $getimageid = DB::table('tbl_images')
            ->leftjoin('tbl_product_items', 'tbl_product_items.id', '=', 'tbl_images.product_item')
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'tbl_images.user_id')
            ->leftjoin('users', 'users.id', '=', 'tbl_images.user_id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('tbl_images.id', decrypt($request->upload_id))
            ->select(
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'countries.name as countryname',
                'countries.flag',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_images.id',
                'tbl_images.product_item',
                'tbl_images.category_id as categoryId',
                'tbl_images.sub_category_id as sub_categoryId',
                'tbl_images.article_id as articleId',
                'tbl_images.product_id',
                'tbl_images.sub_product_id as sub_productId',
                'tbl_images.product_item as user_id',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.id as product_id',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )->get();

        foreach ($getimageid as $row) {
            Tbl_products_item::where(['user_id' => $row->user_id, 'id' => $row->product_item])
                ->update([
                    'views' => DB::raw('views + 1'), //increment 1 every view
                ]);

        }

        $viewImage = DB::table('tbl_imgs')
            ->where('upload_id', decrypt($request->upload_id))
            ->select('id', 'image_name', 'upload_id')->get();


        $countImage = tbl_imgs::groupBy('upload_id')
            ->selectRaw('count(*) as count, upload_id')
            ->where('upload_id', decrypt($request->upload_id))
            ->pluck('count', 'upload_id');


        foreach ($getimageid as $pitems) {

            $category_name = DB::table('tbl_categories')
                ->where('id', $pitems->categoryId)
                ->get();

            $subcategories_name = DB::table('tbl_sub_categories')
                ->where('id', $pitems->sub_categoryId)
                ->get();

            $article_name = DB::table('tbl_articles')
                ->where('id', $pitems->articleId)
                ->get();

            $subproduct_name = DB::table('tbl_sub_products')
                ->where('id', $pitems->sub_productId)
                ->get();

            $fetchImage = DB::table('tbl_images')
                ->select('tbl_imgs.image_name', 'tbl_imgs.id as imgID')
                ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
                ->where('tbl_images.product_item', $pitems->id)
                ->get();

        }

        $messagecomment = DB::table('tbl_messages')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'tbl_messages.profile_user',
                'tbl_messages.full_name',
                'tbl_messages.message',
                'tbl_messages.read_status',
                'tbl_messages.Reply_status',
                'tbl_messages.type',
                'tbl_messages.created_at as message_date',

            )
            ->leftjoin('users', 'users.id', '=', 'tbl_messages.user_id')
            ->where('tbl_messages.product_id', decrypt($request->product_id))
            ->paginate(10);

        $photoIDS = $request->upload_id;
        $fetchallCategories = Tbl_category::all();
        $countFeedback = tbl_messages::where('tbl_messages.product_id', decrypt($request->product_id))->count();

        return view('user.mpingiusers.view_detailsmyorders', compact('messagecomment', 'countFeedback', 'category_name', 'subcategories_name', 'article_name', 'subproduct_name', 'countries', 'categoryids', 'industriesids', 'servicesids', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'user', 'getuser', 'getimageid', 'viewImage', 'countImage', 'photoIDS', 'fetchallCategories'))->render();


    }


    public function ViewPhotoBuy(Request $request)
    {

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();


        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'countries.name as countryname',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $getimageid = DB::table('tbl_images')
            ->leftjoin('tbl_product_items', 'tbl_product_items.id', '=', 'tbl_images.product_item')
            ->where('tbl_images.id', decrypt($request->upload_id))
            ->select(
                'tbl_images.id',
                'tbl_images.product_item',
                'tbl_images.category_id as categoryId',
                'tbl_images.sub_category_id as sub_categoryId',
                'tbl_images.article_id as articleId',
                'tbl_images.product_id',
                'tbl_images.sub_product_id as sub_productId',
                'tbl_images.product_item as user_id',
                'tbl_product_items.item_name',
                'tbl_product_items.currency',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.product_type',
                'tbl_product_items.product_color',
                'tbl_product_items.type',
                'tbl_product_items.pieces',
                'tbl_product_items.views',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.created_at',
            )->get();

        foreach ($getimageid as $row) {
            Tbl_products_item::where(['user_id' => $row->user_id, 'id' => $row->product_item])
                ->update([
                    'views' => DB::raw('views + 1'), //increment 1 every view
                ]);

        }

        $viewImage = DB::table('tbl_imgs')
            ->where('upload_id', decrypt($request->upload_id))
            ->select('id', 'image_name', 'upload_id')->get();

        $countImage = tbl_imgs::groupBy('upload_id')
            ->selectRaw('count(*) as count, upload_id')
            ->where('upload_id', decrypt($request->upload_id))
            ->pluck('count', 'upload_id');

        // dd(decrypt($request->upload_id));
        return view('user.mpingiusers.photos_buy', compact('countries', 'categoryids', 'industriesids', 'servicesids', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'user', 'getuser', 'getimageid', 'viewImage', 'countImage'))->render();

    }

    public function EditProductitem(Request $request)
    {


        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();


        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'countries.name as countryname',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $getimageid = DB::table('tbl_images')
            ->leftjoin('tbl_product_items', 'tbl_product_items.id', '=', 'tbl_images.product_item')
            ->where('tbl_images.id', decrypt($request->upload_id))
            ->select(
                'tbl_images.id',
                'tbl_images.product_item',
                'tbl_images.category_id as categoryId',
                'tbl_images.sub_category_id as sub_categoryId',
                'tbl_images.article_id as articleId',
                'tbl_images.product_id',
                'tbl_images.sub_product_id as sub_productId',
                'tbl_images.product_item as user_id',
                'tbl_product_items.id as ID',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.product_id',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
            )->get();

        foreach ($getimageid as $row) {
            Tbl_products_item::where(['user_id' => $row->user_id, 'id' => $row->product_item])
                ->update([
                    'views' => DB::raw('views + 1'), //increment 1 every view
                ]);

        }

        $viewImage = DB::table('tbl_imgs')
            ->where('upload_id', decrypt($request->upload_id))
            ->select('id', 'image_name', 'upload_id')->get();

        $countImage = tbl_imgs::groupBy('upload_id')
            ->selectRaw('count(*) as count, upload_id')
            ->where('upload_id', decrypt($request->upload_id))
            ->pluck('count', 'upload_id');


        foreach ($getimageid as $pitems) {

            $category_name = DB::table('tbl_categories')
                ->where('id', $pitems->categoryId)
                ->get();

            $subcategories_name = DB::table('tbl_sub_categories')
                ->where('id', $pitems->sub_categoryId)
                ->get();

            $article_name = DB::table('tbl_articles')
                ->where('id', $pitems->articleId)
                ->get();

            $subproduct_name = DB::table('tbl_sub_products')
                ->where('id', $pitems->sub_productId)
                ->get();

            $fetchImage = DB::table('tbl_images')
                ->select('tbl_imgs.image_name', 'tbl_imgs.id as imgID')
                ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
                ->where('tbl_images.product_item', $pitems->id)
                ->get();

        }

        // dd(decrypt($request->upload_id));
        $fetchallCategories = Tbl_category::all();
        return view('user.mpingiusers.edit_category', compact('category_name', 'subcategories_name', 'article_name', 'subproduct_name', 'countries', 'categoryids', 'industriesids', 'servicesids', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'user', 'getuser', 'getimageid', 'viewImage', 'countImage', 'fetchallCategories'))->render();

    }


    public function EditProductitemPost(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'place_of_origin' => '',
            'city' => '',
            'state_id' => '',
            'product_web_name' => '',
            'product_web_link' => '',
            'item_name' => 'required',
            'brand_name' => 'required',
            'pieces' => 'required',
            'types' => 'required',
            'product_color' => 'required',
            'negotiable' => 'required',
            'price' => 'required',
            'oldprice' => '',
            'currency' => 'required',
            'item_descriptions' => 'required',
            'payment' => 'required',
            'weight' => '',
            'volume' => '',
            'shipping' => 'required',
            'delivery' => 'required',
            'day_return' => 'required',
        ], [
            'place_of_origin.required' => '',
            'city.required' => '',
            'state_id.required' => '',
            'product_web_name.required' => '',
            'product_web_link.required' => '',
            'item_name.required' => 'Required Product Name',
            'brand_name.required' => 'Required Select',
            'pieces.required' => 'Required Quantity',
            'types.required' => 'Required Select',
            'product_color.required' => 'Required Select Color',
            'negotiable.required' => 'Required Select in Toggle',
            'price.required' => 'Required New Price',
            'oldprice.required' => '',
            'currency.required' => 'Required Select',
            'item_descriptions.required' => 'Required Enter Details',
            'payment.required' => 'Required Select Pay on delivery or pickup',
            'weight.required' => '',
            'volume.required' => '',
            'shipping.required' => 'Required Select Shipping Atleast One',
            'delivery.required' => 'Required Select Delivery Atleast One',
            'day_return.required' => 'Required Select Days Atleast One',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $products_edit = Tbl_products_item::find($request->id);
        $pData = [
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'article_id' => $request->article_id,
            'sub_product_id' => $request->sub_product_id,
            'place_of_origin' => $request->place_of_origin,
            'city' => $request->city,
            'state_id' => $request->state_id,
            'product_web_name' => $request->product_web_name,
            'product_web_link' => $request->product_web_link,
            'disponibility' => $request->disponibility,
            'item_name' => $request->item_name,
            'product_type' => $request->product_type,
            'brand_name' => $request->brand_name,
            'pieces' => $request->pieces,
            'type' => $request->types,
            'product_color' => $request->product_color,
            'negotiable' => $request->negotiable,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'currency' => $request->currency,
            'item_descriptions' => $request->item_descriptions,
            'payment' => $request->payment,
            'weight' => $request->weight,
            'volume' => $request->volume,
            'shipping' => $request->shipping,
            'shipping_price' => $request->shipping_price,
            'delivery' => $request->delivery,
            'day_return' => $request->day_return,
        ];
        $products_edit->update($pData);

        return response()->json([
            'status' => 200,
        ]);

    }

    public function DeleteProductitemPost(Request $request)
    {
        $id = decrypt($request->id);
        // dd($id);
        DB::table('tbl_product_items')->where('id', $id)->delete();
        DB::table('tbl_images')->where('product_item', $id)->delete();
        DB::table('tbl_imgs')->whereIn('product_item_id', array($id))->delete();
        return response()->json(['status' => 200]);
    }

    public function SubmitMessage(Request $request)
    {

        $validator = Validator::make($request->all(), [
            // 'subject' => 'required',
            'message' => 'required',
        ], [

            // 'subject.required' => 'Required Subject',
            'message.required' => 'Required Message',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $feedback = new tbl_messages;
        $feedback->send_date = \Carbon\Carbon::now();
        $feedback->profile_user = $request->profile_user;
        $feedback->full_name = $request->full_name;
        $feedback->user_id = $request->user_id;
        $feedback->category_id = $request->category_id;
        $feedback->sub_category_id = $request->sub_category_id;
        $feedback->article_id = $request->article_id;
        $feedback->product_id = $request->product_id;
        $feedback->sub_product_id = $request->sub_product_id;
        $feedback->product_item = $request->product_item;
        $feedback->email = $request->email;
        $feedback->mobile = $request->mobile;
        // $feedback->subject = $request->subject;
        $feedback->message = Str::ucfirst($request->message);
        $feedback->read_status = 1;
        $feedback->Reply_status = 1;
        $feedback->save();

        return response()->json(['status' => 200]);

    }

    // basic listing post option
    public function BasiclistingBusinesses(Request $request)
    {
        $subservices = DB::table('tbl_sub_services')->select('*')->where('service_id', decrypt($request->id))->get();
        $fetchallCategories = Tbl_category::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();
        $services = tbl_services::all();
        $servicesid = tbl_services::where('id', decrypt($request->id))->get();
        $subservice_name = tbl_sub_services::where('id', decrypt($request->id))->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->id))
            ->get();

        $countsubservice = DB::table('tbl_service_items')
            ->select('service_id', DB::raw('count(*) as subservice_cnt'))
            ->where('user_id', $user)
            ->groupBy('service_id')
            ->get();


        $countsubserviceall = DB::table('tbl_service_items')->where(['user_id' => $user, 'mainservice_id' => 1])->count();
        $ajobs = tbl_job_category::orderBy('id', 'ASC')->paginate(100);

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('user.mpingiusers.basictlisting_businesses', ['countries' => $countries], compact('ajobs', 'subservice_name', 'countsubservice', 'countsubserviceall', 'services', 'servicesid', 'subservices', 'CategoriesID', 'fetchallCategories', 'countProductItems', 'countProductItems1', 'servicesids', 'categoryids', 'getuser'))->render();

    }

    //jobseekers paginate results
    public function ajax_paginate_Jobseekers_user(Request $request)
    {
        $serchpage = $request->page;
        $ajobs = tbl_job_category::paginate(100);
        $countries = Country::all();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('user.mpingiusers.paginate_jobseekers', ['countries' => $countries], compact('ajobs', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();
    }
    //end jobseekers paginate results

    //per page jobseekers

    public function GetPerPageJobseekers2(Request $request)
    {
        $serchpage = $request->page;
        $ajobs = tbl_job_category::paginate($serchpage);
        $countries = Country::all();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('user.mpingiusers.paginate_jobseekers', ['countries' => $countries], compact('ajobs', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();
    }
    //end per page jobseekers


    // show items
    public function GETJobitems(Request $request, $id)
    {
        $subservices = DB::table('tbl_sub_services')->select('*')->where('service_id', decrypt($request->id))->get();
        $fetchallCategories = Tbl_category::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();
        $services = tbl_services::all();
        $servicesid = tbl_services::where('id', decrypt($request->id))->get();
        $subservice_name = tbl_sub_services::where('id', decrypt($request->id))->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->id))
            ->get();

        $countsubservice = DB::table('tbl_service_items')
            ->select('service_id', DB::raw('count(*) as subservice_cnt'))
            ->where('user_id', $user)
            ->groupBy('service_id')
            ->get();


        $countsubserviceall = DB::table('tbl_service_items')->where(['user_id' => $user, 'mainservice_id' => 1])->count();
        $availjobs = tbl_job_category::where('id', decrypt($request->id))->first();
        $availjobs_ = tbl_job_category::where('id', decrypt($request->id))->paginate(1);

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email as email_u',
                'users.address_2',
                'users.code',
                'countries.name as countryname',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('users.id', $user)
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('user.mpingiusers.basiclisting_industriesfreejobs_form', ['countries' => $countries], compact('getbusinessdata', 'availjobs', 'availjobs_', 'subservice_name', 'countsubservice', 'countsubserviceall', 'services', 'servicesid', 'subservices', 'CategoriesID', 'fetchallCategories', 'countProductItems', 'countProductItems1', 'servicesids', 'categoryids', 'getuser'))->render();

    }


    public function InsertFreeJobsforms(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => '',
            'job_category_id' => '',
            'first_name' => '',
            'last_name' => '',
            'department' => 'required',
            'job_title' => '',
            'company_name' => 'required',
            'salary' => 'required',
            'type_of_job' => 'required',
            'schedule_from' => 'required',
            'schedule_to' => 'required',
            'job_description' => '',
            'country' => '',
            'city' => '',
            'state' => '',
            'p_box' => '',
            'address' => '',
            'phone' => '',
            'email' => '',
            'mobile' => '',
            'website' => '',
            'ad_type' => 'required',

        ], [
            'user_id.required' => '',
            'job_category_id.required' => '',
            'first_name.required' => '',
            'last_name.required' => '',
            'department.required' => 'Required Department',
            'job_title.required' => '',
            'company_name.required' => 'Required this field',
            'salary.required' => 'Required Salary',
            'type_of_job.required' => 'Required Type Of Job',
            'schedule_from.required' => 'Required Schedule From',
            'schedule_to.required' => 'Required Schedule To',
            'job_description.required' => '',
            'p_box.required' => '',
            'address.required' => '',
            'country.required' => '',
            'city.required' => '',
            'state.required' => '',
            'phone.required' => 'Required Telephone',
            'mobile.required' => 'Required Mobile Number',
            'email.required' => '',
            'website.required' => '',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        date("l,F d, Y");
        $newDateTime = date('l,F d, Y', strtotime("+31 days"));
        $delete_total_days = date('l,F d, Y', strtotime("+76 days"));
        $expireddate_remain = Carbon::now()->addDays(76);

        $businesses = new tbl_job_item;
        $businesses->user_id = $request->user_id;
        $businesses->job_category_id = $request->job_category_id;
        $businesses->post_date_of_item = \Carbon\Carbon::now();
        $businesses->first_name = $request->first_name;
        $businesses->last_name = $request->last_name;
        $businesses->department = $request->department;
        $businesses->job_title = $request->job_title;
        $businesses->salary = $request->salary;
        $businesses->type_of_job = $request->type_of_job;
        $businesses->schedule_from = $request->schedule_from;
        $businesses->schedule_to = $request->schedule_to;
        $businesses->job_description = $request->job_description;
        $businesses->company_name = $request->company_name;
        $businesses->p_box = $request->p_box;
        $businesses->address = $request->address;
        $businesses->city = $request->city;
        $businesses->state = $request->state;
        $businesses->country = $request->country;
        $businesses->phone = $request->phone;
        $businesses->mobile = $request->mobile;
        $businesses->email = $request->email;
        $businesses->website = $request->website;
        $businesses->post_expiry_date = $newDateTime;
        $businesses->post_delete_date = $delete_total_days;
        $businesses->expire_status = 1;
        $businesses->ad_type = $request->ad_type;
        $businesses->save();

        return response()->json([
            'status' => 200,
        ]);

    }

    public function BasiclistingBusinessesPostserviceID(Request $request, $id)
    {
        // dd(decrypt($request->id));

        $subservices = DB::table('tbl_sub_services')->select('*')->where('service_id', decrypt($request->id))->get();
        $sub_services_1 = DB::table('tbl_sub_service_ones')->select('*')->where('service_id', decrypt($request->id))->get();
        //    dd($subservices);
        $fetchallindustries = tbl_industry::all();
        $mainindustries = tbl_industry::where('id', decrypt($request->id))->get();
        $fetchallIndustriessubcat = tbl_sub_industry::where('industry_id', decrypt($request->id))->get();
        $fetchallCategories = Tbl_category::all();

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $services = tbl_services::all();
        $servicesid = tbl_services::where('id', decrypt($request->id))->get();
        $subservice_name = tbl_sub_services::where('id', decrypt($request->id))->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countsubservice = DB::table('tbl_service_items')
            ->select('service_id', DB::raw('count(*) as subservice_cnt'))
            ->where('user_id', $user)
            ->groupBy('service_id')
            ->get();

        $countsubindustry = DB::table('tbl_industry_items')
            ->select('sub_industry_id', DB::raw('count(*) as subindustry_cnt'))
            ->where('user_id', $user)
            ->groupBy('sub_industry_id')
            ->get();


        $countsubserviceall = DB::table('tbl_service_items')->where(['user_id' => $user, 'mainservice_id' => decrypt($request->id)])->count();
        $countsubindustryall = DB::table('tbl_industry_items')->where(['user_id' => $user, 'industry_id' => decrypt($request->id)])->count();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->id))
            ->get();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('user.mpingiusers.basictlisting_business_postservice', ['countries' => $countries], compact('sub_services_1', 'countsubindustryall', 'countsubindustry', 'mainindustries', 'subservice_name', 'fetchallCategories', 'countsubservice', 'countsubserviceall', 'services', 'servicesid', 'subservices', 'CategoriesID', 'fetchallindustries', 'countProductItems', 'countProductItems1', 'servicesids', 'categoryids', 'getuser', 'fetchallIndustriessubcat'))->render();
    }


    public function BasiclistingBusinessesPostserviceSub(Request $request, $service_id, $sub_service_id, $sub_service_one_id)
    {
        //dd(decrypt($request->service_id), decrypt($request->sub_service_id), decrypt($request->sub_service_one_id));

        $subservices = DB::table('tbl_sub_services')->select('*')->where('service_id', decrypt($request->sub_service_id))->get();
        $sub_services_1 = DB::table('tbl_sub_service_ones')->select('*')->where('service_id', decrypt($request->sub_service_one_id))->get();
        $sub_services_2 = DB::table('tbl_sub_service_twos')->select('*')->where(['service_id' => decrypt($request->service_id)])->get();
        // $sub_services_2 = DB::table('tbl_sub_service_twos')->select('*')->where(['service_id' => decrypt($request->service_id)])->get();
        //    dd($subservices);
        $fetchallindustries = tbl_industry::all();
        $mainindustries = tbl_industry::where('id', decrypt($request->service_id))->get();
        $fetchallIndustriessubcat = tbl_sub_industry::where('industry_id', decrypt($request->service_id))->get();
        $fetchallCategories = Tbl_category::all();

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $services = tbl_services::all();
        $servicesid = tbl_services::where('id', decrypt($request->service_id))->get();
        $subservice_name = tbl_sub_services::where('id', decrypt($request->sub_service_id))->get();
        $sub_services_11 = DB::table('tbl_sub_service_ones')->select('*')->where('id', decrypt($request->sub_service_one_id))->get();
        $sub_services_22 = DB::table('tbl_sub_service_twos')->select('*')->where(['id' => decrypt($request->service_id)])->get();
        $sub_services_33 = DB::table('tbl_sub_service_threes')->select('*')->where(['sub_service_two_id' => decrypt($request->service_id)])->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countsubservice = DB::table('tbl_service_items')
            ->select('service_id', DB::raw('count(*) as subservice_cnt'))
            ->where('user_id', $user)
            ->groupBy('service_id')
            ->get();

        $countsubindustry = DB::table('tbl_industry_items')
            ->select('sub_industry_id', DB::raw('count(*) as subindustry_cnt'))
            ->where('user_id', $user)
            ->groupBy('sub_industry_id')
            ->get();


        $countsubserviceall = DB::table('tbl_service_items')->where(['user_id' => $user, 'mainservice_id' => decrypt($request->service_id)])->count();
        $countsubindustryall = DB::table('tbl_industry_items')->where(['user_id' => $user, 'industry_id' => decrypt($request->service_id)])->count();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->service_id))
            ->get();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services


        return view('user.mpingiusers.basictlisting_business_postservice_sub2', ['countries' => $countries], compact('sub_services_11', 'sub_services_2', 'sub_services_1', 'countsubindustryall', 'countsubindustry', 'mainindustries', 'subservice_name', 'fetchallCategories', 'countsubservice', 'countsubserviceall', 'services', 'servicesid', 'subservices', 'CategoriesID', 'fetchallindustries', 'countProductItems', 'countProductItems1', 'servicesids', 'categoryids', 'getuser', 'fetchallIndustriessubcat'))->render();

    }


    public function BasiclistingBusinessesPostserviceForms(Request $request, $sub_service_id)
    {
        // dd(decrypt($request->sub_service_id));

        $subservices = DB::table('tbl_sub_services')->select('*')->where('service_id', decrypt($request->sub_service_id))->get();
        $sub_services_1 = DB::table('tbl_sub_service_ones')->select('*')->where('service_id', decrypt($request->sub_service_one_id))->get();
        $sub_services_2 = DB::table('tbl_sub_service_twos')->select('*')->where(['service_id' => decrypt($request->service_id)])->get();

        //    dd($subservices);
        $fetchallindustries = tbl_industry::all();
        $mainindustries = tbl_industry::where('id', decrypt($request->service_id))->get();
        $fetchallIndustriessubcat = tbl_sub_industry::where('industry_id', decrypt($request->service_id))->get();
        $fetchallCategories = Tbl_category::all();

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $services = tbl_services::all();
        $servicesid = tbl_services::where('id', decrypt($request->service_id))->get();
        $subservice_name = tbl_sub_services::where('id', decrypt($request->sub_service_id))->get();

        $sub_service_1_id = DB::table('tbl_sub_service_ones')->where('sub_service_id', decrypt($request->service_id))->get();
        $sub_service_2_id = DB::table('tbl_sub_service_twos')->where('sub_service_one_id', decrypt($request->service_id))->get();
        $sub_service_3_id = DB::table('tbl_sub_service_threes')->where('sub_service_two_id', decrypt($request->service_id))->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countsubservice = DB::table('tbl_service_items')
            ->select('service_id', DB::raw('count(*) as subservice_cnt'))
            ->where('user_id', $user)
            ->groupBy('service_id')
            ->get();

        $countsubindustry = DB::table('tbl_industry_items')
            ->select('sub_industry_id', DB::raw('count(*) as subindustry_cnt'))
            ->where('user_id', $user)
            ->groupBy('sub_industry_id')
            ->get();


        $countsubserviceall = DB::table('tbl_service_items')->where(['user_id' => $user, 'mainservice_id' => decrypt($request->service_id)])->count();
        $countsubindustryall = DB::table('tbl_industry_items')->where(['user_id' => $user, 'industry_id' => decrypt($request->service_id)])->count();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->service_id))
            ->get();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email as email_u',
                'users.address_2',
                'users.code',
                'countries.name as countryname',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('users.id', $user)
            ->get();

        return view('user.mpingiusers.basictlisting_business_postservice_subform', ['countries' => $countries], compact('sub_service_1_id', 'sub_service_2_id', 'sub_service_3_id', 'getbusinessdata', 'sub_services_2', 'sub_services_1', 'countsubindustryall', 'countsubindustry', 'mainindustries', 'subservice_name', 'fetchallCategories', 'countsubservice', 'countsubserviceall', 'services', 'servicesid', 'subservices', 'CategoriesID', 'fetchallindustries', 'countProductItems', 'countProductItems1', 'servicesids', 'categoryids', 'getuser', 'fetchallIndustriessubcat'))->render();

    }



    public function BasiclistingBusinessesID(Request $request, $id)
    {
        $subservices = DB::table('tbl_sub_services')->select('*')->where('service_id', decrypt($request->id))->get();
        //    dd($subservices);
        $fetchallCategories = Tbl_category::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();
        $services = tbl_services::all();
        $servicesid = tbl_services::where('id', decrypt($request->id))->get();
        $subservice_name = tbl_sub_services::where('id', decrypt($request->id))->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countsubservice = DB::table('tbl_service_items')
            ->select('service_id', DB::raw('count(*) as subservice_cnt'))
            ->where('user_id', $user)
            ->groupBy('service_id')
            ->get();

        $countsubserviceall = DB::table('tbl_service_items')->where(['user_id' => $user, 'mainservice_id' => decrypt($request->id)])->count();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->id))
            ->get();

        $ajobs = AvailableJob::orderBy('id', 'ASC')->paginate(100);

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('user.mpingiusers.basictlisting_businesses', ['countries' => $countries], compact('ajobs', 'subservice_name', 'countsubservice', 'countsubserviceall', 'services', 'servicesid', 'subservices', 'CategoriesID', 'fetchallCategories', 'countProductItems', 'countProductItems1', 'servicesids', 'categoryids', 'getuser'))->render();

    }

    public function BasiclistingBusinessesFormID(Request $request)
    {
        //   dd(decrypt($request->sub_service_id), $request->service_name_1);
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $services = tbl_services::all();
        $servicesid = tbl_services::where('id', decrypt($request->service_id))->get();
        $subservice_name = tbl_sub_service_ones::where('id', decrypt($request->sub_service_id))->get();
        $subservice_sub_two = DB::table('tbl_sub_service_twos')->where('service_id', decrypt($request->service_id))->get();
        $sub_service = DB::table('tbl_sub_services')->select('*')->where('service_id', decrypt($request->service_id))->get();
        $subservices = DB::table('tbl_service_items')->select('*')->where(['id' => decrypt($request->sub_service_id), 'expire_status' => '1', 'service_id' => decrypt($request->service_id), 'user_id' => $user])->get();
        //    dd($subservices);
        $fetchallCategories = Tbl_category::all();

        $countries = Country::all();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->service_id))
            ->get();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $countsubservice = DB::table('tbl_service_items')
            ->select('service_id', DB::raw('count(*) as subservice_cnt'))
            ->where(['user_id' => $user, 'service_id' => decrypt($request->sub_service_id)])
            ->groupBy('service_id')
            ->get();

        $countsubservice2 = DB::table('tbl_service_items')
            ->select('sub_service_1_id', DB::raw('count(*) as subservice_cnt2'))
            ->where('user_id', $user)
            ->groupBy('sub_service_1_id')
            ->get();

        $countsubserviceall = DB::table('tbl_service_items')->where(['user_id' => $user, 'mainservice_id' => decrypt($request->service_id)])->count();

        return view('user.mpingiusers.basictlisting_businesses_sub', ['countries' => $countries], compact('countsubservice2', 'countsubservice', 'countsubserviceall', 'services', 'servicesid', 'subservice_name', 'sub_service', 'subservices', 'CategoriesID', 'fetchallCategories', 'countProductItems', 'countProductItems1', 'servicesids', 'categoryids', 'getuser', 'subservice_sub_two'))->render();
    }

    public function BasiclistingBusinessesSubservices(Request $request)
    {


        //dd(decrypt($request->sub_service_id), decrypt($request->service_id), decrypt($request->msid));


        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $services = tbl_services::all();
        $servicesid = tbl_services::where('id', decrypt($request->msid))->get();
        $subservice_name = tbl_sub_service_ones::where('id', decrypt($request->sub_service_id))->get();
        $subservice_sub_two = DB::table('tbl_sub_service_twos')->where('service_id', decrypt($request->msid))->get();
        $sub_service = DB::table('tbl_sub_services')->select('*')->where('service_id', decrypt($request->msid))->get();
        $subservices = DB::table('tbl_service_items')->select('*')->where(['id' => decrypt($request->sub_service_id), 'expire_status' => '1', 'service_id' => decrypt($request->service_id), 'user_id' => $user])->get();
        //    dd($subservices);
        $fetchallCategories = Tbl_category::all();

        $countries = Country::all();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->msid))
            ->get();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $countsubservice = DB::table('tbl_service_items')
            ->select('service_id', DB::raw('count(*) as subservice_cnt'))
            ->where(['user_id' => $user, 'service_id' => decrypt($request->sub_service_id)])
            ->groupBy('service_id')
            ->get();

        $countsubservice2 = DB::table('tbl_service_items')
            ->select('sub_service_1_id', DB::raw('count(*) as subservice_cnt2'))
            ->where('user_id', $user)
            ->groupBy('sub_service_1_id')
            ->get();


        $countsubserviceall = DB::table('tbl_service_items')->where(['user_id' => $user, 'mainservice_id' => decrypt($request->msid)])->count();

        return view('user.mpingiusers.basictlisting_businesses_sub', ['countries' => $countries], compact('countsubservice2', 'countsubservice', 'countsubserviceall', 'services', 'servicesid', 'subservice_name', 'sub_service', 'subservices', 'CategoriesID', 'fetchallCategories', 'countProductItems', 'countProductItems1', 'servicesids', 'categoryids', 'getuser', 'subservice_sub_two'))->render();
    }

    public function BasiclistingBusinessesForm(Request $request)
    {

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $services = tbl_services::all();
        $servicesid = tbl_services::where('id', decrypt($request->id))->get();
        $subservice_name = tbl_sub_services::where('id', decrypt($request->msid))->get();
        $subservice_name_3 = DB::table('tbl_sub_service_threes')->where('sub_service_two_id', decrypt($request->id))->get();
        $sub_services_three = DB::table('tbl_sub_service_threes')->where('id', decrypt($request->msid))->get();

        $fetchallCategories = Tbl_category::all();
        $countries = Country::all();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->msid))
            ->get();
        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email as email_u',
                'users.address_2',
                'users.code',
                'countries.name as countryname',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('users.id', $user)
            ->get();

        $countsubservice = DB::table('tbl_service_items')
            ->select('service_id', DB::raw('count(*) as subservice_cnt'))
            ->where('user_id', $user)
            ->groupBy('service_id')
            ->get();

        $countsubserviceall = DB::table('tbl_service_items')->where(['user_id' => $user, 'service_id' => decrypt($request->id)])->count();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('user.mpingiusers.basictlisting_businesses_form', ['countries' => $countries], compact('subservice_name_3', 'countsubservice', 'countsubserviceall', 'getbusinessdata', 'services', 'servicesid', 'subservice_name', 'CategoriesID', 'fetchallCategories', 'countProductItems', 'countProductItems1', 'servicesids', 'categoryids', 'getuser', 'sub_services_three'))->render();
    }

    public function BasiclistingIndustries(Request $request)
    {


        $subservices = DB::table('tbl_sub_services')->select('*')->where('service_id', decrypt($request->id))->get();
        //    dd($subservices);
        $fetchallindustries = tbl_industry::all();
        $mainindustries = tbl_industry::where('id', decrypt($request->id))->get();
        $fetchallIndustriessubcat = tbl_sub_industry::where('industry_id', decrypt($request->id))->get();
        $fetchallCategories = Tbl_category::all();

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $services = tbl_services::all();
        $servicesid = tbl_services::where('id', decrypt($request->id))->get();
        $subservice_name = tbl_sub_services::where('id', decrypt($request->id))->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countsubservice = DB::table('tbl_service_items')
            ->select('service_id', DB::raw('count(*) as subservice_cnt'))
            ->where('user_id', $user)
            ->groupBy('service_id')
            ->get();

        $countsubindustry = DB::table('tbl_industry_items')
            ->select('sub_industry_id', DB::raw('count(*) as subindustry_cnt'))
            ->where('user_id', $user)
            ->groupBy('sub_industry_id')
            ->get();


        $countsubserviceall = DB::table('tbl_service_items')->where(['user_id' => $user, 'mainservice_id' => decrypt($request->id)])->count();
        $countsubindustryall = DB::table('tbl_industry_items')->where(['user_id' => $user, 'industry_id' => decrypt($request->id)])->count();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->id))
            ->get();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('user.mpingiusers.basictlisting_industries', ['countries' => $countries], compact('countsubindustryall', 'countsubindustry', 'mainindustries', 'subservice_name', 'fetchallCategories', 'countsubservice', 'countsubserviceall', 'services', 'servicesid', 'subservices', 'CategoriesID', 'fetchallindustries', 'countProductItems', 'countProductItems1', 'servicesids', 'categoryids', 'getuser', 'fetchallIndustriessubcat'))->render();


    }



    public function BasiclistingIndustriesSub(Request $request, $id)
    {


        $subservices = DB::table('tbl_sub_services')->select('*')->where('service_id', decrypt($request->id))->get();
        //    dd($subservices);

        $fetchallindustries = tbl_industry::all();
        $mainindustries = tbl_industry::where('id', decrypt($request->id))->get();
        $fetchallIndustriessubcat = tbl_sub_industry::where('industry_id', decrypt($id))->get();
        $fetchallCategories = Tbl_category::all();

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $services = tbl_services::all();
        $servicesid = tbl_services::where('id', decrypt($request->id))->get();
        $subservice_name = tbl_sub_services::where('id', decrypt($request->id))->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countsubservice = DB::table('tbl_service_items')
            ->select('service_id', DB::raw('count(*) as subservice_cnt'))
            ->where('user_id', $user)
            ->groupBy('service_id')
            ->get();


        $countsubindustry = DB::table('tbl_industry_items')
            ->select('sub_industry_id', DB::raw('count(*) as subindustry_cnt'))
            ->where('user_id', $user)
            ->groupBy('sub_industry_id')
            ->get();

        $countsubserviceall = DB::table('tbl_service_items')->where(['user_id' => $user, 'mainservice_id' => decrypt($request->id)])->count();
        $countsubindustryall = DB::table('tbl_industry_items')->where(['user_id' => $user, 'industry_id' => decrypt($request->id)])->count();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->id))
            ->get();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('user.mpingiusers.basictlisting_industries', ['countries' => $countries], compact('countsubindustryall', 'countsubindustry', 'mainindustries', 'subservice_name', 'fetchallCategories', 'countsubservice', 'countsubserviceall', 'services', 'servicesid', 'subservices', 'CategoriesID', 'fetchallindustries', 'countProductItems', 'countProductItems1', 'servicesids', 'categoryids', 'getuser', 'fetchallIndustriessubcat'))->render();


    }


    public function BasiclistingIndustriesSubID(Request $request, $sub_id, $main_id)
    {


        $subservices = DB::table('tbl_sub_services')->select('*')->where('service_id', decrypt($request->main_id))->get();
        //    dd($subservices);

        $fetchallindustries = tbl_industry::all();
        $mainindustries = tbl_industry::where('id', decrypt($request->main_id))->get();
        $fetchallIndustriessubcat = tbl_sub_industry::where('id', decrypt($sub_id))->get();
        $fetchallCategories = Tbl_category::all();

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $services = tbl_services::all();
        $servicesid = tbl_services::where('id', decrypt($request->main_id))->get();
        $subservice_name = tbl_sub_services::where('id', decrypt($request->main_id))->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countsubservice = DB::table('tbl_service_items')
            ->select('service_id', DB::raw('count(*) as subservice_cnt'))
            ->where('user_id', $user)
            ->groupBy('service_id')
            ->get();

        $countsubindustry = DB::table('tbl_industry_items')
            ->select('sub_industry_id', DB::raw('count(*) as subindustry_cnt'))
            ->where('user_id', $user)
            ->groupBy('sub_industry_id')
            ->get();

        $countsubserviceall = DB::table('tbl_service_items')->where(['user_id' => $user, 'mainservice_id' => decrypt($request->main_id)])->count();
        $countsubindustryall = DB::table('tbl_industry_items')->where(['user_id' => $user, 'industry_id' => decrypt($request->main_id)])->count();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->main_id))
            ->get();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email as email_u',
                'users.address_2',
                'users.code',
                'countries.name as countryname',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('users.id', $user)
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('user.mpingiusers.basictlisting_industries_form', ['countries' => $countries], compact('countsubindustryall', 'countsubindustry', 'getbusinessdata', 'mainindustries', 'subservice_name', 'fetchallCategories', 'countsubservice', 'countsubserviceall', 'services', 'servicesid', 'subservices', 'CategoriesID', 'fetchallindustries', 'countProductItems', 'countProductItems1', 'servicesids', 'categoryids', 'getuser', 'fetchallIndustriessubcat'))->render();

    }



    public function AddBasiclistingBusinessesForm(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'user_id' => '',
            'mainservice_id' => '',
            'service_id' => '',
            'sub_service_1_id' => '',
            'sub_service_2_id' => '',
            'sub_service_3_id' => '',
            'first_name' => 'required',
            'last_name' => 'required',
            'universities_name' => 'required',
            'company_name' => '',
            'company_type' => '',
            'company_motto' => '',
            'company_banner' => '',
            'description' => '',
            'p_box' => '',
            'address' => '',
            'country' => '',
            'city' => '',
            'state' => '',
            'phone' => 'required',
            'mobile' => 'required',
            'email' => '',
            'website' => 'required',
            'company_color' => 'required',
            'company_title_color' => 'required',
        ], [
            'user_id.required' => '',
            'mainservice_id.required' => '',
            'service_id.required' => '',
            'sub_service_1_id.required' => '',
            'sub_service_2_id.required' => '',
            'sub_service_3_id.required' => '',
            'first_name.required' => 'Required First Name',
            'last_name.required' => 'Required Last Name',
            'universities_name.required' => 'Required Universities Name',
            'company_name.required' => '',
            'company_type.required' => '',
            'company_motto.required' => '',
            'company_banner.required' => '',
            'description.required' => '',
            'address.required' => '',
            'p_box.required' => '',
            'country.required' => '',
            'city.required' => '',
            'state.required' => '',
            'phone.required' => 'Required Telephone',
            'mobile.required' => 'Required Mobile Number',
            'email.required' => '',
            'website.required' => '',
            'company_color.required' => 'Required Company Color',
            'company_title_color.required' => 'Required Company Title Color',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $businesses = new tbl_service_items;
        $businesses->user_id = $request->user_id;
        $businesses->post_date_of_item = \Carbon\Carbon::now();
        $businesses->mainservice_id = $request->mainservice_id;
        $businesses->service_id = $request->service_id;
        $businesses->sub_service_id = $request->sub_service_id;
        $businesses->sub_service_1_id = $request->sub_service_1_id;
        $businesses->sub_service_2_id = $request->sub_service_2_id;
        $businesses->sub_service_3_id = $request->sub_service_3_id;
        $businesses->first_name = $request->first_name;
        $businesses->last_name = $request->last_name;
        $businesses->universities_name = $request->universities_name;
        $businesses->description = $request->description;
        $businesses->p_box = $request->p_box;
        $businesses->address = $request->address;
        $businesses->country = $request->country;
        $businesses->city = $request->city;
        $businesses->state = $request->state;
        $businesses->phone = $request->phone;
        $businesses->mobile = $request->mobile;
        $businesses->email = $request->email;
        $businesses->website = $request->website;
        $businesses->ad_type = $request->ad_type;
        $businesses->company_color = $request->company_color;
        $businesses->company_title_color = $request->company_title_color;
        $businesses->save();

        return response()->json([
            'status' => 200,
        ]);
    }

    public function ContactAdmin()
    {

        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        return view('user.mpingiusers.contact_admin', compact('getuser', 'countProductItems', 'countProductItems1', 'countries'))->render();
    }

    public function Insertindustriesform(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'user_id' => '',
            'industry_id' => '',
            'sub_industry_id' => '',
            'first_name' => '',
            'last_name' => '',
            'job_title' => '',
            'department' => 'required',
            'company_name' => 'required',
            'company_type' => 'required',
            'description' => '',
            'country' => '',
            'city' => '',
            'state' => '',
            'p_box' => '',
            'address' => '',
            'phone' => '',
            'email' => '',
            'mobile' => '',
            'website' => '',
            'question_1' => 'required',
            'question_2' => 'required',
            'question_3' => 'required',
            'question_4' => 'required',
            'question_5' => 'required',
            'question_6' => 'required',
            'president' => 'required',
            'advertising' => 'required',
            'sales' => 'required',
            'purchasing' => 'required',
            'marketing' => 'required',
            'engineering' => 'required',
            'ad_type' => 'required',
            'company_color' => 'required',
            'company_title_color' => 'required',
            'map_location_industry' => '',
        ], [
            'user_id.required' => '',
            'industry_id.required' => '',
            'sub_industry_id.required' => '',
            'first_name.required' => '',
            'last_name.required' => '',
            'job_title.required' => '',
            'department.required' => 'Required Department',
            'company_name.required' => 'Required Company Name',
            'company_type.required' => 'Required Company Type',
            'description.required' => '',
            'p_box.required' => '',
            'address.required' => '',
            'country.required' => '',
            'city.required' => '',
            'state.required' => '',
            'phone.required' => 'Required Telephone',
            'mobile.required' => 'Required Mobile Number',
            'email.required' => '',
            'website.required' => '',
            'question_1.required' => 'Required Established',
            'question_2.required' => 'Required Facility',
            'question_3.required' => 'Required Overall Sales',
            'question_4.required' => 'Required Company Certifications',
            'question_5.required' => 'Required Check only one',
            'question_6.required' => 'Required Check only one',
            'company_color.required' => 'Required Company Color',
            'company_title_color.required' => 'Required Company Title Color',
            'map_location_industry.required' => '',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        date("l,F d, Y");
        $newDateTime = date('l,F d, Y', strtotime("+31 days"));
        $delete_total_days = date('l,F d, Y', strtotime("+76 days"));
        $expireddate_remain = Carbon::now()->addDays(76);

        $industries = new tbl_industry_item;
        $industries->user_id = $request->user_id;
        $industries->post_date_of_item = \Carbon\Carbon::now();
        $industries->industry_id = $request->industry_id;
        $industries->sub_industry_id = $request->sub_industry_id;
        $industries->first_name = $request->first_name;
        $industries->last_name = $request->last_name;
        $industries->job_title = $request->job_title;
        $industries->department = $request->department;
        $industries->company_name = $request->company_name;
        $industries->company_type = $request->company_type;
        $industries->description = $request->description;
        $industries->p_box = $request->p_box;
        $industries->address = $request->address;
        $industries->city = $request->city;
        $industries->state = $request->state;
        $industries->country = $request->country;
        $industries->phone = $request->phone;
        $industries->mobile = $request->mobile;
        $industries->email = $request->email;
        $industries->website = $request->website;
        $industries->question_1 = $request->question_1;
        $industries->question_2 = $request->question_2;
        $industries->question_3 = $request->question_3;
        $industries->question_4 = $request->question_4;
        $industries->question_5 = $request->question_5;
        $industries->question_6 = $request->question_6;
        $industries->president = $request->president;
        $industries->advertising = $request->advertising;
        $industries->sales = $request->sales;
        $industries->purchasing = $request->purchasing;
        $industries->marketing = $request->marketing;
        $industries->engineering = $request->engineering;
        $industries->ad_type = $request->ad_type;
        $industries->post_expiry_date = $newDateTime;
        $industries->expire_status = 1;
        $industries->post_delete_date = $delete_total_days;
        $industries->company_color = $request->company_color;
        $industries->company_title_color = $request->company_title_color;
        $industries->map_location_industry = $request->map_location_industry;
        $industries->save();

        return response()->json([
            'status' => 200,
        ]);

    }

    ////////////////////////below premium industries //////////////////////////


    public function PremiumprogramIndustries(Request $request)
    {

        $subservices = DB::table('tbl_sub_services')->select('*')->where('service_id', decrypt($request->id))->get();
        //    dd($subservices);
        $fetchallindustries = tbl_industry::all();
        $mainindustries = tbl_industry::where('id', decrypt($request->id))->get();
        $fetchallIndustriessubcat = tbl_sub_industry::where('industry_id', decrypt($request->id))->get();
        $fetchallCategories = Tbl_category::all();

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $services = tbl_services::all();
        $servicesid = tbl_services::where('id', decrypt($request->id))->get();
        $subservice_name = tbl_sub_services::where('id', decrypt($request->id))->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countsubservice = DB::table('tbl_service_items')
            ->select('service_id', DB::raw('count(*) as subservice_cnt'))
            ->where('user_id', $user)
            ->groupBy('service_id')
            ->get();

        $countsubindustry = DB::table('tbl_industry_items')
            ->select('sub_industry_id', DB::raw('count(*) as subindustry_cnt'))
            ->where('user_id', $user)
            ->groupBy('sub_industry_id')
            ->get();


        $countsubserviceall = DB::table('tbl_service_items')->where(['user_id' => $user, 'mainservice_id' => decrypt($request->id)])->count();
        $countsubindustryall = DB::table('tbl_industry_items')->where(['user_id' => $user, 'industry_id' => decrypt($request->id)])->count();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->id))
            ->get();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('user.mpingiusers.premiumprogram_industries', ['countries' => $countries], compact('countsubindustryall', 'countsubindustry', 'mainindustries', 'subservice_name', 'fetchallCategories', 'countsubservice', 'countsubserviceall', 'services', 'servicesid', 'subservices', 'CategoriesID', 'fetchallindustries', 'countProductItems', 'countProductItems1', 'servicesids', 'categoryids', 'getuser', 'fetchallIndustriessubcat'))->render();

    }

    public function PremiumprogramIndustriesSub(Request $request, $id)
    {


        $subservices = DB::table('tbl_sub_services')->select('*')->where('service_id', decrypt($request->id))->get();
        //    dd($subservices);

        $fetchallindustries = tbl_industry::all();
        $mainindustries = tbl_industry::where('id', decrypt($request->id))->get();
        $fetchallIndustriessubcat = tbl_sub_industry::where('industry_id', decrypt($id))->get();
        $fetchallCategories = Tbl_category::all();

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $services = tbl_services::all();
        $servicesid = tbl_services::where('id', decrypt($request->id))->get();
        $subservice_name = tbl_sub_services::where('id', decrypt($request->id))->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countsubservice = DB::table('tbl_service_items')
            ->select('service_id', DB::raw('count(*) as subservice_cnt'))
            ->where('user_id', $user)
            ->groupBy('service_id')
            ->get();

        $countsubindustry = DB::table('tbl_industry_items')
            ->select('sub_industry_id', DB::raw('count(*) as subindustry_cnt'))
            ->where('user_id', $user)
            ->groupBy('sub_industry_id')
            ->get();

        $countsubserviceall = DB::table('tbl_service_items')->where(['user_id' => $user, 'mainservice_id' => decrypt($request->id)])->count();
        $countsubindustryall = DB::table('tbl_industry_items')->where(['user_id' => $user, 'industry_id' => decrypt($request->id)])->count();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->id))
            ->get();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('user.mpingiusers.premiumprogram_industries', ['countries' => $countries], compact('countsubindustryall', 'countsubindustry', 'mainindustries', 'subservice_name', 'fetchallCategories', 'countsubservice', 'countsubserviceall', 'services', 'servicesid', 'subservices', 'CategoriesID', 'fetchallindustries', 'countProductItems', 'countProductItems1', 'servicesids', 'categoryids', 'getuser', 'fetchallIndustriessubcat'))->render();


    }


    public function PremiumprogramIndustriesSubID(Request $request, $sub_id, $main_id)
    {


        $subservices = DB::table('tbl_sub_services')->select('*')->where('service_id', decrypt($request->main_id))->get();
        //    dd($subservices);

        $fetchallindustries = tbl_industry::all();
        $mainindustries = tbl_industry::where('id', decrypt($request->main_id))->get();
        $fetchallIndustriessubcat = tbl_sub_industry::where('id', decrypt($sub_id))->get();
        $fetchallCategories = Tbl_category::all();

        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $services = tbl_services::all();
        $servicesid = tbl_services::where('id', decrypt($request->main_id))->get();
        $subservice_name = tbl_sub_services::where('id', decrypt($request->main_id))->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countsubservice = DB::table('tbl_service_items')
            ->select('service_id', DB::raw('count(*) as subservice_cnt'))
            ->where('user_id', $user)
            ->groupBy('service_id')
            ->get();

        $countsubindustry = DB::table('tbl_industry_items')
            ->select('sub_industry_id', DB::raw('count(*) as subindustry_cnt'))
            ->where('user_id', $user)
            ->groupBy('sub_industry_id')
            ->get();


        $countsubserviceall = DB::table('tbl_service_items')->where(['user_id' => $user, 'mainservice_id' => decrypt($request->main_id)])->count();
        $countsubindustryall = DB::table('tbl_industry_items')->where(['user_id' => $user, 'industry_id' => decrypt($request->main_id)])->count();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->main_id))
            ->get();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email as email_u',
                'users.address_2',
                'users.code',
                'countries.name as countryname',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_days.day as days',
                'tbl_months.month as months',
                'tbl_years.year as years',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where('users.id', $user)
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('user.mpingiusers.premiumprogram_industries_form', ['countries' => $countries], compact('countsubindustryall', 'countsubindustry', 'getbusinessdata', 'mainindustries', 'subservice_name', 'fetchallCategories', 'countsubservice', 'countsubserviceall', 'services', 'servicesid', 'subservices', 'CategoriesID', 'fetchallindustries', 'countProductItems', 'countProductItems1', 'servicesids', 'categoryids', 'getuser', 'fetchallIndustriessubcat'))->render();

    }

    ////////////////////////end premium industries //////////////////////////


    ///////////////////////////Free Jobs ////////////////////////////////

    public function PurchasesProduct(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id_seller' => '',
            'user_id_buyer' => '',
            'category_id' => '',
            'sub_category_id' => '',
            'article_id' => '',
            'product_id' => '',
            'sub_product_id' => '',
            'item_name' => '',
            'full_name' => '',
            'email' => '',
            'mobile' => '',
            'post_code' => '',
            'address_1' => '',
            'address_2' => '',
            'country_id' => '',
            'state_id' => '',
            'city_id' => '',
            'delivery' => 'required',
            'payment' => 'required',
            'quantity' => 'required',
            'price' => '',
            'shipping_price' => '',
            'total_delivery' => '',
            'message' => 'required',
        ], [
            'user_id_seller.required' => '',
            'user_id_buyer.required' => '',
            'category_id.required' => '',
            'article_id.required' => '',
            'product_id.required' => '',
            'sub_product_id.required' => '',
            'item_name.required' => '',
            'full_name.required' => '',
            'email.required' => '',
            'mobile.required' => '',
            'post_code.required' => '',
            'address_1.required' => '',
            'address_2.required' => '',
            'country_id.required' => '',
            'state_id.required' => '',
            'city_id.required' => '',
            'delivery.required' => 'Required Delivery',
            'payment.required' => 'Required Payment',
            'quantity.required' => 'Required Quantity',
            'price.required' => '',
            'shipping_price.required' => '',
            'total_delivery.required' => '',
            'message.required' => 'Required Message',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors2' => $validator->errors()]);
        }

        $today = date("Ymd");
        $rand = strtoupper(substr(uniqid(sha1(time())), 0, 4));
        $order_number = $unique = $today . $rand;

        date("l,F d, Y");
        // $newDateTime = date('l,F d, Y', strtotime("+31 days"));
        //    $post_delete_on = Carbon::now()->addDays(5);
        $post_expiry_date = date('l,F d, Y', strtotime("+5 days"));
        $post_delete_on = date('l,F d, Y', strtotime("+5 days"));
        $product_durations = 5;
        $adddays = date('Y-m-d H:i:s', strtotime("+5 days"));

        $notif = Str::title($request->full_name) . " is ordered your product";

        $purchase = new tbl_mping_purchase;
        $purchase->purchase_date = \Carbon\Carbon::now();
        $purchase->user_id_seller = $request->user_id_seller;
        $purchase->user_id_buyer = $request->user_id_buyer;
        $purchase->category_id = $request->category_id;
        $purchase->sub_category_id = $request->sub_category_id;
        $purchase->article_id = $request->article_id;
        $purchase->product_id = $request->product_id;
        $purchase->sub_product_id = $request->sub_product_id;
        $purchase->product_item = $request->item_name;
        $purchase->full_name = $request->full_name;
        $purchase->email = $request->email;
        $purchase->mobile = $request->mobile;
        $purchase->po_box = $request->post_code;
        $purchase->address_1 = $request->address_1;
        $purchase->address_2 = $request->address_2;
        $purchase->country_id = $request->country_id;
        $purchase->state_id = $request->state_id;
        $purchase->city_id = $request->city_id;
        $purchase->delivery = $request->delivery;
        $purchase->payment = $request->payment;
        $purchase->quantity = $request->quantity;
        $purchase->price = $request->price;
        $purchase->shipping_price = $request->shipping_price;
        $purchase->total_delivery = $request->total_delivery;
        $purchase->total_pickup = $request->total_delivery;
        $purchase->message = $request->message;
        $purchase->order_number = $order_number;
        $purchase->post_expiry_date = $post_expiry_date;
        $purchase->post_delete_on = $post_delete_on;
        $purchase->product_durations = $product_durations;
        $purchase->notification = $notif;
        $purchase->add_days = $adddays;
        $purchase->save();

        return response()->json([
            'status' => 200,
        ]);

    }


    // ///////////////////////////guest user login////////////////////////////


    public function GuestFreePostDurationLogin(Request $request, $id)
    { //for start post for free
        $countries = Country::all();
        $fetchallCategories = Tbl_category::all();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', $request->id)
            ->get();

        $fetchallSubCategories = DB::table('tbl_sub_categories')
            ->where('category_id', $request->id)
            // ->orderBy('sub_category_name_en', 'DESC')
            ->get();

        foreach ($fetchallSubCategories as $row) {

            $fetchAllArticles = DB::table('tbl_articles')
                ->where('category_id', $request->id)
                ->orWhere('sub_category_id', $row->id)
                ->get();

        }

        $fetchallarticle = DB::table('tbl_articles')
            ->where('id', $request->id)
            ->get();

        foreach ($fetchallarticle as $row2) {
            $a_article_id = $row2->id;
            $a_category_id = $row2->category_id;
            $a_sub_category_id = $row2->sub_category_id;

            $fetchallProductID = DB::table('tbl_products')
                ->where('category_id', $a_category_id)
                ->orWhere('sub_category_id', $a_sub_category_id)
                ->orWhere('article_id', $request->category_id)
                ->get();

        }

        foreach ($fetchallProductID as $row3) {

            $product_id_sub_products = $row3->id;
            $catedory_id_sub_products = $row3->category_id;
            $sub_catedory_id_sub_products = $row3->sub_category_id;
            $article_id_sub_products = $row3->article_id;

            $fetchallSubProductID = DB::table('tbl_sub_products')
                ->where('category_id', $catedory_id_sub_products)
                ->orWhere('subcategory_id', $sub_catedory_id_sub_products)
                ->orWhere('article_id', $request->article_id_sub_products)
                ->orWhere('product_id', $request->product_id_sub_products)
                ->get();

        }

        $authuser = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $authuser)->get();
        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where('users.id', $authuser)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $authuser, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $authuser, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $allcountsql = DB::table('tbl_product_items')
            ->select('sub_category_id', 'category_id', DB::raw('COUNT(article_id) AS article_countall, article_id'))
            ->where('user_id', $authuser)
            ->groupBy('sub_category_id')
            ->get();

        $allcountarticle = DB::table('tbl_product_items')
            ->select('sub_category_id', 'category_id', 'article_id', DB::raw('COUNT(article_id) AS articlesub_count, article_id'))
            ->where('user_id', $authuser)
            ->groupBy('article_id')
            ->get();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('user.mpingiusers.f_category', [
            'countries' => $countries,
            'fetchallCategories' => $fetchallCategories,
            'categoryids' => $categoryids,
            'industriesids' => $industriesids,
            'servicesids' => $servicesids,
            'CategoriesID' => $CategoriesID,
            'fetchallSubCategories' => $fetchallSubCategories,
            'fetchAllArticles' => $fetchAllArticles,
            'fetchallSubProductID' => $fetchallSubProductID,
            'fetchallProductID' => $fetchallProductID,
            'user_id' => $authuser,
            'getuser' => $getuser,
            'getbusinessdata' => $getbusinessdata,
            'countProductItems' => $countProductItems,
            'countProductItems1' => $countProductItems1,
            'allcountsql' => $allcountsql,
            'allcountarticle' => $allcountarticle

        ])->render();

    }


    ////////////////////////below business list add form //////////////////////////

    public function InsertBusinessesAddForms(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'user_id' => '',
            'service_id' => '',
            'sub_service_id' => '',
            'sub_service_1_id' => '',
            'sub_service_2_id' => '',
            'sub_service_3_id' => '',
            'first_name' => '',
            'last_name' => '',
            'department' => 'required',
            'job_title' => '',
            'company_name' => 'required',
            'description' => '',
            'country' => '',
            'city' => '',
            'state' => '',
            'p_box' => '',
            'address' => '',
            'phone' => '',
            'email' => '',
            'mobile' => '',
            'website' => '',
            'company_color' => '',
            'company_title_color' => '',
            'map_location' => '',
        ], [
            'user_id.required' => '',
            'service_id.required' => '',
            'sub_service_id.required' => '',
            'sub_service_id.required' => '',
            'last_name.required' => '',
            'department.required' => 'Required Department',
            'job_title.required' => '',
            'company_name.required' => 'Required Name',
            'description.required' => '',
            'p_box.required' => '',
            'address.required' => '',
            'country.required' => '',
            'city.required' => '',
            'state.required' => '',
            'phone.required' => 'Required Telephone',
            'mobile.required' => 'Required Mobile Number',
            'email.required' => '',
            'website.required' => '',
            'company_color.required' => '',
            'company_title_color.required' => '',
            'map_location.required' => '',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        date("l,F d, Y");
        $newDateTime = date('l,F d, Y', strtotime("+31 days"));
        $delete_total_days = date('l,F d, Y', strtotime("+76 days"));
        $expireddate_remain = Carbon::now()->addDays(76);

        $businesses = new tbl_service_items;
        $businesses->post_date_of_item = \Carbon\Carbon::now();
        $businesses->mainservice_id = $request->service_id;
        $businesses->user_id = $request->user_id;
        $businesses->service_id = $request->service_id;
        $businesses->sub_service_id = $request->sub_service_id;
        $businesses->sub_service_1_id = $request->sub_service_1_id;
        $businesses->sub_service_2_id = $request->sub_service_2_id;
        $businesses->sub_service_3_id = $request->sub_service_3_id;
        $businesses->first_name = $request->first_name;
        $businesses->last_name = $request->last_name;
        $businesses->department = $request->department;
        $businesses->job_title = $request->job_title;
        $businesses->company_name = $request->company_name;
        $businesses->description = $request->description;
        $businesses->p_box = $request->p_box;
        $businesses->address = $request->address;
        $businesses->city = $request->city;
        $businesses->state = $request->state;
        $businesses->country = $request->country;
        $businesses->phone = $request->phone;
        $businesses->mobile = $request->mobile;
        $businesses->email = $request->email;
        $businesses->website = $request->website;
        $businesses->ad_type = 0;
        $businesses->post_expiry_date = $newDateTime;
        $businesses->post_delete_date = $delete_total_days;
        $businesses->company_color = $request->company_color;
        $businesses->company_title_color = $request->company_title_color;
        $businesses->map_location = $request->map_location;
        $businesses->save();

        return response()->json([
            'status' => 200,
        ]);

    }


    public function EditServiceitemsdetailIDs(Request $request)
    {
        dd(decrypt($request->id));
    }


    public function UpdateBusinesslogo(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'company_logo' => 'image|mimes:png,jpg,gif,jpeg|max:2048'

        ], [
            'company_logo.required' => 'Image upload is 2mb maximum upload allowed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $fileName = '';
        $companylogo = tbl_service_items::find($request->id);
        $file = $request->file('company_logo');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('/public/assets/uploads/', $fileName);
        $pData = [
            'company_logo' => $fileName,

        ];

        $companylogo->update($pData);
        return response()->json([
            'status' => "200",
        ]);
    }
    ////////////////////////below business list add form //////////////////////////

    // =====================================jobs ======================================
    public function ViewJobs(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();
        // $pagination = Tbl_products_item::latest()->paginate(5);

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.product_id',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
                'tbl_product_items.created_at',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();


        $ProductItems = DB::table('tbl_product_items')
            ->select('*', 'users.product_duration as PDurations', 'tbl_product_items.id as ProductItem_id', 'tbl_product_items.item_name', 'tbl_product_items.created_at', 'tbl_images.product_item', 'tbl_images.id as ImageIDS', 'users.product_duration')
            ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            //  ->leftjoin('tbl_imgs','tbl_imgs.product_item_id','=','tbl_product_items.id')
            ->where(['tbl_product_items.user_id' => $user, 'tbl_product_items.expire_status' => 1])
            ->get();


        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $fetchImage = DB::table('tbl_images')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->where('user_id', $user)
            ->select('tbl_images.id', 'tbl_imgs.image_name', 'tbl_images.product_item')->get();

        //count free,paid, expired products
        $freeproducts = Tbl_products_item::select(DB::raw("(COUNT(*)) as countfree"))
            ->where(['user_id' => $user, 'ad_type' => '0', 'expire_status' => '1'])
            ->get();

        $paidproducts = Tbl_products_item::select(DB::raw("(COUNT(*)) as countpaid"))
            ->where(['user_id' => $user, 'ad_type' => '1', 'expire_status' => '1'])
            ->get();

        $expiredproducts = Tbl_products_item::select(DB::raw("(COUNT(*)) as countexpired"))
            ->where(['user_id' => $user, 'expire_status' => '0'])
            ->get();


        $countJobsItems = DB::table('users')
            ->selectRaw('count(tbl_job_items.user_id) as cnt')
            ->leftjoin('tbl_job_items', 'tbl_job_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => 1])
            ->groupBy('tbl_job_items.user_id')
            ->get();

        return view('user.mpingiusers.view_jobs', ['countries' => $countries], compact('countJobsItems', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'ProductItems', 'fetchImage', 'freeproducts', 'paidproducts', 'expiredproducts'))->render();

    }


    public function FetchAllJobs(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        if ($request->ajax()) {
            $data = tbl_job_item::query()
                ->select(
                    'users.profile',
                    'users.first_name',
                    'users.middle_name',
                    'users.last_name',
                    'users.gender',
                    'users.date',
                    'users.month',
                    'users.year',
                    'users.country',
                    'users.country_id',
                    'users.state_id',
                    'users.mobile',
                    'users.pobox',
                    'users.phone',
                    'users.address_1',
                    'users.email',
                    'users.address_2',
                    'users.service_duration_job',
                    'users.product_duration',
                    'tbl_job_items.id',
                    'tbl_job_items.post_date_of_item',
                    'tbl_job_items.user_id',
                    'tbl_job_items.job_category_id',
                    'tbl_job_items.first_name',
                    'tbl_job_items.last_name',
                    'tbl_job_items.department',
                    'tbl_job_items.job_title',
                    'tbl_job_items.salary',
                    'tbl_job_items.type_of_job',
                    'tbl_job_items.schedule_from',
                    'tbl_job_items.schedule_to',
                    'tbl_job_items.job_description',
                    'tbl_job_items.city',
                    'tbl_job_items.state',
                    'tbl_job_items.country',
                    'tbl_job_items.postal_code',
                    'tbl_job_items.contract_type',
                    'tbl_job_items.compensation',
                    'tbl_job_items.company_name',
                    'tbl_job_items.company_logo',
                    'tbl_job_items.company_type',
                    'tbl_job_items.employess_number',
                    'tbl_job_items.career_level',
                    'tbl_job_items.degree',
                    'tbl_job_items.experience',
                    'tbl_job_items.skills',
                    'tbl_job_items.p_box',
                    'tbl_job_items.address',
                    'tbl_job_items.phone',
                    'tbl_job_items.mobile',
                    'tbl_job_items.email',
                    'tbl_job_items.fax',
                    'tbl_job_items.website',
                    'tbl_job_items.post_expiry_date',
                    'tbl_job_items.post_delete_date',
                    'tbl_job_items.post_date_count',
                    'tbl_job_items.post_expiry_count',
                    'tbl_job_items.post_delete_count',
                    'tbl_job_items.expire_status',
                    'tbl_job_items.ad_type',
                    'tbl_job_items.views',
                    'tbl_job_items.rate',
                    'tbl_job_items.total_rate',
                    'tbl_job_items.hits',
                    'tbl_job_items.created_at'
                )
                ->leftjoin('users', 'users.id', '=', 'tbl_job_items.user_id')
                ->where(['tbl_job_items.user_id' => $user, 'tbl_job_items.expire_status' => 1])
                ->get();

            foreach ($data as $datas) {


                tbl_job_item::where([
                    ['user_id', $user],
                    ['created_at', '<', Carbon::now()->subDay(31)],
                    ['id', $datas->id],
                ])->update(['expire_status' => '0']); //expire_status is update to 0 if met 31 days


                tbl_job_item::where([
                    ['user_id', $user],
                    ['created_at', '<', Carbon::now()->subDay(76)],
                    ['id', $datas->id],
                ])->delete(); //[product post is delete if met 76 days

            }



            return Datatables::of($data)

                ->addColumn('image_name', function ($data) {
                    // '.route('user.businesslogoimage').'
                    //     <a href="'.route('user.businesslogoimage', ['id' => encrypt($data->id)]).'" class="hrefCssc_" style="font-weight: bold;"><span style="text-transform: uppercase;">'.$data->company_name.'</span></a>
                    $image = $data->company_logo ? '<img src="/storage/assets/uploads/' . $data->company_logo . '" class="img-thumbnail" style="height:100px">' : '<img src="' . url('/assets/images/business-logo.png') . '" class="img-thumbnail"
                class="img-thumbnail" height="50%">';
                    $html = "";
                    $html = '<div class="py-4 row">
                         <div class="col-md-7">
                            <div class="row">
                             <div class="col-md-12">
                                 <center>


                                    <div class="" style="width:100%">
                                     <div class="px-4 pt-0 pb-4 cover">
                                      <div class="row g-3" style="position:absolute">
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <a href="' . route('user.jobslogoimage', ['id' => encrypt($data->id)]) . '" class="hrefCss_"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="ADD JOB LOGO"><center><h3 class="text-centers">' . $data->company_name . '</h3></center></a>
                                        </div>
                                     </div>
                                      <div class="media align-items-start profile-head">
                                       <br>
                                       <div class="mt-3 mr-3 profile businesslogoCssz" style="float:left">
                                                 ' . $image . '
                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#UploadJobLogoModal" data-ids="' . $data->id . '" data-photo="' . $data->company_logo . '" class="btn_jobsphoto hrefCss_"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="ADD JOB LOGO"><span class="logotext">JOB LOGO</span>
                                                </a>
                                                <br><Br>


                                         </div>


                                    </div>
                                    </div>
                                 </center>


                     </div>
                     </div>
                       </div>

                      <div class="col-md-5">
                         <div class="mb-3 card card6">
                             <div class="card-header"
                                 style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold">
                                 <div class="row">
                                     <div class="col-11" style="font-size: 13px!important"><i
                                                            class="fas fa-cogs"></i> Jobs Settings
                                     </div>

                                 </div>
                             </div>

                             <div class="card-body">
                                 <span class="mb-3 d-flex hrefCsslink_x"><span
                                         style="font-weight: bold">Posted on:</span>&nbsp;  ' . Carbon::parse($data->post_date_of_item)->diffForHumans() . '</span>
                                 <span class="mb-3 d-flex hrefCsslink_x"><span
                                         style="font-weight: bold">Expired on:</span>&nbsp; ' . $data->post_expiry_date . '</span>
                                 <span class="mb-3 d-flex hrefCsslink_x"><span style="font-weight: bold">
                                         <font color="#f25433">Delete on:</font>
                                     </span>&nbsp; ' . $data->post_delete_date . '</span>
                                 <span class="mb-3 d-flex hrefCsslink_x"><span
                                         style="font-weight: bold"><span class="badge rounded-pill bg"
                                             style="background-color: #FE980F;color:#ffffff">' . today()->diffInDays(Carbon::parse($data->created_at)->toDateString()) - $data->service_duration_job . '</span></span>&nbsp;
                                     Days Remaining (<b>Free Jobs</b>)</span>

                                 <div class="row g-1">
                                     <div class="col-4">
                                         <a href="' . route('user.jobslogoimage', ['id' => encrypt($data->id)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><button type="button"
                                             class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_xx1">
                                             <i class="fas fa-search"></i> View </button></a>
                                     </div>
                                     <div class="col-4">
                                         <a href="' . route('user.updatejobslogoimages', ['job_id' => encrypt($data->id)]) . '" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><button type="submit"
                                             class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_xx2">
                                             <i class="far fa-edit"></i> Edit </button></a>
                                     </div>
                                     <div class="col-4">
                                       <button type="button" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif" data-del="' . encrypt($data->id) . '"
                                             class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_xx3 btn-deleteJoblogo">
                                             <i class="fa fa-times"></i> Delete </button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>

                     </div>
                    </div>
                  ';
                    return $html;
                })

                ->addColumn('action', function ($data) {
                    return '';
                })
                ->rawColumns(['image_name', 'action'])
                ->make(true);
        }

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'tbl_product_items.user_id as Productitem_id',
                'tbl_product_items.post_date_of_item',
                'tbl_product_items.category_id',
                'tbl_product_items.sub_category_id',
                'tbl_product_items.article_id',
                'tbl_product_items.product_id',
                'tbl_product_items.sub_product_id',
                'tbl_product_items.item_name',
                'tbl_product_items.product_type',
                'tbl_product_items.brand_name',
                'tbl_product_items.brand_id',
                'tbl_product_items.pieces',
                'tbl_product_items.price',
                'tbl_product_items.old_price',
                'tbl_product_items.color_id',
                'tbl_product_items.sub_color_id',
                'tbl_product_items.price_range_start',
                'tbl_product_items.price_range_end',
                'tbl_product_items.product_color',
                'tbl_product_items.place_of_origin',
                'tbl_product_items.city',
                'tbl_product_items.state_id',
                'tbl_product_items.item_descriptions',
                'tbl_product_items.item_images',
                'tbl_product_items.supplier_name',
                'tbl_product_items.supplier_region',
                'tbl_product_items.type',
                'tbl_product_items.post_expiry_date',
                'tbl_product_items.post_delete_date',
                'tbl_product_items.post_date_count',
                'tbl_product_items.post_expiry_count',
                'tbl_product_items.post_delete_count',
                'tbl_product_items.expire_status',
                'tbl_product_items.ad_type',
                'tbl_product_items.views',
                'tbl_product_items.shipping',
                'tbl_product_items.shipping_price',
                'tbl_product_items.price_id',
                'tbl_product_items.rate',
                'tbl_product_items.total_rate',
                'tbl_product_items.hits',
                'tbl_product_items.payment',
                'tbl_product_items.weight',
                'tbl_product_items.volume',
                'tbl_product_items.delivery',
                'tbl_product_items.day_return',
                'tbl_product_items.negotiable',
                'tbl_product_items.currency',
                'tbl_product_items.category',
                'tbl_product_items.product_web_name',
                'tbl_product_items.product_web_link',
                'tbl_product_items.disponibility',
                'tbl_product_items.created_at',
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where('users.id', $user)
            ->get();

        $fetchImage = DB::table('tbl_images')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->where('user_id', $user)
            ->select('tbl_images.id', 'tbl_imgs.image_name', 'tbl_images.product_item')->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countryGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.place_of_origin',
                'countries.flag',
                'countries.name',
                'countries.id as country_id',
                DB::raw('count(tbl_product_items.place_of_origin) as total_countries')
            )
            ->leftjoin('countries', 'countries.id', '=', 'tbl_product_items.place_of_origin')
            ->groupBy('tbl_product_items.place_of_origin')
            ->where(['tbl_product_items.expire_status' => '1'])
            ->get();

        return view('user.mpingiusers.view_jobs', ['countries' => $countries], compact('countryGroupCount', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'ProductItems', 'fetchImage'))->render();
    }

    public function DeleteJobsform(Request $request)
    {
        $id = decrypt($request->id);
        DB::table('tbl_job_items')->where('id', $id)->delete();
        return response()->json(['status' => 200]);
    }

    public function UpdateJobslogoimage(Request $request, $job_id)
    {
        //dd(decrypt($request->job_id));

        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.country',
                'users.country_id',
                'users.state_id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'countries.name as countryname',
                'countries.flag',
                'states.name as statename',
                'cities.name as cityname'
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $getjobsItems = tbl_job_item::where('id', decrypt($request->job_id))->get();

        $fetchAllJobsItems = DB::table('tbl_job_items')
            ->select(
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'users.service_duration_business',
                'users.product_duration',
                'tbl_job_items.id',
                'tbl_job_items.post_date_of_item',
                'tbl_job_items.user_id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.first_name',
                'tbl_job_items.last_name',
                'tbl_job_items.department',
                'tbl_job_items.job_title',
                'tbl_job_items.salary',
                'tbl_job_items.type_of_job',
                'tbl_job_items.schedule_from',
                'tbl_job_items.schedule_to',
                'tbl_job_items.job_description',
                'tbl_job_items.city',
                'tbl_job_items.state',
                'tbl_job_items.country',
                'tbl_job_items.postal_code',
                'tbl_job_items.contract_type',
                'tbl_job_items.compensation',
                'tbl_job_items.company_name',
                'tbl_job_items.company_logo',
                'tbl_job_items.company_type',
                'tbl_job_items.employess_number',
                'tbl_job_items.career_level',
                'tbl_job_items.degree',
                'tbl_job_items.experience',
                'tbl_job_items.skills',
                'tbl_job_items.p_box',
                'tbl_job_items.address',
                'tbl_job_items.phone',
                'tbl_job_items.mobile',
                'tbl_job_items.email',
                'tbl_job_items.fax',
                'tbl_job_items.website',
                'tbl_job_items.post_expiry_date',
                'tbl_job_items.post_delete_date',
                'tbl_job_items.post_date_count',
                'tbl_job_items.post_expiry_count',
                'tbl_job_items.post_delete_count',
                'tbl_job_items.expire_status',
                'tbl_job_items.ad_type',
                'tbl_job_items.views',
                'tbl_job_items.rate',
                'tbl_job_items.total_rate',
                'tbl_job_items.hits',
                'tbl_job_items.created_at'
            )
            ->leftjoin('users', 'users.id', '=', 'tbl_job_items.user_id')
            ->where(['tbl_job_items.id' => decrypt($request->job_id), 'tbl_job_items.expire_status' => 1])
            ->get();

        return view('user.mpingiusers.edit_jobs_item_details', ['countries' => $countries], compact('fetchAllJobsItems', 'getjobsItems', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();
    }

    public function UpdateJobsform(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'job_title' => '',
            'department' => '',
            'company_name' => '',
            'description' => '',
            'p_box' => '',
            'address' => '',
            'phone' => '',
            'email' => '',
            'mobile' => '',
            'website' => '',
        ], [
            'job_title.required' => '',
            'department.required' => '',
            'company_name.required' => 'Required Company Name',
            'description.required' => '',
            'p_box.required' => '',
            'address.required' => '',
            'phone.required' => '',
            'email.required' => '',
            'mobile.required' => '',
            'website.required' => '',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $products_edit = tbl_job_item::find($request->id);
        $pData = [
            'job_title' => $request->job_title,
            'department' => $request->department,
            'company_name' => $request->company_name,
            'job_description' => $request->job_description,
            'p_box' => $request->p_box,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'website' => $request->website


        ];
        $products_edit->update($pData);

        return response()->json([
            'status' => 200,
        ]);

    }

    public function Jobslogoimage(Request $request)
    {

        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $getbusinessdata = DB::table('users')
            ->select(
                'users.id',
                'users.country',
                'users.country_id',
                'users.state_id',
                'tbl_mping_businesses.user_id',
                'tbl_mping_businesses.id as business_id',
                'tbl_mping_businesses.email',
                'tbl_mping_businesses.register_date',
                'tbl_mping_businesses.business_name',
                'tbl_mping_businesses.business_motto',
                'tbl_mping_businesses.business_logo',
                'tbl_mping_businesses.business_type',
                'tbl_mping_businesses.dealers_in',
                'tbl_mping_businesses.department',
                'tbl_mping_businesses.job_title',
                'tbl_mping_businesses.i_am_a',
                'tbl_mping_businesses.fax',
                'tbl_mping_businesses.po_box',
                'tbl_mping_businesses.website',
                'tbl_mping_businesses.address',
                'tbl_mping_businesses.shipping',
                'tbl_mping_businesses.notification',
                'tbl_mping_businesses.banner_color',
                'tbl_mping_businesses.banner_title_color',
                'tbl_mping_businesses.country_id',
                'tbl_mping_businesses.state_id',
                'tbl_mping_businesses.city_id',
                'tbl_mping_businesses.shop_status',
                'tbl_mping_businesses.description',
                'tbl_mping_businesses.views',
                'tbl_mping_businesses.type',
                'tbl_mping_businesses.business_icon',
                'countries.name as countryname',
                'countries.flag',
                'states.name as statename',
                'cities.name as cityname'
            )

            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            ->where(['users.id' => $user, 'expire_status' => '0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $getjobsItems = tbl_job_item::where('id', decrypt($request->id))->get();

        $fetchAllJobsItems = DB::table('tbl_job_items')
            ->select(
                'users.profile',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'users.gender',
                'users.date',
                'users.month',
                'users.year',
                'users.country',
                'users.country_id',
                'users.state_id',
                'users.mobile',
                'users.pobox',
                'users.phone',
                'users.address_1',
                'users.email',
                'users.address_2',
                'users.service_duration_business',
                'users.product_duration',
                'tbl_job_items.id',
                'tbl_job_items.post_date_of_item',
                'tbl_job_items.user_id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.first_name',
                'tbl_job_items.last_name',
                'tbl_job_items.department',
                'tbl_job_items.job_title',
                'tbl_job_items.salary',
                'tbl_job_items.type_of_job',
                'tbl_job_items.schedule_from',
                'tbl_job_items.schedule_to',
                'tbl_job_items.job_description',
                'tbl_job_items.city',
                'tbl_job_items.state',
                'tbl_job_items.country',
                'tbl_job_items.postal_code',
                'tbl_job_items.contract_type',
                'tbl_job_items.compensation',
                'tbl_job_items.company_name',
                'tbl_job_items.company_logo',
                'tbl_job_items.company_type',
                'tbl_job_items.employess_number',
                'tbl_job_items.career_level',
                'tbl_job_items.degree',
                'tbl_job_items.experience',
                'tbl_job_items.skills',
                'tbl_job_items.p_box',
                'tbl_job_items.address',
                'tbl_job_items.phone',
                'tbl_job_items.mobile',
                'tbl_job_items.email',
                'tbl_job_items.fax',
                'tbl_job_items.website',
                'tbl_job_items.post_expiry_date',
                'tbl_job_items.post_delete_date',
                'tbl_job_items.post_date_count',
                'tbl_job_items.post_expiry_count',
                'tbl_job_items.post_delete_count',
                'tbl_job_items.expire_status',
                'tbl_job_items.ad_type',
                'tbl_job_items.views',
                'tbl_job_items.rate',
                'tbl_job_items.total_rate',
                'tbl_job_items.hits',
                'tbl_job_items.created_at'
            )
            ->leftjoin('users', 'users.id', '=', 'tbl_job_items.user_id')
            ->where(['tbl_job_items.id' => decrypt($request->id), 'tbl_job_items.expire_status' => 1])
            ->get();



        return view('user.mpingiusers.jobs_item_details', ['countries' => $countries], compact('fetchAllJobsItems', 'getjobsItems', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }

    public function Updatemyjoblogo(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'company_logo' => 'image|mimes:png,jpg,gif,jpeg|max:2048'

        ], [
            'company_logo.required' => 'Image upload is 2mb maximum upload allowed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $fileName = '';
        $companylogo = tbl_job_item::find($request->id);
        $file = $request->file('company_logo');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('/public/assets/uploads/', $fileName);
        $pData = [
            'company_logo' => $fileName,

        ];

        $companylogo->update($pData);
        return response()->json([
            'status' => "200",
        ]);
    }

    //====================================end jobs=======================================

    //Chat Private message to seller/buyer
    public function ChatPrivateMessage(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'message' => 'required',
        ], [
            'message.required' => 'Required  Message',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        //  date_default_timezone_set("asia/manila");
        $newDateTimeNow = date("l, F d, Y");
        $products = new tbl_chat;
        $products->seller_id = $request->seller_id;
        $products->buyer_id = $request->buyer_id;
        $products->message = $request->message;
        $products->email = $request->email;
        $products->message_status = "unread";
        $products->date_created = \Carbon\Carbon::now();
        $products->save();

        return response()->json([
            'status' => 200,
        ]);


    }

    //end Chat Private message to seller/buyer

    //reply chat message

    public function ReplyMessage(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'reply' => 'required',
        ], [
            'reply.required' => 'Required  Reply',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        $newDateTimeNow = date("l, F d, Y");
        tbl_chat::where('id', $request->id)
            ->update([
                'seller_id' => $request->seller_id,
                'message_status' => "read",
                'reply' => $request->reply,
                'date_reply' => $newDateTimeNow
            ]);
        return response()->json([
            'status' => 200,
        ]);

    }

    //end reply chat message

    //delete message
    public function DeleteMessages(Request $request)
    {
        $id = $request->id;
        tbl_chat::find($id)->delete();
        return response()->json(['status3' => 200]);


    }
    //end delete message




}