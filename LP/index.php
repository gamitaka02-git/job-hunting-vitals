<?php
require_once __DIR__ . '/admin/config.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Hunting Vitals - AIで就活のボトルネックを分析</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
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
                <div class="hero-badge">Beta Test Edition</div>
                <h1 class="hero-title">就活のボトルネックを<br><span class="highlight-text">AIが可視化する</span></h1>
                <p class="hero-description">
                    あなたの応募状況、書類選考、面接データを蓄積し、Gemini APIが「今、どこで就活が停滞しているか」を分析。次に取るべきアクションを具体的に提示します。
                </p>
                <div class="hero-cta">
                    <a href="checkout.php" class="btn-primary" id="checkout-button">
                        <span class="btn-text">ツールの購入（Stripe決済テスト）</span>
                        <span class="btn-icon">→</span>
                    </a>
                    <p class="cta-note">※テスト環境のため、Stripeのテスト用カード情報をご利用ください。</p>
                </div>
            </div>
        </section>

        <section class="features">
            <div class="container">
                <h2 class="section-title">主な機能</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">🔍</div>
                        <h3 class="feature-title">ボトルネック自動検出</h3>
                        <p class="feature-desc">保存求人から応募、面接、内定までの移行率を算出し、数値的に弱点を特定します。</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🤖</div>
                        <h3 class="feature-title">Gemini AI による改善提案</h3>
                        <p class="feature-desc">蓄積データをもとに、Geminiが就活状況に合わせた実践的な対策アドバイスを生成します。</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🔑</div>
                        <h3 class="feature-title">即時ライセンス認証</h3>
                        <p class="feature-desc">Stripe決済後、Webhook連携により即座にライセンスキーが発行され、メールで届きます。</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2026 Job Hunting Vitals. All rights reserved.</p>
    </footer>

    <script src="assets/script.js"></script>
</body>
</html>
