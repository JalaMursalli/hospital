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

                        <form class="needs-validation" method="POST" action="{{ route('backend.department.update',$department->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="az">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq (Az)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title_az" type="text" value="{{ $department?->title_az }}"
                                                    id="example-text-input">
                                                @error('title_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn1 (Az) </label>
                                            <div class="col-sm-10">
                                                <textarea name="description1_az" class="summernote">{!!$department->description1_az !!}</textarea>
                                                    @error('description1_az')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn2 (Az) </label>
                                            <div class="col-sm-10">
                                                <textarea name="description2_az" class="summernote">{!!$department->description2_az !!}</textarea>
                                                    @error('description2_az')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta title (Az)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="meta_title_az" type="text" value="{{ $department?->meta_title_az }}"
                                                    id="example-text-input">
                                                @error('meta_title_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta Description (Az) </label>
                                            <div class="col-sm-10">
                                                <textarea name="meta_description_az" class="summernote">{!!$department->meta_description_az !!}</textarea>
                                                    @error('meta_description_az')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-10">
                                              <label for="example-text-input" class="col-sm-2 col-form-label">Alt1 (Az)</label>
                                                <input type="text" class="form-control" value="{{ $department?->alt_image1_az }}" name="alt_image1_az">
                                                 @error('alt_image1_az')
                                                     <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-10">
                                              <label for="example-text-input" class="col-sm-2 col-form-label">Alt2 (Az)</label>
                                                <input type="text" class="form-control" value="{{ $department?->alt_image2_az }}" name="alt_image2_az">
                                                 @error('alt_image2_az')
                                                     <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="en">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq (En)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title_en" type="text" value="{{ $department?->title_en }}"
                                                    id="example-text-input">
                                                @error('title_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn1 (En) </label>
                                            <div class="col-sm-10">
                                                <textarea name="description1_en" class="summernote">{!!$department->description1_en !!}</textarea>
                                                    @error('description1_en')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn2 (En) </label>
                                            <div class="col-sm-10">
                                                <textarea name="description2_en" class="summernote">{!!$department->description2_en !!}</textarea>
                                                    @error('description2_en')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta title (En)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="meta_title_en" type="text" value="{{ $department?->meta_title_en }}"
                                                    id="example-text-input">
                                                @error('meta_title_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta Description(En) </label>
                                            <div class="col-sm-10">
                                                <textarea name="meta_description_en" class="summernote">{!!$department->meta_description_en !!}</textarea>
                                                    @error('meta_description_en')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-10">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Alt1 (En)</label>
                                                <input type="text" class="form-control" value="{{ $department?->alt_image1_en }}" name="alt_image1_en">
                                                 @error('alt_image1_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                 @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-10">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Alt2 (En)</label>
                                                <input type="text" class="form-control" value="{{ $department?->alt_image2_en }}" name="alt_image2_en">
                                                 @error('alt_image2_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                 @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="ru">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title_ru" type="text" value="{{ $department?->title_ru }}"
                                                    id="example-text-input">
                                                @error('title_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn1 (Ru) </label>
                                            <div class="col-sm-10">
                                                <textarea name="description1_ru" class="summernote">{!!$department->description1_ru !!}</textarea>
                                                    @error('description1_ru')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn2 (Ru) </label>
                                            <div class="col-sm-10">
                                                <textarea name="description2_ru" class="summernote">{!!$department->description2_ru !!}</textarea>
                                                    @error('description2_ru')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta title (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="meta_title_ru" type="text" value="{{ $department?->meta_title_ru }}"
                                                    id="example-text-input">
                                                @error('meta_title_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta description(Ru) </label>
                                            <div class="col-sm-10">
                                                <textarea name="meta_description_ru" class="summernote">{!!$department->meta_description_ru !!}</textarea>
                                                    @error('meta_description_ru')
                                                        <div class="invalid-feedback" style="display: block">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-10">
                                                 <label for="example-text-input" class="col-sm-2 col-form-label">Alt1 (Ru)</label>
                                                <input type="text" class="form-control" value="{{ $department?->alt_image1_ru}}" name="alt_image1_ru">
                                                @error('alt_image1_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                         {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-10">
                                                 <label for="example-text-input" class="col-sm-2 col-form-label">Alt2 (Ru)</label>
                                                <input type="text" class="form-control" value="{{ $department?->alt_image2_ru}}" name="alt_image2_ru">
                                                @error('alt_image2_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                         {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {{-- <div class="row mb-3 px-3">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kateqoriya</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="service_category_id" class="form-control selectric">
                                            <option value="">Kateqoriya</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('department_category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->title_az }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div> --}}
                                <div class="row mb-3 px-3">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">İcon</label>
                                        <div class="col-sm-10">
                                            <div class="image-preview" id="icon-preview">
                                                <label for="image-upload-icon" id="image-label">Faylı seç</label>
                                                <input type="file" name="icon" id="image-upload-icon" />
                                                <img style="width:200px" src="{{$department?->icon}}" alt="">
                                            </div>
                                            <div id="icon-container" style="display: none;">
                                                <img id="icon-img" src="" alt="Icon Preview"
                                                    style="object-fit:cover; border-radius: 20px; width: 100px; height: 100px;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="image-container" style="display: none;">
                                    <img id="image-preview-img" src="" alt="Image Preview" style="border-radius:20px; width:400px; max-width: 100%; height: auto;" />
                                </div>

                                <div class="row mb-3 px-3">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Şəkil1</label>
                                        <div class="col-sm-10">
                                            <div class="image-preview" id="image1-preview">
                                                <label for="image-upload-image1" id="image-label">Faylı seç</label>
                                                <input type="file" name="image1" id="image-upload-image1" />
                                                <img style="width:200px" src="{{$department?->image1}}" alt="">
                                            </div>
                                            <div id="image1-container" style="display: none;">
                                                <img id="image1-img" src="" alt="Image1 Preview"
                                                    style="object-fit:cover; border-radius: 20px; width: 200px; height: 200px;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="image-container" style="display: none;">
                                    <img id="image-preview-img" src="" alt="Image Preview" style="border-radius:20px; width:400px; max-width: 100%; height: auto;" />
                                </div>

                                <div class="row mb-3 px-3">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Şəkil2</label>
                                        <div class="col-sm-10">
                                            <div class="image-preview" id="image2-preview">
                                                <label for="image-upload-image2" id="image-label">Faylı seç</label>
                                                <input type="file" name="image2" id="image-upload-image2" />
                                                <img style="width:200px" src="{{$department?->image2}}" alt="">
                                            </div>
                                            <div id="image2-container" style="display: none;">
                                                <img id="image2-img" src="" alt="Image2 Preview"
                                                    style="object-fit:cover;  border-radius: 20px; width: 200px; height: 200px;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="image-container" style="display: none;">
                                    <img id="image-preview-img" src="" alt="Image Preview" style="border-radius:20px; width:400px; max-width: 100%; height: auto;" />
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
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
            CKEDITOR.replace('description2_az');
            CKEDITOR.replace('description1_en');
            CKEDITOR.replace('description2_en');
            CKEDITOR.replace('description1_ru');
            CKEDITOR.replace('description2_ru');
            CKEDITOR.replace('editor3');
        </script>
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
