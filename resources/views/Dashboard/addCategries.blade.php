@extends('Dashboard.layout.master')
@section('title', 'Dashboard')
@section('content')
<div class="container mt-2" style="padding-right: 10%;padding-left: 20%;">
    <div class="row">

        <div class="col-md-12 card-header text-center font-weight-bold">
            <h2>Add Categries</h2>
        </div>
        <div class="col-md-12 mt-1 mb-2">
            <button type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#AddCategrieModal">Add Categries</button>
        </div>
        <ul id="save_msgList"></ul>
        <div class="col-md-12">
            <table class="table" id="example">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody class="tab">

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Add boostrap model -->
<div class="modal fade" id="AddCategrieModal" tabindex="-1" aria-labelledby="AddProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddProductModalLabel">Add Product Deatail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

              <!--       <ul id="save_msgList"></ul> -->
              <form id="categiesdata"  enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="categriename">Categries Name</label>
                    <input type="text" required class="categriename form-control" placeholder="Enter your Categrie name" name="name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_categrie">Save</button>
            </div>
        </form>
    </div>

</div>
</div>
<!-- Update Modal boostrap model -->
<div class="modal fade" id="EditCategries" tabindex="-1" aria-labelledby="AddProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddProductModalLabel">Update Product Deatail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

              <!--<ul id="save_msgList"></ul> -->
              <form id="Updatecategriedata" enctype="multipart/form-data">
                <input type="hidden" name="product_id" id="catgrie_id">
                <div class="form-group mb-3">
                    <label for="productname">Product Name</label>
                    <input type="text" id="name" required class="Productname form-control" placeholder="Enter your Product name" name="name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary update_categries">Update</button>
            </div>
        </form>
    </div>

</div>
</div>
<!-- Delete  model -->
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Book Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4>Confirm to Delete Data ?</h4>
        <input type="hidden" id="deleteing_id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary delete_categrie">Yes Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- End Delete  model -->
//add categries
<script type="text/javascript">
    $(document).on('click', '.add_categrie', function (e) {
      e.preventDefault();
      let formData= new FormData($('#categiesdata')[0]);
      console.log("data",formData);

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

      $.ajax({

    //ProcessData = true : convert an object's name value pairs into a URL encoding, or an array's objects into name value pairs, or take a string as a literal.
    // ProcessData = false: take a string as a literal, or call an object's ToString() method.
    type:"POST",
    url:"/add-categries",
    data:formData,
    contentType:false,
    processData:false,
    success: function(){
     $('#AddCategrieModal').modal('hide');
     window.location.href=window.location.href;
 }
});

  });
//fetech categries
$(document).ready(function () {
        fetchproduct(); // Fetech data of books
    });
//fuction of fetch data from contrller 
function fetchproduct() {
  $.ajax({
    type: "GET",
    url: "/fetch-categries",
    dataType: "json",
    success: function (response) {
      var categrie = response;
      console.log("response",categrie);
      $('.tab').html("");
      $.each(response.categrie, function (key, item) {
                       // console.log("response",item);
                       $('.tab').append('<tr>\
                        <td>'+ item.id +'</td>\
                        <td>'+ item.name +'</td>\
                        <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button>\
                        <button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td></tr>');
                   });
  },

});
}
//edit Product
$(document).on('click', '.editbtn', function (e) {
   e.preventDefault()
            var catgrie_id = $(this).val(); //edit id 
            $('#EditCategries').modal('show');
            $.ajax({
              type: "GET",
              url: "/editcategries-data/"+catgrie_id,
              success: function(response)

              {
                if(response.status ==400)
                {
                  alert("Errors 404");
                  $('#editModal').modal('hide');

              }
              else{
                    // console.log(response.product);

                    $('#catgrie_id').val(response.categrie.id);
                    $('#name').val(response.categrie.name);
                    
                }
            }

        });

            $('.btn-close').find('input').val('');
        });

 //update product 
 $(document).on('click', '.update_categries', function (e) {
 event.preventDefault();
   var id=$('#catgrie_id').val();
   let formData= new FormData($('#Updatecategriedata')[0]);
   $.ajaxSetup(
   {
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
   $.ajax({
       type: "POST",
       url: "/update-categriesdata/"+id,
       data:formData,
       contentType:false,
       processData:false,
       success: function(response)
       {  
    
       if(response.status==200)
       {
           window.location.href=window.location.href;
       }
       elseif(response.status==400)
       {
         alert("4000 error")
       }
   }



});

});
//Delete Product
$(document).on('click', '.deletebtn', function (e) {
  e.preventDefault();
  $('#DeleteModal').modal('show');
  var pro_id = $(this).val();
  $('#deleteing_id').val(pro_id);
});
$(document).on('click', '.delete_categrie', function (e) {
  e.preventDefault();
   var categriesId = $('#deleteing_id').val(); //id get product
   console.log("id",categriesId);
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
   $.ajax({
    type: "DELETE",
    url: "delete-categriesdata/" + categriesId,
    dataType: "json",
    success: function (response) {
      if (response.status == 404) {
        $('.delete_book').text('Yes Delete');
        alert("Errors 404");
      }
      else
      {
        $('#DeleteModal').modal('hide');
       window.location.href=window.location.href;

      }

    }
  });
 });

//data table
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection
