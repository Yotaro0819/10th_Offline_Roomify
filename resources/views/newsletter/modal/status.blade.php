<style>
    .modal-body {
        background-color: rgba(255, 255, 255, 0.9);
    }

    .modal-header {
        background-color: rgba(0, 74, 173, 0.1); /* 青色を薄めに */
        border-bottom: 2px solid rgba(0, 74, 173, 0.2); /* 枠線を薄め */
    }

    .modal-title{
        font-weight: bold;
    }

</style>
<div class="modal fade" id="newsletterModal" tabindex="-1" aria-labelledby="newsletterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newsletterModalLabel"><i class="fa-solid fa-envelope-open-text"></i> Newsletter Details</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <p><strong>Date:</strong> <span id="modalDate"></span></p>
                <p><strong>Title:</strong> <span id="modalTitle"></span></p>
                <p><strong>Message:</strong></p>
                <p id="modalMessage"></p>
            </div>
            
        </div>
    </div>
</div>
