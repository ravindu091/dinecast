
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
              <div class="inventory-toolbar">
                <label class="inventory-search">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
                  </svg>
                  <input id="inventory-search" type="search" placeholder="Search batch #, SKU, ingredient, or storage bin..." autocomplete="off">
                </label>
                <div class="inventory-filters">
                  <div class="inventory-status-filter">
                    <button type="button" class="inventory-filter-btn" id="status-dropdown-btn" aria-expanded="false" aria-controls="status-dropdown-menu">
                      <span class="inventory-filter-prefix">Status:</span>
                      <span id="status-selected-label">All Batches</span>
                      <svg class="inventory-chevron" id="status-dropdown-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
                    </button>
                    <div class="inventory-status-menu" id="status-dropdown-menu" hidden>
                      <button type="button" class="status-option active" data-value="all">All Batches <span>✓</span></button>
                      <button type="button" class="status-option" data-value="optimal">Optimal <span hidden>✓</span></button>
                      <button type="button" class="status-option" data-value="expiring">Expiring Soon <span hidden>✓</span></button>
                      <button type="button" class="status-option" data-value="low">Low Stock <span hidden>✓</span></button>
                    </div>
                  </div>
                  <label class="inventory-sort">
                    <select id="inventory-sort" aria-label="Sort inventory batches">
                      <option value="expiry">Sort: Expiry Date (Soonest FIFO)</option>
                      <option value="stock">Sort: Current Stock (High to Low)</option>
                      <option value="received">Sort: Batch Received Date</option>
                    </select>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
                  </label>
                  <button class="btn btn-primary inventory-count-btn" id="add-stock-btn" type="button">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 4v16m8-8H4"/></svg>
                    <span>Add Stock</span>
                  </button>
                </div>
              </div>
              <div class="tbl-wrap">
                <table>
                  <thead>
                    <tr><th>No.</th><th>Ingredient</th><th>Batch No.</th><th>Received</th><th>Qty Remaining</th><th>Expiry Date</th><th>Status</th><th>Action</th></tr>
                  </thead>
                  <tbody>
                    
                    <?php
                      $items = [
                          ['name' => 'Chicken Breast',   'batchId' => 'B-051', 'receiveDate' => '15/09/2026', 'qty' => '28 kg',     'expiryDate' => '22/09/2026', 'supplier' => 'FreshFarm Meats',       'category' => 'Meat & Poultry'],
                          ['name' => 'Basmati Rice',     'batchId' => 'B-052', 'receiveDate' => '12/09/2026', 'qty' => '75 kg',     'expiryDate' => '12/03/2027', 'supplier' => 'GrainWorld Supplies',   'category' => 'Grains & Cereals'],
                          ['name' => 'Fresh Prawns',     'batchId' => 'B-053', 'receiveDate' => '19/09/2026', 'qty' => '12 kg',     'expiryDate' => '23/09/2026', 'supplier' => 'OceanBlue Seafood',     'category' => 'Seafood'],
                          ['name' => 'Coconut Milk',     'batchId' => 'B-054', 'receiveDate' => '10/09/2026', 'qty' => '18 L',      'expiryDate' => '20/09/2026', 'supplier' => 'TropicalPure Co.',      'category' => 'Dairy & Alternatives'],
                          ['name' => 'Tomato Sauce',     'batchId' => 'B-055', 'receiveDate' => '05/09/2026', 'qty' => '24 L',      'expiryDate' => '05/03/2027', 'supplier' => 'SunRipe Foods',         'category' => 'Condiments & Sauces'],
                          ['name' => 'Potatoes',         'batchId' => 'B-056', 'receiveDate' => '16/09/2026', 'qty' => '45 kg',     'expiryDate' => '30/09/2026', 'supplier' => 'Green Valley Farms',    'category' => 'Vegetables'],
                          ['name' => 'Fresh Basil',      'batchId' => 'B-057', 'receiveDate' => '20/09/2026', 'qty' => '500 g',     'expiryDate' => '24/09/2026', 'supplier' => 'HerbGarden Direct',     'category' => 'Herbs & Spices'],
                          ['name' => 'Mozzarella Cheese','batchId' => 'B-058', 'receiveDate' => '14/09/2026', 'qty' => '8 kg',      'expiryDate' => '28/09/2026', 'supplier' => 'Alpine Dairy Ltd.',     'category' => 'Dairy & Cheese'],
                          ['name' => 'Onions',           'batchId' => 'B-059', 'receiveDate' => '08/09/2026', 'qty' => '35 kg',     'expiryDate' => '08/10/2026', 'supplier' => 'Green Valley Farms',    'category' => 'Vegetables'],
                          ['name' => 'Heavy Cream',      'batchId' => 'B-060', 'receiveDate' => '18/09/2026', 'qty' => '10 L',      'expiryDate' => '25/09/2026', 'supplier' => 'Alpine Dairy Ltd.',     'category' => 'Dairy & Cheese'],
                          ['name' => 'Eggs',             'batchId' => 'B-061', 'receiveDate' => '17/09/2026', 'qty' => '15 trays',  'expiryDate' => '01/10/2026', 'supplier' => 'FreshFarm Meats',       'category' => 'Eggs & Poultry'],
                          ['name' => 'Parmesan Cheese',  'batchId' => 'B-062', 'receiveDate' => '03/09/2026', 'qty' => '4 kg',      'expiryDate' => '03/12/2026', 'supplier' => 'Alpine Dairy Ltd.',     'category' => 'Dairy & Cheese'],
                          ['name' => 'Wheat Flour',      'batchId' => 'B-063', 'receiveDate' => '01/09/2026', 'qty' => '50 kg',     'expiryDate' => '01/03/2027', 'supplier' => 'GrainWorld Supplies',   'category' => 'Grains & Cereals'],
                      ];
                      $index = 1;
                    ?>

                    <?php foreach($items as $item): ?>
                      <tr class="inventory-data-row" 
                      data-name="<?= htmlspecialchars($item['name']) ?>"
                      data-batch="<?= htmlspecialchars($item['batchId']) ?>"
                      data-received="<?= htmlspecialchars($item['receiveDate']) ?>"
                      data-quantity="<?= htmlspecialchars($item['qty']) ?>"
                      data-expiry="<?= htmlspecialchars($item['expiryDate']) ?>"
                      data-remaining="<?= getRemainingDays($item['expiryDate']) ?>"
                      data-supplier="<?= htmlspecialchars($item['supplier']) ?>"
                      data-category="<?= htmlspecialchars($item['category']) ?>"
                      >

                        <td><?= $index++ ?></td>
                        <td class="tbl-main"><?= htmlspecialchars($item['name']) ?></td>
                        <td><span class="tbl-id"><?=  htmlspecialchars($item['batchId']) ?></span></td>
                        <td><?=  htmlspecialchars($item['receiveDate']) ?></td>
                        <td><strong><?=  htmlspecialchars($item['qty']) ?></strong></td>
                        <td><?=  htmlspecialchars($item['expiryDate']) ?></td>
                        <td><span class="badge <?= htmlspecialchars(getStatusClass(getRemainingDays($item['expiryDate']))['class']) ?>"><?= htmlspecialchars(getStatusClass(getRemainingDays($item['expiryDate']))['text']) ?></span></td>
                        <td><div class="inventory-actions"><button class="inventory-action inventory-action-waste" type="button">Waste</button><button class="inventory-action inventory-action-transfer" type="button" data-issue>Issue</button></div></td>
                      </tr>
                    <?php endforeach; ?>

                  </tbody>
                </table>


                <!-- Batch Details Popup -->
                <div class="popup-overlay" id="batch-popup-overlay" aria-modal="true" role="dialog" aria-labelledby="popup-title">
                  <div class="popup" id="batch-popup">

                    <!-- Header -->
                    <div class="popup-header">
                      <div class="popup-header-left">
                        <div class="popup-icon">
                          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <rect x="5" y="2" width="14" height="20" rx="2"/><path d="M9 7h6M9 11h6M9 15h4"/>
                          </svg>
                        </div>
                        <div>
                          <h2 id="popup-title" class="popup-title">Batch Details</h2>
                          <div class="popup-meta">
                            <span class="popup-batch-id" id="popup-batch-id"></span>
                          </div>
                        </div>
                      </div>
                      <button class="popup-close" id="batch-popup-close" type="button" aria-label="Close batch details">×</button>
                    </div>

                    <!-- Body -->
                    <div class="popup-body">
                      <div class="popup-detail-card">
                        <div class="popup-detail-row">
                          <span class="popup-detail-label">Ingredient:</span>
                          <span class="popup-detail-value popup-ingredient" id="popup-ingredient"></span>
                        </div>
                        <div class="popup-detail-row">
                          <span class="popup-detail-label">Category:</span>
                          <span class="popup-detail-value">
                            <span class="popup-category-tag" id="popup-category"></span>
                          </span>
                        </div>
                        <div class="popup-detail-row">
                          <span class="popup-detail-label">Supplier:</span>
                          <strong class="popup-detail-value" id="popup-supplier"></strong>
                        </div>
                        <div class="popup-detail-row">
                          <span class="popup-detail-label">Received Date:</span>
                          <span class="popup-detail-value" id="popup-received"></span>
                        </div>
                        <div class="popup-detail-row">
                          <span class="popup-detail-label">Qty Remaining:</span>
                          <strong class="popup-detail-value" id="popup-qty"></strong>
                        </div>
                        <div class="popup-detail-row">
                          <span class="popup-detail-label">Expiry Status:</span>
                          <span class="popup-detail-value">
                            <span class="popup-expiry-badge" id="popup-expiry-badge"></span>
                          </span>
                        </div>
                      </div>
                    </div>

                    <!-- Footer -->
                    <div class="popup-footer">
                      <button class="popup-btn popup-btn-delete" type="button">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                        Delete
                      </button>
                      <button class="popup-btn popup-btn-edit" type="button">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4Z"/></svg>
                        Edit
                      </button>
                      <button class="popup-btn popup-btn-issue" type="button">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 11l19-9-9 19-2-8-8-2z"/></svg>
                        Issue to Kitchen
                      </button>
                    </div>

                  </div>
                </div>

                <!-- ================================================
                     ISSUE TO KITCHEN MODAL
                     ================================================ -->
                <div class="issue-overlay" id="issue-popup-overlay" aria-modal="true" role="dialog" aria-labelledby="issue-popup-title">
                  <div class="issue-modal" id="issue-popup">

                    <!-- Header -->
                    <div class="issue-header">
                      <div class="issue-header-left">
                        <div class="issue-icon">
                          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M7 16V4m0 0L3 8m4-4l4 4"/><path d="M17 8v12m0 0l4-4m-4 4l-4-4"/>
                          </svg>
                        </div>
                        <div>
                          <h2 id="issue-popup-title" class="issue-title">Transfer to Kitchen</h2>
                          <div class="issue-meta">
                            <span class="issue-batch-id" id="issue-batch-id"></span>
                            <span class="issue-meta-sep">&middot;</span>
                            <span class="issue-ingredient-name" id="issue-ingredient-name"></span>
                            <span class="issue-meta-sep">&middot;</span>
                            <strong class="issue-available" id="issue-available"></strong>
                            <span class="issue-available-label"> available</span>
                          </div>
                        </div>
                      </div>
                      <button class="issue-close" id="issue-popup-close" type="button" aria-label="Close transfer dialog">&times;</button>
                    </div>

                    <!-- Body -->
                    <div class="issue-body">

                      <!-- Qty Label -->
                      <div class="issue-section-label">Transfer Quantity</div>

                      <!-- Stepper -->
                      <div class="issue-stepper-row">
                        <button class="issue-step-btn" id="issue-decrement" type="button" aria-label="Decrease quantity">&minus;</button>
                        <div class="issue-qty-wrap">
                          <input class="issue-qty-input" id="issue-qty-input" type="number" min="0" step="0.5" value="0" aria-label="Transfer quantity">
                          <span class="issue-unit" id="issue-unit">kg</span>
                        </div>
                        <button class="issue-step-btn" id="issue-increment" type="button" aria-label="Increase quantity">+</button>
                      </div>

                      <!-- Presets -->
                      <div class="issue-presets" id="issue-presets">
                        <span class="issue-presets-label">Presets:</span>
                        <!-- JS fills these -->
                      </div>

                      <!-- Remaining -->
                      <div class="issue-remaining-row">
                        <span class="issue-remaining-label">Remaining stock in Store:</span>
                        <span class="issue-remaining-value" id="issue-remaining-value">&mdash;</span>
                      </div>

                    </div>

                    <!-- Footer -->
                    <div class="issue-footer">
                      <button class="issue-btn issue-btn-cancel" id="issue-cancel" type="button">Cancel</button>
                      <button class="issue-btn issue-btn-confirm" id="issue-confirm" type="button">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                          <path d="M20 6L9 17l-5-5"/>
                        </svg>
                        Confirm Transfer
                      </button>
                    </div>

                  </div>
                </div>

                <!-- ================================================
                     LOG WASTE & DISCARD MODAL
                     ================================================ -->
                <div class="waste-overlay" id="waste-popup-overlay" aria-modal="true" role="dialog" aria-labelledby="waste-popup-title">
                  <div class="waste-modal" id="waste-popup">

                    <!-- Header -->
                    <div class="waste-header">
                      <div class="waste-header-left">
                        <div class="waste-icon">
                          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
                          </svg>
                        </div>
                        <div>
                          <h2 id="waste-popup-title" class="waste-title">Log Waste &amp; Discard Batch</h2>
                          <div class="waste-meta">
                            <span class="waste-batch-id" id="waste-batch-id"></span>
                            <span class="waste-meta-sep">&middot;</span>
                            <span class="waste-ingredient-name" id="waste-ingredient-name"></span>
                            <span class="waste-meta-sep">&middot;</span>
                            <strong class="waste-available" id="waste-available"></strong>
                            <span class="waste-available-label"> available</span>
                          </div>
                        </div>
                      </div>
                      <button class="waste-close" id="waste-popup-close" type="button" aria-label="Close waste dialog">&times;</button>
                    </div>

                    <!-- Warning banner -->
                    <div class="waste-warning">
                      <svg class="waste-warning-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/>
                      </svg>
                      <span>Logging this item as waste will permanently deduct stock and record a wastage variance in the financial logs.</span>
                    </div>

                    <!-- Body -->
                    <div class="waste-body">

                      <!-- Quantity -->
                      <div class="waste-field">
                        <label class="waste-label" for="waste-qty-input">Waste Quantity to Discard</label>
                        <div class="waste-qty-row">
                          <div class="waste-qty-wrap">
                            <input class="waste-qty-input" id="waste-qty-input" type="number" min="0" step="0.5" value="0" aria-label="Waste quantity">
                            <span class="waste-unit" id="waste-unit">kg</span>
                          </div>
                          <button class="waste-full-btn" id="waste-full-btn" type="button">Full Batch</button>
                        </div>
                      </div>

                      <!-- Reason dropdown -->
                      <div class="waste-field">
                        <label class="waste-label" for="waste-reason">Reason for Waste <span class="waste-required">*</span></label>
                        <div class="waste-select-wrap">
                          <select class="waste-select" id="waste-reason" required>
                            <option value="">Select a reason&hellip;</option>
                            <option value="spoilage">Spoilage / Quality Deterioration (off odor, discoloration)</option>
                            <option value="expired">Past Expiry Date</option>
                            <option value="contamination">Contamination / Cross-contamination</option>
                            <option value="overstock">Overstock / Excess Inventory</option>
                            <option value="damaged">Damaged During Handling</option>
                            <option value="other">Other</option>
                          </select>
                          <svg class="waste-select-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
                        </div>
                      </div>

                      <!-- Notes textarea -->
                      <div class="waste-field">
                        <label class="waste-label" for="waste-notes">
                          Waste Reason Notes &amp; Details
                          <span class="waste-label-hint">(Required for audit compliance)</span>
                        </label>
                        <textarea class="waste-textarea" id="waste-notes" rows="3" placeholder="Provide specific details on why this batch is being discarded (required for audit compliance)..."></textarea>
                      </div>

                      <!-- Responsible staff -->
                      <div class="waste-staff-row">
                        <span class="waste-staff-label">Responsible Staff:</span>
                        <span class="waste-staff-value">
                          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                          Anura Kumara (Store Manager)
                        </span>
                      </div>

                    </div>

                    <!-- Footer -->
                    <div class="waste-footer">
                      <button class="waste-btn waste-btn-cancel" id="waste-cancel" type="button">Cancel</button>
                      <button class="waste-btn waste-btn-confirm" id="waste-confirm" type="button">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                          <polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                        </svg>
                        Confirm &amp; Log Waste
                      </button>
                    </div>

                  </div>
                </div>

                <!-- ================================================
                     ADD STOCK & INBOUND BATCH MODAL
                     ================================================ -->
                <div class="addstock-overlay" id="addstock-overlay" aria-modal="true" role="dialog" aria-labelledby="addstock-title">
                  <div class="addstock-modal" id="addstock-modal">

                    <!-- Header -->
                    <div class="addstock-header">
                      <div class="addstock-header-left">
                        <div class="addstock-icon">
                          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                            <line x1="12" y1="8" x2="12" y2="16"/>
                            <line x1="8" y1="12" x2="16" y2="12"/>
                          </svg>
                        </div>
                        <div>
                          <h2 id="addstock-title" class="addstock-title">Add Stock &amp; Inbound Batch</h2>
                          <p class="addstock-subtitle">Record incoming ingredient stock, supplier details, storage zone, and shelf life.</p>
                        </div>
                      </div>
                      <button class="addstock-close" id="addstock-close" type="button" aria-label="Close">&times;</button>
                    </div>

                    <!-- Body -->
                    <div class="addstock-body">

                      <!-- Search & Quick Select -->
                      <div class="addstock-field">
                        <label class="addstock-label" for="addstock-search">Search &amp; Select Ingredient</label>
                        <div class="addstock-search-wrap">
                          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                          <input class="addstock-search" id="addstock-search" type="search" placeholder="Search ingredient by name or SKU..." autocomplete="off">
                        </div>
                        <div class="addstock-quick-select" id="addstock-quick-select">
                          <span class="addstock-quick-label">Quick Select:</span>
                          <button type="button" class="addstock-quick-btn active" data-ingredient="Chicken Breast" data-category="Meat &amp; Poultry" data-sku="SKU-CHK-001">Chicken Breast</button>
                          <button type="button" class="addstock-quick-btn" data-ingredient="Fresh Prawns" data-category="Seafood" data-sku="SKU-PRW-003">Fresh Prawns</button>
                          <button type="button" class="addstock-quick-btn" data-ingredient="Basmati Rice" data-category="Grains &amp; Cereals" data-sku="SKU-RCE-002">Basmati Rice</button>
                          <button type="button" class="addstock-quick-btn" data-ingredient="Mozzarella Cheese" data-category="Dairy &amp; Cheese" data-sku="SKU-CHZ-004">Mozzarella</button>
                        </div>
                      </div>

                      <!-- Category + Supplier row -->
                      <div class="addstock-row">
                        <div class="addstock-field">
                          <label class="addstock-label" for="addstock-category">Category</label>
                          <div class="addstock-select-wrap">
                            <select class="addstock-select" id="addstock-category">
                              <option value="">Select category&hellip;</option>
                              <option value="Meat &amp; Poultry">Meat &amp; Poultry</option>
                              <option value="Seafood">Seafood</option>
                              <option value="Grains &amp; Cereals">Grains &amp; Cereals</option>
                              <option value="Dairy &amp; Cheese">Dairy &amp; Cheese</option>
                              <option value="Dairy &amp; Alternatives">Dairy &amp; Alternatives</option>
                              <option value="Vegetables">Vegetables</option>
                              <option value="Herbs &amp; Spices">Herbs &amp; Spices</option>
                              <option value="Condiments &amp; Sauces">Condiments &amp; Sauces</option>
                              <option value="Eggs &amp; Poultry">Eggs &amp; Poultry</option>
                            </select>
                            <svg class="addstock-select-icon" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
                          </div>
                        </div>
                        <div class="addstock-field">
                          <label class="addstock-label" for="addstock-supplier">Supplier / Vendor</label>
                          <input class="addstock-input" id="addstock-supplier" type="text" placeholder="e.g. FreshFarm Meats">
                        </div>
                      </div>

                      <!-- Batch No + Received Date -->
                      <div class="addstock-row">
                        <div class="addstock-field">
                          <label class="addstock-label" for="addstock-batch">Batch Number <span class="addstock-hint-green">(Auto Generated)</span></label>
                          <input class="addstock-input" id="addstock-batch" type="text" readonly>
                        </div>
                        <div class="addstock-field">
                          <label class="addstock-label" for="addstock-received">Received Date</label>
                          <input class="addstock-input" id="addstock-received" type="date">
                        </div>
                      </div>

                      <!-- Qty + UOM + Cost -->
                      <div class="addstock-row addstock-row-3">
                        <div class="addstock-field">
                          <label class="addstock-label" for="addstock-qty">Quantity Inbound</label>
                          <input class="addstock-input" id="addstock-qty" type="number" min="0" step="0.5" placeholder="0.0">
                        </div>
                        <div class="addstock-field">
                          <label class="addstock-label" for="addstock-uom">Unit of Measure</label>
                          <div class="addstock-select-wrap">
                            <select class="addstock-select" id="addstock-uom">
                              <option value="kg">kg (Kilograms)</option>
                              <option value="g">g (Grams)</option>
                              <option value="L">L (Litres)</option>
                              <option value="mL">mL (Millilitres)</option>
                              <option value="pcs">pcs (Pieces)</option>
                              <option value="trays">trays</option>
                              <option value="boxes">boxes</option>
                            </select>
                            <svg class="addstock-select-icon" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
                          </div>
                        </div>
                        <div class="addstock-field">
                          <label class="addstock-label" for="addstock-cost">Cost / Unit ($)</label>
                          <input class="addstock-input" id="addstock-cost" type="number" min="0" step="0.01" placeholder="0.00">
                        </div>
                      </div>

                      <!-- Expiry Date -->
                      <div class="addstock-field addstock-field-half">
                        <label class="addstock-label" for="addstock-expiry">Expiry Date <span class="addstock-hint">(FIFO)</span></label>
                        <input class="addstock-input" id="addstock-expiry" type="date">
                      </div>

                    </div>

                    <!-- Footer -->
                    <div class="addstock-footer">
                      <button class="addstock-btn addstock-btn-cancel" id="addstock-cancel" type="button">Cancel</button>
                      <button class="addstock-btn addstock-btn-confirm" id="addstock-confirm" type="button">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        Save &amp; Add Stock
                      </button>
                    </div>

                  </div>
                </div>

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