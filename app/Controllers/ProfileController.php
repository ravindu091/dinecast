<?php
require_once __DIR__ . '/../Models/User.php';

class ProfileController extends Controller {
    public function __construct()
    {
        if(!isset($_SESSION['userId'])){
            header("Location:".BASE_URL .'/');
            exit;
        }   
    }
    
    public function profile() {
        // Fallback to 'store' if session role is not set
        $role = $_SESSION['role'] ?? 'store';
        $userId = $_SESSION['userId'];
        
        $this->renderWithLayout('profile', $role . '/layout', [
            'title' => 'My Profile',
            'pageTitle' => 'My Profile',
            'activePage' => 'profile',
            'userId' => $userId
        ]);
    }

    public function uploadProfilePicture(){
        header('Content-Type: application/json');
        if(!isset($_SESSION['userId'])){
            http_response_code(401);

            echo json_encode([
                'success' => false,
                'message' => 'You must be logged in.'
            ]);
            exit;
        }
        if (!isset($_FILES['profile_picture'])) {
            http_response_code(400);

            echo json_encode([
                'success' => false,
                'message' => 'No profile picture was uploaded.'
            ]);

            exit;
        }

        if($_FILES['profile_picture']['error'] !== UPLOAD_ERR_OK){
            http_response_code(400);

            echo json_encode([
                'success'=> false,
                'message'=> "There was a problem uploading the image."
            ]);

            exit;
        }
        $maxFileSize = 10 * 1024 * 1024;

        if($_FILES['profile_picture']['size'] > $maxFileSize){
            http_response_code(413);

            echo json_encode([
                'success'=>false,
                'message'=>'File size should not excide 10MB'
            ]);

            exit;
        }
        $finfo = new finfo(FILEINFO_MIME_TYPE);

        $mimeType = $finfo->file(
            $_FILES['profile_picture']['tmp_name']
        );

        $allowedTypes = [
            'image/jpeg' => 'jpg',
            'image/png'  => 'png',
            'image/webp' => 'webp'
        ];

        if (!array_key_exists($mimeType, $allowedTypes)) {
            http_response_code(400);

            echo json_encode([
                'success' => false,
                'message' => 'Only JPG, PNG, and WebP images are allowed.'
            ]);

            exit;
        }

        $extension = $allowedTypes[$mimeType];

        $filename =bin2hex(random_bytes(16)). '.'. $extension;

        $uploadDirectory = __DIR__ . '/../../public/uploads/profiles/';

        $targetPath = (string)$uploadDirectory . $filename;

        if (!move_uploaded_file(
            $_FILES['profile_picture']['tmp_name'],
            $targetPath
        )) {
            http_response_code(500);

            echo json_encode([
                'success' => false,
                'message' => 'Failed to save the profile picture.'
            ]);

            exit;
        }

        $databasePath = (string)'uploads/profiles/' . $filename;
        $user = new User();
        $userId = (int) $_SESSION['userId'];
        if (!$user->updateProfilePicture(
            $userId,
            $databasePath
        )) {
            http_response_code(500);

            echo json_encode([
                'success' => false,
                'message' => 'Failed to update profile.'
            ]);

            exit;
        }

        $_SESSION['profile_picture'] = $databasePath;
        echo json_encode([
            'success' => true,
            'message' => 'Profile picture uploaded successfully.',
            'image_url' => BASE_URL . '/' . $databasePath
        ]);
        
        exit;
    }
}