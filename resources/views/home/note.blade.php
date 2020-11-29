@if(session('buy_now'))
<?php $total = 0; ?>

@foreach(session('buy_now') as $id => $data)
@if($loop->last)

<?php $tong_gia = $data['product_sale_price'] * $data['product_quality']; ?>

  <div class="cart-detail cart-total p-3 p-md-4">
    
    <p class="d-flex">
      <span>Hình ảnh:</span>
      <span>
        <img src="{{ url('public/image_product/'.$data['product_image']) }}" 
        style="max-width:100%;height:200px;">
      </span>
    </p>

    <p class="d-flex">
      <span>Tên sản phẩm: </span>
      <span><b>{{ $data['product_name'] }}</b></span>
    </p>

    

    <p class="d-flex">
      <span>Số lượng:</span>
      <span>{{ $data['product_quality'] }}</span>
    </p>

    <p class="d-flex">
      <span>Giá: </span>
      <span>{{ number_format($tong_gia) }} VND</span>
    </p>

    <p class="d-flex">
      <span>Đơn vị tính: </span>
      <span>{{ $data['product_unit'] }}</span>
    </p>
    <hr>

    <p class="d-flex total-price">
      <span>Tổng thanh toán</span>
      <span>{{ number_format($tong_gia) }} VND</span>
    </p>
  
  </div>
@endif
@endforeach

@endif