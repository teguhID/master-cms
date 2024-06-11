@extends('layouts.admin')

@push('styles')
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body px-5 py-4">
                    <div class="row pt-3">
                        <div class="col-md-6">
                            <h5>Tambah</h5>
                        </div>
                    </div>
                    <hr>
                
                    <form action="{{ route('admin.content.choose_us.edit', ['id_choose_us' => $data->id_choose_us]) }}" method="post" id="form_edit" class="p-3" enctype="multipart/form-data">
                        @csrf
                        
                        <input type="hidden" name="old_image" value="{{ $data->image_path }}">
                        <div class="row">
                            <div class="col-md-3">
                                <span>Gambar</span>
                            </div>
                            <div class="col-md-7">
                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <img id="image_preview" src="{{ asset('') }}img/{{ $data->image_path }}" alt="Image Preview" class="img-fluid" width="200">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <span>Nama</span>
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="name" id="" class="form-control" value="{{ $data->name }}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <span>Deskripsi</span>
                            </div>
                            <div class="col-md-7">
                                <textarea type="text" name="desc" id="" class="form-control">{{ $data->desc }}</textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary w-200px">
                                    <small>Ubah</small>
                                </button>
                            </div>
                        </div>

                    </form>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {

        $('#image').change(function() {
            const input = this;

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    $('#image_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        });

        $('#form_edit').validate({
            rules: {
                name: {
                    required: true
                },
                desc: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Nama tidak boleh kosong",
                },
                desc: {
                    required: "Deskripsi tidak boleh kosong"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
@endpush
