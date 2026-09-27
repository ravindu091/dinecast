<?php
//values to put back into a dialog after the server rejected it ($retry is set by the controller)
$old = function (string $mode, string $field) use ($retry): string {
    if ($retry === null || $retry['mode'] !== $mode) {
        return '';
    }
    return htmlspecialchars((string) ($retry['values'][$field] ?? ''));
};
$csrf = htmlspecialchars(csrfToken());
//reset the browser's button look so these buttons match the text links
$actStyle = 'border:0;background:none;padding:0;';
?>
<?php if (!empty($_SESSION['message'])): ?>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    showToast(<?= json_encode($_SESSION['message']) ?>, <?= json_encode($_SESSION['message-type'] ?? 'error') ?>);
  });
</script>
<?php unset($_SESSION['message'], $_SESSION['message-type']); ?>
<?php endif; ?>
<?php if ($retry !== null): ?>
<script>
  //reopen the dialog the user was working in, with what they typed
  document.addEventListener('DOMContentLoaded', function () {
    toggleModal(<?= json_encode($retry['mode'] === 'edit' ? 'modal-edit-menu' : 'modal-add-menu') ?>);
  });
</script>
<?php endif; ?>

<section id="sec-menus" class="section">
  <div class="sec-hdr">
    <h2>Menus</h2>
    <button type="button" class="btn btn-primary" onclick="toggleModal('modal-add-menu')">+ New Menu</button>
  </div>

  <div class="card">
    <div class="card-hdr"><h3>All Menus</h3><span style="font-size:12px;color:var(--t3);"><?= count($menus) ?> <?= count($menus) === 1 ? 'menu' : 'menus' ?> total</span></div>
    <div class="tbl-wrap">
      <table>
        <thead><tr><th>Menu Name</th><th>Type</th><th>Items</th><th>Recipes Complete</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
          <?php if (empty($menus)): ?>
          <tr><td colspan="6" style="text-align:center;color:var(--t3);padding:24px;">No menus yet. Use + New Menu to create one.</td></tr>
          <?php endif; ?>

          <?php foreach ($menus as $m):
            $items = (int) $m['item_count'];
            $withRecipe = (int) $m['recipe_count']; ?>
          <tr>
            <td class="tbl-main"><?= htmlspecialchars($m['name']) ?></td>
            <td style="color:var(--t2);font-size:13px;"><?= htmlspecialchars($m['type']) ?></td>
            <?php if ($items > 0): ?>
            <td><?= $items ?></td>
            <td><span class="badge <?= $withRecipe === $items ? 'bg-green' : 'bg-orange' ?>"><?= $withRecipe ?> / <?= $items ?></span></td>
            <?php else: ?>
            <td style="font-size:13px;color:var(--t3);">Not linked yet</td>
            <td style="font-size:13px;color:var(--t3);">Not linked yet</td>
            <?php endif; ?>
            <td><span class="badge <?= $m['status'] === 'Active' ? 'bg-green' : 'bg-gray' ?>"><?= htmlspecialchars($m['status']) ?></span></td>
            <td>
              <div class="acts">
                <a class="act" href="<?= $baseUrl ?>/chef/recipes">View Recipes</a>
                <button type="button" class="act" style="<?= $actStyle ?>" onclick="openEditMenu(this)"
                  aria-label="Edit <?= htmlspecialchars($m['name']) ?>"
                  data-id="<?= (int) $m['id'] ?>"
                  data-name="<?= htmlspecialchars($m['name']) ?>"
                  data-type="<?= htmlspecialchars($m['type']) ?>"
                  data-status="<?= htmlspecialchars($m['status']) ?>"
                  data-description="<?= htmlspecialchars($m['description'] ?? '') ?>">Edit</button>
                <button type="button" class="act del" style="<?= $actStyle ?>" onclick="openDeleteMenu(this)"
                  aria-label="Delete <?= htmlspecialchars($m['name']) ?>"
                  data-id="<?= (int) $m['id'] ?>"
                  data-name="<?= htmlspecialchars($m['name']) ?>"
                  data-items="<?= $items ?>">Delete</button>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Add Menu Modal -->
  <div class="modal-overlay" id="modal-add-menu" onclick="if(event.target===this)toggleModal('modal-add-menu')">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="add-menu-title">
      <div class="modal-hdr"><h3 id="add-menu-title">Create New Menu</h3><button type="button" class="modal-close" aria-label="Close" onclick="toggleModal('modal-add-menu')">✕</button></div>
      <form action="<?= $baseUrl ?>/chef/menus/create" method="post">
        <input type="hidden" name="csrf_token" value="<?= $csrf ?>">
        <div class="form-grid">
          <div class="form-grp form-full"><label for="add-menu-name">Menu Name *</label>
            <input type="text" name="name" id="add-menu-name" maxlength="150" placeholder="e.g. Wedding Banquet – Chicken" value="<?= $old('add', 'name') ?>" required></div>
          <div class="form-grp"><label for="add-menu-type">Menu Type *</label>
            <select name="type" id="add-menu-type" required>
              <option value="">Choose a type</option>
              <?php foreach ($menuTypes as $t): ?>
              <option value="<?= htmlspecialchars($t) ?>"<?= $old('add', 'type') === htmlspecialchars($t) ? ' selected' : '' ?>><?= htmlspecialchars($t) ?></option>
              <?php endforeach; ?>
            </select></div>
          <div class="form-grp"><label for="add-menu-status">Status *</label>
            <select name="status" id="add-menu-status" required>
              <?php foreach ($menuStatuses as $s): ?>
              <option value="<?= htmlspecialchars($s) ?>"<?= $old('add', 'status') === htmlspecialchars($s) ? ' selected' : '' ?>><?= htmlspecialchars($s) ?></option>
              <?php endforeach; ?>
            </select></div>
          <div class="form-grp form-full"><label for="add-menu-description">Description</label>
            <textarea name="description" id="add-menu-description" maxlength="1000" placeholder="Describe this menu…"><?= $old('add', 'description') ?></textarea></div>
        </div>
        <div style="display:flex;gap:10px;margin-top:4px;">
          <button type="submit" class="btn btn-primary">Create Menu</button>
          <button type="button" class="btn btn-outline" onclick="toggleModal('modal-add-menu')">Cancel</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Edit Menu Modal (filled by openEditMenu in chef.js, or by the server after a rejected save) -->
  <div class="modal-overlay" id="modal-edit-menu" onclick="if(event.target===this)toggleModal('modal-edit-menu')">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="edit-menu-title">
      <div class="modal-hdr"><h3 id="edit-menu-title">Edit Menu</h3><button type="button" class="modal-close" aria-label="Close" onclick="toggleModal('modal-edit-menu')">✕</button></div>
      <form id="edit-menu-form" action="<?= $baseUrl ?>/chef/menus/update/<?= $old('edit', 'id') ?>" method="post">
        <input type="hidden" name="csrf_token" value="<?= $csrf ?>">
        <div class="form-grid">
          <div class="form-grp form-full"><label for="edit-menu-name">Menu Name *</label>
            <input type="text" name="name" id="edit-menu-name" maxlength="150" value="<?= $old('edit', 'name') ?>" required></div>
          <div class="form-grp"><label for="edit-menu-type">Menu Type *</label>
            <select name="type" id="edit-menu-type" required>
              <option value="">Choose a type</option>
              <?php foreach ($menuTypes as $t): ?>
              <option value="<?= htmlspecialchars($t) ?>"<?= $old('edit', 'type') === htmlspecialchars($t) ? ' selected' : '' ?>><?= htmlspecialchars($t) ?></option>
              <?php endforeach; ?>
            </select></div>
          <div class="form-grp"><label for="edit-menu-status">Status *</label>
            <select name="status" id="edit-menu-status" required>
              <?php foreach ($menuStatuses as $s): ?>
              <option value="<?= htmlspecialchars($s) ?>"<?= $old('edit', 'status') === htmlspecialchars($s) ? ' selected' : '' ?>><?= htmlspecialchars($s) ?></option>
              <?php endforeach; ?>
            </select></div>
          <div class="form-grp form-full"><label for="edit-menu-description">Description</label>
            <textarea name="description" id="edit-menu-description" maxlength="1000"><?= $old('edit', 'description') ?></textarea></div>
        </div>
        <div style="display:flex;gap:10px;margin-top:4px;">
          <button type="submit" class="btn btn-primary">Save Changes</button>
          <button type="button" class="btn btn-outline" onclick="toggleModal('modal-edit-menu')">Cancel</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Delete Menu Modal (filled by openDeleteMenu in chef.js) -->
  <div class="modal-overlay" id="modal-delete-menu" onclick="if(event.target===this)toggleModal('modal-delete-menu')">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="delete-menu-title">
      <div class="modal-hdr"><h3 id="delete-menu-title">Delete Menu</h3><button type="button" class="modal-close" aria-label="Close" onclick="toggleModal('modal-delete-menu')">✕</button></div>
      <form id="delete-menu-form" action="<?= $baseUrl ?>/chef/menus/delete/" method="post">
        <input type="hidden" name="csrf_token" value="<?= $csrf ?>">
        <p id="delete-menu-confirm" style="font-size:14px;color:var(--t2);">Delete <b class="delete-menu-name"></b>? This cannot be undone.</p>
        <p id="delete-menu-blocked" style="font-size:14px;color:var(--t2);" hidden><b class="delete-menu-name"></b> has dishes with recipes linked to it, so it can't be deleted. Set it to Inactive instead.</p>
        <div style="display:flex;gap:10px;margin-top:16px;">
          <button type="submit" id="delete-menu-submit" class="btn btn-primary" style="background:var(--danger);">Delete Menu</button>
          <button type="button" id="delete-menu-cancel" class="btn btn-outline" onclick="toggleModal('modal-delete-menu')">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</section>
<script>window.menuUrl = <?= json_encode($baseUrl . '/chef/menus/') ?>;</script>
