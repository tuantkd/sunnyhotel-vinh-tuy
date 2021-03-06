<?php
use App\Http\Middleware\CheckLogin;
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
/*ADMIN*/
//Trang chủ
Route::get('home-admin', 'AdminController@index_admin')->middleware(CheckLogin::class);
/*==================================================*/




/*==================================================*/
//Danh sách người dùng
Route::get('list-user', 'AdminController@list_user')->middleware(CheckLogin::class);
Route::post('post-list-user', 'AdminController@post_list_user')->middleware(CheckLogin::class);

//Xóa người dùng
Route::get('delete-user', 'AdminController@delete_user')->middleware(CheckLogin::class);

//thông tin cá nhân
Route::get('profile-admin', 'AdminController@profile_admin')->middleware(CheckLogin::class);

//profile
Route::put('update-profile-user/{id_user}', 'AdminController@update_profile_user')->middleware(CheckLogin::class);
/*==================================================*/




/*==================================================*/
//Danh sách loại phòng
Route::get('list-category-room', 'AdminController@list_category_room')->middleware(CheckLogin::class);
Route::post('post-category-room', 'AdminController@post_category_room')->middleware(CheckLogin::class);

//Xóa loại phòng
Route::get('delete-category-room', 'AdminController@delete_category_room')->middleware(CheckLogin::class);
/*==================================================*/



/*==================================================*/
//danh dách phòng
Route::get('list-room', 'AdminController@list_room')->middleware(CheckLogin::class);

//Xem theo loai phòng
Route::get('view-category/{id}', 'AdminController@view_category')->middleware(CheckLogin::class);

Route::post('post-room', 'AdminController@post_room')->middleware(CheckLogin::class);

//danh dách phòng (sửa)
Route::get('edit-room/{id_room}', 'AdminController@edit_room')->middleware(CheckLogin::class);

//Cập nhật phòng
Route::put('update-room/{id_room}', 'AdminController@update_room')->middleware(CheckLogin::class);

//Xóa phòng
Route::get('delete-room', 'AdminController@delete_room')->middleware(CheckLogin::class);
/*==================================================*/

//danh sách hình ảnh phòng
Route::get('list-image-room', 'AdminController@list_image_room')->middleware(CheckLogin::class);
Route::post('post-image-room', 'AdminController@post_image_room')->middleware(CheckLogin::class);

//Xóa  hình ảnh phòng
Route::get('delete-image-room', 'AdminController@delete_image_room')->middleware(CheckLogin::class);



/*==================================================*/
//danh sách khách hàng
Route::get('list-customer', 'AdminController@list_customer')->middleware(CheckLogin::class);
Route::post('post-customer', 'AdminController@post_customer')->middleware(CheckLogin::class);

//danh sách khách hàng(SỬA)
Route::get('edit-customer', 'AdminController@edit_customer')->middleware(CheckLogin::class);

//Xóa khách hàng
Route::get('delete-customer', 'AdminController@delete_customer')->middleware(CheckLogin::class);



/*==================================================*/
//danh sách đặt phòng
Route::get('list-book-room', 'AdminController@list_book_room')->middleware(CheckLogin::class)->middleware(CheckLogin::class);

//Xem lich su đặt phòng
Route::get('view-history-book-room', 'AdminController@view_history_book_room')->middleware(CheckLogin::class);

//Sửa danh sách đặt phòng
Route::get('edit-book-room', 'AdminController@edit_book_room')->middleware(CheckLogin::class);

//Xóa đặt phòng
Route::get('delete-book-room/{id}', 'AdminController@delete_book_room')->middleware(CheckLogin::class);

//chi tiết đặt phong mới
Route::get('list-book-detail/{id}', 'AdminController@list_book_detail')->middleware(CheckLogin::class);

//chi tiết đặt phong mới
Route::get('list-book-detail-temp/{id}', 'AdminController@list_book_detail_temp')->middleware(CheckLogin::class);

//Xóa sau khi xuất hóa đơn
Route::get('delete-book-room-temps/{id}', 'AdminController@delete_book_room_temps')->middleware(CheckLogin::class);

//Duyệt
Route::get('check-book-room/{id_bookroom}/{id_bookdetail}', 'AdminController@check_book_room')->middleware(CheckLogin::class);

//chi tiết đặt phong mới
Route::get('edit-book-detail', 'AdminController@edit_book_detail')->middleware(CheckLogin::class);

/*===========================================================*/
//QUYỀN TRUY CẬP
Route::get('list-role-access', 'AdminController@list_role_access')->middleware(CheckLogin::class);
Route::post('post-list-role-access', 'AdminController@post_list_role_access')->middleware(CheckLogin::class);
Route::get('delete-role/{id}', 'QuanTriController@delete_role')->middleware(CheckLogin::class);

//QUYỀN TRUY CẬP(SỬA)
Route::get('edit-role-access', 'AdminController@edit_role_access')->middleware(CheckLogin::class);
/*===========================================================*/




//Login
Route::get('login', 'AdminController@login');
Route::get('logout', 'AdminController@logout');
Route::post('post-login', 'AdminController@post_login');




/*===========================================================*/
//Danh sách dịch vụ
Route::get('list-service-admin', 'AdminController@list_service');
Route::post('post-service', 'AdminController@post_service');
Route::get('edit-service/{id}', 'AdminController@edit_service');
Route::put('update-service/{id}', 'AdminController@update_service');

//Danh sách loại dịch vụ
Route::get('list-category-service', 'AdminController@list_category_service');
Route::post('post-category-service', 'AdminController@post_category_service');
Route::get('delete-category-service', 'AdminController@delete_category_service');

//Hình ảnh dịch vụ
Route::get('list-image-service', 'AdminController@list_image_service');
Route::post('post-image-service', 'AdminController@post_image_service');

//Xóa  hình ảnh dịch vụ
Route::get('delete-image-service', 'AdminController@delete_image_service');

//Xóa dịch vụ
Route::get('delete-service', 'AdminController@delete_service');










/*HOME*/
//trang đánh giá sao
Route::post('post-rating-star/{id_room}', 'HomeController@post_rating_star');


//hiển thị trang đăng kí
Route::get('registration', 'HomeController@registration');

//hiển thị xem email
Route::get('mail', 'HomeController@mail');

//đăng kí thành viên
Route::post('post-add-member', 'HomeController@post_add_member');

//đăng xuất
Route::get('logout', 'HomeController@logout');


//Hiển thị trang chủ
Route::get('/', 'HomeController@index_home');

//Hiển thị phòng
Route::get('room', 'HomeController@index_room');

//Đặt phòng
Route::get('book-room/{id}', 'HomeController@book_room');

//Trang xem chi tiết phòng
Route::get('view-detail-room/{id_room}', 'HomeController@view_detail_room');

//Trang đặt phòng
Route::get('index-bookroom', 'HomeController@index_bookroom');

//Trang chi tiết đặt phòng
Route::get('detail-book-room', 'HomeController@detail_book_room');

//Thanh toán đặt phòng
Route::post('post-checkout-bookroom', 'HomeController@post_checkout_bookroom');

//Xem loại phòng
Route::get('view-category-room/{id_room}', 'HomeController@view_category_room');


//Hiển thị trang giới thiệu
Route::get('index-about', 'HomeController@index_about');

//Hiển thị trang liên hệ
Route::get('index-contact', 'HomeController@index_contact');

//Thêm khách hàng góp ý
Route::post('post-customer-feedback', 'HomeController@post_customer_feedback');



//trang danh sách dịch vụ
Route::get('list-service', 'HomeController@list_service');

//trang danh sách loại dịch vụ
Route::get('view-category-service/{id}', 'HomeController@view_category_service');

//trang xem chi tiết dịch vụ
Route::get('view-service-detail/{id}', 'HomeController@view_service_detail');

