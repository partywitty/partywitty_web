@include('artist.include.head')
@include('artist.include.header')

<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="back--btn">
            <a href="{{url('address')}}">
                <img src="{{url('')}}/public/assets/img/back.png" alt="">
            </a>
        </div>
        <div class="box--c intro">
            <h3>Bank Details</h3>
            <form action="{{url('submit_bank_detail')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="">Bank Name</label>
                        <select name="bankname" id="" class="form-control rd">
                            @foreach($banks as $bank)
                            <option value="{{$bank['BANK']}}">{{$bank['BANK']}}</option>
                            @endforeach
                        </select>
                        <!-- <input type="text" class="form-control rd" name="bankname" value="{{empty($bankdetail)?'':$bankdetail->bankname}}" placeholder="Enter Here... "> -->
                    </div>
                </div>
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="">Account Number</label>
                        <input type="number" class="form-control rd" name="acount_number" value="{{empty($bankdetail)?'':$bankdetail->acount_number}}" placeholder="Enter Here... " required>
                    </div>
                </div>
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="">IFSC Code </label>
                        <input type="text" class="form-control rd" name="ifsccode" style="text-transform:uppercase;" value="{{empty($bankdetail)?'':$bankdetail->ifsccode}}" placeholder="Enter Here... " required>
                    </div>
                </div>
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="">Branch Name</label>
                        <input type="text" class="form-control rd" name="branch" value="{{empty($bankdetail)?'':$bankdetail->branch}}" placeholder="Enter Here... " required>
                    </div>
                </div>
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="">Pan Card Name</label>
                        <input type="text" class="form-control rd" name="pan_name" style="text-transform:uppercase;" value="{{empty($bankdetail)?'':$bankdetail->pan_name}}" placeholder="Enter Here... " required>
                    </div>
                </div>
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="">Pan Card Number</label>
                        <input type="text" class="form-control rd" name="pan_number" style="text-transform:uppercase;" value="{{empty($bankdetail)?'':$bankdetail->pan_number}}" placeholder="Enter Here... " required>
                    </div>
                </div>
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="fileInput"> Cancel Cheque
                            <!-- <span class="form-control"><img id="icon" src="../assets/img/upload.png"></span> -->
                        </label>
                        <!-- <input id="fileInput" type="file" name="cancel_chaque"> -->
                        <input id="fileInput" type="file" name="cancel_chaque" class="form-control rd">
                    </div>
                </div>
                <div class="login--button--bx">
                    <button type="submit" class="lg--btn--theame">Submit</button>
                    <!-- <a href="service_agreement.php" class="lg--btn--theame"></a> -->
                </div>
            </form>

        </div>
    </div>
</section>
@include('artist.include.foot')
<script>
    bodyClass('artist--list');
</script>