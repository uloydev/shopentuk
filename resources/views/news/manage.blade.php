@extends('layouts.template')

@section('title', ucwords($title))

@section('body-id', Str::camel($title))

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <span class="h3">Manage News</span>
                    <button class="btn btn-primary rounded-pill float-right" data-toggle="modal"
                        data-target="#modal-add-news"><box-icon name='plus-square' type='solid' animation='tada' color='#ffffff' ></box-icon> Add News</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered no-wrap" id="zero_config">
                            @include('partial.thead', [
                                'thead' => [
                                    'id',
                                    'title',
                                    'desc',
                                    'manage'
                                ]
                            ])
                            <tbody>
                                @foreach ($allNews as $news)
                                    <tr>
                                        <td>{{ $news->id }}</td>
                                        <td data-original="{{ $news->title }}">
                                            {{ $news->title }}
                                        </td>
                                        <td data-original="{{ $news->desc }}">
                                            {!! Str::words($news->desc, 5) !!}
                                        </td>
                                        <td>
                                            <a href="#" 
                                                class="btn btn-sm btn-warning btn-rounded mr-2"
                                                data-toggle="modal"
                                                data-target="#edit-news-{{ $news->id }}">
                                                    Edit
                                                </a>
                                                <form method="POST" class="d-inline-block"
                                                action="{{ route('admin.news.destroy', $news->id) }}">
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
    @include('news.create')
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
