@if (session()->has('message'))
    <div class="w-25 my-1  flash container position-fixed top-0 end-0 d-flex align-items-center text-light"
        style="background-color:hotpink; transform:translateX(100%);">
        <p>
            {{ session('message') }}
        </p>

    </div>
@endif
<script>
    let flash = document.querySelector(".flash");
    setTimeout(() => {
        flash.style.transition = 'all 1s';
        flash.style.transform = 'translateX(0)';
    }, 500);
    setTimeout(() => {
        flash.style.transition = 'all 1s';
        flash.style.transform = 'translateX(100%)';
    }, 2000);
</script>
