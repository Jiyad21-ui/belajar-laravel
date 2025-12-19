@extends('layouts.app')

@section('title', 'Daftar Artikel')

@section('content')

<div class="card">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h2 style="margin:0;">Daftar Artikel</h2>
        <a href="{{ route('artikel.create') }}" class="button">
            + Tambah Artikel
        </a>
    </div>

    @if (session('success'))
        <div class="flash">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th style="width:60px;">No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th style="width:160px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($artikels as $index => $artikel)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $artikel->judul }}</td>
                    <td>{{ $artikel->penulis->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('artikel.edit', $artikel->id) }}">Edit</a>
                        |
                        <form action="{{ route('artikel.destroy', $artikel->id) }}"
                              method="POST"
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Yakin hapus artikel ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="muted">
                        Belum ada artikel.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
