@include('admin.include.head')

@include('admin.include.navbar')
@include('admin.include.sidebar')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


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
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S. No</th>
                                        <th>Full Name</th>
                                        <th>Contact No.</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Last Login</th>
                                        <th>Profile Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($users as $key => $user) { 
                                        if ($user['end_page'] != "") {
                                            if ($user['end_page'] == 'service_agreement') {
                                                if ($user['status'] == '1') {
                                                    $end_page = 'artist-profile';
                                                } else {
                                                    $end_page = $user['end_page'];
                                                }
                                            } else {
                                                $end_page = $user['end_page'];
                                            }
                                        } else {
                                            $end_page = 'artist_hire';
                                        }
                                        ?>
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$user['username']}}</td>
                                            <td>{{$user['contact_no']}}</td>
                                            <td>{{$user['gender']}}</td>
                                            <td>{{$user['email']}}</td>
                                            <td>{{$user['last_login']}}</td>
                                            <td>{!!($user['end_page'] == 'service_agreement')?('<span class="text-success">Complete</span>'):('<span class="text-warning">'.$end_page.'</span>')!!}</td>
                                            <td>
                                                <a href="{{url('artist-profile-view/'.$user['id'])}}" target="_blank" class="btn-sm">View Profile</a>
                                                @if($user['status'] == '0')
                                                <button class="change_status btn-sm btn-danger" data-id="{{$user['id']}}" data-status="1">Inactive</button>
                                                @else
                                                <button class="change_status btn-sm btn-success" data-id="{{$user['id']}}" data-status="0">Active</button>
                                                @endif
                                                <a href="javascript:void(0);" onclick="deleteuser('{{$user['id']}}')" class="btn-sm"><i class="bx bx-trash-alt"></i></a>
                                                <a href="{{url('profile/'.$user['id'])}}" target="_blank" class="btn-sm">login</a>
                                                @if($pagename == 'Manage Club')
                                                <a href="{{url('offers/'.$user['id'])}}" target="_blank" class="btn-sm">offers</a>
                                                @endif
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
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
<script>
    $(document).on('click', '.change_status', function() {
        var id = $(this).data('id');
        var status = $(this).data('status');
        $.ajax({
            url: '{{url("user_status")}}',
            type: 'post',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                status: status
            },
            success: function(response) {
                location.reload();
            }
        });
    });

    function deleteuser(id) {

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
                    url: '{{url("delete_user")}}',
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                    },
                    success: function(response) {
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        ).then((result) => {
                            location.reload();
                        })
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
        })
    }
</script>

@include('admin.include.footer')
@include('admin.include.foot')