<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User</title>

    <style>
        * { box-sizing: border-box; }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(110deg, #F0F0DC 0%, #F0F0DC 48%, #D1E2F3 100%);
            color: #032A42;
            margin: 0;
            padding: 40px 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 650px;
            margin: 0 auto;
        }

        h1 { margin-top: 0; }

        .form-card {
            background: #FFFFFF;
            padding: 28px;
            border-radius: 14px;
            box-shadow: 0 8px 24px rgba(3, 42, 66, 0.08);
        }

        label {
            display: block;
            margin: 18px 0 7px;
            font-weight: 600;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #B3926F;
            border-radius: 8px;
            font: inherit;
            color: #032A42;
            background: #FFFFFF;
        }

        button, .back {
            display: inline-block;
            margin-top: 22px;
            padding: 11px 16px;
            border: none;
            border-radius: 8px;
            font: inherit;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background: #032A42;
            color: #FFFFFF;
        }

        .back {
            background: #B3926F;
            color: #FFFFFF;
            margin-left: 6px;
        }

        .errors {
            background: #FBEAEA;
            color: #8B3030;
            border-radius: 8px;
            padding: 12px 30px;
        }

        .hint {
            color: #526777;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit User</h1>
    <p>Perbarui informasi akun pengguna.</p>

    <div class="form-card">
        @if ($errors->any())
            <ul class="errors">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Nama Lengkap</label>
            <input id="name" name="name" type="text"
                   value="{{ old('name', $user->name) }}"
                   maxlength="255" required>

            <label for="email">Email</label>
            <input id="email" name="email" type="email"
                   value="{{ old('email', $user->email) }}"
                   maxlength="255" required>

            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="admin"
                    @selected(old('role', $user->role) === 'admin')>
                    Admin
                </option>
                <option value="petugas"
                    @selected(old('role', $user->role) === 'petugas')>
                    Petugas
                </option>
            </select>

            <label for="password">Password Baru (Opsional)</label>
            <input id="password" name="password" type="password"
                   minlength="8" autocomplete="new-password">
            <p class="hint">Kosongkan jika tidak ingin mengganti password.</p>

            <label for="password_confirmation">Konfirmasi Password Baru</label>
            <input id="password_confirmation" name="password_confirmation"
                   type="password" minlength="8"
                   autocomplete="new-password">

            <button type="submit">Simpan Perubahan</button>
            <a class="back" href="{{ route('users.index') }}">Kembali</a>
        </form>
    </div>
</div>
</body>
</html>