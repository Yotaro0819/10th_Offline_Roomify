 // 星がクリックされた時に選ばれた評価を表示
 const stars = document.querySelectorAll('.star-rating input');
 stars.forEach(star => {
     star.addEventListener('change', () => {
     });
 });

 // 星の評価をリセットする関数
 function resetStars() {
     document.querySelectorAll('.star-rating input').forEach(input => {
         input.checked = false;
     });
 }
