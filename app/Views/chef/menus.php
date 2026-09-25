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
        <!-- Card 1 -->
        <div class="menu-card">
            <div class="mc-header">
                <div class="mc-tags">
                    <span class="mc-type type-wedding">Wedding</span>
                    <span class="mc-status status-active">● Active</span>
                </div>
                <div class="mc-options">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                </div>
            </div>
            <div class="mc-title">Wedding Buffet</div>
            <div class="mc-desc">Full banquet service featuring slow-cooked biryanis, aromatic curries, fresh artisanal...</div>
            <div class="mc-metrics">
                <div class="metric-box">
                    <div class="metric-lbl">DISHES</div>
                    <div class="metric-val">8 Items</div>
                </div>
                <div class="metric-box">
                    <div class="metric-lbl">HEADCOUNT</div>
                    <div class="metric-val">250 Guests</div>
                </div>
                <div class="metric-box">
                    <div class="metric-lbl">BASE COST</div>
                    <div class="metric-val">$18.40/srv</div>
                </div>
            </div>
            <div class="mc-preview">
                <div class="preview-lbl">DISHES PREVIEW</div>
                <div class="preview-tags">
                    <span class="preview-tag">Chicken Biryani</span>
                    <span class="preview-tag">Chicken Curry</span>
                    <span class="preview-tag">Vegetable Salad</span>
                    <span class="preview-tag">Papad</span>
                    <span class="preview-tag more">+4 more</span>
                </div>
            </div>
            <div class="mc-actions">
                <button class="btn-view-menu">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    View Menu
                </button>
                <div class="action-links">
                    <span class="action-link">Edit</span>
                    <span class="action-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                    </span>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="menu-card">
            <div class="mc-header">
                <div class="mc-tags">
                    <span class="mc-type type-corporate">Corporate</span>
                    <span class="mc-status status-active">● Active</span>
                </div>
                <div class="mc-options">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                </div>
            </div>
            <div class="mc-title">Corporate Executive Lunch</div>
            <div class="mc-desc">Healthy and refined plated midday buffet package targeted for business conferences...</div>
            <div class="mc-metrics">
                <div class="metric-box">
                    <div class="metric-lbl">DISHES</div>
                    <div class="metric-val">6 Items</div>
                </div>
                <div class="metric-box">
                    <div class="metric-lbl">HEADCOUNT</div>
                    <div class="metric-val">120 Guests</div>
                </div>
                <div class="metric-box">
                    <div class="metric-lbl">BASE COST</div>
                    <div class="metric-val">$14.20/srv</div>
                </div>
            </div>
            <div class="mc-preview">
                <div class="preview-lbl">DISHES PREVIEW</div>
                <div class="preview-tags">
                    <span class="preview-tag">Grilled Salmon</span>
                    <span class="preview-tag">Steamed Basmati</span>
                    <span class="preview-tag">Garden Greens</span>
                    <span class="preview-tag">Herb Butter</span>
                    <span class="preview-tag more">+2 more</span>
                </div>
            </div>
            <div class="mc-actions">
                <button class="btn-view-menu">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    View Menu
                </button>
                <div class="action-links">
                    <span class="action-link">Edit</span>
                    <span class="action-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                    </span>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="menu-card">
            <div class="mc-header">
                <div class="mc-tags">
                    <span class="mc-type type-social">Social Banquet</span>
                    <span class="mc-status status-active">● Active</span>
                </div>
                <div class="mc-options">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                </div>
            </div>
            <div class="mc-title">Birthday Function Package</div>
            <div class="mc-desc">Casual banquet and private party spread with crowd-pleasing finger foods, sliders, and...</div>
            <div class="mc-metrics">
                <div class="metric-box">
                    <div class="metric-lbl">DISHES</div>
                    <div class="metric-val">5 Items</div>
                </div>
                <div class="metric-box">
                    <div class="metric-lbl">HEADCOUNT</div>
                    <div class="metric-val">80 Guests</div>
                </div>
                <div class="metric-box">
                    <div class="metric-lbl">BASE COST</div>
                    <div class="metric-val">$11.50/srv</div>
                </div>
            </div>
            <div class="mc-preview">
                <div class="preview-lbl">DISHES PREVIEW</div>
                <div class="preview-tags">
                    <span class="preview-tag">BBQ Chicken Sliders</span>
                    <span class="preview-tag">Garlic Rolls</span>
                    <span class="preview-tag">Potato Salad</span>
                    <span class="preview-tag">Chilled Punch</span>
                    <span class="preview-tag more">+1 more</span>
                </div>
            </div>
            <div class="mc-actions">
                <button class="btn-view-menu">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    View Menu
                </button>
                <div class="action-links">
                    <span class="action-link">Edit</span>
                    <span class="action-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                    </span>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="menu-card">
            <div class="mc-header">
                <div class="mc-tags">
                    <span class="mc-type type-fine">Fine Dining</span>
                    <span class="mc-status status-draft">● Draft</span>
                </div>
                <div class="mc-options">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                </div>
            </div>
            <div class="mc-title">Executive VIP Dinner</div>
            <div class="mc-desc">High-end multi-course plated dinner experience designed for heads of state,...</div>
            <div class="mc-metrics">
                <div class="metric-box">
                    <div class="metric-lbl">DISHES</div>
                    <div class="metric-val">7 Items</div>
                </div>
                <div class="metric-box">
                    <div class="metric-lbl">HEADCOUNT</div>
                    <div class="metric-val">60 Guests</div>
                </div>
                <div class="metric-box">
                    <div class="metric-lbl">BASE COST</div>
                    <div class="metric-val">$28.00/srv</div>
                </div>
            </div>
            <div class="mc-preview">
                <div class="preview-lbl">DISHES PREVIEW</div>
                <div class="preview-tags">
                    <span class="preview-tag">Lamb Rack Herb Crust</span>
                    <span class="preview-tag">Truffle Mash</span>
                    <span class="preview-tag">Glazed Asparagus</span>
                    <span class="preview-tag more">+4 more</span>
                </div>
            </div>
            <div class="mc-actions">
                <button class="btn-view-menu">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    View Menu
                </button>
                <div class="action-links">
                    <span class="action-link">Edit</span>
                    <span class="action-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                    </span>
                </div>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="menu-card">
            <div class="mc-header">
                <div class="mc-tags">
                    <span class="mc-type type-hightea">High Tea</span>
                    <span class="mc-status status-active">● Active</span>
                </div>
                <div class="mc-options">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                </div>
            </div>
            <div class="mc-title">High Tea & Finger Food</div>
            <div class="mc-desc">Delicate passed hors d'oeuvres, savory tartlets, artisanal scones, and single-bite...</div>
            <div class="mc-metrics">
                <div class="metric-box">
                    <div class="metric-lbl">DISHES</div>
                    <div class="metric-val">9 Items</div>
                </div>
                <div class="metric-box">
                    <div class="metric-lbl">HEADCOUNT</div>
                    <div class="metric-val">150 Guests</div>
                </div>
                <div class="metric-box">
                    <div class="metric-lbl">BASE COST</div>
                    <div class="metric-val">$9.80/srv</div>
                </div>
            </div>
            <div class="mc-preview">
                <div class="preview-lbl">DISHES PREVIEW</div>
                <div class="preview-tags">
                    <span class="preview-tag">Mini Chicken Quiche</span>
                    <span class="preview-tag">Cucumber Sandwiches</span>
                    <span class="preview-tag">Scones & Cream</span>
                    <span class="preview-tag more">+6 more</span>
                </div>
            </div>
            <div class="mc-actions">
                <button class="btn-view-menu">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    View Menu
                </button>
                <div class="action-links">
                    <span class="action-link">Edit</span>
                    <span class="action-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                    </span>
                </div>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="menu-card">
            <div class="mc-header">
                <div class="mc-tags">
                    <span class="mc-type type-special">Special Dietary</span>
                    <span class="mc-status status-active">● Active</span>
                </div>
                <div class="mc-options">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                </div>
            </div>
            <div class="mc-title">Vegan & Plant-Based Banquet</div>
            <div class="mc-desc">Wholesome plant-rich menu certified dairy-free and gluten-adaptable with high-protein...</div>
            <div class="mc-metrics">
                <div class="metric-box">
                    <div class="metric-lbl">DISHES</div>
                    <div class="metric-val">6 Items</div>
                </div>
                <div class="metric-box">
                    <div class="metric-lbl">HEADCOUNT</div>
                    <div class="metric-val">100 Guests</div>
                </div>
                <div class="metric-box">
                    <div class="metric-lbl">BASE COST</div>
                    <div class="metric-val">$13.50/srv</div>
                </div>
            </div>
            <div class="mc-preview">
                <div class="preview-lbl">DISHES PREVIEW</div>
                <div class="preview-tags">
                    <span class="preview-tag">Lentil Dahl Makhani</span>
                    <span class="preview-tag">Spiced Cauliflower</span>
                    <span class="preview-tag">Fragrant Jeera Rice</span>
                    <span class="preview-tag more">+3 more</span>
                </div>
            </div>
            <div class="mc-actions">
                <button class="btn-view-menu">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    View Menu
                </button>
                <div class="action-links">
                    <span class="action-link">Edit</span>
                    <span class="action-link">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                    </span>
                </div>
            </div>
        </div>

    </div>

    <!-- Add Menu Modal (kept from previous code but hidden by default) -->
    <div class="modal-overlay" id="modal-add-menu" onclick="if(event.target===this)toggleModal('modal-add-menu')" style="display:none;">
        <div class="modal">
        <div class="modal-hdr"><h3>Create New Menu</h3><button class="modal-close" onclick="toggleModal('modal-add-menu')">✕</button></div>
        <form onsubmit="event.preventDefault(); alert('Menu created!'); toggleModal('modal-add-menu');">
            <div class="form-grid">
            <div class="form-grp form-full"><label>Menu Name *</label><input type="text" placeholder="e.g. Wedding Banquet Deluxe" required></div>
            <div class="form-grp"><label>Menu Type</label><select><option>Wedding</option><option>Corporate</option><option>Festive</option><option>Seminar</option><option>Birthday</option><option>Cocktail</option><option>Other</option></select></div>
            <div class="form-grp"><label>Status</label><select><option>Active</option><option>Draft</option><option>Inactive</option></select></div>
            <div class="form-grp form-full"><label>Description</label><textarea placeholder="Describe this menu…"></textarea></div>
            </div>
            <div style="display:flex;gap:10px;margin-top:16px;">
            <button type="submit" class="btn btn-primary" style="background:#064E3B;border:none;">Create Menu</button>
            <button type="button" class="btn btn-outline" onclick="toggleModal('modal-add-menu')">Cancel</button>
            </div>
        </form>
        </div>
    </div>
</section>