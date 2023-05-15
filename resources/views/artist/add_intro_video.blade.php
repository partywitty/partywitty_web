@include('artist.include.head')
@include('artist.include.header')
<!-- <link  rel="stylesheet"  href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css"  type="text/css"/> -->
@php
    if ($type == 0 || $type == 4 || $type == 5 || $type == 6) {
        $accept = 'image/*';
        $bytes = 52428800;
    } else {
        $bytes = 209715200;
        $accept = 'video/*';
    }
    switch ($type) {
        case '0':
            $title = 'Upload Profile Photo';
            $back = 'photograph';
            break;
        case '1':
            $title = 'Upload Approval Videos';
            $back = 'videolist';
    
            break;
        case '2':
            $title = 'Upload Cover song';
            $back = 'coversong';
    
            break;
        case '3':
            $title = 'upload Originals';
            $back = 'Origanalsong';
    
            break;
        case '4':
            $title = 'upload media with celebs';
            $back = 'uploadcelebs';
    
            break;
        case '5':
            $title = 'Upload a photo of Bands you have worked with';
            $back = 'UploadBands';
    
            break;
        case '6':
            $title = 'Upload a photo of club you have worked with';
            $back = 'UploadClubs';
    
            break;
    }
@endphp

<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="back--btn">
            <a href="{{ url($back) }}">
                <img src="{{ url('') }}/public/assets/img/back.png" alt="">
            </a>
        </div>
        <div class="box--c intro">
            <h3>{{ $title }}</h3>
            <form action="{{ url('upload_file_submit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid--box add_video">
                    @if ($type == '2' || $type == '3' || $type == '0')
                        <input type="hidden" name="perfomed_at" id="perfomed_at">
                    @else
                        <div class="flex--100">
                            <label for="">{{ $type == '5' ? 'Band Name' : 'Perfomed At' }}</label>
                            <input type="text" class="form-control" name="perfomed_at" placeholder="">
                        </div>
                    @endif
                    <input type="hidden" name="type" value="{{ $type }}">
                    @if ($type == 0)
                        @if (!empty($UserMedias))
                            <div class="flex--100">
                                <input type="hidden" name="file_path" id="file_path">
                                <div class="dropzonbox">
                                    <input type="file" accept="{{ $accept }}" name="file1" id="file1"
                                        onchange="alert('Sorry, You can upload only one profile photo.')">
                                    <p class="dropzonetext">Upload Your file</p>
                                    <progress id="progressBar" value="0" max="100"
                                        style="width:100%;"></progress>
                                    <h3 id="status"></h3>
                                    <p id="loaded_n_total"></p>
                                </div>
                            </div>
                        @else
                            <div class="flex--100">
                                <input type="hidden" name="file_path" id="file_path">
                                <div class="dropzonbox">
                                    <input type="file" accept="{{ $accept }}" name="file1" id="file1"
                                        onchange="uploadFile()">
                                    <p class="dropzonetext">Upload Your file</p>
                                    <progress id="progressBar" value="0" max="100"
                                        style="width:100%;"></progress>
                                    <h3 id="status"></h3>
                                    <p id="loaded_n_total"></p>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="flex--100">
                            <input type="hidden" name="file_path" id="file_path">
                            <div class="dropzonbox">
                                <input type="file" accept="{{ $accept }}" name="file1" id="file1"
                                    onchange="uploadFile()">
                                <p class="dropzonetext">Upload Your file</p>
                                <progress id="progressBar" value="0" max="100" style="width:100%;"></progress>
                                <h3 id="status"></h3>
                                <p id="loaded_n_total"></p>
                            </div>
                        </div>
                    @endif
                </div>


                @if ($type == 3)
                    <div class="grid--box add_video">
                        <div class="flex--100">
                            <label for="">Spotify</label>
                            <input type="url" class="form-control" name="spotify_url"
                                placeholder="Enter Your Spotify Link">
                        </div>
                        <div class="flex--100">
                            <label for="">amazon</label>
                            <input type="url" class="form-control" name="amazon_prime"
                                placeholder="Enter Your Amazon Link">
                        </div>
                        <div class="flex--100">
                            <label for="">Jio Sawan</label>
                            <input type="url" class="form-control" name="jio_savan"
                                placeholder="Enter Your Jio Sawan Link">
                        </div>
                        <div class="flex--100">
                            <label for="">Apple music</label>
                            <input type="url" class="form-control" name="apple_music"
                                placeholder="Enter Your Apple music Link">
                        </div>
                        <div class="flex--100">
                            <label for="">Tidel</label>
                            <input type="url" class="form-control" name="tidel"
                                placeholder="Enter Your Tidel Link">
                        </div>
                        <div class="flex--100">
                            <label for="">Deezer</label>
                            <input type="url" class="form-control" name="deezer"
                                placeholder="Enter Your Deezer Link">
                        </div>
                        <div class="flex--100">
                            <label for="">Pandoora</label>
                            <input type="url" class="form-control" name="pandoora"
                                placeholder="Enter Your Pandoora Link">
                        </div>
                        <div class="flex--100">
                            <label for="">quboz</label>
                            <input type="url" class="form-control" name="qubon"
                                placeholder="Enter Your Quboz Link">
                        </div>
                    </div>
                @endif
                @if ($type == 0)
                    @if (!empty($UserMedias))
                        <div class="login--button--bx">
                            <a href="javascript:void(0)"
                                onclick="alert('Sorry, You can upload only one profile photo.')"
                                class="lg--btn--theame">Submit</a>
                        </div>
                    @else
                        <div class="login--button--bx">
                            <button type="submit" class="lg--btn--theame">Submit</button>
                        </div>
                    @endif
                @else
                    <div class="login--button--bx">
                        <button type="submit" class="lg--btn--theame">Submit</button>
                    </div>
                @endif
            </form>

        </div>
    </div>
</section>
@include('artist.include.foot')
<!-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> -->

<script>
    bodyClass('artist--list');
    const dropzone = new Dropzone("div.my-dropzone", {
        url: "/file/post"
    });

    function _(el) {
        return document.getElementById(el);
    }

    function uploadFile() {
        var file = _("file1").files[0];
        if (file.size < "{{ $bytes }}") {
            var formdata = new FormData();
            formdata.append("file1", file);
            formdata.append("_token", "{{ csrf_token() }}");
            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST",
            "{{ url('file_upload') }}"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
            //use file_upload_parser.php from above url
            ajax.send(formdata);
        } else {
            alert("Only {{ $bytes }} bytes data upload.");
        }
    }

    function progressHandler(event) {
        _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBar").value = Math.round(percent);
        _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
    }

    function completeHandler(event) {
        _("status").innerHTML = event.target.responseText + "upload is complete";
        $('#file_path').val('public/uploads/' + event.target.responseText);
        _("progressBar").value = 0; //wil clear progress bar after successful upload
        _('perfomed_at').value = event.target.responseText;
    }

    function errorHandler(event) {
        _("status").innerHTML = "Upload Failed";
    }

    function abortHandler(event) {
        _("status").innerHTML = "Upload Aborted";
    }
</script>
