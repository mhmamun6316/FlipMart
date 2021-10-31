@extends('layouts.admin_master')
@section('admin-content')

    {{-- for product --}}


    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Product </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <!-- start 1st row  -->

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label">Select Brand: <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-control select2-show-search"
                                                        data-placeholder="Select One" name="brand_id">
                                                        <option label="Choose one"></option>
                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">
                                                                {{ ucwords($brand->brand_name_en) }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('brand_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- end col md 4 -->

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label">Select Category: <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-control select2-show-search"
                                                        data-placeholder="Select One" name="category_id">
                                                        <option label="Choose one"></option>
                                                        @foreach ($categories as $cat)
                                                            <option value="{{ $cat->id }}">
                                                                {{ ucwords($cat->category_name_en) }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- end col md 4 -->


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label">Select Sub-Category: <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-control select2-show-search"
                                                        data-placeholder="Select One" name="subcategory_id">
                                                        <option label="Choose one"></option>
                                                        {{-- @foreach ($categories as $cat)
                                                      <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}</option>
                                                      @endforeach --}}
                                                    </select>
                                                    @error('subcategory_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- end col md 4 -->


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label">Select Sub-SubCategory: <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-control select2-show-search"
                                                        data-placeholder="Select One" name="subsubcategory_id">
                                                        {{-- <option label="Choose one"></option>
                                                      @foreach ($categories as $cat)
                                                      <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}</option>
                                                      @endforeach --}}
                                                    </select>
                                                    @error('subsubcategory_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- end col md 4 -->
                                        </div> <!-- end 1st row  -->

                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-control-label">Product Name English: <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="product_name_en"
                                                        value="{{ old('product_name_en') }}"
                                                        placeholder="Enter Product Name English">
                                                    @error('product_name_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> {{-- end col-md-3 --}}

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Product Name Bangla: <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="product_name_bn"
                                                        value="{{ old('product_name_bn') }}"
                                                        placeholder="Product Name Bangla">
                                                    @error('product_name_bn')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> {{-- end col-md-3 --}}

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label">Product Code: <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="product_code"
                                                        value="{{ old('product_code') }}"
                                                        placeholder="Enter Product Code">
                                                    @error('product_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> {{-- end row --}}

                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Product Quantity: <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="product_qty"
                                                        value="{{ old('product_qty') }}"
                                                        placeholder="Enter Product Quantity">
                                                    @error('product_qty')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Product Tags English: <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="product_tags_en"
                                                        value="{{ old('product_tags_en') }}"
                                                        placeholder="Product Tags English" data-role="tagsinput">
                                                    @error('product_tags_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Product Tags Bangla: <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="product_tags_bn"
                                                        value="{{ old('product_tags_bn') }}"
                                                        placeholder="product tags bangla" data-role="tagsinput">
                                                    @error('product_tags_bn')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                        </div> {{-- end row --}}

                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Product Size English: <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="product_size_en"
                                                        value="{{ old('product_size_en') }}"
                                                        placeholder="Product Size English" data-role="tagsinput">
                                                    @error('product_size_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Product Size Bangla: <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="product_size_bn"
                                                        value="{{ old('product_size_bn') }}"
                                                        placeholder="Product Size Bangla" data-role="tagsinput">
                                                    @error('product_size_bn')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Product Color English: <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="product_color_en"
                                                    value="Red,Green,Black" data-role="tagsinput">
                                                    @error('product_color_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> {{-- end row --}}

                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Product Color Bangla: <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="product_color_bn"
                                                        value="{{ old('product_color_bn') }}"
                                                        placeholder="Enter Product Color Bangla" data-role="tagsinput">
                                                    @error('product_color_bn')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Selling Price: <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="selling_price"
                                                        value="{{ old('selling_price') }}" placeholder="Selling Price">
                                                    @error('selling_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-control-label">Discount Price: <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="discount_price"
                                                        value="{{ old('discount_price') }}" placeholder="Discount Price">
                                                    @error('discount_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                        </div> {{-- end row --}}


                                        <div class="row">
                                            <!-- start 7th row  -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Main Thambnail: <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="file" name="product_thambnail"
                                                        value="{{ old('product_thambnail') }}"
                                                        onchange="mainThambUrl(this)">
                                                    @error('product_thambnail')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <img src="" id="mainThmb">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Multiple_image: <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="file" name="multi_img[]"
                                                        value="{{ old('multi_img') }}" multiple id="multiImg">
                                                    @error('multi_img')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="row" id="preview_img">
                                                </div>
                                            </div>

                                        </div> <!-- end 7th row  -->

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Short Description English: <span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="short_descp_en" id="summernote"></textarea>
                                                    @error('short_descp_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Short Description Bangla: <span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="short_descp_bn" id="summernote2"></textarea>
                                                    @error('short_descp_bn')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Long Description English: <span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="long_descp_en" id="summernote3"></textarea>
                                                    @error('long_descp_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Long Description Bangla: <span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="long_descp_bn" id="summernote4"></textarea>
                                                    @error('long_descp_bn')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">                       
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Hot & Featured <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                                                            <label for="checkbox_2">Hot Deals</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                                            <label for="checkbox_3">Featured</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Special  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                                            <label for="checkbox_4">Special Offer</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                                            <label for="checkbox_5">Special Deals</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                    </div>
                                </div>
                                

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">

                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>






    <script src="{{ asset('backend') }}/jquery-2.2.4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('select[name="category_id"]').on('change', function(){
              var category_id = $(this).val();
              if(category_id) {
                  $.ajax({
                      url: "{{  url('/admin/subcategory/ajax') }}/"+category_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                        $('select[name="subsubcategory_id"]').html('');
  
                         var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
  
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
  
                            });
  
                      },
  
                  });
              } else {
                  alert('danger');
              }
  
          });
  
  
  
          $('select[name="subcategory_id"]').on('change', function(){
              var subcategory_id = $(this).val();
              if(subcategory_id) {
                  $.ajax({
                      url: "{{  url('/admin/subsubcategory/ajax') }}/"+subcategory_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                         var d =$('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                            });
                      },
                  });
              } else {
                  alert('danger');
              }
  
          });
  
      });
  
      </script>
  
  
  <script>
  
    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                    .height(80); //create image element
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
  
        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });
  
    </script>
  
    <script>
      function mainThambUrl(input){
        if (input.files && input.files[0]) {
          var reader = new FileReader();
  
          reader.onload = function(e){
              $('#mainThmb').attr('src',e.target.result).width(80)
                    .height(80);
          };
          reader.readAsDataURL(input.files[0]);
        }
      }
    </script>




@endsection
