<?php

use App\Http\Controllers\Front\DefaultController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Livewire\Admin\Adds\Adds;
use App\Http\Livewire\Admin\AskQuestion\AskQuestion as AskQuestionAskQuestion;
use App\Http\Livewire\Admin\Auth\Login;
use App\Http\Livewire\Admin\Brands\Brands;
use App\Http\Livewire\Admin\Category\BabyCategory;
use App\Http\Livewire\Admin\Category\BeforeBornCategory;
use App\Http\Livewire\Admin\Category\Category;
use App\Http\Livewire\Admin\Category\NewBornCategory;
use App\Http\Livewire\Admin\Category\SubCategory;
use App\Http\Livewire\Admin\ChildCategory\ChildCategorylist;
use App\Http\Livewire\Admin\Dashboard\Dashboard;
use App\Http\Livewire\Admin\Faq\MerchentFaq;
use App\Http\Livewire\Admin\Header\HeaderTop;
use App\Http\Livewire\Admin\Headline\Headline;
use App\Http\Livewire\Admin\Messages\ContactMessages;
use App\Http\Livewire\Admin\Messages\Subscribers;
use App\Http\Livewire\Admin\Notification\Notification;
use App\Http\Livewire\Admin\Notification\ReadNotification;
use App\Http\Livewire\Admin\Orders\Orders as OrdersOrders;
use App\Http\Livewire\Admin\Orders\ShippingOrders;
use App\Http\Livewire\Admin\Orders\SingleOrderCancelPage;
use App\Http\Livewire\Admin\Pages\AboutUs as PagesAboutUs;
use App\Http\Livewire\Front\ContactUs;
use App\Http\Livewire\Admin\Pages\Healps;
use App\Http\Livewire\Admin\Pages\PrivacyAndPolicy;
use App\Http\Livewire\Admin\Pages\ReturnPolicy as PagesReturnPolicy;
use App\Http\Livewire\Admin\Pages\SearchByProductCode;
use App\Http\Livewire\Admin\Pages\TarmsAndConditions;
use App\Http\Livewire\Admin\Product\Campaigns\Campaign as CampaignsCampaign;
use App\Http\Livewire\Admin\Product\Campaigns\CampaignCreate;
use App\Http\Livewire\Admin\Product\Campaigns\CampaignEdit;
use App\Http\Livewire\Admin\Product\OnsellPeoducts;
use App\Http\Livewire\Admin\Product\Product;
use App\Http\Livewire\Admin\Product\ProductCreate;
use App\Http\Livewire\Admin\Product\ProductStyle\ProductStyle;
use App\Http\Livewire\Admin\Product\ProductUpdate;
use App\Http\Livewire\Admin\Product\ShowMerchantBrand;
use App\Http\Livewire\Admin\Product\ShowMerchantCampaignProduct;
use App\Http\Livewire\Admin\Product\ShowMerchantCategory;
use App\Http\Livewire\Admin\Product\ShowMerchantOnsellProduct;
use App\Http\Livewire\Admin\Product\ShowMerchantProduct;
use App\Http\Livewire\Admin\Review\Reviews as ReviewReviews;
use App\Http\Livewire\Admin\Service\Service as ServiceService;
use App\Http\Livewire\Admin\Settings\CategoryIndexSetting;
use App\Http\Livewire\Admin\Settings\FooterPMethodImg;
use App\Http\Livewire\Admin\Users\User;
use App\Http\Livewire\Admin\Settings\Settings;
use App\Http\Livewire\Admin\Settings\Systems;
use App\Http\Livewire\Admin\Shipping\ShippingProductList;
use App\Http\Livewire\Admin\Slider\BannerSlider;
use App\Http\Livewire\Admin\Slider\CampaignsSlider;
use App\Http\Livewire\Admin\Slider\HomeSlider;
use App\Http\Livewire\Admin\Social\Social;
use App\Http\Livewire\Admin\Users\Customer\Customers;
use App\Http\Livewire\Admin\Users\Merchent\MerchentUsers;
use App\Http\Livewire\Admin\Users\UserProfile;
use App\Http\Livewire\Front\AboutUs;
use App\Http\Livewire\Front\AllBrands;
use App\Http\Livewire\Front\Auth\Customers\Address;
use App\Http\Livewire\Front\Auth\Customers\CancelOrder;
use App\Http\Livewire\Front\Auth\Customers\CustomerRegistration;
use App\Http\Livewire\Front\Auth\Customers\CustomersLogin;
use App\Http\Livewire\Front\Auth\Customers\CustomersNotification;
use App\Http\Livewire\Front\Auth\Customers\Orders;
use App\Http\Livewire\Front\Auth\Customers\OrdersHistory;
use App\Http\Livewire\Front\Auth\Customers\Password;
use App\Http\Livewire\Front\Auth\Customers\ReviewCU;
use App\Http\Livewire\Front\Auth\Customers\Reviews;
use App\Http\Livewire\Front\Auth\Customers\Transections;
use App\Http\Livewire\Front\Auth\Customers\UsersProfile;
use App\Http\Livewire\Front\Auth\Customers\ViewNotification;
use App\Http\Livewire\Front\Auth\Merchant\MerchantLogin;
use App\Http\Livewire\Front\Auth\Merchant\MerchantRegistration;
use App\Http\Livewire\Front\Auth\Merchant\SetPassword;
use App\Http\Livewire\Front\Auth\OtpConfirmation;
use App\Http\Livewire\Front\Auth\RegistrationVerificationMethod;
use App\Http\Livewire\Front\Campaign;
use App\Http\Livewire\Front\Cart;
use App\Http\Livewire\Front\Category as FrontCategory;
use App\Http\Livewire\Front\Checkout;
use App\Http\Livewire\Front\Filter;
use App\Http\Livewire\Front\Healps as FrontHealps;
use App\Http\Livewire\Front\Home;
use App\Http\Livewire\Front\Includes\Cart\AddToCartAndWIshlist;
use App\Http\Livewire\Front\Includes\Cart\MyCart;
use App\Http\Livewire\Front\MainCategorysingle;
use App\Http\Livewire\Front\MerchentSingleProducts;
use App\Http\Livewire\Front\Pages\AskQuestion;
use App\Http\Livewire\Front\Pages\Babycategory as PagesBabycategory;
use App\Http\Livewire\Front\Pages\BrandSingle;
use App\Http\Livewire\Front\Pages\ChildCategory;
use App\Http\Livewire\Front\Pages\FrontBeforeNewBornCategory;
use App\Http\Livewire\Front\Pages\FrontNewBornCategory;
use App\Http\Livewire\Front\Pages\OnsellSingle;
use App\Http\Livewire\Front\Pages\ShipingCart;
use App\Http\Livewire\Front\Pages\ShipingCheckout;
use App\Http\Livewire\Front\Pages\Shops;
use App\Http\Livewire\Front\Pages\Thankyou;
use App\Http\Livewire\Front\Pages\TrakeOrder;
use App\Http\Livewire\Front\PrivacyPolicy;
use App\Http\Livewire\Front\ReturnPolicy;
use App\Http\Livewire\Front\Search;
use App\Http\Livewire\Front\Services;
use App\Http\Livewire\Front\Shipping\ShippingProducts;
use App\Http\Livewire\Front\SingleProduct;
use App\Http\Livewire\Front\SingleService;
use App\Http\Livewire\Front\TermsAndConditions;
use App\Http\Livewire\Front\Wishlist;
use App\Http\Livewire\Merchent\Dashboard as MerchentDashboard;
use App\Http\Livewire\Merchent\Faq;
use App\Http\Livewire\Merchent\Orders\Orders as MerchentOrdersOrders;
use App\Http\Livewire\Merchent\Product\Brand\Brand as BrandBrand;
use App\Http\Livewire\Merchent\Product\Category\Category as CategoryCategory;
use App\Http\Livewire\Merchent\Product\Category\SubCategory as CategorySubCategory;
use App\Http\Livewire\Merchent\Product\MerchantProductQuestion;
use App\Http\Livewire\Merchent\Product\MerchentProduct;
use App\Http\Livewire\Merchent\Product\MerchentProductCreate;
use App\Http\Livewire\Merchent\Product\MerchentProductEdit;
use App\Http\Livewire\Merchent\User\Profile;
use Illuminate\Support\Facades\Route;

/* 
#########################################################
############### public or web routes ####################
######################################################### */

Route::get('/register', function () {
    return abort(404);
})->name('home');
// web routs 
Route::get('/', Home::class)->name('home');
Route::get('/product/{slug}', SingleProduct::class)->name('single');
Route::post('/product', [SingleProduct::class, 'addToCart'])->name('addToCart.post');
Route::get('/search/{search}', Search::class)->name('search');
Route::get('/brands', AllBrands::class)->name('brands');
Route::get('/brand/{slug}', BrandSingle::class)->name('brand.single');
// single page by category 
route::group(['prefix' => '/category'], function () {
    Route::get('/{slug}', MainCategorysingle::class)->name('parent-category.single');
    Route::get('/{parentslug}/{slug}', FrontCategory::class)->name('category.single');
    Route::get('/{pslug}/{subslug}/{slug}', ChildCategory::class)->name('childcategory.single');
    Route::get('/{pslug}/{subslug}/{slug}/{babyslug}', PagesBabycategory::class)->name('baby_category.single');
    Route::get('/{pslug}/{subslug}/{slug}/{babyslug}/{newborn}', FrontNewBornCategory::class)->name('newborn_category.single');
    Route::get('/{pslug}/{subslug}/{slug}/{babyslug}/{newborn}/{beforenewborn}', FrontBeforeNewBornCategory::class)->name('beforenewborn_category.single');
});
// filter product end
Route::post('/searchFilter/{slug}', [SearchController::class, 'filterChangeByCategory'])->name('filter.post');
Route::get('/filter/{slug}', Filter::class)->name('filter.get');
Route::post('/search/{slug}', [SearchController::class, 'headerSearch'])->name('search.header');
Route::post('/shipping/search', [SearchController::class, 'shippingSearch'])->name('search.shippingSearch');
// filter product end


// wishlist route
Route::get('/wishlist', Wishlist::class)->name('page.wishlist');
// cart routes
Route::post('/cart-item/delete', [MyCart::class, 'removeItem']);
Route::post('/incriment-qty', [MyCart::class, 'incrimentQty']);
Route::get('/my-cart-item', [MyCart::class, 'getItem']);
Route::post('/ajax-add-to-cart', [AddToCartAndWIshlist::class, 'ajax_add_to_cart']);


// extras pages
Route::get('/campaign', Campaign::class)->name('campaigns');
Route::get('/contact-us', ContactUs::class)->name('contactus');
Route::get('/about-us', AboutUs::class)->name('aboutus');
Route::get('/privacy-policy', PrivacyPolicy::class)->name('privacyPolicy');
Route::get('/terms-and-conditions', TermsAndConditions::class)->name('termsAndConditions');
Route::get('/return policy', ReturnPolicy::class)->name('returnPolicy');
Route::get('/helps', FrontHealps::class)->name('healps');
Route::get('/service', Services::class)->name('front.service');
Route::get('/service/{slug}', SingleService::class)->name('service.single');
Route::get('/shops', Shops::class)->name('shops.all');
Route::get('/shop/{pId}', MerchentSingleProducts::class)->name('shope.single');
Route::get('/on-sell', OnsellSingle::class)->name('onsell');
// thankyou page 
Route::get('/thankyou', Thankyou::class)->name('front.thankyou');
Route::get('/trake-order', TrakeOrder::class)->name('front.trake-order');

// shipping products 
Route::get('/shipping-product', ShippingProducts::class)->name('front.shipping');
Route::get('/shipping-product/back', [DefaultController::class, 'shippingGotoBack'])->name('front.shipping.back');


#########################################################
################### merchant routes statrt ##############
######################################################### */

Route::get('/merchant/login', MerchantLogin::class)->name('merchant.login');
Route::get('/merchant/register', MerchantRegistration::class)->name('merchant.register');
Route::get('/sign up/otp', SetPassword::class)->name('merchant.register.setpassword');

Route::group(['prefix' => '/merchent', 'middleware' => 'auth:merchent'], function () {
    Route::get('child-category', ChildCategorylist::class)->name('merchent.childcategory');
    Route::get('dashboard', MerchentDashboard::class)->name('merchent.dashboard');
    Route::get('faq', Faq::class)->name('merchent.faq');
    Route::get('profile', Profile::class)->name('merchent.profile');
    Route::get('read-notification/{data}', ReadNotification::class)->name('merchent.read-notification');
    Route::get('orders', MerchentOrdersOrders::class)->name('merchent.orders');
    Route::get('ask-questions', MerchantProductQuestion::class)->name('merchent.askquestion');
    // merchent product 
    route::group(['prefix' => '/category'], function () {
        Route::get('/', CategoryCategory::class)->name('merchent.product.category');
        Route::get('/subcategory', CategorySubCategory::class)->name('merchent.product.subcategory');
    });
    Route::get('/brands', BrandBrand::class)->name('merchent.product.brand');
    route::group(['prefix' => '/products'], function () {
        Route::get('/', MerchentProduct::class)->name('merchent.product');
        Route::get('/create', MerchentProductCreate::class)->name('merchent.product.create');
        Route::get('/edit/{id}', MerchentProductEdit::class)->name('merchent.product.edit');
    });
});

#########################################################
################### customers User routes ###############
######################################################### */
Route::get('verify-method', RegistrationVerificationMethod::class)->name('verify.method');
Route::get('otp-confirmation/{otp}', OtpConfirmation::class)->name('get.otp');
Route::get('otp-confirmation', OtpConfirmation::class)->name('post.otp');
Route::get('/user/registration', CustomerRegistration::class)->name('customer.register');
Route::get('/user/login', CustomersLogin::class)->name('user.login');

Route::group(['prefix' => '/user', 'middleware' => 'auth:web'], function () {
    Route::get('/profile', UsersProfile::class)->name('user.profile');
    Route::get('/address', Address::class)->name('user.address');
    Route::get('/notification', CustomersNotification::class)->name('user.notification');
    Route::get('/notification/{data}', ViewNotification::class)->name('user.notification.view');
    Route::get('/orders', Orders::class)->name('user.orders');
    Route::get('/orders-history', OrdersHistory::class)->name('user.orders-history');
    Route::get('/reviews', Reviews::class)->name('user.reviews');
    Route::get('/reviews/{id}', ReviewCU::class)->name('user.reviews.single');
    Route::get('/transections', Transections::class)->name('user.transections');
    Route::get('/password', Password::class)->name('user.password');
    Route::get('/cart', Cart::class)->name('user.cart');
    Route::get('/checkout', Checkout::class)->name('user.checkout');
    Route::get('/ask-question/{slug}', AskQuestion::class)->name('user.askQuestion');
    Route::get('/cancel-order/{data}', CancelOrder::class)->name('user.order.cancel');
    Route::get('/shipping/cart', ShipingCart::class)->name('user.cart.shipping');
    Route::get('/shipping/checkout', ShipingCheckout::class)->name('user.shipping.checkout');
});


#########################################################
##################### Admin routes ######################
######################################################### */

Route::get('fda/login', function () {
    return view('livewire.admin.auth.login');
})->name('admin.login');
Route::get('fda/login', function () {
    return view('livewire.admin.auth.login');
})->name('login');
route::post('fda/login', [login::class, 'login'])->name('admin.login');
Route::group(['prefix' => 'fda/admin', 'middleware' => 'auth:admin'], function () {
    Route::get('dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('category', Category::class)->name('admin.category');
    Route::get('subcategory', SubCategory::class)->name('admin.subcategory');
    Route::get('brands', Brands::class)->name('admin.brands');
    Route::get('child-category', ChildCategorylist::class)->name('admin.childcategory');
    Route::get('baby-category', BabyCategory::class)->name('admin.baby_category');
    Route::get('new-born-category', NewBornCategory::class)->name('admin.new_born_category');
    Route::get('before-born-category', BeforeBornCategory::class)->name('admin.before_born_category');
    Route::get('footer-payment-image', FooterPMethodImg::class)->name('admin.footer-payment-image');
    Route::get('settings/category-index-setting', CategoryIndexSetting::class)->name('admin.settings.category_index');
    Route::get('headline', Headline::class)->name('admin.headmine');
    Route::get('adds', Adds::class)->name('admin.adds');
    Route::get('topbar', HeaderTop::class)->name('admin.topbar');
    Route::get('social', Social::class)->name('admin.social');
    Route::get('orders', OrdersOrders::class)->name('admin.order');
    Route::get('order/shipping', ShippingOrders::class)->name('admin.order.shipping');
    Route::get('order/notification', SingleOrderCancelPage::class)->name('admin.order.notification');
    Route::get('service', ServiceService::class)->name('admin.service');
    Route::get('notification', Notification::class)->name('admin.notification');
    Route::get('messages', ContactMessages::class)->name('admin.messages');
    Route::get('subscribers', Subscribers::class)->name('admin.subscribers');
    Route::get('ask-questions', AskQuestionAskQuestion::class)->name('admin.askQuestions');
    Route::get('products-reviews', ReviewReviews::class)->name('admin.reviews');
    route::group(['prefix' => '/settings'], function () {
        Route::get('/', Settings::class)->name('admin.settings');
        Route::get('systems', Systems::class)->name('admin.settings.system');
    });
    // user 
    route::group(['prefix' => '/user'], function () {
        Route::get('/', User::class)->name('admin.user');
        Route::get('/profile/{id}', UserProfile::class)->name('admin.user.profile');
        Route::get('/merchent-user', MerchentUsers::class)->name('admin.user.merchent_user');
    });
    // products 
    route::group(['prefix' => '/products'], function () {
        Route::get('/', Product::class)->name('admin.products');
        Route::get('/search/{search}', SearchByProductCode::class)->name('admin.products.search');
        Route::get('style', ProductStyle::class)->name('admin.products.style');
        Route::get('create', ProductCreate::class)->name('admin.products.create');
        Route::get('edit/{id}', ProductUpdate::class)->name('admin.products.edit');
        Route::get('/on-sell', OnsellPeoducts::class)->name('admin.onsellProducts');
        Route::get('/campaign', CampaignsCampaign::class)->name('admin.products.campaign');
        Route::get('/campaign/create', CampaignCreate::class)->name('admin.products.campaign.create');
        Route::get('/campaign/edit/{id}', CampaignEdit::class)->name('admin.products.campaign.edit');
        Route::get('/merchant', ShowMerchantProduct::class)->name('admin.products.merchant');
        Route::get('/merchant/onsell', ShowMerchantOnsellProduct::class)->name('admin.products.merchant.onsell');
        Route::get('/merchant/campaign', ShowMerchantCampaignProduct::class)->name('admin.products.merchant.campaign');
        Route::get('/merchant/category', ShowMerchantCategory::class)->name('admin.products.merchant.category');
        Route::get('/merchant/brands', ShowMerchantBrand::class)->name('admin.products.merchant.brands');
    });

    // shipping products  
    route::group(['prefix' => '/shipping-products'], function () {
        Route::get('/', ShippingProductList::class)->name('admin.shipping');
    });


    // slider routes 
    route::group(['prefix' => '/slider'], function () {
        Route::get('homeslider', HomeSlider::class)->name('admin.homeslider');
        Route::get('banner-slider', BannerSlider::class)->name('admin.bannerslider');
        Route::get('campaign-slider', CampaignsSlider::class)->name('admin.campaignSlider');
    });
    route::group(['prefix' => '/customers'], function () {
        Route::get('/', Customers::class)->name('admin.customers');
    });
    route::group(['prefix' => '/faq'], function () {
        Route::get('/', MerchentFaq::class)->name('faq');
    });
    route::group(['prefix' => '/pages'], function () {
        Route::get('/about-us', PagesAboutUs::class)->name('admin.aboutus');
        Route::post('/about-us', [PagesAboutUs::class, 'save'])->name('admin.aboutus.post');
        Route::get('/tarms-and-condition', TarmsAndConditions::class)->name('admin.tarmsandcondition');
        Route::post('/tarms-and-condition', [TarmsAndConditions::class, 'save'])->name('admin.tarmsandcondition.post');
        Route::get('/return-policy', PagesReturnPolicy::class)->name('admin.returnPolicy');
        Route::post('/return-policy', [PagesReturnPolicy::class, 'save'])->name('admin.returnPolicy.post');
        Route::get('/healps', Healps::class)->name('admin.healps');
        Route::post('/healps', [Healps::class, 'save'])->name('admin.healps.post');
        Route::get('/privacy-policy', PrivacyAndPolicy::class)->name('admin.privacyPolicy');
        Route::post('/privacy-policy', [PrivacyAndPolicy::class, 'save'])->name('admin.privacyPolicy.post');
    });
});

// // Payment Routes for bKash
Route::post('bkash/get-token', 'BkashController@getToken')->name('bkash-get-token');
Route::post('bkash/create-payment', 'BkashController@createPayment')->name('bkash-create-payment');
Route::post('bkash/execute-payment', 'BkashController@executePayment')->name('bkash-execute-payment');
Route::get('bkash/query-payment', 'BkashController@queryPayment')->name('bkash-query-payment');
Route::post('bkash/success', 'BkashController@bkashSuccess')->name('bkash-success');

// Refund Routes for bKash
Route::get('bkash/refund', 'BkashRefundController@index')->name('bkash-refund');
Route::post('bkash/refund', 'BkashRefundController@refund')->name('bkash-refund');


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
