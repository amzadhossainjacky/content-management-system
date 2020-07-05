@extends('layouts\admin.app')

 @section('create_video')
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
                <form id="video-form" action="{{route('admin.videoStore.post')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <h4> Publish Section For Video</h4>
                        <select class="form-control" name="publishSection" id="publishSection">
                            <option> 1</option>
                            <option> 2 </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" name="contentTitle" id="contentTitle" class="form-control" placeholder="post title" value="{{old('contentTitle')}}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="contentLink" id="contentLink" class="form-control" placeholder="video link" value="{{old('contentLink')}}">
                    </div>

                    <div class="form-group">
                        <textarea name="details" id="details" cols="52" rows="10" placeholder="post details">
                        </textarea>
                    </div>

                    <div class="submit-button">
                        <button class="btn btn-success" type="submit">create</button>
                    </div>
                </form>

            </div>
         </div>
     </div>
 </div>



 @endsection


