<!DOCTYPE html>
<html lang="en">

<!-- ヘッド -->
<x-head :title="$title" />

<body>
    <!-- ヘッダー -->
    <x-Header />

    <!-- 子要素 -->
    {{ $slot }}

    <!-- フッター -->
    <x-Footer />

</body>

</html>