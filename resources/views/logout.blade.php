<style>
    .logout-btn {
        background-color: #dc3545;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        margin: 10px;
    }
</style>

<div class="container">
    <div style="text-align: right">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn" onclick="submitForm()">Logout</button>
        </form>
    </div>
</div>


<script>
    function submitForm() {
        document.getElementById('logoutForm').submit();
    }
</script>