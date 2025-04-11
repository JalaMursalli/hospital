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

                        <form class="needs-validation" method="POST" action="{{ route('backend.emergency.update',1) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="az">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq1 (Az)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title1_az" type="text" value="{{ $emergency?->title1_az }}"
                                                    id="example-text-input">
                                                @error('title1_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq2 (Az)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title2_az" type="text" value="{{ $emergency?->title2_az }}"
                                                    id="example-text-input">
                                                @error('title2_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq3 (Az)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title3_az" type="text" value="{{ $emergency?->title3_az }}"
                                                    id="example-text-input">
                                                @error('title3_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn1 (Az)
                                            </label>
                                            <div class="col-sm-10">
                                                <textarea name="description1_az" class="summernote">{!! $emergency?->description1_az !!}</textarea>
                                                @error('description1_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn2 (Az)
                                            </label>
                                            <div class="col-sm-10">
                                                <textarea name="description2_az" class="summernote">{!! $emergency?->description2_az !!}</textarea>
                                                @error('description2_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn3 (Az)
                                            </label>
                                            <div class="col-sm-10">
                                                <textarea name="description3_az" class="summernote">{!! $emergency?->description3_az !!}</textarea>
                                                @error('description3_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-10">
                                              <label for="example-text-input" class="col-sm-2 col-form-label">Alt (Az)</label>
                                                <input type="text" class="form-control" value="{{ $emergency?->alt_image_az }}" name="alt_image_az">
                                                 @error('alt_image_az')
                                                     <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="en">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq1 (En)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title1_en" type="text" value="{{ $emergency?->title1_en }}"
                                                    id="example-text-input">
                                                @error('title1_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq2 (En)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title2_en" type="text" value="{{ $emergency?->title2_en }}"
                                                    id="example-text-input">
                                                @error('title2_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq3 (En)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title3_en" type="text" value="{{ $emergency?->title3_en }}"
                                                    id="example-text-input">
                                                @error('title3_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn1 (En)
                                            </label>
                                            <div class="col-sm-10">
                                                <textarea name="description1_en" class="summernote">{!! $emergency?->description1_en !!}</textarea>
                                                @error('description1_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn2 (En)
                                            </label>
                                            <div class="col-sm-10">
                                                <textarea name="description2_en" class="summernote">{!! $emergency?->description2_en !!}</textarea>
                                                @error('description2_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div><div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn3 (En)
                                            </label>
                                            <div class="col-sm-10">
                                                <textarea name="description3_en" class="summernote">{!! $emergency?->description3_en !!}</textarea>
                                                @error('description3_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-10">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Alt (En)</label>
                                                <input type="text" class="form-control" value="{{ $emergency?->alt_image_en }}" name="alt_image_en">
                                                 @error('alt_image_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                 @enderror
                                            </div>

                                    </div>
                                    </div>
                                    <div class="tab-pane" id="ru">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq1 (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title1_ru" type="text" value="{{ $emergency?->title1_ru }}"
                                                    id="example-text-input">
                                                @error('title1_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq2 (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title2_ru" type="text" value="{{ $emergency?->title2_ru }}"
                                                    id="example-text-input">
                                                @error('title2_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq3 (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title3_ru" type="text" value="{{ $emergency?->title3_ru }}"
                                                    id="example-text-input">
                                                @error('title3_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn1 (Ru)
                                            </label>
                                            <div class="col-sm-10">
                                                <textarea name="description1_ru" id="description1_ru" class="summernote">{!! $emergency?->description1_ru !!}</textarea>
                                                @error('description1_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn2 (Ru)
                                            </label>
                                            <div class="col-sm-10">
                                                <textarea name="description2_ru" id="description2_ru" class="summernote">{!! $emergency?->description2_ru !!}</textarea>
                                                @error('description2_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn3 (Ru)
                                            </label>
                                            <div class="col-sm-10">
                                                <textarea name="description3_ru" id="description3_ru" class="summernote">{!! $emergency?->description3_ru !!}</textarea>
                                                @error('description3_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-10">
                                                 <label for="example-text-input" class="col-sm-2 col-form-label">Alt (Ru)</label>
                                                <input type="text" class="form-control" value="{{ $emergency?->alt_image_ru}}" name="alt_image_ru">
                                                @error('alt_image_ru')
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
                                        <label for="image-upload" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <!-- File input where the user selects the image -->
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Faylı seç</label>
                                                <input type="file" name="image" id="image-upload" accept="image/*" />
                                                <img style="width:200px" src="{{$emergency?->image}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Preview Container (Initially Hidden) -->
                                <div id="image-container" style="display: none;">
                                    <img id="image-preview-img" src="" alt="Image Preview" style="border-radius:20px; width:400px; max-width: 100%; height: auto;" />
                                </div>

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
          </form>

    </div> <!-- container-fluid -->
</div>


@endsection
@push('css')
        <style>
            .cke_notifications_area{
                display: none;
            }
        </style>
    @endpush

    @push('js')
        <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
        <script>
             CKEDITOR.replace('description1_az');
            CKEDITOR.replace('description3_az');
            CKEDITOR.replace('description2_az');
            CKEDITOR.replace('description1_en');
            CKEDITOR.replace('description3_en');
            CKEDITOR.replace('description2_en');
            CKEDITOR.replace('description1_ru')
            CKEDITOR.replace('description3_ru');
            CKEDITOR.replace('description2_ru');
            CKEDITOR.replace('editor3');
        </script>
    @endpush
