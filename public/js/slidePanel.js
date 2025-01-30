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
                sidePanel.classList.remove("shown");
                closeButton.classList.remove("shown");
                setTimeout(() => {
                    sidePanel.classList.add("hidden");
                    closeButton.classList.add("hidden");
                }, 500);
            });


            // Read more用のタスク
            document.querySelectorAll(".read-more").forEach(function(link) {
                link.addEventListener("click", function() {
                    const fullText = this.getAttribute("data-full");
                    const parent = this.closest(".review-text");

                    parent.innerHTML = fullText + ' <a href="javascript:void(0);" class="read-less text-primary">Read less</a>';

                    parent.querySelector(".read-less").addEventListener("click", function() {
                        parent.innerHTML = fullText.substring(0, 90) + '... <a href="javascript:void(0);" class="read-more text-primary" data-full="' + fullText + '">Read more</a>';
                        attachReadMoreEvent(parent.querySelector(".read-more"));
                    });
                });
            });
        });

        // Read more用のfunction
        function attachReadMoreEvent(element) {
            element.addEventListener("click", function() {
                const fullText = this.getAttribute("data-full");
                const parent = this.closest(".review-text");

                parent.innerHTML = fullText + ' <a href="javascript:void(0);" class="read-less text-primary">Read less</a>';

                parent.querySelector(".read-less").addEventListener("click", function() {
                    parent.innerHTML = fullText.substring(0, 90) + '... <a href="javascript:void(0);" class="read-more text-primary" data-full="' + fullText + '">Read more</a>';
                    attachReadMoreEvent(parent.querySelector(".read-more"));
                });
            });
        }
