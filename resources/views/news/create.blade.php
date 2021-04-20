<div class="modal fade" id="modal-add-news" tabindex="-1" role="dialog" aria-labelledby="modal-add-news-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-capitalize" id="modal-add-news-label">Add News</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.news.store') }}" method="post">
                    @csrf
                    <x-input-template id="news-title"
                    label="Title news"
                    placeholder="Input the title of the news" 
                    name="title" type="text"
                    add-class="text-capitalize" required />
                    <textarea class="summernote"
                    placeholder="Put the desc news here. You can insert image too" 
                    name="desc"></textarea>
                    <button type="submit" class="btn waves-effect waves-light btn-primary mt-5">
                        Create news
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>