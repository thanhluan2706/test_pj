@extends('index.header')

@section('about-us')
<div class="container">
    <div class="about-us-content">
        <h2>Website create by Group F</h2>
    </div>
    <div class="team">About my team:</div>
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:10%">STT</th>
                <th style="width:20%">Image</th>
                <th style="width:20%">Name</th>
                <th style="width:20%">Student code</th>
                <th style="width:20%">Phone</th>
                <th style="width:40%">Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><img src="{{ asset('img/icon/manager.png') }}" width="100px" height="100px" class="img-responsive" /></td>
                <td>Võ Thành Luân</td>
                <td>21211TT3881</td>
                <td>0987633254</td>
                <td>21211tt3881@mail.tdc.edu.vn</td>
            </tr>
            <tr>
                <td>2</td>
                <td><img src="{{ asset('img/icon/manager.png') }}" width="100px" height="100px" class="img-responsive" /></td>
                <td>Nguyễn Trung Thành</td>
                <td>21211TT1283</td>
                <td>0353607680</td>
                <td>21211tt1283@mail.tdc.edu.vn</td>
            </tr>
            <tr>
                <td>2</td>
                <td><img src="{{ asset('img/icon/manager.png') }}" width="100px" height="100px" class="img-responsive" /></td>
                <td>Nguyễn Thanh Dũng</td>
                <td>20211TT1780</td>
                <td>0396793004</td>
                <td>20211tt1780@mail.tdc.edu.vn</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection