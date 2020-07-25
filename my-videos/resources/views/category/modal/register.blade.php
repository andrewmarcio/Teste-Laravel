<!-- Modal -->
<div class="modal fade" id="add-video-modal" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalLongoExemplo">Register Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                            role="tab" aria-controls="nav-home" aria-selected="true">Category</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="false">Video</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" class="form-control" id="category_name" name="category_name"
                                    placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label class="form-check-label" for="favorite_category">
                                    You want to add this category to your favorite list?</label>
                                <select class="form-control" name="favorite_category" id="favorite_category">
                                    <option selected value="false">No</option>
                                    <option value="true">Yes</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">register</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <form action="{{ route('video.register') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category</label>
                                <select class="form-control" id="select-category" name="category_id">
                                    <option selected>Select a category</option>
                                    @foreach($myCategories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="video-url">Video title</label>
                                <input type="text" class="form-control" id="video-title" name="video_title"
                                    placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="video-url">Video URL</label>
                                <input type="text" class="form-control" id="video-url" name="video_url"
                                    placeholder="URL">
                            </div>
                            <button type="submit" class="btn btn-primary">register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal delete -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal-delete-category">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>You won't be able to revert this!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                <form action="" method="post" id="form-delete-category">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">ok, i'm sure.</button>
                </form>
            </div>
        </div>
    </div>
</div>