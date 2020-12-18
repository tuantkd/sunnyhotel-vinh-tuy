<?php

namespace App\Http\Controllers;
use App\Mail\BookroomMail;
use App\RatingStar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Room;
use App\Categoryroom;
use App\Service;
use App\CategoryService;
use App\ImageService;
use App\Customer;
use App\BookRoom;
use App\BookDetail;
use App\User;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    //Hiển thị trang xem email
    public function mail()
    {
        return view('mail.send_mail');
    }

    //Hiển thị trang đăng kí
    public function registration()
    {
        return view('home.registration');
    }

    //Đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('registration');
    }

    //Thêm đánh giá
    public function post_rating_star(Request $request, $id_room)
    {
        $add_star = new RatingStar();
        $add_star->user_id = Auth::id();
        $add_star->room_id = $id_room;
        $add_star->number_star = $request->input('rate');
        $add_star->save();
        $post_rating_star = $request->session()->get('post_rating_star');
        return redirect()->back()->with('post_rating_star','');
    }


    public function post_add_member(Request $request)
    {
        $this->validate($request,[
        'txt_fullname'=>'required',
        'txt_user_name'=>'required',
        'txt_password'=>'required',
        'txt_phone'=>'required',
        'txt_address'=>'required',
        'txt_email'=>'required',
        ],[
            'txt_fullname.required'=>'Chưa nhập họ và tên',
            'txt_user_name.required'=>'Chưa nhập tên đăng nhập',
            'txt_password.required'=>'Chưa nhập mật khẩu',
            'txt_phone.required'=>'Chưa nhập SĐT',
            'txt_address.required'=>'Chưa nhập địa chỉ',
            'txt_email.required'=>'Chưa nhập email',
        ]);

        $add_member = new User();
        $add_member->role_id = 3;
        $add_member->fullname = $request->input('txt_fullname');
        $add_member->username = $request->input('txt_user_name');
        $add_member->password = bcrypt($request->input('txt_password'));
        $add_member->phone = $request->input('txt_phone');
        $add_member->address = $request->input('txt_address');
        $add_member->email = $request->input('txt_email');
        $add_member->save();


        $add_regitration = $request->session()->get('add_regitration');
        return redirect('/')->with('add_regitration','');
    }



    //Trang hiển thị phòng
    public function index_home()
    {
    	return view('home.index_home');
    }

    //Trang hiển thị phòng
    public function index_room()
    {
    	return view('home.index_room');
    }

    /*==================================================================*/
    /*Đặt phòng khi nhấp vào button mua ngay gọi đến hàm script có hàm buy_now gọi
    AJAX đến hàm buy_now_food trong controller tự động thực hiện*/
    public function book_room($id, Request $request)
    {
        $book_room = Room::find($id);

        //Tạo ra sesion buy_now để lưu thông tin sản phẩm
        $buy_now = session()->get('buy_now');

        if(!$buy_now)
        {
            $buy_now = [
                $id => [
                    'room_name' => $book_room->room_name,
                    'room_price' => $book_room->room_price,
                    'room_image' => $book_room->room_image
                ]
            ];
            session()->put('buy_now', $buy_now);
        }

        if(isset($buy_now[$id]))
        {
            $request->session()->forget('buy_now');
        }

        $buy_now[$id] = [
            'room_name' => $book_room->room_name,
            'room_price' => $book_room->room_price,
            'room_image' => $book_room->room_image
        ];

        session()->put('buy_now', $buy_now);
    }




    //Xem loại phòng
    public function view_category_room($id_room)
    {
        $finds_rooms = Categoryroom::find($id_room);

        return view('home.view_category_room',
        ['finds_rooms'=>$finds_rooms]);
    }

    //trang hiển giơi thiệu
    public function index_about()
    {
    	return view('home.index_about');
    }


    //trang hiển liên hệ
    public function index_contact()
    {
    	return view('home.index_contact');
    }
    //Thêm khách hàng liên hệ
    public function post_customer_feedback(Request $request)
    {
        $this->validate($request,[
            'txt_fullname'=>'required',
            'txt_phone'=>'required',
            'txt_address'=>'required',
            'txt_feedback'=>'required'
        ],[
            'txt_fullname.required'=>'Chưa nhập họ và tên',
            'txt_phone.required'=>'Chưa nhập số điện thoại',
            'txt_address.required'=>'Chưa nhập địa chỉ cư trú',
            'txt_feedback.required'=>'Chưa nhập góp ý'
        ]);

        $feedbacks = new Customer();
        $feedbacks->full_name = $request->input('txt_fullname');
        $feedbacks->customers_phone = $request->input('txt_phone');
        $feedbacks->customers_address = $request->input('txt_address');
        $feedbacks->customes_comment = $request->input('txt_feedback');
        $feedbacks->save();

        // return redirect('/');
        $add_customer_feedback = $request->session()->get('add_customer_feedback');
        return redirect()->back()->with('add_customer_feedback','');

    }

    //trang xem chi tiết  phòng
    public function view_detail_room($id_room)
    {
        $data = Room::find($id_room);
        return view('home.view_detail_room',['data'=>$data]);
    }

    //trang đặt phòng
    public function index_bookroom()
    {
        return view('home.index_bookroom');
    }

    //trang chi tiết đặt phòng
    public function detail_book_room()
    {
        $detail_book_room = BookDetail::latest()->paginate(1);
        return view('home.detail_book_room',['detail_book_room'=>$detail_book_room]);
    }


    //Thanh toán đặt phòng
    public function post_checkout_bookroom(Request $request)
    {
        //Thực hiện thứ 1
        $this->validate($request,[
            'txt_date_start'=>'required',
            'txt_date_end'=>'required',
            'txt_number_person'=>'required',
            'txt_money_deposit'=>'required',
            'txt_number_room'=>'required',
            'txt_fullname_customer'=>'required',
            'txt_phone'=>'required',
            'txt_address'=>'required'
        ],[
            'txt_date_start.required'=>'Chưa nhập ngày đặt phòng',
            'txt_date_end.required'=>'Chưa nhập ngày trả phòng',
            'txt_number_person.required'=>'Chưa nhập số người',
            'txt_money_deposit.required'=>'Chưa chọn tiền đặt cọc',
            'txt_number_room.required'=>'Chưa chọn số phòng',
            'txt_fullname_customer.required'=>'Chưa nhập họ và tên',
            'txt_phone.required'=>'Chưa nhập số điện thoại',
            'txt_address.required'=>'Chưa nhập địa chỉ cư trú'
        ]);

        //Thực hiện thứ 2
        $add_book_room = new BookRoom();
        $add_book_room->bookroom_date_received = $request->input('txt_date_start');
        $add_book_room->bookroom_date_pay = $request->input('txt_date_end');
        $add_book_room->bookroom_number_person = $request->input('txt_number_person');
        $add_book_room->bookroom_number_room = $request->input('txt_number_room');
        $add_book_room->bookroom_deposit_money = $request->input('txt_money_deposit');
        $add_book_room->fullname_customer = $request->input('txt_fullname_customer');
        $add_book_room->phone_customer = $request->input('txt_phone');
        $add_book_room->bookroom_email = $request->input('txt_email');
        $add_book_room->address_customer = $request->input('txt_address');
        $add_book_room->save();

        //Thực hiện gửi email
        $get_bookroom = DB::table('book_rooms')->latest()->first();
        $id_bookroom = $get_bookroom->id;
        $email_bookroom = $get_bookroom->bookroom_email;

        $send_mail = BookRoom::findOrFail($id_bookroom);

        Mail::to($email_bookroom)->send(new BookroomMail($send_mail));

        //Thực hiện thứ 3
        $max_id_book_room = DB::table('book_rooms')->max('id');


        //Thực hiện thứ 4 Đặt phòng
        $book_rooms = DB::table('book_rooms')->get();
        foreach ($book_rooms as $value) {
            $number_room = $value->bookroom_number_room;
            $number_person = $value->bookroom_number_person;
        }

        foreach(session('buy_now') as $id => $data)
        {
            $totalprice = $data['room_price'] * $number_room;

            $add_detail_bookroom = new BookDetail();
            $add_detail_bookroom->room_id = $id;
            $add_detail_bookroom->bookroom_id = $max_id_book_room;
            $add_detail_bookroom->number_person = $number_person;
            $add_detail_bookroom->book_details_total_price = $totalprice;
            $add_detail_bookroom->save();

            $change_status = Room::find($id);
            $change_status->room_status = 1;
            $change_status->save();
        }

        //Sau khi add vào DB xong và tự động xóa sesion vừa add vào
        $request->session()->forget('buy_now');


        $add_book_room = $request->session()->get('add_book_room');

        return redirect('detail-book-room')->with('add_book_room','');
    }

    //trang danh sách dịch vụ
    public function list_service()
    {
        return view('home.list_service');
    }

    //trang danh sách theo loại dịch vụ
    public function view_category_service($id)
    {
        $category_service = CategoryService::find($id);
        return view('home.view_category_service',['category_service'=>$category_service]);
    }

    //trang xem chi tiết dịch vụ
    public function view_service_detail($id)
    {
        $service_detail = Service::find($id);
        $categorys = CategoryService::where('id',$service_detail->category_service_id)->get();
        return view('home.view_service_detail',
        ['service_detail'=>$service_detail,'categorys'=>$categorys]);
    }
}




