<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="modal-edit-news-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-capitalize">Edit news {{ $news->title }}</h4>
                <button type="button" class="close" 
                data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('news.update', $news->id) }}" method="post">
                    @csrf @method('PUT')
                    <x-input-template id="news-title-{{ $news->id }}"
                    label="Title news"
                    placeholder="Input the title of the news" 
                    name="title" type="text"
                    add-class="text-capitalize" value="{{ $news->title }}" required />
                    <textarea class="summernote"
                    placeholder="Put the desc news here. You can insert image too" 
                    name="desc">{!! $news->desc !!}</textarea>
                    <button type="submit" class="btn waves-effect waves-light btn-primary mt-5">
                        Update news
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>