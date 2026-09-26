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
        $role = $_SESSION['role'];
        $userId = $_SESSION['userId'];
        
        $user = new User();
        $existingUser = $user->getUserById($userId);
        if(!$existingUser){
            http_response_code(404);
            exit('User profile not found.');
        }
        $username = $existingUser['username'];
        $fullName = $existingUser['full_name'];
        $email = $existingUser['email'];
        $accountCreated =$existingUser['created_at'];
        $loginDate = getDateTime();
        $status = ($existingUser['is_active'] >0) ? "Active" : "Inactive"; 


        $this->renderWithLayout('profile', (string)$role . '/layout', [
            'title' => 'My Profile',
            'pageTitle' => 'My Profile',
            'activePage' => 'profile',
            'userId' => $userId,
            'fullName'=>$fullName,
            'username'=>$username,
            'email'=>$email,
            'role'=>getRole( (string)$role ),
            'status'=> $status,
            'accountCreated'=> $accountCreated,
            'loginDate'=>$loginDate
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

        $uploadDirectory = __DIR__ . '/../../public/assets/uploads/profiles/';

        $targetPath = (string)$uploadDirectory . $filename;

        if (!move_uploaded_file(
            $_FILES['profile_picture']['tmp_name'],
            $targetPath
        )) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Failed to save the profile picture.']);
            exit;
        }

        $databasePath = (string)'assets/uploads/profiles/' . $filename;
        $user = new User();
        $userId = (int) $_SESSION['userId'];

        $existingUser = $user->getUserById($userId);
        $oldPicture = $existingUser['profile_picture'] ?? null;

        if (!$user->updateProfilePicture($userId, $databasePath)) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Failed to update profile.']);
            exit;
        }

        if ($oldPicture && strpos($oldPicture, 'assets/uploads/profiles/') !== false) {
            $oldFilePath = __DIR__ . '/../../public/' . $oldPicture;
            if (file_exists($oldFilePath) && is_file($oldFilePath)) {
                @unlink($oldFilePath);
            }
        }

        $_SESSION['profile_picture'] = $databasePath;
        echo json_encode([
            'success' => true,
            'message' => 'Profile picture uploaded successfully.',
            'image_url' => BASE_URL . '/' . $databasePath
        ]);
        
        exit;
    }

    public function editProfile(array $params = []): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: " . BASE_URL . '/profile');
            exit;
        }

        $userId = (int)$_SESSION['userId'];
        $fullName = trim($_POST['full_name'] ?? '');
        $email = trim($_POST['email'] ?? '');

        if ($fullName === '' || $email === '') {
            header("Location: " . BASE_URL . '/profile?error=missing_fields');
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: " . BASE_URL . '/profile?error=invalid_email');
            exit;
        }

        $user = new User();
        $success = $user->updateUser($userId, $fullName, $email);

        if ($success) {
            $_SESSION['fullName'] = $fullName;
            $_SESSION['email'] = $email;
            header("Location: " . BASE_URL . '/profile?success=profile_updated');
        } else {
            header("Location: " . BASE_URL . '/profile?error=db_failed');
        }
        exit;
    }

    public function changePassword(array $params = []): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: " . BASE_URL . '/profile');
            exit;
        }

        $userId = (int)$_SESSION['userId'];
        $currentPassword = $_POST['current_password'] ?? '';
        $newPassword = $_POST['new_password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        if ($currentPassword === '' || $newPassword === '' || $confirmPassword === '') {
            header("Location: " . BASE_URL . '/profile?error=password_missing');
            exit;
        }

        if ($newPassword !== $confirmPassword) {
            header("Location: " . BASE_URL . '/profile?error=password_mismatch');
            exit;
        }

        $user = new User();
        $existingUser = $user->getUserById($userId);

        if (!password_verify($currentPassword, $existingUser['password_hash'])) {
            header("Location: " . BASE_URL . '/profile?error=password_incorrect');
            exit;
        }

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        if ($user->updatePassword($userId, $hashedPassword)) {
            header("Location: " . BASE_URL . '/profile?success=password_updated');
        } else {
            header("Location: " . BASE_URL . '/profile?error=password_failed');
        }
        exit;
    }
}