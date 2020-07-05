@extends('layouts\admin.app')

 @section('un_publish_post')
 <div class="container">
     <div class="row justify-content-center text-center">
         <div class="col-lg-12">
             <h1 class="text-info"> UnPublish Post</h1>
         </div>

         <div class="col-lg-10 ajaxdata">
            <table class="table table-hover table-primary" id="myTable" >
                <thead class="table-danger">
                <tr>
                    <th>Content ID</th>
                    <th>Content Title</th>
                    <th>Content Type</th>
                    <th>ACTION</th>
                </tr>
                </thead>
            </table>
        </div>
     </div>
</div>
<script type="text/javascript">

$(document).ready( function () {

$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });
});
    var table1= $('#myTable').DataTable({

    processing: true,
    serverSide: true,
    ajax: "{!! route('admin.viewPublishPost') !!}",
    columns: [
        { data: 'id', name: 'id' },
        { data: 'contentTitle', name: 'contentTitle'},
        { data: 'contentType', name: 'contentType' },
        { data: 'action', name: 'action', orderable: false, searchable:false}
    ]
});

function unPublishData(id){
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });

    $.ajax({
        type: "post",
        url:"{{URL::to('admin/home/unPublishPost')}}"+'/'+id,
        success: function (data) {
            table1.ajax.reload();
            alert(data.success);
        }
    });
}

</script>

 @endsection


