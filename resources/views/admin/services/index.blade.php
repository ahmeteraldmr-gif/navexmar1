@extends('layouts.admin')

@section('title', 'Hizmet Yönetimi - NAVEXMAR Admin')
@section('header_title', 'Hizmet Yönetimi')

@section('content')

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <h3 style="font-weight: 700; color: #FFF;">Tanımlı Acentelik Hizmetleri</h3>
        <a href="{{ route('admin.services.create') }}" class="btn-submit" style="text-decoration: none; font-size: 0.9rem;">
            <i class="fa-solid fa-plus"></i> Yeni Hizmet Ekle
        </a>
    </div>

    <div class="admin-table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Sıra</th>
                    <th>Icon & Görsel</th>
                    <th>Hizmet Başlığı</th>
                    <th>Özet</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td>{{ $service->sort_order }}</td>
                    <td>
                        <i class="fa-solid {{ $service->icon }}" style="font-size: 1.4rem; color: var(--admin-accent); margin-right: 8px;"></i>
                        @if($service->image)
                            <img src="{{ $service->image }}" style="width: 40px; height: 30px; object-fit: cover; border-radius: 4px; vertical-align: middle;">
                        @endif
                    </td>
                    <td><strong style="color: #FFF;">{{ $service->title }}</strong></td>
                    <td>{{ Str::limit($service->summary, 60) }}</td>
                    <td>
                        @if($service->is_active)
                            <span style="color: #34D399; font-weight: 700;">Yayında</span>
                        @else
                            <span style="color: #EF4444; font-weight: 700;">Pasif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.services.edit', $service->id) }}" class="btn-action btn-edit"><i class="fa-solid fa-pen-to-square"></i> Düzenle</a>
                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bu hizmeti silmek istediğinizden emin misiniz?');">
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
        {{ $services->links() }}
    </div>

@endsection
