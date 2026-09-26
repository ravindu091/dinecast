document.addEventListener('DOMContentLoaded', () => {
    // Auto-dismiss alerts and clean up URL parameters
    const alerts = document.querySelectorAll('.alert');
    if (alerts.length > 0) {
        setTimeout(() => {
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);

        const url = new URL(window.location);
        url.searchParams.delete('success');
        url.searchParams.delete('error');
        window.history.replaceState({}, document.title, url);
    }

    // Tab switching logic for profile
    const tabs = document.querySelectorAll('.pt-tab');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            
            const userInfoTab = document.getElementById('tab-user-info');
            const securityTab = document.getElementById('tab-security');
            
            if(tab.textContent.includes('Security')) {
                if (userInfoTab) userInfoTab.style.display = 'none';
                if (securityTab) securityTab.style.display = 'block';
            } else {
                if (securityTab) securityTab.style.display = 'none';
                if (userInfoTab) userInfoTab.style.display = 'block';
            }
        });
    });

    


    //profile photo upload

    const profileContainer = document.querySelector('.profile-container');
    const cameraButton = document.querySelector('.ac-cam-icon');
    const fileInput = document.querySelector('#profile-upload');
    const avatarCircle = document.querySelector('.ac-circle');

    if(!profileContainer || !cameraButton || !fileInput || !avatarCircle){
        console.log('Profile photo element not found');
        return;
    }

    const baseUrl = profileContainer.dataset.baseUrl;

    cameraButton.addEventListener("click" ,()=>{
        fileInput.click();
    });

    fileInput.addEventListener('change',()=>{
        const file = fileInput.files[0];

        if(!file){
            return;
        }

        const allowedImageTypes =[
            'image/jpeg',
            'image/jpg',
            'image/webp',
            'image/png'
        ]

        if(!allowedImageTypes.includes(file.type)){
            alert("Please select jpg , jpeg or webp");
            fileInput.value = '';
            return;
        }

        const maxSize = 10 * 1024 * 1024;

        if(file.size > maxSize){
            alert('Please upload file under 10MB')
            fileInput.value = ''
            return
        }
        const formData = new FormData();

        formData.append('profile_picture',file);

        fetch(`${baseUrl}/profile/upload`,{
            method : 'post',
            body : formData
        })
        .then(response => {
            if(!response.ok){
                throw new Error("Upload request failed");
            }
            return response.json();
        })
        .then(data=>{
            if(data.success){
                const img = document.createElement('img');
                img.src = data.image_url;
                img.alt = 'Profile Picture';

                avatarCircle.innerHTML = '';
                avatarCircle.append(img);

            }else{
                alert(data.message || "Failed to upload profile picture");
            }
        })
        .catch(error=>{
            console.error('Error when upload profile picture',error);
            alert('Something went wrong while uploading the profile picture.')
        })
        .finally(()=>{
            fileInput.value = '';
        })
    })
});
