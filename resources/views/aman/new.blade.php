@include('admin.include.head')
@include('admin.include.navbar')
@include('admin.include.sidebar')
<link rel="stylesheet" href="{{ url('public/raman/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ url('public/raman/css/style.css') }}" />
<style>
.img-container-1 div a img {
    width: 600px;
    height: 250px;
    overflow: hidden;
}

.img-container-1 a img {
    width: 400px;
    height: 250px;
    overflow: hidden;
}

.image-wrapper1 a img {
    width: 200px;
    height: 205px;
    overflow: hidden;
}

.image-wrapper2 a img {
    width: 250px;
    height: 315px;
    overflow: hidden;
}
</style>
<div class="page-content">
    <div class="container-fluid">
        @include('admin.include.breadcrumb')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right my-2">
                                <div class="form-check">
                                    <label class="form-check-label mr required-after" for="check1">Check All</label>
                                    <input type="checkbox" class="form-check-input mt-2 customcheckbx" name="option1"
                                        value="something" id="checkAll" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-check artist-title1">
                                    <label class="form-check-label" for="inlineCheckbox1">What type of Artist
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <div class="my-3">
                                        <ul class="nav nav-pills">
                                            @if (!empty($profiles))
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page"
                                                    href="#">{{ $profiles->artist_name }}</a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>

                                    @if (check_verification($user->id, 'tbl_user_profiles', 'artist_name',
                                    $profiles->id) == 0)
                                    Rejected
                                    @elseif (check_verification($user->id, 'tbl_user_profiles', 'artist_name',
                                    $profiles->id) == 1)
                                    Accepted
                                    @else
                                    <div>
                                        <button class="btn btn-info btn-sm mr-1 approve"
                                            data-table_name="tbl_user_profiles" data-column_name="artist_name"
                                            data-row_id="{{ $profiles->id }}" data-status="1"
                                            data-artist_id="{{ $user->id }}">
                                            <i class="fa fa-check right-tick1"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm mr-1 disapprove"
                                            data-table_name="tbl_user_profiles" data-column_name="artist_name"
                                            data-row_id="{{ $profiles->id }}" data-status="0"
                                            data-artist_id="{{ $user->id }}">
                                            <i class="fas fa-window-close"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm " data-toggle="modal"
                                            data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                            <i class="bx bx-edit-alt bxess_font"></i>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="artist-title1">
                                    <label class="form-check-label" for="inlineCheckbox1">Uploaded Cover/Profile
                                        Photographs</label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <div class="cover-pr-pic">
                                    @foreach ($medias as $row)
                                    @if ($row->type == 1)
                                    <div class="pr-pic img-container">
                                        <div class="image-wrapper1">

                                            <a href="{{ url('') }}/{{ $row->file_path }}">
                                                <img class="img-fluid img-thumbnail"
                                                    src="{{ url('') }}/{{ $row->file_path }}" alt="" width="200"
                                                    height="200" />
                                            </a>

                                            <div class="overlay">
                                                <div class="overlay-content">
                                                    @if (check_verification($user->id, 'tbl_user_media', 'file_path',
                                                    $row->id) == 0)
                                                    Rejected
                                                    @elseif (check_verification($user->id, 'tbl_user_media',
                                                    'file_path', $row->id) == 1)
                                                    Accepted
                                                    @else
                                                    <div>
                                                        <button class="btn btn-info btn-sm mr-1 approve"
                                                            data-table_name="tbl_user_media"
                                                            data-column_name="file_path" data-row_id="{{ $row->id }}"
                                                            data-status="1" data-artist_id="{{ $user->id }}">
                                                            <i class="fa fa-check right-tick1"></i>
                                                        </button>
                                                        <button class="btn btn-info btn-sm mr-1 disapprove"
                                                            data-table_name="tbl_user_media"
                                                            data-column_name="file_path" data-row_id="{{ $row->id }}"
                                                            data-status="0" data-artist_id="{{ $user->id }}">
                                                            <i class="fas fa-window-close"></i>
                                                        </button>
                                                        <button class="btn btn-info btn-sm " data-toggle="modal"
                                                            data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                            <i class="bx bx-edit-alt bxess_font"></i>
                                                        </button>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <div class="cr-pic">
                                        @foreach ($medias as $row)
                                        @if ($row->type == 0)
                                        <div class="image-wrapper2 img-container-1">
                                            <a href="{{ url('') }}/{{ $row->file_path }}">
                                                <img class="img-fluid img-thumbnail"
                                                    src="{{ url('') }}/{{ $row->file_path }}" alt="" width="800"
                                                    height="200" />
                                            </a>
                                            <div class="overlay-1">
                                                <div class="overlay-content-1">
                                                    @if (check_verification($user->id, 'tbl_user_media', 'file_path',
                                                    $row->id) == 0)
                                                    Rejected
                                                    @elseif (check_verification($user->id, 'tbl_user_media',
                                                    'file_path', $row->id) == 1)
                                                    Accepted
                                                    @else
                                                    <div>
                                                        <button class="btn btn-info btn-sm mr-1 approve"
                                                            data-table_name="tbl_user_media"
                                                            data-column_name="file_path" data-row_id="{{ $row->id }}"
                                                            data-status="1" data-artist_id="{{ $user->id }}">
                                                            <i class="fa fa-check right-tick1"></i>
                                                        </button>
                                                        <button class="btn btn-info btn-sm mr-1 disapprove"
                                                            data-table_name="tbl_user_media"
                                                            data-column_name="file_path" data-row_id="{{ $row->id }}"
                                                            data-status="0" data-artist_id="{{ $user->id }}">
                                                            <i class="fas fa-window-close"></i>
                                                        </button>
                                                        <button class="btn btn-info btn-sm " data-toggle="modal"
                                                            data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                            <i class="bx bx-edit-alt bxess_font"></i>
                                                        </button>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- //popup image start -->
                            <div class="col-md-12 my-3">
                                <div class="form-check artist-title1">
                                    <label class="form-check-label" for="inlineCheckbox1">Upload Photographs
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="upload-pic">
                                    <p>Uploaded Multiple Photographs:</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row gallerys1">
                                    @foreach ($medias as $row)
                                    @if ($row->type == 2)
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="cr-pic img-container-1">
                                            <div>
                                                <a href="{{ url('') }}/{{ $row->file_path }}">
                                                    <img src="{{ url('') }}/{{ $row->file_path }}" alt=""
                                                        class="img-fluid imgfull" />
                                                </a>
                                            </div>
                                            @if (check_verification($user->id, 'tbl_user_media', 'file_path', $row->id)
                                            == 0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_user_media', 'file_path',
                                            $row->id) == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_user_media" data-column_name="file_path"
                                                data-row_id="{{ $row->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_user_media" data-column_name="file_path"
                                                data-row_id="{{ $row->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                        <div class="my-2">
                                            <a class="btn btn-primary btn-img"
                                                href="{{ url('') }}/{{ $row->file_path }}">
                                                Show image
                                            </a>
                                        </div>
                                        <div class="text-left mt-1">
                                            <h6>{{ $row->caption }}</h6>
                                            <h6>{{ $row->location }}</h6>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <!-- end popup -->
                            <div class="col-md-12 mt-3">
                                <div class="form-check artist-title1">
                                    <label class="form-check-label" for="inlineCheckbox1">Introduction Message
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                                <div class="intro mt-3">
                                    <div>
                                        <div class="d-flex justify-content-end mb-2">
                                            @if (check_verification($user->id, 'tbl_user_profiles', 'introduction',
                                            $profiles->id) == 0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_user_profiles', 'introduction',
                                            $profiles->id) == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_user_profiles" data-column_name="introduction"
                                                data-row_id="{{ $profiles->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_user_profiles" data-column_name="introduction"
                                                data-row_id="{{ $profiles->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </div>
                                    <p class="table-box-shadow">
                                        {{ $profiles->introduction != '' ? $profiles->introduction : '' }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-check artist-title1">
                                    <label class="form-check-label" for="inlineCheckbox1">Upload Videos
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="upload-pic">
                                    <p>Uploaded Videos:</p>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="row">
                                    @foreach ($medias as $row)
                                    @if ($row->type == 3)
                                    <div class="col-md-3">
                                        <div>
                                            <video width="200" height="240" controls>
                                                <source src="{{ url('') }}/{{ $row->file_path }}" type="video/mp4" />
                                            </video>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            @if (check_verification($user->id, 'tbl_user_media', 'file_path', $row->id)
                                            == 0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_user_media', 'file_path',
                                            $row->id) == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_user_media" data-column_name="file_path"
                                                data-row_id="{{ $row->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_user_media" data-column_name="file_path"
                                                data-row_id="{{ $row->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                        <div class="text-left mt-1">
                                            <h6>{{ $row->caption }}</h6>
                                            <h6>{{ $row->location }}</h6>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-check artist-title1 mb-2">
                                    <label class="form-check-label" for="inlineCheckbox1">Music Type/Genre
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                                <div class="">
                                    @foreach ($Genres as $row)
                                    <div class="d-flex justify-content-between mt-2">
                                        <div>{{ $row->name }}</div>
                                        <div>
                                            @if (check_verification($user->id, 'tbl_genres', 'name', $row->id) == 0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_genres', 'name', $row->id) == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_genres" data-column_name="name"
                                                data-row_id="{{ $row->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_genres" data-column_name="name"
                                                data-row_id="{{ $row->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-check artist-title1 mb-2">
                                    <label class="form-check-label" for="inlineCheckbox1">Language
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                                <div class="">
                                    @if (!empty($languages))
                                    @foreach ($languages as $lang)
                                    <div class="d-flex justify-content-between mt-2">
                                        <div><?= $lang->language ?></div>
                                        @if (check_verification($user->id, 'tbl_languages', 'language', $lang->id) == 0)
                                        Rejected
                                        @elseif (check_verification($user->id, 'tbl_languages', 'language', $lang->id)
                                        == 1)
                                        Accepted
                                        @else
                                        <div class="d-flex justify-content-between mt-2">
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_languages" data-column_name="language"
                                                data-row_id="{{ $lang->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_languages" data-column_name="language"
                                                data-row_id="{{ $lang->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                        </div>
                                        @endif
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-check artist-title1 mb-2">
                                    <label class="form-check-label" for="inlineCheckbox1">Venue </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                                <div class="">
                                    @if (!empty($Venue))
                                    @foreach ($Venue as $row)
                                    <div class="d-flex justify-content-between mt-2">
                                        <div>{{ $row->name }}</div>
                                        <div>
                                            @if (check_verification($user->id, 'tbl_venue', 'name', $row->id) == 0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_venue', 'name', $row->id) == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve" data-table_name="tbl_venue"
                                                data-column_name="name" data-row_id="{{ $row->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_venue" data-column_name="name"
                                                data-row_id="{{ $row->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-check artist-title1 mb-2">
                                    <label class="form-check-label" for="inlineCheckbox1">Formation on Stage
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                                <div class="">
                                    @if (!empty($profiles->subcategory_name))
                                    <?php $subcategory_name = explode(',', $profiles->subcategory_name);
                                    $subcategory_id = explode(',', $profiles->subcategory_id); ?>
                                    @foreach ($subcategory_name as $key => $row)
                                    <div class="d-flex justify-content-between mt-2">
                                        <div>{{ $row }}</div>
                                        <div>
                                            @if (check_verification($user->id, 'tbl_artist_subcategory', 'name',
                                            $subcategory_id[$key]) == 0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_artist_subcategory', 'name',
                                            $subcategory_id[$key]) == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_artist_subcategory" data-column_name="name"
                                                data-row_id="{{ $subcategory_id[$key] }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_artist_subcategory" data-column_name="name"
                                                data-row_id="{{ $subcategory_id[$key] }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            @if (!empty($profiles->subcategory_name))
                            <?php
                            $subcategory_id = explode(',', $profiles->subcategory_id);
                            $subcategory_name = explode(',', $profiles->subcategory_name);
                            ?>

                            <div class="col-md-12">
                                <div class="form-check artist-title1">
                                    <label class="form-check-label" for="inlineCheckbox1">Summary of Price Range
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                                @foreach ($subcategory_id as $key => $row)
                                <div class="m-1"><b>{{ $subcategory_name[$key] }}</b></div>
                                <div class="mt-2">
                                    <div class="table-responsive">
                                        <table
                                            class="table table-bordered table-striped table-hover table-box-shadow text-center">
                                            <tbody>
                                                <tr class="bg-dark-custom text-white">
                                                    <td>Formation on stage</td>
                                                    <td>Instrument Play</td>
                                                    <td>Artist Name</td>
                                                    <td>Price</td>
                                                    <td>Action</td>
                                                </tr>
                                                @foreach ($budgets as $data)
                                                @if ($data['subcategory_id'] == $row)
                                                <tr>
                                                    <td class="bg-dark-custom text-white">
                                                        {{ $data['venue_name'] }}
                                                    </td>
                                                    <td>{{ $data['intrument_name'] }}</td>
                                                    <td>{{ $data['name'] }}</td>
                                                    <td>Rs {{ $data['price'] }}/-</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            @if (check_verification($user->id, 'tbl_budget', 'price',
                                                            $data['id']) == 0)
                                                            Rejected
                                                            @elseif (check_verification($user->id, 'tbl_budget',
                                                            'price', $data['id']) == 1)
                                                            Accepted
                                                            @else
                                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                                data-table_name="tbl_budget" data-column_name="price"
                                                                data-row_id="{{ $data['id'] }}" data-status="1"
                                                                data-artist_id="{{ $user->id }}">
                                                                <i class="fa fa-check right-tick1"></i>
                                                            </button>
                                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                                data-table_name="tbl_budget" data-column_name="price"
                                                                data-row_id="{{ $data['id'] }}" data-status="0"
                                                                data-artist_id="{{ $user->id }}">
                                                                <i class="fas fa-window-close"></i>
                                                            </button>
                                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                                <i class="bx bx-edit-alt bxess_font"></i>
                                                            </button>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif

                            @if (!empty($address))
                            <div class="col-md-12">
                                <div class="form-check artist-title1">
                                    <label class="form-check-label" for="inlineCheckbox1">Address
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <div>Flat No.: {{ $address->flat_no }}</div>
                                        <div>
                                            @if (check_verification($user->id, 'tbl_address', 'flat_no', $address->id)
                                            == 0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_address', 'flat_no',
                                            $address->id) == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_address" data-column_name="flat_no"
                                                data-row_id="{{ $address->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_address" data-column_name="flat_no"
                                                data-row_id="{{ $address->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <div>Landmark: {{ $address->landmark }}</div>
                                        <div>
                                            @if (check_verification($user->id, 'tbl_address', 'landmark', $address->id)
                                            == 0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_address', 'landmark',
                                            $address->id) == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_address" data-column_name="landmark"
                                                data-row_id="{{ $address->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_address" data-column_name="landmark"
                                                data-row_id="{{ $address->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <div>State: {{ $address->state }}</div>
                                        <div>
                                            @if (check_verification($user->id, 'tbl_address', 'state', $address->id) ==
                                            0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_address', 'state', $address->id)
                                            == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_address" data-column_name="state"
                                                data-row_id="{{ $address->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_address" data-column_name="state"
                                                data-row_id="{{ $address->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mt-2">
                                        <div>Town/City: {{ $address->city }}</div>
                                        <div>
                                            @if (check_verification($user->id, 'tbl_address', 'city', $address->id) ==
                                            0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_address', 'city', $address->id)
                                            == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_address" data-column_name="city"
                                                data-row_id="{{ $address->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_address" data-column_name="city"
                                                data-row_id="{{ $address->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <div>Pincode: {{ $address->pincode }}</div>
                                        <div>
                                            @if (check_verification($user->id, 'tbl_address', 'pincode', $address->id)
                                            == 0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_address', 'pincode',
                                            $address->id) == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_address" data-column_name="pincode"
                                                data-row_id="{{ $address->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_address" data-column_name="pincode"
                                                data-row_id="{{ $address->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <div>Aadhar Number: {{ $address->aadhar_number }}</div>
                                        <div>
                                            @if (check_verification($user->id, 'tbl_address', 'aadhar_number',
                                            $address->id) == 0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_address', 'aadhar_number',
                                            $address->id) == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_address" data-column_name="aadhar_number"
                                                data-row_id="{{ $address->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_address" data-column_name="aadhar_number"
                                                data-row_id="{{ $address->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span class="mt-5">Aadhar Image:</span>
                                        <div class="image-wrapper2 img-container-1">
                                            <a href="{{ url('') }}/{{ $address->id_proof }}">
                                                <img src="{{ url('') }}/{{ $address->id_proof }}" alt="Aadhar Photo"
                                                    class="img-fluid imgfull" />
                                            </a>
                                        </div>
                                        <div class="mt-5">
                                            @if (check_verification($user->id, 'tbl_address', 'id_proof', $address->id)
                                            == 0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_address', 'id_proof',
                                            $address->id) == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_address" data-column_name="id_proof"
                                                data-row_id="{{ $address->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_address" data-column_name="id_proof"
                                                data-row_id="{{ $address->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if (!empty($CityPrice))
                            <div class="col-md-12">
                                <div class="form-check artist-title1 mt-3">
                                    <label class="form-check-label" for="inlineCheckbox1">Open To Travel For Shows
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>

                                <div class="mt-2">
                                    <div class="table-responsive">
                                        <table
                                            class="table table-bordered table-striped table-hover table-box-shadow text-center">
                                            <tbody>
                                                <tr class="bg-dark-custom text-white">
                                                    <td>City</td>
                                                    <td>Price</td>
                                                    <td>Action</td>
                                                </tr>
                                                @foreach ($CityPrice as $row)
                                                <tr>
                                                    <td>{{ $row['city_name'] }}</td>
                                                    <td>₹ {{ $row['price'] }}</td>
                                                    <td>
                                                        @if (check_verification($user->id, 'tbl_city_price', 'price',
                                                        $row['id']) == 0)
                                                        Rejected
                                                        @elseif (check_verification($user->id, 'tbl_city_price',
                                                        'price', $row['id']) == 1)
                                                        Accepted
                                                        @else
                                                        <button class="btn btn-info btn-sm mr-1 approve"
                                                            data-table_name="tbl_city_price" data-column_name="price"
                                                            data-row_id="{{ $row['id'] }}" data-status="1"
                                                            data-artist_id="{{ $user->id }}">
                                                            <i class="fa fa-check right-tick1"></i>
                                                        </button>
                                                        <button class="btn btn-info btn-sm mr-1 disapprove"
                                                            data-table_name="tbl_city_price" data-column_name="price"
                                                            data-row_id="{{ $row['id'] }}" data-status="0"
                                                            data-artist_id="{{ $user->id }}">
                                                            <i class="fas fa-window-close"></i>
                                                        </button>
                                                        <button class="btn btn-info btn-sm " data-toggle="modal"
                                                            data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                            <i class="bx bx-edit-alt bxess_font"></i>
                                                        </button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if (!empty($ManagerDetail))
                            <div class="col-md-12">
                                <div class="form-check artist-title1 mt-2">
                                    <label class="form-check-label" for="inlineCheckbox1">Managers Details
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="d-flex justify-content-between mt-2 mb-2">
                                    <div>
                                        <div>
                                            Party Witty Signature(Unique Name):
                                            <b
                                                class="unique-name ml-4">{{ !empty($ManagerDetail->signature) ? $ManagerDetail->signature : '' }}</b>
                                        </div>
                                    </div>
                                    <div>
                                        @if (check_verification($user->id, 'tbl_manager_detail', 'signature',
                                        $ManagerDetail->id) == 0)
                                        Rejected
                                        @elseif (check_verification($user->id, 'tbl_manager_detail', 'signature',
                                        $ManagerDetail->id) == 1)
                                        Accepted
                                        @else
                                        <button class="btn btn-info btn-sm mr-1 approve"
                                            data-table_name="tbl_manager_detail" data-column_name="signature"
                                            data-row_id="{{ $ManagerDetail->id }}" data-status="1"
                                            data-artist_id="{{ $user->id }}">
                                            <i class="fa fa-check right-tick1"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm mr-1 disapprove"
                                            data-table_name="tbl_manager_detail" data-column_name="signature"
                                            data-row_id="{{ $ManagerDetail->id }}" data-status="0"
                                            data-artist_id="{{ $user->id }}">
                                            <i class="fas fa-window-close"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm " data-toggle="modal"
                                            data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                            <i class="bx bx-edit-alt bxess_font"></i>
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if (!empty($ManagerDetail->name))
                            <div class="col-md-12 my-2">
                                <div class="row">
                                    <div class="col-md-12" id="myDiv">
                                        <div class="d-flex justify-content-between mt-2 mb-2">
                                            <div>
                                                <div class="manager">
                                                    <h6>Manager's Name</h6>
                                                    <h5>{{ $ManagerDetail->name }}</h5>
                                                </div>
                                            </div>
                                            <div>
                                                @if (check_verification($user->id, 'tbl_manager_detail', 'name',
                                                $ManagerDetail->id) == 0)
                                                Rejected
                                                @elseif (check_verification($user->id, 'tbl_manager_detail', 'name',
                                                $ManagerDetail->id) == 1)
                                                Accepted
                                                @else
                                                <button class="btn btn-info btn-sm mr-1 approve"
                                                    data-table_name="tbl_manager_detail" data-column_name="name"
                                                    data-row_id="{{ $ManagerDetail->id }}" data-status="1"
                                                    data-artist_id="{{ $user->id }}">
                                                    <i class="fa fa-check right-tick1"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm mr-1 disapprove"
                                                    data-table_name="tbl_manager_detail" data-column_name="name"
                                                    data-row_id="{{ $ManagerDetail->id }}" data-status="0"
                                                    data-artist_id="{{ $user->id }}">
                                                    <i class="fas fa-window-close"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm " data-toggle="modal"
                                                    data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                    <i class="bx bx-edit-alt bxess_font"></i>
                                                </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="myDiv">

                                        <div class="d-flex justify-content-between mt-2 mb-2">
                                            <div class="manager">
                                                <h6 style="text-decoration: underline">
                                                    Manager's Contact No.
                                                </h6>
                                                <h5>{{ $ManagerDetail->contact_no }}</h5>
                                            </div>
                                            <div>
                                                @if (check_verification($user->id, 'tbl_manager_detail', 'contact_no',
                                                $ManagerDetail->id) == 0)
                                                Rejected
                                                @elseif (check_verification($user->id, 'tbl_manager_detail',
                                                'contact_no', $ManagerDetail->id) == 1)
                                                Accepted
                                                @else
                                                <button class="btn btn-info btn-sm mr-1 approve"
                                                    data-table_name="tbl_manager_detail" data-column_name="contact_no"
                                                    data-row_id="{{ $ManagerDetail->id }}" data-status="1"
                                                    data-artist_id="{{ $user->id }}">
                                                    <i class="fa fa-check right-tick1"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm mr-1 disapprove"
                                                    data-table_name="tbl_manager_detail" data-column_name="contact_no"
                                                    data-row_id="{{ $ManagerDetail->id }}" data-status="0"
                                                    data-artist_id="{{ $user->id }}">
                                                    <i class="fas fa-window-close"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm " data-toggle="modal"
                                                    data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                    <i class="bx bx-edit-alt bxess_font"></i>
                                                </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endif

                            <div class="col-md-12">
                                <div class="form-check artist-title1 mt-2">
                                    <label class="form-check-label" for="inlineCheckbox1">Upload Photos with Celebs
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                                <div class="upload-pic">
                                    <p>Uploaded Photographs:</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row gallerys2">
                                    @foreach ($medias as $row)
                                    @if ($row->type == 4)
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="cr-pic img-container-1">
                                            <div>
                                                <a href="{{ url('') }}/{{ $row->file_path }}">
                                                    <img src="{{ url('') }}/{{ $row->file_path }}" alt=""
                                                        class="img-fluid imgfull" />
                                                </a>
                                            </div>
                                            <div class="overlay-1">
                                                <div class="overlay-content-2">
                                                    @if (check_verification($user->id, 'tbl_user_media', 'file_path',
                                                    $row->id) == 0)
                                                    Rejected
                                                    @elseif (check_verification($user->id, 'tbl_user_media',
                                                    'file_path', $row->id) == 1)
                                                    Accepted
                                                    @else
                                                    <button class="btn btn-info btn-sm mr-1 approve"
                                                        data-table_name="tbl_user_media" data-column_name="file_path"
                                                        data-row_id="{{ $row->id }}" data-status="1"
                                                        data-artist_id="{{ $user->id }}">
                                                        <i class="fa fa-check right-tick1"></i>
                                                    </button>
                                                    <button class="btn btn-info btn-sm mr-1 disapprove"
                                                        data-table_name="tbl_user_media" data-column_name="file_path"
                                                        data-row_id="{{ $row->id }}" data-status="0"
                                                        data-artist_id="{{ $user->id }}">
                                                        <i class="fas fa-window-close"></i>
                                                    </button>
                                                    <button class="btn btn-info btn-sm " data-toggle="modal"
                                                        data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                        <i class="bx bx-edit-alt bxess_font"></i>
                                                    </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-2">
                                            <a class="btn btn-primary btn-img" href="#">
                                                Show image
                                            </a>
                                        </div>
                                        <div class="text-left mt-1">
                                            <h6>{{ $row->caption }}</h6>
                                            <h6>{{ $row->with_photo }}</h6>
                                            <h6>{{ $row->location }}</h6>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-check artist-title1 mt-2">
                                    <label class="form-check-label" for="inlineCheckbox1">Upload Photos with Brands
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>

                                <div class="upload-pic">
                                    <p>Uploaded Photos:</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row gallerys3">
                                    @foreach ($medias as $row)
                                    @if ($row->type == 5)
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="cr-pic img-container-1">
                                            <div>
                                                <a href="{{ url('') }}/{{ $row->file_path }}">
                                                    <img src="{{ url('') }}/{{ $row->file_path }}" alt=""
                                                        class="img-fluid imgfull" />
                                                </a>
                                            </div>
                                            <div class="overlay-1">
                                                <div class="overlay-content-2">
                                                    @if (check_verification($user->id, 'tbl_user_media', 'file_path',
                                                    $row->id) == 0)
                                                    Rejected
                                                    @elseif (check_verification($user->id, 'tbl_user_media',
                                                    'file_path', $row->id) == 1)
                                                    Accepted
                                                    @else
                                                    <button class="btn btn-info btn-sm mr-1 approve"
                                                        data-table_name="tbl_user_media" data-column_name="file_path"
                                                        data-row_id="{{ $row->id }}" data-status="1"
                                                        data-artist_id="{{ $user->id }}">
                                                        <i class="fa fa-check right-tick1"></i>
                                                    </button>
                                                    <button class="btn btn-info btn-sm mr-1 disapprove"
                                                        data-table_name="tbl_user_media" data-column_name="file_path"
                                                        data-row_id="{{ $row->id }}" data-status="0"
                                                        data-artist_id="{{ $user->id }}">
                                                        <i class="fas fa-window-close"></i>
                                                    </button>
                                                    <button class="btn btn-info btn-sm " data-toggle="modal"
                                                        data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                        <i class="bx bx-edit-alt bxess_font"></i>
                                                    </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-2">
                                            <a class="btn btn-primary btn-img" href="#">
                                                Show image
                                            </a>
                                        </div>
                                        <div class="text-left mt-1">
                                            <h6>{{ $row->caption }}</h6>
                                            <h6>{{ $row->with_photo }}</h6>
                                            <h6>{{ $row->location }}</h6>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>

                            <!-- end popup -->
                            <div class="col-md-12 mt-2">
                                <div class="form-check artist-title1">
                                    <label class="form-check-label" for="inlineCheckbox1">Upload Videos with Brands
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                                <div class="upload-pic">
                                    <p>Uploaded Videos</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach ($medias as $row)
                                    @if ($row->type == 6)
                                    <div class="col-md-3">
                                        <div>
                                            <video width="525" height="240" controls>
                                                <source src="{{ url('') }}/{{ $row->file_path }}" type="video/mp4" />
                                            </video>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            @if (check_verification($user->id, 'tbl_user_media', 'file_path', $row->id)
                                            == 0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_user_media', 'file_path',
                                            $row->id) == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_user_media" data-column_name="file_path"
                                                data-row_id="{{ $row->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_user_media" data-column_name="file_path"
                                                data-row_id="{{ $row->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                        <div class="text-left mt-1">
                                            <h6>{{ $row->caption }}</h6>
                                            <h6>{{ $row->with_photo }}</h6>
                                            <h6>{{ $row->location }}</h6>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check artist-title1 mt-2">
                                    <label class="form-check-label" for="inlineCheckbox1">Upload Photos with Bands
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                                <div class="upload-pic">
                                    <p>Uploaded Photos:</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row gallerys4">
                                    @foreach ($medias as $row)
                                    @if ($row->type == 7)
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="cr-pic img-container-1">
                                            <div>
                                                <a href="{{ url('') }}/{{ $row->file_path }}">
                                                    <img src="{{ url('') }}/{{ $row->file_path }}" alt=""
                                                        class="img-fluid imgfull" />
                                                </a>
                                            </div>
                                            <div class="overlay-1">
                                                <div class="overlay-content-2">
                                                    @if (check_verification($user->id, 'tbl_user_media', 'file_path',
                                                    $row->id) == 0)
                                                    Rejected
                                                    @elseif (check_verification($user->id, 'tbl_user_media',
                                                    'file_path', $row->id) == 1)
                                                    Accepted
                                                    @else
                                                    <button class="btn btn-info btn-sm mr-1 approve"
                                                        data-table_name="tbl_user_media" data-column_name="file_path"
                                                        data-row_id="{{ $row->id }}" data-status="1"
                                                        data-artist_id="{{ $user->id }}">
                                                        <i class="fa fa-check right-tick1"></i>
                                                    </button>
                                                    <button class="btn btn-info btn-sm mr-1 disapprove"
                                                        data-table_name="tbl_user_media" data-column_name="file_path"
                                                        data-row_id="{{ $row->id }}" data-status="0"
                                                        data-artist_id="{{ $user->id }}">
                                                        <i class="fas fa-window-close"></i>
                                                    </button>
                                                    <button class="btn btn-info btn-sm " data-toggle="modal"
                                                        data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                        <i class="bx bx-edit-alt bxess_font"></i>
                                                    </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-2">
                                            <a class="btn btn-primary btn-img" href="#">
                                                Show image
                                            </a>
                                        </div>
                                        <div class="text-left mt-1">
                                            <h6>{{ $row->caption }}</h6>
                                            <h6>{{ $row->with_photo }}</h6>
                                            <h6>{{ $row->location }}</h6>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-check artist-title1 mt-2">
                                    <label class="form-check-label" for="inlineCheckbox1">Upload Videos with Bands
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                                <div class="upload-pic">
                                    <p>Uploaded Videos:</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach ($medias as $row)
                                    @if ($row->type == 8)
                                    <div class="col-md-3">
                                        <div>
                                            <video width="525" height="240" controls>
                                                <source src="{{ url('') }}/{{ $row->file_path }}" type="video/mp4" />
                                            </video>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            @if (check_verification($user->id, 'tbl_user_media', 'file_path', $row->id)
                                            == 0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_user_media', 'file_path',
                                            $row->id) == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_user_media" data-column_name="file_path"
                                                data-row_id="{{ $row->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_user_media" data-column_name="file_path"
                                                data-row_id="{{ $row->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                        <div class="text-left mt-1">
                                            <h6>{{ $row->caption }}</h6>
                                            <h6>{{ $row->with_photo }}</h6>
                                            <h6>{{ $row->location }}</h6>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <!-- //popup image -->
                            <div class="col-md-12">
                                <div class="form-check artist-title1 mt-2">
                                    <label class="form-check-label" for="inlineCheckbox1">Upload Photos with Club
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="upload-pic">
                                    <p>Uploaded Photos:</p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row gallerys5">
                                    @foreach ($medias as $row)
                                    @if ($row->type == 9)
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="cr-pic img-container-1">
                                            <div>
                                                <a href="{{ url('') }}/{{ $row->file_path }}">
                                                    <img src="{{ url('') }}/{{ $row->file_path }}" alt=""
                                                        class="img-fluid imgfull" />
                                                </a>
                                            </div>
                                            <div class="overlay-1">
                                                <div class="overlay-content-2">
                                                    @if (check_verification($user->id, 'tbl_user_media', 'file_path',
                                                    $row->id) == 0)
                                                    Rejected
                                                    @elseif (check_verification($user->id, 'tbl_user_media',
                                                    'file_path', $row->id) == 1)
                                                    Accepted
                                                    @else
                                                    <button class="btn btn-info btn-sm mr-1 approve"
                                                        data-table_name="tbl_user_media" data-column_name="file_path"
                                                        data-row_id="{{ $row->id }}" data-status="1"
                                                        data-artist_id="{{ $user->id }}">
                                                        <i class="fa fa-check right-tick1"></i>
                                                    </button>
                                                    <button class="btn btn-info btn-sm mr-1 disapprove"
                                                        data-table_name="tbl_user_media" data-column_name="file_path"
                                                        data-row_id="{{ $row->id }}" data-status="0"
                                                        data-artist_id="{{ $user->id }}">
                                                        <i class="fas fa-window-close"></i>
                                                    </button>
                                                    <button class="btn btn-info btn-sm " data-toggle="modal"
                                                        data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                        <i class="bx bx-edit-alt bxess_font"></i>
                                                    </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-2">
                                            <a class="btn btn-primary btn-img" href="#">
                                                Show image
                                            </a>
                                        </div>
                                        <div class="text-left mt-1">
                                            <h6>{{ $row->caption }}</h6>
                                            <h6>{{ $row->with_photo }}</h6>
                                            <h6>{{ $row->location }}</h6>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-check artist-title1 mt-2">
                                    <label class="form-check-label" for="inlineCheckbox1">Upload Videos with Clubs
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                                <div class="col-md-12">
                                    <div class="upload-pic">
                                        <p>Uploaded Videos:</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach ($medias as $row)
                                    @if ($row->type == 10)
                                    <div class="col-md-3">
                                        <div>
                                            <video width="525" height="240" controls>
                                                <source src="{{ url('') }}/{{ $row->file_path }}" type="video/mp4" />
                                            </video>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            @if (check_verification($user->id, 'tbl_user_media', 'file_path', $row->id)
                                            == 0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_user_media', 'file_path',
                                            $row->id) == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_user_media" data-column_name="file_path"
                                                data-row_id="{{ $row->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_user_media" data-column_name="file_path"
                                                data-row_id="{{ $row->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                        <div class="text-left mt-1">
                                            <h6>{{ $row->caption }}</h6>
                                            <h6>{{ $row->with_photo }}</h6>
                                            <h6>{{ $row->location }}</h6>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check artist-title1 mt-2">
                                    <label class="form-check-label" for="inlineCheckbox1">Upload Audio Cover Song
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                                {{-- <div class="my-2 category">
                                    <span>Selected Category:</span>
                                    <span class="romantic-song">Romantic Song</span>
                                </div> --}}
                                <div class="category">
                                    <p>Uploaded audio cover song:</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach ($medias as $row)
                                    @if ($row->type == 11)
                                    <div class="col-md-3">
                                        <div>
                                            <audio controls style="width: 260px">
                                                <source src="{{ url('') }}/{{ $row->file_path }}" type="audio/mpeg" />
                                            </audio>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            @if (check_verification($user->id, 'tbl_user_media', 'file_path', $row->id)
                                            == 0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_user_media', 'file_path',
                                            $row->id) == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_user_media" data-column_name="file_path"
                                                data-row_id="{{ $row->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_user_media" data-column_name="file_path"
                                                data-row_id="{{ $row->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                        <div class="text-left mt-1">
                                            <h6>{{ $row->with_photo }}</h6>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-check artist-title1 mt-2">
                                    <label class="form-check-label" for="inlineCheckbox1">Upload Video Cover Song
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                                {{-- <div class="my-2 category">
                                    <span>Selected Category:</span>
                                    <span class="sad-song">Sad Song</span>
                                </div> --}}
                                <div class="category">
                                    <p>Uploaded Video cover song:</p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    @foreach ($medias as $row)
                                    @if ($row->type == 12)
                                    <div class="col-md-3">
                                        <div>
                                            <video width="525" height="240" controls>
                                                <source src="{{ url('') }}/{{ $row->file_path }}" type="video/mp4" />
                                            </video>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            @if (check_verification($user->id, 'tbl_user_media', 'file_path', $row->id)
                                            == 0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_user_media', 'file_path',
                                            $row->id) == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_user_media" data-column_name="file_path"
                                                data-row_id="{{ $row->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_user_media" data-column_name="file_path"
                                                data-row_id="{{ $row->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                        <div class="text-left mt-1">
                                            <h6>{{ $row->with_photo }}</h6>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check artist-title1 mt-2">
                                    <label class="form-check-label" for="inlineCheckbox1">Upload original video
                                        songs
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                                {{-- <div class="my-2 category">
                                    <span>Selected Category:</span>
                                    <span class="sad-song">Sad Song</span>
                                </div> --}}
                                <div class="category">
                                    <p>Uploaded original video songs:</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach ($medias as $row)
                                    @if ($row->type == 13)
                                    <div class="col-md-3">
                                        <div>
                                            <video width="525" height="240" controls>
                                                <source src="{{ url('') }}/{{ $row->file_path }}" type="video/mp4" />
                                            </video>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            @if (check_verification($user->id, 'tbl_user_media', 'file_path', $row->id)
                                            == 0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_user_media', 'file_path',
                                            $row->id) == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_user_media" data-column_name="file_path"
                                                data-row_id="{{ $row->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_user_media" data-column_name="file_path"
                                                data-row_id="{{ $row->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                        <div class="text-left mt-1">
                                            <h6>{{ $row->with_photo }}</h6>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-check artist-title1 mt-2">
                                    <label class="form-check-label" for="inlineCheckbox1">Upload original audio
                                        Songs
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                                {{-- <div class="my-2 category">
                                    <span>Selected Category:</span>
                                    <span class="romantic-song">Romantic Song</span>
                                </div> --}}
                                <div class="category">
                                    <p>Uploaded original audio Songs:</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach ($medias as $row)
                                    @if ($row->type == 14)
                                    <div class="col-md-3">
                                        <div>
                                            <audio controls style="width: 260px">
                                                <source src="{{ url('') }}/{{ $row->file_path }}" type="audio/mpeg" />
                                            </audio>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            @if (check_verification($user->id, 'tbl_user_media', 'file_path', $row->id)
                                            == 0)
                                            Rejected
                                            @elseif (check_verification($user->id, 'tbl_user_media', 'file_path',
                                            $row->id) == 1)
                                            Accepted
                                            @else
                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                data-table_name="tbl_user_media" data-column_name="file_path"
                                                data-row_id="{{ $row->id }}" data-status="1"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fa fa-check right-tick1"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                data-table_name="tbl_user_media" data-column_name="file_path"
                                                data-row_id="{{ $row->id }}" data-status="0"
                                                data-artist_id="{{ $user->id }}">
                                                <i class="fas fa-window-close"></i>
                                            </button>
                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                <i class="bx bx-edit-alt bxess_font"></i>
                                            </button>
                                            @endif
                                        </div>
                                        <div class="text-left mt-1">
                                            <h6>{{ $row->with_photo }}</h6>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check artist-title1 mt-2">
                                    <label class="form-check-label" for="inlineCheckbox1">Original song streaming
                                        platforms
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mt-2">
                                    <div class="table-responsive">
                                        <table
                                            class="table table-bordered table-striped table-hover table-box-shadow text-center">
                                            <tbody>
                                                <tr class="bg-dark-custom text-white">
                                                    <td>Platform</td>
                                                    <td>Song Name</td>
                                                    <td>Action</td>
                                                </tr>
                                                @if (!empty($OrignalSong))
                                                <?php $array = ['spotify_url' => 'Spotify', 'amazon_prime' => 'Amazon Prime', 'jio_savan' => 'Jio Savan', 'apple_music' => 'Apple Music', 'tidel' => 'Tidel', 'deezer' => 'Deezer', 'pandoora' => 'Pandoora', 'qubon' => 'Qubon']; ?>
                                                @foreach ($OrignalSong as $key => $row)
                                                @foreach ($array as $k => $data)
                                                <tr>
                                                    <td class="bg-dark-custom text-white">
                                                        {{ $data }}
                                                    </td>
                                                    <td>{{ $row->$k }}</td>

                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            @if (check_verification($user->id, 'tbl_orignal_song', $k,
                                                            $row->id) == 0)
                                                            Rejected
                                                            @elseif (check_verification($user->id, 'tbl_orignal_song',
                                                            $k, $row->id) == 1)
                                                            Accepted
                                                            @else
                                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                                data-table_name="tbl_orignal_song"
                                                                data-column_name="{{ $k }}" data-row_id="{{ $row->id }}"
                                                                data-status="1" data-artist_id="{{ $user->id }}">
                                                                <i class="fa fa-check right-tick1"></i>
                                                            </button>
                                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                                data-table_name="tbl_orignal_song"
                                                                data-column_name="{{ $k }}" data-row_id="{{ $row->id }}"
                                                                data-status="0" data-artist_id="{{ $user->id }}">
                                                                <i class="fas fa-window-close"></i>
                                                            </button>
                                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                                <i class="bx bx-edit-alt bxess_font"></i>
                                                            </button>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check artist-title1 mt-2">
                                    <label class="form-check-label" for="inlineCheckbox1">Social Page
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mt-2">
                                    <div class="table-responsive">
                                        <table
                                            class="table table-bordered table-striped table-hover table-box-shadow text-center">
                                            <tbody>
                                                <tr class="bg-dark-custom text-white">
                                                    <td>Social Account</td>
                                                    <td>Link</td>
                                                    <td>Followers</td>
                                                    <td>Action</td>
                                                </tr>

                                                <tr>
                                                    <td>Facebook</td>
                                                    <td>
                                                        <div class="social-link">
                                                            <a href="{{ !empty($profiles->facebook_link) ? $profiles->facebook_link : '' }}"
                                                                target="_blank">
                                                                <i class="fab fa-facebook-square fa-2x"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td style="font-weight: 600">
                                                        {{ !empty($profiles->facebook_follower) ? $profiles->facebook_follower : '' }}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            @if (check_verification($user->id, 'tbl_user_profiles',
                                                            'facebook_link', $profiles->id) == 0)
                                                            Rejected
                                                            @elseif (check_verification($user->id, 'tbl_user_profiles',
                                                            'facebook_link', $profiles->id) == 1)
                                                            Accepted
                                                            @else
                                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                                data-table_name="tbl_user_profiles"
                                                                data-column_name="facebook_link"
                                                                data-row_id="{{ $profiles->id }}" data-status="1"
                                                                data-artist_id="{{ $user->id }}">
                                                                <i class="fa fa-check right-tick1"></i>
                                                            </button>
                                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                                data-table_name="tbl_user_profiles"
                                                                data-column_name="facebook_link"
                                                                data-row_id="{{ $profiles->id }}" data-status="0"
                                                                data-artist_id="{{ $user->id }}">
                                                                <i class="fas fa-window-close"></i>
                                                            </button>
                                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                                <i class="bx bx-edit-alt bxess_font"></i>
                                                            </button>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Instagram</td>
                                                    <td>
                                                        <div>
                                                            <a href="{{ !empty($profiles->intagram_link) ? $profiles->intagram_link : '' }}"
                                                                target="_blank">
                                                                <i class="fab fa-instagram fa-2x fa-insta-color"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td style="font-weight: 600">
                                                        {{ !empty($profiles->intagram_follower) ? $profiles->intagram_follower : '' }}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            @if (check_verification($user->id, 'tbl_user_profiles',
                                                            'intagram_link', $profiles->id) == 0)
                                                            Rejected
                                                            @elseif (check_verification($user->id, 'tbl_user_profiles',
                                                            'intagram_link', $profiles->id) == 1)
                                                            Accepted
                                                            @else
                                                            <button class="btn btn-info btn-sm mr-1 approve"
                                                                data-table_name="tbl_user_profiles"
                                                                data-column_name="intagram_link"
                                                                data-row_id="{{ $profiles->id }}" data-status="1"
                                                                data-artist_id="{{ $user->id }}">
                                                                <i class="fa fa-check right-tick1"></i>
                                                            </button>
                                                            <button class="btn btn-info btn-sm mr-1 disapprove"
                                                                data-table_name="tbl_user_profiles"
                                                                data-column_name="intagram_link"
                                                                data-row_id="{{ $profiles->id }}" data-status="0"
                                                                data-artist_id="{{ $user->id }}">
                                                                <i class="fas fa-window-close"></i>
                                                            </button>
                                                            <button class="btn btn-info btn-sm " data-toggle="modal"
                                                                data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                                                <i class="bx bx-edit-alt bxess_font"></i>
                                                            </button>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <div class="form-check artist-title1 mt-2">
                                    <label class="form-check-label" for="inlineCheckbox1">Bank Details
                                    </label>
                                    <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                        id="inlineCheckbox1" value="option1" />
                                </div>
                                @if (!empty($bank))
                                <div class="d-flex justify-content-between mt-2">
                                    <div>Bank Name: {{ $bank->bankname }}</div>
                                    <div>
                                        @if (check_verification($user->id, 'tbl_bank_detail', 'bankname', $bank->id) ==
                                        0)
                                        Rejected
                                        @elseif (check_verification($user->id, 'tbl_bank_detail', 'bankname', $bank->id)
                                        == 1)
                                        Accepted
                                        @else
                                        <button class="btn btn-info btn-sm mr-1 approve"
                                            data-table_name="tbl_bank_detail" data-column_name="bankname"
                                            data-row_id="{{ $bank->id }}" data-status="1"
                                            data-artist_id="{{ $user->id }}">
                                            <i class="fa fa-check right-tick1"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm mr-1 disapprove"
                                            data-table_name="tbl_bank_detail" data-column_name="bankname"
                                            data-row_id="{{ $bank->id }}" data-status="0"
                                            data-artist_id="{{ $user->id }}">
                                            <i class="fas fa-window-close"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm " data-toggle="modal"
                                            data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                            <i class="bx bx-edit-alt bxess_font"></i>
                                        </button>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <div>Branch Name: {{ $bank->branch }}</div>
                                    <div>
                                        @if (check_verification($user->id, 'tbl_bank_detail', 'branch', $bank->id) == 0)
                                        Rejected
                                        @elseif (check_verification($user->id, 'tbl_bank_detail', 'branch', $bank->id)
                                        == 1)
                                        Accepted
                                        @else
                                        <button class="btn btn-info btn-sm mr-1 approve"
                                            data-table_name="tbl_bank_detail" data-column_name="branch"
                                            data-row_id="{{ $bank->id }}" data-status="1"
                                            data-artist_id="{{ $user->id }}">
                                            <i class="fa fa-check right-tick1"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm mr-1 disapprove"
                                            data-table_name="tbl_bank_detail" data-column_name="branch"
                                            data-row_id="{{ $bank->id }}" data-status="0"
                                            data-artist_id="{{ $user->id }}">
                                            <i class="fas fa-window-close"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm " data-toggle="modal"
                                            data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                            <i class="bx bx-edit-alt bxess_font"></i>
                                        </button>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <div>Account No.: {{ $bank->acount_number }}</div>
                                    <div>
                                        @if (check_verification($user->id, 'tbl_bank_detail', 'acount_number',
                                        $bank->id) == 0)
                                        Rejected
                                        @elseif (check_verification($user->id, 'tbl_bank_detail', 'acount_number',
                                        $bank->id) == 1)
                                        Accepted
                                        @else
                                        <button class="btn btn-info btn-sm mr-1 approve"
                                            data-table_name="tbl_bank_detail" data-column_name="acount_number"
                                            data-row_id="{{ $bank->id }}" data-status="1"
                                            data-artist_id="{{ $user->id }}">
                                            <i class="fa fa-check right-tick1"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm mr-1 disapprove"
                                            data-table_name="tbl_bank_detail" data-column_name="acount_number"
                                            data-row_id="{{ $bank->id }}" data-status="0"
                                            data-artist_id="{{ $user->id }}">
                                            <i class="fas fa-window-close"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm " data-toggle="modal"
                                            data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                            <i class="bx bx-edit-alt bxess_font"></i>
                                        </button>
                                        @endif
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between mt-2">
                                    <div>IFSC Code: {{ $bank->ifsccode }}</div>
                                    <div>
                                        @if (check_verification($user->id, 'tbl_bank_detail', 'ifsccode', $bank->id) ==
                                        0)
                                        Rejected
                                        @elseif (check_verification($user->id, 'tbl_bank_detail', 'ifsccode', $bank->id)
                                        == 1)
                                        Accepted
                                        @else
                                        <button class="btn btn-info btn-sm mr-1 approve"
                                            data-table_name="tbl_bank_detail" data-column_name="ifsccode"
                                            data-row_id="{{ $bank->id }}" data-status="1"
                                            data-artist_id="{{ $user->id }}">
                                            <i class="fa fa-check right-tick1"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm mr-1 disapprove"
                                            data-table_name="tbl_bank_detail" data-column_name="ifsccode"
                                            data-row_id="{{ $bank->id }}" data-status="0"
                                            data-artist_id="{{ $user->id }}">
                                            <i class="fas fa-window-close"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm " data-toggle="modal"
                                            data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                            <i class="bx bx-edit-alt bxess_font"></i>
                                        </button>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <div>Name on PAN: {{ $bank->pan_name }}</div>
                                    <div>
                                        @if (check_verification($user->id, 'tbl_bank_detail', 'pan_name', $bank->id) ==
                                        0)
                                        Rejected
                                        @elseif (check_verification($user->id, 'tbl_bank_detail', 'pan_name', $bank->id)
                                        == 1)
                                        Accepted
                                        @else
                                        <button class="btn btn-info btn-sm mr-1 approve"
                                            data-table_name="tbl_bank_detail" data-column_name="pan_name"
                                            data-row_id="{{ $bank->id }}" data-status="1"
                                            data-artist_id="{{ $user->id }}">
                                            <i class="fa fa-check right-tick1"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm mr-1 disapprove"
                                            data-table_name="tbl_bank_detail" data-column_name="pan_name"
                                            data-row_id="{{ $bank->id }}" data-status="0"
                                            data-artist_id="{{ $user->id }}">
                                            <i class="fas fa-window-close"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm " data-toggle="modal"
                                            data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                            <i class="bx bx-edit-alt bxess_font"></i>
                                        </button>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <div>PAN No.: {{ $bank->pan_number }}</div>
                                    <div>
                                        @if (check_verification($user->id, 'tbl_bank_detail', 'pan_number', $bank->id)
                                        == 0)
                                        Rejected
                                        @elseif (check_verification($user->id, 'tbl_bank_detail', 'pan_number',
                                        $bank->id) == 1)
                                        Accepted
                                        @else
                                        <button class="btn btn-info btn-sm mr-1 approve"
                                            data-table_name="tbl_bank_detail" data-column_name="pan_number"
                                            data-row_id="{{ $bank->id }}" data-status="1"
                                            data-artist_id="{{ $user->id }}">
                                            <i class="fa fa-check right-tick1"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm mr-1 disapprove"
                                            data-table_name="tbl_bank_detail" data-column_name="pan_number"
                                            data-row_id="{{ $bank->id }}" data-status="0"
                                            data-artist_id="{{ $user->id }}">
                                            <i class="fas fa-window-close"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm " data-toggle="modal"
                                            data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                            <i class="bx bx-edit-alt bxess_font"></i>
                                        </button>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <span class="mt-5">Cancel Cheque Image:</span>
                                    <div class="image-wrapper2 img-container-1">
                                        <a href="{{ url('') }}/{{ $bank->cancel_chaque }}">
                                            <img src="{{ url('') }}/{{ $bank->cancel_chaque }}" alt=""
                                                class="img-fluid imgfull" />
                                        </a>
                                    </div>
                                    <div class="mt-5">
                                        @if (check_verification($user->id, 'tbl_bank_detail', 'cancel_chaque',
                                        $bank->id) == 0)
                                        Rejected
                                        @elseif (check_verification($user->id, 'tbl_bank_detail', 'cancel_chaque',
                                        $bank->id) == 1)
                                        Accepted
                                        @else
                                        <button class="btn btn-info btn-sm mr-1 approve"
                                            data-table_name="tbl_bank_detail" data-column_name="cancel_chaque"
                                            data-row_id="{{ $bank->id }}" data-status="1"
                                            data-artist_id="{{ $user->id }}">
                                            <i class="fa fa-check right-tick1"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm mr-1 disapprove"
                                            data-table_name="tbl_bank_detail" data-column_name="cancel_chaque"
                                            data-row_id="{{ $bank->id }}" data-status="0"
                                            data-artist_id="{{ $user->id }}">
                                            <i class="fas fa-window-close"></i>
                                        </button>
                                        <button class="btn btn-info btn-sm " data-toggle="modal"
                                            data-target="#Modal_two-artist" fdprocessedid="7vbo2">
                                            <i class="bx bx-edit-alt bxess_font"></i>
                                        </button>
                                        @endif
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12 mt-3 text-right">
                                <button class="btn btn-primary">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('ArtistProfileApprove') }}" method="post" id="disapprove">
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="table_name" id="table_name">
                                        <input type="hidden" name="column_name" id="column_name">
                                        <input type="hidden" name="row_id" id="row_id">
                                        <input type="hidden" name="status" id="status">
                                        <input type="hidden" name="artist_id" id="artist_id">
                                        <label for="exampleFormControlTextarea1">Write message here</label>
                                        <textarea class="form-control" id="reson" name="reson" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-img">
                            submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal2 -->
    <div class="modal fade" id="Modal_two-artist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">What type of artist</label>
                                    <input type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-img">Submit</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

<script src="{{ url('public/raman//js/custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"
    integrity="sha512-C1zvdb9R55RAkl6xCLTPt+Wmcz6s+ccOvcr6G57lbm8M2fbgn2SUjUJbQ13fEyjuLViwe97uJvwa1EUf4F1Akw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@include('admin.include.footer')
@include('admin.include.foot')
<script>
$(document).on('click', '.approve', function() {
    var table_name = $(this).data('table_name');
    var column_name = $(this).data('column_name');
    var row_id = $(this).data('row_id');
    var status = $(this).data('status');
    var artist_id = $(this).data('artist_id');
    $.ajax({
        url: "{{ url('ArtistProfileApprove') }}",
        type: 'post',
        data: {
            "_token": "{{ csrf_token() }}",
            table_name: table_name,
            column_name: column_name,
            row_id: row_id,
            status: status,
            artist_id: artist_id,
        },
        success: function(data, status) {
            location.reload();
        },
        error: function(xhr, desc, err) {

        }
    });
});

$(document).on('click', '.disapprove', function() {
    var table_name = $(this).data('table_name');
    var column_name = $(this).data('column_name');
    var row_id = $(this).data('row_id');
    var status = $(this).data('status');
    var artist_id = $(this).data('artist_id');
    $('#table_name').val(table_name);
    $('#column_name').val(column_name);
    $('#row_id').val(row_id);
    $('#status').val(status);
    $('#artist_id').val(artist_id);
    $('#exampleModal').modal('show');
});

$(document).on('submit', '#disapprove', function(e) {
    e.preventDefault();
    $.ajax({
        url: $(this).attr("action"),
        type: $(this).attr("method"),
        // dataType: "JSON",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function(data, status) {
            $('#exampleModal').modal('hide');
            location.reload();
        },
        error: function(xhr, desc, err) {

        }
    });
});
</script>