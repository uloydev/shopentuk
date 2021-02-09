<thead>
    <tr class="text-capitalize">
        @for ($i = 0; $i < count($thead); $i++)
        <th>{{ $thead[$i] }}</th>
        @endfor
    </tr>
</thead>