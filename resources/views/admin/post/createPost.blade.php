@extends('layouts\admin.app')

 @section('create_post')
 <div class="container">
     <div class="row justify-content-center text-center">
         <div class="col-lg-12">
             <h1 class="text-info"> Create Content</h1>
         </div>
     </div>

     <div class="row justify-content-center text-center">
         <div class="col-lg-8 mt-2">
            <div class="post-create mb-5" >
                <div class="post">
                    <a href="{{route('admin.create.post')}}" class="btn btn-primary" id="post-form-link">Post Create</a>
                    <a href="{{route('admin.videoStore.post')}}" class="btn btn-primary" id="video-form-link">Video Create</a>
                </div>
            </div>

                @if ($errors->any())
                <div class="alert alert-danger text-left">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            <div class="col-lg-8 px-5 m-auto">
                <form id="post-form" action="{{route('admin.create.post')}}" method="post" enctype="multipart/form-data" >
                    @csrf

                    <h4> Publish Section For Post</h4>
                    <div class="form-group">
                        <select class="form-control" name="publishSection" id="publishSection">
                            <option> 1</option>
                            <option> 2 </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" name="contentTitle" class="form-control" placeholder="post title" value="{{old('contentTitle')}}">
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control" placeholder="post image" value="{{old('image')}}">
                    </div>

                    <div class="form-group">
                        <textarea name="details" cols="52" rows="10" placeholder="post details">
                        </textarea>
                    </div>

                    <button class="btn btn-success" type="submit">create</button>
                </form>
            </div>
         </div>
     </div>
 </div>



 @endsection


