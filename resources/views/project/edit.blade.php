@extends('layouts.temadmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data Siswa
                    </div>
                    <div class="card-body">
                        <form action="{{ route('project.update', $Project->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                    name="name" value="{{ $Project->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                         <div class="mb-3">
                        <label class="form-label">Client</label>
                        <select name="client_id" class="form-control @error('client_id') is-invalid @enderror">
                            @foreach ($tb_m_clients as $client)
                            @if (old('client_id', $client->id) == $Project->client->id)
                            <option value="{{ $client->id }}" selected hidden>{{ $client->name }}</option>
                            @else
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('client_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                            <div class="mb-3">
                                <label class="form-label">Project Start</label>
                                <input type="date" class="form-control  @error('start') is-invalid @enderror"
                                    name="start" value="{{ $Project->start }}">
                                @error('start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Project End</label>
                                <input type="date" class="form-control  @error('end') is-invalid @enderror"
                                    name="end" value="{{ $Project->end }}">
                                @error('end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <input type="text" class="form-control  @error('status') is-invalid @enderror"
                                    name="status" value="{{ $Project->status }}">
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          
                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection