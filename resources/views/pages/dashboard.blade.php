@extends('layouts.app')
@section('title', 'Artikel Saya')

@section('content')
<section class="card">
  <h2>Daftar Artikel</h2>

  {{-- Tampilkan tabel artikel --}}
  @if(isset($artikels) && $artikels->count())
    <table border="1" cellpadding="8" cellspacing="0">
      <thead>
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th>Penulis</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($artikels as $index => $artikel)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $artikel->judul }}</td>
            <td>{{ $artikel->penulis->name ?? '-' }}</td>
            <td>
              <a href="{{ route('artikel.edit', $artikel->id) }}">Edit</a> |
              <form action="{{ route('artikel.destroy', $artikel->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p>Belum ada artikel.</p>
  @endif

  <p>
    <a href="{{ route('artikel.create') }}">+ Tambah Artikel Baru</a>
  </p>
</section>
@endsection
