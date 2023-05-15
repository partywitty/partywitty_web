@include('artist.include.head')
@include('artist.include.header')


<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="back--btn">
            <a href="{{url('facebook_data')}}">
                <img src="{{url('')}}/public/assets/img/back.png" alt="">
            </a>
        </div>
        <div class="box--c intro">
            <h3>Address</h3>
            @if (\Session::has('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('error') !!}</li>
                </ul>
            </div>
            @endif
            <form action="{{url('submit_address')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="">Flat No./House No. </label>
                        <input type="text" class="form-control rd" name="flat_no" value="{{empty($address)?'':$address->flat_no}}" placeholder="Write a Flat No./House No... " required>
                        <img src="{{url('')}}/public/assets/img/h-n.png" alt="" class="icon--input">
                    </div>
                </div>
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="">Landmark</label>
                        <input type="text" class="form-control rd" name="landmark" value="{{empty($address)?'':$address->landmark}}" placeholder="Write a Landmark... " required>
                        <img src="{{url('')}}/public/assets/img/landmark.png" alt="" class="icon--input">
                    </div>
                </div>
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="">State</label>
                        <input type="text" class="form-control rd" name="state" value="{{empty($address)?'':$address->state}}" placeholder="Write a State... " required>
                    </div>
                </div>
                <div class="grid--box">
                    <div class="flex--50">
                        <label for="">Town/City</label>
                        <input type="text" class="form-control rd" name="city" value="{{empty($address)?'':$address->city}}" placeholder="Write a Town/City... " required>
                    </div>
                    <div class="flex--50">
                        <label for="">PinCode</label>
                        <input type="number" class="form-control rd" name="pincode" value="{{empty($address)?'':$address->pincode}}" placeholder="Write a Pincode..." required>
                    </div>
                </div>
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="">ID Proof type</label>
                        <select name="address_proof" class="form-control">
                            <option {{empty($address)?"":($address->address_proof == 'Aadhar'?"selected":"")}} value="Aadhar">Aadhar</option>
                            <option {{empty($address)?"":($address->address_proof == 'Voter Id'?"selected":"")}} value="Voter Id">Voter Id</option>
                            <option {{empty($address)?"":($address->address_proof == 'Driving license'?"selected":"")}} value="Driving license">Driving license</option>
                        </select>
                    </div>
                </div>
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="fileInput"> ID Proof
                            <!-- <span class="form-control"><img id="icon" src="{{url('')}}/public/assets/img/upload.png"></span> -->
                        </label>
                        <!-- <input id="fileInput" name="id_proof" type="file" > -->
                        <!-- <label for="">ID Proof</label> -->
                        <!-- <input type="file" class="form-control" placeholder="Write a City... "> -->
                       
                        <input id="fileInput" name="id_proof" type="file" class="form-control rd">
                    </div>
                </div>
                
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="">Aadhar Number</label>
                        <input type="number" class="form-control rd" name="aadhar_number" value="{{empty($address)?'':$address->aadhar_number}}" placeholder="Write a number... " required>
                    </div>
                </div>

                <div class="login--button--bx">
                    <button type="submit" class="lg--btn--theame">Submit</button>

                    <!-- <a href="bank_details.php" class="lg--btn--theame">Submit</a> -->
                </div>
            </form>

        </div>
    </div>
</section>
@include('artist.include.foot')
<script>
    bodyClass('artist--list');
</script>