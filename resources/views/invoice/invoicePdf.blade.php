<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <div class="invoice-box">
        <div class="text">customer copy</div>
        <h3 style="text-align: center; background: #eee">PAYMENT RECEIPT</h3>

        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td></td>
                            <td>

                                Invoice # {{$data->invoice_number}}<br/>
                                Date: {{$data->date}}<br/>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Details</td>
                <td></td>
            </tr>
            <tr class="item">
                <td>Company Name</td>

                <td>{{'Gangni City Corporation'}}</td>
            </tr>
            <tr class="item">
                <td>Received From</td>

                <td>{{ucwords($data->name)}}</td>
            </tr>
            <tr class="item">
                <td>Phone Number</td>

                <td>{{$data->phone_number}}</td>
            </tr>
            <tr class="item">
                <td>Payment Category</td>

                <td>{{$data->categories->name}}</td>
            </tr>
            <tr class="item">
                <td>Sub Category</td>

                <td>{{$data->subCategories->name}}</td>
            </tr>
            <tr class="item">
                <td>Payable Amount</td>

                <td>{{$data->amount}}</td>
            </tr>

            <tr class="total">
                <td></td>
                <td>Total: {{$data->amount.' '. 'Tk'}}</td>
            </tr>
        </table>
        <br>
        <hr style="size: 2;color: black; width: 25%; text-align: right">
        <p class="sig"><b>Receiver Signature</b></p>
    </div>

    <div class="line"><i class="fas fa-cut"></i> </div>

    <div class="invoice-box">
        <div class="text">office copy</div>
        <h3 style="text-align: center; background: #eee">PAYMENT RECEIPT</h3>
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td></td>
                            <td>
                                Invoice # {{$data->invoice_number}}<br/>
                                Date: {{$data->date}}<br/>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Details</td>
                <td></td>
            </tr>
            <tr class="item">
                <td>Company Name</td>

                <td>{{'Gangni City Corporation'}}</td>
            </tr>
            <tr class="item">
                <td>Received From</td>

                <td>{{ucwords($data->name)}}</td>
            </tr>
            <tr class="item">
                <td>Phone Number</td>

                <td>{{$data->phone_number}}</td>
            </tr>
            <tr class="item">
                <td>Payment Category</td>

                <td>{{$data->categories->name}}</td>
            </tr>
            <tr class="item">
                <td>Sub Category</td>

                <td>{{$data->subCategories->name}}</td>
            </tr>
            <tr class="item">
                <td>Payable Amount</td>

                <td>{{$data->amount}}</td>
            </tr>

            <tr class="total">
                <td></td>

                <td>Total: {{$data->amount.' '. 'Tk'}}</td>
            </tr>
        </table>
        <br>
        <hr style="size: 2;color: black; width: 25%; text-align: right">
        <p class="sig"><b>Receiver Signature</b></p>

    </div>
</body>
</html>



