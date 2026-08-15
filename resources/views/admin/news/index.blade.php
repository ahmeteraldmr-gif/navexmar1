@extends('layouts.admin')

@section('title', 'Haberler & Duyurular - NAVEXMAR Admin')
@section('header_title', 'Haber & Denizcilik Sirkülerleri')

@section('content')

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <h3 style="font-weight: 700; color: #FFF;">Yayınlanan Duyurular</h3>
        <a href="{{ route('admin.news.create') }}" class="btn-submit" style="text-decoration: none; font-size: 0.9rem;">
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
                @foreach($newsList as $item)
                <tr>
                    <td><strong style="color:#FFF;">{{ $item->title }}</strong></td>
                    <td><span style="background:rgba(0,173,181,0.15); color:var(--admin-accent); padding:4px 10px; border-radius:4px; font-weight:700; font-size:0.75rem;">{{ $item->category }}</span></td>
                    <td>{{ $item->author }}</td>
                    <td>{{ $item->published_at ? $item->published_at->format('d.m.Y H:i') : '' }}</td>
                    <td>
                        @if($item->is_published)
                            <span style="color:#34D399; font-weight:700;">Yayında</span>
                        @else
                            <span style="color:#EF4444; font-weight:700;">Taslak</span>
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
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px;">
        {{ $newsList->links() }}
    </div>

@endsection
