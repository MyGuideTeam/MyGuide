@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class=" pt-3 card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Edit User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('books.update' , $book['id'])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="title" class="form-control" id="name" value="{{$book['title']}}" placeholder="Enter Name">
                        </div>

                        <div class="form-group">
                            <label for="email">Author</label>
                            <input type="text" name="author" class="form-control" id="email" value="{{$book['author']}}" placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                            <label for="email">Publish Year</label>
                            <input type="text" name="publish_year" class="form-control" id="email" value="{{$book['publish_year']}}" placeholder="Enter Age">
                        </div>

                        <div class="form-group">
                            <label for="email">Description</label>
                            <input type="text" name="description" class="form-control" id="email" value="{{$book['description']}}" placeholder="Enter Age">
                        </div>

                        <div class="form-group">
                            <label for="gender">Category</label>
                            <select id="gender" name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option @if($book['category_id'] == $category['id'])  @endif value="{{$category['id']}}">{{$category['name']}}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>

                            </div>
                        </div>

                        <div class="m-3">
                            <img width="100px" height="100px" src="{{url($book->avatar)}}">

                        </div>

                        <div class="form-group">
                            <label for="image">Audio File</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="audio_file" class="custom-file-input" id="image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>

                            </div>
                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
