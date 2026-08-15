@extends('layouts.admin')

@section('title', 'Mesajlar - NAVEXMAR Admin')
@section('header_title', 'İletişim Mesajları')

@section('content')

    <div class="admin-table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Gönderen</th>
                    <th>E-Posta & Tel</th>
                    <th>Konu</th>
                    <th>Tarih</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $msg)
                <tr>
                    <td><strong style="color:#FFF;">{{ $msg->name }}</strong></td>
                    <td>{{ $msg->email }} <br><span style="font-size:0.8rem; color:var(--admin-muted);">{{ $msg->phone }}</span></td>
                    <td>{{ $msg->subject }}</td>
                    <td>{{ $msg->created_at->format('d.m.Y H:i') }}</td>
                    <td>
                        @if($msg->is_read)
                            <span style="color:var(--admin-muted);">Okundu</span>
                        @else
                            <span style="color:#34D399; font-weight:700;">Okunmadı</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn-action btn-view">Oku</a>
                        <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bu mesajı silmek istediğinizden emin misiniz?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-delete">Sil</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center; color:var(--admin-muted);">Henüz mesaj bulunmuyor.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px;">
        {{ $messages->links() }}
    </div>

@endsection
