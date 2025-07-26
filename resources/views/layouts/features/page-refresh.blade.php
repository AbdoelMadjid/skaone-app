<style>
    .spin-refresh {
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        100% {
            transform: rotate(360deg);
        }
    }
</style>

<div class="ms-1 header-item d-none d-sm-flex">
    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" onclick="startRefresh()">
        <i id="refreshIcon" class="ri-refresh-line fs-22"></i>
    </button>
</div>

<script>
    function startRefresh() {
        const icon = document.getElementById('refreshIcon');
        if (icon) icon.classList.add('spin-refresh');
        localStorage.setItem('refreshing', 'true');
        window.location.reload();
    }

    window.addEventListener('DOMContentLoaded', function() {
        if (localStorage.getItem('refreshing') === 'true') {
            localStorage.removeItem('refreshing');
            const icon = document.getElementById('refreshIcon');
            if (icon) icon.classList.remove('spin-refresh');
        }
    });
</script>
