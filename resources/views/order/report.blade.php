<!DOCTYPE html>
<html>
<head>
  <title>Laravel 8 PDF Generate Example - websolutionstuff.com</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-lg-12" style="margin-top: 15px ">
        <div class="pull-left">
          <h2>Laravel 8 PDF Generate Example - websolutionstuff.com</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" 
            href="{{ route('admin.report.new-order',['download'=>'pdf']) }}">
                Download PDF
            </a>
        </div>
      </div>
    </div><br>

    <table class="table table-bordered">
      <tr>
        <th>product price</th>
        <th>product point</th>
        <th>price total</th>
        <th>point total</th>
      </tr>

      @foreach ($newOrder as $order)
      <tr>
        <td>{{ $order->product_price }}</td>
        <td>{{ $order->product_point }}</td>
        <td>{{ $order->price_total }}</td>
        <td>{{ $order->point_total }}</td>
      </tr>
      @endforeach
    </table>
  </div>
</body>
</html>