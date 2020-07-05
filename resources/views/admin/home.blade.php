@extends('layouts\admin.app')

 @section('content')
 <div class="container">
     <div class="row justify-content-center text-center mt-3">
         <div class="col-lg-12">
             <h1 class="text-info"> Admin Dashboard</h1>
         </div>
     </div>

     <div class="row justify-content-center">
         <div class="col-lg-8 mt-5">
            <div class="row justify-content-center text-center">
                <div class="col-lg-3 col-12 col-sm-3">
                <h3><a href="{{route('admin.create.post')}}" class="btn btn-success btn-lg">Create post</a></h3>
                </div>
                <div class="col-lg-3 col-12 col-sm-3" >
                <h3><a href="{{route('admin.publish.post')}}" class="btn  btn-success btn-lg">Publish post</a></h3>
                </div>
                <div class="col-lg-3 col-12 col-sm-3">
                    <h3><a href="{{route('admin.unpublish.post')}}" class="btn  btn-success btn-lg">Unpublish post</a></h3>
                </div>
            </div>
         </div>
     </div>
 </div>
 @endsection


