
<!-- ================================================
           RECEIVE STOCK SECTION
           ================================================ -->
      <section id="sec-receive" class="section active">
        <div class="sec-hdr"><h2>Receive Stock</h2></div>

        <div class="card">
          <div class="card-hdr">
            <div>
              <h3>📥 Log Incoming Delivery</h3>
              <p style="font-size:12px;color:var(--t3);margin-top:3px;">Use this form to receive stock against a Purchase Order or ad-hoc delivery.</p>
            </div>
          </div>

          <form onsubmit="submitReceiveStock(event)">
            <div class="form-grid">

              <div class="form-grp">
                <label>Purchase Order (Optional)</label>
                <select id="rs-po">
                  <option value="">— Select PO (if applicable) —</option>
                  <option>PO-0018 &nbsp;·&nbsp; Negombo Sea Foods</option>
                  <option>PO-0019 &nbsp;·&nbsp; Lakmal &amp; Sons Poultry</option>
                  <option>PO-0020 &nbsp;·&nbsp; Ceylon Agro Exports</option>
                </select>
              </div>

              <div class="form-grp">
                <label>Ingredient *</label>
                <select id="rs-ingredient" required>
                  <option value="">— Select Ingredient —</option>
                  <option>Fresh Salmon Fillet</option>
                  <option>Unsalted Butter</option>
                  <option>Chicken (Whole)</option>
                  <option>Basmati Rice</option>
                  <option>Fresh Curry Leaves</option>
                  <option>Coconut Milk (Canned)</option>
                  <option>Dark Chocolate (70%)</option>
                  <option>Lamb Shoulder (Bone-in)</option>
                  <option>Garlic (Peeled)</option>
                </select>
              </div>

              <div class="form-grp">
                <label>Quantity Received *</label>
                <input type="number" id="rs-qty" placeholder="e.g. 25" step="0.01" min="0.01" required>
              </div>

              <div class="form-grp">
                <label>Unit of Measure</label>
                <select id="rs-uom">
                  <option>kg</option>
                  <option>g</option>
                  <option>L</option>
                  <option>ml</option>
                  <option>units</option>
                </select>
              </div>

              <div class="form-grp">
                <label>Batch Number *</label>
                <input type="text" id="rs-batch" placeholder="e.g. B-047" required>
              </div>

              <div class="form-grp">
                <label>Expiry Date</label>
                <input type="date" id="rs-expiry">
              </div>

              <div class="form-grp">
                <label>Supplier Name *</label>
                <input type="text" id="rs-supplier" placeholder="e.g. Negombo Sea Foods" required>
              </div>

              <div class="form-grp">
                <label>Invoice Number</label>
                <input type="text" id="rs-invoice" placeholder="e.g. INV-2026-0910">
              </div>

              <div class="form-grp">
                <label>Unit Cost (Rs.)</label>
                <input type="number" id="rs-cost" placeholder="e.g. 850.00" step="0.01" min="0">
              </div>

              <div class="form-grp">
                <label>Received Date *</label>
                <input type="date" id="rs-date" required>
              </div>

              <div class="form-grp form-full">
                <label>Remarks / Notes</label>
                <textarea id="rs-notes" placeholder="Any special notes about this delivery (e.g. partial shipment, quality issues…)"></textarea>
              </div>

            </div>

            <div style="display:flex;gap:12px;margin-top:6px;">
              <button type="submit" class="btn btn-primary">✓ Save Delivery</button>
              <button type="reset" class="btn btn-outline">✕ Clear Form</button>
            </div>
          </form>
        </div>

        <!-- Recent deliveries -->
        <div class="card">
          <div class="card-hdr"><h3>Recent Deliveries</h3></div>
          <div class="tbl-wrap">
            <table>
              <thead>
                <tr><th>Ingredient</th><th>Batch</th><th>Qty</th><th>Supplier</th><th>Received On</th><th>By</th></tr>
              </thead>
              <tbody>
                <tr><td class="tbl-main">Fresh Prawns</td><td><span class="tbl-id">B-046</span></td><td>8 kg</td><td>Negombo Sea Foods</td><td>11/08/2026</td><td>Nadeesha K.</td></tr>
                <tr><td class="tbl-main">Chicken (Whole)</td><td><span class="tbl-id">B-041</span></td><td>40 kg</td><td>Lakmal &amp; Sons Poultry</td><td>10/08/2026</td><td>Nadeesha K.</td></tr>
                <tr><td class="tbl-main">Coconut Milk</td><td><span class="tbl-id">B-042</span></td><td>20 L</td><td>Araliya Foods</td><td>05/08/2026</td><td>Nadeesha K.</td></tr>
                <tr><td class="tbl-main">Basmati Rice</td><td><span class="tbl-id">B-038</span></td><td>100 kg</td><td>Ceylon Agro Exports</td><td>08/08/2026</td><td>Nadeesha K.</td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

