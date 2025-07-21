<?php

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
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/series-update', 'TestController@getSeriesUpdate');
Route::post('/series-update', 'TestController@getSeriesUpdate');



//Clear All 
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!!!";
 });
 
 //Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});
 Route::get('/userexpiry_email', function(){
    Artisan::call('schedule:run');
 });
Auth::routes();

Route::get('/', 'HomeContentsController@viewCategories');
Route::get('/home', 'HomeContentsController@viewCategories');
Route::get('home-data', 'HomeContentsController@getMoreCategories');
Route::get('/test', 'ProductController@mailTest');

Route::get('/register-offline-users', function() { return view('registerOffline'); });
Route::post('/updatePassword', ['as'=>'update.password','uses'=>'HomeContentsController@updatePassword']);
Route::post('/offline-members', ['as'=>'register.offline','uses'=>'GuestUserController@registerOfflineUsers']);
Route::get('/import-offline-users', function() { return view('importOffline'); });
Route::post('/import-members', ['as'=>'import.offline','uses'=>'GuestUserController@importOfflineUsers']);
Route::get('/cronimport-offline-users', function() { return view('cronimportOffline'); });
Route::post('/cronimport-members', ['as'=>'cronimport.offline','uses'=>'GuestUserController@cronimportOfflineUsers']);
Route::get('/sampleExcel', ['as'=>'sample.excel','uses'=>'GuestUserController@sampleExcel']);
Route::get('/password/updated', function () {
    return view('passwordUpdated');
});
Route::get('/reset/password', function () {
    return view('resetPassword');
});
Route::get('/our-clients', function() { return View::make('pages.clients'); });
Route::get('/form', function() { return View::make('pages.form'); });
Route::get('/aboutus', function() { return View::make('pages.aboutus'); });
Route::get('/cartpage', function() { return View::make('pages.cartpage'); });
// Route::get('/membership-account', function() { 
//     return view('pages.membership-account');
// }); 
// Route::get('/our-e-series', function() {  return View::make('pages.our-e-series'); });
Route::get('/membership-account', 'UsersController@currentUser');
Route::post('/update-profile', ['as'=>'profile.edit','uses'=>'UsersController@updateProfile']);
Route::post('/update-password', ['as'=>'password.edit','uses'=>'UsersController@updatePassword']);

Route::get('/our-e-series', 'EseriesContentsController@viewCategories');
Route::get('/our-distributers', function() { return View::make('pages.our-distributers'); });
Route::get('/series-book', function() { return View::make('pages.series-book'); });
Route::get('/single-series-book', function() { return View::make('pages.single-series-book'); });
Route::get('/our-publishing-partners', function() { return View::make('pages.our-publishing-partners'); });

Route::get('/faq', function() { return View::make('pages.faq'); });
Route::get('/tc', function() { return View::make('pages.tc'); });
Route::get('/pvp', function() { return View::make('pages.pvp'); });
Route::get('/box', function() { return View::make('pages.box'); });
Route::get('/box', 'BookPurchaseController@bookPurchase')->name('bookpurchase');
Route::post('/box-data', 'BookPurchaseController@bookPurchaseData')->name('bookpurchase.data');
Route::post('/add-to-box', 'BookPurchaseController@addToBoxProductCart');

Route::get('/posts/{id}', 'BlogController@viewPosts');

Route::get('/blog', 'BlogController@viewAllPosts');
Route::post('/postComment', ['as'=>'post.comment','uses'=>'BlogController@comments']);
Route::post('/postReply', ['as'=>'post.reply','uses'=>'BlogController@replyComments']);
//Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

Route::get('ckeditor', 'CKEditorController@index');
Route::post('ckeditor/upload', 'CKEditorController@uploadCK')->name('ckeditor.upload');

Route::get('file-upload', 'FileUploadController@fileUpload')->name('file.upload');
Route::post('file-upload', 'FileUploadController@fileUploadPost')->name('file.upload.post');

Route::any('payment', ['as'=>'cart.payment','uses'=>'PaymentController@payment']);
Route::any('checkout', ['as'=>'cart.checkout','uses'=>'PaymentController@getCheckout']);
Route::get('cart', 'CartController@getCarts');
Route::get('subscribe', 'CartController@getSubscribe');

Route::post('active-session', 'SessionController@validateActiveSession');
Route::post('logout-session', 'SessionController@logoutActiveSession');
Route::get('/confirm-login', 'SessionController@confirmLoginData');

Route::get('/single-e-book-series-book', function() { return View::make('pages.single-e-book-series-book'); });
// Route::get('/e-book', function() { return View::make('pages.e-book'); });
// Route::get('/product-details', function() { return View::make('pages.product-details'); });
// Route::get('/{id}', 'BooksController@viewBooks');
Route::get('/ebook/{id}', 'EBooksController@viewEBooks');
Route::get('/trial-series', 'TrialBooksController@viewCategories');
Route::get('/trial-books', 'TrialBooksController@getAllTrialBooks');
Route::get('/trial-books/{id}', 'TrialBooksController@viewTrialBooks');
Route::get('/read-book/{id}/{sku}', 'EBooksController@readEBook');
Route::get('/read-trial-book/{id}', 'TrialBooksController@readTrialBook');
Route::get('/product/{id}/{sku}', 'ProductController@viewProduct');
// siva  ProductSeriesController   SeriesController   pages/single-series-book
Route::get('/series/{id}', 'ProductSeriesController@SeriesController');

Route::post('/add-to-cart', 'CartController@addToCart');
Route::get('/cart/view', 'CartController@viewCart');
Route::get('/cart/view-products', 'CartController@viewCartProducts');
Route::post('delete-cart-item', 'CartController@deleteItem');
Route::post('redo-delete-item', 'CartController@redoDeleteItem');

Route::get('/box-bookslist', 'TestController@getBoxBooksList');

// Admin Routes Details
Route::group(['prefix' => 'admin','middleware' => 'admin'], function()
{
    Route::get('/home', 'HomeController@index');
    Route::get('/add-books',['as'=>'admin.add_books','uses'=>'AdminController@addBooks']);
    Route::post('/deactivate-account',['as'=>'admin.deactivate.account','uses'=>'AdminController@deactivateAccount']);
    Route::get('/view-all-books',['as'=>'admin.view_books','uses'=>'AdminController@viewAllBooks']);
    Route::get('/add-trial-books',['as'=>'admin.add_trial_books','uses'=>'AdminController@addTrialBooks']);
    
    Route::post('/create-table',['as'=>'admin.create.table','uses'=>'AdminController@operate']);  
    Route::post('/add-book',['as'=>'admin.insert.book','uses'=>'AdminController@insertBookToTable']);
    Route::post('/update-book',['as'=>'admin.update.book','uses'=>'AdminController@updateBook']);
    Route::post('/view-books-by-cat',['as'=>'admin.show.books','uses'=>'AdminController@viewBooksByCategory']);
    Route::any('/edit-book/{id}/{category}','AdminController@editBook');
    Route::any('/delete-book/{id}/{category}','AdminController@deleteBook');
    Route::post('/add-trial-book',['as'=>'admin.insert.trial.book','uses'=>'AdminController@insertTrialBookToTable']);
    Route::get('/dashboard', 'AdminController@dashboard');
    
    Route::get('/blog',['as'=>'admin.blog','uses'=>'AdminController@listBlog']);
    Route::get('/comments',['as'=>'admin.comments','uses'=>'AdminController@listComments']);
	Route::get('/booklist',['as'=>'admin.booklist','uses'=>'AdminController@listBookList']);
    Route::post('/create-post',['as'=>'admin.create.blogPost','uses'=>'AdminController@createPost']);  
    Route::post('/delete-post',['as'=>'admin.delete.blogPost','uses'=>'AdminController@deletePost']);
    Route::post('/commentconfirmation',['as'=>'admin.comment.confirm','uses'=>'AdminController@commentConfirmation']); 
    Route::get('/subscribed-user-list','AdminController@subscriberList');
    Route::get('/unsubscribed-user-list','AdminController@unsubscriberList');
    Route::get('/notification-screen', function() { return view('pages.notificationScreen'); });

    Route::get('/all-user','AdminController@alluser');  
    Route::get('/coupon','AdminController@couponsList')->name('admin.coupon.list');  
    Route::get('/coupon-create','AdminController@getCouponCreate')->name('admin.coupon.create');  
    Route::post('/coupon-store','AdminController@postCouponStore')->name('admin.coupon.store');
    Route::any('/coupon-delete/{id}','AdminController@couponDelete');
    Route::post('/book-deliver','AdminController@postBookDeliver')->name('admin.book.deliver');
});

Route::any('membership/plans', 'MembershipController@checkMembership');
// Route::any('membership/choose-plan', ['as' => 'membership.plan','uses' => 'MembershipController@choosePlan']);
Route::any('membership-plans', 'MembershipController@listPlans');
Route::post('coupon/check', 'MembershipController@checkCoupon');

Route::get('membership', function(){
    return view('pages.membershipDetails');
});
// Route::post('/reset_password_without_token', 'AccountsController@validatePasswordRequest');
// Route::post('/reset_password_with_token', 'AccountsController@resetPassword');

Route::any('subscribe/process', ['as' => 'subscribe-process','uses' => 'CheckoutController@SubscribProcess']);
Route::any('subscribe/cancel', ['as' => 'subscribe-cancel', 'uses' => 'CheckoutController@SubscribeCancel']);
Route::any('subscribe/process/response', ['as' => 'subscribe-response', 'uses' => 'CheckoutController@SubscribeResponse']);
Route::get('/transaction/details', function(){
    return view('pages/transactionSuccess');
});

Route::get('purchase/plan', ['as' => 'purchase.plan', 'uses' => 'CheckoutController@purchasePlanView']);

Route::any('test/mail',function(){
    $to_name = 'Suguna';
    $to_email = 'sugunadevi14@gmail.com';
    $data = array('name'=>'Ogbonna Vitalis(sender_name)', 'body' => 'A test mail');
    \Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
    $message->to($to_email, $to_name)
    ->subject('Laravel Test Mail');
    $message->from('sugunadvp@gmail.com','Test Mail');
    });

});

Route::any('test/mailMe',function(){
   /* $to_name = 'Suguna';
    $to_email = 'pradipshende143@gmail.com';
    $data = array('name'=>'Ogbonna Vitalis(sender_name)', 'body' => 'A test mail MY');
    \Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
    $message->to($to_email, $to_name)
    ->subject('Laravel Test Mail');
    $message->from('Books.littleprodigy@gmail.com','Test Mail Laravel');
     print_r($message->getSwiftMessage());exit;
    });*/
    $mailBodyData = DB::table('mail_body')->get()->first();
    // dd($mailBodyData->id);
    $email = "pradipshende143@gmail.com";
    $subject = str_replace("{year}", "One", $mailBodyData->subject);
    $body = str_replace("{year}", "One", $mailBodyData->body);
    $body = str_replace("{name}", "Pradip", $body);
    $body = str_replace("{password}", "pass123", $body);
    $body = str_replace("{email}", $email, $body);
    $to = $email;
    $subject = urlencode($subject);
    $body = urlencode($body);
// $data = file("http://13.232.174.209/mail/index.php?to=".$to."&subject=".$subject."&body=".$body);
    $data = array('to' => $to, 'subject' => $subject,'body' => $body);
    $url = "http://13.232.174.209/mail/index.php";
    // use key 'http' even if you send the request to https://...
    $options = array('http' => array(
        'method'  => 'POST',
         'header'  => 'Content-Type: application/x-www-form-urlencoded',
        'content' => http_build_query($data)
    ));
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
dd($result);
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

//Testing
Route::get('encry/{string}', 'TestController@encrypt_url');
Route::get('decry/{string}', 'TestController@decrypt_url');

Route::get('table-update', 'TestController@getSeriesUpdate');