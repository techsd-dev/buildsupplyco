@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert"
        style="position: fixed; top: 20px; right: 20px; width: 250px; padding: 8px 15px; font-size: 14px; z-index: 1050;">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"
            style="padding: 0; margin-left: 10px; font-size: 16px;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert"
        style="position: fixed; top: 20px; right: 20px; width: 250px; padding: 8px 15px; font-size: 14px; z-index: 1050;">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"
            style="padding: 0; margin-left: 10px; font-size: 16px;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<script>
    // Auto-hide flash message after 5 seconds (5000 milliseconds)
    setTimeout(function () {
        $('.alert').fadeOut('slow');
    }, 5000);
</script>