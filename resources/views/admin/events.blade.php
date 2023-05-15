@include('admin.include.head')

@include('admin.include.navbar')
@include('admin.include.sidebar')

<div class="page-content">
    <div class="container-fluid">
        @include('admin.include.breadcrumb')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- <div class="header">
                                <div class="row mt-3 mr-2">
                                    <div class="col-md-12 text-right">
                                        <a href="javascript:void(0);" data-toggle="modal" data-target=".add" class="btn btn-primary">Create</a>
                                    </div>
                                </div>
                            </div> -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S. No</th>
                                        <th>Occation</th>
                                        <th>Name</th>
                                        <th>Venue</th>
                                        <th>Address</th>
                                        <th>Landmark</th>
                                        <th>Point Of Contact</th>
                                        <th>Date</th>
                                        <th>Sound Arrangement</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Start Break Time</th>
                                        <th>End Break Time</th>
                                        <th>Light and sound Engineer contact details</th>
                                        <th>Gathering Size</th>
                                        <th>Genres Name</th>
                                        <th>Band Size</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach($events as $event) { ?>
                                    <tr>
                                        <td>{{ $i }} .</td>
                                        <td>{{ $event['occation_name'] }}</td>
                                        <td>{{ $event['name'] }}</td>
                                        <td>{{ $event['venue'] }}</td>
                                        <td>{{ $event['address'] }}</td>
                                        <td>{{ $event['landmark'] }}</td>
                                        <td>{{ $event['point_of_contact'] }}</td>
                                        <td>{{ $event['date'] }}</td>
                                        <td>{{ $event['sound_arrangement'] }}</td>
                                        <td>{{ $event['start_time'] }}</td>
                                        <td>{{ $event['end_time'] }}</td>
                                        <td>{{ $event['s_break_time'] }}</td>
                                        <td>{{ $event['e_break_time'] }}</td>
                                        <td>{{ $event['LSE_contact_details'] }}</td>
                                        <td>{{ $event['gathering_size'] }}</td>
                                        <td>{{ $event['genres_name'] }}</td>
                                        <td>{{ $event['band_size'] }}</td>
                                        <td>
                                            <a href="javascript:void(0);" id="sa-params" class="btn-sm"><i
                                                    class="bx bx-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Category Name</label>
                            <input type="text" placeholder="Enter Category Name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Category Name</label>
                            <input type="text" placeholder="Enter Category Name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.include.footer')
@include('admin.include.foot')
