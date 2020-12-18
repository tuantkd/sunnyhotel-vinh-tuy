@extends('admin.room.list_room')
@section('table-data-room')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th><input type="checkbox" id="check_all"></th>
            <th>STT</th>
            <th>Tên loại phòng</th>
            <th>Tên phòng</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Trạng thái</th>
            <th>Tùy chọn</th>

        </tr>
        </thead>

        <tbody>
        @php($get_room = DB::table('rooms')->where('category_id', $view_categorys->id)->get())
        @foreach($get_room as $key=>$data)
            <tr id="tr_{{ $data->id }}">
                <td>
                    <input type="checkbox" class="sub_check"
                           data-id="{{ $data->id }}">
                </td>
                <td>{{ ++$key }}</td>
                <td>
                    @php($get_category = DB::table('categoryrooms')
                    ->where('id',$data->category_id)->get())
                    @foreach($get_category as $value)
                        {!! $value->category_name !!}
                    @endforeach
                </td>

                <td>
                    {{ $data->room_name }}
                </td>

                <td>
                    <img src="{{ url('public/image_room/'.$data->room_image) }}"
                         style="max-width:100%;height:100px;">
                </td>

                <td>
                    {{ number_format($data->room_price) }} VND
                </td>

                <td>
                    @if($data->room_status == 0)
                        Trống
                    @elseif($data->room_status == 1)
                        Đã đặt phòng
                    @endif
                </td>

                <td>
                    <a class="btn btn-primary"
                       href="{{ url('edit-room/'.$data->id) }}" role="button">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
