<?php
$fullName = $_SESSION['fullName'] ?? 'Tomus Alva Peterson';
$username = $_SESSION['username'] ?? 'Thomes';
$role = $_SESSION['role'] ?? 'Store Manager';
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
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/profile.css">

<div class="profile-container" data-base-url="<?= BASE_URL ?>">
  
  <div class="profile-header">
    <div class="ph-left">
      <div class="breadcrumbs">Operations / Account / <span>Profile</span></div>
      <h1>Profile</h1>
      <p>Manage your personal information and account settings</p>
    </div>
    <div class="ph-right">
      <button class="btn btn-primary">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
        Edit Profile
      </button>
    </div>
  </div>

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
            <?= htmlspecialchars($displayRole) ?>
          </span>
          <span class="badge bg-green">
            <span class="p-dot"></span> Active
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
            <div class="pi-val"><?= htmlspecialchars($username) ?>@example.com</div>
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
          <div style="margin-bottom: 6px;"><span class="badge bg-green"><span class="p-dot"></span> Active</span></div>
          <p>No account restrictions applied</p>
        </div>
        <div class="ai-col">
          <label>ACCOUNT CREATED</label>
          <strong>15 August 2026</strong>
          <p>Enrolled via HQ Onboarding</p>
        </div>
        <div class="ai-col">
          <label>LAST LOGIN</label>
          <strong><?= date('d F Y, h:i A') ?></strong>
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

<script src="<?= BASE_URL ?>/assets/js/profile.js"></script>
