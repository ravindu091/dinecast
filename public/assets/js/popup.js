// /**
//  * popup.js — PopupManager
//  * ============================================================
//  * A single module that manages all popup modals in the store
//  * manager. Replaces the 5 separate init functions and the
//  * brittle initGenericPopups() in store.js.
//  *
//  * Usage in store.js:
//  *   PopupManager.register('my-overlay-id', {
//  *     onOpen(overlay, triggerEl) { /* fill data */ },
//  *     onClose(overlay) { /* cleanup */ }

//  *   });
//  *
//  *   // Open programmatically (e.g. from a row click):
//  *   PopupManager.open('my-overlay-id', triggerElement);
//  *
//  * HTML conventions:
//  *   • Overlay element must have class="pm-overlay" and a unique id.
//  *   • Any element with [data-popup-target="overlay-id"] opens it.
//  *   • .pm-close or [data-popup-close] inside a popup closes it.
//  * ============================================================
//  */

const PopupManager = (() => {

  /** @type {{ [id: string]: { onOpen?: Function, onClose?: Function } }} */
  const registry = {};

  /** Stack of currently-open overlay IDs (topmost = last) */
  const openStack = [];

  /* ----------------------------------------------------------
     Core open / close
     ---------------------------------------------------------- */

  /**
   * Open a popup overlay by its element ID.
   * @param {string}      id         The overlay element's id attribute.
   * @param {Element|null} triggerEl  The element that triggered the open
   *                                  (passed to onOpen for data extraction).
   */
  function open(id, triggerEl = null) {
    const overlay = document.getElementById(id);
    if (!overlay) return;

    // Call the registered onOpen hook (fills data, resets form, etc.)
    const hooks = registry[id];
    if (hooks && hooks.onOpen) {
      hooks.onOpen(overlay, triggerEl);
    }

    // Show overlay
    overlay.classList.add('open');
    document.body.style.overflow = 'hidden';

    // Track in stack (avoid duplicates)
    if (!openStack.includes(id)) {
      openStack.push(id);
    }
  }

  /**
   * Close a popup overlay by its element ID.
   * @param {string} id
   */
  function close(id) {
    const overlay = document.getElementById(id);
    if (!overlay) return;

    overlay.classList.remove('open');

    // Call the registered onClose hook
    const hooks = registry[id];
    if (hooks && hooks.onClose) {
      hooks.onClose(overlay);
    }

    // Remove from stack
    const idx = openStack.indexOf(id);
    if (idx !== -1) openStack.splice(idx, 1);

    // Restore body scroll only when no popups remain open
    if (openStack.length === 0) {
      document.body.style.overflow = '';
    }
  }

  /**
   * Close the topmost open popup (used by Escape key).
   */
  function closeTop() {
    if (openStack.length === 0) return;
    close(openStack[openStack.length - 1]);
  }

  /**
   * Register lifecycle hooks for a popup.
   * Safe to call before DOMContentLoaded — hooks are stored and
   * called lazily when the popup is actually opened.
   *
   * @param {string} id
   * @param {{ onOpen?: Function, onClose?: Function }} hooks
   */
  function register(id, hooks = {}) {
    registry[id] = hooks;
  }

  /* ----------------------------------------------------------
     Global event delegation
     ---------------------------------------------------------- */

  document.addEventListener('click', (e) => {

    /* 1. Open via [data-popup-target] */
    const trigger = e.target.closest('[data-popup-target]');
    if (trigger) {
      e.stopPropagation();
      open(trigger.dataset.popupTarget, trigger);
      return;
    }

    /* 2. Close via .pm-close or [data-popup-close] */
    const closeBtn = e.target.closest('.pm-close, [data-popup-close]');
    if (closeBtn) {
      const overlay = closeBtn.closest('.pm-overlay');
      if (overlay) close(overlay.id);
      return;
    }

    /* 3. Backdrop click — click directly on the overlay (not modal) */
    if (e.target.classList.contains('pm-overlay')) {
      close(e.target.id);
    }
  });

  /* Escape key — close topmost popup */
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeTop();
  });

  /* ----------------------------------------------------------
     Public API
     ---------------------------------------------------------- */
  return { open, close, closeTop, register };

})();
