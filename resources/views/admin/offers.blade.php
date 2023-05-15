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
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S. No</th>
                                        <th>Offer Name</th>
                                        <th>Small Description</th>
                                        <th>Start date/time</th>
                                        <th>End date/time</th>
                                        <th>Days</th>
                                        <th>Thamnail Photo</th>
                                        <th>Cover Photo</th>
                                        <th>Stage Mrp & Selling price</th>
                                        <th>couple Mrp & Selling price</th>
                                        <th>kids Mrp & Selling price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($offers as $offer)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $offer['offer_name'] }}</td>
                                            <td>{{ $offer['small_description'] }}</td>
                                            <td>{{ date('D d-m-Y', strtotime($offer['start_date'])) }} {{date('h:i A', strtotime($offer['start_time']))}}</td>
                                            <td>{{ date('D d-m-Y', strtotime($offer['end_date'])) }} {{date('h:i A', strtotime($offer['end_time']))}}</td>
                                            <td>{{$offer['days']}}</td>
                                            <td><img src="{{url('')}}/{{ $offer['thamnail_photo'] }}" alt="" width="150"> </td>
                                            <td><img src="{{url('')}}/{{ $offer['cover_photo'] }}" width="150" alt=""></td>
                                            <td><span style="text-decoration: line-through;"> ₹	{{ $offer['stage_mrp'] }}</span> ₹	{{ $offer['stage_sell'] }}</td>
                                            <td><span style="text-decoration: line-through;"> ₹	{{ $offer['couple_mrp'] }}</span> ₹	{{ $offer['couple_sell'] }}</td>
                                            <td><span style="text-decoration: line-through;"> ₹	{{ $offer['kids_mrp'] }}</span> ₹ {{ $offer['kids_sell'] }}</td>
                                            <td>
                                                <a href="javascript:void(0);"
                                                    onclick="deleteoffer('{{ $offer['id'] }}')" class="btn-sm">
                                                    <i class="bx bx-trash-alt"></i>
                                                </a>
                                                <a href="{{url('deal_sold')}}/{{$offer['id']}}">view</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
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
            url: '{{ url('user_status') }}',
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

    function deleteoffer(id) {

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
                    url: "{{ url('delete_offer') }}",
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
