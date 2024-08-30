<!DOCTYPE html>
<html lang="en">

<!-- ヘッド -->
<x-head :title="$title" />

<body>

    <!-- ヘッダー -->
    @guest
        <!-- ゲスト用 -->
        <x-GuestHeader />
    @else
        <!-- ユーザー用 -->
        <x-LoginnedUserHeader />
    @endguest


    <!-- 子要素 -->
    {{ $slot }}


    <!-- フッター -->
    <x-Footer />

</body>
</html>