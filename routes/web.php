<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Main\MainIndexController;
use App\Http\Controllers\userdashboard\UserController;
use App\Http\Controllers\admindashboard\ProductController;
use App\Http\Controllers\admindashboard\IndustriesAndManufactureController;

Artisan::call('storage:link');

Route::get('guest/post-options', [MainIndexController::class, 'GuestPostOption'])->name('guest.post_options');

Route::get('lang/change', [MainIndexController::class, 'change'])->name('changeLang');
Route::get('dashboard', [MainIndexController::class, 'dashboard'])->name('dashboard');
// Route::get('/auth/dashboard/get-states-by-country-dash/{id}', [MainIndexController::class, 'getCountryCat']);
// Route::get('/auth/dashboard/get-states-by-state-dash/{id}', [MainIndexController::class, 'getStateCat']);
Route::post('custom-login', [MainIndexController::class, 'authenticate'])->name('login.custom');
// Route::get('signout', [MainIndexController::class, 'signOut'])->name('signout');
Route::get('/logout', [MainIndexController::class, 'logout']);
Route::get('/login', [MainIndexController::class, 'login'])->name('login');
Route::post('/register-user',[MainIndexController::class, 'RegUser'])->name('register.user');
Route::post('/dashboard/update-profile', [MainIndexController::class, 'updateMyProfiles'])->name('user.updatemyprofiledashboard');

Route::post('/guest/post-options-free-products', [MainIndexController::class, 'GuestFreePostDuration'])->name('guest.postoptionfunction');
Route::get('/guest/post-options-free-products/get/{id}', [MainIndexController::class, 'Gpostfunctions'])->name('guest.postfunctions');

Route::get('/guest/category/products/item/free/{id}/{subcategory_id}/{article_id}/{category_id}', [MainIndexController::class, 'GuestGetCSubProductID'])->name('guest.subproductid');
Route::get('/guest/industry-items/{industry_id}/{sub_industry_id}', [MainIndexController::class, 'IndustryItems'])->name('guest.industryitems');
Route::get('/guest/industry-items/ids{industry_id}/{sub_industry_id}/{id}', [MainIndexController::class, 'IndustryItems2'])->name('guest.industryitems2');

// Route::get('/', [MainIndexController::class, 'UnderMaintenance']);
//main index/home
Route::get('/', [MainIndexController::class, 'Index'])->name('mainIndex');
Route::get('/guest/services/items/service/{service_id}/{sub_service_one_id}/{sub_service_id}', [MainIndexController::class, 'ServiceItemService'])->name('guest.serviceitemservice');
//get per page ex:10,25,50,100
Route::get('/per-page', [MainIndexController::class, 'GetPerPage'])->name('getPage');
Route::get('/per-page-shop', [MainIndexController::class, 'GetPerPageShop'])->name('getPageShop');
Route::get('/per-page-jobs', [MainIndexController::class, 'GetPerPageJobs'])->name('getPageJobs');
Route::get('/per-page-jobseekers', [MainIndexController::class, 'GetPerPageJobseekers'])->name('getPageJobseekers');
Route::get('/per-page-availablejobs', [MainIndexController::class, 'GetPerPageAvailablejobs'])->name('getPageavailableJobs');
Route::get('/per-page-availablejobseekers', [MainIndexController::class, 'GetPerPageAvailablejobseekers'])->name('getPageavailableJobseekers');
Route::get('/view-all-countries', [MainIndexController::class, 'ViewAllCountries'])->name('viewallcountries');
Route::get('/search/country', [MainIndexController::class, 'searchCountry'])->name('searchcountry');

Route::get('/view/country/products/{country_id}', [MainIndexController::class, 'ViewCountryProducts'])->name('viewcountryproducts');
Route::get('/view/country/products/ids/{country_id}/{id}', [MainIndexController::class, 'ViewCountryProducts2'])->name('viewcountryproducts2');
Route::get('/country/products/per-page', [MainIndexController::class, 'GetPerPageCountryproduct'])->name('getperpagecountryproduct');
Route::get('/country/products/paginate/country/product', [MainIndexController::class, 'ajax_paginateCountryproduct'])->name('ajaxpaginatecountryproduct');
Route::get('/country/search/product', [MainIndexController::class, 'getSearchCountryproduct'])->name('getsearchcountryproduct');
Route::get('/country/product/search/per-pages', [MainIndexController::class, 'GetPerPageUserCountryproduct'])->name('getperpagescountryproduct');


Route::get('/user/mpingi-users/jobitems/ids/{job_category_id}/{job_items_id}', [MainIndexController::class, 'Viewjobsitems'])->name('guest.jobsitems');

//pagination prev&next
Route::get('/ajax-paginate',[MainIndexController::class,'ajax_paginate'])->name('ajax.paginate');
Route::get('/ajax-paginate-shop',[MainIndexController::class,'ajax_paginate_Shop'])->name('ajax.paginateshop');
Route::get('/ajax-paginate-jobs',[MainIndexController::class,'ajax_paginate_Jobs'])->name('ajax.paginatejobs');
Route::get('/ajax-paginate-jobseekers',[MainIndexController::class,'ajax_paginate_Jobseekers'])->name('ajax.paginatejobseekers');
Route::get('/ajax-paginate-availablejobs',[MainIndexController::class,'ajax_paginate_Availablejobs'])->name('ajax.paginateavailablejobs');
Route::get('/ajax-paginate-availablejobseekers',[MainIndexController::class,'ajax_paginate_Availablejobseekers'])->name('ajax.paginateavailablejobseekers');
//country,state,city
Route::get('/get-states-by-country/{id}', [MainIndexController::class, 'getCountry']);
Route::get('/get-states-by-state/{id}', [MainIndexController::class, 'getState']);
Route::get('/get-search-data', [MainIndexController::class, 'getSearch'])->name('getSearchdata');
Route::get('/get-search-data-shop', [MainIndexController::class, 'getSearchShop'])->name('getSearchdataShop');
Route::get('/get-search-data-availablejobs', [MainIndexController::class, 'getSearchAJobs'])->name('getSearchdataAvailablejobs');
Route::get('/get-search-data-availablejobseekers', [MainIndexController::class, 'getSearchAJobseekers'])->name('getSearchdataAvailablejobseekers');
// Route::get('/get-search-data-jobs', [MainIndexController::class, 'getSearchJobs'])->name('getSearchdataJobs');
//category
Route::get('/category/{id}', [MainIndexController::class, 'ShowCategoryData'])->name('getcat');
Route::get('/category/get-states-by-country-cat/{id}', [MainIndexController::class, 'getCountryCat']);
Route::get('/category/get-states-by-state-cat/{id}', [MainIndexController::class, 'getStateCat']);
//product details
Route::get('/category/products/items/{id}', [MainIndexController::class, 'ProductDetails'])->name('productdetails');
Route::get('/category/products/items/get-states-by-country-cat/{id}', [MainIndexController::class, 'getCountryCat']);
Route::get('/category/products/items/get-states-by-state-cat/{id}', [MainIndexController::class, 'getStateCat']);
//login buyer
Route::get('/login-buyer', [MainIndexController::class, 'LoginBuyer'])->name('guest.loginbuyer');
Route::get('/guest/login/index', [MainIndexController::class, 'LoginGuestIndex'])->name('guest.loginUserIndex');
Route::get('/guest/login', [MainIndexController::class, 'LoginGuest'])->name('guest.loginUser');
Route::get('/guest/login/categories', [MainIndexController::class, 'LoginGuest2'])->name('guest.loginUser2');
//show item pictures
Route::get('/item-picture/{upload_id}', [MainIndexController::class, 'ItemPictures'])->name('itempictures');
Route::get('/item-picture/get-states-by-country-cat/{id}', [MainIndexController::class, 'getCountryCat']);
Route::get('/item-picture/get-states-by-state-cat/{id}', [MainIndexController::class, 'getStateCat']);
//industries details
Route::get('/industries/{id}', [MainIndexController::class, 'Industries'])->name('getindustries');
Route::get('/industriessub/{id}', [MainIndexController::class, 'IndustriesSub'])->name('getindustriessub');
Route::get('/getsubindusandmanufacid/{id}/{sid}', [MainIndexController::class, 'SubindusandmanufacId'])->name('getsubindusandmanufacid');

Route::get('/industries/get-states-by-country-cat/{id}', [MainIndexController::class, 'getCountryCat']);
Route::get('/industries/get-states-by-state-cat/{id}', [MainIndexController::class, 'getStateCat']);
//services details
Route::get('/services/{id}', [MainIndexController::class, 'Services'])->name('getservices');
Route::get('/services/get-states-by-country-cat/{id}', [MainIndexController::class, 'getCountryCat']);
Route::get('/services/get-states-by-state-cat/{id}', [MainIndexController::class, 'getStateCat']);
//shop number details
Route::get('/shops/index/{id}', [MainIndexController::class, 'ShopNumber'])->name('shop_number');
Route::get('/guest/shops/index/{id}/{upload_id}', [MainIndexController::class, 'GShopNumber'])->name('g.shop_number');
Route::get('/guest/shops/index/{id}', [MainIndexController::class, 'GuestShopNumber'])->name('guest.shop_number');

Route::get('/shops/get-states-by-country-cat/{id}', [MainIndexController::class, 'getCountryCat']);
Route::get('/shops/get-states-by-state-cat/{id}', [MainIndexController::class, 'getStateCat']);
//job details
Route::get('/jobs', [MainIndexController::class, 'Jobs'])->name('jobs');
Route::get('/job-items/{id}', [MainIndexController::class, 'Jobitems'])->name('jobitems');
Route::get('/get-states-by-country-cat/{id}', [MainIndexController::class, 'getCountryCat']);
Route::get('/get-states-by-state-cat/{id}', [MainIndexController::class, 'getStateCat']);
//job seekers details
Route::get('/job-seekers', [MainIndexController::class, 'JobSeekers'])->name('jobseekers');
Route::get('/get-states-by-country-cat/{id}', [MainIndexController::class, 'getCountryCat']);
Route::get('/get-states-by-state-cat/{id}', [MainIndexController::class, 'getStateCat']);
//job seekers search
Route::post('/search-jobs-output', [MainIndexController::class, 'SearchJobseekers'])->name('searchjobtitle');
Route::post('/search-results-jobseekers', [MainIndexController::class, 'SearchResults'])->name('searchresult');
//Shop details
Route::get('/shops', [MainIndexController::class, 'Shops'])->name('shops');
Route::get('/shops/shop-number/{id}', [MainIndexController::class, 'ShopsId'])->name('shopsid');
// Route::get('/shops/shop-number/get-states-by-country-cat/{id}', [MainIndexController::class, 'getCountryCat']);
// Route::get('/shops/shop-number/get-states-by-state-cat/{id}', [MainIndexController::class, 'getStateCat']);

//all products details
Route::get('/products', [MainIndexController::class, 'Products'])->name('products');
Route::get('/ajax-paginate-allproduct',[MainIndexController::class,'ajax_paginate_allProducts'])->name('ajax.paginateallproducts');
Route::get('/ajax-searchper-page',[MainIndexController::class,'SearchaPerpageProducts'])->name('getSearchdataAppProducts');

Route::get('/guest/products/view/details/{upload_id}/{product_id}/{product_type}/{subproduct_id}', [MainIndexController::class, 'GuestViewProductsDetails'])->name('guest.viewProductsDetails');


//new products details
Route::get('/new-products/{NewProducts}', [MainIndexController::class, 'NewProducts'])->name('newproducts');
//used products details
Route::get('/used-products/{UsedProducts}', [MainIndexController::class, 'UsedProducts'])->name('usedproducts');
//refurbished products details
Route::get('/refurbished-products/{RefurbishedProducts}', [MainIndexController::class, 'RefurbishedProducts'])->name('refurbishedproducts');
//industries&manufactures details
Route::get('/industries-manufactures', [MainIndexController::class, 'Industriesmanufactures'])->name('industriesmanufactures');
Route::get('/guest/industries/items/service/ids/{sub_industry_id}/{user_id}', [MainIndexController::class, 'Industriesitemsservice'])->name('guest.industriesitemsservice');
//services nearby you details
Route::get('/guest/services/items/service/ids/{serviceitem_id}', [MainIndexController::class, 'ServicesitemsserviceGuest'])->name('guest.servicesitemsservces');
Route::get('/services-nearby-you', [MainIndexController::class, 'Servicesnearbyyou'])->name('servicesnearbyyou');

//join login details
Route::get('/join-for-free', [MainIndexController::class, 'Joinforfreelogin'])->name('joinlogin');
//available jobs details
Route::get('/available-jobs', [MainIndexController::class, 'Availablejobs'])->name('availablejobs');
//available job seekers details
Route::get('/available-jobseekers', [MainIndexController::class, 'Availableajobs'])->name('ajobseekers');
Route::get('/main/guest/products', [MainIndexController::class, 'Fetchallproductsx'])->name('guest.allproducts');

Route::get('/view-products/details/{product_type}/{product_id}/{upload_id}', [MainIndexController::class, 'indexProductDetails'])->name('viewproductsdetails');

Route::get('/guest/details/categories/{category_id}/{subcategory_id}', [MainIndexController::class, 'ViewCategoriesDetails'])->name('guest.viewdetailscategories');

//404 details
Route::get('/404', [MainIndexController::class, 'PageNotFound'])->name('404notfound');
//faq details
Route::get('/faq', [MainIndexController::class, 'Faq'])->name('faq');
//contact us details
Route::get('/contact-us', [MainIndexController::class, 'ContactUs'])->name('contactus');
//about details
Route::get('/about', [MainIndexController::class, 'About'])->name('about');
//forgot password  details
Route::get('/forgotpassword', [MainIndexController::class, 'ForgotPassword'])->name('forgotpassword');
Route::post('/email-forgot-password', [MainIndexController::class, 'SendToEmail'])->name('user.sendemailpassword');
Route::get('/update-password', [MainIndexController::class, 'updatepass'])->name('update-password');
Route::post('/new-password/{code}', [MainIndexController::class, 'newpass'])->name('newpassword');
Route::get('/guest/category/products/details/{upload_id}/{product_id}/{product_type}', [MainIndexController::class, 'guestViewdetails'])->name('guest.viewdetailsitem');

// Route::get('/guest/login-buyer', [UserController::class, 'GuestLoginBuyer'])->name('guest.loginbuyer');

/////////////////////////////All Admin data inside a Dashboard//////////////////////////

Route::get('/industries-and-manufacturers', [IndustriesAndManufactureController::class, 'IndustriesAndManufacturers'])->name('user.industriesAndManufacturers');
Route::get('/admin/fetchallIndustriesAndManufacturers', [IndustriesAndManufactureController::class, 'FetchallIndustriesAndManufacturers'])->name('admin.IndustriesAndManufacturers');
Route::post('/admin/AddIndustriesAndManufacturers', [IndustriesAndManufactureController::class, 'AddIndustriesAndManufacturers'])->name('admin.addindustriesandmanufactures');
Route::post('/admin/UpdateIndustriesAndManufacturers', [IndustriesAndManufactureController::class, 'UpdateIndustriesAndManufacturers'])->name('admin.updateindustriesandmanufactures');
Route::delete('/admin/DeleteIndustriesAndManufacturers', [IndustriesAndManufactureController::class, 'DeleteIndustriesAndManufacturers'])->name('admin.deleteindustriesandmanufactures');

Route::get('/admin/industries-and-manufacturers/{id}', [IndustriesAndManufactureController::class, 'IndustriesAndManufacturersId'])->name('getindustriesandmanufacturesid');
Route::get('/admin/sub-industries-and-manufacturers', [IndustriesAndManufactureController::class, 'SubIndustriesAndManufacturers'])->name('user.subindustriesAndManufacturers');
// Route::get('/admin/fetchallSubIndustriesAndManufacturers', [IndustriesAndManufactureController::class, 'FetchallSubIndustriesAndManufacturers'])->name('admin.SubIndustriesAndManufacturers');
Route::post('/admin/AddsubIndustriesAndManufacturers', [IndustriesAndManufactureController::class, 'AddSubIndustriesAndManufacturers'])->name('admin.addsubindustriesandmanufactures');

Route::post('/admin/UpdateSubIndustriesAndManufacturers', [IndustriesAndManufactureController::class, 'UpdateSubIndustriesAndManufacturers'])->name('admin.updatesubindustriesandmanufactures');
Route::delete('/admin/DeleteSubIndustriesAndManufacturers', [IndustriesAndManufactureController::class, 'DeleteSubIndustriesAndManufacturers'])->name('admin.deletesubindustriesandmanufactures');

Route::get('/admin/new-products', [ProductController::class, 'NewProducts'])->name('admin.newProducts');
Route::get('/admin/fetchallproducts', [ProductController::class, 'FetchAllProducts'])->name('admin.allproducts');
/////////////////////////////end All Admin data inside a Dashboard//////////////////////////

//////////////////////////// All User data inside a Dashboard//////////////////////////
Route::post('/user/mpingi-users/chat/private', [UserController::class, 'ChatPrivateMessage'])->name('user.submitchatmessage');
Route::post('/user/mpingi-users/reply/message', [UserController::class, 'ReplyMessage'])->name('user.submitreplymessage');
Route::delete('/user/mpingi-users/message/delete', [UserController::class, 'DeleteMessages'])->name('user.deletetemessages');

Route::post('/user/mpingi-users/uploadimagejob/delete', [UserController::class, 'DeleteJobsform'])->name('user.deleteJoblogo');
Route::post('/user/mpingi-users/uploadimagejob/update', [UserController::class, 'UpdateJobsform'])->name('user.updateJobsform');
Route::get('/user/mpingi-users/jobslogoimage/update/{job_id}', [UserController::class, 'UpdateJobslogoimage'])->name('user.updatejobslogoimages');
Route::get('/user/mpingi-users/view-jobs', [UserController::class, 'ViewJobs'])->name('user.viewjobs');
Route::get('/user/mpingi-users/fetchalljobs', [UserController::class, 'FetchAllJobs'])->name('allfetchjobs');
Route::get('/user/mpingi-users/jobslogoimage/{id}', [UserController::class, 'Jobslogoimage'])->name('user.jobslogoimage');
Route::post('/user/mpingi-users/uploadimagejob', [UserController::class, 'Updatemyjoblogo'])->name('user.updatemyjoblogo');


Route::get('/mpingiusers/user/purchase_sellermodal/{purchase_id}', [UserController::class, 'ViewSellerModal'])->name('user.getdetailssellermodal');
Route::get('/mpingiusers/user/purchase_buyermodal/{purchase_id}', [UserController::class, 'ViewBuyerModal'])->name('user.getdetailsbuyermodal');
Route::post('/mpingiusers/user/edit/price/single', [UserController::class, 'UpdatemyPriceSingle'])->name('user.updatesingleprices');
Route::get('/user/mpingi-users/cancel-order-products', [UserController::class, 'FetchallCancelorderproducts'])->name('allcancelorderproducts');

Route::get('/user/mpingi-users/view-post', [UserController::class, 'ViewPost'])->name('user.viewpost');
Route::get('/user/mpingi-users/expired-ads', [UserController::class, 'ViewExpiredAds'])->name('user.expiredads');
Route::get('/mpingiusers/user/category/products/item/productsitem/expired', [UserController::class, 'FetchAllProductsitemsExpired'])->name('allproductsitemsexpired');

Route::get('/user/mpingi-users/canceled', [UserController::class, 'ViewCanceled'])->name('user.canceled');
Route::get('/user/mpingi-users/purchases', [UserController::class, 'ViewPurchases'])->name('user.purchases');
Route::get('/user/mpingi-users/purchase-products', [UserController::class, 'FetchallPurchasesproducts'])->name('allpurchaseproductsitems');
Route::get('/user/mpingi-users/view-all-countries', [UserController::class, 'ViewAllCountriesUser'])->name('user.viewallcountries');
Route::get('/user/mpingi-users/search/country', [UserController::class, 'UsersearchCountry'])->name('user.searchcountry');

Route::get('/user/mpingi-users/sales', [UserController::class, 'ViewSales'])->name('user.sales');
Route::get('/user/mpingi-users/sales-products', [UserController::class, 'FetchallSaleproducts'])->name('allsaleproductsitems');

Route::get('/user/mpingi-users/category/products/items/upload-image/{id}', [UserController::class, 'UploadimageProductItem'])->name('user.uploadimageProductItem');
Route::post('/user/mpingi-users/category/products/items/upload-image', [UserController::class, 'UploadimageProductItemUser'])->name('user.uploadproductitemImage');
Route::post('/user/mpingi-users/category/products/items/upload-additional-image', [UserController::class, 'UploadAdditionalImage'])->name('user.uploadAdditionalImage');
Route::get('/mpingiusers/user/category/products/items/photo/{upload_id}', [UserController::class, 'ViewPhotos'])->name('user.viewphotos');

Route::get('/mpingiusers/user/category/products/items/photo/my-order/{upload_id}', [UserController::class, 'ViewPhotosMyOrder'])->name('user.viewphotosmyorder');

Route::post('/mpingiusers/user/category/products/items/photo/delete', [UserController::class, 'DeletePhotos'])->name('user.deleteimageupload');
Route::get('/mpingiusers/user/category/products/item-details/{upload_id}/{product_id}', [UserController::class, 'Viewdetails'])->name('user.viewdetails');
Route::get('/mpingiusers/user/category/products/item-details/user/{upload_id}/{product_id}', [UserController::class, 'ViewdetailsItems'])->name('user.viewdetailsitems');

Route::get('/mpingiusers/user/category/products/item-details/my-orders/{upload_id}/{product_id}', [UserController::class, 'ViewdetailsMyOrders'])->name('user.viewdetailsmyorders');

Route::get('/mpingiusers/user/category/products/photos-buy/{upload_id}', [UserController::class, 'ViewPhotoBuy'])->name('user.photosbuy');
Route::get('/mpingiusers/user/category/products/item/edit-category/{upload_id}', [UserController::class, 'EditProductitem'])->name('user.editproductitem');
Route::post('/mpingiusers/user/category/products/item/edit-product', [UserController::class, 'EditProductitemPost'])->name('user.editpostoptionInsertDatafromform');
Route::post('/mpingiusers/user/category/products/item/delete-product', [UserController::class, 'DeleteProductitemPost'])->name('user.deletepostoptionInsertDatafromform');
Route::post('/mpingiusers/user/category/products/item/messages', [UserController::class, 'SubmitMessage'])->name('user.submitmessage');
Route::get('/mpingiusers/user/category/products/item/productsitem', [UserController::class, 'FetchAllProductsitems'])->name('allproductsitems');
Route::get('/user/mpingi-users/view-industry', [UserController::class, 'ViewIndustry'])->name('user.viewindusty');
Route::get('/user/mpingi-users/fetchall-industry', [UserController::class, 'FetchAllIndustryItems'])->name('user.fetchAllIndustryItems');
Route::get('/user/mpingi-users/404', [UserController::class, 'ViewExpireservices'])->name('user.expireservices');
Route::get('/user/mpingi-users/shops/index/{id}', [UserController::class, 'UserShopNumber'])->name('user.shop_number');
Route::get('/user/mpingi-users/login-buyer', [UserController::class, 'UserLoginBuyer'])->name('user.loginbuyer');
Route::post('/user/mpingi-users/update-disponibility', [UserController::class, 'UpdateDisponibility'])->name('user.updatedisponibility');
Route::get('/view/country/products/items/{country_id}', [UserController::class, 'UserViewCountryProducts'])->name('user.viewcountryproducts');
Route::get('/user/mpingi-users/item/details/buy/{upload_id}/{product_id}', [UserController::class, 'ItemDetailsBuy'])->name('user.itemdetailsbuy');
Route::post('/user/mpingi-users/rate', [UserController::class, 'RateForm'])->name('user.rateform');
Route::post('/user/mpingi-users/purchases/product', [UserController::class, 'PurchasesProduct'])->name('user.purchasesproduct');
Route::post('/mpingiusers/user/category/products/item/cancel-product', [UserController::class, 'CancelProductitemOrder'])->name('user.cancelproduct');

Route::post('/mpingiusers/user/services/basiclisting/businesses/delete', [UserController::class, 'DeleteServicelogo'])->name('user.deleteServicelogo');
Route::post('/mpingiusers/user/services/basiclisting/businesses/update', [UserController::class, 'UpdatetServiceform'])->name('user.updatetserviceform');
Route::post('/mpingiusers/user/services/basiclisting/businesses', [UserController::class, 'BasiclistingBusinesses'])->name('user.basiclistingbusinesses');
Route::get('/mpingiusers/user/services/basiclisting/businesses/id/{id}', [UserController::class, 'BasiclistingBusinessesPostserviceID'])->name('user.basiclistingbusinessesPostserviceID');
Route::get('/mpingiusers/user/services/basiclisting/businesses/subid/{service_id}/{sub_service_id}/{sub_service_one_id}', [UserController::class, 'BasiclistingBusinessesPostserviceSub'])->name('user.basiclistingbusinesssub2');
Route::get('/mpingiusers/user/services/basiclisting/businesses/form/{service_id}/{sub_service_id}/{sub_service_one_id}', [UserController::class, 'BasiclistingBusinessesPostserviceForms'])->name('user.basiclistingbusinesssub2forms');

Route::post('/mpingiusers/user/services/basiclisting/businesses/form/add', [UserController::class, 'InsertBusinessesAddForms'])->name('user.insertbusinessforms');




Route::get('/mpingiusers/user/services/basiclisting/businesses/job-items/{id}', [UserController::class, 'GETJobitems'])->name('user.jobitems');
Route::get('/ajax-paginate-jobseekers_page',[UserController::class,'ajax_paginate_Jobseekers_user']);
Route::get('/per-page-jobseekers_page', [UserController::class, 'GetPerPageJobseekers2'])->name('getPageJobseekers2');
// Route::get('/mpingiusers/user/services/basiclisting/businesses/{id}', [UserController::class, 'BasiclistingIndustriesForm'])->name('user.basiclistingindustriesform');
Route::post('/mpingiusers/user/services/basiclisting/industries/freejobsform', [UserController::class, 'InsertFreeJobsforms'])->name('user.insertfreejobsforms');
Route::post('/mpingiusers/user/comfirm/order', [UserController::class, 'ComfirmOrder'])->name('user.confirmorder');
Route::post('/mpingiusers/user/edit/price', [UserController::class, 'UpdatePrice'])->name('user.updateprice');

Route::get('/mpingiusers/user/services/basiclisting/businesses/{id}', [UserController::class, 'BasiclistingBusinessesID'])->name('user.basiclistingbusinessesID');
Route::get('/mpingiusers/user/services/basiclisting/businesses/subservices/{sub_service_id}/{service_id}/{msid}', [UserController::class, 'BasiclistingBusinessesSubservices'])->name('user.basiclistingbusinessessubservices');
Route::get('/mpingiusers/user/services/basiclisting/businesses/form/{id}/{msid}', [UserController::class, 'BasiclistingBusinessesForm'])->name('user.basiclistingbusinessessubservicesform');
Route::get('/user/mpingi-users/users/contact/admin', [UserController::class, 'ContactAdmin'])->name('user.contactadmin');
Route::get('/mpingiusers/user/services/basiclisting/businesses/id/{sub_service_id}/{service_id}', [UserController::class, 'BasiclistingBusinessesFormID'])->name('user.basiclistingbusinessessubservicesid');

Route::post('/mpingiusers/user/services/basiclisting/industries/delete', [UserController::class, 'DeleteIndustrieslogo'])->name('user.deleteIndustrylogo');
Route::post('/mpingiusers/user/services/basiclisting/industries/updateform', [UserController::class, 'UpdatetIndustriesform'])->name('user.updatetindustriesform');
Route::get('/mpingiusers/user/services/basiclisting/industries/edit/{edit_industry_id}', [UserController::class, 'EditIndustriesItemsUser'])->name('edit.industriesUser');
Route::get('/mpingiusers/user/services/basiclisting/industries/{id}', [UserController::class, 'BasiclistingIndustriesSub'])->name('basiclistingindustriessub');
Route::post('/mpingiusers/user/services/basiclisting/businesses/form', [UserController::class, 'AddBasiclistingBusinessesForm'])->name('user.basiclistingbusinessesform');
Route::post('/mpingiusers/user/services/basiclisting/industries', [UserController::class, 'BasiclistingIndustries'])->name('user.basiclistingindustries');
Route::post('/mpingiusers/user/services/basiclisting/industries/form', [UserController::class, 'Insertindustriesform'])->name('user.insertindustriesform');
Route::get('/mpingiusers/user/services/basiclisting/industries/logo/{industry_id}', [UserController::class, 'targetindustrieslogoImage'])->name('x-industries');
Route::post('/mpingiusers/user/services/basiclisting/industries/update', [UserController::class, 'Updatetindustrieslogo'])->name('user.updatemyIndustrylogo');
Route::get('/mpingiusers/user/services/basiclisting/industries/{sub_id}/{main_id}', [UserController::class, 'BasiclistingIndustriesSubID'])->name('basiclistingindustriessubID');



Route::get('/mpingiusers/user/services/premiumprogram/industries/{id}', [UserController::class, 'PremiumprogramIndustriesSub'])->name('premiumprogramindustriessub');
Route::post('/mpingiusers/user/services/premiumprogram/industries', [UserController::class, 'PremiumprogramIndustries'])->name('user.premiumprogramindustries');
Route::get('/mpingiusers/user/services/premiumprogram/industries/{sub_id}/{main_id}', [UserController::class, 'PremiumprogramIndustriesSubID'])->name('premiumprogramindustriessubID');

Route::get('/user/mpingi-users/services/item-details/update/{business_id}', [UserController::class, 'UpdateUploadBusinesslogoImage'])->name('user.editbusinesslogoimage');
Route::get('/user/mpingi-users/view-business', [UserController::class, 'ViewBusiness'])->name('user.viewbusiness');
Route::get('/user/mpingi-users/fetch-business', [UserController::class, 'FetchAllBusinessItems'])->name('allfetchbusiness');
Route::get('/user/mpingi-users/service//item-details/ids/{id}', [UserController::class, 'EditServiceitemsdetailIDs'])->name('user.serviceitemsdetails');
Route::get('/user/mpingi-users/services/item-details/{id}', [UserController::class, 'UploadBusinesslogoImage'])->name('user.businesslogoimage');
Route::post('/user/mpingi-users/update/business/logo', [UserController::class, 'UpdateBusinesslogo'])->name('user.updatemybusinesslogo');

Route::get('/user/mpingi-users/users/post-options', [UserController::class, 'PostOptions'])->name('user.postoptions');
Route::get('/user/mpingi-users/users/my-orders', [UserController::class, 'MyOrders'])->name('user.myorders');
Route::get('/user/mpingi-users/ajax-paginates',[UserController::class,'ajax_paginateUser'])->name('ajax.paginates');
Route::get('/user/mpingi-users/get-search-datas', [UserController::class, 'getSearchUser'])->name('getSearchdatas');
Route::get('/user/mpingi-users/per-page', [UserController::class, 'GetPerPageUser'])->name('user.getPages');
Route::get('/mpingiusers/user/category/products/detials/{upload_id}/{product_id}', [UserController::class, 'userViewdetails'])->name('user.viewdetailsitem');

Route::get('/user/mpingi-users/category/products/items/{id}', [UserController::class, 'UserProductDetails'])->name('user.productdetails');
// Route::get('/shops/index/{id}', [UserController::class, 'UserShopNumber'])->name('user.shop_number');
Route::get('/load-more-data', [UserController::class,'loadMoreData'])->name('load.more');
Route::get('/user/mpingi-users/users/post-options-free-products/login/{secretekey}/{id}/{code}', [UserController::class, 'GuestFreePostDurationLogin'])->name('guest.postoptionfunctions');

Route::post('/user/mpingi-users/users/post-options-free-products', [UserController::class, 'FreePostDuration'])->name('user.postoptionfunction');
Route::post('/user/mpingi-users/users/post-options-paid-products', [UserController::class, 'PaidPostDuration'])->name('user.paidproducts');

Route::get('/user/mpingi-users/users/post-options-processid/{id}', [UserController::class, 'FreePostDurations'])->name('user.postoptionfunctionid');
Route::get('/user/mpingi-users/users/category/products/item/free/{id}/{subcategory_id}/{article_id}/{category_id}/{user_id}', [UserController::class, 'GetCSubProductID'])->name('user.subproductid');
Route::get('/user/mpingi-users/users/category/products/item/paid/{id}/{subcategory_id}/{article_id}/{category_id}/{user_id}/{ad_type}', [UserController::class, 'GetCSubProductIDPaid'])->name('user.paidsubproductid');
Route::get('/user/mpingi-users/users/category/products/items/{encrypt_id}/{id}/{subcategory_id}/{article_id}/{category_id}/{user_id}', [UserController::class, 'GetCSubProductID2javascript'])->name('user.subproductid2');

// Route::get('/mpingiusers/post/product/{id}', [UserController::class, 'FreePostDurationStart'])->name('user.postoptionfunctionfree');
Route::get('/mpingiusers/user/{id}', [UserController::class, 'FreePostDurationsJavascriptfunction'])->name('user.postoptionfunctionidSSSS');
Route::post('/mpingiusers/user/product/item/insertdata', [UserController::class, 'FreePostDurationsInsertDatafromform'])->name('user.postoptionInsertDatafromform');
Route::post('/mpingiusers/user/product/item/insertdata/paid', [UserController::class, 'PaidPostDurationsInsertDatafromform'])->name('user.postoptionInsertDatafromformpaid');

Route::get('/user/mpingi-users/users/ajax-paginate',[UserController::class,'ajax_paginateUser'])->name('ajax.paginateUser');
Route::get('/user/mpingi-users/users/get-search-data', [UserController::class, 'getSearchUser'])->name('getSearchdataUser');
Route::get('/user/mpingi-users/users/per-page', [UserController::class, 'GetPerPageUser'])->name('getPageUser');
Route::get('/user/mpingi-users/users/items-details-buy/{id}', [UserController::class, 'ItemDetailsbuyId'])->name('loginbuyerId');
Route::get('/user/mpingi-users/users/order-status', [UserController::class, 'Orderstatus'])->name('orderstatus');
Route::get('/user/mpingi-users/users/item-details', [UserController::class, 'ItemDetailsOrder'])->name('itemdetailsOrder');

Route::get('/user/mpingi-users/users/profile', [UserController::class, 'ProfileInfo'])->name('user.profileinfo');
Route::get('/user/mpingi-users/users/business', [UserController::class, 'Business'])->name('user.business');
Route::post('/user/mpingi-users/users/update-my-business-account', [UserController::class, 'UpdatemyBusinessAccount'])->name('user.submitbusiness');
//Route::get('/user/mpingi-users/users/business/search-shop-type', [UserController::class, 'SearchShopType'])->name('autocomplete-search-shoptype');
Route::get('/autocomplete-search-shoptype', [UserController::class, 'SearchShopType']);

Route::post('/user/mpingi-users/users/page-links/edit', [UserController::class, 'EditPagelinks'])->name('user.edituserlinks');
Route::post('/user/mpingi-users/users/page-links/post', [UserController::class, 'UpdatePagelinks'])->name('user.updateuserlinks');
Route::get('/user/mpingi-users/users/page-links', [UserController::class, 'Pagelinks'])->name('user.pagelinks');
Route::get('/user/mpingi-users/users/delete-account', [UserController::class, 'Deleteaccount'])->name('user.deleteaccount');
Route::get('/mpingiusers/get-states-by-country-cat/{id}', [UserController::class, 'getCountryCat']);
Route::get('/mpingiusers/get-states-by-state-cat/{id}', [UserController::class, 'getStateCat']);
Route::post('/user/mpingi-users/users/update-myaccount', [UserController::class, 'updateMyAccount'])->name('user.updatemyaccount');
Route::post('/user/mpingi-users/users/update-profile', [UserController::class, 'updateMyProfile'])->name('user.updatemyprofile');

Route::post('/user/mpingi-users/users/new-mail/read-message', [UserController::class, 'ReadMessage'])->name('user.readmessagesclick');
Route::get('/user/mpingi-users/users/new-mail', [UserController::class, 'NewMail'])->name('user.newmail');
Route::get('/user/mpingi-users/users/inbox', [UserController::class, 'Inbox'])->name('user.inbox');
Route::get('/user/mpingi-users/users/reply', [UserController::class, 'Reply'])->name('user.reply');
Route::get('/user/mpingi-users/users/online', [UserController::class, 'Online'])->name('user.online');
Route::post('/send-message', [UserController::class, 'sendMessage'])->name('send.message');
Route::get('/user/mpingi-users/users/changepassword', [UserController::class, 'Changepassword'])->name('user.changepassword');

Route::post('/user/mpingi-users/send-message', [UserController::class, 'storechat']);
Route::get('/user/mpingi-users/messages/chatbox/{recipient_id}', [UserController::class, 'getchat']);


////////////////////////////end All User data inside a Dashboard//////////////////////////



/////////////////////////////Auth google login/////////////////////////////
Route::get('/auth/google', [MainIndexController::class, 'loginWithGoogle'])->name('logingoogle');
Route::get('auth/google/callback', [MainIndexController::class, 'handleGoogleCallback'])->name('callback');


require __DIR__.'/auth.php';
