@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')

<div class="card">
    <h2 style="margin-top:0;">Tambah Artikel</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('artikel.store') }}" method="POST">
        @csrf

        <div>
            <label>Judul</label>
            <input type="text"
                   name="judul"
                   value="{{ old('judul') }}"
                   required>
        </div>

        <div>
            <label>Konten</label>
            <textarea name="konten"
                      rows="5"
                      required>{{ old('konten') }}</textarea>
        </div>

        <div style="margin-top:1rem;">
            <button type="submit">Simpan</button>
            <a href="{{ route('artikel.index') }}" class="muted" style="margin-left:.75rem;">
                Batal
            </a>
        </div>
    </form>
</div>

@endsection
