<?php
/**
 * ============================================================
 * データベース・テーブルセットアップスクリプト
 * ============================================================
 * 役割: LP側のMySQL接続確認と、licensesテーブルの自動作成を行います。
 *       セットアップ完了後は、セキュリティのためこのファイルを削除してください。
 * ============================================================
 */
require_once __DIR__ . '/config.php';

$status_message = '';
$status_class = '';
$table_status = '';
$error_detail = '';

try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    
    $status_message = "MySQL接続成功";
    $status_class = "success";
    
    // テーブル作成SQL
    $sql = "CREATE TABLE IF NOT EXISTS licenses (
        id INT AUTO_INCREMENT PRIMARY KEY,
        license_key VARCHAR(255) UNIQUE NOT NULL,
        user_email VARCHAR(255) NOT NULL,
        status VARCHAR(50) DEFAULT 'active',
        created_at DATETIME NOT NULL,
        last_verified_at DATETIME DEFAULT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    
    $pdo->exec($sql);
    $table_status = "「licenses」テーブルは正常に作成されたか、既に存在しています。決済テストが可能な状態です。";
    
} catch (PDOException $e) {
    $status_message = "データベース接続失敗";
    $status_class = "error";
    $table_status = "MySQLデータベースへの接続、またはテーブル作成に失敗しました。config.php の設定内容を確認してください。";
    $error_detail = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DBセットアップ - Job Hunting Vitals</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <header class="header">
        <div class="header-container">
            <div class="logo">Job Hunting Vitals</div>
        </div>
    </header>

    <main class="main">
        <section class="hero">
            <div class="hero-bg-gradient"></div>
            <div class="hero-container">
                <div class="hero-badge">DB Setup Tool</div>
                <h1 class="hero-title"><span class="highlight-text"><?= htmlspecialchars($status_message) ?></span></h1>
                
                <div class="feature-card">
                    <h3 class="feature-title">セットアップ結果</h3>
                    <p class="feature-desc"><?= htmlspecialchars($table_status) ?></p>
                    <?php if ($error_detail): ?>
                        <br>
                        <p class="feature-desc"><strong>エラー詳細:</strong></p>
                        <p class="feature-desc"><?= htmlspecialchars($error_detail) ?></p>
                    <?php endif; ?>
                </div>

                <div class="hero-cta">
                    <a href="../index.php" class="btn-primary">
                        <span class="btn-text">LPトップへ戻る</span>
                        <span class="btn-icon">→</span>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2026 Job Hunting Vitals. All rights reserved.</p>
    </footer>
</body>
</html>
