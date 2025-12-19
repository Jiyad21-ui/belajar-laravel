@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content')

<div class="card">
    <h2 style="margin-top:0;">Edit Artikel</h2>

    <form method="POST" action="{{ route('artikel.update', $artikel->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Judul</label>
            <input type="text"
                   name="judul"
                   value="{{ $artikel->judul }}"
                   required>
        </div>

        <div>
            <label>Konten</label>
            <textarea name="konten"
                      rows="5"
                      required>{{ $artikel->konten }}</textarea>
        </div>

        <div style="margin-top:1rem;">
            <button type="submit">Update</button>
            <a href="{{ route('artikel.index') }}" class="muted" style="margin-left:.75rem;">
                Batal
            </a>
        </div>
    </form>
</div>

@endsection
