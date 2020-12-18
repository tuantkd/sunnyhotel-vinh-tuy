<?php

namespace App\Http\Controllers;
use App\Save_bookroom;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\RoleAccess;
use App\User;
use App\Categoryroom;
use App\Room;
use App\Customer;
use DB;
use App\Service;
use App\ImageService;
use App\ImageRoom;
use App\CategoryService;
use App\BookRoom;
use App\BookRoomTemp;
use App\BookDetail;
use App\BookDetailTemp;

class AdminController extends Controller
{

	//Trang hiển thị trang chủ admin
    public function index_admin()
    {
        if (Auth::check()) {
            return view ('admin.index_admin');
        } else {
            return redirect('login');
        }

    }


    /*======================================================*/
    //Trang hiển thị danh sách người dùng(thêm)
    public function list_user()
    {
        $get_users = User::all();
    	return view ('admin.manager_user.list_user',['get_users'=>$get_users]);
    }


    //Thêm người dùng
    public function post_list_user(Request $request)
    {
        $add_user = new User();
        $add_user->role_id = $request->input('txt_role_id');
        $add_user->fullname = $request->input('txt_fullname_user');
        $add_user->username = $request->input('txt_username_user');
        $add_user->password = bcrypt($request->input('txt_password_user'));
        $add_user->sex = $request->input('txt_sex_user');
        $add_user->phone = $request->input('txt_sdt_user');
        $add_user->address = $request->input('txt_diachi_user');
        $add_user->save();

        $add_user_new = $request->session()->get('add_user_new');
        return redirect()->back()->with('add_user_new','');
    }


    //Trang hiển thị danh sách người dùng(thêm)
    public function profile_admin()
    {
        return view ('admin.profile_admin');
    }
    /*======================================================*/
    //đổi mật khẩu trang Profile_admin
    public function update_profile_user(Request $request, $id_user)
    {
        //Lấy trường id trong bảng user so sánh với thẻ input hidden có chứa id user
        //mà mình muốn thay đổi mật khẩu của nó
        $users = DB::table('users')->where('id',$request->txt_user_id)->get();

        $old_pass = $request->input('txt_old_pass');

        $new_pass = $request->input('txt_new_pass');

        $new_pass_confirm = $request->input('txt_new_pass_confirm');

        //Trong model User tìm đến cái id thẻ input hidden có chứa id user cập nhật nó lại
        $change = User::find($request->txt_user_id);

        foreach($users as $val_users){
            //Lấy mật khẩu trong csdl ra
            $db_pass = $val_users->password;

            //Nếu mật khẩu trong thẻ inout (nhập mật khẩu cũ) mà bằng với mật khẩu trong csdl
            if(password_verify($old_pass,$db_pass)){

                if($new_pass == $new_pass_confirm){
                    $change->password = bcrypt($request->input('txt_new_pass_confirm'));
                    $change->save();

                    $change_password_user = $request->session()->get('change_password_user');
                    return redirect('profile-admin')->with('change_password_user','');

                }else{
                    $change_password_user_fail = $request->session()->get('change_password_user_fail');
                    session()->put('change_password_user_fail');
                    return redirect()->back()->with('change_password_user_fail','');
                }

            }else{
                $old_pass_fail = $request->session()->get('old_pass_fail');
                session()->put('old_pass_fail');
                return redirect()->back()->with('old_pass_fail','');
            }
        }

    }

    //Xóa người dùng
    public function delete_user(Request $request)
    {
        $ids = $request->ids;

        DB::table("users")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Deleted successfully"]);
    }
    /*======================================================*/




    /*======================================================*/
    //Trang hiển thị ds loại phòng
    public function list_category_room()
    {
        $get_category_room = Categoryroom::all();
        return view ('admin.category_room.list_category_room',['get_category_room'=>$get_category_room]);
    }

    //Thêm loại phòng
    public function post_category_room(Request $request)
    {
        $add_category_room = new Categoryroom();
        $add_category_room->category_name = $request->input('txt_category_room');
        $add_category_room->save();

        $add_category_room = $request->session()->get('add_category_room');

        return redirect()->back()->with('add_category_room','');
    }
    /*======================================================*/
    //Trang xóa loại phòng
    public function delete_category_room(Request $request)
    {
        $ids = $request->ids;

        DB::table("categoryrooms")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Deleted successfully"]);
    }
    /*======================================================*/


    /*======================================================*/
    //Trang hiển thị ds phòng
    public function list_room()
    {
        return view ('admin.room.list_room');
    }

    //Xem loai phòng
    public function view_category($id)
    {
        $view_categorys = Categoryroom::find($id);
        return view ('admin.room.view_category',['view_categorys'=>$view_categorys]);
    }

    public function post_room(Request $request)
    {
        $add_rooms = new Room();
        $add_rooms->category_id = $request->input('txt_category_id');
        $add_rooms->room_name = $request->input('txt_name_room');

        if ($request->hasfile('txt_img_room'))
        {
            $file = $request->file('txt_img_room');

            $filename = $file->getClientOriginalName();

            $file->move(public_path('image_room'), $filename);

            $add_rooms->room_image = $filename;
        }


        $add_rooms->room_price = $request->input('txt_price_room');
        $add_rooms->room_describe = $request->input('txt_describe_room');
        $add_rooms->room_status = 0;

        $add_rooms->save();

        $add_room_new = $request->session()->get('add_room_new');
        return redirect()->back()->with('add_room_new','');
    }

    //Cập nhật phòng
    public function update_room(Request $request, $id_room)
    {
        $update_rooms = Room::find($id_room);
        $update_rooms->category_id = $request->input('txt_category_id');
        $update_rooms->room_name = $request->input('txt_name_room');

        if ($request->hasfile('txt_img_room'))
        {
            $file = $request->file('txt_img_room');

            $filename = $file->getClientOriginalName();

            $file->move(public_path('image_room'), $filename);

            $update_rooms->room_image = $filename;
        }


        $update_rooms->room_price = $request->input('txt_price_room');
        $update_rooms->room_describe = $request->input('txt_describe_room');
        $update_rooms->room_status = 0;

        $update_rooms->save();

        $updates = $request->session()->get('updates');
        return redirect('list-room')->with('updates','');
    }


    //Trang hiển thị ds phòng(sửa)
    public function edit_room($id_room)
    {
        $get_room_id = Room::find($id_room);
        return view ('admin.room.edit_room',['get_room_id'=>$get_room_id]);
    }

    //Xóa phòng
    public function delete_room(Request $request)
    {
        $ids = $request->ids;

        DB::table("rooms")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Deleted successfully"]);
    }
    /*======================================================*/

    //Trang hiển thị danh sách hình ảnh phòng
    public function list_image_room()
    {
        $get_image_room = ImageRoom::all();
        return view ('admin.image_room.list_image_room',['get_image_room'=>$get_image_room]);
    }




//thêm hình ảnh phòng
    public function post_image_room(Request $request)
    {
        $add_image_room = new ImageRoom();
        $add_image_room->room_id = $request->input('txt_room_id');
        $add_image_room->room_image = $request->input('txt_img_room');
        if ($request->hasfile('txt_img_room'))
        {
            $file = $request->file('txt_img_room');

            $filename = $file->getClientOriginalName();

            $file->move(public_path('upload_image_room'), $filename);

            $add_image_room->room_image = $filename;
        }
        $add_image_room->save();

        $post_image_room_sesion = $request->session()->get('post_image_room_sesion');
        return redirect('list-image-room')->with('post_image_room_sesion','');
    }

    //Xóa hình ảnh phòng
    public function delete_image_room(Request $request)
    {
        $ids = $request->ids;

        DB::table("image_rooms")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Deleted successfully"]);
    }










    /*======================================================*/
    //Trang hiển thị ds khách hàng csdl
    public function list_customer()
    {
        $get_customer = Customer::all();
        return view ('admin.customer.list_customer',['get_customer'=>$get_customer]);
    }

    public function post_customer(Request $request)
    {
        $add_customer = new Customer();
        $add_customer->full_name = $request->input('txt_name_customer');
        $add_customer->customers_phone = $request->input('txt_sdt_customer');
        $add_customer->customers_address = $request->input('txt_diachi_customer');
        $add_customer->save();

        return redirect('list-customer');
    }

    //Xóa khách hàng
    public function delete_customer(Request $request)
    {
        $ids = $request->ids;

        DB::table("customers")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Deleted successfully"]);
    }
    /*======================================================*/




    /*======================================================*/
    //Trang hiển thị ds đặt phòng
    public function list_book_room()
    {
        $get_book_room = BookRoom::all();
        $get_book_room_temp = BookRoomTemp::all();
        return view ('admin.book_room.list_book_room',
        [
            'get_book_room'=>$get_book_room,
            'get_book_room_temp'=>$get_book_room_temp,
        ]);
    }

    //Trang hiển thị lich su đặt phòng
    public function view_history_book_room()
    {
        $history_book_room = Save_bookroom::all();
        return view ('admin.book_room.history_book_room',
        [
            'history_book_room'=>$history_book_room
        ]);
    }

    //Xóa đặt phòng
    public function delete_book_room(Request $request, $id)
    {

        $book_details = DB::table("book_details")->where('bookroom_id',$id)->get();
        foreach ($book_details as $value) {
            $rooms = DB::table("rooms")->where('id',$value->room_id)->get();
            foreach ($rooms as $data) {
                $id_room = $data->id;
            }
        }

        $change_status = Room::find($id_room);
        $change_status->room_status = 0;
        $change_status->save();

        DB::table("book_rooms")->where('id',$id)->delete();

        $delete_book_room = $request->session()->get('delete_book_room');
        return redirect('list-book-room')->with('delete_book_room','');
    }

    //Trang hiển thị chi tiết đặt phòng
    public function list_book_detail($id)
    {
        $get_book_room = BookRoom::find($id);
        return view ('admin.book_detail.list_book_detail',['get_book_room'=>$get_book_room]);
    }

    //Xóa sau khi xuất hóa đơn
    public function delete_book_room_temps(Request $request, $id)
    {
        $book_detail_temps = DB::table('book_detail_temps')->where('bookroom_temp_id',$id)->get();
        foreach ($book_detail_temps as $value) {
            $room_id_temps = $value->room_id;
        }
        /*=======================================*/
        $update_room_temps = Room::find($room_id_temps);
        $update_room_temps->room_status = 0;
        $update_room_temps->save();
        /*=======================================*/
        $book_room_temp = BookRoomTemp::find($id);

        //lưu lịch sử đặt phòng
        $save_history = new Save_bookroom();
        $save_history->room_id = $room_id_temps;
        $save_history->bookroom_date_received = $book_room_temp->bookroom_date_received;
        $save_history->bookroom_date_pay = $book_room_temp->bookroom_date_pay;
        $save_history->bookroom_number_person = $book_room_temp->bookroom_number_person;
        $save_history->bookroom_number_room = $book_room_temp->bookroom_number_room;
        $save_history->bookroom_deposit_money = $book_room_temp->bookroom_deposit_money;
        $save_history->fullname_customer = $book_room_temp->fullname_customer;
        $save_history->phone_customer = $book_room_temp->phone_customer;
        $save_history->address_customer = $book_room_temp->address_customer;
        $save_history->save();

        //Xóa đã đặt phhòng
        $book_room_temp->delete();

        /*=======================================*/
        $delete_book_room_temps = $request->session()->get('delete_book_room_temps');
        return redirect('list-book-room')->with('delete_book_room_temps','');
    }

    //Trang hiển thị chi tiết đặt phòng
    public function list_book_detail_temp($id)
    {
        $get_book_room_temp = BookRoomTemp::find($id);
        return view ('admin.book_detail.list_book_detail_temp',
        ['get_book_room_temp'=>$get_book_room_temp]);
    }

    //Trang duyệt
    public function check_book_room(Request $request, $id_bookroom, $id_bookdetail)
    {

        //THỰC HIỆN 1
        //Lấy dữ iệu bảng BookRoom ra
        $find_book_rooms = BookRoom::find($id_bookroom);

        $bookroom_date_received = $find_book_rooms->bookroom_date_received;
        $bookroom_date_pay = $find_book_rooms->bookroom_date_pay;
        $bookroom_number_person = $find_book_rooms->bookroom_number_person;
        $bookroom_number_room = $find_book_rooms->bookroom_number_room;
        $bookroom_deposit_money = $find_book_rooms->bookroom_deposit_money;
        $fullname_customer = $find_book_rooms->fullname_customer;
        $phone_customer = $find_book_rooms->phone_customer;
        $address_customer = $find_book_rooms->address_customer;

        //THỰC HIỆN 2
        //Thêm vào bảng BookRoomTemp mới
        $add = new BookRoomTemp();
        $add->bookroom_date_received = $bookroom_date_received;
        $add->bookroom_date_pay = $bookroom_date_pay;
        $add->bookroom_number_person = $bookroom_number_person;
        $add->bookroom_number_room = $bookroom_number_room;
        $add->bookroom_deposit_money = $bookroom_deposit_money;
        $add->fullname_customer = $fullname_customer;
        $add->phone_customer = $phone_customer;
        $add->address_customer = $address_customer;
        $add->save();

        //THỰC HIỆN 3
        $max_id_bookroom_temp = DB::table('book_room_temps')->max('id');

        /*==============================================================*/


        //THỰC HIỆN 4
        //Lấy dữ iệu bảng BookDetail ra
        $find_book_details = BookDetail::find($id_bookdetail);

        $room_id = $find_book_details->room_id;
        $book_details_total_price = $find_book_details->book_details_total_price;
        $number_person = $find_book_details->number_person;


        //THỰC HIỆN 5
        //Thêm vào bảng BookDetailTemp mới
        $add = new BookDetailTemp();
        $add->bookroom_temp_id = $max_id_bookroom_temp;
        $add->room_id = $room_id;
        $add->book_details_total_price = $book_details_total_price;
        $add->number_person = $number_person;
        $add->save();


        //THỰC HIỆN 6
        //Xóa bảng
        BookRoom::destroy($id_bookroom);
        BookDetail::destroy($id_bookdetail);

        $check_complete = $request->session()->get('check_complete');
        return redirect('list-book-room')->with('check_complete','');

    }

    /*======================================================*/
    //danh sách quyền truy cập
    public function list_role_access()
    {
        $get_roles = RoleAccess::all();
        return view ('admin.role_access.list_role_access',['get_roles'=>$get_roles]);
    }

    //Thêm quyền truy cập
    public function post_list_role_access(Request $request)
    {
        $add_roles = new RoleAccess();
        $add_roles->role_name = $request->input('txt_role_name');
        $add_roles->save();

        return redirect('list-role-access');
    }

    /*Trang xóa quyền truy cập*/
     public function delete_role(Request $request, $id)
    {
        RoleAccess::destroy($id);

        $delete = $request->session()->get('delete');
        session()->put('delete');

        return redirect()->back()->with('delete','');
    }
    /*======================================================*/

    //quyền truy cập(sửa)
    public function edit_role_access()
    {
        return view ('admin.role_access.edit_role_access');
    }




    //login
    public function login()
    {
        if (Auth::check()) {
            return redirect('home-admin');
        } else {
            return view ('admin.login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    //Đăng nhập
    public function post_login(Request $request)
    {
        $this->validate($request,
        [
            'txt_username'=>'required',
            'txt_password'=>'required'
        ],
        [
            'txt_username.required'=>'Chưa nhập tên tài khoản',
            'txt_password.required'=>'Chưa nhập mật khẩu'
        ]);

        $username = $request->input('txt_username');
        $password = $request->input('txt_password');

        if (Auth::attempt(['username' => $username, 'password' => $password,'role_id' => 1])) {
            return redirect('home-admin');
        }elseif(Auth::attempt(['username' => $username, 'password' => $password, 'role_id' => 3])){
           return redirect('/');
        }else{
            return redirect()->back()->with('success','Tài khoản hoặc mật khẩu không đúng');
        }
    }


    //Trang hiển thị danh sách dịch vụ
    public function list_service()
    {
        $get_category_service = CategoryService::all();
        $get_service = Service::all();

        return view ('admin.service.list_service',
        [
            'get_service'=>$get_service,
            'get_category_service'=>$get_category_service
        ]);
    }

    //thêm dịch vụ
    public function post_service(Request $request)
    {
        $add_service = new Service();
        $add_service->category_service_id = $request->input('txt_category_service');
        $add_service->service_title = $request->input('txt_service');
        $add_service->service_describe = $request->input('txt_describe_service');
        $add_service->save();

        $post_service_sesion = $request->session()->get('post_service_sesion');
        return redirect()->back()->with('post_service_sesion','');
    }

    //thêm dịch vụ
    public function update_service(Request $request, $id)
    {
        $update_service = Service::find($id);
        $update_service->category_service_id = $request->input('txt_category_service');
        $update_service->service_title = $request->input('txt_service');
        $update_service->service_describe = $request->input('txt_describe_service');
        $update_service->save();

        $update = $request->session()->get('update');
        return redirect('list-service-admin')->with('update','');
    }

    //Trang hiển thị chỉnh sửa
    public function edit_service($id)
    {
        $edit_services = Service::find($id);
        return view ('admin.service.edit_service',['edit_services'=>$edit_services]);
    }



    /*================================================================*/
    //Trang hiển thị danh sách dịch vụ
    public function list_image_service()
    {
        $get_image_service = ImageService::all();
        return view ('admin.image_service.list_image_service',['get_image_service'=>$get_image_service]);
    }

    //thêm hình ảnh dịch vụ
    public function post_image_service(Request $request)
    {
        $add_image_service = new ImageService();
        $add_image_service->service_id = $request->input('txt_service_id');

        if ($request->hasfile('txt_img_service'))
        {
            $file = $request->file('txt_img_service');

            $filename = $file->getClientOriginalName();

            $file->move(public_path('upload_image_service'), $filename);

            $add_image_service->service_image = $filename;
        }


        $add_image_service->save();

        $post_image_service_sesion = $request->session()->get('post_image_service_sesion');
        return redirect('list-image-service')->with('post_image_service_sesion','');
    }

    //Xóa hình ảnh dịch vụ
    public function delete_image_service(Request $request)
    {
        $ids = $request->ids;

        DB::table("image_services")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Deleted successfully"]);
    }


    //Xóa dịch vụ
    public function delete_service(Request $request)
    {
        $ids = $request->ids;

        DB::table("services")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Deleted successfully"]);
    }

    /*=================================================*/
    //Danh sách loại dịch vụ
    public function list_category_service(Request $request)
    {
        $show_category_service = CategoryService::all();
        return view('admin.service.list_category_service',['show_category_service'=>$show_category_service]);
    }

    //Thêm loại loại dịch vụ
    public function post_category_service(Request $request)
    {
        $add_category_service = new CategoryService();
        $add_category_service->category_name = $request->input('txt_category_service');
        $add_category_service->save();

        $add_category_service = $request->session()->get('add_category_service');

        return redirect()->back()->with('add_category_service','');
    }

    //Xóa loại loại dịch vụ
    public function delete_category_service(Request $request)
    {
        $ids = $request->ids;

        DB::table("category_services")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Deleted successfully"]);
    }



}
