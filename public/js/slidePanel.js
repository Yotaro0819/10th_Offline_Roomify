document.addEventListener("DOMContentLoaded", () => {
    const sidePanel = document.getElementById("sidePanel");
    const openButton = document.getElementById("openButton");
    const closeButton = document.getElementById("closeButton");

  // ボタンをクリックしてパネルを表示
    openButton.addEventListener("click", () => {
        sidePanel.classList.remove("hidden"); // 非表示解除
        closeButton.classList.remove("hidden"); // 非表示解除
        sidePanel.classList.add("shown"); // スライドイン
        closeButton.classList.add("shown");
    });

  // パネル内のボタンをクリックして非表示
        closeButton.addEventListener("click", () => {
        sidePanel.classList.remove("shown"); // スライドアウト
        closeButton.classList.remove("shown");
        setTimeout(() => {
            sidePanel.classList.add("hidden");
            closeButton.classList.add("hidden");
        }, 300); // CSSのtransition時間に合わせる
    });
});




