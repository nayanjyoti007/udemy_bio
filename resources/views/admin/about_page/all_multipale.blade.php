@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">All Multi Images</h4>
                            <table id="datatable"
                                class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 156px;"
                                            aria-label="Sl No.: activate to sort column ascending">Sl No.</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 239px;"
                                            aria-label="About Multi Image: activate to sort column descending" aria-sort="ascending">
                                            About Multi Image</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 112px;"
                                            aria-label="Action: activate to sort column ascending">Action</th>
                                    </tr>
                                </thead>


                                <tbody>

                                   @foreach ($allMultiimage as $item)
                                   <tr class="odd">
                                    <td class="dtr-control" tabindex="0">{{$loop->iteration}}</td>
                                    <td class="sorting_1"><img src="{{ asset($item->multi_image) }}" alt="" srcset="" style="width: 50px"></td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-success" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        <a href="" class="btn btn-sm btn-danger" title="Delete Data"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                   @endforeach

                                </tbody>
                            </table>


                        </div>
                    </div>

                </div><!-- end col -->
            </div>
        </div>
    </div>
@endsection
