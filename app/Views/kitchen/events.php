<section id="sec-events" class="section">
        <div class="sec-hdr"><h2>Events</h2><button class="btn btn-primary" onclick="toggleModal('modal-add-event')">+ New Event</button></div>

        <div class="stats">
          <div class="stat c-blue"><div class="stat-ico">📅</div><div class="stat-val">8</div><div class="stat-lbl">Total Upcoming</div></div>
          <div class="stat c-green"><div class="stat-ico">✅</div><div class="stat-val">5</div><div class="stat-lbl">Confirmed</div></div>
          <div class="stat c-orange"><div class="stat-ico">🔄</div><div class="stat-val">3</div><div class="stat-lbl">Tentative</div></div>
          <div class="stat c-purple"><div class="stat-ico">👥</div><div class="stat-val">3,214</div><div class="stat-lbl">Total Guests (Reg.)</div></div>
        </div>

        <div class="card">
          <div class="card-hdr"><h3>All Events — August 2026</h3></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Event Name</th><th>Type</th><th>Date</th><th>Reg. Guests</th><th>Att. Factor</th><th>Forecast Guests</th><th>Menu</th><th>Status</th><th>Actions</th></tr></thead>
              <tbody>
                <tr><td class="tbl-main">Wedding Reception – Perera</td><td style="font-size:12px;color:var(--t2);">Wedding</td><td>12/08/26</td><td>200</td><td>80%</td><td style="font-weight:700;color:var(--primary);">160</td><td><span class="ico-yes">✓ Assigned</span></td><td><span class="badge bg-green">Confirmed</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Cancel</span></div></td></tr>
                <tr><td class="tbl-main">Corporate Function – ABC Ltd</td><td style="font-size:12px;color:var(--t2);">Corporate</td><td>13/08/26</td><td>45</td><td>60%</td><td style="font-weight:700;color:var(--warning);">27</td><td><span class="ico-no">✗ No Menu</span></td><td><span class="badge bg-orange">Tentative</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Cancel</span></div></td></tr>
                <tr><td class="tbl-main">Birthday Dinner – Silva</td><td style="font-size:12px;color:var(--t2);">Birthday</td><td>14/08/26</td><td>20</td><td>80%</td><td style="font-weight:700;color:var(--primary);">16</td><td><span class="ico-yes">✓ Assigned</span></td><td><span class="badge bg-green">Confirmed</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Cancel</span></div></td></tr>
                <tr><td class="tbl-main">Tech Conference – NovaTech</td><td style="font-size:12px;color:var(--t2);">Conference</td><td>16/08/26</td><td>50</td><td>80%</td><td style="font-weight:700;color:var(--primary);">40</td><td><span class="ico-yes">✓ Assigned</span></td><td><span class="badge bg-green">Confirmed</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Cancel</span></div></td></tr>
                <tr><td class="tbl-main">Seminar – Edu Board</td><td style="font-size:12px;color:var(--t2);">Seminar</td><td>20/08/26</td><td>500</td><td>60%</td><td style="font-weight:700;color:var(--warning);">300</td><td><span class="ico-no">✗ No Menu</span></td><td><span class="badge bg-orange">Tentative</span></td><td><div class="acts"><span class="act">Edit</span><span class="act del">Cancel</span></div></td></tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Add Event Modal -->
        <div class="modal-overlay" id="modal-add-event" onclick="if(event.target===this)toggleModal('modal-add-event')">
          <div class="modal">
            <div class="modal-hdr"><h3>Add New Event</h3><button class="modal-close" onclick="toggleModal('modal-add-event')">✕</button></div>
            <form onsubmit="submitForm(event,'Event created!')">
              <div class="form-grid">
                <div class="form-grp form-full"><label>Event Name *</label><input type="text" placeholder="e.g. Wedding Reception – Perera" required></div>
                <div class="form-grp"><label>Event Type</label><select><option>Wedding</option><option>Corporate</option><option>Birthday</option><option>Conference</option><option>Seminar</option><option>Government</option><option>Other</option></select></div>
                <div class="form-grp"><label>Event Date *</label><input type="date" required></div>
                <div class="form-grp"><label>Registered Guests *</label><input type="number" placeholder="e.g. 200" required></div>
                <div class="form-grp"><label>Attendance Factor (%)</label><input type="number" value="80" min="0" max="100"></div>
                <div class="form-grp"><label>Assign Menu</label><select><option>— Select Menu —</option><option>Wedding Banquet Menu A</option><option>Corporate Lunch Set</option><option>Festive Dinner Buffet</option></select></div>
                <div class="form-grp"><label>Status</label><select><option>Confirmed</option><option>Tentative</option></select></div>
              </div>
              <div style="display:flex;gap:10px;margin-top:4px;">
                <button type="submit" class="btn btn-primary">Create Event</button>
                <button type="button" class="btn btn-outline" onclick="toggleModal('modal-add-event')">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </section>