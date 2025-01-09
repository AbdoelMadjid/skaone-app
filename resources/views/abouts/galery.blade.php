<div class="row">
    <div class="col-lg-12">
        <div class="card border">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <table id="galleryTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Likes</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($galleries as $gallery)
                                    <tr>
                                        <td><img src="{{ asset('images/thumbnail/' . $gallery->image) }}" alt="Image"
                                                width="150"></td>
                                        <td>{{ $gallery->title }}</td>
                                        <td>{{ $gallery->author }}</td>
                                        <td>{{ $gallery->category }}</td>
                                        <td>{{ $gallery->likes }}</td>
                                        <td>{{ $gallery->comments }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
