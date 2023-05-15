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
                    <div class="header">
                        <div class="row mt-3 mr-2">
                            <div class="col-md-12 text-left">
                                <h1>{{ $offer['offer_name'] }}</h1>
                                <p>{{ date('D d-m-Y', strtotime($offer['start_date'])) }}
                                    {{ date('h:i A', strtotime($offer['start_time'])) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S. No</th>
                                        <th>Name</th>
                                        <th>Contact Number</th>
                                        <th>Stage</th>
                                        <th>couple</th>
                                        <th>kids</th>
                                        <th>Total</th>
                                        <th>Commission</th>
                                        <th>Convenience Fee</th>
                                        <th>Payment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @if ($offersbooks != null)
                                        @foreach ($offersbooks as $offersbook)
                                        <?php
                                        $totalcount = $offersbook['stageCount'] + $offersbook['CoupleCount'] + $offersbook['kidsCount'];
                                        $convenience = ($totalcount * 118) - $offersbook['total_amount'];
                                        $commission10 = $convenience * 0.1;
                                        $commission18 = $convenience * 0.18;
                                        $commission = $commission10 + $commission18;
                                        ?>
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{$offersbook['name']}}</td>
                                                <td>{{$offersbook['contact_number']}}</td>
                                                <td>{{ $offersbook['stageCount'] }}</td>
                                                <td>{{ $offersbook['CoupleCount'] }}</td>
                                                <td>{{ $offersbook['kidsCount'] }}</td>
                                                <td>{{ $offersbook['total_amount'] }}</td>
                                                <td>{{$commission}}</td>
                                                <td>{{$convenience}}</td>
                                                <td>{{ !empty($offersbook['razorpay_payment_id'])?"done":"pendding" }}</td>
                                                <td>
                                                    <a href="javascript:void(0);"
                                                        onclick="deleteoffer('{{ $offersbook['id'] }}')" class="btn-sm">
                                                        <i class="bx bx-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach
                                    @endif
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
                    url: "{{ url('delete_offer_detail') }}",
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
