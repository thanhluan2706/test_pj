@extends('index.header')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('cart') == null)
<div class="container" style="text-align: center; padding: 100px;">
    <h1>YOUR CART IS EMPTY!</h1>
    <a class="primary-btn cta-btn" href="{{ route('index') }}">Shop now</a>
</div>
@else if
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:20%">Image</th>
            <th style="width:30%">Name</th>
            <th style="width:20%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
        @foreach(session('cart') as $id => $value)
        @php $total += $value['price'] * $value['quantity'] @endphp
        <tr data-id="{{ $id }}">
            <td><img src="{{ asset('img') }}/{{ $value['image'] }}" width="100px" height="100px" class="img-responsive" /></td>
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-9">
                        <h4 class="nomargin">{{ $value['name'] }}</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price">{{ number_format($value['price']) }} VNĐ</td>
            <td data-th="Quantity">
                <input type="number" value="{{ $value['quantity'] }}" class="form-control quantity cart_update" min="1" />
            </td>
            <td data-th="Subtotal" class="text-center">{{ number_format($value['price'] * $value['quantity']) }} VNĐ</td>
            <td class="actions" data-th="">
                <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <h3><strong>Total: {{ number_format($total) }} VNĐ</strong></h3>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                <button class="btn btn-success"><i class="fa fa-money"></i> Checkout</button>
            </td>
        </tr>
    </tfoot>
</table>
@endif
@endsection

@section('scripts')
<script type="text/javascript">
    $(".cart_update").change(function(e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ route("update_cart") }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });

    $(".cart_remove").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route("remove_from_cart") }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
@endsection