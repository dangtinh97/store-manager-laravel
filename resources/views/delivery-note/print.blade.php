<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body onload="window.print()">
<div class="container border" style="max-width: 350px">
    <div class="text-center  d-block">
        <div>Kho hàng hà nội | MONSTARLAB</div>
        <div class="text-bold">Xuất hoá đơn</div>
    </div>
    </br>
    <div class="text-bold">Khách hàng</div>
    <table>
        <tr>
            <td>Họ tên: </td>
            <td>{{$user->full_name}}</td>
        </tr>
        <tr>
            <td>Số điện thoại: </td>
            <td>{{$user->mobile}}</td>
        </tr>
        <tr>
            <td>Email: </td>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <td>Địa chỉ: </td>
            <td>{{$user->address}}</td>
        </tr>
        <tr>
            <td>Số phiếu: </td>
            <td>{{time()}}</td>
        </tr>
    </table>
    <hr>
    <div class="text-bold">Đơn hàng</div>
    <table>
        <tr>
            <td>Tên hàng: </td>
            <td>{{$item->project->name_project}}</td>
        </tr>
        <tr>
            <td>Số lượng: </td>
            <td>{{number_format($item->quantity)}}</td>
        </tr>
        <tr>
            <td>Đơn giá: </td>
            <td>{{number_format($item->price)}}</td>
        </tr>
        <tr>
            <td>Thành tiền: </td>
            <td>{{number_format($item->quantity * $item->price)}} VNĐ</td>
        </tr>
        <tr>
            <td class="">Thời gian tạo đơn hàng: </td>
            <td>{{date('H:i:s d/m/Y',strtotime($item->created_at))}}</td>
        </tr>
    </table>
    <hr>
    <div class="text-bold">Admin</div>
    <table>
        <tr>
            <td>Người tạo đơn: </td>
            <td>{{Auth::user()->full_name}}</td>
        </tr>
        <tr>
            <td>Số điện thoại: </td>
            <td>{{Auth::user()->mobile}}</td>
        </tr>
        <tr>
            <td>Thời gian tạo: </td>
            <td>{{date('H:i:s d/m/Y',time())}}</td>
        </tr>
    </table>
    <hr>
    <div class="text-center">HĐ VAT đã được xuất, nếu thay đổi vui lòng báo lại TRONG NGÀY!</div>
    <div class="">Tra hoá đơn tại:</div>
    <div class="">http://monstar-lab.test/thong-tin-don-hang</div>
    <hr>
    <div class="text-center">Cảm ơn quý khách, hẹn gặp lại!</div>
</div>
</body>
</html>
