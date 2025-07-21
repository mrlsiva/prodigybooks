
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Email Invoice Template</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
    <table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px #e43750;">
        <thead>
            <tr>
                <th style="text-align:left;"><img style="max-width: 150px;" src="{{ 'https://littleprodigybooks.com/resources/img/logo.png' }}" alt="{{ config('app.name') }}"></th>
                <th style="text-align:right;font-weight:400;">{{$data['buy_date']}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="height:35px;"></td>
            </tr>
            <tr>
                <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
                    <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:150px">Order status</span><b style="color:green;font-weight:normal;margin:0">Success</b></p>
                    <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Transaction ID</span> {{$data['txnid']}}</p>
                    <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Order amount</span> Rs. {{$data['amount']}}</p>
                </td>
            </tr>
            <tr>
                <td style="height:35px;"></td>
            </tr>
            <tr>
                <td style="width:50%;padding:20px;vertical-align:top">
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Name</span> {{$data['to_name']}}</p>

                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Address</span>{{$data['address1']}}</p>

                </td>
                <td style="width:50%;padding:20px;vertical-align:top">
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Phone</span> +91-{{$data['phone']}}</p>
                    <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Email</span> {{$data['to_email']}}</p>

                </td>
            </tr>
            <tr>
                <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;"> Products</td>
            </tr>
            <tr>
                <td colspan="2" style="padding:15px;">
                    @if($data['email_type'] == 'invoice_2')
                    @foreach($data['productInfo'] as $books)
                    <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
                        <span style="display:block;font-size:13px;font-weight:normal;">{{$books->book_title}}</span> Rs. {{$books->amount}} <b style="font-size:12px;font-weight:300;">{{$books->series_name}}</b>
                    </p>
                    @endforeach
                    @endif
                    @if($data['email_type'] == 'invoice_1')
                    <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
                        <span style="display:block;font-size:13px;font-weight:normal;">{{ $data['productInfo'] }} </span> Rs. {{ $data['amount'] }} <b style="font-size:12px;font-weight:300;"> Combo Box</b>
                    </p>
                    @endif
                    @if($data['email_type'] == 'invoice_3')
                    <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
                        <span style="display:block;font-size:13px;font-weight:normal;">{{$data['plan_type']}}</span> Rs. {{$data['amount']}} <b style="font-size:12px;font-weight:300;">{{$data['plan_sub']}}</b>
                    </p>
                    @endif
                </td>
            </tr>
        </tbody>
        <tfooter>
            <tr>
                <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
                    <strong style="display:block;margin:0 0 10px 0;">Regards</strong> No 10 Venkataraman street<br> Srinivasa avenue Chennai 600028<br><br>
                    <b>Phone:</b> +91 9011524939<br>
                    <b>Email:</b> books.littleprodigy@gmail.com
                </td>
            </tr>
        </tfooter>
    </table>
</body>

</html>