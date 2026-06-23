/* ==========================================================================
   Job Hunting Vitals - Landing Page JS (script.js)
   ========================================================================== */

document.addEventListener('DOMContentLoaded', () => {
    const checkoutButton = document.getElementById('checkout-button');

    if (checkoutButton) {
        checkoutButton.addEventListener('click', (event) => {
            // ローディング表示に切り替えてStripe Checkoutへの遷移を促す
            const btnText = checkoutButton.querySelector('.btn-text');
            const btnIcon = checkoutButton.querySelector('.btn-icon');

            // 多重クリック防止と演出
            checkoutButton.classList.add('btn-loading');
            
            if (btnText) {
                btnText.textContent = '決済ページへリダイレクト中...';
            }
            if (btnIcon) {
                // スピナーアイコン風に変更
                btnIcon.textContent = '↻';
            }
        });
    }
});
