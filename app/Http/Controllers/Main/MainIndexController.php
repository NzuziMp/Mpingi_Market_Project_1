<?php

namespace App\Http\Controllers\Main;
use App\Models\Day;
use App\Models\Year;
use App\Models\Month;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Product;
use App\Models\AvailableJob;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tbl_mping_business;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\IndustriesAndManufacture;
use App\Models\IndustriesAndManufactureSubCategories;
use App\Models\tbl_messages;
use App\Models\Tbl_article;
use App\Models\Tbl_category;
use App\Models\Tbl_products_item;
use App\Models\tbl_mping_purchase;
use App\Models\tbl_imgs;
use Illuminate\Support\Carbon;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\GmailRecoverPassword;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use App\Models\tbl_service_items;
use App\Models\tbl_industry_item;
use Illuminate\Support\Facades\App;
use Illuminate\Http\RedirectResponse;

class MainIndexController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
            'dashboard'
        ]);
    }

    public function change(Request $request): RedirectResponse
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();
    }

    public function login()
    {

        $loginBuyerIds = $request->loginBuyer;
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('mainindex.login', compact('loginBuyerIds', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();


    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'status' => 'active'
        ]);


        if (Auth::attempt($credentials)) {
            User::where('id', Auth::id())->update(['islogged' => 'Online']);
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');

        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    }

    public function RegUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'min:8|required_with:password|same:password'
        ], [
            'email.required' => 'Please input unique email address',
            'password.required' => 'Please input Password',
            'confirm_password.required' => 'Please Confirm Password',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 0,
            'status' => 'active',
            'product_duration' => 31,
        ]);

        // $credentials = $request->only('email', 'password');
        // Auth::attempt($credentials);
        // $request->session()->regenerate();
        // return redirect()->route('dashboard')
        // ->withSuccess('You have successfully registered & logged in!');
        return redirect()->route('login')->with('mgs', 'You have successfully registered!');
    }


    public function dashboard()
    {

        if (Auth::check()) {
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

            $countries = Country::all();
            $countfeedback = tbl_messages::where('user_id', $user)->count();
            $countcancelmyOrder = tbl_mping_purchase::where(['user_id_buyer' => $user, 'cancel_id' => 0])->count();
            $countWaitingforApproval = tbl_mping_purchase::where(['user_id_buyer' => $user, 'status' => 0, 'cancel_id' => 1])->count();
            $countItemApproved = tbl_mping_purchase::where(['user_id_buyer' => $user, 'status' => 1, 'cancel_id' => 1])->count();

            return view('auth.dashboard', ['countries' => $countries], compact('countItemApproved', 'countWaitingforApproval', 'countcancelmyOrder', 'countfeedback', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'));
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function logout(Request $request)
    {
        User::where('id', Auth::id())->update(['islogged' => 'Offline']);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('mgs', 'You have logged out successfully!');

    }


    public function GuestLoginBuyer()
    {

    }

    public function Index(Request $request)
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


        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => '1'])
            ->get();


        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        ///////////////////////////////////////////////category////////////////////////////////
        $fetchallCategories = Tbl_category::all();
        // $fetchallservices = tbl_service_items::where('expire_status', 1)->get();


        $Subproductitems = DB::table('tbl_sub_products')
            ->select(
                'tbl_sub_products.id as subproduct_id',
                'tbl_sub_products.sub_product_name_en',
                'tbl_sub_products.sub_product_name_fr',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(tbl_product_items.sub_product_id) as total_productType'),
            )
            ->leftjoin('tbl_product_items', 'tbl_product_items.sub_product_id', '=', 'tbl_sub_products.id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->groupBy('tbl_product_items.sub_product_id')
            ->get();

        $Subservicesitems = DB::table('tbl_sub_services')
            ->select(
                'tbl_sub_services.id as subservice_id',
                'tbl_sub_services.sub_service_name',
                'tbl_sub_services.sub_service_name_fr',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_subservice'),
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_services.id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_services.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->get();

        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.sub_industry_name_fr',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.industry_name_fr',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            // ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            // ->orderBy('tbl_job_items.id', 'DESC')
            ->get();



        return view('mainindex.index', ['countries' => $countries], compact('Subproductitems', 'Subservicesitems', 'fetchjobs', 'countalljobs_', 'joinservices', 'fetchsubIndustry', 'countallindustry_items_', 'countallservice_items_', 'fetchallCategories', 'countallproducts_', 'ProductTypeGroupCount', 'countryGroupCount', 'countallcountries', 'products', 'loginBuyerIds', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }

    public function Viewjobsitems(Request $request, $job_category_id, $job_items_id)
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

        $loginBuyerIds = $request->loginBuyer;
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        $countallcountries = DB::table('countries')->count();

        // $fetchallCategories = Tbl_category::all();


        $jobcategories = DB::table('tbl_job_categories')->where('id', decrypt($request->job_category_id))->get();
        $jobname = DB::table('tbl_job_items')->where('id', decrypt($request->job_items_id))->get();
        $total_items = DB::table('tbl_job_items')->where('job_category_id', decrypt($request->job_category_id))->count();
        $jobfetchname = DB::table('tbl_job_items')->where('job_category_id', decrypt($request->job_category_id))->get();

        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();

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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->latest()
            ->get();

        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->selectRaw('tbl_product_items.product_type,
                                 tbl_product_items.expire_status,
                                 tbl_images.id as IDs,
                                 tbl_product_items.slug,
                                 tbl_product_items.id,
                                  tbl_product_items.sub_product_id,
                                 count(tbl_product_items.product_type) as total_productType',
            )
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
            ->groupBy('tbl_product_items.sub_product_id')
            ->where(['tbl_product_items.expire_status' => 1])
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


        // $ProductTypeGroupCount = DB::table('tbl_product_items')
        // ->select('tbl_product_items.product_type',
        //           'tbl_product_items.id',
        //           'tbl_product_items.slug',
        //            DB::raw('count(product_type) as total_productType'),
        //           )
        // ->groupBy('product_type')
        // ->where(['expire_status'=>'1'])
        // ->get();


        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        ///////////////////////////////////////////////category////////////////////////////////
        $fetchallCategories = Tbl_category::all();
        // $fetchallservices = tbl_service_items::where('expire_status', 1)->get();


        $Subproductitems = DB::table('tbl_sub_products')
            ->select(
                'tbl_sub_products.id as subproduct_id',
                'tbl_sub_products.sub_product_name_en',
                'tbl_sub_products.sub_product_name_fr',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(tbl_product_items.sub_product_id) as total_productType'),
            )
            ->leftjoin('tbl_product_items', 'tbl_product_items.sub_product_id', '=', 'tbl_sub_products.id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->groupBy('tbl_product_items.sub_product_id')
            ->get();

        $Subservicesitems = DB::table('tbl_sub_services')
            ->select(
                'tbl_sub_services.id as subservice_id',
                'tbl_sub_services.sub_service_name',
                'tbl_sub_services.sub_service_name_fr',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_subservice'),
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_services.id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_services.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->get();

        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.sub_industry_name_fr',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.industry_name_fr',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            // ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            // ->orderBy('tbl_job_items.id', 'DESC')
            ->get();

        return view(
            'mainindex.jobs_items',
            [
                'countallproducts_' => $countallproducts_,
                'countallservice_items_' => $countallservice_items_,
                'countallindustry_items_' => $countallindustry_items_,
                'joinservices' => $joinservices,
                'fetchsubIndustry' => $fetchsubIndustry,
                'ProductTypeGroupCount' => $ProductTypeGroupCount,
                'countries' => $countries
            ],
            compact('Subproductitems', 'Subservicesitems', 'total_items', 'jobname', 'fetchjobs', 'countalljobs_', 'jobfetchname', 'jobcategories', 'servicesids', 'industriesids', 'ProductTypeGroupCount', 'products', 'fetchallCategories', 'countallproducts_', 'getbusinessdata', 'countProductItems', 'countProductItems1')
        )->render();
    }

    public function ServiceItemService(Request $request, $service_id, $sub_service_one_id, $sub_service_id)
    {

        //    dd(decrypt($request->sub_service_one_id), decrypt($request->sub_service_id));

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

        $loginBuyerIds = $request->loginBuyer;
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        $countallcountries = DB::table('countries')->count();

        // $fetchallCategories = Tbl_category::all();
        $services = DB::table('tbl_services')->where('id', decrypt($request->service_id))->get();
        $subservices = DB::table('tbl_sub_services')->where('id', decrypt($request->sub_service_one_id))->get();
        $subservices3 = DB::table('tbl_sub_service_threes')->where('sub_service_id', decrypt($request->sub_service_id))->get();
        $total_items = DB::table('tbl_service_items')->where('sub_service_id', decrypt($request->sub_service_id))->count();
        $getItems = DB::table('tbl_service_items')->where('sub_service_id', decrypt($request->sub_service_id))->get();

        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();

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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->latest()
            ->get();

        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->selectRaw('tbl_product_items.product_type,
                             tbl_product_items.expire_status,
                             tbl_images.id as IDs,
                             tbl_product_items.slug,
                             tbl_product_items.id,
                              tbl_product_items.sub_product_id,
                             count(tbl_product_items.product_type) as total_productType',
            )
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
            ->groupBy('tbl_product_items.sub_product_id')
            ->where(['tbl_product_items.expire_status' => 1])
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


        // $ProductTypeGroupCount = DB::table('tbl_product_items')
        // ->select('tbl_product_items.product_type',
        //           'tbl_product_items.id',
        //           'tbl_product_items.slug',
        //            DB::raw('count(product_type) as total_productType'),
        //           )
        // ->groupBy('product_type')
        // ->where(['expire_status'=>'1'])
        // ->get();


        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        ///////////////////////////////////////////////category////////////////////////////////
        $fetchallCategories = Tbl_category::all();
        // $fetchallservices = tbl_service_items::where('expire_status', 1)->get();


        $Subproductitems = DB::table('tbl_sub_products')
            ->select(
                'tbl_sub_products.id as subproduct_id',
                'tbl_sub_products.sub_product_name_en',
                'tbl_sub_products.sub_product_name_fr',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(tbl_product_items.sub_product_id) as total_productType'),
            )
            ->leftjoin('tbl_product_items', 'tbl_product_items.sub_product_id', '=', 'tbl_sub_products.id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->groupBy('tbl_product_items.sub_product_id')
            ->get();

        $Subservicesitems = DB::table('tbl_sub_services')
            ->select(
                'tbl_sub_services.id as subservice_id',
                'tbl_sub_services.sub_service_name',
                'tbl_sub_services.sub_service_name_fr',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_subservice'),
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_services.id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_services.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->get();

        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.sub_industry_name_fr',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.industry_name_fr',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            // ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            // ->orderBy('tbl_job_items.id', 'DESC')
            ->get();

        return view(
            'mainindex.service_items_service',
            [
                'countallproducts_' => $countallproducts_,
                'countallservice_items_' => $countallservice_items_,
                'countallindustry_items_' => $countallindustry_items_,
                'joinservices' => $joinservices,
                'fetchsubIndustry' => $fetchsubIndustry,
                'ProductTypeGroupCount' => $ProductTypeGroupCount,
                'countries' => $countries
            ],
            compact('Subproductitems', 'Subservicesitems', 'fetchjobs', 'countalljobs_', 'getItems', 'total_items', 'subservices3', 'servicesids', 'services', 'industriesids', 'ProductTypeGroupCount', 'products', 'subservices', 'fetchallCategories', 'countallproducts_', 'getbusinessdata', 'countProductItems', 'countProductItems1')
        )->render();
    }


    public function IndustryItems(Request $request, $industry_id, $sub_industry_id)
    {

        //    dd(decrypt($request->sub_service_one_id), decrypt($request->sub_service_id));

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

        $loginBuyerIds = $request->loginBuyer;
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        $countallcountries = DB::table('countries')->count();

        // $fetchallCategories = Tbl_category::all();

        $industries = DB::table('tbl_industries')->where('id', decrypt($request->industry_id))->get();
        $subindustries = DB::table('tbl_sub_industries')->where('id', decrypt($request->sub_industry_id))->get();
        $total_items = DB::table('tbl_industry_items')->where('sub_industry_id', decrypt($request->sub_industry_id))->count();
        $getItems = DB::table('tbl_industry_items')->where('sub_industry_id', decrypt($request->sub_industry_id))->get();

        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();

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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->latest()
            ->get();

        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->selectRaw('tbl_product_items.product_type,
                                 tbl_product_items.expire_status,
                                 tbl_images.id as IDs,
                                 tbl_product_items.slug,
                                 tbl_product_items.id,
                                  tbl_product_items.sub_product_id,
                                 count(tbl_product_items.product_type) as total_productType',
            )
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
            ->groupBy('tbl_product_items.sub_product_id')
            ->where(['tbl_product_items.expire_status' => 1])
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


        // $ProductTypeGroupCount = DB::table('tbl_product_items')
        // ->select('tbl_product_items.product_type',
        //           'tbl_product_items.id',
        //           'tbl_product_items.slug',
        //            DB::raw('count(product_type) as total_productType'),
        //           )
        // ->groupBy('product_type')
        // ->where(['expire_status'=>'1'])
        // ->get();


        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        ///////////////////////////////////////////////category////////////////////////////////
        $fetchallCategories = Tbl_category::all();
        // $fetchallservices = tbl_service_items::where('expire_status', 1)->get();


        $Subproductitems = DB::table('tbl_sub_products')
            ->select(
                'tbl_sub_products.id as subproduct_id',
                'tbl_sub_products.sub_product_name_en',
                'tbl_sub_products.sub_product_name_fr',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(tbl_product_items.sub_product_id) as total_productType'),
            )
            ->leftjoin('tbl_product_items', 'tbl_product_items.sub_product_id', '=', 'tbl_sub_products.id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->groupBy('tbl_product_items.sub_product_id')
            ->get();

        $Subservicesitems = DB::table('tbl_sub_services')
            ->select(
                'tbl_sub_services.id as subservice_id',
                'tbl_sub_services.sub_service_name',
                'tbl_sub_services.sub_service_name_fr',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_subservice'),
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_services.id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_services.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->get();

        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.sub_industry_name_fr',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.industry_name_fr',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            // ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            // ->orderBy('tbl_job_items.id', 'DESC')
            ->get();

        return view(
            'mainindex.industry_items',
            [
                'countallproducts_' => $countallproducts_,
                'countallservice_items_' => $countallservice_items_,
                'countallindustry_items_' => $countallindustry_items_,
                'joinservices' => $joinservices,
                'fetchsubIndustry' => $fetchsubIndustry,
                'ProductTypeGroupCount' => $ProductTypeGroupCount,
                'countries' => $countries
            ],
            compact('Subproductitems', 'Subservicesitems', 'fetchjobs', 'countalljobs_', 'getItems', 'total_items', 'subindustries', 'servicesids', 'industries', 'industriesids', 'ProductTypeGroupCount', 'products', 'fetchallCategories', 'countallproducts_', 'getbusinessdata', 'countProductItems', 'countProductItems1')
        )->render();
    }


    public function IndustryItems2(Request $request, $industry_id, $sub_industry_id, $id)
    {

        //    dd(decrypt($request->sub_service_one_id), decrypt($request->sub_service_id));

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

        $loginBuyerIds = $request->loginBuyer;
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        $countallcountries = DB::table('countries')->count();

        $fetchallCategories = Tbl_category::all();

        $industries = DB::table('tbl_industries')->where('id', decrypt($request->industry_id))->get();
        $subindustries = DB::table('tbl_sub_industries')->where('id', decrypt($request->sub_industry_id))->get();
        $total_items = DB::table('tbl_industry_items')->where('sub_industry_id', decrypt($request->sub_industry_id))->count();
        $getItems = DB::table('tbl_industry_items')->where('sub_industry_id', decrypt($request->sub_industry_id))->get();

        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();

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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->latest()
            ->get();

        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->selectRaw('tbl_product_items.product_type,
                                 tbl_product_items.expire_status,
                                 tbl_images.id as IDs,
                                 tbl_product_items.slug,
                                 tbl_product_items.id,
                                  tbl_product_items.sub_product_id,
                                 count(tbl_product_items.product_type) as total_productType',
            )
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
            ->groupBy('tbl_product_items.sub_product_id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->get();

        //  ===================right side bar industries and businesses item =============
        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => '1'])
            ->get();


        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();

        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            ->orderBy('tbl_job_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();

        //  ===================end right side bar industries and businesses item =============

        return view(
            'mainindex.industry_items',
            [
                'countallproducts_' => $countallproducts_,
                'countallservice_items_' => $countallservice_items_,
                'countallindustry_items_' => $countallindustry_items_,
                'joinservices' => $joinservices,
                'fetchsubIndustry' => $fetchsubIndustry,
                'ProductTypeGroupCount' => $ProductTypeGroupCount,
                'countries' => $countries
            ],
            compact('fetchjobs', 'countalljobs_', 'getItems', 'total_items', 'subindustries', 'servicesids', 'industries', 'industriesids', 'ProductTypeGroupCount', 'products', 'fetchallCategories', 'countallproducts_', 'getbusinessdata', 'countProductItems', 'countProductItems1')
        )->render();
    }



    public function GetPerPage(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $serchpage = $request->pages;
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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->paginate($serchpage);

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

        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType')
            )
            ->groupBy('product_type')
            ->where(['expire_status' => '1'])
            ->get();

        ///////////////////////////////////////////////category////////////////////////////////
        $fetchallCategories = Tbl_category::all();

        ///////////////////////////////////////////////category////////////////////////////////


        return view('mainindex.paginate_records', ['countries' => $countries], compact('fetchallCategories', 'ProductTypeGroupCount', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();
    }


    public function ajax_paginate(Request $request)
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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->paginate();


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

        return view('mainindex.paginate_records', ['countries' => $countries], compact('products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();
    }



    public function getCountry($country_id)
    {

        $data = State::where('country_id', $country_id)->get();
        return response()->json(['data' => $data]);

    }

    public function getState($state_id)
    {

        $data = City::where('state_id', $state_id)->get();
        return response()->json(['data' => $data]);

    }

    //category section


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

    //end category



    function getSearch(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');

            if ($query == '') {//if search is empty back to this below

                $serchpage = $request->pages;
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
                    //    ->whereNot('tbl_product_items.user_id', $user)
                    ->whereIn('tbl_product_items.expire_status', [1])
                    ->groupBy('tbl_imgs.upload_id')
                    ->orderBy('tbl_product_items.id', 'desc')
                    ->paginate();
                //    $products = Product::latest()->paginate(24);
                $countries = Country::all();
                $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
                $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
                $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
                $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

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


                return view('mainindex.index', ['countries' => $countries], compact('products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();
                return view('mainindex.paginate_records', ['countries' => $countries], compact('products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

            }
            if ($query != '') {
                $users = Auth::user()->id ?? 'session expired';
                $data = DB::table('tbl_product_items')
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
                    ->where('tbl_product_items.item_name', 'like', '%' . $query . '%')
                    //->orWhere('tbl_product_items.price', 'like', '%'.$query.'%')
                    //    ->whereNot('tbl_product_items.user_id', $users)
                    ->whereIn('tbl_product_items.expire_status', [1])
                    ->groupBy('tbl_imgs.upload_id')
                    ->orderBy('tbl_product_items.id', 'desc')
                    ->distinct('tbl_product_items.item_name')
                    ->get();

            } else {

                $data = DB::table('tbl_product_items')
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
                    // ->whereNot('tbl_product_items.user_id', $user)
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
                    if (!Auth::check()) {
                        $checklogin = '<a href="' . route('login') . '" id="removeunderline">
                         <i class="fa fa-gift"></i> Order Now!
                         </a>';
                    } else {
                        $checklogin = '<a href="javascript:void(0)" id="removeunderline">
                          <i class="fa fa-gift"></i> Order Now!
                          </a>';
                    }
                    $output .= '<div class="col-md-3 col-6 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger">
                             <div class="mb-4 card">
                                 <div class="containeroverlay">
                                 <div class="">
                                    <img class="card-img-top_ embed-responsive-item" src="http://127.0.0.1:8000/storage/assets/uploads/' . $img . '" alt="Card image cap">
                                 </div>
                                   <div class="overlay overlayTop">
                                     <div class="text">
                                             <h3 id="cssh2" class=""><i
                                                     class="fa fa-user"></i>&nbsp;Seller &
                                                 Buyer<br><br>
                                                 ' . $checklogin . '<br><br>

                                             <a href="' . route('guest.viewdetailsitem', ['upload_id' => encrypt($row->ImageIDS), 'product_id' => encrypt($row->ProductItem_id), 'product_type' => $row->product_type]) . '" id="removeunderline">
                                             <i class="fa fa-tag"></i> Product&nbsp;Details
                                            </a>
                                                 <br><br>
                                                 <a href="' . route('shop_number', ['id' => encrypt($row->userid)]) . '" id="removeunderline">
                                                     <i class="fa fa-shopping-cart"></i> See
                                                     Store&nbsp;&nbsp;&nbsp;&nbsp;
                                                 </a><br><br>
                                                 <a href="' . route('guest.viewdetailsitem', ['upload_id' => encrypt($row->ImageIDS), 'product_id' => encrypt($row->ProductItem_id), 'product_type' => $row->product_type]) . '" id="removeunderline">
                                                     <i class="fa fa-phone"></i>
                                                     <span class="hide-phone-number">' . Str::limit($row->phone, 4, '') . '</span>
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
            // ->whereNot('tbl_product_items.user_id', $user)
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

        return view('mainindex.paginate_records', ['countries' => $countries], compact('products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();
    }

    //  end index


    public function indexProductDetails(Request $request)
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

            // $category_name = DB::table('tbl_categories')
            // ->where('id', $pitems->categoryId)
            // ->get();

            // $subcategories_name = DB::table('tbl_sub_categories')
            // ->where('id', $pitems->sub_categoryId)
            // ->get();

            // $article_name =  DB::table('tbl_articles')
            // ->where('id', $pitems->articleId)
            // ->get();

            // $subproduct_name =  DB::table('tbl_sub_products')
            // ->where('id', $pitems->sub_productId )
            // ->get();

            $fetchImage = DB::table('tbl_images')
                ->select('tbl_imgs.image_name', 'tbl_imgs.id as imgID')
                ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
                ->where('tbl_images.product_item', $pitems->id)
                ->get();

            $count_country = DB::table('tbl_product_items')->where(['place_of_origin' => $pitems->place_of_origin, 'expire_status' => '1'])->count();


        }

        $photoIDS = $request->upload_id;
        $fetchallCategories = Tbl_category::all();
        $countFeedback = tbl_messages::where('tbl_messages.product_id', decrypt($request->product_id))->count();

        $main_img = DB::table('tbl_product_items')
            ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
                        users.id,
                        users.product_duration as PDurations,
                        tbl_product_items.id as ProductItem_id,
                        tbl_product_items.user_id,
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
            // ->where('tbl_product_items.id', decrypt($request->product_id))
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            // ->distinct('tbl_product_items.item_name')
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
            ->where(['slug' => $request->product_type, 'tbl_product_items.expire_status' => '1'])
            ->get();

        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => '1'])
            ->get();

        $countallcountries = DB::table('countries')->count();

        $producttype = DB::table('tbl_product_items')
            ->select('*')
            ->where('slug', $request->product_type)->limit(1)->get();

        foreach ($producttype as $key) {
            $catname = DB::table('tbl_categories')
                ->where('id', $key->category_id)
                ->get();

            $subcategoriesname = DB::table('tbl_sub_categories')
                ->where('id', $key->sub_category_id)
                ->get();

            $articlename = DB::table('tbl_articles')
                ->where('id', $key->article_id)
                ->get();

            $subproductname = DB::table('tbl_sub_products')
                ->where('id', $key->sub_product_id)
                ->get();

        }

        $producttypeall = DB::table('tbl_product_items')
            ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
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
                        tbl_images.product_item,
                        users.profile,
                        users.first_name,
                        users.middle_name,
                        users.last_name,
                        users.gender,
                        users.date,
                        users.month,
                        users.year,
                        users.country,
                        users.country_id,
                        users.state_id,
                        users.mobile,
                        users.pobox,
                        users.phone,
                        users.address_1,
                        users.email,
                        users.address_2

                    ')
            ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->where('tbl_product_items.slug', $request->product_type)
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->get();


        $productPriceRange = DB::table('tbl_product_items')
            ->select(
                DB::raw('DISTINCT price as prices')
            )
            ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->where('tbl_product_items.slug', $request->product_type)
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            // ->orderBy('price', 'asc')
            ->orderByRaw('LENGTH(price) ASC')
            ->get();

        return view('mainindex.group_productdetails', compact('productPriceRange', 'producttypeall', 'catname', 'subcategoriesname', 'articlename', 'subproductname', 'producttype', 'countallcountries', 'countryGroupCount', 'ProductTypeGroupCount', 'main_img', 'countFeedback', 'messagecomment', 'countries', 'categoryids', 'industriesids', 'servicesids', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'user', 'getuser', 'getimageid', 'viewImage', 'countImage', 'photoIDS', 'fetchallCategories'))->render();

    }

    public function guestViewdetails(Request $request)
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


            // $count_country =  DB::table('tbl_product_items')
            // ->selectRaw('count(place_of_origin) as cnt_country')
            // ->where(['place_of_origin' => $pitems->place_of_origin, 'expire_status'=>'0'])
            // ->groupBy('place_of_origin')
            // ->get();

            $count_country = DB::table('tbl_product_items')->where(['place_of_origin' => $pitems->place_of_origin, 'expire_status' => '1'])->count();


        }

        $photoIDS = $request->upload_id;
        $fetchallCategories = Tbl_category::all();
        $countFeedback = tbl_messages::where('tbl_messages.product_id', decrypt($request->product_id))->count();

        $main_img = DB::table('tbl_product_items')
            ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
                    users.id,
                    users.product_duration as PDurations,
                    tbl_product_items.id as ProductItem_id,
                    tbl_product_items.user_id,
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
            ->where('tbl_product_items.product_type', $request->product_type)
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            // ->distinct('tbl_product_items.item_name')
            ->get();

        foreach ($main_img as $us) {
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
                ->where(['tbl_product_items.expire_status' => '1', 'tbl_product_items.place_of_origin' => $us->place_of_origin])
                ->get();
        }



        //$count_country =  DB::table('tbl_product_items')->where(['place_of_origin' => $pitems->place_of_origin, 'expire_status'=>'1'])->count();

        return view('mainindex.guest_detailsitem', compact('countryGroupCount', 'count_country', 'main_img', 'countFeedback', 'messagecomment', 'category_name', 'subcategories_name', 'article_name', 'subproduct_name', 'countries', 'categoryids', 'industriesids', 'servicesids', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'user', 'getuser', 'getimageid', 'viewImage', 'countImage', 'photoIDS', 'fetchallCategories'))->render();


    }


    public function ShowCategoryData(Request $request, $id)
    {
        $catid = $request->id;
        $serchpage = $request->pages;
        $countries = Country::all();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('mainindex.category', ['countries' => $countries], compact('catid', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();

    }

    //product details

    public function ProductDetails(Request $request, $id)
    {
        // $slug = $request->slug;
        $prductdetails = Product::where('id', decrypt($id))->first();
        $allProducts = Product::all();
        $countries = Country::all();
        abort_unless($prductdetails, 404, 'Project not found');
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services



        return view('mainindex.item_details', ['countries' => $countries], compact('prductdetails', 'allProducts', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();

    }

    // login buyer

    public function LoginBuyer(Request $request)
    {

        $loginBuyerIds = $request->loginBuyer;
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('mainindex.login_buyer', compact('loginBuyerIds', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();

    }

    //Item pictures

    // public function ItemPictures(Request $request, $id){
    //     $itemPictures = Product::where('id', decrypt($id))->first();
    //     $countries =  Country::all();
    //     $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
    //     $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
    //     $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
    //     $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
    //     return view('mainindex.item_pictures',['countries' => $countries],  compact('itemPictures','loginbuyerids','industriesids','servicesids','categoryids'))->render();
    // }

    public function ItemPictures(Request $request)
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
        return view('mainindex.item_pictures', compact('countries', 'categoryids', 'industriesids', 'servicesids', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'user', 'getuser', 'getimageid', 'viewImage', 'countImage'))->render();

    }

    //industries details
    public function Industries(Request $request, $id)
    {
        $industriesid = $request->id;
        $serchpage = $request->pages;
        $countries = Country::all();
        $fetchallIndustries = IndustriesAndManufacture::orderBy('category_name', 'asc')->get();
        $fetchallIndustriessubcat = IndustriesAndManufactureSubCategories::where('indusandmanufac_id', '=', $id)->get();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $fetchallCategories = Tbl_category::all();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->id))
            ->get();

        $fetchallSubCategories = DB::table('tbl_sub_categories')
            ->where('category_id', decrypt($request->id))
            // ->orderBy('sub_category_name_en', 'DESC')
            ->get();


        $fetchallarticle = DB::table('tbl_articles')
            ->select('*')
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

        // $authuser = Auth::user()->id ?? 'session expired';
        // $getuser =  User::where('id', $authuser)->get();
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
            // ->where('users.id', $authuser)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            // ->where(['users.id' =>$authuser, 'expire_status'=>'1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            // ->where(['users.id' =>$authuser, 'expire_status'=>'0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $allcountsql = DB::table('tbl_product_items')
            ->select('sub_category_id', 'category_id', DB::raw('COUNT(article_id) AS article_countall, article_id'))
            ->where('expire_status', 1)
            ->groupBy('sub_category_id')
            ->get();

        $allcountarticle = DB::table('tbl_product_items')
            ->select(
                'sub_category_id',
                'category_id',
                'expire_status',
                'article_id',
                'product_type',
                DB::raw('COUNT(article_id) AS articlesub_count, article_id')
            )
            ->where('expire_status', 1)
            ->groupBy('article_id')
            ->get();


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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->latest()
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


        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => '1'])
            ->get();


        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        ///////////////////////////////////////////////category////////////////////////////////
        $fetchallCategories = Tbl_category::all();
        // $fetchallservices = tbl_service_items::where('expire_status', 1)->get();


        $Subproductitems = DB::table('tbl_sub_products')
            ->select(
                'tbl_sub_products.id as subproduct_id',
                'tbl_sub_products.sub_product_name_en',
                'tbl_sub_products.sub_product_name_fr',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(tbl_product_items.sub_product_id) as total_productType'),
            )
            ->leftjoin('tbl_product_items', 'tbl_product_items.sub_product_id', '=', 'tbl_sub_products.id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->groupBy('tbl_product_items.sub_product_id')
            ->get();

        $Subservicesitems = DB::table('tbl_sub_services')
            ->select(
                'tbl_sub_services.id as subservice_id',
                'tbl_sub_services.sub_service_name',
                'tbl_sub_services.sub_service_name_fr',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_subservice'),
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_services.id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_services.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->get();

        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.sub_industry_name_fr',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.industry_name_fr',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            // ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            // ->orderBy('tbl_job_items.id', 'DESC')
            ->get();

        return view('mainindex.industries', ['countries' => $countries], compact('countryGroupCount', 'Subproductitems', 'fetchjobs', 'Subservicesitems', 'fetchsubIndustry', 'allcountarticle', 'allcountsql', 'countProductItems1', 'countProductItems', 'getbusinessdata', 'fetchallSubProductID', 'fetchallProductID', 'fetchallSubCategories', 'CategoriesID', 'fetchallCategories', 'products', 'countallindustry_items_', 'countallservice_items_', 'countallproducts_', 'countalljobs_', 'fetchjobs', 'joinservices', 'fetchsubIndustry', 'ProductTypeGroupCount', 'fetchallIndustriessubcat', 'fetchallIndustries', 'industriesid', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();

    }

    //sub industries details
    public function IndustriesSub(Request $request, $id)
    {
        $industriesid = $request->id;
        $serchpage = $request->pages;
        $countries = Country::all();
        $fetchallIndustries = IndustriesAndManufacture::orderBy('category_name', 'asc')->get();
        $name = IndustriesAndManufacture::where('id', decrypt($id))->firstOrFail();
        $fetchallIndustriessubcat = IndustriesAndManufactureSubCategories::where('indusandmanufac_id', '=', decrypt($id))->orderBy('sub_category_name', 'asc')->get();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services


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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->latest()
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


        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => '1'])
            ->get();


        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        ///////////////////////////////////////////////category////////////////////////////////
        $fetchallCategories = Tbl_category::all();
        // $fetchallservices = tbl_service_items::where('expire_status', 1)->get();


        $Subproductitems = DB::table('tbl_sub_products')
            ->select(
                'tbl_sub_products.id as subproduct_id',
                'tbl_sub_products.sub_product_name_en',
                'tbl_sub_products.sub_product_name_fr',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(tbl_product_items.sub_product_id) as total_productType'),
            )
            ->leftjoin('tbl_product_items', 'tbl_product_items.sub_product_id', '=', 'tbl_sub_products.id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->groupBy('tbl_product_items.sub_product_id')
            ->get();

        $Subservicesitems = DB::table('tbl_sub_services')
            ->select(
                'tbl_sub_services.id as subservice_id',
                'tbl_sub_services.sub_service_name',
                'tbl_sub_services.sub_service_name_fr',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_subservice'),
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_services.id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_services.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->get();

        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.sub_industry_name_fr',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.industry_name_fr',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            // ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            // ->orderBy('tbl_job_items.id', 'DESC')
            ->get();

        return view('mainindex.industriesSub', ['countries' => $countries], compact('products', 'countryGroupCount', 'ProductTypeGroupCount', 'joinservices', 'countalljobs_', 'countallproducts_', 'countallservice_items_', 'countallindustry_items_', 'fetchallCategories', 'Subproductitems', 'Subservicesitems', 'fetchsubIndustry', 'fetchjobs', 'name', 'fetchallIndustriessubcat', 'fetchallIndustries', 'industriesid', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();

    }

    //view single sub industries details
    public function SubindusandmanufacId(Request $request, $id, $sid)
    {
        $industriesid = $request->id;
        $serchpage = $request->pages;
        $countries = Country::all();
        $fetchallIndustries = IndustriesAndManufacture::orderBy('category_name', 'asc')->get();
        $name = IndustriesAndManufacture::where('id', decrypt($sid))->get();
        $namesub = IndustriesAndManufactureSubCategories::where('id', decrypt($id))->get();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

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

        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => '1'])
            ->get();


        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();

        ///////////////////////////////////////////////category////////////////////////////////
        $fetchallCategories = Tbl_category::all();

        return view('mainindex.view_single_subindustries', ['countries' => $countries], compact('countryGroupCount', 'ProductTypeGroupCount', 'countallproducts_', 'fetchallCategories', 'name', 'namesub', 'fetchallIndustries', 'industriesid', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();

    }


    //services details
    public function Services(Request $request, $id)
    {
        $industriesid = $request->id;
        $serchpage = $request->pages;
        $countries = Country::all();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $fetchallCategories = Tbl_category::all();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->id))
            ->get();

        $fetchallSubCategories = DB::table('tbl_sub_categories')
            ->where('category_id', decrypt($request->id))
            // ->orderBy('sub_category_name_en', 'DESC')
            ->get();


        $fetchallarticle = DB::table('tbl_articles')
            ->select('*')
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

        // $authuser = Auth::user()->id ?? 'session expired';
        // $getuser =  User::where('id', $authuser)->get();
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
            // ->where('users.id', $authuser)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            // ->where(['users.id' =>$authuser, 'expire_status'=>'1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            // ->where(['users.id' =>$authuser, 'expire_status'=>'0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $allcountsql = DB::table('tbl_product_items')
            ->select('sub_category_id', 'category_id', DB::raw('COUNT(article_id) AS article_countall, article_id'))
            ->where('expire_status', 1)
            ->groupBy('sub_category_id')
            ->get();

        $allcountarticle = DB::table('tbl_product_items')
            ->select(
                'sub_category_id',
                'category_id',
                'expire_status',
                'article_id',
                'product_type',
                DB::raw('COUNT(article_id) AS articlesub_count, article_id')
            )
            ->where('expire_status', 1)
            ->groupBy('article_id')
            ->get();



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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->latest()
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


        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => '1'])
            ->get();


        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        ///////////////////////////////////////////////category////////////////////////////////
        $fetchallCategories = Tbl_category::all();
        // $fetchallservices = tbl_service_items::where('expire_status', 1)->get();


        $Subproductitems = DB::table('tbl_sub_products')
            ->select(
                'tbl_sub_products.id as subproduct_id',
                'tbl_sub_products.sub_product_name_en',
                'tbl_sub_products.sub_product_name_fr',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(tbl_product_items.sub_product_id) as total_productType'),
            )
            ->leftjoin('tbl_product_items', 'tbl_product_items.sub_product_id', '=', 'tbl_sub_products.id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->groupBy('tbl_product_items.sub_product_id')
            ->get();

        $Subservicesitems = DB::table('tbl_sub_services')
            ->select(
                'tbl_sub_services.id as subservice_id',
                'tbl_sub_services.sub_service_name',
                'tbl_sub_services.sub_service_name_fr',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_subservice'),
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_services.id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_services.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->get();

        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.sub_industry_name_fr',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.industry_name_fr',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            // ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            // ->orderBy('tbl_job_items.id', 'DESC')
            ->get();

        return view('mainindex.services', ['countries' => $countries], compact('Subservicesitems', 'Subproductitems', 'allcountarticle', 'allcountsql', 'countProductItems1', 'countProductItems', 'getbusinessdata', 'fetchallSubProductID', 'fetchallProductID', 'fetchallSubCategories', 'CategoriesID', 'fetchallCategories', 'countallindustry_items_', 'countallservice_items_', 'countallproducts_', 'countalljobs_', 'fetchjobs', 'joinservices', 'fetchsubIndustry', 'ProductTypeGroupCount', 'products', 'industriesid', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();

    }


    //shop number details
    public function GShopNumber(Request $request, $id, $upload_id)
    {
        $shopNumber = Product::where('id', decrypt($id))->first();
        //$shops = tbl_mping_business::where('user_id', decrypt($id))->first();
        $countries = Country::all();
        $products = Product::where('id', decrypt($id))->paginate(24);
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services


        $shops = DB::table('tbl_images')
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
            ->orderBy('tbl_mping_businesses.id', 'DESC')
            ->limit(1)
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



        // $fetchallinshops = DB::table('tbl_mping_businesses')
        // ->select(
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
        //     'tbl_mping_businesses.id',
        //     'tbl_mping_businesses.user_id',
        //     'tbl_mping_businesses.id as business_id',
        //     'tbl_mping_businesses.email',
        //     'tbl_mping_businesses.register_date',
        //     'tbl_mping_businesses.business_name',
        //     'tbl_mping_businesses.business_motto',
        //     'tbl_mping_businesses.business_logo',
        //     'tbl_mping_businesses.business_type',
        //     'tbl_mping_businesses.dealers_in',
        //     'tbl_mping_businesses.department',
        //     'tbl_mping_businesses.job_title',
        //     'tbl_mping_businesses.i_am_a',
        //     'tbl_mping_businesses.fax',
        //     'tbl_mping_businesses.po_box',
        //     'tbl_mping_businesses.website',
        //     'tbl_mping_businesses.address',
        //     'tbl_mping_businesses.shipping',
        //     'tbl_mping_businesses.notification',
        //     'tbl_mping_businesses.banner_color',
        //     'tbl_mping_businesses.banner_title_color',
        //     'tbl_mping_businesses.country_id',
        //     'tbl_mping_businesses.state_id',
        //     'tbl_mping_businesses.city_id',
        //     'tbl_mping_businesses.shop_status',
        //     'tbl_mping_businesses.description',
        //     'tbl_mping_businesses.views',
        //     'tbl_mping_businesses.type',
        //     'tbl_mping_businesses.business_icon',
        //     'countries.name as countryname',
        //     'countries.flag',
        //     'states.name as statename',
        //     'cities.name as cityname',
        // )

        // ->leftjoin('users','users.id','=','tbl_mping_businesses.user_id')
        // ->leftjoin('countries','countries.id','=','tbl_mping_businesses.country_id')
        // ->leftjoin('states','states.id','=','tbl_mping_businesses.state_id')
        // ->leftjoin('cities','cities.id','=','tbl_mping_businesses.city_id')
        // ->where('tbl_mping_businesses.id', decrypt($id))
        // ->orderBy('tbl_mping_businesses.id','DESC')
        // ->limit(1)
        // ->get();


        foreach ($shops as $row) {
            $ProductTypeGroupCount = DB::table('tbl_product_items')
                ->selectRaw('tbl_product_items.product_type,
                                 tbl_product_items.expire_status,
                                 tbl_images.id as IDs,
                                 tbl_product_items.slug,
                                 tbl_product_items.id,
                                  tbl_product_items.sub_product_id,
                                 count(tbl_product_items.product_type) as total_productType',
                )
                ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
                ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
                ->groupBy('tbl_product_items.sub_product_id')
                ->where(['tbl_product_items.expire_status' => 1, 'tbl_product_items.user_id' => $row->user_id])
                ->get();
        }
        return view('mainindex.shops.shop_number_guest', ['countries' => $countries], compact('ProductTypeGroupCount', 'shops', 'shopNumber', 'products', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();

    }

    //shop number details
    public function ShopNumber(Request $request, $id, $upload_id)
    {
        $shopNumber = Product::where('id', decrypt($id))->first();
        //$shops = tbl_mping_business::where('user_id', decrypt($id))->first();
        $countries = Country::all();
        $products = Product::where('id', decrypt($id))->paginate(24);
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $shops = DB::table('tbl_images')
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
            ->orderBy('tbl_mping_businesses.id', 'DESC')
            ->limit(1)
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

        return view('mainindex.shops.shop_number', ['countries' => $countries], compact('shops', 'shopNumber', 'products', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();

    }

    //shop number details
    public function GuestShopNumber(Request $request, $id)
    {
        $shopNumber = Product::where('id', decrypt($id))->first();
        $shops = tbl_mping_business::where('id', decrypt($id))->first();
        $countries = Country::all();
        $products = Product::where('id', decrypt($id))->paginate(24);
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('mainindex.shops.indexs', ['countries' => $countries], compact('shops', 'shopNumber', 'products', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();

    }


    //jobs details
    public function Jobs(Request $request)
    {
        $countries = Country::all();
        $ajobs = AvailableJob::orderBy('id', 'ASC')->paginate(100);
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->latest()
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


        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => '1'])
            ->get();


        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        ///////////////////////////////////////////////category////////////////////////////////
        $fetchallCategories = Tbl_category::all();
        // $fetchallservices = tbl_service_items::where('expire_status', 1)->get();


        $Subproductitems = DB::table('tbl_sub_products')
            ->select(
                'tbl_sub_products.id as subproduct_id',
                'tbl_sub_products.sub_product_name_en',
                'tbl_sub_products.sub_product_name_fr',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(tbl_product_items.sub_product_id) as total_productType'),
            )
            ->leftjoin('tbl_product_items', 'tbl_product_items.sub_product_id', '=', 'tbl_sub_products.id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->groupBy('tbl_product_items.sub_product_id')
            ->get();

        $Subservicesitems = DB::table('tbl_sub_services')
            ->select(
                'tbl_sub_services.id as subservice_id',
                'tbl_sub_services.sub_service_name',
                'tbl_sub_services.sub_service_name_fr',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_subservice'),
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_services.id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_services.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->get();

        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.sub_industry_name_fr',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.industry_name_fr',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            // ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            // ->orderBy('tbl_job_items.id', 'DESC')
            ->get();

        return view('mainindex.jobs', ['countries' => $countries], compact('products', 'countryGroupCount', 'ProductTypeGroupCount', 'joinservices', 'countalljobs_', 'countallproducts_', 'countallservice_items_', 'countallindustry_items_', 'fetchallCategories', 'Subproductitems', 'Subservicesitems', 'fetchsubIndustry', 'fetchjobs', 'ajobs', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();

    }


    //jobs items details
    public function Jobitems(Request $request, $id)
    {
        $availjobs = AvailableJob::where('id', decrypt($id))->first();
        $availjobs_ = AvailableJob::where('id', decrypt($id))->paginate(1);
        $countries = Country::all();
        $ajobs = AvailableJob::orderBy('id', 'ASC')->paginate(100);
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('mainindex.job_items', ['countries' => $countries], compact('availjobs', 'ajobs', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids', 'availjobs_'))->render();

    }

    //job seekers details
    public function JobSeekers(Request $request)
    {
        $countries = Country::all();
        $jobseekers = AvailableJob::orderBy('id', 'ASC')->paginate(100);
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('mainindex.job_seekers', ['countries' => $countries], compact('jobseekers', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();

    }

    //job seekers search data
    public function SearchJobseekers(Request $request)
    {

        if ($request->get('query')) {
            $query = $request->get('query');
            $datas = DB::table('available_jobs')
                ->where('job_name', 'LIKE', "%{$query}%")
                // ->limit(20)
                ->get();
            $output = '<ul  id="results" class="dropdown-menu select-items" style="padding:1%;display:block; position:absoult;overflow-y:scroll;height:110px">';
            $total_rows = $datas->count();
            if ($total_rows > 0) {
                foreach ($datas as $row) {
                    $output .= '
                           <li class="btnData"><a href="#" class="hrefCss2">' . $row->job_name . '</a></li>
                        ';
                }
            } else {
                $output = '
                        <ul class="dropdown-menu select-items" style="padding:1%;display:block; position:absoult;height:40px auto;width:320px!mportant">
                           <li>Search Results for: <span style="font-style:italic; color: #ff7519;">' . $request->get('query') . '</span> </li>
                        </ul>
                        ';
            }
            $output .= '</ul>';
            echo $output;
        }

    }

    //search results

    public function SearchResults(Request $request)
    {

        $countries = Country::all();
        $jobseekers = AvailableJob::orderBy('id', 'ASC')->paginate(100);
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        $countryname = Country::where('id', $request->country)->first();
        $statename = State::where('id', $request->state)->first();
        $cityname = City::where('id', $request->city)->first();
        $jobname = $request->job_name;

        return view('mainindex.search_result', ['countries' => $countries], compact('countryname', 'statename', 'cityname', 'jobname', 'jobseekers', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();

    }

    //end search results

    //shop details
    public function Shops(Request $request)
    {

        $serchpage = $request->pages;
        $products = Product::latest()->paginate(24);
        $countries = Country::all();
        $shops = tbl_mping_business::latest()->paginate(24);

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $ProductTypeGroupCount1 = DB::table('tbl_product_items')
            ->selectRaw('tbl_product_items.product_type,
                          tbl_product_items.expire_status,
                          tbl_images.id as IDs,
                          tbl_product_items.slug,
                          tbl_product_items.id,
                           tbl_product_items.sub_product_id,
                          count(tbl_product_items.product_type) as total_productType',
            )
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
            ->groupBy('tbl_product_items.sub_product_id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->get();

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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->latest()
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


        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => '1'])
            ->get();


        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        ///////////////////////////////////////////////category////////////////////////////////
        $fetchallCategories = Tbl_category::all();
        // $fetchallservices = tbl_service_items::where('expire_status', 1)->get();
        $Subproductitems = DB::table('tbl_sub_products')
            ->select(
                'tbl_sub_products.id as subproduct_id',
                'tbl_sub_products.sub_product_name_en',
                'tbl_sub_products.sub_product_name_fr',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(tbl_product_items.sub_product_id) as total_productType'),
            )
            ->leftjoin('tbl_product_items', 'tbl_product_items.sub_product_id', '=', 'tbl_sub_products.id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->groupBy('tbl_product_items.sub_product_id')
            ->get();

        $Subservicesitems = DB::table('tbl_sub_services')
            ->select(
                'tbl_sub_services.id as subservice_id',
                'tbl_sub_services.sub_service_name',
                'tbl_sub_services.sub_service_name_fr',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_subservice'),
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_services.id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_services.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->get();

        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.sub_industry_name_fr',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.industry_name_fr',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            // ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            // ->orderBy('tbl_job_items.id', 'DESC')
            ->get();


        $fetchcoutrieswithcount = DB::table('countries')
            ->select('*')
            ->get();

        return view(
            'mainindex.shops',
            [
                'countallproducts_' => $countallproducts_,
                'countallservice_items_' => $countallservice_items_,
                'countallindustry_items_' => $countallindustry_items_,
                'joinservices' => $joinservices,
                'fetchsubIndustry' => $fetchsubIndustry,
                'ProductTypeGroupCount' => $ProductTypeGroupCount,
                'countries' => $countries
            ],
            compact('products', 'countryGroupCount', 'Subproductitems', 'Subservicesitems', 'fetchjobs', 'countalljobs_', 'fetchallCategories', 'countallproducts_', 'fetchcoutrieswithcount', 'ProductTypeGroupCount1', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'shops')
        )->render();
    }
    //end shop details

    //shop search results
    function getSearchShop(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');

            if ($query == '') {//if search is empty back to this below

                $serchpage = $request->pages;

                $countries = Country::all();
                $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
                $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
                $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
                $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
                $shops = Shop::latest()->paginate(24);

                return view('mainindex.shops', ['countries' => $countries], compact('categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'shops'))->render();
                return view('mainindex.paginate_shops', ['countries' => $countries], compact('categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'shops'))->render();


            }
            if ($query != '') {
                $data = DB::table('shops')
                    ->where('store_name', 'like', '%' . $query . '%')
                    ->get();

            } else {
                $data = DB::table('shops')
                    ->orderBy('store_name', 'desc')
                    ->get();
            }
            $total_row = $data->count();

            if ($total_row > 0) {
                $res = "";

                foreach ($data as $row) {
                    if ($row->product_id == 1) {
                        $res = '<div
                                    class="col-md-3 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger" >
                                    <div class="mb-4 card" style="width: 300px;;">
                                   <div class="">
                            <center>
                            <div style="background-color:#3b3b3b;height:200px">
                                <i class="mb-1 fa fa-shopping-cart fa-6x IClass"></i>
                                <h6 class="h6Css">' . $row->store_name . '</h6>
                                </div>

                                <p class="mt-2 PClass">
                                <a href="shops/?shop_number=azRYbHppRENzUkVseUFubjdoZzFGQT09"  class="hrefCss3">
                                    <i class="fa fa-gift"></i>
                                    Order Now!
                                </a>
                            </p>
                            </center>
                            </div>
                            </div>
                            </div>
                            ';
                    } elseif ($row->product_id == 2) {
                        $res = '<div
                            class="col-md-3 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger" >
                            <div class="mb-4 card" style="width: 300px;;">
                           <div class="">
                                <center>
                                    <div style="background-color:#3b3b3b;height:200px">
                                    <i class="mb-1 fa fa-shopping-basket fa-6x IClass"></i>
                                    <h6 class="h6Css">' . $row->store_name . '</h6>
                                    </div>

                                    <p class="mt-2 PClass"><a href="shops/?shop_number=azRYbHppRENzUkVseUFubjdoZzFGQT09"  class="hrefCss3">
                                        <i class="fa fa-gift"></i>
                                        Order Now!
                                    </a></p>
                                </center>
                            </div>
                            </div>
                            </div>
                                ';
                    } else {
                        $res = '<div
                            class="col-md-3 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger" >
                            <div class="mb-4 card" style="width: 300px;;">
                           <div class="">
                                <center>
                                    <div style="background-color:#3b3b3b;height:200px">
                                    <i class="mb-1 fa fa-shopping-bag fa-6x IClass"></i>
                                    <h6 class="h6Css">' . $row->store_name . '</h6>
                                    </div>

                                    <p class="mt-2 PClass"><a href="shops/?shop_number=azRYbHppRENzUkVseUFubjdoZzFGQT09"  class="hrefCss3">
                                        <i class="fa fa-gift "></i>
                                        Order Now!
                                    </a></p>
                                </center>
                            </div>
                            </div>
                            </div>
                            ';
                    }
                    $output .= $res;
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

    //end shop search results

    //shop paginate results
    public function ajax_paginate_Shop(Request $request)
    {


        $serchpage = $request->pages;
        $shops = Shop::latest()->paginate(24);
        $countries = Country::all();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('mainindex.paginate_shops', ['countries' => $countries], compact('shops', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids'))->render();
    }
    //end shop paginate results

    //per page shop

    public function GetPerPageShop(Request $request)
    {
        $serchpage = $request->pages;
        $shops = Shop::latest()->paginate($serchpage);
        $countries = Country::all();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('mainindex.paginate_shops', ['countries' => $countries], compact('shops', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids'))->render();
    }
    //end per page shop

    //main shop number details
    public function ShopsId(Request $request, $id)
    {
        $shops = DB::table('tbl_mping_businesses')
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
                'tbl_mping_businesses.id',
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
                'cities.name as cityname',
            )

            ->leftjoin('users', 'users.id', '=', 'tbl_mping_businesses.user_id')
            ->leftjoin('countries', 'countries.id', '=', 'tbl_mping_businesses.country_id')
            ->leftjoin('states', 'states.id', '=', 'tbl_mping_businesses.state_id')
            ->leftjoin('cities', 'cities.id', '=', 'tbl_mping_businesses.city_id')
            ->where('tbl_mping_businesses.id', decrypt($id))
            ->orderBy('tbl_mping_businesses.id', 'DESC')
            ->limit(1)
            ->get();

        $countries = Country::all();
        $products = Product::where('id', decrypt($id))->paginate(24);
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        foreach ($shops as $row) {
            $ProductTypeGroupCount = DB::table('tbl_product_items')
                ->selectRaw('tbl_product_items.product_type,
                         tbl_product_items.expire_status,
                         tbl_images.id as IDs,
                         tbl_product_items.slug,
                         tbl_product_items.id,
                          tbl_product_items.sub_product_id,
                         count(tbl_product_items.product_type) as total_productType',
                )
                ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
                ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
                ->groupBy('tbl_product_items.sub_product_id')
                ->where(['tbl_product_items.expire_status' => 1, 'tbl_product_items.user_id' => $row->user_id])
                ->get();
        }
        return view('mainindex.shops.index', ['countries' => $countries], compact('ProductTypeGroupCount', 'shops', 'products', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();

    }

    //main shop number details


    //jobs paginate results
    public function ajax_paginate_Jobs(Request $request)
    {
        $serchpage = $request->pages;
        $ajobs = AvailableJob::latest()->paginate(100);
        $countries = Country::all();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('mainindex.paginate_jobs', ['countries' => $countries], compact('ajobs', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();
    }
    //end jobs paginate results

    //per page shop

    public function GetPerPageJobs(Request $request)
    {
        $serchpage = $request->pages;
        $ajobs = AvailableJob::latest()->paginate($serchpage);
        $countries = Country::all();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('mainindex.paginate_jobs', ['countries' => $countries], compact('ajobs', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();
    }
    //end per page shop

    //jobseekers paginate results
    public function ajax_paginate_Jobseekers(Request $request)
    {
        $serchpage = $request->pages;
        $ajobs = AvailableJob::latest()->paginate(100);
        $countries = Country::all();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('mainindex.paginate_jobseekers', ['countries' => $countries], compact('ajobs', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();
    }
    //end jobseekers paginate results

    //per page jobseekers

    public function GetPerPageJobseekers(Request $request)
    {
        $serchpage = $request->pages;
        $ajobs = AvailableJob::latest()->paginate($serchpage);
        $countries = Country::all();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('mainindex.paginate_jobseekers', ['countries' => $countries], compact('ajobs', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();
    }
    //end per page jobseekers

    //all products details
    public function Products(Request $request)
    {

        $serchpage = $request->pages;

        $countries = Country::all();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services


        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->selectRaw('tbl_product_items.product_type,
                          tbl_product_items.expire_status,
                          tbl_images.id as IDs,
                          tbl_product_items.slug,
                          tbl_product_items.id,
                           tbl_product_items.sub_product_id,
                          count(tbl_product_items.product_type) as total_productType',
            )
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
            ->groupBy('tbl_product_items.sub_product_id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->get();


        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();

        $fetchcoutrieswithcount = DB::table('countries')
            ->select('*')
            ->get();


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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
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


        //  $ProductTypeGroupCount = DB::table('tbl_product_items')
        //  ->select('tbl_product_items.product_type',
        //            'tbl_product_items.id',
        //            'tbl_product_items.slug',
        //             DB::raw('count(product_type) as total_productType'),
        //            )
        //  ->groupBy('product_type')
        //  ->where(['expire_status'=>'1'])
        //  ->get();


        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        ///////////////////////////////////////////////category////////////////////////////////
        $fetchallCategories = Tbl_category::all();
        // $fetchallservices = tbl_service_items::where('expire_status', 1)->get();


        $Subproductitems = DB::table('tbl_sub_products')
            ->select(
                'tbl_sub_products.id as subproduct_id',
                'tbl_sub_products.sub_product_name_en',
                'tbl_sub_products.sub_product_name_fr',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(tbl_product_items.sub_product_id) as total_productType'),
            )
            ->leftjoin('tbl_product_items', 'tbl_product_items.sub_product_id', '=', 'tbl_sub_products.id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->groupBy('tbl_product_items.sub_product_id')
            ->get();

        $Subservicesitems = DB::table('tbl_sub_services')
            ->select(
                'tbl_sub_services.id as subservice_id',
                'tbl_sub_services.sub_service_name',
                'tbl_sub_services.sub_service_name_fr',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_subservice'),
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_services.id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_services.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->get();

        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.sub_industry_name_fr',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.industry_name_fr',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            // ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            // ->orderBy('tbl_job_items.id', 'DESC')
            ->get();


        return view(
            'mainindex.products',
            [
                'countallproducts_' => $countallproducts_,
                'countallservice_items_' => $countallservice_items_,
                'countallindustry_items_' => $countallindustry_items_,
                'joinservices' => $joinservices,
                'fetchsubIndustry' => $fetchsubIndustry,
                'countries' => $countries
            ],
            compact('products', 'ProductTypeGroupCount', 'countryGroupCount', 'Subproductitems', 'Subservicesitems', 'fetchjobs', 'countalljobs_', 'fetchallCategories', 'products', 'ProductTypeGroupCount', 'countallproducts_', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids')
        )->render();
    }




    //  public function ajax_paginate_allProducts(Request $request){
    //     $countries =  Country::all();
    //     $user = Auth::user()->id ?? 'session expired';
    //     $getuser =  User::where('id', $user)->get();
    //     $countries =  Country::all();

    //         $serchpage = $request->pages;
    //         $getimagex =  DB::table('tbl_product_items')
    //         ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
    //                     tbl_images.id,
    //                     tbl_images.id as ImageIDS,
    //                     tbl_imgs.image_name as Images,
    //                     tbl_imgs.upload_id,
    //                     users.product_duration as PDurations,
    //                     tbl_product_items.id as ProductItem_id,
    //                     tbl_product_items.post_date_of_item,
    //                     tbl_product_items.user_id as userid,
    //                     tbl_product_items.category_id,
    //                     tbl_product_items.sub_category_id,
    //                     tbl_product_items.article_id,
    //                     tbl_product_items.product_id,
    //                     tbl_product_items.sub_product_id,
    //                     tbl_product_items.item_name,
    //                     tbl_product_items.product_type,
    //                     tbl_product_items.brand_name,
    //                     tbl_product_items.brand_id,
    //                     tbl_product_items.pieces,
    //                     tbl_product_items.price,
    //                     tbl_product_items.old_price,
    //                     tbl_product_items.color_id,
    //                     tbl_product_items.sub_color_id,
    //                     tbl_product_items.price_range_start,
    //                     tbl_product_items.price_range_end,
    //                     tbl_product_items.product_color,
    //                     tbl_product_items.place_of_origin,
    //                     tbl_product_items.city,
    //                     tbl_product_items.state_id,
    //                     tbl_product_items.item_descriptions,
    //                     tbl_product_items.item_images,
    //                     tbl_product_items.supplier_name,
    //                     tbl_product_items.supplier_region,
    //                     tbl_product_items.type,
    //                     tbl_product_items.post_expiry_date,
    //                     tbl_product_items.post_delete_date,
    //                     tbl_product_items.post_date_count,
    //                     tbl_product_items.post_expiry_count,
    //                     tbl_product_items.post_delete_count,
    //                     tbl_product_items.expire_status,
    //                     tbl_product_items.ad_type,
    //                     tbl_product_items.views,
    //                     tbl_product_items.shipping,
    //                     tbl_product_items.shipping_price,
    //                     tbl_product_items.price_id,
    //                     tbl_product_items.rate,
    //                     tbl_product_items.total_rate,
    //                     tbl_product_items.hits,
    //                     tbl_product_items.payment,
    //                     tbl_product_items.weight,
    //                     tbl_product_items.volume,
    //                     tbl_product_items.delivery,
    //                     tbl_product_items.day_return,
    //                     tbl_product_items.negotiable,
    //                     tbl_product_items.currency,
    //                     tbl_product_items.category,
    //                     tbl_product_items.product_web_name,
    //                     tbl_product_items.product_web_link,
    //                     tbl_product_items.disponibility,
    //                     tbl_product_items.created_at,
    //                     tbl_product_items.remainingdays_status,
    //                     tbl_product_items.expireddate_remain,
    //                     tbl_images.product_item,
    //                     users.phone,
    //                     users.id as userids

    //                 ')
    //         ->leftjoin('users','users.id','=','tbl_product_items.user_id')
    //         ->leftjoin('tbl_images','tbl_images.product_item','=','tbl_product_items.id')
    //         ->leftjoin('tbl_imgs','tbl_imgs.upload_id','=','tbl_images.id')
    //         ->leftjoin('tbl_sub_products','tbl_sub_products.id','=','tbl_product_items.sub_product_id')
    //         ->where(['tbl_product_items.expire_status' => 1])
    //         ->groupBy('tbl_imgs.upload_id')
    //         ->paginate($serchpage);

    //         $products = DB::table('tbl_product_items')
    //         ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
    //                     users.id,
    //                     users.phone,
    //                     users.product_duration as PDurations,
    //                     tbl_product_items.id as ProductItem_id,
    //                     tbl_product_items.user_id as userid,
    //                     tbl_product_items.currency,
    //                     tbl_product_items.post_date_of_item,
    //                     tbl_product_items.category_id,
    //                     tbl_product_items.sub_category_id,
    //                     tbl_product_items.article_id,
    //                     tbl_product_items.product_id,
    //                     tbl_product_items.sub_product_id,
    //                     tbl_product_items.item_name,
    //                     tbl_product_items.product_type,
    //                     tbl_product_items.brand_name,
    //                     tbl_product_items.brand_id,
    //                     tbl_product_items.pieces,
    //                     tbl_product_items.price,
    //                     tbl_product_items.old_price,
    //                     tbl_product_items.color_id,
    //                     tbl_product_items.sub_color_id,
    //                     tbl_product_items.price_range_start,
    //                     tbl_product_items.price_range_end,
    //                     tbl_product_items.product_color,
    //                     tbl_product_items.place_of_origin,
    //                     tbl_product_items.city,
    //                     tbl_product_items.state_id,
    //                     tbl_product_items.item_descriptions,
    //                     tbl_product_items.item_images,
    //                     tbl_product_items.supplier_name,
    //                     tbl_product_items.supplier_region,
    //                     tbl_product_items.type,
    //                     tbl_product_items.post_expiry_date,
    //                     tbl_product_items.post_delete_date,
    //                     tbl_product_items.post_date_count,
    //                     tbl_product_items.post_expiry_count,
    //                     tbl_product_items.post_delete_count,
    //                     tbl_product_items.expire_status,
    //                     tbl_product_items.ad_type,
    //                     tbl_product_items.views,
    //                     tbl_product_items.shipping,
    //                     tbl_product_items.shipping_price,
    //                     tbl_product_items.price_id,
    //                     tbl_product_items.rate,
    //                     tbl_product_items.total_rate,
    //                     tbl_product_items.hits,
    //                     tbl_product_items.payment,
    //                     tbl_product_items.weight,
    //                     tbl_product_items.volume,
    //                     tbl_product_items.delivery,
    //                     tbl_product_items.day_return,
    //                     tbl_product_items.negotiable,
    //                     tbl_product_items.category,
    //                     tbl_product_items.product_web_name,
    //                     tbl_product_items.product_web_link,
    //                     tbl_product_items.disponibility,
    //                     tbl_product_items.created_at,
    //                     tbl_product_items.remainingdays_status,
    //                     tbl_product_items.expireddate_remain,
    //                     tbl_images.id as ImageIDS,
    //                     tbl_imgs.image_name as Images,
    //                     users.product_duration,
    //                     tbl_imgs.image_name,
    //                     tbl_images.product_item

    //                 ')
    //         ->leftjoin('users','users.id','=','tbl_product_items.user_id')
    //         ->leftjoin('tbl_images','tbl_images.product_item','=','tbl_product_items.id')
    //         ->leftjoin('tbl_imgs','tbl_imgs.upload_id','=','tbl_images.id')
    //         ->whereIn('tbl_product_items.expire_status', [1])
    //         ->groupBy('tbl_imgs.upload_id')
    //         ->orderBy('tbl_product_items.id', 'desc')
    //         ->get();

    //          $getbusinessdata = DB::table('users')
    //          ->select(
    //              'users.id',
    //              'tbl_mping_businesses.user_id',
    //              'tbl_mping_businesses.id as business_id',
    //              'tbl_mping_businesses.email',
    //              'tbl_mping_businesses.register_date',
    //              'tbl_mping_businesses.business_name',
    //              'tbl_mping_businesses.business_motto',
    //              'tbl_mping_businesses.business_logo',
    //              'tbl_mping_businesses.business_type',
    //              'tbl_mping_businesses.dealers_in',
    //              'tbl_mping_businesses.department',
    //              'tbl_mping_businesses.job_title',
    //              'tbl_mping_businesses.i_am_a',
    //              'tbl_mping_businesses.fax',
    //              'tbl_mping_businesses.po_box',
    //              'tbl_mping_businesses.website',
    //              'tbl_mping_businesses.address',
    //              'tbl_mping_businesses.shipping',
    //              'tbl_mping_businesses.notification',
    //              'tbl_mping_businesses.banner_color',
    //              'tbl_mping_businesses.banner_title_color',
    //              'tbl_mping_businesses.country_id',
    //              'tbl_mping_businesses.state_id',
    //              'tbl_mping_businesses.city_id',
    //              'tbl_mping_businesses.shop_status',
    //              'tbl_mping_businesses.description',
    //              'tbl_mping_businesses.views',
    //              'tbl_mping_businesses.type',
    //              'tbl_mping_businesses.business_icon',
    //          )

    //          ->leftjoin('tbl_mping_businesses','tbl_mping_businesses.user_id','=','users.id')
    //          ->where('users.id', $user)
    //          ->get();

    //          $countProductItems = DB::table('users')
    //          ->selectRaw('count(tbl_product_items.user_id) as cnt')
    //          ->leftjoin('tbl_product_items','tbl_product_items.user_id','=','users.id')
    //          ->where(['users.id' =>$user, 'expire_status'=>'1'])
    //          ->groupBy('tbl_product_items.user_id')
    //          ->get();


    //          $countProductItems1 = DB::table('users')
    //          ->selectRaw('count(tbl_product_items.user_id) as cnt')
    //          ->leftjoin('tbl_product_items','tbl_product_items.user_id','=','users.id')
    //          ->where(['users.id' =>$user, 'expire_status'=>'0'])
    //          ->groupBy('tbl_product_items.user_id')
    //          ->get();

    //         $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
    //         $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
    //         $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
    //         $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

    //         $ProductTypeGroupCount = DB::table('tbl_product_items')
    //         ->select('tbl_product_items.product_type',
    //                   'tbl_product_items.id',
    //                   'tbl_product_items.slug',
    //                    DB::raw('count(product_type) as total_productType')
    //                   )
    //         ->groupBy('product_type')
    //         ->where(['expire_status'=>'1'])
    //         ->get();

    //     $fetchallCategories = Tbl_category::all();

    //         return view('mainindex.paginate_allproducts',['countries' => $countries], compact('products', 'fetchallCategories', 'ProductTypeGroupCount', 'getimagex','categoryids','loginbuyerids','industriesids','servicesids','getuser','getbusinessdata','countProductItems','countProductItems1'))->render();
    //     }


    public function SearchaPerpageProducts(Request $request)
    {

        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $notyou = User::where('id', '!=', $user)->get();
        $countries = Country::all();

        $serchpage = $request->pages;
        $getimagex = DB::table('tbl_product_items')
            ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
                            tbl_images.id,
                            tbl_images.id as ImageIDS,
                            tbl_imgs.image_name as Images,
                            tbl_imgs.upload_id,
                            users.product_duration as PDurations,
                            tbl_product_items.id as ProductItem_id,
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
                            tbl_images.product_item,
                            users.phone,
                            users.id as userids

                        ')
            ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->groupBy('tbl_imgs.upload_id')
            ->paginate($serchpage);

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

        return view('mainindex.paginate_allproducts', ['countries' => $countries], compact('getimagex', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();
    }


    function ajax_paginate_allProducts(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            dd($query);

            if ($query == '') {//if search is empty back to this below

                $serchpage = $request->pages;
                $getimagex = DB::table('tbl_product_items')
                    ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
                            tbl_images.id,
                            tbl_images.id as ImageIDS,
                            tbl_imgs.image_name as Images,
                            tbl_imgs.upload_id,
                            users.product_duration as PDurations,
                            tbl_product_items.id as ProductItem_id,
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
                            tbl_images.product_item,
                            users.phone,
                            users.id as userids

                        ')
                    ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
                    ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
                    ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
                    ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
                    ->where(['tbl_product_items.expire_status' => 1])
                    ->groupBy('tbl_imgs.upload_id')
                    ->paginate();

                //    $products = Product::latest()->paginate(24);
                $countries = Country::all();
                $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
                $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
                $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
                $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

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

                $ProductTypeGroupCount = DB::table('tbl_product_items')
                    ->select(
                        'tbl_product_items.product_type',
                        'tbl_product_items.id',
                        'tbl_product_items.slug',
                        DB::raw('count(product_type) as total_productType')
                    )
                    ->groupBy('product_type')
                    ->where(['expire_status' => '1'])
                    ->get();

                $fetchallCategories = Tbl_category::all();


                return view('mainindex.products', ['countries' => $countries], compact('getimagex', 'ProductTypeGroupCount', 'fetchallCategories', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();
                return view('mainindex.paginate_allproducts', ['countries' => $countries], compact('getimagex', 'ProductTypeGroupCount', 'fetchallCategories', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

            }
            if ($query != '') {
                $users = Auth::user()->id ?? 'session expired';

                $data = DB::table('tbl_product_items')
                    ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
                                       tbl_images.id,
                                       tbl_images.id as ImageIDS,
                                       tbl_imgs.image_name as Images,
                                       tbl_imgs.upload_id,
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
                                       tbl_images.product_item,
                                       users.phone,
                                       users.id as userid

                                   ')
                    ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
                    ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
                    ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
                    ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
                    ->where('tbl_product_items.item_name', 'like', '%' . $query . '%')
                    ->orWhere('tbl_product_items.expire_status', 1)
                    ->groupBy('tbl_imgs.upload_id')
                    ->get();

            } else {

                $data = DB::table('tbl_product_items')
                    ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
                                    tbl_images.id,
                                    tbl_images.id as ImageIDS,
                                    tbl_imgs.image_name as Images,
                                    tbl_imgs.upload_id,
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
                                    tbl_images.product_item,
                                    users.phone,
                                    users.id as userid

                                ')
                    ->leftjoin('users', 'users.id', '=', 'tbl_product_items.user_id')
                    ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
                    ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
                    ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
                    ->where('tbl_product_items.item_name', 'like', '%' . $query . '%')
                    ->orWhere('tbl_product_items.expire_status', 1)
                    ->groupBy('tbl_imgs.upload_id')
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
                    if (!Auth::check()) {
                        $checklogin = '<a href="' . route('login') . '" id="removeunderline">
                                 <i class="fa fa-gift"></i> Order Now!
                                 </a>';
                    } else {
                        $checklogin = '<a href="javascript:void(0)" id="removeunderline">
                                  <i class="fa fa-gift"></i> Order Now!
                                  </a>';
                    }
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
                                                         ' . $checklogin . '<br><br>

                                                     <a href="#" id="removeunderline">
                                                     <i class="fa fa-tag"></i> Product&nbsp;Details
                                                    </a>
                                                         <br><br>
                                                         <a href="#" id="removeunderline">
                                                             <i class="fa fa-shopping-cart"></i> See
                                                             Store&nbsp;&nbsp;&nbsp;&nbsp;
                                                         </a><br><br>
                                                         <a href="#" id="removeunderline">
                                                             <i class="fa fa-phone"></i>
                                                             <span class="hide-phone-number">' . Str::limit($row->phone, 4, '') . '</span>
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


    //end all products details


    //   search Products
    public function searchProducts(Request $request)
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

    // end  search Products


    //new products details

    public function NewProducts(Request $request, $NewProducts)
    {


        $serchpage = $request->pages;

        $countries = Country::all();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->selectRaw('tbl_product_items.product_type,
                         tbl_product_items.expire_status,
                         tbl_images.id as IDs,
                         tbl_product_items.slug,
                         tbl_product_items.id,
                          tbl_product_items.sub_product_id,
                         count(tbl_product_items.product_type) as total_productType',
            )
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
            ->groupBy('tbl_product_items.sub_product_id')
            ->where(['tbl_product_items.expire_status' => 1, 'tbl_product_items.type' => 'New'])
            ->get();



        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();

        $fetchcoutrieswithcount = DB::table('countries')
            ->select('*')
            ->get();


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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->get();

        $fetchallCategories = Tbl_category::all();

        $ProductTypeGroupCount1 = DB::table('tbl_product_items')
            ->selectRaw('tbl_product_items.product_type,
                         tbl_product_items.expire_status,
                         tbl_images.id as IDs,
                         tbl_product_items.slug,
                         tbl_product_items.id,
                          tbl_product_items.sub_product_id,
                         count(tbl_product_items.product_type) as total_productType',
            )
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
            ->groupBy('tbl_product_items.sub_product_id')
            ->where(['tbl_product_items.expire_status' => 1])
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


        // $ProductTypeGroupCount = DB::table('tbl_product_items')
        // ->select('tbl_product_items.product_type',
        //           'tbl_product_items.id',
        //           'tbl_product_items.slug',
        //            DB::raw('count(product_type) as total_productType'),
        //           )
        // ->groupBy('product_type')
        // ->where(['expire_status'=>'1'])
        // ->get();


        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        ///////////////////////////////////////////////category////////////////////////////////
        // $fetchallservices = tbl_service_items::where('expire_status', 1)->get();


        $Subproductitems = DB::table('tbl_sub_products')
            ->select(
                'tbl_sub_products.id as subproduct_id',
                'tbl_sub_products.sub_product_name_en',
                'tbl_sub_products.sub_product_name_fr',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(tbl_product_items.sub_product_id) as total_productType'),
            )
            ->leftjoin('tbl_product_items', 'tbl_product_items.sub_product_id', '=', 'tbl_sub_products.id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->groupBy('tbl_product_items.sub_product_id')
            ->get();

        $Subservicesitems = DB::table('tbl_sub_services')
            ->select(
                'tbl_sub_services.id as subservice_id',
                'tbl_sub_services.sub_service_name',
                'tbl_sub_services.sub_service_name_fr',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_subservice'),
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_services.id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_services.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->get();

        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.sub_industry_name_fr',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.industry_name_fr',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            // ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            // ->orderBy('tbl_job_items.id', 'DESC')
            ->get();

        return view(
            'mainindex.new_products',
            [
                'countallproducts_' => $countallproducts_,
                'countallservice_items_' => $countallservice_items_,
                'countallindustry_items_' => $countallindustry_items_,
                'joinservices' => $joinservices,
                'fetchsubIndustry' => $fetchsubIndustry,
                // 'ProductTypeGroupCountall' =>$ProductTypeGroupCountall,
                'countries' => $countries

            ],
            compact('Subproductitems', 'Subservicesitems', 'fetchjobs', 'countalljobs_', 'ProductTypeGroupCount1', 'fetchallCategories', 'products', 'ProductTypeGroupCount', 'countallproducts_', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids')
        )->render();
    }

    //end new products details

    //used products details
    public function UsedProducts(Request $request, $UsedProducts)
    {


        $serchpage = $request->pages;

        $countries = Country::all();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->selectRaw('tbl_product_items.product_type,
                         tbl_product_items.expire_status,
                         tbl_images.id as IDs,
                         tbl_product_items.slug,
                         tbl_product_items.id,
                          tbl_product_items.sub_product_id,
                         count(tbl_product_items.product_type) as total_productType',
            )
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
            ->groupBy('tbl_product_items.sub_product_id')
            ->where(['tbl_product_items.expire_status' => 1, 'tbl_product_items.type' => 'Used'])
            ->get();



        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();

        $fetchcoutrieswithcount = DB::table('countries')
            ->select('*')
            ->get();


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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->get();

        // $fetchallCategories = Tbl_category::all();

        $ProductTypeGroupCount1 = DB::table('tbl_product_items')
            ->selectRaw('tbl_product_items.product_type,
                         tbl_product_items.expire_status,
                         tbl_images.id as IDs,
                         tbl_product_items.slug,
                         tbl_product_items.id,
                          tbl_product_items.sub_product_id,
                         count(tbl_product_items.product_type) as total_productType',
            )
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
            ->groupBy('tbl_product_items.sub_product_id')
            ->where(['tbl_product_items.expire_status' => 1])
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


        // $ProductTypeGroupCount = DB::table('tbl_product_items')
        // ->select('tbl_product_items.product_type',
        //           'tbl_product_items.id',
        //           'tbl_product_items.slug',
        //            DB::raw('count(product_type) as total_productType'),
        //           )
        // ->groupBy('product_type')
        // ->where(['expire_status'=>'1'])
        // ->get();


        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        ///////////////////////////////////////////////category////////////////////////////////
        $fetchallCategories = Tbl_category::all();
        // $fetchallservices = tbl_service_items::where('expire_status', 1)->get();


        $Subproductitems = DB::table('tbl_sub_products')
            ->select(
                'tbl_sub_products.id as subproduct_id',
                'tbl_sub_products.sub_product_name_en',
                'tbl_sub_products.sub_product_name_fr',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(tbl_product_items.sub_product_id) as total_productType'),
            )
            ->leftjoin('tbl_product_items', 'tbl_product_items.sub_product_id', '=', 'tbl_sub_products.id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->groupBy('tbl_product_items.sub_product_id')
            ->get();

        $Subservicesitems = DB::table('tbl_sub_services')
            ->select(
                'tbl_sub_services.id as subservice_id',
                'tbl_sub_services.sub_service_name',
                'tbl_sub_services.sub_service_name_fr',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_subservice'),
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_services.id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_services.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->get();

        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.sub_industry_name_fr',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.industry_name_fr',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            // ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            // ->orderBy('tbl_job_items.id', 'DESC')
            ->get();


        return view(
            'mainindex.used_products',
            [
                'countallproducts_' => $countallproducts_,
                'countallservice_items_' => $countallservice_items_,
                'countallindustry_items_' => $countallindustry_items_,
                'joinservices' => $joinservices,
                'fetchsubIndustry' => $fetchsubIndustry,
                'ProductTypeGroupCount' => $ProductTypeGroupCount,
                'countries' => $countries
            ],
            compact('countryGroupCount', 'Subproductitems', 'Subservicesitems', 'fetchjobs', 'countalljobs_', 'ProductTypeGroupCount1', 'fetchallCategories', 'products', 'ProductTypeGroupCount', 'countallproducts_', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids')
        )->render();
    }
    //end used products details

    //refurbished products details

    public function RefurbishedProducts(Request $request, $RefurbishedProducts)
    {


        $serchpage = $request->pages;

        $countries = Country::all();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->selectRaw('tbl_product_items.product_type,
                         tbl_product_items.expire_status,
                         tbl_images.id as IDs,
                         tbl_product_items.slug,
                         tbl_product_items.id,
                          tbl_product_items.sub_product_id,
                         count(tbl_product_items.product_type) as total_productType',
            )
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
            ->groupBy('tbl_product_items.sub_product_id')
            ->where(['tbl_product_items.expire_status' => 1, 'tbl_product_items.type' => 'Refurbished'])
            ->get();



        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();

        $fetchcoutrieswithcount = DB::table('countries')
            ->select('*')
            ->get();


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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->get();

        // $fetchallCategories = Tbl_category::all();

        $ProductTypeGroupCount1 = DB::table('tbl_product_items')
            ->selectRaw('tbl_product_items.product_type,
                         tbl_product_items.expire_status,
                         tbl_images.id as IDs,
                         tbl_product_items.slug,
                         tbl_product_items.id,
                          tbl_product_items.sub_product_id,
                         count(tbl_product_items.product_type) as total_productType',
            )
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
            ->groupBy('tbl_product_items.sub_product_id')
            ->where(['tbl_product_items.expire_status' => 1])
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


        // $ProductTypeGroupCount = DB::table('tbl_product_items')
        // ->select('tbl_product_items.product_type',
        //           'tbl_product_items.id',
        //           'tbl_product_items.slug',
        //            DB::raw('count(product_type) as total_productType'),
        //           )
        // ->groupBy('product_type')
        // ->where(['expire_status'=>'1'])
        // ->get();


        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        ///////////////////////////////////////////////category////////////////////////////////
        $fetchallCategories = Tbl_category::all();
        // $fetchallservices = tbl_service_items::where('expire_status', 1)->get();


        $Subproductitems = DB::table('tbl_sub_products')
            ->select(
                'tbl_sub_products.id as subproduct_id',
                'tbl_sub_products.sub_product_name_en',
                'tbl_sub_products.sub_product_name_fr',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(tbl_product_items.sub_product_id) as total_productType'),
            )
            ->leftjoin('tbl_product_items', 'tbl_product_items.sub_product_id', '=', 'tbl_sub_products.id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->groupBy('tbl_product_items.sub_product_id')
            ->get();

        $Subservicesitems = DB::table('tbl_sub_services')
            ->select(
                'tbl_sub_services.id as subservice_id',
                'tbl_sub_services.sub_service_name',
                'tbl_sub_services.sub_service_name_fr',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_subservice'),
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_services.id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_services.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->get();

        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.sub_industry_name_fr',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.industry_name_fr',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            // ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            // ->orderBy('tbl_job_items.id', 'DESC')
            ->get();

        return view(
            'mainindex.refurbished_products',
            [
                'countallproducts_' => $countallproducts_,
                'countallservice_items_' => $countallservice_items_,
                'countallindustry_items_' => $countallindustry_items_,
                'joinservices' => $joinservices,
                'fetchsubIndustry' => $fetchsubIndustry,
                'countries' => $countries
            ],
            compact('countryGroupCount', 'Subproductitems', 'Subservicesitems', 'fetchjobs', 'countalljobs_', 'ProductTypeGroupCount1', 'fetchallCategories', 'products', 'ProductTypeGroupCount', 'countallproducts_', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids')
        )->render();
    }
    //end refurbished products details

    //Industries manufactures details
    public function Industriesmanufactures(Request $request)
    {

        $serchpage = $request->pages;
        // $products = Product::orderBy('id', 'ASC')->paginate(1);
        $countries = Country::all();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->latest()
            ->get();


        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();

        $fetchcoutrieswithcount = DB::table('countries')
            ->select('*')
            ->get();

        //$fetchallCategories = Tbl_category::all();

        $ProductTypeGroupCount1 = DB::table('tbl_product_items')
            ->selectRaw('tbl_product_items.product_type,
                                   tbl_product_items.expire_status,
                                   tbl_images.id as IDs,
                                   tbl_product_items.slug,
                                   tbl_product_items.id,
                                    tbl_product_items.sub_product_id,
                                   count(tbl_product_items.product_type) as total_productType',
            )
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
            ->groupBy('tbl_product_items.sub_product_id')
            ->where(['tbl_product_items.expire_status' => 1])
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


        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => '1'])
            ->get();


        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        ///////////////////////////////////////////////category////////////////////////////////
        $fetchallCategories = Tbl_category::all();
        // $fetchallservices = tbl_service_items::where('expire_status', 1)->get();


        $Subproductitems = DB::table('tbl_sub_products')
            ->select(
                'tbl_sub_products.id as subproduct_id',
                'tbl_sub_products.sub_product_name_en',
                'tbl_sub_products.sub_product_name_fr',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(tbl_product_items.sub_product_id) as total_productType'),
            )
            ->leftjoin('tbl_product_items', 'tbl_product_items.sub_product_id', '=', 'tbl_sub_products.id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->groupBy('tbl_product_items.sub_product_id')
            ->get();

        $Subservicesitems = DB::table('tbl_sub_services')
            ->select(
                'tbl_sub_services.id as subservice_id',
                'tbl_sub_services.sub_service_name',
                'tbl_sub_services.sub_service_name_fr',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_subservice'),
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_services.id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_services.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->get();

        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.sub_industry_name_fr',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.industry_name_fr',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            // ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            // ->orderBy('tbl_job_items.id', 'DESC')
            ->get();


        return view(
            'mainindex.industries_manufactures',
            [
                'countallproducts_' => $countallproducts_,
                'countallservice_items_' => $countallservice_items_,
                'countallindustry_items_' => $countallindustry_items_,
                'joinservices' => $joinservices,
                'ProductTypeGroupCount' => $ProductTypeGroupCount,
                'ProductTypeGroupCount1' => $ProductTypeGroupCount1,
                'fetchcoutrieswithcount' => $fetchcoutrieswithcount,
                'fetchallCategories' => $fetchallCategories,
                'countries' => $countries
            ],
            compact('countryGroupCount', 'Subproductitems', 'Subservicesitems', 'fetchjobs', 'countalljobs_', 'products', 'fetchsubIndustry', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids')
        )->render();
    }



    public function Industriesitemsservice(Request $request, $sub_industry_id)
    {
        //    dd(decrypt($request->sub_industry_id));
        $fetchallIndustry = DB::table('tbl_industry_items')
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
                'users.id as uuser_id',
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
                'tbl_industry_items.map_location_industry',
                'tbl_industry_items.created_at',
                'tbl_sub_industries.id',
                'tbl_mping_businesses.id',
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
            ->leftjoin('users', 'users.id', '=', 'tbl_industry_items.user_id')
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'tbl_industry_items.user_id')
            ->leftjoin('tbl_sub_industries', 'tbl_sub_industries.id', '=', 'tbl_industry_items.sub_industry_id')
            ->where(['tbl_industry_items.expire_status' => 1, 'tbl_industry_items.id' => decrypt($request->sub_industry_id)])
            ->orderBy('tbl_industry_items.id', 'DESC')
            ->limit(1)
            ->get();


        $userinfos = DB::table('users')
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
                'users.id as uuser_id',
                'countries.name as countryname',
                'countries.flag',
                'states.name as statename',
                'cities.name as cityname',
                'tbl_mping_businesses.id',
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
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
            ->where(['users.id' => decrypt($request->user_id)])

            ->get();


        $countries = Country::all();
        //$products = Product::where('id', decrypt($id))->paginate(24);
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services


        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->selectRaw('tbl_product_items.product_type,
                         tbl_product_items.expire_status,
                         tbl_images.id as IDs,
                         tbl_product_items.slug,
                         tbl_product_items.id,
                          tbl_product_items.sub_product_id,
                         count(tbl_product_items.product_type) as total_productType',
            )
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
            ->groupBy('tbl_product_items.sub_product_id')
            ->where(['tbl_product_items.expire_status' => 1, 'tbl_product_items.user_id' => decrypt($request->user_id)])
            ->get();

        $jobstable = DB::table('tbl_job_items')
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
            ->where(['tbl_job_items.user_id' => decrypt($request->user_id), 'tbl_job_items.expire_status' => 1])
            ->limit(1)
            ->get();

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
            ->where(['tbl_userlinks.user_id' => decrypt($request->user_id)])
            ->get();


        return view('mainindex.industries_items_service', ['countries' => $countries], compact('getuserlinks', 'jobstable', 'userinfos', 'ProductTypeGroupCount', 'fetchallIndustry', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();

    }

    //end Industries manufactures


    //Services nearby you details
    public function Servicesnearbyyou(Request $request)
    {

        $serchpage = $request->pages;
        // $products = Product::orderBy('id', 'ASC')->paginate(1);
        $countries = Country::all();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();

        $fetchcoutrieswithcount = DB::table('countries')
            ->select('*')
            ->get();

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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->latest()
            ->get();

        //  $fetchallCategories = Tbl_category::all();

        $ProductTypeGroupCount1 = DB::table('tbl_product_items')
            ->selectRaw('tbl_product_items.product_type,
                                   tbl_product_items.expire_status,
                                   tbl_images.id as IDs,
                                   tbl_product_items.slug,
                                   tbl_product_items.id,
                                    tbl_product_items.sub_product_id,
                                   count(tbl_product_items.product_type) as total_productType',
            )
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
            ->groupBy('tbl_product_items.sub_product_id')
            ->where(['tbl_product_items.expire_status' => 1])
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


        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => '1'])
            ->get();


        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        ///////////////////////////////////////////////category////////////////////////////////
        $fetchallCategories = Tbl_category::all();
        // $fetchallservices = tbl_service_items::where('expire_status', 1)->get();


        $Subproductitems = DB::table('tbl_sub_products')
            ->select(
                'tbl_sub_products.id as subproduct_id',
                'tbl_sub_products.sub_product_name_en',
                'tbl_sub_products.sub_product_name_fr',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(tbl_product_items.sub_product_id) as total_productType'),
            )
            ->leftjoin('tbl_product_items', 'tbl_product_items.sub_product_id', '=', 'tbl_sub_products.id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->groupBy('tbl_product_items.sub_product_id')
            ->get();

        $Subservicesitems = DB::table('tbl_sub_services')
            ->select(
                'tbl_sub_services.id as subservice_id',
                'tbl_sub_services.sub_service_name',
                'tbl_sub_services.sub_service_name_fr',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_subservice'),
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_services.id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_services.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->get();

        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.sub_industry_name_fr',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.industry_name_fr',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            // ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            // ->orderBy('tbl_job_items.id', 'DESC')
            ->get();

        return view(
            'mainindex.services_nearbyyou',
            [
                'countallproducts_' => $countallproducts_,
                'countallservice_items_' => $countallservice_items_,
                'countallindustry_items_' => $countallindustry_items_,
                'joinservices' => $joinservices,
                'ProductTypeGroupCount' => $ProductTypeGroupCount,
                'ProductTypeGroupCount1' => $ProductTypeGroupCount1,
                'fetchcoutrieswithcount' => $fetchcoutrieswithcount,
                'fetchallCategories' => $fetchallCategories,
                'countries' => $countries
            ],
            compact('Subproductitems', 'Subservicesitems', 'fetchjobs', 'countalljobs_', 'products', 'fetchsubIndustry', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids')
        )->render();
    }


    public function ServicesitemsserviceGuest(Request $request, $serviceitem_id)
    {
        $fetchallServices = DB::table('tbl_service_items')
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
                'users.id as uuser_id',
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
                'tbl_service_items.map_location',
                'tbl_service_items.created_at'
            )
            ->leftjoin('users', 'users.id', '=', 'tbl_service_items.user_id')
            ->leftjoin('tbl_sub_service_threes', 'tbl_sub_service_threes.sub_service_id', '=', 'tbl_service_items.sub_service_id')
            ->where(['tbl_service_items.expire_status' => 1, 'tbl_service_items.id' => decrypt($request->serviceitem_id)])
            ->orderBy('tbl_service_items.id', 'DESC')
            ->limit(1)
            ->get();

        foreach ($fetchallServices as $u) {
            $userinfos = DB::table('users')
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
                    'users.id as uuser_id',
                    'countries.name as countryname',
                    'countries.flag',
                    'states.name as statename',
                    'cities.name as cityname',
                    'tbl_mping_businesses.id',
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
                ->leftjoin('countries', 'countries.id', '=', 'users.country')
                ->leftjoin('states', 'states.id', '=', 'users.country_id')
                ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
                ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'users.id')
                ->where(['users.id' => $u->user_id])
                ->get();

            $ProductTypeGroupCount = DB::table('tbl_product_items')
                ->selectRaw('tbl_product_items.product_type,
                     tbl_product_items.expire_status,
                     tbl_images.id as IDs,
                     tbl_product_items.slug,
                     tbl_product_items.id,
                      tbl_product_items.sub_product_id,
                     count(tbl_product_items.product_type) as total_productType',
                )
                ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
                ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
                ->groupBy('tbl_product_items.sub_product_id')
                ->where(['tbl_product_items.expire_status' => 1, 'tbl_product_items.user_id' => $u->user_id])
                ->get();

        }

        $countries = Country::all();
        //$products = Product::where('id', decrypt($id))->paginate(24);
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
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
            ->where(['tbl_userlinks.user_id' => $u->user_id])
            ->get();


        return view('mainindex.service_items_business', ['countries' => $countries], compact('getuserlinks', 'userinfos', 'ProductTypeGroupCount', 'fetchallServices', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();

    }
    //end Services nearby you

    //Join for free details
    public function Joinforfreelogin(Request $request)
    {
        $serchpage = $request->pages;
        $products = Product::orderBy('id', 'ASC')->paginate(1);
        $countries = Country::all();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('mainindex.joinlogin', ['countries' => $countries], compact('products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids'))->render();
    }
    //end Join for free details


    //Available Jobs details
    public function Availablejobs(Request $request)
    {
        $serchpage = $request->pages;
        //$products = Product::orderBy('id', 'ASC')->paginate(1);
        $countries = Country::all();
        $ajobs = AvailableJob::orderBy('id', 'ASC')->paginate(100);
        ;

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->latest()
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


        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => '1'])
            ->get();

        // $ProductTypeGroupCount = DB::table('tbl_product_items')
        // ->selectRaw('tbl_product_items.product_type,
        //              tbl_product_items.expire_status,
        //              tbl_images.id as IDs,
        //              tbl_product_items.slug,
        //              tbl_product_items.id,
        //               tbl_product_items.sub_product_id,
        //              count(tbl_product_items.product_type) as total_productType',
        //           )
        // ->leftjoin('tbl_images','tbl_images.product_item','=','tbl_product_items.id')
        // ->leftjoin('tbl_sub_products','tbl_sub_products.id','=','tbl_product_items.sub_product_id')
        // ->groupBy('tbl_product_items.sub_product_id')
        // ->where(['tbl_product_items.expire_status'=> 1, 'tbl_product_items.user_id'=>$u->user_id])
        // ->get();



        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        ///////////////////////////////////////////////category////////////////////////////////
        $fetchallCategories = Tbl_category::all();
        // $fetchallservices = tbl_service_items::where('expire_status', 1)->get();


        $Subproductitems = DB::table('tbl_sub_products')
            ->select(
                'tbl_sub_products.id as subproduct_id',
                'tbl_sub_products.sub_product_name_en',
                'tbl_sub_products.sub_product_name_fr',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(tbl_product_items.sub_product_id) as total_productType'),
            )
            ->leftjoin('tbl_product_items', 'tbl_product_items.sub_product_id', '=', 'tbl_sub_products.id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->groupBy('tbl_product_items.sub_product_id')
            ->get();

        $Subservicesitems = DB::table('tbl_sub_services')
            ->select(
                'tbl_sub_services.id as subservice_id',
                'tbl_sub_services.sub_service_name',
                'tbl_sub_services.sub_service_name_fr',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_subservice'),
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_services.id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_services.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->get();

        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.sub_industry_name_fr',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.industry_name_fr',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            // ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            // ->orderBy('tbl_job_items.id', 'DESC')
            ->get();

        return view('mainindex.available_jobs', ['countries' => $countries], compact('countryGroupCount', 'ProductTypeGroupCount', 'joinservices', 'countalljobs_', 'countallproducts_', 'countallservice_items_', 'countallindustry_items_', 'fetchallCategories', 'Subproductitems', 'Subservicesitems', 'fetchsubIndustry', 'fetchjobs', 'ajobs', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids'))->render();
    }
    //end Available Jobs  details

    //Available Jobs paginate results
    public function ajax_paginate_Availablejobs(Request $request)
    {
        $serchpage = $request->pages;
        $products = Product::all();
        $countries = Country::all();
        $ajobs = AvailableJob::orderBy('id', 'ASC')->paginate(100);
        ;

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('mainindex.paginate_availablejobs', ['countries' => $countries], compact('ajobs', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids'))->render();
    }
    //end Available Jobs paginate results


    //per page Available Jobs

    public function GetPerPageAvailablejobs(Request $request)
    {
        $serchpage = $request->pages;
        $products = Product::all();
        $countries = Country::all();
        $ajobs = AvailableJob::orderBy('id', 'ASC')->paginate($serchpage);

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('mainindex.paginate_availablejobs', ['countries' => $countries], compact('ajobs', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids'))->render();
    }
    //end per page Available Jobs

    //Available Jobs search results
    function getSearchAJobs(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');

            if ($query == '') {//if search is empty back to this below

                $serchpage = $request->pages;
                $products = Product::all();
                $countries = Country::all();
                $ajobs = AvailableJob::orderBy('id', 'ASC')->paginate(100);
                ;

                $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
                $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
                $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
                $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

                return view('mainindex.available_jobs', ['countries' => $countries], compact('ajobs', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids'))->render();
                return view('mainindex.paginate_availablejobs', ['countries' => $countries], compact('ajobs', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids'))->render();


            }
            if ($query != '') {
                $data = DB::table('available_jobs')
                    ->where('job_name', 'like', '%' . $query . '%')
                    ->get();

            } else {
                $data = DB::table('available_jobs')
                    ->orderBy('job_name', 'desc')
                    ->get();
            }
            $total_row = $data->count();

            if ($total_row > 0) {
                $res = "";

                foreach ($data as $row) {
                    $res = '<div
                                class="col-md-3 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger" >
                                    <div class="mb-4 card" style="width: 300px;;">
                                        <div class="">
                                        <center>
                                        <div style="background-color:#3b3b3b;height:200px">
                                            <i class="mb-1 fa fa-cogs fa-6x IClass"></i>
                                            <h6 class="h6Css">' . Str::upper(Str::limit($row->job_name, 16)) . '</h6>
                                            </div>

                                            <p class="mt-2 PClass" data-bs-toggle="modal" data-bs-target="#mainlogin_Modal">
                                            <a href="#"  class="hrefCss3" data-bs-toggle="tooltip" data-bs-placement="top" title="' . Str::upper(Str::limit($row->job_name, 16)) . '">
                                                <i class="fa fa-cogs"></i>
                                                Apply Now!
                                            </a>
                                        </p>
                                        </center>
                                        </div>

                                </div>
                            </div>
                          ';
                    $output .= $res;
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

    //end Available Jobs search results

    //Available Job seekers details
    public function Availableajobs(Request $request)
    {
        $serchpage = $request->pages;
        $products = Product::orderBy('id', 'ASC')->paginate(1);
        $countries = Country::all();
        $ajobs = AvailableJob::orderBy('id', 'ASC')->paginate(100);
        ;

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('mainindex.ajob_seekers', ['countries' => $countries], compact('ajobs', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids'))->render();
    }
    //end Available Job seekers  details

    //Available Job seekers paginate results
    public function ajax_paginate_Availablejobseekers(Request $request)
    {
        $serchpage = $request->pages;
        $products = Product::all();
        $countries = Country::all();
        $ajobs = AvailableJob::orderBy('id', 'ASC')->paginate(100);
        ;

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('mainindex.paginate_availablejobseekers', ['countries' => $countries], compact('ajobs', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids'))->render();
    }
    //end Available Job seekers paginate results

    //per page Available Job seekers

    public function GetPerPageAvailablejobseekers(Request $request)
    {
        $serchpage = $request->pages;
        $products = Product::all();
        $countries = Country::all();
        $ajobs = AvailableJob::orderBy('id', 'ASC')->paginate($serchpage);

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('mainindex.paginate_availablejobseekers', ['countries' => $countries], compact('ajobs', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids'))->render();
    }
    //end per page Available Job seekers

    //Available Job seekers search results
    function getSearchAJobseekers(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');

            if ($query == '') {//if search is empty back to this below

                $serchpage = $request->pages;
                $products = Product::all();
                $countries = Country::all();
                $ajobs = AvailableJob::orderBy('id', 'ASC')->paginate(100);
                ;

                $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
                $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
                $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
                $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

                return view('mainindex.ajob_seekers', ['countries' => $countries], compact('ajobs', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids'))->render();
                return view('mainindex.paginate_availablejobseekers', ['countries' => $countries], compact('ajobs', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids'))->render();


            }
            if ($query != '') {
                $data = DB::table('available_jobs')
                    ->where('job_name', 'like', '%' . $query . '%')
                    ->get();

            } else {
                $data = DB::table('available_jobs')
                    ->orderBy('job_name', 'desc')
                    ->get();
            }
            $total_row = $data->count();

            if ($total_row > 0) {
                $res = "";

                foreach ($data as $row) {
                    $res = '<div
                                   class="col-md-3 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger" >
                                       <div class="mb-4 card" style="width: 300px;;">
                                           <div class="">
                                           <center>
                                           <div style="background-color:#3b3b3b;height:200px">
                                               <i class="mb-1 fa fa-user fa-6x IClass"></i>
                                               <h6 class="h6Css">' . Str::upper(Str::limit($row->job_name, 16)) . '</h6>
                                               </div>

                                               <p class="mt-2 PClass" data-bs-toggle="modal" data-bs-target="#mainlogin_Modal">
                                               <a href="#"  class="hrefCss3" data-bs-toggle="tooltip" data-bs-placement="top" title="' . Str::upper(Str::limit($row->job_name, 16)) . '">
                                                   <i class="fa fa-user"></i>
                                                   Apply Now!
                                               </a>
                                           </p>
                                           </center>
                                           </div>

                                   </div>
                               </div>
                             ';
                    $output .= $res;
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

    //end Available Job seekers search results

    //Page Not Found details
    public function PageNotFound(Request $request)
    {
        $serchpage = $request->pages;
        $products = Product::orderBy('id', 'ASC')->paginate(1);
        $countries = Country::all();
        $ajobs = AvailableJob::orderBy('id', 'ASC')->paginate(100);
        ;

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('mainindex.404_notfound', ['countries' => $countries], compact('ajobs', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids'))->render();
    }
    //end Page Not Found details

    //FAQ details
    public function Faq(Request $request)
    {
        $serchpage = $request->pages;
        $products = Product::orderBy('id', 'ASC')->paginate(1);
        $countries = Country::all();
        $ajobs = AvailableJob::orderBy('id', 'ASC')->paginate(100);
        ;

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('mainindex.faq', ['countries' => $countries], compact('ajobs', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids'))->render();
    }
    //end FAQ details

    //Contact Us details
    public function ContactUs(Request $request)
    {
        $serchpage = $request->pages;
        $products = Product::orderBy('id', 'ASC')->paginate(1);
        $countries = Country::all();
        $ajobs = AvailableJob::orderBy('id', 'ASC')->paginate(100);
        ;

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('mainindex.contact_us', ['countries' => $countries], compact('ajobs', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids'))->render();
    }
    //end Contact Us details

    ///////////////////////////////////about more website information/////////////////
    public function About()
    {
        return view('mainindex.about');
    }

    //Forgot Password details
    public function ForgotPassword(Request $request)
    {
        $serchpage = $request->pages;
        $products = Product::orderBy('id', 'ASC')->paginate(1);
        $countries = Country::all();
        $ajobs = AvailableJob::orderBy('id', 'ASC')->paginate(100);
        ;

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

        return view('mainindex.forgot_password', ['countries' => $countries], compact('ajobs', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids'))->render();
    }
    //end Forgot Password details

    //Forgot Password Send to email details

    public function SendToEmail(Request $request)
    {


        $user = User::where('email', '=', $request->input('email'))->first();

        if (!$user) {
            //false
            return Redirect::to('forgotpassword')->with('msg-notfound', 'No Email Address is found');
        } else {
            //true
            $this->validate($request, [
                'email' => 'required|email',
            ]);

            $code = md5(rand());
            User::where('email', $request->input('email'))
                ->update(['code' => $code]);

            $data = array(
                'email' => $request->input('email'),
                'code' => $code,

            );

            Mail::to('toledojonel557@gmail.com')->send(new GmailRecoverPassword($data));
            return back()->with('success', 'Success sent to your Gmail!!');
        }
    }
    //end Forgot Password Send to email details

    public function updatepass()
    {
        return view('update-password');
    }

    // update Password  details
    public function newpass(Request $request, $code)
    {


        $this->validate($request, [
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|same:password'


        ], [
            'password.required' => 'Please input Password atleast 8 characters long.',
            'password_confirmation.required' => 'Please Confirm Password.',


        ]);

        DB::table('users')
            ->where('code', $code)
            ->update([
                'password' => Hash::make($request->input('password')),
                'code' => NULL,
            ]);
        return Redirect::to('login')->with('msg-changepass', 'Password Updated Successfully');

    }
    //end update Password  details

    /////////////////////////////////login with google/////////////////////////////
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            // dd($user);
        } catch (\Exception $e) {
            dd($e->getMessage());
            //    return redirect('/login')->with('error','Try after some time');
        }
        $existingUser = User::where('google_id', $user->id)->first();

        /** Your code */
    }

    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    //    public function handleGoogleCallback()
    //    {
    //        try {

    //          $user = Socialite::driver('google')->stateless()->user();

    //            $finduser = User::where('google_id', $user->id)->first();

    //            if($finduser){

    //                Auth::guard('customer')->login($newUser);

    //                return redirect()->intended('dashboard');

    //            }else{
    //                $newUser = User::updateOrCreate(['email' => $user->email],[

    //                        'google_id'=> $user->id,
    //                        'password' => encrypt('12345678')
    //                    ]);

    //                Auth::login($newUser);

    //                return redirect()->intended('dashboard');
    //            }

    //        } catch (Exception $e) {
    //            dd($e->getMessage());
    //        }
    //    }

    public function LoginGuestIndex(Request $request)
    {

        // dd($request->email, $request->password);

        $credentials = Validator::make($request->all(), [

            'email' => 'required|email',
            'password' => 'required',
            'status' => 'active'

        ], [
            'email.required' => 'Required email',
            'password.required' => 'Required password',

        ]);



        if ($credentials->fails()) {
            return response()->json(['errors' => $credentials->errors()]);
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            User::where('id', Auth::id())->update(['islogged' => 'Online']);
            return response()->json([
                'status' => 200,
            ]);
        } else {
            return response()->json(['errorlogin' => 400]);
        }

    }


    public function LoginGuest(Request $request)
    {

        // dd($request->email, $request->password);

        $credentials = Validator::make($request->all(), [

            'email' => 'required|email',
            'password' => 'required',
            'status' => 'active'

        ], [
            'email.required' => 'Required email',
            'password.required' => 'Required password',

        ]);



        if ($credentials->fails()) {
            return response()->json(['errors' => $credentials->errors()]);
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            User::where('id', Auth::id())->update(['islogged' => 'Online']);
            return response()->json([
                'status' => 200,
            ]);
        } else {
            return response()->json(['errorlogin' => 400]);
        }

    }


    //view all countries
    public function ViewAllCountries(Request $request)
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

        return view('mainindex.viewallcountries', ['countries' => $countries], compact('countryGroupCount', 'fetchcoutrieswithcount', 'countallcountries', 'ajobs', 'products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids'))->render();
    }

    //   search country
    public function searchCountry(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('countries')
                ->select(
                    'tbl_product_items.place_of_origin',
                    'countries.flag',
                    'countries.name',
                    'countries.id as country_id',
                    'tbl_product_items.expire_status',
                    DB::raw('count(tbl_product_items.place_of_origin) as total_countries'),

                )
                ->leftjoin('tbl_product_items', 'tbl_product_items.place_of_origin', '=', 'countries.id')
                ->where(
                    [
                        ['countries.name', 'LIKE', $request->country . '%'],
                        // ['tbl_product_items.expire_status',1]
                    ]

                )
                ->groupBy('countries.id')
                ->get();
            $output = '';
            if (count($data) > 0) {
                $output = '<div class="row g-2" id="hideid">';
                foreach ($data as $row) {
                    $counts = Tbl_products_item::where(['place_of_origin' => $row->place_of_origin, 'expire_status' => 1])->count();
                    $res = 0;
                    if ($row->total_countries != 0) {
                        $res = '<a href="' . route('viewcountryproducts', ['country_id' => encrypt($row->country_id)]) . '" class="hrefCss"><span style="color:#ff7519;;font: 10pt/130% Helvetica, Arial, sans-serif;">(' . $counts . ')</span></a>';
                    } else {
                        $res = '<span style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>';
                    }


                    $output .= '<div class="mb-2 col-md-3 col-6">
                                    <a href="' . route('viewcountryproducts', ['country_id' => encrypt($row->country_id)]) . '" class="hrefCss">
                                        <img
                                            src="' . url('assets/flags/' . $row->flag) . '" alt=""
                                            width="30" height="20" class="img_icons_2">&nbsp;' . Str::limit($row->name, 8) . '&nbsp;
                                            <span class="badge rounded-pill bg-light text-dark">' . $res . '</span>
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

    //============================== view country products===========================


    public function ViewCountryProducts(Request $request)
    {
        // dd(decrypt($request->country_id));
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        // $notyou =  User::where('id', '!=', $user)->get();
        $countries = Country::all();
        $fetchallCategories = Tbl_category::all();


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


        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => 1])
            ->get();

        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            ->orderBy('tbl_job_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();

        return view('mainindex.viewcountryproduct', ['countries' => $countries], compact('fetchallCategories', 'countallindustry_items_', 'countallservice_items_', 'countallproducts_', 'countalljobs_', 'fetchjobs', 'joinservices', 'fetchsubIndustry', 'ProductTypeGroupCount', 'getflag', 'countallcountries', 'products', 'loginBuyerIds', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }


    public function ViewCountryProducts2(Request $request, $id)
    {
        //  dd(decrypt($request->country_id), decrypt($request->id));
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        // $notyou =  User::where('id', '!=', $user)->get();
        $countries = Country::all();
        $fetchallCategories = Tbl_category::all();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->id))
            ->get();

        $fetchallSubCategories = DB::table('tbl_sub_categories')
            ->where('category_id', decrypt($request->id))
            // ->orderBy('sub_category_name_en', 'DESC')
            ->get();


        $fetchallarticle = DB::table('tbl_articles')
            ->select('*')
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
            // ->where('users.id', $authuser)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            // ->where(['users.id' =>$authuser, 'expire_status'=>'1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            // ->where(['users.id' =>$authuser, 'expire_status'=>'0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $allcountsql = DB::table('tbl_product_items')
            ->select('sub_category_id', 'category_id', DB::raw('COUNT(article_id) AS article_countall, article_id'))
            ->where('expire_status', 1)
            ->groupBy('sub_category_id')
            ->get();

        $allcountarticle = DB::table('tbl_product_items')
            ->select(
                'sub_category_id',
                'category_id',
                'expire_status',
                'article_id',
                'product_type',
                DB::raw('COUNT(article_id) AS articlesub_count, article_id')
            )
            ->where('expire_status', 1)
            ->groupBy('article_id')
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


        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => 1])
            ->get();

        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            ->orderBy('tbl_job_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();

        return view('mainindex.viewcountryproduct', ['countries' => $countries], compact('allcountarticle', 'allcountsql', 'countProductItems1', 'countProductItems', 'getbusinessdata', 'fetchallSubProductID', 'fetchallProductID', 'fetchallSubCategories', 'CategoriesID', 'fetchallCategories', 'fetchallCategories', 'countallindustry_items_', 'countallservice_items_', 'countallproducts_', 'countalljobs_', 'fetchjobs', 'joinservices', 'fetchsubIndustry', 'ProductTypeGroupCount', 'getflag', 'countallcountries', 'products', 'loginBuyerIds', 'loginbuyerids', 'industriesids', 'servicesids', 'categoryids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }


    public function GetPerPageCountryproduct(Request $request)
    {
        $countries = Country::all();
        $user = Auth::user()->id ?? 'session expired';
        $getuser = User::where('id', $user)->get();
        $countries = Country::all();

        $serchpage = $request->pages;
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
            ->paginate($serchpage);

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

        return view('mainindex.paginatecountyproduct_records', ['countries' => $countries], compact('products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();
    }


    public function ajax_paginateCountryproduct(Request $request)
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
            // ->where('tbl_product_items.place_of_origin', decrypt($request->country_id))
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->paginate();


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

        return view('mainindex.paginatecountyproduct_records', ['countries' => $countries], compact('products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();
    }


    function getSearchCountryproduct(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');

            if ($query == '') {//if search is empty back to this below

                $serchpage = $request->pages;
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
                    ->paginate();
                //    $products = Product::latest()->paginate(24);
                $countries = Country::all();
                $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
                $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
                $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
                $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

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


                return view('mainindex.viewcountryproduct', ['countries' => $countries], compact('products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();
                return view('mainindex.paginatecountyproduct_records', ['countries' => $countries], compact('products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

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
                    //    ->where('tbl_product_items.place_of_origin', decrypt($request->country_id))
                    ->orWhere('tbl_product_items.item_name', 'like', '%' . $query . '%')
                    ->whereIn('tbl_product_items.expire_status', [1])
                    ->groupBy('tbl_imgs.upload_id')
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
                    // ->where('tbl_product_items.place_of_origin', decrypt($request->country_id))
                    ->whereIn('tbl_product_items.expire_status', [1])
                    ->groupBy('tbl_imgs.upload_id')
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
                    if (!Auth::check()) {
                        $checklogin = '<a href="' . route('login') . '" id="removeunderline">
                                 <i class="fa fa-gift"></i> Order Now!
                                 </a>';
                    } else {
                        $checklogin = '<a href="javascript:void(0)" id="removeunderline">
                                  <i class="fa fa-gift"></i> Order Now!
                                  </a>';
                    }
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
                                                         ' . $checklogin . '<br><br>

                                                     <a href="' . route('guest.viewdetailsitem', ['upload_id' => encrypt($row->ImageIDS), 'product_id' => encrypt($row->ProductItem_id), 'product_type' => $row->product_type]) . '" id="removeunderline">
                                                     <i class="fa fa-tag"></i> Product&nbsp;Details
                                                    </a>
                                                         <br><br>
                                                         <a href="' . route('shop_number', ['id' => encrypt($row->userid)]) . '" id="removeunderline">
                                                             <i class="fa fa-shopping-cart"></i> See
                                                             Store&nbsp;&nbsp;&nbsp;&nbsp;
                                                         </a><br><br>
                                                         <a href="' . route('guest.viewdetailsitem', ['upload_id' => encrypt($row->ImageIDS), 'product_id' => encrypt($row->ProductItem_id), 'product_type' => $row->product_type]) . '" id="removeunderline">
                                                             <i class="fa fa-phone"></i>
                                                             <span class="hide-phone-number">' . Str::limit($row->phone, 4, '') . '</span>
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
                                   <strong><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;<i class="fas fa-question-circle"></i> Search Results for:  <span style="font-style:italic; color: #ff7519;">' . $request->get('query') . '</span> </strong>
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

    public function GetPerPageUserCountryproduct(Request $request)
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
            ->where('tbl_product_items.place_of_origin', decrypt($request->country_id))
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
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

        return view('mainindex.paginatecountyproduct_records', ['countries' => $countries], compact('products', 'categoryids', 'loginbuyerids', 'industriesids', 'servicesids', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();
    }
    //============================== view country products===========================

    /////////////////////////Free Post Duration step 1 to 2////////////////////////////////////


    public function Gpostfunctions(Request $request, $id)
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


        $fetchallarticle = DB::table('tbl_articles')
            ->select('*')
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

        // $authuser = Auth::user()->id ?? 'session expired';
        // $getuser =  User::where('id', $authuser)->get();
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
            // ->where('users.id', $authuser)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            // ->where(['users.id' =>$authuser, 'expire_status'=>'1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            // ->where(['users.id' =>$authuser, 'expire_status'=>'0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $allcountsql = DB::table('tbl_product_items')
            ->select('sub_category_id', 'category_id', DB::raw('COUNT(article_id) AS article_countall, article_id'))
            ->where('expire_status', 1)
            ->groupBy('sub_category_id')
            ->get();

        $allcountarticle = DB::table('tbl_product_items')
            ->select(
                'sub_category_id',
                'category_id',
                'expire_status',
                'article_id',
                'product_type',
                DB::raw('COUNT(article_id) AS articlesub_count, article_id')
            )
            ->where('expire_status', 1)
            ->groupBy('article_id')
            ->get();


        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => 1])->count();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->latest()
            ->get();


        foreach ($products as $pro) {
            $fetchAllArticles = DB::table('tbl_articles')
                ->leftjoin('tbl_product_items', 'tbl_product_items.article_id', '=', 'tbl_articles.id')
                ->where('tbl_articles.id', $pro->article_id)
                ->get();
        }

        // $ProductTypeGroupCount = DB::table('tbl_product_items')
        // ->select('tbl_product_items.product_type',
        //             'tbl_product_items.id',
        //             'tbl_product_items.slug',
        //             DB::raw('count(product_type) as total_productType'),
        //             )
        // ->groupBy('product_type')
        // ->where(['expire_status'=>1])
        // ->get();

        // $fetchsubIndustry = DB::table('tbl_sub_industries')
        // ->select('tbl_sub_industries.sub_industry_name',
        //           'tbl_sub_industries.id',
        //           'tbl_industry_items.sub_industry_id',
        //           'tbl_industries.industry_name',
        //           'tbl_industries.id as industry_id',
        //           DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
        //           )
        // ->leftjoin('tbl_industry_items','tbl_industry_items.sub_industry_id','=','tbl_sub_industries.id')
        // ->leftjoin('tbl_industries','tbl_industries.id','=','tbl_industry_items.industry_id')
        // ->where(['tbl_industry_items.expire_status'=>1])
        // ->groupBy('tbl_industry_items.sub_industry_id')
        // ->orderBy('tbl_industry_items.id', 'DESC')
        // ->get();

        // $joinservices = DB::table('tbl_sub_service_threes')
        // ->select('tbl_sub_service_threes.sub_service_3_name',
        //           'tbl_sub_service_threes.id',
        //           'tbl_service_items.sub_service_3_id',
        //           'tbl_service_items.sub_service_id as sub_id',
        //           'tbl_service_items.sub_service_1_id as sub_id_one',
        //           'tbl_service_items.sub_service_2_id as sub_id_two',
        //           'tbl_sub_service_threes.sub_service_id',
        //           'tbl_sub_service_threes.sub_service_one_id',
        //           'tbl_sub_service_threes.sub_service_two_id',
        //           'tbl_sub_service_threes.id as sub_service_3_id',
        //           'tbl_services.id as service_id',
        //           DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
        //           )
        // ->leftjoin('tbl_service_items','tbl_service_items.sub_service_id','=','tbl_sub_service_threes.sub_service_id')
        // ->leftjoin('tbl_services','tbl_services.id','=','tbl_sub_service_threes.service_id')
        // ->where(['tbl_service_items.expire_status'=>1])
        // ->groupBy('tbl_service_items.sub_service_id')
        // ->orderBy('tbl_service_items.id', 'DESC')
        // ->get();


        // $fetchjobs = DB::table('tbl_job_categories')
        // ->select('tbl_job_categories.job_category_name_en',
        //          'tbl_job_categories.job_category_name_fr',
        //           'tbl_job_categories.id',
        //           'tbl_job_items.job_category_id',
        //           'tbl_job_items.id as job_items_id',
        //           DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
        //           )
        // ->leftjoin('tbl_job_items','tbl_job_items.job_category_id','=','tbl_job_categories.id')
        // ->where(['tbl_job_items.expire_status'=>1])
        // ->groupBy('tbl_job_items.job_category_id')
        // ->orderBy('tbl_job_items.id', 'DESC')
        // ->get();


        // $countalljobs_ =  DB::table('tbl_job_items')->where(['expire_status'=>'1'])->count();
        // $countallproducts_ =  DB::table('tbl_product_items')->where(['expire_status'=>'1'])->count();
        // $countallservice_items_ =  DB::table('tbl_service_items')->where(['expire_status'=>'1'])->count();
        // $countallindustry_items_ =  DB::table('tbl_industry_items')->where(['expire_status'=>'1'])->count();


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


        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => '1'])
            ->get();


        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();
        ///////////////////////////////////////////////category////////////////////////////////
        $fetchallCategories = Tbl_category::all();
        // $fetchallservices = tbl_service_items::where('expire_status', 1)->get();


        $Subproductitems = DB::table('tbl_sub_products')
            ->select(
                'tbl_sub_products.id as subproduct_id',
                'tbl_sub_products.sub_product_name_en',
                'tbl_sub_products.sub_product_name_fr',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(tbl_product_items.sub_product_id) as total_productType'),
            )
            ->leftjoin('tbl_product_items', 'tbl_product_items.sub_product_id', '=', 'tbl_sub_products.id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->groupBy('tbl_product_items.sub_product_id')
            ->get();

        $Subservicesitems = DB::table('tbl_sub_services')
            ->select(
                'tbl_sub_services.id as subservice_id',
                'tbl_sub_services.sub_service_name',
                'tbl_sub_services.sub_service_name_fr',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_subservice'),
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_services.id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_services.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->get();

        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.sub_industry_name_fr',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.industry_name_fr',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            // ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            // ->orderBy('tbl_job_items.id', 'DESC')
            ->get();

        return view('mainindex.guest_category', [
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
            // 'user_id' => $authuser,
            // 'getuser' => $getuser,
            'getbusinessdata' => $getbusinessdata,
            'countProductItems' => $countProductItems,
            'countProductItems1' => $countProductItems1,
            'allcountsql' => $allcountsql,
            'allcountarticle' => $allcountarticle,


        ], compact('fetchjobs', 'Subservicesitems', 'Subproductitems', 'countallproducts_', 'countalljobs_', 'ProductTypeGroupCount', 'fetchsubIndustry', 'joinservices', 'countallservice_items_', 'countallindustry_items_', 'products'))->render();


    }


    public function GuestFreePostDuration(Request $request)
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

        // $authuser = Auth::user()->id ?? 'session expired';
        // $getuser =  User::where('id', $authuser)->get();
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
            // ->where('users.id', $authuser)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            // ->where(['users.id' =>$authuser, 'expire_status'=>'1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            // ->where(['users.id' =>$authuser, 'expire_status'=>'0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $allcountsql = DB::table('tbl_product_items')
            ->select('sub_category_id', 'category_id', DB::raw('COUNT(article_id) AS article_countall, article_id'))
            // ->where('user_id', $authuser)
            ->groupBy('sub_category_id')
            ->get();

        $allcountarticle = DB::table('tbl_product_items')
            ->select('sub_category_id', 'category_id', 'article_id', DB::raw('COUNT(article_id) AS articlesub_count, article_id'))
            // ->where('user_id', $authuser)
            ->groupBy('article_id')
            ->get();

        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => '1'])
            ->get();

        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->latest()
            ->get();

        //  ===================right side bar industries and businesses item =============
        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => '1'])
            ->get();


        // $fetchsubService = DB::table('tbl_sub_services')
        // ->select('tbl_sub_services.sub_service_name',
        //           'tbl_sub_services.id',
        //           DB::raw('count(tbl_service_items.sub_service_id) as total_subservice')
        //           )
        // ->leftjoin('tbl_service_items','tbl_service_items.sub_service_id','=','tbl_sub_services.id')
        // ->where(['tbl_service_items.expire_status'=>1])
        // ->groupBy('tbl_service_items.sub_service_id')
        // ->orderBy('tbl_service_items.id', 'DESC')
        // ->get();


        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();


        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();

        //  ===================end right side bar industries and businesses item =============

        return view('mainindex.guest_category', [
            'countallproducts_' => $countallproducts_,
            'countallservice_items_' => $countallservice_items_,
            'countallindustry_items_' => $countallindustry_items_,
            'joinservices' => $joinservices,
            'fetchsubIndustry' => $fetchsubIndustry,
            'ProductTypeGroupCount' => $ProductTypeGroupCount,
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
            // 'user_id' => $authuser,
            // 'getuser' => $getuser,
            'getbusinessdata' => $getbusinessdata,
            'countProductItems' => $countProductItems,
            'countProductItems1' => $countProductItems1,
            'allcountsql' => $allcountsql,
            'allcountarticle' => $allcountarticle

        ], compact('ProductTypeGroupCount', 'countallproducts_', 'products'))->render();


    }

    public function GuestViewProductsDetails(Request $request)
    {
        //dd(decrypt($request->upload_id), decrypt($request->product_id), $request->product_type);
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
            ->leftjoin('tbl_imgs', 'tbl_imgs.upload_id', '=', 'tbl_images.id')
            ->leftjoin('tbl_product_items', 'tbl_product_items.id', '=', 'tbl_images.product_item')
            ->leftjoin('tbl_mping_businesses', 'tbl_mping_businesses.user_id', '=', 'tbl_images.user_id')
            ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
            ->leftjoin('users', 'users.id', '=', 'tbl_images.user_id')
            ->leftjoin('countries', 'countries.id', '=', 'users.country')
            ->leftjoin('states', 'states.id', '=', 'users.country_id')
            ->leftjoin('cities', 'cities.id', '=', 'users.state_id')
            ->leftjoin('tbl_days', 'tbl_days.id', '=', 'users.date')
            ->leftjoin('tbl_months', 'tbl_months.id', '=', 'users.month')
            ->leftjoin('tbl_years', 'tbl_years.id', '=', 'users.year')
            ->where(['tbl_sub_products.id' => $request->subproduct_id, 'tbl_product_items.expire_status' => 1])
            ->groupBy('tbl_imgs.upload_id')
            ->select(
                'users.id as userid',
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
                'tbl_images.id as ImageIDS',
                'tbl_imgs.image_name as Images',
                'users.product_duration',
                'tbl_imgs.image_name',
                'tbl_images.product_item',
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

            $productname = DB::table('tbl_product_items')
                ->where('product_type', $pitems->product_type)
                ->count();


            $count_country = DB::table('tbl_product_items')->where(['place_of_origin' => $pitems->place_of_origin, 'expire_status' => '1'])->count();


        }

        $photoIDS = $request->upload_id;
        $fetchallCategories = Tbl_category::all();
        $countFeedback = tbl_messages::where('tbl_messages.product_id', decrypt($request->product_id))->count();

        $main_img = DB::table('tbl_product_items')
            ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
                                  users.id,
                                  users.product_duration as PDurations,
                                  tbl_product_items.id as ProductItem_id,
                                  tbl_product_items.user_id,
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
            ->where('tbl_product_items.product_type', $request->product_type)
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            // ->distinct('tbl_product_items.item_name')
            ->get();

        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        //$count_country =  DB::table('tbl_product_items')->where(['place_of_origin' => $pitems->place_of_origin, 'expire_status'=>'1'])->count();
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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->latest()
            ->get();

        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->selectRaw('tbl_product_items.product_type,
                                   tbl_product_items.expire_status,
                                   tbl_images.id as IDs,
                                   tbl_product_items.slug,
                                   tbl_product_items.id,
                                    tbl_product_items.sub_product_id,
                                   count(tbl_product_items.product_type) as total_productType',
            )
            ->leftjoin('tbl_images', 'tbl_images.product_item', '=', 'tbl_product_items.id')
            ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
            ->groupBy('tbl_product_items.sub_product_id')
            ->where(['tbl_product_items.expire_status' => 1])
            ->get();

        $total_items = DB::table('tbl_product_items')
            ->leftjoin('tbl_sub_products', 'tbl_sub_products.id', '=', 'tbl_product_items.sub_product_id')
            // ->where(['tbl_sub_products.id'=> $request->subproduct_id, 'tbl_product_items.expire_status' => 1])
            ->where(['tbl_sub_products.id' => $request->subproduct_id, 'tbl_product_items.expire_status' => 1])
            ->count();



        return view('mainindex.guest_productsdetails', compact('total_items', 'productname', 'ProductTypeGroupCount', 'products', 'countallproducts_', 'count_country', 'main_img', 'countFeedback', 'messagecomment', 'category_name', 'subcategories_name', 'article_name', 'subproduct_name', 'countries', 'categoryids', 'industriesids', 'servicesids', 'getbusinessdata', 'countProductItems', 'countProductItems1', 'user', 'getuser', 'getimageid', 'viewImage', 'countImage', 'photoIDS', 'fetchallCategories'))->render();
    }


    public function GuestGetCSubProductID(Request $request, $id, $subcategory_id, $article_id, $category_id)
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
            // ->where('users.id', $user)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            // ->where(['users.id' =>$user, 'expire_status'=>'1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            // ->where(['users.id' =>$user, 'expire_status'=>'0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => '1'])
            ->get();

        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();

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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->latest()
            ->get();


        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services
        return view('mainindex.sub_products_form', compact('products', 'ProductTypeGroupCount', 'countallproducts_', 'countries', 'categoryids', 'industriesids', 'servicesids', 'subcategories_name', 'article_name', 'subproduct_name', 'category_name', 'fetchallCategories', 'CategoriesIDs', 'created_at', 'getuser', 'getbusinessdata', 'countProductItems', 'countProductItems1'))->render();

    }



    public function LoginGuest2(Request $request)
    {

        // dd($request->email, $request->password);

        $credentials = Validator::make($request->all(), [

            'email' => 'required|email',
            'password' => 'required',
            'status' => 'active'

        ], [
            'email.required' => 'Required email',
            'password.required' => 'Required password',

        ]);



        if ($credentials->fails()) {
            return response()->json(['errors' => $credentials->errors()]);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            User::where('id', Auth::id())->update(['islogged' => 'Online']);
            return response()->json([
                'status' => 200,
            ]);

        } else {
            return response()->json(['errorlogin' => 400]);
        }

    }

    public function ViewCategoriesDetails(Request $request)
    {

        //dd(decrypt($request->subcategory_id));

        $countries = Country::all();
        $fetchallCategories = Tbl_category::all();

        $CategoriesID = DB::table('tbl_categories')
            ->where('id', decrypt($request->category_id))
            ->get();

        $fetchallSubCategories = DB::table('tbl_sub_categories')
            ->where('id', decrypt($request->subcategory_id))
            // ->orderBy('sub_category_name_en', 'DESC')
            ->get();

        foreach ($fetchallSubCategories as $row) {

            $fetchAllArticles = DB::table('tbl_articles')
                ->where('category_id', decrypt($request->subcategory_id))
                ->orWhere('sub_category_id', $row->id)
                ->get();

        }

        $fetchallarticle = DB::table('tbl_articles')
            ->where('id', decrypt($request->subcategory_id))
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

        // $authuser = Auth::user()->id ?? 'session expired';
        // $getuser =  User::where('id', $authuser)->get();
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
            // ->where('users.id', $authuser)
            ->get();

        $countProductItems = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            // ->where(['users.id' =>$authuser, 'expire_status'=>'1'])
            ->groupBy('tbl_product_items.user_id')
            ->get();


        $countProductItems1 = DB::table('users')
            ->selectRaw('count(tbl_product_items.user_id) as cnt')
            ->leftjoin('tbl_product_items', 'tbl_product_items.user_id', '=', 'users.id')
            // ->where(['users.id' =>$authuser, 'expire_status'=>'0'])
            ->groupBy('tbl_product_items.user_id')
            ->get();

        $allcountsql = DB::table('tbl_product_items')
            ->select('sub_category_id', 'category_id', DB::raw('COUNT(article_id) AS article_countall, article_id'))
            // ->where('user_id', $authuser)
            ->groupBy('sub_category_id')
            ->get();

        $allcountarticle = DB::table('tbl_product_items')
            ->select('sub_category_id', 'category_id', 'article_id', DB::raw('COUNT(article_id) AS articlesub_count, article_id'))
            // ->where('user_id', $authuser)
            ->groupBy('article_id')
            ->get();

        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => '1'])
            ->get();

        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();

        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services

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
            ->whereIn('tbl_product_items.expire_status', [1])
            ->groupBy('tbl_imgs.upload_id')
            ->orderBy('tbl_product_items.id', 'desc')
            ->latest()
            ->get();

        //  ===================right side bar industries and businesses item =============
        $ProductTypeGroupCount = DB::table('tbl_product_items')
            ->select(
                'tbl_product_items.product_type',
                'tbl_product_items.id',
                'tbl_product_items.slug',
                DB::raw('count(product_type) as total_productType'),
            )
            ->groupBy('product_type')
            ->where(['expire_status' => '1'])
            ->get();


        // $fetchsubService = DB::table('tbl_sub_services')
        // ->select('tbl_sub_services.sub_service_name',
        //           'tbl_sub_services.id',
        //           DB::raw('count(tbl_service_items.sub_service_id) as total_subservice')
        //           )
        // ->leftjoin('tbl_service_items','tbl_service_items.sub_service_id','=','tbl_sub_services.id')
        // ->where(['tbl_service_items.expire_status'=>1])
        // ->groupBy('tbl_service_items.sub_service_id')
        // ->orderBy('tbl_service_items.id', 'DESC')
        // ->get();


        $fetchsubIndustry = DB::table('tbl_sub_industries')
            ->select(
                'tbl_sub_industries.sub_industry_name',
                'tbl_sub_industries.id',
                'tbl_industry_items.sub_industry_id',
                'tbl_industries.industry_name',
                'tbl_industries.id as industry_id',
                DB::raw('count(tbl_industry_items.sub_industry_id) as total_subindustries')
            )
            ->leftjoin('tbl_industry_items', 'tbl_industry_items.sub_industry_id', '=', 'tbl_sub_industries.id')
            ->leftjoin('tbl_industries', 'tbl_industries.id', '=', 'tbl_industry_items.industry_id')
            ->where(['tbl_industry_items.expire_status' => 1])
            ->groupBy('tbl_industry_items.sub_industry_id')
            ->orderBy('tbl_industry_items.id', 'DESC')
            ->get();

        $joinservices = DB::table('tbl_sub_service_threes')
            ->select(
                'tbl_sub_service_threes.sub_service_3_name',
                'tbl_sub_service_threes.id',
                'tbl_service_items.sub_service_3_id',
                'tbl_service_items.sub_service_id as sub_id',
                'tbl_service_items.sub_service_1_id as sub_id_one',
                'tbl_service_items.sub_service_2_id as sub_id_two',
                'tbl_sub_service_threes.sub_service_id',
                'tbl_sub_service_threes.sub_service_one_id',
                'tbl_sub_service_threes.sub_service_two_id',
                'tbl_sub_service_threes.id as sub_service_3_id',
                'tbl_services.id as service_id',
                DB::raw('count(tbl_service_items.sub_service_id) as total_sub3')
            )
            ->leftjoin('tbl_service_items', 'tbl_service_items.sub_service_id', '=', 'tbl_sub_service_threes.sub_service_id')
            ->leftjoin('tbl_services', 'tbl_services.id', '=', 'tbl_sub_service_threes.service_id')
            ->where(['tbl_service_items.expire_status' => 1])
            ->groupBy('tbl_service_items.sub_service_id')
            ->orderBy('tbl_service_items.id', 'DESC')
            ->get();

        $fetchjobs = DB::table('tbl_job_categories')
            ->select(
                'tbl_job_categories.job_category_name_en',
                'tbl_job_categories.job_category_name_fr',
                'tbl_job_categories.id',
                'tbl_job_items.job_category_id',
                'tbl_job_items.id as job_items_id',
                DB::raw('count(tbl_job_items.job_category_id) as total_jobs')
            )
            ->leftjoin('tbl_job_items', 'tbl_job_items.job_category_id', '=', 'tbl_job_categories.id')
            ->where(['tbl_job_items.expire_status' => 1])
            ->groupBy('tbl_job_items.job_category_id')
            ->orderBy('tbl_job_items.id', 'DESC')
            ->get();


        $countalljobs_ = DB::table('tbl_job_items')->where(['expire_status' => '1'])->count();
        $countallproducts_ = DB::table('tbl_product_items')->where(['expire_status' => '1'])->count();
        $countallservice_items_ = DB::table('tbl_service_items')->where(['expire_status' => '1'])->count();
        $countallindustry_items_ = DB::table('tbl_industry_items')->where(['expire_status' => '1'])->count();

        //  ===================end right side bar industries and businesses item =============

        return view('mainindex.guest_showcategory', [
            'countallproducts_' => $countallproducts_,
            'countallservice_items_' => $countallservice_items_,
            'countallindustry_items_' => $countallindustry_items_,
            'joinservices' => $joinservices,
            'fetchsubIndustry' => $fetchsubIndustry,
            'ProductTypeGroupCount' => $ProductTypeGroupCount,
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
            // 'user_id' => $authuser,
            // 'getuser' => $getuser,
            'getbusinessdata' => $getbusinessdata,
            'countProductItems' => $countProductItems,
            'countProductItems1' => $countProductItems1,
            'allcountsql' => $allcountsql,
            'allcountarticle' => $allcountarticle

        ], compact('fetchjobs', 'countalljobs_', 'ProductTypeGroupCount', 'countallproducts_', 'products'))->render();




        // dd(decrypt($request->subcategory_id));

    }


    public function GuestPostOption(Request $request)
    {

        $countries = Country::all();
        $categoryids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09"; //static ID category
        $loginbuyerids = "NHpTaG5xWnBRb0pVd0ZFSnRwSzlKQT09"; //static ID login buyer
        $industriesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID industries
        $servicesids = "d1lMRE9VOXNRL1dGOUlJanpVcDEwQT09";//static ID services


        return view('mainindex.post_options', ['countries' => $countries], compact('loginbuyerids', 'industriesids', 'servicesids', 'categoryids'))->render();


    }

}