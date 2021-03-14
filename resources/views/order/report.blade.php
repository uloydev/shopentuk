<!DOCTYPE html>
<html>
<head>
    <title>Report new order</title>
    <link rel="stylesheet" href="{{ asset('css/report.css') }}">
</head>
<body>
    <div class="aa_htmlTable">
        <table>
            <thead>
                <tr>
                    @foreach ($fillables as $fillable)
                        <th>{{ $fillable }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>January</td>
                    <td>$100</td>
                </tr>
                <tr>
                    <td>February</td>
                    <td>$80</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>Sum</td>
                    <td>$180</td>
                </tr>
            </tfoot>
        </table>
    </div>
    {{-- get from https://codepen.io/ahmadawais/pen/WbvzQd --}}    
</body>
</html>