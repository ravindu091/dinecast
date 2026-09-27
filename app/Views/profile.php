<?php
// Variables injected from Controller: $fullName, $username, $role, $email, $status, $accountCreated, $loginDate
$profilePicture = $_SESSION['profile_picture'] ?? null;

// Generate initials
$nameParts = explode(' ', $fullName);
$initials = strtoupper(substr($nameParts[0], 0, 1));
if (count($nameParts) > 1) {
    $initials .= strtoupper(substr($nameParts[1], 0, 1));
}

// Display format
$displayRole = ucwords(str_replace('_', ' ', $role));
?>
<link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/css/profile.css">
<link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/css/popup.css">

<div class="profile-container" data-base-url="<?= BASE_URL ?>">
  
  <div class="profile-header">
    <div class="ph-left">
      <div class="breadcrumbs">Operations / Account / <span>Profile</span></div>
      <h1>Profile</h1>
      <p>Manage your personal information and account settings</p>
    </div>
    <div class="ph-right">
      <button class="btn btn-primary btn-edit" data-popup-target="edit-profile-popup">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
        Edit Profile
      </button>
    </div>
  </div>

  <?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success" style="padding: 1rem; margin-bottom: 1.5rem; border-radius: 8px; background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; display: flex; align-items: center; gap: 0.5rem; font-weight: 500;">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
      <?php
        if ($_GET['success'] === 'password_updated') echo 'Password changed successfully.';
        else echo 'Profile updated successfully.';
      ?>
    </div>
  <?php endif; ?>
  
  <?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger" style="padding: 1rem; margin-bottom: 1.5rem; border-radius: 8px; background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; display: flex; align-items: center; gap: 0.5rem; font-weight: 500;">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
      <?php
        $err = $_GET['error'];
        if ($err === 'password_incorrect') echo 'The current password you entered is incorrect.';
        elseif ($err === 'password_mismatch') echo 'New passwords do not match.';
        elseif ($err === 'invalid_email') echo 'Please enter a valid email address.';
        else echo 'An error occurred while updating your profile.';
      ?>
    </div>
  <?php endif; ?>

  <div class="profile-tabs">
    <div class="pt-tab active">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
      User Info
    </div>
    <div class="pt-tab">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
      Security
    </div>
  </div>

  <div class="profile-content">
    
    <div id="tab-user-info" class="tab-pane" style="display: block;">
      <div class="profile-top-grid">
      
      <!-- Left Column: Avatar Card -->
      <div class="card avatar-card">
        <div class="ac-top-bg"></div>
        <div class="ac-avatar">
          <div class="ac-circle">
            <?php if($profilePicture) :?>
                <img src="<?=  htmlspecialchars($profilePicture) ?>" alt="profile">

            <?php else: ?>
                <?= htmlspecialchars($initials) ?>
            <?php endif; ?>
          </div>
          <button
            type="button"
            class="ac-cam-icon"
            aria-label="Change profile picture"
          >
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
          </button>
        </div>
        <input
            type="file"
            id="profile-upload"
            accept="image/jpeg, image/png, image/webp"
            style="display: none;"
        >
        <h2><?= htmlspecialchars($fullName) ?></h2>
        <p class="ac-handle">@<?= htmlspecialchars($username) ?></p>
        
        <div class="ac-badges">
          <span class="badge bg-gray">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 4px;"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <?= htmlspecialchars($role) ?>
          </span>
          <span class="badge bg-green">
            <span class="p-dot"></span> <?= htmlspecialchars($status) ?>
          </span>
        </div>
        
        <div class="ac-footer">
          <span>Store Access</span>
          <strong>Main Facility #11</strong>
        </div>
      </div>

      <!-- Right Column: Personal Information -->
      <div class="card pi-card">
        <div class="card-hdr" style="margin-bottom: 20px;">
          <div>
            <h3>Personal Information</h3>
            <p style="font-size: 12px; color: var(--store-muted); margin-top: 4px;">Primary contact and personal identifier records</p>
          </div>
          <div class="badge bg-gray" style="font-weight: 500;">Verified Employee</div>
        </div>

        <div class="pi-grid">
          <div class="pi-field">
            <label>FULL NAME</label>
            <div class="pi-val"><?= htmlspecialchars($fullName) ?></div>
          </div>
          
          <div class="pi-field">
            <div class="field-hdr">
              <label>USERNAME</label> 
              <span class="f-badge">
                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> Read-only
              </span>
            </div>
            <div class="pi-val"><?= htmlspecialchars($username) ?></div>
          </div>

          <div class="pi-field full">
            <div class="field-hdr">
              <label>EMAIL ADDRESS</label> 
              <span class="f-badge success">
                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> Primary Contact
              </span>
            </div>
            <div class="pi-val"><?= htmlspecialchars($email ?? '') ?></div>
          </div>
        </div>

        <div class="pi-footer">
          <span>Staff ID: DC-EMP-0092</span>
          <span>Department: Store Operations & Stock Control</span>
        </div>
      </div>

    </div>

    <!-- Bottom Full Width Card: Account Information -->
    <div class="card ai-card">
      <div class="card-hdr" style="margin-bottom: 20px;">
        <div>
          <h3>Account Information</h3>
          <p style="font-size: 12px; color: var(--store-muted); margin-top: 4px;">Read-only administrative privileges and audit timestamps</p>
        </div>
        <div class="badge bg-green">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 4px;"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg> System Managed
        </div>
      </div>

      <div class="ai-grid">
        <div class="ai-col">
          <label>ASSIGNED ROLE</label>
          <strong><?= htmlspecialchars($displayRole) ?></strong>
          <p>Full operational tier privileges</p>
        </div>
        <div class="ai-col">
          <label>ACCOUNT STATUS</label>
          <div style="margin-bottom: 6px;"><span class="badge bg-green"><span class="p-dot"></span> <?= htmlspecialchars($status ?? '') ?></span></div>
          <p>No account restrictions applied</p>
        </div>
        <div class="ai-col">
          <label>ACCOUNT CREATED</label>
          <strong><?= htmlspecialchars(date('d F Y', strtotime($accountCreated ?? 'now'))) ?></strong>
          <p>Enrolled via HQ Onboarding</p>
        </div>
        <div class="ai-col">
          <label>LAST LOGIN</label>
          <strong><?= htmlspecialchars($loginDate ?? '') ?></strong>
          <p class="mono">192.168.1.104 (Store POS-01)</p>
        </div>
      </div>

      <div class="info-alert">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
        <span>Roles, warehouse assignment, and administrative access permissions are centrally managed by System Administration. Contact IT support for access adjustment requests.</span>
      </div>
    </div>

  </div>
</div>

    </div> <!-- end tab-user-info -->

    <!-- Security Tab Content -->
    <div id="tab-security" class="tab-pane" style="display: none;">
      <div class="card" style="padding: 24px;">
        <div class="card-hdr" style="margin-bottom: 24px; padding-bottom: 16px; border-bottom: 1px solid var(--border);">
          <div>
            <h3 style="margin: 0;">Change Password</h3>
            <p style="font-size: 13px; color: var(--store-muted); margin-top: 6px;">Ensure your account is using a long, random password to stay secure.</p>
          </div>
        </div>
        
        <form action="<?= BASE_URL ?>/profile/password" method="POST" style="max-width: 480px;">
          <div class="pm-field" style="margin-bottom: 16px;">
            <label class="pm-label" style="display: block; font-size: 14px; font-weight: 600; margin-bottom: 6px;">Current Password <span class="pm-required" style="color: red;">*</span></label>
            <input type="password" name="current_password" class="pm-input" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;" required>
          </div>
          
          <div class="pm-field" style="margin-bottom: 16px;">
            <label class="pm-label" style="display: block; font-size: 14px; font-weight: 600; margin-bottom: 6px;">New Password <span class="pm-required" style="color: red;">*</span></label>
            <input type="password" name="new_password" class="pm-input" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;" required minlength="8">
          </div>
          
          <div class="pm-field" style="margin-bottom: 24px;">
            <label class="pm-label" style="display: block; font-size: 14px; font-weight: 600; margin-bottom: 6px;">Confirm New Password <span class="pm-required" style="color: red;">*</span></label>
            <input type="password" name="confirm_password" class="pm-input" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;" required minlength="8">
          </div>
          
          <button type="submit" class="btn btn-primary" style="padding: 10px 20px; font-weight: 600; cursor: pointer;">Update Password</button>
        </form>
      </div>
    </div> <!-- end tab-security -->

<!-- Edit Profile Popup -->
<div class="pm-overlay" id="edit-profile-popup">
  <div class="pm-modal pm-modal--sm">
    <div class="pm-header">
      <div class="pm-header-left">
        <div class="pm-icon">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
        </div>
        <div>
          <h3 class="pm-title">Edit Profile</h3>
          <p class="pm-subtitle">Update your personal information</p>
        </div>
      </div>
      <button type="button" class="pm-close" data-popup-close>&times;</button>
    </div>
    
    <div class="pm-body">
      <form id="edit-profile-form" action="<?= BASE_URL ?>/profile/edit" method="POST">
        <div class="pm-field" style="margin-bottom: 1rem;">
          <label class="pm-label">Full Name <span class="pm-required">*</span></label>
          <input type="text" name="full_name" class="pm-input" value="<?= htmlspecialchars($fullName ?? '') ?>" required>
        </div>
        
        <div class="pm-field" style="margin-bottom: 1rem;">
          <label class="pm-label">Username</label>
          <input type="text" class="pm-input" value="<?= htmlspecialchars($username ?? '') ?>" disabled style="background: #f8fafc; cursor: not-allowed;">
          <span class="pm-optional">Usernames cannot be changed</span>
        </div>
        
        <div class="pm-field">
          <label class="pm-label">Email Address <span class="pm-required">*</span></label>
          <input type="email" name="email" class="pm-input" value="<?= htmlspecialchars($email ?? '') ?>" required>
        </div>
      </form>
    </div>
    
    <div class="pm-footer pm-footer--end">
      <button type="button" class="pm-btn pm-btn--cancel" data-popup-close>Cancel</button>
      <button type="submit" form="edit-profile-form" class="pm-btn pm-btn--confirm">Save Changes</button>
    </div>
  </div>
</div>

<script src="<?= BASE_URL ?>/public/assets/js/profile.js"></script>
