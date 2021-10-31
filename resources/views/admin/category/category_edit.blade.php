@extends('layouts.admin_master')


@section('admin-content')


    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-3"></div>

                <div class="col-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Category Edit</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">


                            <form action="{{ route('update.category') }}" method="POST">
                                @csrf

                                <input type="hidden" name="id" value="{{ $category->id }}">
                                
                                <div class="form-group">
                                    <label class="form-control-label">Category Icon: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="category_icon"
                                        value="{{ $category->category_icon }}" placeholder="Enter category_icon">
                                    @error('category_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <label class="form-control-label">Category Name English: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="category_name_en"
                                        value="{{ $category->category_name_en }}" placeholder="Enter brand_name_bn">
                                    @error('category_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label class="form-control-label">Category Name Bangla: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="category_name_bn"
                                        value="{{ $category->category_name_bn }}" placeholder="Enter brand_name_bn">
                                    @error('category_name_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Add Category">
                                </div>

                            </form>

                        </div>
                    </div>


                </div>
                {{-- col-6 end --}}

                <div class="col-3"></div>

            </div>

        </section>

    </div>

@endsection
