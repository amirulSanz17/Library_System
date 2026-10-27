<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Anggota | Perpustakaan</title>

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

        .detail-card {
            max-width: 700px;
            margin: 0 auto;
            overflow: hidden;
            background: #fff;
            border: 1px solid #D9C4AA;
            border-radius: 18px;
            box-shadow: 0 15px 40px rgba(3, 42, 66, 0.12);
        }

        .card-header {
            padding: 28px 32px;
            background: var(--prussian);
            color: var(--beige);
            border-bottom: 7px solid var(--lion);
        }

        .card-header h1 {
            margin: 0 0 8px;
            font-size: 27px;
        }

        .card-header p {
            margin: 0;
            color: var(--columbia);
            font-size: 14px;
        }

        .card-body {
            padding: 30px 32px;
        }

        .avatar {
            width: 72px;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            border-radius: 22px;
            background: var(--wheat);
            color: var(--prussian);
            font-size: 32px;
        }

        .detail-row {
            display: grid;
            grid-template-columns: 150px 1fr;
            gap: 16px;
            padding: 17px 0;
            border-bottom: 1px solid #E9DFD2;
        }

        .detail-row:last-of-type {
            border-bottom: none;
        }

        .detail-label {
            color: var(--lion-dark);
            font-size: 14px;
            font-weight: 600;
        }

        .detail-value {
            color: var(--prussian);
            font-size: 15px;
            overflow-wrap: anywhere;
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 28px;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 9px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-primary {
            background: var(--lion);
            color: white;
            border: 1px solid var(--lion);
        }

        .btn-primary:hover {
            background: var(--prussian);
            border-color: var(--prussian);
        }

        .btn-secondary {
            background: var(--columbia);
            color: var(--prussian);
            border: 1px solid var(--columbia);
        }

        .btn-secondary:hover {
            background: var(--wheat);
        }

        @media (max-width: 480px) {
            body {
                padding: 20px 12px;
            }

            .card-header,
            .card-body {
                padding: 24px 20px;
            }

            .card-header h1 {
                font-size: 23px;
            }

            .detail-row {
                grid-template-columns: 1fr;
                gap: 6px;
            }
        }
    </style>
</head>

<body>
    <div class="detail-card">
        <div class="card-header">
            <h1>Detail Anggota</h1>
            <p>Informasi lengkap anggota perpustakaan</p>
        </div>

        <div class="card-body">
            <div class="avatar">👤</div>

            <div class="detail-row">
                <div class="detail-label">Nama Lengkap</div>
                <div class="detail-value">{{ $member->name }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Email</div>
                <div class="detail-value">{{ $member->email ?? '-' }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Nomor Telepon</div>
                <div class="detail-value">{{ $member->phone ?? '-' }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Alamat</div>
                <div class="detail-value">{{ $member->address ?? '-' }}</div>
            </div>

            <div class="actions">
                <a href="{{ route('members.edit', $member) }}" class="btn btn-primary">
                    ✏️ Edit Anggota
                </a>

                <a href="{{ route('members.index') }}" class="btn btn-secondary">
                    ← Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</body>
</html>