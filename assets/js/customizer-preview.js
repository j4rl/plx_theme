(function ($) {
  function setText(selector, value) {
    $(selector).text(value);
  }

  function setAttr(selector, attr, value) {
    $(selector).attr(attr, value);
  }

  function setMultiText(selector, value) {
    $(selector).each(function () {
      $(this).text(value);
    });
  }

  function bindText(settingId, selector) {
    wp.customize(settingId, function (setting) {
      setting.bind(function (value) {
        setText(selector, value);
      });
    });
  }

  function bindAttr(settingId, selector, attr) {
    wp.customize(settingId, function (setting) {
      setting.bind(function (value) {
        setAttr(selector, attr, value);
      });
    });
  }

  $(function () {
    bindText('plx_eyebrow_text', '.js-plx-eyebrow');
    bindText('plx_hero_title', '.js-plx-hero-title');
    bindText('plx_hero_text', '.js-plx-hero-text');
    bindText('plx_primary_button_text', '.js-plx-primary-button');
    bindAttr('plx_primary_button_url', '.js-plx-primary-button', 'href');
    bindText('plx_secondary_button_text', '.js-plx-secondary-button');
    bindAttr('plx_secondary_button_url', '.js-plx-secondary-button', 'href');
    bindText('plx_profile_title', '.js-plx-profile-title');

    for (var i = 1; i <= 4; i += 1) {
      (function (index) {
        bindText('plx_stat_' + index + '_title', '.hero__stat[data-stat="' + index + '"] .js-plx-stat-title');
        bindText('plx_stat_' + index + '_text', '.hero__stat[data-stat="' + index + '"] .js-plx-stat-text');
      }(i));
    }

    bindText('plx_intro_title', '.js-plx-intro-title');
    bindText('plx_intro_text', '.js-plx-intro-text');

    for (var j = 1; j <= 3; j += 1) {
      (function (index) {
        bindText('plx_feature_' + index + '_title', '.feature-card[data-feature="' + index + '"] .js-plx-feature-title');
        bindText('plx_feature_' + index + '_text', '.feature-card[data-feature="' + index + '"] .js-plx-feature-text');
      }(j));
    }

    bindText('plx_featured_pages_title', '.js-plx-pages-title');
    bindText('plx_featured_pages_text', '.js-plx-pages-text');

    wp.customize('plx_featured_pages_cta_text', function (setting) {
      setting.bind(function (value) {
        setMultiText('.js-plx-pages-button', value);
      });
    });

    bindText('plx_recent_posts_title', '.js-plx-recent-posts-title');
    bindText('plx_cta_title', '.js-plx-cta-title');
    bindText('plx_cta_text', '.js-plx-cta-text');
    bindText('plx_cta_button_text', '.js-plx-cta-button');
    bindAttr('plx_cta_button_url', '.js-plx-cta-button', 'href');
    bindText('plx_footer_tagline', '.js-plx-footer-tagline');
  });
}(jQuery));
