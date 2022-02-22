@extends('Dashboard.layout.master')
@section('title', 'Dashboard')
@section('content')
<div class="container mt-2" style="padding-right: 10%;padding-left: 20%;">

    <div class="row">

        <div class="col-md-12 card-header text-center font-weight-bold">
            <h2>Add Product</h2>
        </div>
        <div class="col-md-12 mt-1 mb-2">
            <button type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#AddProductModal">Add Product</button>
        </div>
        <ul id="save_msgList"></ul>
        <div class="col-md-12">
            <table class="table" id="example">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Categories</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
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
<div class="modal fade" id="AddProductModal" tabindex="-1" aria-labelledby="AddProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddProductModalLabel">Add Product Deatail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

              <!--       <ul id="save_msgList"></ul> -->
              <form id="productdata" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="productname">Product Name</label>
                    <input type="text" required class="Productname form-control" placeholder="Enter your Product name" name="productname">
                </div>
                <div class="form-group mb-3">
                    <label for="productcategory">Slect Category</label>
                    <select name="categorie_id  " class="Category form-control">
                        <option value="id">cloth</option>
                        <option value="id">shoes</option>
                    </select>
                    <!-- <input type="text" required class="category form-control" placeholder="Enter your Product name" name="category"> -->
                </div>
                <div class="form-group">
                    <label>Product Quantity</label>
                    <input type="number" class="Quantity form-control" name="quantity">
                </div>
                <div class="form-group mb-3">
                    <label for="productimage">Product Image</label>
                    <input type="file" required class="Image form-control" name="image">
                </div>
                <div class="form-group mb-3">
                    <label for="">Product Price</label>
                    <input type="text" required class="Price form-control" id="price"  placeholder="Price" name="price">
                </div>

                <div class="form-group mb-3">
                    <label for="">Product Deatail</label>
                    <textarea rows="4" cols="50"  class="Detail form-control" name="description">
                    </textarea>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_prudct">Save</button>
            </div>
        </form>
    </div>

</div>
</div>

<!-- Update Modal boostrap model -->
<div class="modal fade" id="EditProduct" tabindex="-1" aria-labelledby="AddProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddProductModalLabel">Update Product Deatail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

              <!--       <ul id="save_msgList"></ul> -->
              <form id="Updateproductdata" enctype="multipart/form-data">
                <input type="hidden" name="product_id" id="pro_id">
                <div class="form-group mb-3">
                    <label for="productname">Product Name</label>
                    <input type="text" id="name" required class="Productname form-control" placeholder="Enter your Product name" name="productname">
                </div>
                <div class="form-group mb-3">
                    <label for="productcategory">Slect Category</label>
                    <select  name="categorie_id" id="categorie" class="Category form-control">
                        <option value="id">cloth</option>
                        <option value="id">shoes</option>
                    </select>
                    <!-- <input type="text" required class="category form-control" placeholder="Enter your Product name" name="category"> -->
                </div>
                <div class="form-group">
                    <label>Product Quantity</label>
                    <input type="number" class="Quantity form-control" id="quantity" name="quantity">
                </div>
                <div class="form-group mb-3">
                    <label for="productimage">Product Image</label>
                    <input type="file"  class="Image form-control" id="image" name="image">
                </div>
                <div class="form-group mb-3">
                    <label for="">Product Price</label>
                    <input type="text" required class="Price form-control" placeholder="Price" name="price" id="product_price">
                </div>

                <div class="form-group mb-3">
                    <label for="">Product Deatail</label>
                    <textarea rows="4" cols="50"  class="Detail form-control" name="description" id="description">
                    </textarea>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary update_prudct">Update</button>
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
        <button type="button" class="btn btn-primary delete_book">Yes Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- End Delete  model -->
//Insert new Book
<script type="text/javascript">
    $(document).on('click', '.add_prudct', function (e) {
      e.preventDefault();
      let formData= new FormData($('#productdata')[0]);
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
    url:"/add-book",
    data:formData,
    contentType:false,
    processData:false,
    success: function(){
       $('#productdata').text('Save');
       $('#productdata').trigger('reset'); 
       $('#AddProductModal').modal('hide');
      window.location.href=window.location.href;
   }
});

  });

    $(document).ready(function () {
        fetchproduct(); // Fetech data of books
    });
//fuction of fetch data from contrller 
function fetchproduct() {
  $.ajax({
    type: "GET",
    url: "/fetch-data",
    dataType: "json",
    success: function (response) {
      var products = response;
      console.log("response",products);
      $('.tab').html("");
      $.each(response.products, function (key, item) {
                       // console.log("response",item);
                       $('.tab').append('<tr>\
                        <td>'+ item.id +'</td>\
                        <td>'+ item.name +'</td>\
                        <td>'+ item.description +'</td>\
                        <td>'+ item.quantity +'</td>\
                        <td>'+ item.categorie_id +'</td>\
                        <td><img src="ProductImages/'+item.image+'" width="50px height="50px alt="Image"<td>\
                        <td>'+ item.price +'</td>\
                        <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                        <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td></tr>');
                   });
  },

});
}

//edit Product
$(document).on('click', '.editbtn', function (e) {
   e.preventDefault()
            var pro_id = $(this).val(); //edit id 
            $('#EditProduct').modal('show');
            $.ajax({
              type: "GET",
              url: "/edit-data/"+pro_id,
              success: function(response)

              {
                if(response.status ==400)
                {
                  alert("Errors 404");
                  $('#editModal').modal('hide');

              }
              else{
                    // console.log(response.product);

                    $('#pro_id').val(response.product.id);
                    $('#name').val(response.product.name);
                    $('#categorie').val(response.product.categorie_id);
                    $('#quantity').val(response.product.quantity);
                    $('#product_price').val(response.product.price);
                    $('#description').val(response.product.description);



                }
            }

        });

            $('.btn-close').find('input').val('');
        });

 //update product 
 $(document).on('click', '.update_prudct', function (e) {
 event.preventDefault();
   var id=$('#pro_id').val();
   let formData= new FormData($('#Updateproductdata')[0]);
   $.ajaxSetup(
   {
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
   $.ajax({
       type: "POST",
       url: "/update-data/"+id,
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
$(document).on('click', '.delete_book', function (e) {
  e.preventDefault();
   var productId = $('#deleteing_id').val(); //id get product
   console.log("id",productId);
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
   $.ajax({
    type: "DELETE",
    url: "delete-product/" + productId,
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

//DATA TABALE
 $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection


