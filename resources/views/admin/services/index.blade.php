@extends('layouts.admin')

@section('title', 'Hizmet Yönetimi - NAVEXMAR Admin')
@section('header_title', 'Hizmet Yönetimi')

@section('content')

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <h3 style="font-size: 1.1rem; font-weight: 700; color: var(--adm-text);">Tanımlı Acentelik Hizmetleri</h3>
        <a href="{{ route('admin.services.create') }}" class="btn-submit">
            <i class="fa-solid fa-plus"></i> Yeni Hizmet Ekle
        </a>
    </div>

    <div class="admin-table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Sıra</th>
                    <th>Simge & Görsel</th>
                    <th>Hizmet Başlığı</th>
                    <th>Özet</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                <tr>
                    <td>{{ $service->sort_order ?? $loop->iteration }}</td>
                    <td>
                        <i class="fa-solid {{ $service->icon ?? 'fa-anchor' }}" style="font-size: 1.2rem; color: var(--adm-primary); margin-right: 8px;"></i>
                        @if($service->image_path)
                            <img src="{{ Storage::url($service->image_path) }}" style="width: 40px; height: 30px; object-fit: cover; border-radius: 4px; vertical-align: middle;">
                        @endif
                    </td>
                    <td><strong style="color: var(--adm-text);">{{ $service->title }}</strong></td>
                    <td>{{ Str::limit($service->short_description ?? $service->description, 60) }}</td>
                    <td>
                        @if($service->is_active)
                            <span style="color: #059669; font-weight: 700; background: #ECFDF5; border: 1px solid #A7F3D0; padding: 2px 8px; border-radius: 99px; font-size: 0.76rem;">Yayında</span>
                        @else
                            <span style="color: #DC2626; font-weight: 700; background: #FEF2F2; border: 1px solid #FECACA; padding: 2px 8px; border-radius: 99px; font-size: 0.76rem;">Pasif</span>
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
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: var(--adm-muted); padding: 32px;">Henüz kayıtlı hizmet bulunmuyor.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px;">
        {{ $services->links() }}
    </div>

@endsection
