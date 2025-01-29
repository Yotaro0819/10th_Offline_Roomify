document.addEventListener("DOMContentLoaded", () => {
  const sidePanel = document.getElementById("sidePanel");
  const openButton = document.getElementById("openButton");
  const closeButton = document.getElementById("closeButton");

  // ボタンをクリックしてパネルを表示
  openButton.addEventListener("click", () => {
    sidePanel.classList.remove("hidden"); // 非表示解除
    sidePanel.classList.add("shown"); // スライドイン
  });

  // パネル内のボタンをクリックして非表示
  closeButton.addEventListener("click", () => {
    sidePanel.classList.remove("shown"); // スライドアウト
    setTimeout(() => {
      sidePanel.classList.add("hidden"); // 完全に画面外になった後で非表示
    }, 300); // CSSのtransition時間に合わせる
  });
});




