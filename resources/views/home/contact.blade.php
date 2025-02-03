<x-web-layout>
    <!-- contact section start -->
    <div class="contact_section layout_padding">
        <div class="container">
            <h1 class="contact_taital">Request A Call Back</h1>
            <form method="POST" action="{{ route('call-request.store') }}">
                @csrf
                <div class="email_text">
                    <div class="form-group">
                        <input type="text" class="email-bt" placeholder="Name" name="name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="email-bt" placeholder="Phone Number" name="phone_number" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="email-bt" placeholder="Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <textarea class="massage-bt" placeholder="Message" rows="5" name="message"></textarea>
                    </div>
                    <div class="send_btn">
                        <button type="submit">SEND</button>
                    </div>
                </div>
            </form>
            @if(session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
        </div>
    </div>
    <!-- contact section end -->
</x-web-layout>
