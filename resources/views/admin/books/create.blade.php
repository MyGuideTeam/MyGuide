@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class=" pt-3 card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Add New Book</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('books.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">title</label>
                            <input type="text" name="title" class="form-control" id="name" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label for="email">Author</label>
                            <input type="text" name="author" class="form-control" id="email" placeholder="Enter Author Name">
                        </div>


                        <div class="form-group">
                            <label for="email">Publish Year</label>
                            <input type="date" name="publish_year" class="form-control" id="email" placeholder="Enter Publish Year">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                           <textarea class="form-control" id="description" name="description" cols="30" rows="10" placeholder="Enter Description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="description">Category</label>
                            <select id="description" class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category['id']}}">{{$category['name']}}</option>
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

                        <div class="form-group">
                            <label for="image">Audio Book</label>
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
