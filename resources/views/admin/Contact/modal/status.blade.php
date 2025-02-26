<div class="modal fade" id="email{{ $contact->id }}" tabindex="-1" aria-labelledby="email{{ $contact->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="email{{ $contact->id }}">mail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('admin.contact.replied', $contact->id )}}" method="post">
                @csrf
                    <div class="mb-3">
                        <label class="form-label"><strong>To:</strong></label>
                        <input type="email" class="form-control" value="{{ $contact->email }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Subject:</strong></label>
                        <input type="text" class="form-control" value="Re: Your Inquiry">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>message:</strong></label>
                        <textarea class="form-control" rows="4" placeholder=""></textarea>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                        <button type="submit" class="btn btn-primary" id="sendDemoEmail">send</button>
                    </div>
            </form>
        </div>
    </div>
</div>
