@if ($rating > 0)
    @for ($filled = 0; $filled < $rating; $filled++)
        <box-icon type='solid' name='star' color="#f2c73a"></box-icon>
    @endfor
    @for ($empty = 0; $empty < 5 - $rating; $empty++)
        <box-icon name='star' ></box-icon>
    @endfor
@else
    @for ($empty = 0; $empty < 5; $empty++)
        <box-icon name='star' ></box-icon>
    @endfor
@endif