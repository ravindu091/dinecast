<section id="sec-events" class="section">
  <div class="sec-hdr">
    <h2>Events</h2>
    <button class="btn btn-primary" onclick="toggleModal('modal-add-event')">+ New Event</button>
  </div>

  <?php if (!empty($dbError)): ?>
    <div style="background:#fef2f2; border:1px solid #f87171; color:#991b1b; padding:12px 16px; border-radius:8px; margin-bottom:18px; font-size:13.5px; line-height:1.5;">
      <strong>⚠️ Database Connection Notice:</strong> Could not connect to the database. Please verify your <code>.env</code> file credentials.<br>
      <small style="color:#b91c1c; font-family:monospace;"><?= htmlspecialchars($dbError) ?></small>
    </div>
  <?php endif; ?>

  <!-- KPI Stats -->
  <div class="stats">
    <div class="stat c-blue">
      <div class="stat-ico">📅</div>
      <div class="stat-val"><?= $stats['total'] ?? 0 ?></div>
      <div class="stat-lbl">Total Events</div>
    </div>
    <div class="stat c-green">
      <div class="stat-ico">✅</div>
      <div class="stat-val"><?= $stats['confirmed'] ?? 0 ?></div>
      <div class="stat-lbl">Confirmed</div>
    </div>
    <div class="stat c-orange">
      <div class="stat-ico">🔄</div>
      <div class="stat-val"><?= $stats['tentative'] ?? 0 ?></div>
      <div class="stat-lbl">Tentative</div>
    </div>
    <div class="stat c-purple">
      <div class="stat-ico">👥</div>
      <div class="stat-val"><?= number_format($stats['total_guests'] ?? 0) ?></div>
      <div class="stat-lbl">Total Guests (Reg.)</div>
    </div>
  </div>

  <!-- Events Table -->
  <div class="card">
    <div class="card-hdr">
      <h3>All Events Schedule</h3>
    </div>
    <div class="tbl-wrap">
      <table>
        <thead>
          <tr>
            <th>Event Name</th>
            <th>Type</th>
            <th>Date</th>
            <th>Reg. Guests</th>
            <th>Att. Factor</th>
            <th>Forecast Guests</th>
            <th>Menu</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($events)): ?>
            <tr>
              <td colspan="9" style="text-align:center;padding:32px;color:var(--t3);">
                No events found. Click "+ New Event" to create your first event!
              </td>
            </tr>
          <?php else: ?>
            <?php foreach ($events as $ev): ?>
              <tr>
                <td class="tbl-main"><?= htmlspecialchars($ev['name']) ?></td>
                <td style="font-size:12px;color:var(--t2);"><?= htmlspecialchars($ev['type']) ?></td>
                <td><?= !empty($ev['event_date']) ? date('d/m/Y', strtotime($ev['event_date'])) : '—' ?></td>
                <td><?= (int)$ev['registered_guests'] ?></td>
                <td><?= (int)$ev['attendance_factor'] ?>%</td>
                <td style="font-weight:700;color:var(--primary);"><?= (int)$ev['forecast_guests'] ?></td>
                <td>
                  <?php if (!empty($ev['menu'])): ?>
                    <span class="ico-yes">✓ <?= htmlspecialchars($ev['menu']) ?></span>
                  <?php else: ?>
                    <span class="ico-no">✗ No Menu</span>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if ($ev['status'] === 'Confirmed'): ?>
                    <span class="badge bg-green">Confirmed</span>
                  <?php elseif ($ev['status'] === 'Tentative'): ?>
                    <span class="badge bg-orange">Tentative</span>
                  <?php else: ?>
                    <span class="badge bg-red"><?= htmlspecialchars($ev['status']) ?></span>
                  <?php endif; ?>
                </td>
                <td>
                  <div class="acts" style="display:flex;align-items:center;gap:8px;">
                    <span class="act" onclick='openEditEventModal(<?= json_encode($ev, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>)'>Edit</span>
                    <form method="POST" action="<?= $baseUrl ?>/kitchen/events/delete/<?= (int)$ev['id'] ?>" onsubmit="return confirm('Are you sure you want to delete this event?');" style="margin:0;display:inline;">
                      <button type="submit" class="act del" style="background:none;border:none;padding:0;cursor:pointer;font-family:inherit;font-size:inherit;">Delete</button>
                    </form>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Add Event Modal -->
  <div class="modal-overlay" id="modal-add-event" onclick="if(event.target===this)toggleModal('modal-add-event')">
    <div class="modal">
      <div class="modal-hdr">
        <h3>Add New Event</h3>
        <button class="modal-close" onclick="toggleModal('modal-add-event')">✕</button>
      </div>
      <form action="<?= $baseUrl ?>/kitchen/events/create" method="POST">
        <div class="form-grid">
          <div class="form-grp form-full">
            <label>Event Name *</label>
            <input type="text" name="name" placeholder="e.g. Wedding Reception – Perera" required>
          </div>
          <div class="form-grp">
            <label>Event Type</label>
            <select name="type">
              <option value="Wedding">Wedding</option>
              <option value="Corporate">Corporate</option>
              <option value="Birthday">Birthday</option>
              <option value="Conference">Conference</option>
              <option value="Seminar">Seminar</option>
              <option value="Government">Government</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="form-grp">
            <label>Event Date *</label>
            <input type="date" name="event_date" value="<?= date('Y-m-d') ?>" required>
          </div>
          <div class="form-grp">
            <label>Registered Guests *</label>
            <input type="number" name="registered_guests" placeholder="e.g. 200" min="1" required>
          </div>
          <div class="form-grp">
            <label>Attendance Factor (%)</label>
            <input type="number" name="attendance_factor" value="80" min="0" max="100">
          </div>
          <div class="form-grp">
            <label>Assign Menu</label>
            <select name="menu">
              <option value="">— Select Menu —</option>
              <option value="Wedding Banquet Menu A">Wedding Banquet Menu A</option>
              <option value="Corporate Lunch Set">Corporate Lunch Set</option>
              <option value="Festive Dinner Buffet">Festive Dinner Buffet</option>
            </select>
          </div>
          <div class="form-grp">
            <label>Status</label>
            <select name="status">
              <option value="Confirmed">Confirmed</option>
              <option value="Tentative" selected>Tentative</option>
            </select>
          </div>
        </div>
        <div style="display:flex;gap:10px;margin-top:16px;">
          <button type="submit" class="btn btn-primary">Create Event</button>
          <button type="button" class="btn btn-outline" onclick="toggleModal('modal-add-event')">Cancel</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Edit Event Modal -->
  <div class="modal-overlay" id="modal-edit-event" onclick="if(event.target===this)toggleModal('modal-edit-event')">
    <div class="modal">
      <div class="modal-hdr">
        <h3>Edit Event</h3>
        <button class="modal-close" onclick="toggleModal('modal-edit-event')">✕</button>
      </div>
      <form id="form-edit-event" method="POST" action="">
        <div class="form-grid">
          <div class="form-grp form-full">
            <label>Event Name *</label>
            <input type="text" id="edit-name" name="name" required>
          </div>
          <div class="form-grp">
            <label>Event Type</label>
            <select id="edit-type" name="type">
              <option value="Wedding">Wedding</option>
              <option value="Corporate">Corporate</option>
              <option value="Birthday">Birthday</option>
              <option value="Conference">Conference</option>
              <option value="Seminar">Seminar</option>
              <option value="Government">Government</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="form-grp">
            <label>Event Date *</label>
            <input type="date" id="edit-date" name="event_date" required>
          </div>
          <div class="form-grp">
            <label>Registered Guests *</label>
            <input type="number" id="edit-guests" name="registered_guests" min="1" required>
          </div>
          <div class="form-grp">
            <label>Attendance Factor (%)</label>
            <input type="number" id="edit-factor" name="attendance_factor" min="0" max="100">
          </div>
          <div class="form-grp">
            <label>Assign Menu</label>
            <select id="edit-menu" name="menu">
              <option value="">— Select Menu —</option>
              <option value="Wedding Banquet Menu A">Wedding Banquet Menu A</option>
              <option value="Corporate Lunch Set">Corporate Lunch Set</option>
              <option value="Festive Dinner Buffet">Festive Dinner Buffet</option>
            </select>
          </div>
          <div class="form-grp">
            <label>Status</label>
            <select id="edit-status" name="status">
              <option value="Confirmed">Confirmed</option>
              <option value="Tentative">Tentative</option>
              <option value="Cancelled">Cancelled</option>
            </select>
          </div>
        </div>
        <div style="display:flex;gap:10px;margin-top:16px;">
          <button type="submit" class="btn btn-primary">Save Changes</button>
          <button type="button" class="btn btn-outline" onclick="toggleModal('modal-edit-event')">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</section>

<script>
  function openEditEventModal(ev) {
    const baseUrl = '<?= $baseUrl ?>';
    const form = document.getElementById('form-edit-event');
    form.action = baseUrl + '/kitchen/events/update/' + ev.id;

    document.getElementById('edit-name').value = ev.name || '';
    document.getElementById('edit-type').value = ev.type || 'Other';
    document.getElementById('edit-date').value = ev.event_date || '';
    document.getElementById('edit-guests').value = ev.registered_guests || 0;
    document.getElementById('edit-factor').value = ev.attendance_factor || 80;
    document.getElementById('edit-menu').value = ev.menu || '';
    document.getElementById('edit-status').value = ev.status || 'Tentative';

    toggleModal('modal-edit-event');
  }

  // Show Toast if redirected with ?msg=...
  <?php if (!empty($message)): ?>
    document.addEventListener('DOMContentLoaded', () => {
      const msg = '<?= htmlspecialchars($message) ?>';
      if (msg === 'created') {
        showToast('Event created successfully!');
      } else if (msg === 'updated') {
        showToast('Event updated successfully!');
      } else if (msg === 'deleted') {
        showToast('Event removed successfully!');
      } else if (msg === 'duplicate') {
        showToast('An event with that name already exists on this date.');
      } else if (msg === 'failed') {
        showToast('Could not save the event. Please check the details and try again.');
      }
    });
  <?php endif; ?>
</script>