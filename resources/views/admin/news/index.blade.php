@extends('layouts.admin')

@section('title', 'Haberler & Duyurular - NAVEXMAR Admin')
@section('header_title', 'Haber & Denizcilik Sirkülerleri')

@section('content')

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <h3 style="font-size: 1.1rem; font-weight: 700; color: var(--adm-text);">Yayınlanan Duyurular</h3>
        <a href="{{ route('admin.news.create') }}" class="btn-submit">
            <i class="fa-solid fa-plus"></i> Yeni Duyuru Ekle
        </a>
    </div>

    <div class="admin-table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Başlık</th>
                    <th>Kategori</th>
                    <th>Yazar</th>
                    <th>Yayın Tarihi</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                @forelse($newsList as $item)
                <tr>
                    <td><strong style="color: var(--adm-text);">{{ $item->title }}</strong></td>
                    <td><span style="background: #EFF6FF; color: var(--adm-primary); border: 1px solid #BFDBFE; padding: 3px 10px; border-radius: 99px; font-weight: 700; font-size: 0.75rem;">{{ $item->category }}</span></td>
                    <td>{{ $item->author }}</td>
                    <td>{{ $item->published_at ? $item->published_at->format('d.m.Y H:i') : $item->created_at->format('d.m.Y H:i') }}</td>
                    <td>
                        @if($item->is_published)
                            <span style="color: #059669; font-weight: 700; background: #ECFDF5; border: 1px solid #A7F3D0; padding: 2px 8px; border-radius: 99px; font-size: 0.76rem;">Yayında</span>
                        @else
                            <span style="color: #D97706; font-weight: 700; background: #FEF3C7; border: 1px solid #FDE68A; padding: 2px 8px; border-radius: 99px; font-size: 0.76rem;">Taslak</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.news.edit', $item->id) }}" class="btn-action btn-edit"><i class="fa-solid fa-pen-to-square"></i> Düzenle</a>
                        <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bu haberi silmek istediğinizden emin misiniz?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-delete"><i class="fa-solid fa-trash"></i> Sil</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: var(--adm-muted); padding: 32px;">Henüz yayınlanmış duyuru bulunmuyor.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px;">
        {{ $newsList->links() }}
    </div>

@endsection
