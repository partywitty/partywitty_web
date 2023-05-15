@include('admin.include.head')
@include('admin.include.navbar')
@include('admin.include.sidebar')
<div class="page-content">
    <div class="container-fluid">
        <iframe src="{{url($obj->file)}}" frameborder="0" style="width: 100%;height:90vh;"></iframe>
    </div>
</div>

@include('admin.include.footer')
@include('admin.include.foot')