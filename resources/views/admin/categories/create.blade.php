@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class=" pt-3 card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Add New Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
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
