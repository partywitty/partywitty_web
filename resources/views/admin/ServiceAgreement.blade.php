@include('admin.include.head')

@include('admin.include.navbar')
@include('admin.include.sidebar')
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<div class="page-content">
    <div class="container-fluid">
        @include('admin.include.breadcrumb')
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('edit-service-agreement') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $id }}">
                            <textarea name="contant" id="" cols="30" rows="10">{{ $contant->contant }}</textarea>
                            <br>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.include.footer')
@include('admin.include.foot')
<script>
    CKEDITOR.replace('contant');
</script>
