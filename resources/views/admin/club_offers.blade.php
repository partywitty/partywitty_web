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
                                        <th>Club Name</th>
                                        <th>Name</th>
                                        <th>Contact No.</th>
                                        <th>Role</th>
                                        <th>Dance Floor</th>
                                        <th>Live Music</th>
                                        <th>Advertise Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach($offers as $key => $offer) { ?>
                                    <?php
                                    if ($offer['advertise_type'] == '0') {
                                        $advertise_type = 'Special Days';
                                    } elseif ($offer['advertise_type'] == '1') {
                                        $advertise_type = 'Regular Days';
                                    } else {
                                        $advertise_type = 'Both';
                                    }
                                    ?>
                                    <tr>
                                        <td>{{ $i }} .</td>
                                        <td>{{ $offer['club_name'] }}</td>
                                        <td>{{ $offer['name'] }}</td>
                                        <td>{{ $offer['contact_no'] }}</td>
                                        <td>{{ $offer['are_you'] }}</td>
                                        <td>{{ $offer['dance_floor'] == '0' ? 'No' : 'Yes' }}</td>
                                        <td>{{ $offer['live_music'] == '0' ? 'No' : 'Yes' }}</td>
                                        <td>{{ $advertise_type }}</td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn-sm delete_offer"
                                                data-id="{{ $offer['id'] }}"><i class="bx bx-trash-alt"></i></a>
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

<script>
    $(document).on('click', '.delete_offer', function(e) {
        var id = $(this).data('id');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            console.log(result);
            if (result.value === true) {
                $.ajax({
                    url: '{{ url('delete_offer') }}',
                    type: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id
                    },
                    success: function($data) {
                        location.reload();
                    }
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        });
    });
</script>
