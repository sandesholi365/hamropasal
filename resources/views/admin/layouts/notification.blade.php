@if(session('success'))
<div  class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
        </div>
        <div  class="ms-3">
            <h6 class="mb-0 text-white">Success</h6>
            <div class="text-white">{{session('success')}}</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif (session('error'))
<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div  class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
        </div>
        <div class="ms-3">
            <h6 class="mb-0 text-white">Failed</h6>
            <div class="text-white">{{session('error')}}</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<script>
window.setTimeout(function() {  
    $(".alert").slideUp(500, function() {
        $(this).remove();
    });
}, 7000);
</script>