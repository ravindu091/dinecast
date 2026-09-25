<?php
/**
 * CEO View – All Events
 * Read-only listing of scheduled events with attendance & forecast status.
 * Covers: FR6 (event details), FR7 (booking status), FR8 (attendance-adjusted forecast)
 * Displayed for executive oversight (FR29).
 */
?>

<!-- ================================================
     EVENTS SECTION
     ================================================ -->

<div class="sec-hdr">
  <h2>All Events</h2>
</div>

<!-- ===== STATS ===== -->
<div class="stats">
  <div class="stat c-blue">
    <div class="stat-ico">📅</div>
    <div class="stat-val"><?= (int)($data['stats']['total'] ?? 0) ?></div>
    <div class="stat-lbl">Total This Month</div>
  </div>
  <div class="stat c-green">
    <div class="stat-ico">✅</div>
    <div class="stat-val"><?= (int)($data['stats']['confirmed'] ?? 0) ?></div>
    <div class="stat-lbl">Confirmed</div>
  </div>
  <div class="stat c-orange">
    <div class="stat-ico">🔄</div>
    <div class="stat-val"><?= (int)($data['stats']['tentative'] ?? 0) ?></div>
    <div class="stat-lbl">Tentative</div>
  </div>
  <div class="stat c-purple">
    <div class="stat-ico">👥</div>
    <div class="stat-val" style="font-size:20px;">
      <?= number_format((int)($data['stats']['total_guests'] ?? 0)) ?>
    </div>
    <div class="stat-lbl">Total Guests</div>
  </div>
</div>

<!-- ===== TABLE ===== -->
<div class="card">
  <div class="card-hdr">
    <h3>Events — <?= htmlspecialchars($data['monthLabel'] ?? date('F Y')) ?></h3>
    <a href="<?= BASE_URL ?>/ceo/forecast" class="link-view-all">
      View Forecast →
    </a>
  </div>

  <div class="tbl-wrap">
    <table>
      <thead>
        <tr>
          <th>Event</th>
          <th>Date</th>
          <th>Type</th>
          <th>Guests</th>
          <th>Menu</th>
          <th>Forecast</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($data['events'])): ?>
          <?php foreach ($data['events'] as $ev): ?>
            <?php
              // ---- Status badge mapping ----
              $statusKey = strtolower($ev->status ?? '');
              $badgeMap = [
                'confirmed' => 'bg-green',
                'tentative' => 'bg-orange',
                'upcoming'  => 'bg-teal',
                'completed' => 'bg-grey',
                'cancelled' => 'bg-red',
              ];
              $badgeClass = $badgeMap[$statusKey] ?? 'bg-grey';
              $statusLabel = ucfirst($statusKey);

              // ---- Date format (short d/m) ----
              $eventDate = !empty($ev->event_date)
                ? date('d/m', strtotime($ev->event_date))
                : '—';

              // ---- Boolean flags (menu assigned? forecast generated?) ----
              $hasMenu     = !empty($ev->menu_id);
              $hasForecast = !empty($ev->forecast_guests) && $ev->forecast_guests > 0;
            ?>
            <tr>
              <td class="tbl-main">
                <a href="<?= BASE_URL ?>/ceo/viewEvent/<?= (int)$ev->event_id ?>"
                   class="event-link">
                  <?= htmlspecialchars($ev->event_name) ?>
                </a>
              </td>
              <td><?= $eventDate ?></td>
              <td><?= htmlspecialchars($ev->event_type ?? '—') ?></td>
              <td><?= number_format((int)$ev->registered_guests) ?></td>
              <td>
                <span class="<?= $hasMenu ? 'ico-yes' : 'ico-no' ?>">
                  <?= $hasMenu ? '✓' : '✗' ?>
                </span>
              </td>
              <td>
                <span class="<?= $hasForecast ? 'ico-yes' : 'ico-no' ?>">
                  <?= $hasForecast ? '✓' : '✗' ?>
                </span>
              </td>
              <td>
                <span class="badge <?= $badgeClass ?>">
                  <?= htmlspecialchars($statusLabel) ?>
                </span>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7" style="text-align:center;color:var(--t2);padding:24px;">
              No events found for this period.
            </td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>