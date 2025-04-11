@extends('backend.layouts.layout')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Yeni Vakansiya</h4>

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

                            <form class="needs-validation" method="POST" action="{{ route('backend.career.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="az">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq
                                                (Az)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title_az" type="text"
                                                    value="{{ $career?->title_az }}" id="example-text-input">
                                                @error('title_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Address
                                                (Az)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="address_az" type="text"
                                                    value="{{ $career?->address_az }}" id="example-text-input">
                                                @error('address_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">İş günləri və
                                                saatları
                                                (Az)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="workSchedule_az" type="text"
                                                    value="{{ $career?->workSchedule_az }}" id="example-text-input">
                                                @error('workSchedule_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Əmək haqqı
                                                (Az)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="salary_az" type="text"
                                                    value="{{ $career?->salary_az }}" id="example-text-input">
                                                @error('salary_az')
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
                                                <textarea name="description1_az" class="summernote">{!! $career->description1_az !!}</textarea>
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
                                                <textarea name="description2_az" class="summernote">{!! $career->description2_az !!}</textarea>
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
                                                <textarea name="description3_az" class="summernote">{!! $career->description3_az !!}</textarea>
                                                @error('description3_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta title
                                                (Az)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="meta_title_az" type="text"
                                                    value="{{ $career?->meta_title_az }}" id="example-text-input">
                                                @error('meta_title_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta
                                                Description (Az) </label>
                                            <div class="col-sm-10">
                                                <textarea name="meta_description_az" class="summernote">{!! $career->meta_description_az !!}</textarea>
                                                @error('meta_description_az')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-10">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Alt
                                                    (Az)</label>
                                                <input type="text" class="form-control"
                                                    value="{{ old('alt_image_az') }}" name="alt_image_az">
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
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq
                                                (En)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title_en" type="text"
                                                    value="{{ $career?->title_en }}" id="example-text-input">
                                                @error('title_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Address
                                                (En)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="address_en" type="text"
                                                    value="{{ $career?->address_en }}" id="example-text-input">
                                                @error('address_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">İş günləri və
                                                saatları
                                                (En)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="workSchedule_en" type="text"
                                                    value="{{ $career?->workSchedule_en }}" id="example-text-input">
                                                @error('workSchedule_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Əmək haqqı
                                                (En)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="salary_en" type="text"
                                                    value="{{ $career?->salary_en }}" id="example-text-input">
                                                @error('salary_en')
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
                                                <textarea name="description1_en" class="summernote">{!! $career->description1_en !!}</textarea>
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
                                                <textarea name="description2_en" class="summernote">{!! $career->description2_en !!}</textarea>
                                                @error('description2_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Mətn3 (En)
                                            </label>
                                            <div class="col-sm-10">
                                                <textarea name="description3_en" class="summernote">{!! $career->description3_en !!}</textarea>
                                                @error('description3_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta title
                                                (En)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="meta_title_en" type="text"
                                                    value="{{ $career?->meta_title_en }}" id="example-text-input">
                                                @error('meta_title_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta
                                                Description(En) </label>
                                            <div class="col-sm-10">
                                                <textarea name="meta_description_en" class="summernote">{!! $career->meta_description_en !!}</textarea>
                                                @error('meta_description_en')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-10">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Alt
                                                    (En)</label>
                                                <input type="text" class="form-control"
                                                    value="{{ old('alt_image_en') }}" name="alt_image_en">
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
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlıq
                                                (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="title_ru" type="text"
                                                    value="{{ $career?->title_ru }}" id="example-text-input">
                                                @error('title_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Address
                                                (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="address_ru" type="text"
                                                    value="{{ $career?->address_ru }}" id="example-text-input">
                                                @error('address_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">İş günləri və
                                                saatları
                                                (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="workSchedule_ru" type="text"
                                                    value="{{ $career?->workSchedule_ru }}" id="example-text-input">
                                                @error('workSchedule_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Əmək haqqı
                                                (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="salary_ru" type="text"
                                                    value="{{ $career?->salary_ru }}" id="example-text-input">
                                                @error('salary_ru')
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
                                                <textarea name="description1_ru" id="description1_ru" class="summernote">{!! $career->description1_ru !!}</textarea>
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
                                                <textarea name="description2_ru" id="description2_ru" class="summernote">{!! $career->description2_ru !!}</textarea>
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
                                                <textarea name="description3_ru" id="description3_ru" class="summernote">{!! $career->description3_ru !!}</textarea>
                                                @error('description3_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta title
                                                (Ru)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="meta_title_ru" type="text"
                                                    value="{{ $career?->meta_title_ru }}" id="example-text-input">
                                                @error('meta_title_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Meta
                                                description(Ru) </label>
                                            <div class="col-sm-10">
                                                <textarea name="meta_description_ru" class="summernote">{!! $career->meta_description_ru !!}</textarea>
                                                @error('meta_description_ru')
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-10">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Alt
                                                    (Ru)</label>
                                                <input type="text" class="form-control"
                                                    value="{{ old('alt_image_ru') }}" name="alt_image_ru">
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
                                        <label for="example-text-input" class="col-sm-2 col-form-label">İş
                                            saatları</label>
                                        <input type="text" name="workHours" class="form-control"
                                            value="{{ $career?->workHours }}">
                                        @error('workHours')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3 px-3">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="status" class="form-control selectric">
                                            <option value="">Statusu seç</option>
                                            <option value="0">Aktiv deyil </option>
                                            <option value="1">Aktiv </option>
                                        </select>

                                    </div>
                                </div>
                                <div class="row mb-3 px-3">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kateqoriya</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="vacancy_id" class="form-control selectric">
                                            <option value="">Kateqoriya</option>
                                            @foreach ($vacancies as $vacancy)
                                                <option value="{{ $vacancy->id }}" {{ old('vacancy_id') == $vacancy->id ? 'selected' : '' }}>
                                                    {{ $vacancy->title_az }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="row mb-3 px-3">
                                    <div class="row mb-3">
                                        <label for="image-upload" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <!-- File input where the user selects the image -->
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Faylı seç</label>
                                                <input type="file" name="image" id="image-upload"
                                                    accept="image/*" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Preview Container (Initially Hidden) -->
                                <div id="image-container" style="display: none;">
                                    <img id="image-preview-img" src="" alt="Image Preview"
                                        style="border-radius:20px; width:400px; max-width: 100%; height: auto;" />
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
                                        <button class="btn btn-primary">Yarat</button>
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
            .cke_notifications_area {
                display: none;
            }
        </style>
    @endpush

    @push('js')
        <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('description3_az');
            CKEDITOR.replace('description2_az');
            CKEDITOR.replace('description3_en');
            CKEDITOR.replace('description2_en');
            CKEDITOR.replace('description3_ru');
            CKEDITOR.replace('description2_ru');
            CKEDITOR.replace('editor3');
        </script>
    @endpush
