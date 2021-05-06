@extends('customer.dashboard')

@section('body-id', Str::camel($title))

@section('title', ucwords($title))

@section('content')
    <div class="bg-white shadow-md px-5 pb-8 pt-2">
        <h1 class="font-bold my-4 bg-blue-500 p-4 text-white text-center">Total Point = <span
                class="point-item__total">{{ auth()->user()->point }}</span></h1>
        <table class="w-full table-fixed" id="pointHistoryTable">
            <thead>
                <tr>
                    <th class="p-4">Date</th>
                    <th class="py-4">What you doing</th>
                    <th class="p-4">Point value</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($history as $item)
                    <tr class="hover:bg-gray-100 point-item">
                        <td class="border border-gray-400 py-3 px-4">
                            <time datetime="{{ $item->created_at }}">{{ $item->created_at}}</time>
                        </td>
                        <td class="border border-gray-400 py-3 px-4">
                            {{ $item->description }}
                        </td>
                        <td class="border border-gray-400 py-3 px-4">
                            <var class="not-italic point-item__qty">{{ $item->value }}</var>
                            <span>Point</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#pointHistoryTable').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });

    </script>
@endpush
