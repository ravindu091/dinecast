
      <!-- ================================================
           INVENTORY SECTION
           ================================================ -->
      <section id="sec-inventory" class="section">
        <div class="sec-hdr"><h2>Inventory</h2></div>

        <!-- Inner Tabs -->
        <div class="tab-group">
          <div class="tabs">
            <button class="tab active">Active Batches</button>
            <button class="tab">Used-Up / Expired</button>
          </div>

          <!-- ===== TAB 1: Active ===== -->
          <div class="tab-pane active">
            <div class="card" style="margin-bottom:0;">
              <div class="card-hdr">
                <h3>Active Inventory Batches</h3>
                <span style="font-size:12px;color:var(--t3);">Click ▶ to view batch details</span>
              </div>
              <div class="tbl-wrap">
                <table>
                  <thead>
                    <tr><th></th><th>Ingredient</th><th>Batch No.</th><th>Received</th><th>Qty Remaining</th><th>Expiry Date</th><th>Status</th></tr>
                  </thead>
                  <tbody>
                    <!-- Row 1 + expandable -->
                    <tr>
                      <td><button class="expand-btn" id="exp-btn-1" onclick="toggleExpandRow(this,'exp-row-1')">▶</button></td>
                      <td class="tbl-main">Chicken (Whole)</td>
                      <td><span class="tbl-id">B-041</span></td>
                      <td>10/08/2026</td>
                      <td><strong>35.5 kg</strong></td>
                      <td>17/08/2026</td>
                      <td><span class="badge bg-green">Good</span></td>
                    </tr>
                    <tr class="expand-row" id="exp-row-1">
                      <td colspan="7">
                        <div class="expand-inner">
                          <div class="expand-lbl">Batch Detail — B-041</div>
                          <div class="batch-list">
                            <div class="batch-item">
                              <div class="batch-field"><span class="batch-key">Supplier</span><span class="batch-val">Lakmal &amp; Sons Poultry</span></div>
                              <div class="batch-field"><span class="batch-key">Invoice No.</span><span class="batch-val">INV-2026-0891</span></div>
                              <div class="batch-field"><span class="batch-key">Unit Cost</span><span class="batch-val">Rs. 850/kg</span></div>
                              <div class="batch-field"><span class="batch-key">Original Qty</span><span class="batch-val">40 kg</span></div>
                              <div class="batch-field"><span class="batch-key">Used</span><span class="batch-val">4.5 kg</span></div>
                              <div class="batch-field"><span class="batch-key">Remaining</span><span class="batch-val" style="color:var(--primary);">35.5 kg</span></div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- Row 2 + expandable -->
                    <tr>
                      <td><button class="expand-btn" id="exp-btn-2" onclick="toggleExpandRow(this,'exp-row-2')">▶</button></td>
                      <td class="tbl-main">Basmati Rice</td>
                      <td><span class="tbl-id">B-038</span></td>
                      <td>08/08/2026</td>
                      <td><strong>88 kg</strong></td>
                      <td>08/02/2027</td>
                      <td><span class="badge bg-green">Good</span></td>
                    </tr>
                    <tr class="expand-row" id="exp-row-2">
                      <td colspan="7">
                        <div class="expand-inner">
                          <div class="expand-lbl">Batch Detail — B-038</div>
                          <div class="batch-list">
                            <div class="batch-item">
                              <div class="batch-field"><span class="batch-key">Supplier</span><span class="batch-val">Ceylon Agro Exports</span></div>
                              <div class="batch-field"><span class="batch-key">Invoice No.</span><span class="batch-val">INV-2026-0872</span></div>
                              <div class="batch-field"><span class="batch-key">Unit Cost</span><span class="batch-val">Rs. 280/kg</span></div>
                              <div class="batch-field"><span class="batch-key">Original Qty</span><span class="batch-val">100 kg</span></div>
                              <div class="batch-field"><span class="batch-key">Used</span><span class="batch-val">12 kg</span></div>
                              <div class="batch-field"><span class="batch-key">Remaining</span><span class="batch-val" style="color:var(--primary);">88 kg</span></div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- Row 3 (near expiry) + expandable -->
                    <tr>
                      <td><button class="expand-btn" id="exp-btn-3" onclick="toggleExpandRow(this,'exp-row-3')">▶</button></td>
                      <td class="tbl-main">Coconut Milk (Canned)</td>
                      <td><span class="tbl-id">B-042</span></td>
                      <td>05/08/2026</td>
                      <td><strong>14 L</strong></td>
                      <td style="color:var(--warning);font-weight:700;">14/08/2026</td>
                      <td><span class="badge bg-orange">Near Expiry</span></td>
                    </tr>
                    <tr class="expand-row" id="exp-row-3">
                      <td colspan="7">
                        <div class="expand-inner">
                          <div class="expand-lbl">Batch Detail — B-042</div>
                          <div class="batch-list">
                            <div class="batch-item">
                              <div class="batch-field"><span class="batch-key">Supplier</span><span class="batch-val">Araliya Foods</span></div>
                              <div class="batch-field"><span class="batch-key">Invoice No.</span><span class="batch-val">INV-2026-0850</span></div>
                              <div class="batch-field"><span class="batch-key">Unit Cost</span><span class="batch-val">Rs. 120/L</span></div>
                              <div class="batch-field"><span class="batch-key">Original Qty</span><span class="batch-val">20 L</span></div>
                              <div class="batch-field"><span class="batch-key">Used</span><span class="batch-val">6 L</span></div>
                              <div class="batch-field"><span class="batch-key">Remaining</span><span class="batch-val" style="color:var(--warning);">14 L</span></div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- Row 4 (critical expiry) -->
                    <tr>
                      <td><button class="expand-btn" id="exp-btn-4" onclick="toggleExpandRow(this,'exp-row-4')">▶</button></td>
                      <td class="tbl-main">Fresh Prawns</td>
                      <td><span class="tbl-id">B-046</span></td>
                      <td>11/08/2026</td>
                      <td><strong>8 kg</strong></td>
                      <td style="color:var(--danger);font-weight:700;">13/08/2026</td>
                      <td><span class="badge bg-red">Expires Soon</span></td>
                    </tr>
                    <tr class="expand-row" id="exp-row-4">
                      <td colspan="7">
                        <div class="expand-inner">
                          <div class="expand-lbl">Batch Detail — B-046</div>
                          <div class="batch-list">
                            <div class="batch-item">
                              <div class="batch-field"><span class="batch-key">Supplier</span><span class="batch-val">Negombo Sea Foods</span></div>
                              <div class="batch-field"><span class="batch-key">Invoice No.</span><span class="batch-val">INV-2026-0904</span></div>
                              <div class="batch-field"><span class="batch-key">Unit Cost</span><span class="batch-val">Rs. 1,200/kg</span></div>
                              <div class="batch-field"><span class="batch-key">Original Qty</span><span class="batch-val">8 kg</span></div>
                              <div class="batch-field"><span class="batch-key">Used</span><span class="batch-val">0 kg</span></div>
                              <div class="batch-field"><span class="batch-key">Remaining</span><span class="batch-val" style="color:var(--danger);">8 kg</span></div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- Row 5 -->
                    <tr>
                      <td><button class="expand-btn" id="exp-btn-5" onclick="toggleExpandRow(this,'exp-row-5')">▶</button></td>
                      <td class="tbl-main">Dark Chocolate (70%)</td>
                      <td><span class="tbl-id">B-033</span></td>
                      <td>01/08/2026</td>
                      <td><strong>6.5 kg</strong></td>
                      <td>01/02/2027</td>
                      <td><span class="badge bg-green">Good</span></td>
                    </tr>
                    <tr class="expand-row" id="exp-row-5">
                      <td colspan="7">
                        <div class="expand-inner">
                          <div class="expand-lbl">Batch Detail — B-033</div>
                          <div class="batch-list">
                            <div class="batch-item">
                              <div class="batch-field"><span class="batch-key">Supplier</span><span class="batch-val">Global Imports Ltd</span></div>
                              <div class="batch-field"><span class="batch-key">Invoice No.</span><span class="batch-val">INV-2026-0821</span></div>
                              <div class="batch-field"><span class="batch-key">Unit Cost</span><span class="batch-val">Rs. 2,200/kg</span></div>
                              <div class="batch-field"><span class="batch-key">Original Qty</span><span class="batch-val">8 kg</span></div>
                              <div class="batch-field"><span class="batch-key">Used</span><span class="batch-val">1.5 kg</span></div>
                              <div class="batch-field"><span class="batch-key">Remaining</span><span class="batch-val" style="color:var(--primary);">6.5 kg</span></div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- ===== TAB 2: Used-Up / Expired ===== -->
          <div class="tab-pane">
            <div class="card" style="margin-bottom:0;">
              <div class="card-hdr"><h3>Used-Up &amp; Expired Batches</h3></div>
              <div class="tbl-wrap">
                <table>
                  <thead>
                    <tr><th>Ingredient</th><th>Batch No.</th><th>Received</th><th>Original Qty</th><th>Closed On</th><th>Reason</th></tr>
                  </thead>
                  <tbody>
                    <tr><td class="tbl-main">Sour Cream</td><td><span class="tbl-id">B-028</span></td><td>22/07/2026</td><td>5 kg</td><td>05/08/2026</td><td><span class="badge bg-gray">Used Up</span></td></tr>
                    <tr><td class="tbl-main">Fresh Basil</td><td><span class="tbl-id">B-029</span></td><td>24/07/2026</td><td>200 g</td><td>06/08/2026</td><td><span class="badge bg-red">Expired</span></td></tr>
                    <tr><td class="tbl-main">Heavy Cream</td><td><span class="tbl-id">B-030</span></td><td>25/07/2026</td><td>3 L</td><td>08/08/2026</td><td><span class="badge bg-gray">Used Up</span></td></tr>
                    <tr><td class="tbl-main">Egg Noodles</td><td><span class="tbl-id">B-031</span></td><td>26/07/2026</td><td>4 kg</td><td>09/08/2026</td><td><span class="badge bg-gray">Used Up</span></td></tr>
                    <tr><td class="tbl-main">Parmesan Cheese</td><td><span class="tbl-id">B-032</span></td><td>28/07/2026</td><td>2 kg</td><td>10/08/2026</td><td><span class="badge bg-red">Expired</span></td></tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div><!-- /tab-group -->
      </section>