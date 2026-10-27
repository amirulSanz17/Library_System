<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota | Perpustakaan</title>

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
            margin: 0;
            min-height: 100vh;
            padding: 40px 20px;
            font-family: "Segoe UI", Arial, sans-serif;
            color: var(--prussian);
            background:
                radial-gradient(circle at top right, var(--columbia), transparent 35%),
                var(--beige);
        }

        .form-card {
            max-width: 650px;
            margin: 0 auto;
            padding: 35px;
            background: #fff;
            border: 1px solid #D9C4AA;
            border-top: 8px solid var(--lion);
            border-radius: 18px;
            box-shadow: 0 15px 40px rgba(3, 42, 66, 0.12);
        }

        .icon {
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--wheat);
            border-radius: 16px;
            font-size: 28px;
            margin-bottom: 18px;
        }

        h1 {
            margin: 0 0 8px;
            font-size: 28px;
            color: var(--prussian);
        }

        .subtitle {
            margin: 0 0 28px;
            color: var(--lion-dark);
            font-size: 14px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 14px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 14px;
            font-family: inherit;
            font-size: 14px;
            color: var(--prussian);
            background: #FCFAF6;
            border: 1px solid #D9C4AA;
            border-radius: 9px;
            outline: none;
            transition: 0.2s;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        input:focus,
        textarea:focus {
            border-color: var(--lion);
            box-shadow: 0 0 0 3px rgba(179, 146, 111, 0.2);
        }

        .errors {
            background: #F0D8B6;
            border-left: 4px solid var(--lion);
            color: var(--prussian);
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 28px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 9px;
            text-decoration: none;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-primary {
            border: 1px solid var(--lion);
            background: var(--lion);
            color: white;
        }

        .btn-primary:hover {
            background: var(--prussian);
            border-color: var(--prussian);
        }

        .btn-secondary {
            background: var(--columbia);
            border: 1px solid var(--columbia);
            color: var(--prussian);
        }

        .btn-secondary:hover {
            background: var(--wheat);
        }

        @media (max-width: 480px) {
            body {
                padding: 20px 12px;
            }

            .form-card {
                padding: 25px 20px;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="form-card">
        <div class="icon">✏️</div>

        <h1>Edit Anggota</h1>
        <p class="subtitle">
            Perbarui informasi anggota perpustakaan di bawah ini.
        </p>

        @if ($errors->any())
            <div class="errors">
                <strong>Periksa kembali data kamu:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('members.update', $member) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Lengkap *</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $member->name) }}"
                    placeholder="Masukkan nama lengkap"
                    required
                >
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $member->email) }}"
                    placeholder="contoh@email.com"
                >
            </div>

            <div class="form-group">
                <label for="phone">Nomor Telepon</label>
                <input
                    type="text"
                    id="phone"
                    name="phone"
                    value="{{ old('phone', $member->phone) }}"
                    placeholder="Masukkan nomor telepon"
                >
            </div>

            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea
                    id="address"
                    name="address"
                    placeholder="Masukkan alamat anggota"
                >{{ old('address', $member->address) }}</textarea>
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="{{ route('members.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</body>
</html>