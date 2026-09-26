<?php if (!empty($_SESSION['message'])): ?>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    showToast(<?= json_encode($_SESSION['message']) ?>, <?= json_encode($_SESSION['message-type']) ?>);
  });
</script>
<?php
  unset($_SESSION['message'], $_SESSION['message-type']);
endif; ?>

<!-- SUPPLIERS -->
<section id="sec-suppliers" class="section active">
  <div class="sec-hdr"><h2>Suppliers</h2><button class="btn btn-primary" onclick="toggleModal('modal-add-supplier')">+ Add Supplier</button></div>

  <div class="card">
    <div class="card-hdr"><h3>All Suppliers</h3><span style="font-size:12px;color:var(--t3);"><?= count($suppliers) ?> registered</span></div>
    <div class="tbl-wrap">
      <table>
        <thead><tr><th>Supplier Name</th><th>Category</th><th>Contact Person</th><th>Phone</th><th>Ingredients Supplied</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
          <?php if (empty($suppliers)): ?>
          <tr><td colspan="7" style="text-align:center;color:var(--t3);padding:24px;">No suppliers yet. Use + Add Supplier to register one.</td></tr>
          <?php endif; ?>

          <?php foreach ($suppliers as $s): ?>
          <tr>
            <td class="tbl-main"><?= htmlspecialchars($s['name']) ?></td>
            <td><?= htmlspecialchars($s['category']) ?></td>
            <td><?= htmlspecialchars($s['contact_person'] ?? '—') ?></td>
            <td><?= htmlspecialchars($s['phone']) ?></td>
            <td style="font-size:13px;color:var(--t3);">Not linked yet</td>
            <td><span class="badge <?= $s['status'] === 'Active' ? 'bg-green' : 'bg-gray' ?>"><?= htmlspecialchars($s['status']) ?></span></td>
            <td>
              <div class="acts">
                <span class="act" onclick="openEditSupplier(this)"
                  data-id="<?= (int) $s['id'] ?>"
                  data-name="<?= htmlspecialchars($s['name']) ?>"
                  data-category="<?= htmlspecialchars($s['category']) ?>"
                  data-contact="<?= htmlspecialchars($s['contact_person'] ?? '') ?>"
                  data-phone="<?= htmlspecialchars($s['phone']) ?>"
                  data-email="<?= htmlspecialchars($s['email'] ?? '') ?>"
                  data-address="<?= htmlspecialchars($s['address'] ?? '') ?>">Edit</span>
                <span class="act del" onclick="openDeleteSupplier(this)"
                  data-id="<?= (int) $s['id'] ?>"
                  data-name="<?= htmlspecialchars($s['name']) ?>">Delete</span>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Add Supplier Modal -->
  <div class="modal-overlay" id="modal-add-supplier" onclick="if(event.target===this)toggleModal('modal-add-supplier')">
    <div class="modal">
      <div class="modal-hdr"><h3>Add Supplier</h3><button class="modal-close" onclick="toggleModal('modal-add-supplier')">✕</button></div>
      <form action="<?= $baseUrl ?>/supplier/create" method="post">
        <div class="form-grid">
          <div class="form-grp form-full"><label>Supplier Name *</label><input type="text" name="name" maxlength="100" placeholder="e.g. Negombo Sea Foods" required></div>
          <div class="form-grp"><label>Category *</label>
            <select name="category" required>
              <?php foreach ($categories as $c): ?>
              <option value="<?= htmlspecialchars($c) ?>"><?= htmlspecialchars($c) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-grp"><label>Contact Person</label><input type="text" name="contact_person" maxlength="100" placeholder="Contact name"></div>
          <div class="form-grp"><label>Phone *</label><input type="tel" name="phone" maxlength="20" placeholder="07X-XXXXXXX" pattern="0([ \-]?[0-9]){9}" title="10-digit number starting with 0, e.g. 077-1234567" required></div>
          <div class="form-grp"><label>Email</label><input type="email" name="email" maxlength="150" placeholder="supplier@email.lk"></div>
          <div class="form-grp form-full"><label>Address</label><input type="text" name="address" maxlength="255" placeholder="Supplier address"></div>
        </div>
        <div style="display:flex;gap:10px;margin-top:4px;">
          <button type="submit" class="btn btn-primary">Add Supplier</button>
          <button type="button" class="btn btn-outline" onclick="toggleModal('modal-add-supplier')">Cancel</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Edit Supplier Modal (filled by openEditSupplier in procurement.js) -->
  <div class="modal-overlay" id="modal-edit-supplier" onclick="if(event.target===this)toggleModal('modal-edit-supplier')">
    <div class="modal">
      <div class="modal-hdr"><h3>Edit Supplier</h3><button class="modal-close" onclick="toggleModal('modal-edit-supplier')">✕</button></div>
      <form action="<?= $baseUrl ?>/supplier/edit" method="post">
        <input type="hidden" name="id" id="edit-sup-id">
        <div class="form-grid">
          <div class="form-grp form-full"><label>Supplier Name *</label><input type="text" name="name" id="edit-sup-name" maxlength="100" required></div>
          <div class="form-grp"><label>Category *</label>
            <select name="category" id="edit-sup-category" required>
              <?php foreach ($categories as $c): ?>
              <option value="<?= htmlspecialchars($c) ?>"><?= htmlspecialchars($c) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-grp"><label>Contact Person</label><input type="text" name="contact_person" id="edit-sup-contact" maxlength="100"></div>
          <div class="form-grp"><label>Phone *</label><input type="tel" name="phone" id="edit-sup-phone" maxlength="20" pattern="0([ \-]?[0-9]){9}" title="10-digit number starting with 0, e.g. 077-1234567" required></div>
          <div class="form-grp"><label>Email</label><input type="email" name="email" id="edit-sup-email" maxlength="150"></div>
          <div class="form-grp form-full"><label>Address</label><input type="text" name="address" id="edit-sup-address" maxlength="255"></div>
        </div>
        <div style="display:flex;gap:10px;margin-top:4px;">
          <button type="submit" class="btn btn-primary">Save Changes</button>
          <button type="button" class="btn btn-outline" onclick="toggleModal('modal-edit-supplier')">Cancel</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Delete Supplier Modal (filled by openDeleteSupplier in procurement.js) -->
  <div class="modal-overlay" id="modal-delete-supplier" onclick="if(event.target===this)toggleModal('modal-delete-supplier')">
    <div class="modal">
      <div class="modal-hdr"><h3>Delete Supplier</h3><button class="modal-close" onclick="toggleModal('modal-delete-supplier')">✕</button></div>
      <form action="<?= $baseUrl ?>/supplier/delete" method="post">
        <input type="hidden" name="id" id="delete-sup-id">
        <p style="font-size:14px;color:var(--t2);">Delete <b id="delete-sup-name"></b>? This cannot be undone.</p>
        <div style="display:flex;gap:10px;margin-top:16px;">
          <button type="submit" class="btn btn-primary" style="background:var(--danger);">Delete Supplier</button>
          <button type="button" class="btn btn-outline" onclick="toggleModal('modal-delete-supplier')">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</section>
