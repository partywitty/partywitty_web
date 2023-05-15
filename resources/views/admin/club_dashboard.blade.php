@include('admin.include.head')
@include('admin.include.navbar')
@include('admin.include.sidebar')
<?php $menus = ['jump_start' => 'Jump Start Menu', 'food' => 'Food Menu', 'bevarage' => 'Bevarage Menu']; ?>
<link rel="stylesheet" href="{{ url('public/raman/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ url('public/raman/css/style.css') }}" />
<link rel="stylesheet" href="{{ url('public/raman/css/nav_tab.css') }}" />
<div class="page-content">
    <div class="container-fluid">
        @include('admin.include.breadcrumb')
        <div class="p-3 card card" style="border:none">
            <div class="w-100">
                <div class="scroller scroller-left float-left mt-2">
                    <i class="fa fa-chevron-left"></i>
                </div>
                <div class="scroller scroller-right float-right mt-2">
                    <i class="fa fa-chevron-right"></i>
                </div>
                <div class="wrapper-box">
                    <nav class="nav nav-tabs list mt-2" id="myTab" role="tablist">
                        <a class="nav-item nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="true">
                            Profile
                        </a>
                        <a class="nav-item nav-link active" id="deal-tab" data-toggle="tab" href="#deal"
                            role="tab" aria-controls="deal" aria-selected="false">
                            Combo Deal
                        </a>
                        <a class="nav-item nav-link" id="package-tab" data-toggle="tab" href="#package" role="tab"
                            aria-controls="package" aria-selected="false">
                            Package
                        </a>
                        <a class="nav-item nav-link" id="menu-tab" data-toggle="tab" href="#menu" role="tab"
                            aria-controls="menu" aria-selected="false">
                            Menu
                        </a>
                        <a class="nav-item nav-link" id="documents-tab" data-toggle="tab" href="#documents"
                            role="tab" aria-controls="documents" aria-selected="false">
                            Documents
                        </a>
                        <a class="nav-item nav-link" id="qrcode-tab" data-toggle="tab" href="#qrcode" role="tab"
                            aria-controls="qrcode" aria-selected="false">
                            QR Code
                        </a>
                    </nav>
                </div>
            </div>
            <!-- Tab panes -->
            <div class="tab-content tab-content-scroll" id="myTabContent">
                <div class="container tab-pane fade mar-menutop" id="profile" role="tabpanel"
                    aria-labelledby="profile-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-md-12 text-right my-2">
                                    <div class="form-check">
                                        <label class="form-check-label mr required-after" for="check1">Check
                                            All</label>
                                        <input type="checkbox" class="form-check-input mt-2 customcheckbx"
                                            name="option1" value="something" id="select-all-checkbox">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check artist-title1">
                                        <label class="form-check-label" for="inlineCheckbox1">Club
                                            Details
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="" value="option1">
                                    </div>
                                    <div class="mt-2">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-bordered table-striped table-hover table-box-shadow text-center">
                                                <tbody>
                                                    <tr>
                                                        <td class="bg-dark-custom text-white">
                                                            Name of the club
                                                        </td>
                                                        <td>Mariona</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-info btn-sm mr-1 ">
                                                                    <i class="fa fa-check right-tick1"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm mr-1"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <i class="fas fa-window-close"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm " data-toggle="modal"
                                                                    data-target="#Modal_two">
                                                                    <i class="bx bx-edit-alt bxes"></i></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-dark-custom text-white">
                                                            Address
                                                        </td>
                                                        <td>CT Mall R-12, 2nd floor,
                                                            Indore, M.P</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-info btn-sm mr-1 ">
                                                                    <i class="fa fa-check right-tick1"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm mr-1"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <i class="fas fa-window-close"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm "
                                                                    data-toggle="modal" data-target="#Modal_two">
                                                                    <i class="bx bx-edit-alt bxes"></i></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-dark-custom text-white">
                                                            Landmark
                                                        </td>
                                                        <td>Old GPO</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-info btn-sm mr-1 ">
                                                                    <i class="fa fa-check right-tick1"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm mr-1"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <i class="fas fa-window-close"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm "
                                                                    data-toggle="modal" data-target="#Modal_two">
                                                                    <i class="bx bx-edit-alt bxes"></i></i>
                                                                </button>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-dark-custom text-white">
                                                            State
                                                        </td>
                                                        <td>Madhya Pradesh</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-info btn-sm mr-1 ">
                                                                    <i class="fa fa-check right-tick1"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm mr-1"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <i class="fas fa-window-close"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm "
                                                                    data-toggle="modal" data-target="#Modal_two">
                                                                    <i class="bx bx-edit-alt bxes"></i></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-dark-custom text-white">
                                                            Town/City
                                                        </td>
                                                        <td>Indore</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-info btn-sm mr-1 ">
                                                                    <i class="fa fa-check right-tick1"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm mr-1"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <i class="fas fa-window-close"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm "
                                                                    data-toggle="modal" data-target="#Modal_two">
                                                                    <i class="bx bx-edit-alt bxes"></i></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-dark-custom text-white">
                                                            Pin Code
                                                        </td>
                                                        <td>45200XX</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-info btn-sm mr-1 ">
                                                                    <i class="fa fa-check right-tick1"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm mr-1"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <i class="fas fa-window-close"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm "
                                                                    data-toggle="modal" data-target="#Modal_two">
                                                                    <i class="bx bx-edit-alt bxes"></i></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-check artist-title1">
                                        <label class="form-check-label" for="inlineCheckbox1">I am
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="yes-pdg">Owner/Manager</div>
                                            <div>
                                                <button class="btn btn-info btn-sm mr-1">
                                                    <i class="fa fa-check right-tick1"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm mr-1" type="button"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-window-close"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm " data-toggle="modal"
                                                    data-target="#Modal_two">
                                                    <i class="bx bx-edit-alt bxess_font"></i></i>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check artist-title1 mt-2">
                                        <label class="form-check-label" for="inlineCheckbox1">POC-Owner/Manager
                                            Detail
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div class="mt-2">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-bordered table-striped table-hover table-box-shadow text-center">
                                                <tbody>
                                                    <tr class="bg-dark-custom text-white">
                                                        <td>Name</td>
                                                        <td>Number</td>
                                                        <td>Action</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Rajkumar</td>
                                                        <td>
                                                            +91-98252266XX
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-info btn-sm mr-1 ">
                                                                    <i class="fa fa-check right-tick1"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm mr-1"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <i class="fas fa-window-close"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm "
                                                                    data-toggle="modal" data-target="#Modal_two">
                                                                    <i class="bx bx-edit-alt bxes"></i></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-check artist-title1">
                                        <label class="form-check-label" for="inlineCheckbox1">Do u
                                            wish
                                            to get guest from
                                            the application ?
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="yes-pdg">Yes</div>
                                            <div>
                                                <button class="btn btn-info btn-sm mr-1">
                                                    <i class="fa fa-check right-tick1"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm mr-1" type="button"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-window-close"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm " data-toggle="modal"
                                                    data-target="#Modal_two">
                                                    <i class="bx bx-edit-alt bxess_font"></i></i>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check artist-title1">
                                        <label class="form-check-label" for="inlineCheckbox1">Projector
                                            screen
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="yes-pdg">Yes</div>
                                            <div>
                                                <button class="btn btn-info btn-sm mr-1">
                                                    <i class="fa fa-check right-tick1"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm mr-1" type="button"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-window-close"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm " data-toggle="modal"
                                                    data-target="#Modal_two">
                                                    <i class="bx bx-edit-alt bxess_font"></i></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check artist-title1">
                                        <label class="form-check-label" for="inlineCheckbox1">Do u
                                            show
                                            live matches
                                            during the season ?
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="yes-pdg">Yes</div>
                                            <div>
                                                <button class="btn btn-info btn-sm mr-1">
                                                    <i class="fa fa-check right-tick1"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm mr-1" type="button"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-window-close"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm " data-toggle="modal"
                                                    data-target="#Modal_two">
                                                    <i class="bx bx-edit-alt bxess_font"></i></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check artist-title1">
                                        <label class="form-check-label" for="inlineCheckbox1">Dj
                                            availability ?
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="yes-pdg">Yes</div>
                                            <div>
                                                <button class="btn btn-info btn-sm mr-1">
                                                    <i class="fa fa-check right-tick1"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm mr-1" type="button"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-window-close"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm " data-toggle="modal"
                                                    data-target="#Modal_two">
                                                    <i class="bx bx-edit-alt bxess_font"></i></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check artist-title1">
                                        <label class="form-check-label" for="inlineCheckbox1">Dance
                                            floor ?
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="yes-pdg">Yes</div>
                                            <div>
                                                <button class="btn btn-info btn-sm mr-1">
                                                    <i class="fa fa-check right-tick1"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm mr-1" type="button"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-window-close"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm " data-toggle="modal"
                                                    data-target="#Modal_two">
                                                    <i class="bx bx-edit-alt bxess_font"></i></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check artist-title1">
                                        <label class="form-check-label" for="inlineCheckbox1">How
                                            many
                                            floor you have?
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="yes-pdg">4</div>
                                            <div>
                                                <button class="btn btn-info btn-sm mr-1">
                                                    <i class="fa fa-check right-tick1"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm mr-1" type="button"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-window-close"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm " data-toggle="modal"
                                                    data-target="#Modal_two">
                                                    <i class="bx bx-edit-alt bxess_font"></i></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check artist-title1 mt-2">
                                        <label class="form-check-label" for="inlineCheckbox1">Floor
                                            wise
                                            seat availability
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div class="mt-2">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-bordered table-striped table-hover table-box-shadow text-center  ">

                                                <tbody>
                                                    <tr class="bg-dark-custom text-white">
                                                        <td></td>
                                                        <td>Seating Capacity</td>
                                                        <td>Floor Type</td>
                                                        <td>Music Type</td>
                                                        <td>Action</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="bg-dark-custom text-white">
                                                            Floor-1
                                                        </td>
                                                        <td>120</td>
                                                        <td>
                                                            Rooftop
                                                        </td>
                                                        <td>Live Music</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-info btn-sm mr-1 ">
                                                                    <i class="fa fa-check right-tick1"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm mr-1"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <i class="fas fa-window-close"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm "
                                                                    data-toggle="modal" data-target="#Modal_two">
                                                                    <i class="bx bx-edit-alt bxes"></i></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-dark-custom text-white">
                                                            Floor-2
                                                        </td>
                                                        <td>120</td>
                                                        <td>
                                                            Indoor
                                                        </td>
                                                        <td>Dj</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-info btn-sm mr-1 ">
                                                                    <i class="fa fa-check right-tick1"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm mr-1"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <i class="fas fa-window-close"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm "
                                                                    data-toggle="modal" data-target="#Modal_two">
                                                                    <i class="bx bx-edit-alt bxes"></i></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-dark-custom text-white">
                                                            Floor-3
                                                        </td>
                                                        <td>120</td>
                                                        <td>
                                                            Open
                                                        </td>
                                                        <td>Instrument</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-info btn-sm mr-1 ">
                                                                    <i class="fa fa-check right-tick1"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm mr-1"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <i class="fas fa-window-close"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm "
                                                                    data-toggle="modal" data-target="#Modal_two">
                                                                    <i class="bx bx-edit-alt bxes"></i></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check artist-title1">
                                        <label class="form-check-label" for="inlineCheckbox1">Happening
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="yes-pdg">Demo</div>
                                            <div>
                                                <button class="btn btn-info btn-sm mr-1">
                                                    <i class="fa fa-check right-tick1"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm mr-1" type="button"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-window-close"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm " data-toggle="modal"
                                                    data-target="#Modal_two">
                                                    <i class="bx bx-edit-alt bxess_font"></i></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check artist-title1">
                                        <label class="form-check-label" for="inlineCheckbox1">
                                            How many parts you divided?
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="yes-pdg">2/4/6/8/10</div>
                                            <div>
                                                <button class="btn btn-info btn-sm mr-1">
                                                    <i class="fa fa-check right-tick1"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm mr-1" type="button"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-window-close"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm " data-toggle="modal"
                                                    data-target="#Modal_two">
                                                    <i class="bx bx-edit-alt bxess_font"></i></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check artist-title1 mt-2">
                                        <label class="form-check-label" for="inlineCheckbox1">Photographer
                                            availability ?
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div class="mt-2">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-bordered table-striped table-hover table-box-shadow text-center">
                                                <tbody>
                                                    <tr class="bg-dark-custom text-white">
                                                        <td>Status</td>
                                                        <td>Available on</td>
                                                        <td>Action</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Yes</td>
                                                        <td>
                                                            <span> Monday</span>
                                                            <span class="px-1"> Wednesday</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-info btn-sm mr-1 ">
                                                                    <i class="fa fa-check right-tick1"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm mr-1"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <i class="fas fa-window-close"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm "
                                                                    data-toggle="modal" data-target="#Modal_two">
                                                                    <i class="bx bx-edit-alt bxes"></i></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check artist-title1 mt-2">
                                        <label class="form-check-label" for="inlineCheckbox1">Do u
                                            have
                                            any sponsors for the live music ? ?
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div class="mt-2">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-bordered table-striped table-hover table-box-shadow text-center">
                                                <tbody>
                                                    <tr class="bg-dark-custom text-white">
                                                        <td>Status</td>
                                                        <td>Sponsors Name</td>
                                                        <td>Action</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Yes</td>
                                                        <td>
                                                            <span class="px-1"> Demo</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-info btn-sm mr-1 ">
                                                                    <i class="fa fa-check right-tick1"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm mr-1"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <i class="fas fa-window-close"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm "
                                                                    data-toggle="modal" data-target="#Modal_two">
                                                                    <i class="bx bx-edit-alt bxes"></i></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>











                                <div class="col-md-12">
                                    <div class="form-check artist-title1">
                                        <label class="form-check-label" for="inlineCheckbox1">Sound
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="" value="option1">
                                    </div>
                                    <div class="mt-2">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-bordered table-striped table-hover table-box-shadow text-center">
                                                <tbody>
                                                    <tr>
                                                        <td class="bg-dark-custom text-white">
                                                            Sound Availability in House
                                                        </td>
                                                        <td>Yes</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-info btn-sm mr-1 ">
                                                                    <i class="fa fa-check right-tick1"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm mr-1"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <i class="fas fa-window-close"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm "
                                                                    data-toggle="modal" data-target="#Modal_two">
                                                                    <i class="bx bx-edit-alt bxes"></i></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bg-dark-custom text-white">
                                                            Sound Engineer in House
                                                        </td>
                                                        <td>Yes</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-info btn-sm mr-1 ">
                                                                    <i class="fa fa-check right-tick1"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm mr-1"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <i class="fas fa-window-close"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm "
                                                                    data-toggle="modal" data-target="#Modal_two">
                                                                    <i class="bx bx-edit-alt bxes"></i></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check artist-title1 mt-2">
                                        <label class="form-check-label" for="inlineCheckbox1">Music
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div class="mt-2">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-bordered table-striped table-hover table-box-shadow text-center">
                                                <tbody>
                                                    <tr class="bg-dark-custom text-white">
                                                        <td>Day</td>
                                                        <td>Music Type</td>
                                                        <td>Action</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Wednesday</td>
                                                        <td>
                                                            Bollywood/Sufi/Western
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-info btn-sm mr-1 ">
                                                                    <i class="fa fa-check right-tick1"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm mr-1"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <i class="fas fa-window-close"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm "
                                                                    data-toggle="modal" data-target="#Modal_two">
                                                                    <i class="bx bx-edit-alt bxes"></i></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-bordered table-striped table-hover table-box-shadow text-center">
                                                <tbody>
                                                    <tr class="bg-dark-custom text-white">
                                                        <td>Day</td>
                                                        <td>Formation</td>
                                                        <td>Music Type</td>
                                                        <td>Action</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Sunday</td>
                                                        <td>Solo/Duo/Trio</td>
                                                        <td>
                                                            Bollywood/Sufi/Western
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <button class="btn btn-info btn-sm mr-1 ">
                                                                    <i class="fa fa-check right-tick1"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm mr-1"
                                                                    data-toggle="modal" data-target="#exampleModal">
                                                                    <i class="fas fa-window-close"></i>
                                                                </button>
                                                                <button class="btn btn-info btn-sm "
                                                                    data-toggle="modal" data-target="#Modal_two">
                                                                    <i class="bx bx-edit-alt bxes"></i></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-check artist-title1">
                                        <label class="form-check-label" for="inlineCheckbox1">Seating
                                            capacity
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="yes-pdg">120</div>
                                            <div>
                                                <button class="btn btn-info btn-sm mr-1">
                                                    <i class="fa fa-check right-tick1"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm mr-1" type="button"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-window-close"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm " data-toggle="modal"
                                                    data-target="#Modal_two">
                                                    <i class="bx bx-edit-alt bxess_font"></i></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-check artist-title1">
                                        <label class="form-check-label" for="inlineCheckbox1">Space
                                            available ?
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="yes-pdg">Yes</div>
                                            <div>
                                                <button class="btn btn-info btn-sm mr-1">
                                                    <i class="fa fa-check right-tick1"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm mr-1" type="button"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-window-close"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm " data-toggle="modal"
                                                    data-target="#Modal_two">
                                                    <i class="bx bx-edit-alt bxess_font"></i></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-check artist-title1">
                                        <label class="form-check-label" for="inlineCheckbox1">How
                                            Many
                                            Days in a Week
                                            Do We Have Live Music ?
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="date-sp">
                                                <div class="yes-pdg">Monday</div>
                                                <div class="yes-pdg">Wednesday</div>
                                                <div class="yes-pdg">Friday</div>
                                            </div>
                                            <div>
                                                <button class="btn btn-info btn-sm mr-1">
                                                    <i class="fa fa-check right-tick1"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm mr-1" type="button"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-window-close"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm " data-toggle="modal"
                                                    data-target="#Modal_two">
                                                    <i class="bx bx-edit-alt bxess_font"></i></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check artist-title1">
                                        <label class="form-check-label" for="inlineCheckbox1">Would
                                            u be
                                            interested in
                                            sponsorship from various
                                            brands ?
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="yes-pdg">No</div>
                                            <div>
                                                <button class="btn btn-info btn-sm mr-1">
                                                    <i class="fa fa-check right-tick1"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm mr-1" type="button"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-window-close"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm " data-toggle="modal"
                                                    data-target="#Modal_two">
                                                    <i class="bx bx-edit-alt bxess_font"></i></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check artist-title1">
                                        <label class="form-check-label" for="inlineCheckbox1">F&B
                                            For
                                            The Artist ?
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="yes-pdg">Yes</div>
                                            <div>
                                                <button class="btn btn-info btn-sm mr-1">
                                                    <i class="fa fa-check right-tick1"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm mr-1" type="button"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-window-close"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm " data-toggle="modal"
                                                    data-target="#Modal_two">
                                                    <i class="bx bx-edit-alt bxess_font"></i></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check artist-title1">
                                        <label class="form-check-label" for="inlineCheckbox1">On
                                            Going
                                            Offers For The
                                            Guest ?
                                        </label>
                                        <input class="form-check-input formcustm1 checkbox" type="checkbox"
                                            id="inlineCheckbox1" value="option1">
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="yes-pdg">Yes</div>
                                            <div>
                                                <button class="btn btn-info btn-sm mr-1">
                                                    <i class="fa fa-check right-tick1"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm mr-1" type="button"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-window-close"></i>
                                                </button>
                                                <button class="btn btn-info btn-sm " data-toggle="modal"
                                                    data-target="#Modal_two">
                                                    <i class="bx bx-edit-alt bxess_font"></i></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-5 text-right">
                                    <button class="btn btn-primary">Confirm</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="container tab-pane fade show active" id="deal" role="tabpanel"
                    aria-labelledby="deal-tab">
                    <button id="AddComboDeal" class="btn btn-info mt-5">Add Combo Deal</button>

                    <div class="table-responsive mt-5">
                        <table id="ComboDeal" class="table table-bordered table-striped  text-center">
                            <thead>
                                <tr class="bg-dark-custom text-white">
                                    <td>S.No</td>
                                    <td>Deal Name</td>
                                    <td>Deal Category</td>
                                    <td>Lowest Price</td>
                                    <td>Highest Price</td>
                                    <td>Artist Price</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container tab-pane fade mar-menutop" id="package" role="tabpanel"
                    aria-labelledby="package-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Name of the package</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Category of the
                                            Package</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option value="">Platinum</option>
                                            <option value="">Gold</option>
                                            <option value="">Silver</option>
                                            <option value="">Bronze</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Minimum no. of pax</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Package Menu</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Limit</label>
                                                    <input type="text" class="form-control"
                                                        >
                                                </div>
                                            </div> -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Picture</label>
                                        <input type="file" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="my-3">
                                        <mark>
                                            Food inclusion :-
                                        </mark>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Item choose</label>
                                        <select class="form-control js-example-basic-multiple" name="states[]"
                                            multiple="multiple">
                                            <option value="AL">choose any
                                                2</option>
                                            <option value="WY">choose any
                                                3</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Starter in Veg </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Item choose</label>
                                        <select class="form-control js-example-basic-multiple" name="states[]"
                                            multiple="multiple">
                                            <option value="AL">choose any
                                                2</option>
                                            <option value="WY">choose any
                                                3</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Starter in Non-Veg</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Item choose</label>
                                        <select class="form-control js-example-basic-multiple" name="states[]"
                                            multiple="multiple">
                                            <option value="AL">choose any
                                                1</option>
                                            <option value="WY">choose any
                                                2</option>
                                            <option value="AL">choose any
                                                3</option>
                                            <option value="WY">choose any
                                                4</option>
                                            <option value="WY">choose any
                                                5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Fish</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Item choose</label>
                                        <select class="form-control js-example-basic-multiple" name="states[]"
                                            multiple="multiple">
                                            <option value="AL">choose any
                                                2</option>
                                            <option value="WY">choose any
                                                3</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Maincourse in Veg </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Item choose</label>
                                        <select class="form-control js-example-basic-multiple" name="states[]"
                                            multiple="multiple">
                                            <option value="AL">choose any
                                                2</option>
                                            <option value="WY">choose any
                                                3</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Maincourse in Non-Veg </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Item choose</label>
                                        <select class="form-control js-example-basic-multiple" name="states[]"
                                            multiple="multiple">
                                            <option value="WY">choose any
                                                2</option>
                                            <option value="AL">choose any
                                                3</option>
                                            <option value="WY">
                                                Not Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Sides</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Item choose</label>
                                        <select class="form-control js-example-basic-multiple" name="states[]"
                                            multiple="multiple">
                                            <option value="AL">choose any
                                                1</option>
                                            <option value="WY">choose any
                                                2</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Desserts</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Start Date</label>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">End Date</label>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>

                                <!-- <div class="col-md-12">
                                                <div class="form-group mt-3">
                                                    <label for="exampleFormControlSelect1">How many parts you divided
                                                        ?</label>
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option value="">2</option>
                                                        <option value="">4</option>
                                                        <option value="">6</option>
                                                        <option value="">8</option>
                                                        <option value="">10</option>
                                                    </select>
                                                </div>
                                            </div> -->
                                <div class="col-md-12">
                                    <div class="my-3">
                                        <mark>
                                            Price Management :-
                                        </mark>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Maximum Price</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6
                                        ">
                                    <div class="form-group">
                                        <label for="">Minimum Price</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Pictures</label>
                                        <input type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Details</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Terms & conditions</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="my-3">
                                <mark>
                                    Timing :-
                                </mark>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-md-12">
                                    <div class="mon-pad">
                                        <input class="form-check-input" type="checkbox" id="select-all">
                                        <label for="start-time">Select all days</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mon-pad">
                                        <input class="form-check-input checkbox" type="checkbox" id="">
                                        <h5 class="text-info ">Monday</h5>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="start-time">Start time:</label>
                                    <input type="time" id="start-time" name="start-time" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="end-time">End time:</label>
                                    <input type="time" id="end-time" name="end-time" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Price per person</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="form-row mb-2">
                                <div class="col-md-3">
                                    <div class="mon-pad">
                                        <input class="form-check-input checkbox" type="checkbox" id="">
                                        <h5 class="text-info checkbox">Tuesday</h5>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="start-time">Start time:</label>
                                    <input type="time" id="start-time" name="start-time" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="end-time">End time:</label>
                                    <input type="time" id="end-time" name="end-time" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Price per person</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-md-3">
                                    <div class="mon-pad">
                                        <input class="form-check-input checkbox" type="checkbox" id="">
                                        <h5 class="text-info">Wednesday</h5>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="start-time">Start time:</label>
                                    <input type="time" id="start-time" name="start-time" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="end-time">End time:</label>
                                    <input type="time" id="end-time" name="end-time" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Price per person</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-md-3">
                                    <div class="mon-pad">
                                        <input class="form-check-input checkbox" type="checkbox" id="">
                                        <h5 class="text-info">Thursday</h5>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="start-time">Start time:</label>
                                    <input type="time" id="start-time" name="start-time" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="end-time">End time:</label>
                                    <input type="time" id="end-time" name="end-time" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Price per person</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-md-3">
                                    <div class="mon-pad">
                                        <input class="form-check-input checkbox" type="checkbox" id="">
                                        <h5 class="text-info">Friday</h5>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <label for="start-time">Start time:</label>
                                    <input type="time" id="start-time" name="start-time" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="end-time">End time:</label>
                                    <input type="time" id="end-time" name="end-time" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Price per person</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-md-3">
                                    <div class="mon-pad">
                                        <input class="form-check-input checkbox" type="checkbox" id="">
                                        <h5 class="text-info">Saturday</h5>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="start-time">Start time:</label>
                                    <input type="time" id="start-time" name="start-time"
                                        class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="end-time">End time:</label>
                                    <input type="time" id="end-time" name="end-time" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Price per person</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-md-3">
                                    <div class="mon-pad">
                                        <input class="form-check-input checkbox" type="checkbox" id="">
                                        <h5 class="text-info">Sunday</h5>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="start-time">Start time:</label>
                                    <input type="time" id="start-time" name="start-time"
                                        class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="end-time">End time:</label>
                                    <input type="time" id="end-time" name="end-time" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Price per person</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-right">
                                        <button class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" container tab-pane fade mar-menutop" id="menu" role="tabpanel"
                    aria-labelledby="menu-tab">
                    {{-- <nav class="nav nav-tabs list" style="margin-top: 5rem" id="myTab" role="tablist">
                        @foreach ($menus as $key => $value)
                            <a class="nav-item nav-link " id="{{ $key }}-tab" data-toggle="tab"
                                href="#{{ $key }}" role="tab" aria-controls="{{ $key }}"
                                aria-selected="true">
                                {{ $key }}
                            </a>
                        @endforeach
                    </nav>
                    <div class="tab-content tab-content-scroll" id="myTabContent">
                        @foreach ($menus as $key => $value)
                            <div class="container tab-pane fade mar-menutop" id="{{ $key }}" role="tabpanel"
                                aria-labelledby="{{ $key }}-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{ $key }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> --}}
                    <div class="table-responsive mt-5">
                        <table id="menu_table" class="table table-bordered table-box-shadow ">
                            <tbody>
                                @foreach ($menus as $key => $value)
                                    <tr>
                                        <td>
                                            <b>{{ $value }}</b>
                                        </td>
                                        <td>
                                            <form action="{{ url($key . '_menu') }}" method="post"
                                                enctype="multipart/form-data" id="{{ $key }}_menu_upload">
                                                @csrf
                                                <input type="hidden" name="club_id" id="club_id"
                                                    value="{{ $club_id }}">
                                                <input type="file" name="{{ $key }}_menu"
                                                    id="{{ $key }}_menu">
                                                <input type="submit" value="Upload" class="btn btn-primary">
                                            </form>
                                        </td>
                                        <td>
                                            @if ($$key)
                                                <a href='{{ route($key . '_view') }}/{{ $club_id }}'
                                                    target="_blank" class="btn btn-info">view
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container tab-pane fade mar-menutop" id="documents" role="tabpanel"
                    aria-labelledby="documents-tab">
                    <div class="row">
                        <div class="col-md-12">
                            Documents-tab
                        </div>
                    </div>
                </div>
                <div class="container tab-pane fade mar-menutop" id="qrcode" role="tabpanel"
                    aria-labelledby="qrcode-tab">
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal1 -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
    integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        /******************** Select 2 dropdown search ******************/
        $('.js-example-basic-multiple').select2();
        $('.js-example-basic-single').select2();
        /******************** Select 2 dropdown search ******************/

    });
</script>
<script>
    const selectAllCheckbox = document.getElementById('select-all');
    const checkboxes = document.querySelectorAll('.checkbox');

    selectAllCheckbox.addEventListener('click', function() {
        for (let i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = this.checked;
        }
    });

    for (let i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener('click', function() {
            if (!this.checked) {
                selectAllCheckbox.checked = false;
            } else {
                const allChecked = document.querySelectorAll('.checkbox:checked');
                if (allChecked.length === checkboxes.length) {
                    selectAllCheckbox.checked = true;
                }
            }
        });
    }

    $('.checkbox[value="1"]').prop('checked', true);
    $('#select-all-checkbox').click(function() {
        $('.checkbox').prop('checked', $(this).prop('checked'));
    });
</script>
<script>
    $(document).ready(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /*************** Jump Start Menu Upload *************************/
        $('#jump_start_menu_upload').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            console.log(formData);
            $.ajax({
                type: 'POST',
                url: "{{ url('jump_start_menu') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.success) {
                        this.reset();
                        Swal.fire(
                            'Good job!',
                            'File has been uploaded successfully',
                            'success'
                        );
                        $('#menu_table').DataTable().ajax.reload();
                    } else {
                        Swal.fire(
                            'Oops...',
                            'Please Select File',
                            'error'
                        );
                    }
                },
                error: function(data) {
                    // console.log(data);
                }
            });
        });
        /*************** Jump Start Menu Upload *************************/

        /******************** Food Menu Upload *************************/
        $('#food_menu_upload').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            console.log(formData);
            $.ajax({
                type: 'POST',
                url: "{{ url('food_menu') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.success) {
                        this.reset();
                        Swal.fire(
                            'Good job!',
                            'File has been uploaded successfully',
                            'success'
                        );
                        $('#menu_table').DataTable().ajax.reload();
                    } else {
                        Swal.fire(
                            'Oops...',
                            'Please Select File',
                            'error'
                        );
                    }
                },
                error: function(data) {
                    // console.log(data);
                }
            });
        });
        /*************** Food Menu Upload *************************/

        /*********** Bevarage Menu Upload *************************/
        $('#bevarage_menu_upload').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            console.log(formData);
            $.ajax({
                type: 'POST',
                url: "{{ url('bevarage_menu') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.success) {
                        this.reset();
                        Swal.fire(
                            'Good job!',
                            'File has been uploaded successfully',
                            'success'
                        );
                        $('#menu_table').DataTable().ajax.reload();
                    } else {
                        Swal.fire(
                            'Oops...',
                            'Please Select File',
                            'error'
                        );
                    }
                },
                error: function(data) {
                    // console.log(data);
                }
            });
        });
        /*********** Bevarage Menu Upload *************************/
    });
</script>
<script>
    var hidWidth;
    var scrollBarWidths = 40;

    var widthOfList = function() {
        var itemsWidth = 0;
        $('.list a').each(function() {
            var itemWidth = $(this).outerWidth();
            itemsWidth += itemWidth;
        });
        return itemsWidth;
    };

    var widthOfHidden = function() {
        var ww = 0 - $('.wrapper-box').outerWidth();
        var hw = (($('.wrapper-box').outerWidth()) - widthOfList() - getLeftPosi()) - scrollBarWidths;
        var rp = $(document).width() - ($('.nav-item.nav-link').last().offset().left + $('.nav-item.nav-link')
            .last().outerWidth());

        if (ww > hw) {
            //return ww;
            return (rp > ww ? rp : ww);
        } else {
            //return hw;
            return (rp > hw ? rp : hw);
        }
    };

    var getLeftPosi = function() {

        var ww = 0 - $('.wrapper').outerWidth();
        var lp = $('.list').position().left;

        if (ww > lp) {
            return ww;
        } else {
            return lp;
        }
    };

    var reAdjust = function() {

        // check right pos of last nav item
        var rp = $(document).width() - ($('.nav-item.nav-link').last().offset().left + $('.nav-item.nav-link')
            .last().outerWidth());
        if (($('.wrapper-box').outerWidth()) < widthOfList() && (rp < 0)) {
            $('.scroller-right').show().css('display', 'flex');
        } else {
            $('.scroller-right').hide();
        }

        if (getLeftPosi() < 0) {
            $('.scroller-left').show().css('display', 'flex');
        } else {
            $('.item').animate({
                left: "-=" + getLeftPosi() + "px"
            }, 'slow');
            $('.scroller-left').hide();
        }
    }

    reAdjust();

    $(window).on('resize', function(e) {
        reAdjust();
    });

    $('.scroller-right').click(function() {

        $('.scroller-left').fadeIn('slow');
        $('.scroller-right').fadeOut('slow');

        $('.list').animate({
            left: "+=" + widthOfHidden() + "px"
        }, 'slow', function() {
            reAdjust();
        });
    });

    $('.scroller-left').click(function() {

        $('.scroller-right').fadeIn('slow');
        $('.scroller-left').fadeOut('slow');

        $('.list').animate({
            left: "-=" + getLeftPosi() + "px"
        }, 'slow', function() {
            reAdjust();
        });
    });
</script>
<script>
    $(document).ready(() => {
        $('#images').change(function() {
            const file = this.files[0];
            console.log(file);
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    console.log(event.target.result);
                    $('#imgPreview').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    });

    /*************** Deal Add **************************/

    $(document).on('submit', '#add_deal', function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            dataType: 'JSON',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data) {
                // console.log(data.error)
                if ($.isEmptyObject(data.error)) {
                    // alert(data.success);
                    Swal.fire(
                        'Good job!',
                        'You clicked the button!',
                        'success'
                    )
                    $('#add_deal')[0].reset();
                    $('#exampleModal').modal('hide');
                    $('#ComboDeal').DataTable().ajax.reload();
                } else {
                    printErrorMsg(data.error);
                }
            },
            error: function(xhr, desc, err) {},
        });
    });

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            // console.log(key);
            $('.' + key + '_err').text(value);
        });
    }
    /*************** Deal Add **************************/


    /*************** Deal Delete **************************/
    $(document).on('click', '.delete', function() {
        const id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '{{ route('delete.deal') }}/' + id,
                    type: 'GET',
                    success: function(data, status) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        ).then((re) => {
                            $('#ComboDeal').DataTable().ajax.reload();
                        });
                    },
                    error: function(xhr, desc, err) {},
                });
            }
        });
    });
    /*************** Deal Delete **************************/
</script>
<script>
    /******************************* Add Combo Deal Model **********************************************/
    $(document).on('click', '#AddComboDeal', function() {
        $.get('{{ url('add_combo_deal') }}', {
            club_id: '{{ $club_id }}'
        }, function(response, textStatus, jqXHR) {
            $('.modal-content').html(response.html);
            $('#exampleModal').modal('show');
        });

    });
    /******************************* Add Combo Deal Model **********************************************/

    /******************************* Edit Combo Deal Model **************************************************/
    $(document).on('click', '.edit_deal', function() {
        const id = $(this).data('id');
        $.get('{{ url('edit_combo_deal_modal') }}', {
            deal_id: id
        }, function(response, textStatus, jqXHR) {
            $('.modal-content').html(response.html);
            $('#exampleModal').modal('show');
        });
    });
    /******************************* Edit Combo Deal Model **************************************************/
</script>
<!-- Datatable -->
<script type="text/javascript">
    $(document).ready(function() {

        // DataTable
        $('#ComboDeal').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('ComboDeal') }}/{{ $club_id }}",
            columns: [{
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'deal_type'
                },
                {
                    data: 'min_price'
                },
                {
                    data: 'max_price'
                },
                {
                    data: 'artist_price'
                },
                {
                    data: 'status'
                },
                {
                    data: 'action'
                },
            ]
        });
    });
</script>
<!-- Datatable -->
@include('admin.include.footer')
@include('admin.include.foot')
