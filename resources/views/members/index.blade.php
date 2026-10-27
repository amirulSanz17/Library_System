<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota Perpustakaan</title>

    <style>
        :root {
            --prussian: #032A42;
            --columbia: #D1E2F3;
            --beige: #F0F0DC;
            --wheat: #F0D8B6;
            --lion: #B3926F;
            --lion-dark: #8C6A4D;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            margin: 0;
            padding: 40px;
            min-height: 100vh;
            color: var(--prussian);
            background:
                radial-gradient(circle at top right, var(--columbia), transparent 35%),
                var(--beige);
        }

        h1 {
            color: var(--prussian);
            font-size: 30px;
            margin: 0 0 20px;
        }

        .success {
            color: var(--prussian);
            background: var(--columbia);
            border-left: 5px solid var(--prussian);
            padding: 13px 16px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .button {
            display: inline-block;
            padding: 12px 17px;
            margin-bottom: 20px;
            background: var(--lion);
            color: white;
            text-decoration: none;
            border: 1px solid var(--lion-dark);
            border-radius: 9px;
            font-weight: 600;
            box-shadow: 0 5px 12px rgba(179, 146, 111, 0.2);
            transition: 0.2s;
        }

        .button:hover {
            background: var(--prussian);
            border-color: var(--prussian);
            color: white;
            transform: translateY(-1px);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            background: white;
            border: 1px solid #D9C4AA;
            border-radius: 13px;
            box-shadow: 0 12px 30px rgba(3, 42, 66, 0.10);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #E9DFD2;
        }

        th {
            background: var(--prussian);
            color: var(--beige);
            font-size: 14px;
            font-weight: 600;
            border-bottom: 4px solid var(--lion);
        }

        tbody tr:nth-child(even) {
            background: #FCFAF6;
        }

        tbody tr:hover {
            background: var(--columbia);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        td {
            font-size: 14px;
        }

        td a {
            color: var(--lion-dark);
            font-weight: 600;
            text-decoration: none;
        }

        td a:hover {
            color: var(--prussian);
            text-decoration: underline;
        }

        .action {
            display: inline;
        }

        button {
            cursor: pointer;
            padding: 7px 11px;
            background: var(--wheat);
            color: var(--prussian);
            border: 1px solid var(--lion);
            border-radius: 6px;
            font-weight: 600;
            transition: 0.2s;
        }

        button:hover {
            background: var(--lion);
            color: white;
        }

        .pagination-wrapper {
            margin-top: 22px;
        }

        .pagination-wrapper nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        @media (max-width: 768px) {
            body {
                padding: 22px 14px;
            }

            h1 {
                font-size: 25px;
            }

            th, td {
                padding: 12px;
            }
        }
    </style>
</head>

<body>

    <h1>Data Anggota Perpustakaan</h1>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <a href="{{ route('members.create') }}" class="button">
        + Tambah Anggota
    </a>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($members as $member)
                    <tr>
                        <td>{{ $members->firstItem() + $loop->index }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email ?? '-' }}</td>
                        <td>{{ $member->phone ?? '-' }}</td>
                        <td>{{ $member->address ?? '-' }}</td>
                        <td>
                            <a href="{{ route('members.show', $member) }}">Detail</a>
                            |
                            <a href="{{ route('members.edit', $member) }}">Edit</a>

                            <form
                                action="{{ route('members.destroy', $member) }}"
                                method="POST"
                                class="action"
                                onsubmit="return confirm('Yakin ingin menghapus anggota ini?')"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada data anggota.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $members->links() }}
    </div>

</body>
</html>