@extends('backend.layouts.layout')

@section('content')
    <section class="section " style="margin-top: 80px">
     <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header align-items-end d-flex justify-content-between">
                           <div>
                            <h4>Həkimlərin siyahısı</h4>
                            <div class="card-header-form">
                                <!-- Search Form -->
                                <form action="{{ route('backend.doctor.index') }}" method="GET" class="d-flex"
                                    style="max-width: 400px;">
                                    <input type="text" name="search" class="form-control me-2"
                                        value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                            </div>
                           </div>
                            <a href="{{ route('backend.doctor.create') }}" class="btn btn-primary">Yeni Həkim yarat</a>
                        </div>

                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Şəkil</th>
                                        <th>Ad</th>
                                        <th>Vəzifə</th>
                                        {{-- <th>Mətn</th> --}}
                                        <th>Created At</th>
                                        <th class="text-end d-flex align-items-center justify-content-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($doctors as $key => $doctor)
                                        <tr>
                                            <td>{{ $doctors->firstItem() + $key }}</td> <!-- Keeps count on pagination -->
                                            <td>
                                                <img src="{{ asset($doctor->image) }}" alt=""
                                                    style="height: 70px; weight: 70px">
                                            </td>
                                            <td>{{ $doctor->name_az }}</td>
                                            <td>{{ $doctor->position_az }}</td>
                                            {{-- <td>{!! $doctor->description_az !!}</td> --}}
                                            <td>{{ $doctor->created_at }}</td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end " style="gap: 20px">
                                                    <a href="{{ route('backend.doctor-social.index',['doctor_id'=>$doctor->id]) }}" class="btn btn-primary btn-sm">
                                                        <i class="mdi mdi-plus"></i>
                                                        Sosial əlavə et
                                                    </a>
                                                    <a href="{{ route('backend.feedback.index',['doctor_id'=>$doctor->id]) }}" class="btn btn-primary btn-sm">
                                                        <i class="mdi mdi-plus"></i>
                                                        Feedback əlavə et
                                                    </a>
                                                    <a href="{{ route('backend.doctor.edit', $doctor?->id ?? '') }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>

                                                    <form
                                                        action="{{ route('backend.doctor.destroy', $doctor?->id ?? '') }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm ml-2"
                                                            onclick="return confirm('Əminsiniz?')">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Həkim tapılmadı</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            <div class="d-flex salam justify-content-end">
                                {{ $doctors->appends(['search' => request('search')])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
