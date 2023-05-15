@include('admin.include.head')
@include('admin.include.navbar')
@include('admin.include.sidebar')
<link rel="stylesheet" href="{{ url('public/raman/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ url('public/raman/css/style.css') }}" />
<div class="page-content">
    <div class="container-fluid py-3">
        @include('admin.include.breadcrumb')
        <div class="card p-3">
            <div>
                <a href="javascript:void(0)" class="btn btn-info" data-toggle="modal" data-target="#AddClubModal">Add Club</a>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="bg-color">Menu</div>
                            <div class="table-responsive pb-2">
                                <table class="table table-bordered table-striped  text-center">
                                    <tbody>
                                        <tr class="bg-dark-custom text-white">
                                            <td>S.No</td>
                                            <td>Club Name</td>
                                            <td>Contact No</td>
                                            <td>Email</td>
                                            <td>Action</td>
                                        </tr>
                                        <?php $i = 1; ?>
                                        @foreach ($users as $row)
                                        @php
                                        $id = $row['id'];
                                        @endphp
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>
                                                <a href="{{ url('club_dashboard/' . $row['id']) }}">
                                                    {{ $row['username'] }} </a>
                                            </td>
                                            <td>{{$row['contact_no']}}</td>
                                            <td>{{$row['email']}}</td>
                                            <td>
                                                <div class="d-btn-flex">
                                                    <a href="javascript:void(0);" data-id="{{$id}}" data-username="{{$row['username']}}" data-contact_no="{{$row['contact_no']}}" data-email="{{$row['email']}}" class="btn-sm del update_club"><i class="bx bx-edit-alt bxes"></i></a>
                                                    <a href="javascript:void(0);" onclick="deleteuser('{{ $id }}')" class="btn-sm del"><i class="bx bx-trash-alt bxes"></i></a>
                                            </td>
                            </div>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="AddClubModal" tabindex="-1" role="dialog" aria-labelledby="AddClubModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddClubModalLabel">Add Club</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('add.club')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="username" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        @if ($errors->has('username'))
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Contact No</label>
                        <input type="text" name="contact_no" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        @if ($errors->has('contact_no'))
                        <span class="text-danger">{{ $errors->first('contact_no') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editClubModal" tabindex="-1" role="dialog" aria-labelledby="editClubModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editClubModalLabel">Edit Club</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('edit.club')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="hidden" name="id" id="edit_id">
                        <input type="text" name="username" id="edit_username" class="form-control" placeholder="" aria-describedby="helpId">
                        @if ($errors->has('username'))
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Contact No</label>
                        <input type="text" name="contact_no" id="edit_contact_no" class="form-control" placeholder="" aria-describedby="helpId">
                        @if ($errors->has('contact_no'))
                        <span class="text-danger">{{ $errors->first('contact_no') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="edit_email" class="form-control" placeholder="" aria-describedby="helpId">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('admin.include.footer')
@include('admin.include.foot')

<script>
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

    $(document).on('click', '.update_club', function(){
       $('#edit_id').val($(this).data('id')); 
       $('#edit_username').val($(this).data('username')); 
       $('#edit_contact_no').val($(this).data('contact_no')); 
       $('#edit_email').val($(this).data('email')); 
       $('#editClubModal').modal('show');
    });
</script>