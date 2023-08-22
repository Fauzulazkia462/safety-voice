@extends('layout.main')
@section('content')
<section class="section" id="input">
    <div class="container">
        {{-- <h6 class="display-4 has-line text-center">INPUT DATA PELAPORAN</h6> --}}
        <p class="mb-5 pb-2 text-center">Hati - hati dalam input, periksa kembali sebelum submit!</p>

        <form method="POST" action="{{ route('insert') }}" enctype="multipart/form-data">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="status" value="Open">
                        <div class="form-group pb-1">
                            <label for="name"><b>Nama Lengkap*</b></label>
                            <input type="text" class="form-control" name="fName" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="form-group pb-1">
                            <label for="name"><b>Departemen*</b></label>
                            <input type="text" class="form-control" name="dept" placeholder="Nama Departemen" required>
                        </div>
                        <div class="form-group pb-1">
                            <label for="name"><b>Area Kerja Temuan*</b></label>
                            <input type="text" class="form-control" name="area" placeholder="Masukkan Area Kerja Temuan" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group pb-1">
                            <label for="name"><b>Lokasi Temuan Spesifik*</b></label>
                            <input type="text" class="form-control" name="specArea" placeholder="Masukkan Lokasi Spesifik" required>
                        </div>
                        <div class="form-group pb-1">
                            <label for="name"><b>Foto Temuan*</b></label>
                            <input type="file" class="form-control" name="file" accept="image/*" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group pb-1">
                            <label for="unsafe_activity"><b>Temuan aktivitas tidak aman di area/departemen saya</b></label>
                            <textarea name="unsafe_activity" id="unsafe_activity" cols="" rows="5" class="form-control" placeholder="Masukkan Temuan aktivitas tidak aman"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group pb-1">
                            <label for="unsafe_envi"><b>Temuan keadaan tidak aman di area/departemen saya</b></label>
                            <textarea name="unsafe_envi" id="unsafe_envi" cols="" rows="5" class="form-control" placeholder="Masukkan Temuan keadaan tidak aman"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group pb-1">
                            <label for="recom"><b>Saran/Rekomendasi*</b></label>
                            <textarea name="recom" id="recom" cols="" rows="5" class="form-control" required placeholder="Masukkan Saran"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="text-right">
                            <input type="submit" id="add" class="btn btn-primary mt-3" value="Submit">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
{{-- @section('content')
<section id="section6" class="contact">
    <div class="contact100-form-title container">
        <h2>Data Diri</h4>
        <form method="POST" class="contact100-form validate-form" action="{{ route('insert') }}" enctype="multipart/form-data">
            @csrf                      
            <div class="wrap-input100 rs1-wrap-input100 validate-input">
                <span class="label-input100">Nama Lengkap*</span>
                <input type="text" class="input100" name="fName" placeholder="Masukkan Nama" required>
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 rs1-wrap-input100 validate-input">
                <span class="label-input100">Area Kerja Temuan*</span>
                <input type="text" class="input100" name="area" placeholder="Masukkan Area Temuan" required>
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 rs1-wrap-input100 validate-input">
                <span class="label-input100">Lokasi Temuan Spesifik*</span>
                <input type="text" class="input100" name="specArea" placeholder="Masukkan Lokasi Spesifik" required>
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input lebar">
                <span class="label-input100">Temuan aktivitas tidak aman di area/departemen saya</span>
                <input type="text" class="input100" name="unsafe_activity" placeholder="Masukkan Temuan aktivitas tidak aman">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input lebar">
                <span class="label-input100">Temuan keadaan tidak aman di area/departemen saya</span>
                <input type="text" class="input100" name="unsafe_envi" placeholder="Masukkan Temuan keadaan tidak aman">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input lebar">
                <span class="label-input100">Saran/Rekomendasi</span>
                <input type="text" class="input100" name="recom" placeholder="Masukkan Saran">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 rs1-wrap-input100 validate-input">
                <span class="label-input100">Foto Temuan*</span>
                <input type="file" class="input100" name="file" required>
                <span class="focus-input100"></span>
            </div>
            <div class="textare">
                <button type="submit" id="add" class="contact100-form-btn">
                    <span>Submit</span>
                </button>
            </div>
        </form>
    </div>
</section>
@endsection --}}

@section('script')
<script src="{{ asset ('js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset ('js/jquery.js')}}"></script>	
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
<script src="{{ asset ('js/jquery.mask.min.js')}}"></script>

{{-- toastr --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if(session('message'))
<script>

	toastr.success('{{ session('message')['type'] }}');

</script>
@endif
@endsection