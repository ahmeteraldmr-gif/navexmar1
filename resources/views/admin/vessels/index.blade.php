@extends('layouts.admin')

@section('title', 'Filo Yönetimi - NAVEXMAR Admin')
@section('header_title', 'Gemi / Filo Yönetimi')

@section('content')

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <h3 style="font-size: 1.1rem; font-weight: 700; color: var(--adm-text);">Portföydeki Gemiler</h3>
        <a href="{{ route('admin.vessels.create') }}" class="btn-submit">
            <i class="fa-solid fa-plus"></i> Yeni Gemi Kaydı Ekle
        </a>
    </div>

    <div class="admin-table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Gemi Adı</th>
                    <th>Tipi & Bayrağı</th>
                    <th>IMO No</th>
                    <th>GRT</th>
                    <th>Operasyon</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vessels as $vessel)
                <tr>
                    <td><strong style="color: var(--adm-text); font-weight: 700;">{{ $vessel->name }}</strong></td>
                    <td>{{ $vessel->type ?? $vessel->vessel_type }} <br><span style="font-size:0.78rem; color: var(--adm-muted);">{{ $vessel->flag }}</span></td>
                    <td>{{ $vessel->imo_number }}</td>
                    <td>{{ number_format($vessel->grt) }}</td>
                    <td>{{ $vessel->operation_type }}</td>
                    <td><span style="color: var(--adm-primary); font-weight: 700; font-size: 0.82rem;">{{ $vessel->status }}</span></td>
                    <td>
                        <a href="{{ route('admin.vessels.edit', $vessel->id) }}" class="btn-action btn-edit"><i class="fa-solid fa-pen-to-square"></i> Düzenle</a>
                        <form action="{{ route('admin.vessels.destroy', $vessel->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bu gemiyi silmek istiyor musunuz?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-delete"><i class="fa-solid fa-trash"></i> Sil</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; color: var(--adm-muted); padding: 32px;">Henüz kayıtlı gemi bulunmuyor.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px;">
        {{ $vessels->links() }}
    </div>

@endsection
