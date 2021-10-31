@extends('layouts.admin_master')


@section('admin-content')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> All Product</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name English</th>
                                            <th>Product Price</th>
                                            <th>Product Quantity</th>
                                            <th>Product Discount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($products as $item)
                                            <td>
                                                <img src="{{ asset($item->product_thambnail) }}" alt=""
                                                    style="height: 60px; width:60px;">
                                            </td>
                                            <td>{{ $item->product_name_en }}</td>
                                            <td>{{ $item->selling_price }}$</td>
                                            <td>{{ $item->product_qty }}</td>
                                            <td>
                                                @if ($item->discount_price == null)
                                                    <span class="badge badge-pill badge-danger">No</span>
                                                @else
                                                    @php
                                                        $amount = $item->selling_price - $item->discount_price;
                                                        $discount = ($amount / $item->selling_price) * 100;
                                                    @endphp
                                                    <span
                                                        class="badge badge-pill badge-danger">{{ round($discount) }}%</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/product/edit/' . $item->id) }}"
                                                    class="btn btn-sm btn-primary" title="edit data"> <i
                                                        class="fa fa-eye"></i></a>

                                                <a href="{{ url('admin/product/edit/' . $item->id) }}"
                                                    class="btn btn-sm btn-primary" title="edit data"> <i
                                                        class="fa fa-pencil"></i></a>


                                                <a href="{{ url('admin/product/delete/' . $item->id) }}"
                                                    class="btn btn-sm btn-danger" id="delete" title="delete data"><i
                                                        class="fa fa-trash"></i></a>

                                                @if ($item->status == 1)
                                                    <a href="{{ url('admin/product/inactive/' . $item->id) }}"
                                                        class="btn btn-sm btn-danger" title="inactive"> <i
                                                            class="fa fa-arrow-down"></i></a>
                                                @else
                                                    <a href="{{ url('admin/product/active/' . $item->id) }}"
                                                        class="btn btn-sm btn-success" title="active now data"> <i
                                                            class="fa fa-arrow-up"></i></a>
                                                @endif
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
            </div>
        </section>
    </div>

@endsection
