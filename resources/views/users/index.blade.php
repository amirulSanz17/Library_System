<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen User</title>
    <style>
       
    * {
        box-sizing: border-box;
    }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(
                110deg,
                #F0F0DC 0%,
                #F0F0DC 48%,
                #D1E2F3 100%
            );
            color: #032A42;
            margin: 0;
            padding: 40px;
            min-height: 100vh;
        }


        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: transparent;
            padding: 0;
            border-radius: 0;
            box-shadow: none;
        }

        h1 {
            color: #032A42;
            font-size: 30px;
            margin: 0 0 12px;
            letter-spacing: -0.5px;
        }

        p {
            line-height: 1.6;
        }

        a, button {
            display: inline-block;
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .add {
            background: #032A42;
            color: #FFFFFF;
        }

        .add:hover {
            background: #064667;
        }

        .edit {
            background: #B3926F;
            color: #FFFFFF;
        }

        .edit:hover {
            background: #967451;
        }

        .delete {
            background: #8B3030;
            color: #FFFFFF;
        }

        .delete:hover {
            background: #6E2222;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 24px;
            overflow: hidden;
            border-radius: 10px;
            border: 1px solid #D1E2F3;
            background: #FFFFFF;
        }

        th, td {
            padding: 15px 16px;
            text-align: left;
            border-bottom: 1px solid #D1E2F3;
        }

        th {
            background: #032A42;
            color: #FFFFFF;
            font-weight: 600;
        }

        td {
            background: #FFFFFF;
        }

        tbody tr:nth-child(even) td {
            background: #F4F7FA;
        }

        tbody tr:hover td {
            background: #F0D8B6;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .message {
            background: #E7F3E8;
            color: #27633B;
            padding: 12px 15px;
            border-radius: 8px;
        }

        .error {
            color: #8B3030;
            background: #FBEAEA;
            padding: 12px 30px;
            border-radius: 8px;
        }

        form {
            display: inline;
        }

        form[style*="margin-top"] {
            display: block;
            margin-top: 24px !important;
        }

        button:focus-visible,
        a:focus-visible {
            outline: 3px solid #B3926F;
            outline-offset: 3px;
        }

        @media (max-width: 700px) {
            body {
                padding: 20px 12px;
            }

            .container {
                padding: 20px 14px;
                overflow-x: auto;
            }

            h1 {
                font-size: 25px;
            }

            table {
                min-width: 580px;
            }
        }

    </style>
</head>
<body>
<div class="container">
    <h1>Manajemen User</h1>
    <p>Login sebagai: {{ auth()->user()->name }}
        ({{ ucfirst(auth()->user()->role) }})</p>

    @if (session('success'))
        <p class="message">{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif

    @if ($errors->any())
        <ul class="error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <a class="add" href="{{ route('users.create') }}">+ Tambah User</a>
    <a class="edit" href="{{ route('members.index') }}">Halaman Anggota</a>

    <table>
        <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>
                    <a class="edit"
                       href="{{ route('users.edit', $user) }}">Edit</a>

                    @if ($user->id !== auth()->id())
                        <form action="{{ route('users.destroy', $user) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="delete" type="submit">
                                Hapus
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Belum ada user.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $users->links() }}

    <form action="{{ route('logout') }}" method="POST"
          style="margin-top: 20px;">
        @csrf
        <button class="delete" type="submit">Logout</button>
    </form>
</div>
</body>
</html>