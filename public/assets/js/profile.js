document.addEventListener('DOMContentLoaded', () => {
    // Tab switching logic for profile
    const tabs = document.querySelectorAll('.pt-tab');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            
            // In a real app, this would also toggle visibility of .profile-content sections
            if(tab.textContent.includes('Security')) {
                // mock behavior for UI demo
                console.log('Switched to Security Tab');
            } else {
                console.log('Switched to User Info Tab');
            }
        });
    });

    const editBtn = document.querySelector('.btn-edit');
    if (editBtn) {
        editBtn.addEventListener('click', () => {
            alert('Edit Profile functionality would open here.');
        });
    }


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
