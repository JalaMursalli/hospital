@extends('backend.layouts.layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Yeniləmək</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Forms Elements</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-bs-toggle="tab" href="#az" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">AZ</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#en" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">EN</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#ru" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                    <span class="d-none d-sm-block">RU</span>
                                </a>
                            </li>
                        </ul>

                        <form class="needs-validation" method="POST" action="{{ route('backend.feedback.update',$feedback->id ) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="az">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Vəzifə (Az) </label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="position_az" value="{{ $feedback?->position_az }}"
                                                    id="example-text-input">
                                                    @error('position_az')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn (Az) </label>
                                            <div class="col-sm-10">
                                                <textarea name="description_az" class="summernote">{!!$feedback->description_az !!}</textarea>
                                                    @error('description_az')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="en">

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Vəzifə (En) </label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="position_en" value="{{ $feedback?->position_en }}"
                                                    id="example-text-input">
                                                    @error('position_en')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn (En) </label>
                                            <div class="col-sm-10">
                                                <textarea name="description_en" class="summernote">{!!$feedback->description_en !!}</textarea>
                                                    @error('description_en')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>



                                    </div>
                                    <div class="tab-pane" id="ru">

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Vəzifə (Ru) </label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="position_ru" value="{{ $feedback?->position_ru }}"
                                                    id="example-text-input">
                                                    @error('position_ru')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn (Ru) </label>
                                            <div class="col-sm-10">
                                                <textarea name="description_ru" class="summernote">{!!$feedback->description_ru !!}</textarea>
                                                    @error('description_ru')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="row mb-3 px-3">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Qiymətləndirmə
                                        </label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" min="1" max="5"
                                                name="ranking" value="{{ $feedback?->ranking }}"
                                                id="example-text-input">
                                            @error('ranking')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <input type="hidden" name="doctor_id" value="{{request('doctor_id')}}">
                                <div class="row mb-3 px-3">
                                    <div class="row mb-3">
                                        <label for="image-upload" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <!-- File input where the user selects the image -->
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Faylı seç</label>
                                                <input type="file" name="image" id="image-upload" accept="image/*" />
                                                <img style="width:200px" src="{{$feedback?->image}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Preview Container (Initially Hidden) -->
                                <div id="image-container" style="display: none;">
                                    <img id="image-preview-img" src="" alt="Image Preview" style="border-radius:20px; width:400px; max-width: 100%; height: auto;" />
                                </div>




                                <div class="row mb-3 px-3">

                                    <div class="mt-4 d-flex justify-content-end">
                                      <button class="btn btn-primary">Update</button>
                                    </div>
                                  </div>
                        </form>

                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->


    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->


@endsection


    @push('js')
          <script>
            // Handle image file selection and preview

            document.getElementById('image-upload').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    // Create an object URL for the selected image and set as the image source
                    const imageUrl = URL.createObjectURL(file);
                    const imagePreviewImg = document.getElementById('image-preview-img');
                    imagePreviewImg.src = imageUrl;

                    const imgContainer = document.getElementById('image-container');
                     imgContainer.style.display = 'flex'; // Show the preview
                     imgContainer.style.justifyContent = 'center'; // Center the content horizontally
                    imgContainer.style.alignItems = 'center';
                }
            });
        </script>
    @endpush
