(function ($) {
  var strings = window.plxCustomizerControls || {};

  function getBaseSlotLabel(slot) {
    if (strings.slotLabel) {
      return strings.slotLabel.replace('%d', slot);
    }

    return 'Slot ' + slot;
  }

  function getSlotLabel(slot) {
    var select = $('#customize-control-plx_featured_page_' + slot + '_id select');

    if (!select.length) {
      return getBaseSlotLabel(slot);
    }

    var selectedText = select.find('option:selected').text();
    var selectedVal = select.val();

    if (!selectedVal || selectedVal === '0') {
      return getBaseSlotLabel(slot) + ' - ' + (strings.noPageSelected || 'No page selected');
    }

    return getBaseSlotLabel(slot) + ' - ' + selectedText;
  }

  function updateSortableLabels() {
    $('.plx-sortable-item').each(function () {
      var slot = $(this).data('slot');
      $(this).find('.plx-sortable-label').text(getSlotLabel(slot));
    });
  }

  function syncSortableValue($control) {
    var order = [];

    $control.find('.plx-sortable-item').each(function () {
      order.push($(this).data('slot'));
    });

    $control.find('.plx-sortable-value').val(order.join(',')).trigger('change');
  }

  function initSortableControls() {
    $('.plx-sortable-list').each(function () {
      var $list = $(this);
      var $control = $list.closest('.plx-sortable-control');

      if ($list.data('sortable-ready')) {
        return;
      }

      $list.sortable({
        axis: 'y',
        handle: '.plx-sortable-handle',
        update: function () {
          syncSortableValue($control);
          updateSortableLabels();
        }
      });

      $list.data('sortable-ready', true);
    });
  }

  function injectStyles() {
    if (document.getElementById('plx-sortable-control-styles')) {
      return;
    }

    var style = document.createElement('style');
    style.id = 'plx-sortable-control-styles';
    style.textContent = '' +
      '.plx-sortable-list{margin:10px 0 0;padding:0;}' +
      '.plx-sortable-item{display:flex;align-items:center;gap:10px;margin:0 0 8px;padding:10px 12px;border:1px solid #dcdcde;border-radius:8px;background:#fff;cursor:move;}' +
      '.plx-sortable-handle{font-weight:700;letter-spacing:0.12em;color:#646970;}' +
      '.plx-sortable-label{font-size:13px;line-height:1.4;}';
    document.head.appendChild(style);
  }

  $(function () {
    injectStyles();
    initSortableControls();
    updateSortableLabels();

    for (var i = 1; i <= 6; i += 1) {
      $('#customize-control-plx_featured_page_' + i + '_id select').on('change', updateSortableLabels);
    }
  });
}(jQuery));
