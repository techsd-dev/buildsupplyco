<style>
    .alert-top-right {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
    }
</style>
@if(session('success'))
    <div class="alert alert-success alert-top-right" id="success-alert">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-top-right" id="error-alert">
        {{ session('error') }}
    </div>
@endif
<script>
    // Auto-dismiss success message after 3 seconds
    setTimeout(function() {
        $('#success-alert').fadeOut('slow');
    }, 3000); // 3000 milliseconds = 3 seconds

    // Auto-dismiss error message after 3 seconds
    setTimeout(function() {
        $('#error-alert').fadeOut('slow');
    }, 3000); // 3000 milliseconds = 3 seconds
</script>
