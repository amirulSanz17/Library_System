
@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
<div class="container">
    <h2>Daftar Kategori Buku</h2>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if (session('error'))
        <p style="color: red;">
            {{ session('error') }}
        </p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="{{ route('categories.create') }}">
        + Tambah Kategori
    </a>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0"
           width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>
                        {{ $categories->firstItem() + $loop->index }}
                    </td>

                    <td>{{ $category->name }}</td>

                    <td>
                        {{ $category->description ?: '-' }}
                    </td>

                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}">
                            Edit
                        </a>

                        <form
                            action="{{ route('categories.destroy', $category->id) }}"
                            method="POST"
                            style="display: inline;"
                            onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        Belum ada data kategori.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>

    {{ $categories->links() }}
</div>
@endsection
