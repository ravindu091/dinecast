<?php
$e = static fn($value) => htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
$eventCount = count($upcomingEvents ?? []);
$guestCount = array_sum(array_map(static fn($event) => (int)($event['forecast_guests'] ?? 0), $upcomingEvents ?? []));
$confirmedCount = count(array_filter($monthEvents ?? [], static fn($event) => ($event['status'] ?? '') === 'Confirmed'));
$tentativeCount = count(array_filter($monthEvents ?? [], static fn($event) => ($event['status'] ?? '') === 'Tentative'));
?>
<section id="sec-home" class="section active kitchen-home">
  <div class="home-stats">
    <div class="home-stat">
      <div class="home-stat-label">Upcoming Events</div>
      <div class="home-stat-val"><?= $eventCount ?></div>
    </div>
    <div class="home-stat">
      <div class="home-stat-label">Expected Guests</div>
      <div class="home-stat-val"><?= number_format($guestCount) ?></div>
    </div>
    <div class="home-stat">
      <div class="home-stat-label">Draft PRs </div>
      <div class="home-stat-val">2</div>
      <div class="home-stat-sub warn">● Awaiting submission</div>
    </div>
    <div class="home-stat">
      <div class="home-stat-label">Pending Approval </div>
      <div class="home-stat-val">4</div>
    </div>
    <div class="home-stat rejected">
      <div class="home-stat-label">Rejected PRs </div>
      <div class="home-stat-val">1</div>
      <div class="home-stat-sub danger">● Needs Revision</div>
      <div class="home-stat-pr-ref">PR-2026-084</div>
      <a class="home-stat-pr-link" href="<?= $baseUrl ?>/kitchen/pr">Review PR →</a>
    </div>
  </div>

  <div class="action-banner">
    <div class="action-banner-ico">ⓘ</div>
    <div class="action-banner-body">
      <div class="action-banner-title"><span class="ab-label">ACTION REQUIRED</span><span class="ab-ref">PR #PR-2026-084 — Daily &amp; Frozen Items Revision</span></div>
      <div class="action-banner-reason"><strong>Reason:</strong> Rejected by F&amp;B Director: <em>“Exceeds weekly dairy budget quota by $420. Please trim quantities or substitute premium heavy cream line items.”</em></div>
    </div>
  </div>

  <div class="home-grid">
    <section class="events-card">
      <div class="events-card-hdr">
        <div class="events-card-hdr-left"><h3>▣ &nbsp;Upcoming Events — Next 7 Days</h3><p>Scheduled banquets, guest headcounts &amp; hall allocations</p></div>
        <a class="view-all-link" href="<?= $baseUrl ?>/kitchen/events">View All ›</a>
      </div>
      <div class="home-event-list">
        <?php if (empty($upcomingEvents)): ?>
          <div class="home-empty">No upcoming events in the next 7 days.</div>
        <?php else: ?>
          <?php foreach (array_slice($upcomingEvents, 0, 5) as $index => $event): ?>
            <?php $date = new DateTimeImmutable($event['event_date']); $daysLeft = (int)(new DateTimeImmutable('today'))->diff($date)->format('%r%a'); $type = strtolower((string)($event['type'] ?? 'other')); $typeClass = str_contains($type, 'banquet') ? 'banquet' : (str_contains($type, 'buffet') ? 'buffet' : (str_contains($type, 'gala') ? 'gala' : (str_contains($type, 'conf') ? 'conf' : 'other'))); $statusClass = strtolower((string)($event['status'] ?? 'tentative')); ?>
            <article class="event-row">
              <div class="event-date-badge <?= $index % 2 ? 'teal' : 'blue' ?>"><span class="edb-day"><?= $date->format('d') ?></span><span class="edb-mon"><?= $date->format('M') ?></span></div>
              <div class="event-info">
                <div class="event-name"><?= $e($event['name'] ?? 'Event') ?><span class="ev-type-badge <?= $typeClass ?>"><?= $e($event['type'] ?? 'Other') ?></span></div>
              </div>
              <div class="event-meta">
                <span class="event-guests"><?= number_format((int)($event['forecast_guests'] ?? 0)) ?></span><span class="event-guests-lbl">guests</span>
                <span class="event-status-badge esb-<?= $e($statusClass) ?>">● <?= $e($event['status'] ?? 'Tentative') ?></span>
                <span class="event-days-left"><?= $daysLeft === 0 ? 'Today' : 'in ' . $daysLeft . ' days' ?></span>
              </div>
            </article>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </section>

    <aside class="home-right">
      <section class="booking-summary-card">
        <div class="booking-summary-hdr"><h3>▥ &nbsp;Booking Summary</h3><span class="period-tag">This Month</span></div>
        <div class="booking-summary-body">
          <div class="booking-stat"><div class="bs-val green"><?= $confirmedCount ?></div><div class="bs-lbl">Confirmed</div></div>
          <div class="booking-stat"><div class="bs-val orange"><?= $tentativeCount ?></div><div class="bs-lbl">Tentative</div></div>
        </div>
      </section>

      <section class="forecasts-card">
        <div class="forecasts-hdr"><h3>↗ &nbsp;Recent Forecasts</h3><a class="view-all-link" href="<?= $baseUrl ?>/kitchen/forecast">View All</a></div>
        <?php foreach (array_slice($recentForecasts ?? [], 0, 3) as $forecast): ?>
          <a class="forecast-row" href="<?= $baseUrl ?>/kitchen/forecast" style="text-decoration:none;">
            <span class="forecast-ico">▥</span><span class="forecast-info"><span class="forecast-title"><?= $e($forecast['title']) ?></span><span class="forecast-dates"><?= $e($forecast['dates']) ?></span></span><span class="forecast-arrow">›</span>
          </a>
        <?php endforeach; ?>
        <?php if (empty($recentForecasts)): ?><div class="home-empty">No forecasts have been generated yet.</div><?php endif; ?>
      </section>
    </aside>
  </div>
</section>
