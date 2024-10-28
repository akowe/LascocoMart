<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\CoopController;
use App\Http\Controllers\Auth\SellerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FmcgProductController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController; 
use App\Http\Controllers\CardPaymentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FundRequestController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderItem;
use App\Models\Product;
use App\Models\FcmgProduct;

use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CooperativeController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\FmcgController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\Auth\NewAdminUserController;
use App\Http\Controllers\BankTransferController;
use App\Http\Controllers\FmcgPaymentController;
use App\Http\Controllers\Loan\LoanController;
use App\Http\Controllers\Loan\CooperativeLoan;
use App\Http\Controllers\Loan\MemberLoan;
use App\Http\Controllers\Wallet\WalletController;
use App\Http\Controllers\Wallet\AdminWalletController;
use App\Http\Controllers\Wallet\MemberWalletController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['verify' => true]);
Route::get('/', function () {
    return view('index');
});
Route::group(['middleware' => ['ipcheck']], function () {
    // your routes here
    Route::webhooks('paystack/webhook');
});

 //Clear route cache
 Route::get('/route-clear', function() {
    \Artisan::call('route:clear');
    return 'Routes cache cleared';
});

//Clear config cache
Route::get('/config-clear', function() {
    \Artisan::call('config:clear');
    return 'Config cache cleared';
}); 

// Clear application cache
Route::get('/cache-clear', function() {
    \Artisan::call('cache:clear');
    return 'Application cache cleared';
});

// Clear view cache
Route::get('/view-clear', function() {
    \Artisan::call('view:clear');
    return 'View cache cleared';
});

// Clear cache using reoptimized class
Route::get('/optimize-clear', function() {
    \Artisan::call('optimize:clear');
    return 'View cache cleared';
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/')->with('success','Verification successful');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::group(['middleware' => ['auth']], function() {
    Route::post('logout', [App\Http\Controllers\Auth\LogoutController::class,'logout'])->name('logout');
    Route::get('show-change-password',[App\Http\Controllers\HomeController::class, 'showChangePassword'])->name('show-change-password');
    Route::post('change-password',[App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');
    Route::get('add-review/{product_id}/userreview', [ReviewController::class, 'add']); 
    Route::post('add-review', [ReviewController::class, 'create']);
});
//users activity log
Route::controller(HomeController::class)->group(function () {
    Route::get('add-to-log',  'myTestAddToLog');
    Route::get('logActivity', 'logActivity');
    //profile
    Route::get('account-settings', 'settings')->name('account-settings');
    Route::post('/update-profile',  'updateProfile')->name('update-profile');
    Route::post('/update-profile-image',  'updateProfileImage')->name('update-profile-image');

   Route::post('/cooperative-update-profile',  'cooperativeUpdateProfile')->name('cooperative-update-profile');
    Route::post('/update-bank-details',  'UpdateBankAccount')->name('update-bank-details');
    Route::post('/fmcg-update-profile',  'fmcgUpdateProfile')->name('fmcg-update-profile');
    Route::post('/member-update-profile',  'memberUpdateProfile')->name('member-update-profile');
    Route::post('/seller-update-profile', 'sellerUpdateProfile')->name('seller-update-profile');
    Route::post('/update_profile_image',  'updateProfileImage')->name('update_profile_image');
    Route::post('/update_certificate',  'updateCertificate')->name('update_certificate');
    Route::get('verify-account-number', 'verify-account-number');
});
 //Superadmin
Route::controller(SuperAdminController::class)->group(function () {
    Route::get('superadmin',  'index')->name('superadmin');
    Route::get('show-set-password',  'showSetPassword')->name('show-set-password');
    Route::post('set-password','setPassword')->name('set-password');
    Route::get('sales_invoice/{order_number}', 'sales_invoice')->name('sales_invoice');
    Route::get('order/{order_number}', 'order_details')->name('order_details');
    Route::get('sales-details',  'salesDetails')->name('sales-details');
    Route::post('/mark_paid',  'mark_paid')->name('mark_paid');
    Route::get('products_list', 'products_list')->name('products_list');
    Route::get('fmcg-products-list', 'fmcgProductsList')->name('fmcg-products-list');
    Route::get('edit-vendor-product/{id}', 'editVendorProduct')->name('edit-vendor-product');
    Route::get('edit-fmcg-product/{id}', 'editFmcgProduct')->name('edit-fmcg-product');
    Route::put('update-fmcg-product/{id}', 'updateFmcgProduct')->name('update-fmcg-product');
    
    Route::post('company-remove-product',  'removeAllProduct')->name('company-remove-product');
    Route::get('removed_product',  'removed_product')->name('removed_product');
    Route::get('users_list', 'users_list')->name('users_list');
    Route::put('user_update/{id}', 'user_update')->name('user_update');
    Route::get('user_edit/{id}', 'user_edit')->name('user_edit');
    Route::get('transactions',  'transactions')->name('transactions');
    Route::post('/approved',  'approved')->name('approved');
    Route::post('allocate_fund',  'allocateFund')->name('allocate_fund');
    Route::get('order-history',  'orderHistory')->name('order-history');
    Route::get('funds-allocated', 'fundsAllocated')->name('funds-allocated');
    Route::put('about_update/{id}', 'about_update')->name('about_update');
    Route::get('about_edit/{id}',  'about_edit')->name('about_edit');
    Route::get('about_us',  'about')->name('about_us');
    //privacy page s
    Route::get('privacy', 'privacy')->name('privacy');
    Route::get('privacy_edit/{id}',  'privacy_edit')->name('privacy_edit');
    Route::put('privacy_update/{id}',  'privacy_update')->name('privacy_update');
    Route::get('refund',  'refund')->name('refund');
    Route::get('refund_edit/{id}',  'refund_edit')->name('refund_edit');
    Route::put('refund_update/{id}',  'refund_update')->name('refund_update');
    Route::get('tandc', 'tandc')->name('tandc');
    Route::get('tandc_edit/{id}', 'tandc_edit')->name('tandc_edit');
    Route::put('tandc_update/{id}', 'tandc_update')->name('tandc_update');
    Route::get('add-new-admin',  'addNewAdmin')->name('add-new-admin');
    Route::get('delete-user/{id}', 'deleteUser')->name('delete-user');
    Route::get('edit-fund-request/{id}',  'editFundRequest')->name('edit-fund-request');
    Route::post('/cancel-fund',  'cancelFundRequest')->name('cancel-fund');
    Route::get('/reset-user-password/{id}',  'resetUserPassword')->name('reset-user-password');
    Route::get('all-vendors',  'allVendors')->name('all-vendors');
    Route::get('all-cooperatives',  'allCooperative')->name('all-cooperatives');
    Route::get('all-fmcgs',  'allFMCG')->name('all-fmcgs');
    Route::get('all-cooperative-members/{id}',  'allCooperativeMembers')->name('all-cooperative-members');
    Route::get('vendor-store/{id}',  'eachVendorProduct')->name('vendor-store');
    Route::get('fmcg-store/{id}',  'eachFMCGProduct')->name('fmcg-store');

  
});
//Cooperatives
Route::controller(CooperativeController::class)->group(function () {
    Route::get('cooperative',  'index')->name('cooperative');
    //cooperative admin see's invoice of his/her members only
    Route::get('invoice/{order_number}',  'invoice')->name('invoice');
    Route::get('members', 'members')->name('members');
    Route::get('delete-member/{id}', 'deleteMember')->name('delete-member');
    Route::get('add_new_product', 'addProduct')->name('add_new_product');
    Route::get('credit',  'members')->name('credit');
     //soft delete.
    Route::get('coopremove_product/{id}',  'coopremove_product')->name('coopremove_product');
    Route::get('cooperative-sales',  'cooperativeSales')->name('cooperative-sales');
    Route::get('admin-member-order',  'cooperativeMemberOrder')->name('admin-member-order');
    Route::get('admin-customer-order',  'cooperativeCustomerOrder')->name('admin-customer-order');
    Route::get('admin-order-history',  'adminOrderHistory')->name('admin-order-history');
    Route::get('/admin-products/',  'adminProducts')->name('admin-products');
    Route::get('cancel-new-order/{id}',  'cancelMemberNewOrder')->name('cancel-new-order');
    Route::post('/order-cancel',  'cancelOrder')->name('order-cancel');
    Route::get('view-canceled-orders', 'viewCanceledOrders')->name('view-canceled-orders');
    Route::put('admin-update-product/{id}', 'updateProduct')->name('admin-update-product');
    Route::get('admin-edit-product/{id}', 'editProduct')->name('admin-edit-product');
    Route::get('admin-remove-product/{id}',  'removeProductPage')->name('admin-remove-product');
    Route::post('remove-admin-product',  'removeProduct')->name('remove-admin-product');
    Route::get('approve-order/{id}',  'approveMemberOrderPage')->name('approve-order');
    Route::post('admin-approve-order',  'approveOrder')->name('admin-approve-order');
});
//Members
Route::controller(MembersController::class)->group(function () {
    Route::get('dashboard',  'index')->name('dashboard');
    Route::get('cancel-order/{id}', 'cancelOrderPage')->name('cancel-order');
    Route::post('cancel', 'cancelOrder')->name('cancel');
    Route::get('member-order',  'memberOrderHistory')->name('member-order');
    Route::get('member_invoice/{order_number}',  'member_invoice')->name('member_invoice');
});
//Merchants
Route::controller(MerchantController::class)->group(function () {
    Route::get('merchant', 'index')->name('merchant');
    Route::get('vendor-new-product', 'newProduct')->name('vendor-new-product');
    Route::post('add-product',  'addProductToStore');
    Route::get('vendor-products', 'vendorProducts')->name('vendor-products');
    Route::put('update-product/{id}', 'updateProduct')->name('update-product');
    Route::get('edit-product/{id}', 'editProduct')->name('edit-product');
    //soft delete.
    Route::get('remove-product/{id}',  'removeProductPage')->name('remove-product');
    Route::post('remove',  'removeProduct')->name('remove');
    Route::get('vendor-sales',  'vendorSales')->name('vendor-sales');
    //Seller see's invoice of  paid order
    Route::get('vendor-sales-invoice/{order_number}',  'invoice')->name('vendor-sales-invoice');
    //Route::get('payout', [App\Http\Controllers\MerchantController::class, 'payout'])->name('payout');
});
//FMCG
Route::controller(FmcgController::class)->group(function () {
    Route::get('fmcg',  'index')->name('fmcg');
    Route::get('fmcg-new-product',  'fcmgNewProductPage')->name('fmcg-new-product');
    Route::post('fmcg-add-product',  'fcmgAddProductToStore');
    Route::get('fmcg-products', 'fmcgProducts')->name('fmcg-products');
    Route::get('fmcg-members',  'fmcgMembers')->name('fmcg-members');
    Route::put('fmcg-update-product/{id}', 'updateProduct')->name('fmcg-update-product');
    Route::get('fmcg-edit-product/{id}', 'editProduct')->name('fmcg-edit-product');
    //soft delete.
    Route::get('fmcg-remove-product/{id}',  'removeProductPage')->name('fmcg-remove-product');
    Route::post('remove-fmcg-product',  'removeProduct')->name('remove-fmcg-product');
    Route::get('fmcg-sales',  'fmcgSales')->name('fmcg-sales');
    Route::get('fmcg-sales-invoice/{order_number}',  'invoice')->name('fmcg-sales-invoice');
    
});
//FMCG Products Landing Page
Route::controller(FmcgProductController::class)->group(function () {
    Route::get('fmcg-add-to-cart/{id}',  'fmcgAddToCart')->name('add.product.to.cart');
    Route::get('fmcgcart',  'fmcgcart')->name('fmcgcart');
    Route::post('update-fmgcart',  'updatefmcg')->name('update.fmcgcart');
    Route::post('remove-from-fmcgcart',  'removefmcg')->name('remove.from.fmcgcart');
    Route::match(['get', 'post'],'fmcgcheckout',  'fmcgcheckout'); 
    Route::get('/fmcg_category/', 'fmcgCategory')->name('fmcg_category');
    Route::get('fmcgs_products', 'fmcgsProducts')->name('fmcgs_products');
});

//General Product landing page
Route::controller(ProductController::class)->group(function () {
    Route::get('/', 'index'); 
    Route::get('/vendor-product/{vendor}',  'vendorProduct')->name('vendor-product');
    Route::get('cart',  'cart')->name('cart');
    Route::get('add-to-cart/{id}',  'addToCart')->name('add.to.cart');
    Route::get('add-to-wish/{id}',  'addWishList')->name('add.to.wish');
    Route::get('wishlist',  'wishlist')->name('wishlist');
    Route::post('remove-from-wish', 'removeWishlist')->name('remove.from.wish');
    Route::post('update-cart',  'update')->name('update.cart');
    Route::post('remove-from-cart',  'remove')->name('remove.from.cart');
    Route::match(['get', 'post'],'checkout', 'checkout'); 
    // product preview page 
    Route::get('add-cart/{id}',  'addToCartPreview')->name('add.cart');
    Route::get('preview/{prod_name}', 'preview')->name('preview');
    Route::get('add-to-wish/{id}', 'addWishList')->name('add.to.wish');
    Route::get('wishlist',  'wishlist')->name('wishlist');
    Route::post('remove-from-wish',  'removeWishlist')->name('remove.from.wish');
    Route::get('about', 'about_us')->name('about');
    Route::get('privacy_policy', 'privacy_policy')->name('privacy_policy');
    Route::get('return_policy', 'return_policy')->name('return_policy');
    Route::get('terms',  'terms')->name('terms');
});

Route::controller(VoucherController::class)->group(function () {
    // add credit for members
    Route::post('/credit_limit', 'credit_limit')->name('credit_limit');
    Route::post('limit', 'limit')->name('limit');
    //Route::get('/addcredit',  'load_wallet')->name('addcredit');
    Route::post('/addcredit',  'load_wallet')->name('addcredit');
    //Route::get('/payout',  'withdraw')->name('payout');
    Route::post('/payout',  'withdraw')->name('payout');
});
//member signup
Route::controller(RegisterController::class)->group(function () {
    Route::get('/reload-captcha',  'reloadCaptcha');

});
//cooperative signup
Route::controller(CoopController::class)->group(function () {
    Route::get('cooperative-register',  'registerCooperative')->name('cooperative-register');
    Route::get('member-register',  'registerMember')->name('member-register');
    Route::post('create-member',  'createMember')->name('create-member');
    Route::post('coop_insert', 'coop_insert')->name('coop_insert');
    Route::post('add-member', 'adminAddNewMember')->name('add-member');
});
//Merchant signup
Route::controller(SellerController::class)->group(function () {
    Route::get('seller-register', 'registerSeller')->name('seller-register');
    Route::post('seller_insert',  'seller_insert')->name('seller_insert');

});
//search product by category
Route::controller(CategoriesController::class)->group(function () {
    Route::get('/category/', 'category')->name('category');
    Route::group(['middleware' => ['only.ajax']], function() {
        Route::get('autocomplete', 'autocomplete')->name('autocomplete');
    });  
});

Route::controller(OrderController::class)->group(function () {
    Route::get('confirm_order','confirm_order')->name('confirm_order');
    Route::post('order', 'order')->name('order');  
    Route::get('request-product-loan/{id}', 'requestProductLoan')->name('request-product-loan');
    Route::get('calculate-product-interest/{id}/{amount}/{duration}', 'calculateProductLoanInterest')->name('calculate-product-interest');
    Route::get('send-to-admin/{id}', 'sendMemberOrderToAdmin')->name('send-to-admin');
});
Route::controller(NewsletterController::class)->group(function () {
    Route::post('newsletter', 'store');
    Route::get('subscribers', 'subscribers')->name('subscribers');
});
//superadmin add new admins users
Route::controller(NewAdminUserController::class)->group(function () {
    Route::post('/add_admin', 'newAdminUser')->name('add_admin');
});
//Credit Request
Route::controller(FundRequestController::class)->group(function () {

    Route::get('request-fund',  'requestFund');  
    Route::post('send-fund-request', 'sendFundRequest')->name('send-fund-request');
    Route::get('/show-fundrequest',  'showFundrequest')->name('show-fundrequest');
    Route::post('member_request_fund_wallet', 'memberFundWallet')->name('member_request_fund_wallet'); 
});
//Cooperative payment for member approved order
Route::controller(BankTransferController::class)->group(function () {
    Route::get('bank-payment/{order_id}', 'bankPayment')->name('bank-payment');
    Route::post('bank-transfer', 'bankTransfer')->name('bank-transfer');
    Route::get('payment-bank-tranfer/{reference}/{order_id}/{order_amount}', 'bankTransferPayment'); 
});
// Paystack payment gateway
Route::controller(CardPaymentController::class)->group(function () {
    Route::post('/pay',  'redirectToGateway')->name('pay');
    Route::get('/payment/callback',   'handleGatewayCallback');  
});
// Payment from FMCG product page
Route::controller(FmcgPaymentController::class)->group(function () {
    Route::post('/fmcgpay',  'redirectToGateway')->name('fmcgpay');
    Route::get('/fmcg/callback',   'fmcgCallback')->name('fmcg/callback'); 
    Route::get('fmcg-payment/{reference}/{order_amount}', 'fmcgPayment'); 
});
// notification 
Route::controller(NotificationController::class)->group(function () {
    Route::get('/mark-as-read', 'markAllNotificationAsRead')->name('mark-as-read');
    Route::get('/read/{id}', 'readNotification')->name('read'); 
    Route::get('superadmin-read-fund-request/{id}',  'fundRequestNotification')->name('superadmin-read-fund-request');
    //new product
    Route::get('/new-product','allNewProductNotification')->name('new-product');
    Route::get('/read-product/{id}','readAProductNotification')->name('read-product'); 
    //product approved
    Route::get('/product-approved','NewApprovedProductNotification')->name('product-approved');
    Route::get('/read-product-approved/{id}','readNewApprovedProductNotification')->name('read-product-approved');  
    Route::post('order-delivery/{id}/{product_id}', 'orderDelivered')->name('order-delivery');
    Route::post('fmcg-order-delivery/{id}/{product_id}', 'fmcgOrderDelivered')->name('fmcg-order-delivery');
    Route::get('/product-delivered','allProductDeliveredNotification')->name('product-delivered');
    Route::get('/read-product-delivered/{id}','readAProductDeliveredNotification')->name('read-product-delivered');
    Route::post('order-received/{id}', 'orderReceived')->name('order-received');
    Route::get('/product-received','allProductReceivedNotification')->name('product-received');
    Route::get('/read-product-received/{id}','readAProductReceivedNotification')->name('read-product-received');
    Route::get('/read-all-payment','allNewCardPaymentNotification')->name('read-all-payment');
    Route::get('/read-seller-payment/{id}','readACardPaymentNotification')->name('read-seller-payment');
    Route::get('/read-company-payment/{id}',' ')->name('read-company-payment');
    Route::get('/read-all-order','allNewOrderNotification')->name('read-all-order');
    Route::get('/read-order/{id}','NewOrderNotification')->name('read-order');
    Route::get('/read-admin-order/{id}','readAnOrderNotification')->name('read-admin-order');
    Route::get('/read-admin-member-order/{id}','readAdminMemberOrderNotification')->name('read-admin-member-order');
    Route::get('/read-member-order/{id}','readMemberApprovedOrder')->name('read-member-order');
    Route::get('/read-company-order/{id}','readAnOrderSuperadmin')->name('read-company-order');
    Route::get('/read-all-cancel-order','AdminCancelOrderNotification')->name('read-all-cancel-order');
    Route::get('/read-cancel-order/{id}','readAdminCancelOrderNotification')->name('read-cancel-order');
    Route::get('/read-all-approve-funds','ApproveFundNotification')->name('read-all-approve-funds');
    Route::get('/read-approve-funds/{id}','readApproveFundNotification')->name('read-approve-funds');
    Route::get('/read-cancel-funds/{id}','readCancelFundNotification')->name('read-cancel-funds');
    //admin  loan
    Route::get('/new-loan/{id}','NewLoanNotification')->name('new-loan');
    Route::get('/read-new-loan/{id}','readNewLoanNotification')->name('read-new-loan');
    //member loan
    Route::get('/approve-loan/{id}','ApprovedLoanNotification')->name('approve-loan');
    Route::get('/read-approve-loan/{id}','readApprovedLoanNotification')->name('read-approve-loan');
    //vendor  sales 
    Route::get('/new-sales/{id}','NewSalesNotification')->name('new-sales');
    Route::get('/read-new-sales/{id}','readNewSalesNotification')->name('read-new-sales');
    Route::get('/all-notification','showAllUnreadNotification')->name('all-notification');
    
});

Route::controller(LoanController::class)->group(function () {
    Route::get('loan', 'loan');
    Route::post('add-loan', 'addLoan')->name('add-loan');
    Route::post('cooperative-add-loan', 'cooperativeAddLoan')->name('cooperative-add-loan');
    Route::get('admin-loan-statement/{id}', 'cooperativeloanInvoice')->name('admin-loan-statement');
    Route::get('loan-statement/{id}', 'memberloanInvoice')->name('loan-statement');
    Route::get('signature-pad', 'signaturePad');
    Route::post('signature-pad', 'uploadSignature')->name('signature.pad');

});
//Cooperative Loan
Route::controller(CooperativeLoan::class)->group(function () {
    Route::post('loan-settings', 'updateLoanSetting')->name('loan-settings');
    Route::get('cooperative-loan', 'cooperativeLoan')->name('cooperative-loan');
    Route::get('cooperative-loan-type', 'loanType')->name('cooperative-loan-type');
    Route::post('add-loan-type', 'addLoanType')->name('add-loan-type');
    Route::get('cooperative-approve-loan/{id}', 'cooperativeApproveLoan');
    Route::post('approve-loan', 'approveLoan');
    Route::get('cooperative-loan-payout/{id}', 'cooperativeLoanPayOut');
    Route::get('calulate-loan-repayment/{id}/{date}', 'calLoanRepayment');
    Route::post('cooperative-loan-repayment', 'storeLoanRepayment')->name('cooperative-loan-repayment');
    Route::get('cooperative-create-loan', 'createMemberLoan');
    Route::get('calculate-member-interest/{amount}/{duration}/{members}', 'calculateInterest')->name('calculate-member-interest');
    Route::get('requested-loans', 'requestedLoan');
    Route::get('approved-loans', 'approvedLoan');
    Route::get('payout-loans', 'payOutLoan');
    Route::get('admin-edit-loan-type/{id}', 'editLoanType')->name('admin-edit-loan-type');
    Route::put('admin-update-loan-type/{id}', 'updateLoanType')->name('admin-update-loan-type');
    Route::get('admin-remove-loan-type/{id}',  'removeLoanTypePage')->name('admin-remove-loan-type');
    Route::post('remove-admin-loan-type',  'removeAdminLoanType')->name('remove-loan-type');
    Route::get('cooperative-due-loan', 'adminDueLoans');
});

//Member Loan
Route::controller(MemberLoan::class)->group(function () {
    Route::get('member-request-loan', 'requestLoan')->name('member-request-loan');
    Route::get('member-loan-history', 'loanHistory')->name('member-loan-history');
    Route::get('calculate-interest/{amount}/{duration}', 'calculateInterest')->name('calculate-interest');  
});
//Wallet
Route::controller(WalletController::class)->group(function (){
    Route::get('wallet', 'userWallet')->name('wallet');
    Route::get('create-wallet', 'createWallet');
    Route::post('store-wallet', 'storeWallet')->name('store-wallet');
    Route::get('bvn-verify-consent/{bvn}', 'bvnConsent');
    Route::post('create-wallet-account', 'createWalletAccount')->name('create-wallet-account');
    Route::post('fund-wallet', 'fundWalletAccount')->name('fund-wallet');
    Route::get('fund-wallet-account/{reference}/{user_id}/{wallet_id}/{amount}', 'fundWalletAccount');
    Route::get('wallet-history', 'walletHistory')->name('wallet-history');
    Route::post('cash-payment', 'cashPayment')->name('cash-payment');
    Route::post('fmcg-cash-payment', 'fmcgCashPayment')->name('fmcg-cash-payment');
});

//Admin Wallet
Route::controller(AdminWalletController::class)->group(function () {
    Route::get('admin-wallet', 'adminWallet');

});
//Member Wallet
Route::controller(MemberWalletController::class)->group(function (){

});

