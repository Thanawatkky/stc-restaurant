function formSubmit(e) {
    e.preventDefault();
    const xhr = new XMLHttpRequest();
    const formData = new FormData(e.target);
    xhr.open(e.target.getAttribute('method'),e.target.getAttribute('action'),true);
    xhr.setRequestHeader("Accept",'application/json');
    xhr.onload = () => {
        if(xhr.status === 200) {
            let data = JSON.parse(xhr.responseText);
            if(data.status) {
                alert(data.msg);
                if(data.role === 1) {
                    window.location.replace('admin/index.php');
                }else if(data.location) {
                    window.location.replace(data.location);
                }else if(data.role == 2) {
                    window.location.replace('index.php');
                }else {
                    window.location.reload();
                }

                
            }else{
                alert(data.msg);
                window.location.reload();
                
            }
        }else{
            console.log(xhr.responseText);
        }
    }
    xhr.onerror = () => {
        console.log(xhr.status);
        
    }
    xhr.send(formData);
}