      <section id="sec-users" class="section active">
        <div class="sec-hdr"><h2>User Management</h2><button class="btn btn-primary" id="btn-add-user" onclick="toggleModal('modal-add-user')">+ Add User</button></div>

        <!-- DISPLAY USERS -->
        <div class="card">
          <div class="card-hdr"><h3>All System Users</h3><span style="font-size:12px;color:var(--t3);"><?= count($users ?? []) ?> users total</span></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Name</th><th>Username</th><th>Role</th><th>Status</th><th>Last Login</th><th>Actions</th></tr></thead>
              <tbody>
              <?php foreach ($users as $user): ?>
                <tr>
                  <td class="tbl-main"><?= htmlspecialchars($user['full_name'], ENT_QUOTES, 'UTF-8') ?></td>
                  <td style="color:var(--t2);font-size:13px;"><?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?></td>
                  <td><?= htmlspecialchars($user['role'], ENT_QUOTES, 'UTF-8') ?></td>
                  <td><?= $user['is_active'] ? 'Active' : 'Inactive' ?></td>
                  <td style="font-size:12px;color:var(--t3);"><?= htmlspecialchars($user['last_login'] ?? 'Never', ENT_QUOTES, 'UTF-8') ?></td>
                  <td>
                    <div class="acts">
                      <button
                        type="button"
                        class="act update-user-btn"
                        onclick="openUpdateUser(this)"
                        data-id="<?= (int) $user['id'] ?>"
                        data-full-name="<?= htmlspecialchars($user['full_name'], ENT_QUOTES, 'UTF-8') ?>"
                        data-username="<?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?>"
                        data-email="<?= htmlspecialchars($user['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                        data-role="<?= htmlspecialchars($user['role'], ENT_QUOTES, 'UTF-8') ?>"
                      >Update</button>
                      <form method="POST" action="<?= $baseUrl ?>/admin/users/delete" onsubmit="return confirm('Delete this user?');" style="display:inline;">
                        <input type="hidden" name="id" value="<?= (int) $user['id'] ?>">
                        <button type="submit" class="act del">Delete</button>
                      </form>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Add User Modal -->
        <div class="modal-overlay" id="modal-add-user" onclick="if(event.target===this)toggleModal('modal-add-user')">
          <div class="modal">
            <div class="modal-hdr">
              <h3>Add New User</h3>
              <button class="modal-close" onclick="toggleModal('modal-add-user')">✕</button>
            </div>

            <!-- ADD_NEW_USER FORM -->
            <form method="POST" action="<?= $baseUrl ?>/admin/users/create">
              <div class="form-grid">
                <div class="form-grp"><label>Full Name *</label><input type="text" name="full_name" placeholder="e.g. Kasun Perera" required></div>
                <div class="form-grp"><label>Username *</label><input type="text" name="username" placeholder="e.g. kasun_p" required minlength="3" maxlength="50" pattern="[A-Za-z0-9_]+" title="Use 3-50 letters, numbers, or underscores without spaces."></div>
                <div class="form-grp form-full"><label>Email Address</label><input type="email" name="email" placeholder="e.g. kasun@dinecast.lk"></div>
                <div class="form-grp">
                  <label>Role *</label>
                  <select name="role" required>
                    <option value="">Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="chef">Chef</option>
                    <option value="kitchen">Kitchen Manager</option>
                    <option value="store">Store Manager</option>
                    <option value="procurement">Procurement Manager</option>
                    <option value="ceo">CEO</option>
                </select>
                </div>
                <div class="form-grp"><label>Password *</label><input type="password" name="password" placeholder="Min. 8 characters" minlength="8" required></div>
                <div class="form-grp"><label>Confirm Password *</label><input type="password" placeholder="Repeat password" required></div>
              </div>
              <div style="display:flex;gap:10px;margin-top:4px;">
                <button type="submit" class="btn btn-primary">Create User</button>
                <button type="button" class="btn btn-outline" onclick="toggleModal('modal-add-user')">Cancel</button>
              </div>
            </form>
          </div>
        </div>

        <!-- Update User Modal -->
        <div class="modal-overlay" id="modal-update-user" onclick="if(event.target===this)toggleModal('modal-update-user')">
          <div class="modal">
            <div class="modal-hdr">
              <h3>Update User</h3>
              <button class="modal-close" type="button" onclick="toggleModal('modal-update-user')">✕</button>
            </div>
            <form method="POST" action="<?= $baseUrl ?>/admin/users/update">
              <input type="hidden" name="id" id="update-user-id">
              <div class="form-grid">
                <div class="form-grp"><label>Full Name *</label><input type="text" name="full_name" id="update-full-name" required></div>
                <div class="form-grp"><label>Username *</label><input type="text" name="username" id="update-username" required minlength="3" maxlength="50" pattern="[A-Za-z0-9_]+" title="Use 3-50 letters, numbers, or underscores without spaces."></div>
                <div class="form-grp form-full"><label>Email Address</label><input type="email" name="email" id="update-email"></div>
                <div class="form-grp"><label>Role *</label>
                  <select name="role" id="update-role" required>
                    <option value="admin">Admin</option>
                    <option value="chef">Chef</option>
                    <option value="kitchen">Kitchen Manager</option>
                    <option value="store">Store Manager</option>
                    <option value="procurement">Procurement Manager</option>
                    <option value="ceo">CEO</option>
                  </select>
                </div>
              </div>
              <div style="display:flex;gap:10px;margin-top:4px;">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <button type="button" class="btn btn-outline" onclick="toggleModal('modal-update-user')">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </section>
