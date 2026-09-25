<section id="sec-bookings" class="section">
        <div class="sec-hdr"><h2>Bookings</h2><button class="btn btn-primary" onclick="toggleModal('modal-add-booking')">+ New Booking</button></div>

        <div class="card">
          <div class="card-hdr"><h3>All Bookings</h3></div>
          <div class="tbl-wrap">
            <table>
              <thead><tr><th>Booking Ref</th><th>Client / Organisation</th><th>Linked Event</th><th>Guests</th><th>Booked On</th><th>Status</th><th>Actions</th></tr></thead>
              <tbody>
                <tr><td><span class="pr-ref">BK-0090</span></td><td class="tbl-main">ABC Ltd HR Dept.</td><td style="font-size:13px;color:var(--t2);">Corporate Function – ABC Ltd</td><td>45</td><td>05/07/26</td><td><span class="badge bg-orange">Tentative</span></td><td><div class="acts"><span class="act">View</span><span class="act">Edit</span></div></td></tr>
                <tr><td><span class="pr-ref">BK-0091</span></td><td class="tbl-main">Silva Family</td><td style="font-size:13px;color:var(--t2);">Birthday Dinner – Silva</td><td>20</td><td>10/07/26</td><td><span class="badge bg-green">Confirmed</span></td><td><div class="acts"><span class="act">View</span><span class="act">Edit</span></div></td></tr>
                <tr><td><span class="pr-ref">BK-0092</span></td><td class="tbl-main">NovaTech (Pvt) Ltd</td><td style="font-size:13px;color:var(--t2);">Tech Conference – NovaTech</td><td>50</td><td>15/07/26</td><td><span class="badge bg-green">Confirmed</span></td><td><div class="acts"><span class="act">View</span><span class="act">Edit</span></div></td></tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="modal-overlay" id="modal-add-booking" onclick="if(event.target===this)toggleModal('modal-add-booking')">
          <div class="modal">
            <div class="modal-hdr"><h3>New Booking</h3><button class="modal-close" onclick="toggleModal('modal-add-booking')">✕</button></div>
            <form onsubmit="submitForm(event,'Booking created!')">
              <div class="form-grid">
                <div class="form-grp form-full"><label>Client / Organisation *</label><input type="text" placeholder="e.g. Perera Family" required></div>
                <div class="form-grp"><label>Linked Event *</label><select required><option>— Select Event —</option><option>Wedding Reception – Perera</option><option>Corporate Function – ABC Ltd</option></select></div>
                <div class="form-grp"><label>Guest Count *</label><input type="number" placeholder="e.g. 200" required></div>
                <div class="form-grp"><label>Contact Name</label><input type="text" placeholder="Contact person"></div>
                <div class="form-grp"><label>Contact Phone</label><input type="text" placeholder="e.g. 077-XXXXXXX"></div>
                <div class="form-grp"><label>Status</label><select><option>Confirmed</option><option>Tentative</option></select></div>
              </div>
              <div style="display:flex;gap:10px;margin-top:4px;">
                <button type="submit" class="btn btn-primary">Create Booking</button>
                <button type="button" class="btn btn-outline" onclick="toggleModal('modal-add-booking')">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </section>
