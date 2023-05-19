@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class=" pt-3 card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Add New User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="email">Age</label>
                            <input type="text" name="age" class="form-control" id="email" placeholder="Enter Age">
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender" class="form-control">
                                <option value="MALE">Male</option>
                                <option value="FEMALE">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="gender">Type</label>
                            <select id="gender" name="type" class="form-control">
                                <option value="BLIND">Blind</option>
                                <option value="RELATIVE">Relative</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" id="email" placeholder="Enter Phone Number">
                        </div>

                        <div class="form-group">
                            <label for="image">Avatar</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="image">
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
