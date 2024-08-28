<!DOCTYPE html>
<html lang="en">

<!-- ヘッド -->
<x-Head />

<body>
    <!-- ヘッダー -->
    <x-Header />

    <!-- 子要素 -->
    <div class="container">
        {{ $slot }}
    </div>

    <!-- フッター -->
    <x-Footer />
</body>

</html>