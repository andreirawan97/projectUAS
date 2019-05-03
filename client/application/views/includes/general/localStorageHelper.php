<script>
  const lsName = 'tokoDoto';

  function checkLocalStorage(){
    let ls = localStorage.getItem(lsName);
    
    return ls ? true : false;
  }

  function initializeLocalStorage(){
    let initialData = {
      isLogin: false,
      userData: {
        userID: '',
      }
    }

    localStorage.setItem(lsName, JSON.stringify(initialData));
  }

  function setLocalStorage(objectData){
    localStorage.setItem(lsName, JSON.stringify(objectData));
  }

  function removeLocalStorage(){
    localStorage.removeItem(lsName);
  }

  function getLocalStorage(){
    return JSON.parse(localStorage.getItem(lsName));
  }
</script>
