@extends('layouts.admin_master')
@section('admin-content')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sub->SubCategory List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Cat Name</th>
                                            <th>SubCat Name</th>
                                            <th>subSubCat Name En</th>
                                            <th>subSubCategory Name Bn</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subsubcategories as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->category->category_name_en }}
                                                </td>
                                                <td>
                                                    {{ $item->subcategory->subcategory_name_en }}
                                                </td>
                                                <td>{{ $item->subsubcategory_name_en }}</td>
                                                <td>{{ $item->subsubcategory_name_bn }}</td>
                                                <td>
                                                    <a href="{{ url('admin/subsubcategory/edit/' . $item->id) }}"
                                                        class="btn btn-sm btn-primary" title="edit data"> <i
                                                            class="fa fa-pencil"></i></a>

                                                    <a href="{{ url('admin/subsubcategory/delete/' . $item->id) }}"
                                                        class="btn btn-sm btn-danger" id="delete" title="delete data"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col -->


                <!--   ------------ Add Category Page -------- -->


                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Sub-SubCategory </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="post" action="{{ route('subsubcategory.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-control-label">Select Category: <span
                                                class="tx-danger">*</span></label>
                                        <select class="form-control select2-show-search" data-placeholder="Select One"
                                            name="category_id">
                                            <option label="Choose one"></option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Select SubCategory: <span
                                                class="tx-danger">*</span></label>
                                        <select class="form-control select2-show-search" data-placeholder="Select One"
                                            name="subcategory_id">
                                            <option label="Choose one"></option>

                                        </select>
                                        @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Sub-Sub-Category Name English: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="subsubcategory_name_en"
                                            value="{{ old('subsubcategory_name_en') }}"
                                            placeholder="Enter subcategory name en">
                                        @error('subsubcategory_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">sub-Category Name Bangla: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="subsubcategory_name_bn"
                                            value="{{ old('subsubcategory_name_bn') }}"
                                            placeholder="Enter subcategory name bn">
                                        @error('subsubcategory_name_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
                                    </div>
                                </form>





                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>




            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

    <script src="{{ asset('backend') }}/jquery-2.2.4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/admin/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {

                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name_en + '</option>');

                            });

                        },

                    });
                } else {
                    alert('danger');
                }

            });

        });
    </script>


@endsection
