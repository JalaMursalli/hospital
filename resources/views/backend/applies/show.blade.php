@extends('backend.layouts.layout')

@section('content')
    <section class="section" style="margin-top: 80px">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Müraciət Detalları</h4>
                            <a href="{{ route('backend.apply.index') }}" class="btn btn-secondary">Geri</a>
                        </div>

                        <div class="card-body">
                            <!-- Success Message -->
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- Application Details -->
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Başlıq:</strong> {{ $apply?->career?->title_az }}</p>
                                    <p><strong>Ad Soyad:</strong> {{ $apply?->name }}</p>
                                    <p><strong>Telefon:</strong> {{ $apply?->phone }}</p>
                                    <p><strong>Email:</strong> {{ $apply?->email }}</p>
                                    {{-- <p><strong>Created At:</strong> {{ $apply->created_at->format('d-m-Y H:i') }}</p> --}}
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Text:</strong></p>
                                    <p>{{ $apply?->text }}</p>
                                </div>
                            </div>

                            <!-- CV Section -->
                            @if($apply?->cv)
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <p><strong>CV:</strong></p>
                                        <a href="{{ asset($apply?->cv) }}" target="_blank" class="btn btn-info">
                                            <i class="fas fa-file-pdf"></i> CV-ni Görüntülə
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <p><strong>CV:</strong> Təqdim olunmayıb</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
