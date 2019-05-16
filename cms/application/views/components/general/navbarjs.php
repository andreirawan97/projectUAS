<script>
    function goToHome() {
        location.href="loginCMS/goToHome";
    }

    function logOut(){
        localStorage.clear();
        location.href = 'home/goToLoginCMS';
    }

    function goToHistory(){
        location.href = 'home/goToHistory';
    }
</script>