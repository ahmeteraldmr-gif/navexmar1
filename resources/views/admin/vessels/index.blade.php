@extends('layouts.admin')

@section('title', 'Filo Yönetimi - NAVEXMAR Admin')
@section('header_title', 'Gemi / Filo Yönetimi')

@section('content')

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <h3 style="font-weight: 700; color: #FFF;">Portföydeki Gemiler</h3>
        <a href="{{ route('admin.vessels.create') }}" class="btn-submit" style="text-decoration: none; font-size: 0.9rem;">
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
                @foreach($vessels as $vessel)
                <tr>
                    <td><strong style="color:#FFF;">{{ $vessel->name }}</strong></td>
                    <td>{{ $vessel->vessel_type }} <br><span style="font-size:0.8rem; color:var(--admin-muted);">{{ $vessel->flag }}</span></td>
                    <td>{{ $vessel->imo_number }}</td>
                    <td>{{ number_format($vessel->grt) }}</td>
                    <td>{{ $vessel->operation_type }}</td>
                    <td><span style="color:var(--admin-accent); font-weight:700;">{{ $vessel->status }}</span></td>
                    <td>
                        <a href="{{ route('admin.vessels.edit', $vessel->id) }}" class="btn-action btn-edit"><i class="fa-solid fa-pen-to-square"></i> Düzenle</a>
                        <form action="{{ route('admin.vessels.destroy', $vessel->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bu gemiyi silmek istiyor musunuz?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-delete"><i class="fa-solid fa-trash"></i> Sil</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px;">
        {{ $vessels->links() }}
    </div>

@endsection
