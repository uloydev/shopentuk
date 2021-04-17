@extends('layouts.template')

@section('title', ucwords($title))

@section('body-id', Str::camel($title))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3">Manage News</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered no-wrap" id="zero_config">
                            @include('partial.thead', [
                                'thead' => [
                                    'title',
                                    'desc',
                                    'manage'
                                ]
                            ])
                            <tbody>
                                @foreach ($allNews as $news)
                                    <tr>
                                        <td data-original="{{ $news->title }}">
                                            {{ $news->title }}
                                        </td>
                                        <td data-original="{{ $news->desc }}">
                                            {!! Str::words($news->desc, 5) !!}
                                        </td>
                                        <td>
                                            <a href="{{ route('news.edit', $news->id) }}" 
                                                class="btn btn-sm btn-warning btn-rounded mr-2"
                                                data-toggle="modal"
                                                data-target="#edit-news-{{ $news->id }}">
                                                    Edit
                                                </a>
                                                <form method="POST" class="d-inline-block"
                                                action="{{ route('news.destroy', $news->id) }}">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" 
                                                    class="btn btn-sm btn-danger btn-rounded">
                                                        Delete
                                                    </button>
                                                </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('components')
    @foreach ($allNews as $news)
        @include('news.edit', [
            'id' => 'edit-news-' . $news->id
        ])
    @endforeach
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(".summernote").summernote({
        height: 400,
        placeholder: $(this).attr('placeholder')
    })
    </script>
@endpush
