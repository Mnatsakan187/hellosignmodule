@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <div class="row layout-top-spacing">
                <div id="basic" class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Edit</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form class="simple-example" method="post" action="{{route('user-management.update', $user->id)}}">
                                @csrf
                                <input name="_method" type="hidden" value="PUT">
                                <div class="form-row">
                                    <div class="col-md-12 mb-4">
                                        <label for="fullName">Name</label>
                                        <input type="text" class="form-control" name="name" id="fullName" placeholder="" value="{{$user->name}}" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill the name
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-4">
                                        <label for="e_mail">Email</label>
                                        <input type="email" class="form-control" value="{{$user->email}}" name="email" id="e_mail" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill the Email
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="col-md-12 mb-4">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control"  name="password" id="password"  required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill the Email
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary submit-fn mt-2" type="submit">Submit form</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
