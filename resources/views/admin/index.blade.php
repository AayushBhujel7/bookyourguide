@extends('layouts.master.master')

@section('title')
    Admin Dashboard
@endsection


@section('content')
<div class="row">

                         <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        U
                                    </div>
                                    <p class="card-category">All Users</p>
                                    <h3 class="card-title">{{$users}}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <a href="/admin/users">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-danger card-header-icon">
                                    <div class="card-icon">
                                        G
                                    </div>
                                    <p class="card-category">All Guides</p>
                                    <h3 class="card-title">{{$guides}}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats"> 
                                        <a href="/admin/users">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-warning card-header-icon">
                                    <div class="card-icon">
                                        T
                                    </div>
                                    <p class="card-category">All Tourist Areas</p>
                                    <h3 class="card-title">{{$tours}}
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                       <a href="/admin/tours">View All</a>
                                    </div>
                                    <a href="#" 
                                        style="float:right;     
                                                padding: 0 10px;
                                                color: #fff;
                                                background: lightseagreen;
                                                font-weight: 600;"  
                                        data-toggle="modal" 
                                        data-target="#addTours"
                                    >
                                        Add Tourist Area
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-danger card-header-icon">
                                    <div class="card-icon">
                                        B
                                    </div>
                                    <p class="card-category">All Bookings</p>
                                    <h3 class="card-title">{{$bookings}}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <a href="/admin/bookings">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>

    </div>
<!-- Modal -->
<div class="modal fade" id="addTours" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Tourist Area</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/admin/add/tour" enctype="multipart/form-data">
        @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputCity">Title</label>
                    <input type="text" name="title" class="form-control" id="inputCity" placeholder = "Title" required>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">City </label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="City" name="city" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Country </label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Country" name="country" required>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="image"> Image <span  style="font-size:12px"> </span></label>
                <input id="image" type="file" class="form-control" name="image" required>
            </div>
            <br>
            <div class="form-group">
                <label for="inputAddress">Description</label>
                <textarea class="form-control ckeditor HTML" id="inputAddress" rows="5" name="description" placeholder="Write something for the guide." REQUIRED></textarea>
            </div>
            
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Tourist Area</button>
      </div>
      </form>
    </div>
  </div>
</div>


<style>
.form-group input[type=file] {
    opacity: 1 !important;
    position: unset !important;
    z-index: 1 !important;
}
</style>

@endsection
