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
$menuItemsByMenu = $menuItemsByMenu ?? [];
$retryItems = $retry['values']['new_items'] ?? [];
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

<section id="sec-menus" class="section active">
    
    <div class="menu-mgmt-header">
        <div class="menu-mgmt-title">
            <h2>Menu Management</h2>
            <p>Manage catering menus, banquet packages, and the dishes included in each menu.</p>
        </div>
        <button class="btn-create-menu" onclick="toggleModal('modal-add-menu')">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
            Create Menu
        </button>
    </div>

    <div class="filters-row">
        <div class="search-box">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="text" placeholder="Search menus by name, category,">
        </div>
        <select class="filter-select">
            <option>All Categories (Wedding, Corporate, Social, Banquet)</option>
        </select>
        <select class="filter-select">
            <option>All Statuses (Active, Draft, Archived)</option>
        </select>
        <select class="filter-select">
            <option>Sort: Recently Updated</option>
        </select>
    </div>

    <div class="menu-grid">
        <?php if (empty($menus)): ?>
            <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: var(--t3);">
                No menus yet. Use "Create Menu" to create one.
            </div>
        <?php endif; ?>

        <?php foreach ($menus as $m):
            $items = (int) $m['item_count'];
            $withRecipe = (int) $m['recipe_count']; 
            
            // Generate a simple class based on type string (e.g. Wedding -> type-wedding)
            $typeClass = 'type-' . strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $m['type']));
            $statusClass = 'status-' . strtolower($m['status']);
        ?>
        <div class="menu-card">
            <div class="mc-header">
                <div class="mc-tags">
                    <span class="mc-type <?= $typeClass ?>"><?= htmlspecialchars($m['type']) ?></span>
                    <span class="mc-status <?= $statusClass ?>">● <?= htmlspecialchars($m['status']) ?></span>
                </div>
                <div class="mc-options">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                </div>
            </div>
            <div class="mc-title"><?= htmlspecialchars($m['name']) ?></div>
            <div class="mc-desc"><?= htmlspecialchars($m['description'] ?: 'No description provided.') ?></div>
            <div class="mc-metrics">
                <div class="metric-box">
                    <div class="metric-lbl">DISHES</div>
                    <div class="metric-val"><?= $items ?> Items</div>
                </div>
                <div class="metric-box">
                    <div class="metric-lbl">RECIPES</div>
                    <div class="metric-val"><?= $withRecipe ?> / <?= $items ?></div>
                </div>
                <div class="metric-box">
                    <div class="metric-lbl">BASE COST</div>
                    <div class="metric-val">N/A</div>
                </div>
            </div>
            
            <div class="mc-actions">
                <a href="<?= $baseUrl ?>/chef/recipes" class="btn-view-menu" style="text-decoration:none;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    View Recipes
                </a>
                <div class="action-links">
                    <button type="button" class="action-link" style="<?= $actStyle ?>cursor:pointer;font-family:inherit;font-size:inherit;" onclick="openEditMenu(this)"
                      data-id="<?= (int) $m['id'] ?>"
                      data-name="<?= htmlspecialchars($m['name']) ?>"
                      data-type="<?= htmlspecialchars($m['type']) ?>"
                      data-status="<?= htmlspecialchars($m['status']) ?>"
                      data-description="<?= htmlspecialchars($m['description'] ?? '') ?>"
                      data-items="<?= htmlspecialchars(json_encode($menuItemsByMenu[(int) $m['id']] ?? [], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT)) ?>">Edit</button>
                    
                    <button type="button" class="action-link" style="<?= $actStyle ?>cursor:pointer;color:var(--danger);" onclick="openDeleteMenu(this)"
                      data-id="<?= (int) $m['id'] ?>"
                      data-name="<?= htmlspecialchars($m['name']) ?>"
                      data-items="<?= $items ?>">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                    </button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
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
        <div style="display:flex;gap:10px;margin-top:16px;">
          <button type="submit" class="btn btn-primary" style="background:#064E3B;border:none;">Create Menu</button>
          <button type="button" class="btn btn-outline" onclick="toggleModal('modal-add-menu')">Cancel</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Edit Menu Modal -->
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
        <div class="form-grp form-full" style="margin-top:16px;">
          <label>Menu Items</label>
          <div id="edit-menu-items" style="display:flex;flex-direction:column;gap:8px;"><?php if ($retry !== null && $retry['mode'] === 'edit'): foreach ($retryItems as $item): ?><div style="display:flex;gap:8px;align-items:center;"><input type="text" name="new_item[]" maxlength="150" placeholder="e.g. Grilled Chicken" value="<?= htmlspecialchars($item) ?>" style="flex:1;"><button type="button" class="remove-menu-item" aria-label="Remove menu item">✕</button></div><?php endforeach; ?><div style="display:flex;gap:8px;align-items:center;"><input type="text" name="new_item[]" maxlength="150" placeholder="e.g. Grilled Chicken" style="flex:1;"><button type="button" class="remove-menu-item" aria-label="Remove menu item">✕</button></div><?php endif; ?></div>
          <button type="button" id="add-menu-item-button" class="btn btn-outline btn-sm" style="margin-top:10px;">+ Add Menu Item</button>
        </div>
        <div style="display:flex;gap:10px;margin-top:16px;">
          <button type="submit" class="btn btn-primary" style="background:#064E3B;border:none;">Save Changes</button>
          <button type="button" class="btn btn-outline" onclick="toggleModal('modal-edit-menu')">Cancel</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Delete Menu Modal -->
  <div class="modal-overlay" id="modal-delete-menu" onclick="if(event.target===this)toggleModal('modal-delete-menu')">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="delete-menu-title">
      <div class="modal-hdr"><h3 id="delete-menu-title">Delete Menu</h3><button type="button" class="modal-close" aria-label="Close" onclick="toggleModal('modal-delete-menu')">✕</button></div>
      <form id="delete-menu-form" action="<?= $baseUrl ?>/chef/menus/delete/" method="post">
        <input type="hidden" name="csrf_token" value="<?= $csrf ?>">
        <p id="delete-menu-confirm" style="font-size:14px;color:var(--t2);margin-bottom:16px;">Delete <b class="delete-menu-name"></b>? This cannot be undone.</p>
        <p id="delete-menu-blocked" style="font-size:14px;color:var(--t2);margin-bottom:16px;" hidden><b class="delete-menu-name"></b> has dishes with recipes linked to it, so it can't be deleted. Set it to Inactive instead.</p>
        <div style="display:flex;gap:10px;margin-top:16px;">
          <button type="submit" id="delete-menu-submit" class="btn btn-primary" style="background:var(--danger);border:none;">Delete Menu</button>
          <button type="button" id="delete-menu-cancel" class="btn btn-outline" onclick="toggleModal('modal-delete-menu')">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</section>
<script>window.menuUrl = <?= json_encode($baseUrl . '/chef/menus/') ?>;</script>
